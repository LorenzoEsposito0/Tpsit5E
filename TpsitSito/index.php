<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Shop Homepage - Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" />
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
            display: block;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Vendita sportiva</a>
        <div class="d-flex ms-auto" style="margin-right: 220px">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Mostra il nome dell'utente e il pulsante di logout -->
                <span class="me-3">Ciao <?php echo htmlspecialchars($_SESSION['fullname']); ?>!</span>
                <a href="php/logout.php" class="btn btn-outline-danger">Logout</a>
            <?php else: ?>
                <!-- Mostra i pulsanti di login e registrazione -->
                <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="return confirmRegistration2()">
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
<!-- Register Modal -->
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

<!-- Your other sections go here -->

<header class="bg-dark py-5">
    <div class="container text-center text-white">
        <h1 class="display-4">Abbigliamento sportivo Nike</h1>
        <p class="lead">Acquista da noi</p>
    </div>
</header>

<section class="py-5">
    <div class="container">
        <div class="row" id="product-list">
            <!-- I prodotti verranno caricati qui dinamicamente -->
        </div>
    </div>
</section>

<div class="cartTab">
    <h4 style="color: black">Shopping Cart</h4>
    <div class="listCart"></div>
    <div class="mt-3">
        <input type="text" id="couponCode" class="form-control" placeholder="Inserisci coupon">
        <button class="btn btn-success mt-2" id="applyCoupon">Applica Coupon</button>
    </div>
    <div class="totalAmount mt-3" style="color: black"></div>
    <div class="btn mt-3" >
        <button id="refreshButton" class="checkOut btn btn-primary">Check Out</button>
        <?php if (isset($_GET['order']) && $_GET['order'] === 'success'): ?>
            <div class="alert alert-success" role="alert">
                Ordine effettuato con successo!
            </div>
        <?php endif; ?>
    </div>
</div>
<footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-1">&copy; Esposito Lorenzo 5E E-commerce</p>
    </div>
</footer>
<script src="js/script.js"></script>
</body>
</html>
