document.addEventListener("DOMContentLoaded", function() {
    let cart = [];
    let appliedDiscount = 0;

    const products = [
        {"id": 1, "name": "Felpa Nike Rossa", "price": 60.00, "image": "Img/FelpaNikeRossa.webp"},
        {"id": 2, "name": "Felpa Nike Nera", "price": 60.00, "image": "Img/FelpaNera.webp"},
        {"id": 3, "name": "Felpa Nike Blu", "price": 55.00, "image": "Img/FelpaNike.webp"},
        {"id": 4, "name": "Felpa Nike Verde", "price": 70.00, "image": "Img/FelpaNikeVerde.webp"},
        {"id": 5, "name": "Pantaloni Nike Neri", "price": 50.00, "image": "Img/PantaloniNikeNeri.webp"},
        {"id": 6, "name": "Pantaloni Nike Grigi", "price": 45.00, "image": "Img/PantaloniNikeGrigi.webp"},
        {"id": 7, "name": "Nike Tech Pantaloni", "price": 80.00, "image": "Img/PantaloniNikeBlu.webp"},
        {"id": 8, "name": "Nike AF1", "price": 100.00, "image": "Img/Nikeaf1.webp"},
        {"id": 9, "name": "Nike ZM", "price": 110.00, "image": "Img/Niketn.webp"},
        {"id": 10, "name": "Calze Nike", "price": 15.00, "image": "Img/CalzeNike.webp"},
        {"id": 11, "name": "3 Mutande Nike", "price": 30.00, "image": "Img/Mutande.webp"},
        {"id": 12, "name": "Nike Mercurial blu", "price": 180.00, "image": "Img/NikeMercurialBlu.webp"},
        {"id": 13, "name": "Nike Mercurial bianche", "price": 180.00, "image": "Img/NikeMercurialBianche.webp"},
        {"id": 14, "name": "Nike Toni Kross", "price": 250.00, "image": "Img/Toni.webp"}
    ];

    const validCoupons = {
        "SCONTO10": {discount: 0.10, minTotal: 100},
        "SCONTO15": {discount: 0.15, minTotal: 150},
        "SCONTO20": {discount: 0.20, minTotal: 200}
    };

    // Funzione per renderizzare i prodotti
    function renderProducts() {
        const container = document.getElementById("product-list");
        if (!container) return;

        container.innerHTML = products.map(product => `
            <div class="col-md-4 mb-4">
                <div class="card h-100 product-card">
                    <img src="${product.image}" class="card-img-top" alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">€${product.price.toFixed(2)}</p>
                        <button class="btn btn-primary add-to-cart" data-id="${product.id}">
                            Aggiungi al carrello
                        </button>
                    </div>
                </div>
            </div>
        `).join("");

        // Aggiungi event listeners
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productId = parseInt(this.getAttribute('data-id'));
                addToCart(productId);
            });
        });
    }

    // Funzione per aggiungere al carrello
    async function addToCart(productId) {
        try {
            const product = products.find(p => p.id === productId);
            if (!product) return;

            // Aggiungi al carrello visivo
            cart.push(product);
            updateCartDisplay();
            updateCartCount();

            // Aggiungi al database solo se loggato
            if (isLoggedIn) {
                const response = await fetch('php/add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `product_id=${productId}`
                });

                const result = await response.json();
                if (!result.success) {
                    console.error('Errore database:', result.message);
                }
            }
        } catch (error) {
            console.error('Errore:', error);
        }
    }

    // Aggiorna visualizzazione carrello
    function updateCartDisplay() {
        const cartList = document.querySelector(".listCart");
        if (!cartList) return;

        cartList.innerHTML = cart.map(item => `
            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                <span>${item.name} - €${item.price.toFixed(2)}</span>
                <button class="btn btn-danger btn-sm remove-item" data-id="${item.id}">
                    Rimuovi
                </button>
            </div>
        `).join("");

        // Aggiungi event listeners per rimuovere
        document.querySelectorAll(".remove-item").forEach(btn => {
            btn.addEventListener("click", function() {
                const productId = parseInt(this.getAttribute('data-id'));
                removeFromCart(productId);
            });
        });

        updateTotal();
    }

    // Funzione per rimuovere dal carrello
    async function removeFromCart(productId) {
        cart = cart.filter(item => item.id !== productId);
        updateCartDisplay();
        updateCartCount();

        if (isLoggedIn) {
            try {
                const response = await fetch('php/remove_from_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `product_id=${productId}`
                });

                const result = await response.json();
                if (!result.success) {
                    console.error('Errore database:', result.message);
                }
            } catch (error) {
                console.error('Errore:', error);
            }
        }
    }

    // Aggiorna contatore carrello
    function updateCartCount() {
        const cartCount = document.getElementById("cartCount");
        if (cartCount) {
            cartCount.textContent = cart.length;
        }
    }

    // Aggiorna totale
    function updateTotal() {
        const totalElement = document.querySelector(".totalAmount");
        if (!totalElement) return;

        const subtotal = cart.reduce((sum, item) => sum + item.price, 0);
        const total = subtotal - appliedDiscount;

        totalElement.innerHTML = `
            <strong>Subtotale: €${subtotal.toFixed(2)}</strong>
            ${appliedDiscount > 0 ? `<br><span class="text-success">Sconto: -€${appliedDiscount.toFixed(2)}</span>` : ''}
            <br><strong>Totale: €${total.toFixed(2)}</strong>
        `;
    }

    // Gestione coupon
    document.getElementById("applyCoupon")?.addEventListener("click", function() {
        const couponCode = document.getElementById("couponCode").value.trim().toUpperCase();
        const subtotal = cart.reduce((sum, item) => sum + item.price, 0);

        if (validCoupons[couponCode] && subtotal >= validCoupons[couponCode].minTotal) {
            appliedDiscount = subtotal * validCoupons[couponCode].discount;
            alert(`Coupon ${couponCode} applicato! Sconto: ${validCoupons[couponCode].discount * 100}%`);
        } else {
            appliedDiscount = 0;
            alert("Coupon non valido o importo minimo non raggiunto");
        }

        updateTotal();
    });

    // Gestione checkout
    document.getElementById("checkoutButton")?.addEventListener("click", async function() {
        if (cart.length === 0) {
            alert("Il carrello è vuoto!");
            return;
        }

        if (!confirm("Confermi l'ordine?")) return;

        try {
            let response;

            if (isLoggedIn) {
                // Checkout con salvataggio su database
                response = await fetch('php/checkout.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        products: cart,
                        discount: appliedDiscount
                    })
                });
            } else {
                // Checkout senza salvataggio (solo client-side)
                response = {
                    ok: true,
                    json: async () => ({ success: true })
                };
            }

            const result = await response.json();
            if (result.success) {
                alert("Ordine completato con successo!");
                cart = [];
                appliedDiscount = 0;
                document.getElementById("couponCode").value = "";
                updateCartDisplay();
                updateCartCount();

                if (isLoggedIn) {
                    window.location.href = 'index.php?order_success=true';
                }
            } else {
                alert(result.message || "Errore durante il checkout");
            }
        } catch (error) {
            console.error("Checkout error:", error);
            alert("Si è verificato un errore durante il checkout");
        }
    });

    // Carica il carrello iniziale se loggato
    async function loadInitialCart() {
        if (!isLoggedIn) return;

        try {
            const response = await fetch('php/get_cart.php');
            const data = await response.json();

            if (data.success && data.items) {
                // Sincronizza carrello visivo con database
                cart = data.items.map(item => ({
                    id: item.product_id,
                    name: item.name,
                    price: item.price,
                    quantity: item.quantity
                }));

                updateCartDisplay();
                updateCartCount();
            }
        } catch (error) {
            console.error('Errore caricamento carrello:', error);
        }
    }

    // Inizializzazione
    renderProducts();
    loadInitialCart();
});