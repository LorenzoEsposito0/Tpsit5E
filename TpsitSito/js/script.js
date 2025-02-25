document.addEventListener("DOMContentLoaded", function () {
    const cartButton = document.querySelectorAll(".btn-outline-dark");
    const cartItemsContainer = document.getElementById("cart-items");
    const cartCount = document.getElementById("cart-count");
    let cart = [];

    cartButton.forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            
            const productCard = button.closest(".card");
            const productName = productCard.querySelector("h5").innerText;
            const productPrice = productCard.querySelector(".text-center span") ? productCard.querySelector(".text-center span").nextSibling.nodeValue.trim() : productCard.querySelector(".text-center").lastChild.textContent.trim();
            const productImage = productCard.querySelector(".card-img-top").src;

            addToCart(productName, productPrice, productImage);
        });
    });

    function addToCart(name, price, image) {
        let existingItem = cart.find(item => item.name === name);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ name, price, image, quantity: 1 });
        }
        updateCartUI();
    }

    function updateCartUI() {
        cartItemsContainer.innerHTML = "";
        let totalItems = 0;
        
        cart.forEach(item => {
            totalItems += item.quantity;
            let cartItem = document.createElement("li");
            cartItem.classList.add("dropdown-item");
            cartItem.innerHTML = `
                <div class="d-flex align-items-center" style="width: 400px; padding: 15px; font-size: 1.2rem;">
                    <img src="${item.image}" style="width: 80px; height: 80px; object-fit: cover; margin-right: 15px;" alt="${item.name}">
                    <div>
                        <p class="m-0 font-weight-bold">${item.name} </p>
                        <small style="font-size: 1rem;">${item.price}</small>
                        <div class="d-flex align-items-center mt-2">
                            <button class="btn btn-lg btn-outline-secondary me-3" onclick="updateQuantity('${item.name}', -1)">-</button>
                            <span style="font-size: 1.3rem; font-weight: bold;">${item.quantity}</span>
                            <button class="btn btn-lg btn-outline-secondary ms-3" onclick="updateQuantity('${item.name}', 1)">+</button>
                        </div>
                    </div>
                </div>
            `;
            cartItemsContainer.appendChild(cartItem);
        });

        cartCount.innerText = totalItems;
    }

    window.updateQuantity = function(name, change) {
        let item = cart.find(item => item.name === name);
        if (item) {
            item.quantity += change;
            if (item.quantity <= 0) {
                cart = cart.filter(i => i.name !== name);
            }
        }
        updateCartUI();
    }

    // Move cart to the right side of the navbar
    const cartContainer = document.querySelector(".cart");
    cartContainer.style.position = "absolute";
    cartContainer.style.right = "20px";
    cartContainer.style.top = "10px";
});
