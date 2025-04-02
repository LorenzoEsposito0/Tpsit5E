<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Shop Homepage - Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .cartTab {
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            background: white;
            border-left: 1px solid #ccc;
            padding: 20px;
            box-shadow: -2px 0 5px rgba(0,0,0,0.2);
            z-index: 1000;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s ease;
            transform: translateX(100%);
        }

        .cartTab.active {
            transform: translateX(0);
        }

        .cartTab .listCart {
            max-height: 60vh;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .cartTab .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        #checkoutButton {
            background-color: #0d6efd;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        #checkoutButton:hover {
            background-color: #0b5ed7;
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .product-card {
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body data-logged-in="<?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Vendita sportiva</a>
        <div class="d-flex ms-auto align-items-center" style="margin-right: 220px">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span class="me-3">Ciao <?php echo htmlspecialchars($_SESSION['fullname'] ?? 'Utente'); ?>!</span>
                <div class="cart-icon me-3" id="cartToggle">
                    <i class="bi bi-cart3" style="font-size: 1.5rem;"></i>
                    <span class="cart-count" id="cartCount">0</span>
                </div>
                <a href="php/logout.php" class="btn btn-outline-danger">Logout</a>
            <?php else: ?>
                <span class="me-3">Sessione non trovata!</span>
                <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?php if (isset($_GET['order_success']) && $_GET['order_success'] == 'true'): ?>
        <div class="alert alert-success">
            Il tuo ordine è stato completato con successo!
        </div>
    <?php endif; ?>
</div>

<!-- Modals -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" id="LoginButton">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="php/register.php">
                    <div class="mb-3">
                        <label for="registerName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="registerName" name="registerName" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="registerEmail" name="registerEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="registerPassword" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<header class="bg-dark py-5 mb-4">
    <div class="container text-center text-white">
        <h1 class="display-4">Abbigliamento sportivo Nike</h1>
        <p class="lead">Acquista da noi</p>
    </div>
</header>

<section class="py-5">
    <div class="container">
        <div class="row" id="product-list">
            <!-- Products will be loaded here via JavaScript -->
        </div>
    </div>
</section>

<!-- Cart Sidebar -->
<div class="cartTab" id="cartSidebar">
    <h4 class="mb-4" style="color: black">Shopping Cart</h4>
    <div class="listCart"></div>
    <div class="mt-3">
        <input type="text" id="couponCode" class="form-control" placeholder="Inserisci coupon">
        <button class="btn btn-success mt-2 w-100" id="applyCoupon">Applica Coupon</button>
    </div>
    <div class="totalAmount mt-3" style="color: black"></div>
    <div class="btn mt-3">
        <button id="checkoutButton" class="btn btn-primary w-100">Checkout</button>
    </div>
</div>

<footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-1">&copy; Esposito Lorenzo 5E E-commerce</p>
    </div>
</footer>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<script src="js/script1.js"></script>
<script>
    const isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
    // Toggle cart visibility
    document.getElementById('cartToggle')?.addEventListener('click', function() {
        document.getElementById('cartSidebar').classList.toggle('active');
    });
</script>
</body>
</html>