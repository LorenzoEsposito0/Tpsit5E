document.addEventListener("DOMContentLoaded", function () {
    let cart = [];
    let discount = 0;
    let appliedDiscount = 0;

    // Dati dei prodotti direttamente nel JavaScript
    const products = [
        { "id": 1, "name": "Felpa Nike Rossa", "price": 60.00, "image": "../Img/FelpaNikeRossa.webp" },
        { "id": 2, "name": "Felpa Nike Nera", "price": 60.00, "image": "../Img/FelpaNera.webp" },
        { "id": 3, "name": "Felpa Nike Blu", "price": 55.00, "image": "../Img/FelpaNike.webp" },
        { "id": 4, "name": "Felpa Nike Verde", "price": 70.00, "image": "../Img/FelpaNikeVerde.webp" },
        { "id": 5, "name": "Pantaloni Nike Neri", "price": 50.00, "image": "../Img/PantaloniNikeNeri.webp" },
        { "id": 6, "name": "Pantaloni Nike Grigi", "price": 45.00, "image": "../Img/PantaloniNikeGrigi.webp" },
        { "id": 7, "name": "Nike Tech Pantaloni", "price": 80.00, "image": "../Img/PantaloniNikeBlu.webp" },
        { "id": 8, "name": "Nike AF1", "price": 100.00, "image": "../Img/Nikeaf1.webp" },
        { "id": 9, "name": "Nike ZM", "price": 110.00, "image": "../Img/Niketn.webp" },
        { "id": 10, "name": "Calze Nike", "price":15.00, "image": "../Img/CalzeNike.webp" },
        { "id": 11, "name": "3 Mutande Nike", "price":30.00, "image": "../Img/Mutande.webp" },
        { "id": 12, "name": "Nike Mercurial blu", "price":180.00, "image": "../Img/NikeMercurialBlu.webp" },
        { "id": 13, "name": "Nike Mercurial bianche", "price":180.00, "image": "../Img/NikeMercurialBianche.webp" },
        { "id": 14, "name": "Nike Toni Kross", "price":250.00, "image": "../Img/Toni.webp" },
    ];

    let validCoupons = {
        "SCONTO10": { discount: 0.10, minTotal: 100 },
        "SCONTO15": { discount: 0.15, minTotal: 150 },
        "SCONTO20": { discount: 0.20, minTotal: 200 }
    };

    function renderProducts() {
        const productsContainer = document.getElementById("product-list");
        productsContainer.innerHTML = "";

        products.forEach(product => {
            const productHTML = `
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="${product.image}" alt="Product">
                        <div class="card-body text-center">
                            <h5 class="fw-bolder">${product.name}</h5>
                            <p class="price">$${product.price.toFixed(2)}</p>
                            <button class="btn btn-outline-dark view-info" data-id="${product.id}">Ottieni informazioni</button>
                            <button class="btn btn-outline-dark add-to-cart" data-id="${product.id}">Add to cart</button>
                        </div>
                    </div>
                </div>
            `;
            productsContainer.innerHTML += productHTML;
        });

        // Reindirizza alla pagina dei dettagli del prodotto
        document.querySelectorAll(".view-info").forEach(button => {
            button.addEventListener("click", function () {
                const productId = this.getAttribute("data-id");
                window.location.href = `product-details.html?id=${productId}`;
            });
        });

        // Aggiungi prodotto al carrello
        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function () {
                const productId = this.getAttribute("data-id");
                const product = products.find(p => p.id == productId);

                if (product) {
                    cart.push({ name: product.name, price: product.price });
                    appliedDiscount = 0;
                    updateCart();
                }
            });
        });
    }

    function updateCart() {
        const cartList = document.querySelector(".listCart");
        cartList.innerHTML = cart.map((item, index) => `
            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                <span>${item.name} - $${item.price.toFixed(2)}</span>
                <button class="btn btn-danger btn-sm remove-item" data-index="${index}">Remove</button>
            </div>
        `).join("");

        document.querySelectorAll(".remove-item").forEach(button => {
            button.addEventListener("click", function () {
                const index = this.getAttribute("data-index");
                cart.splice(index, 1);
                appliedDiscount = 0;
                updateCart();
            });
        });

        updateTotal();
    }

    function updateTotal() {
        let total = cart.reduce((sum, item) => sum + item.price, 0);
        let finalTotal = total - appliedDiscount;

        document.querySelector(".totalAmount").innerHTML = `
            <strong>Totale: $${total.toFixed(2)}</strong> 
            ${appliedDiscount > 0 ? `<br><span class="text-success">Sconto applicato: -$${appliedDiscount.toFixed(2)}</span>` : ""}
            <br><strong>Totale finale: $${finalTotal.toFixed(2)}</strong>
        `;
    }

    document.getElementById("applyCoupon").addEventListener("click", function () {
        const couponInput = document.getElementById("couponCode").value.trim().toUpperCase();
        let total = cart.reduce((sum, item) => sum + item.price, 0);

        if (validCoupons[couponInput]) {
            let coupon = validCoupons[couponInput];

            if (total >= coupon.minTotal) {
                appliedDiscount = total * coupon.discount;
                alert(`Coupon ${couponInput} applicato con successo!`);
            } else {
                appliedDiscount = 0;
                alert(`Il coupon ${couponInput} richiede una spesa minima di $${coupon.minTotal}`);
            }
        } else {
            appliedDiscount = 0;
            alert("Coupon non valido!");
        }
        updateTotal();
    });

    document.querySelector(".checkOut").addEventListener("click", function () {
        if (cart.length === 0) {
            alert("Il carrello è vuoto!");
            return;
        }
        alert("Checkout completato!");
        cart = [];
        appliedDiscount = 0;
        document.getElementById("couponCode").value = "";
        updateCart();
    });

    document.getElementById('refreshButton').addEventListener('click', function() {
        fetch('php/checkout.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ cart: cart })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'index.php?order=success';
                } else {
                    alert('Errore durante il checkout!');
                }
            });
    });
    renderProducts();
});
document.querySelectorAll(".add-to-cart").forEach(button => {
    button.addEventListener("click", function () {
        let productId = this.getAttribute("data-id");

        fetch("cart.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "product_id=" + productId
        })
            .then(response => response.text())
            .then(data => alert(data));
    });
});