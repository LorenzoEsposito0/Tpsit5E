<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viteviside - Eccellenza Enologica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="shop.php">
            <i class="bi bi-cup-hot me-2"></i>Viteviside
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contatti</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Viteviside</h1>
        <p class="lead fs-4 mb-5">Scopri la nostra selezione di vini pregiati provenienti dalle migliori cantine italiane ed internazionali</p>
        <a href="shop.php" class="btn btn-primary btn-lg px-4">Esplora il nostro shop</a>
    </div>
</section>

<!-- Introduction -->
<section class="py-5 introduction-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                     alt="Vigna" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h2 class="mb-4">La nostra storia</h2>
                <p class="wine-feature">Fondata nel cuore della Toscana, Viteviside nasce dalla passione per il vino e il territorio. Da oltre 30 anni selezioniamo le migliori produzioni enologiche per portare sulle vostre tavole l'eccellenza italiana.</p>
                <p>Ogni bottiglia racconta una storia: quella del terreno, del clima e delle mani che hanno curato ogni fase della produzione. La nostra missione è farvi scoprire queste storie attraverso vini unici e memorabili.</p>
            </div>
        </div>
    </div>
</section>

<!-- Trust Indicators -->
<section class="py-5 bg-light trust-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="trust-box text-center">
                    <i class="bi bi-truck fs-1 text-primary mb-3"></i>
                    <h3>Spedizione Rapida</h3>
                    <p>Consegna in 24/48 ore in tutta Italia</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="trust-box text-center">
                    <i class="bi bi-shield-check fs-1 text-primary mb-3"></i>
                    <h3>Pagamenti Sicuri</h3>
                    <p>Transazioni protette e cifrate</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="trust-box text-center">
                    <i class="bi bi-star fs-1 text-primary mb-3"></i>
                    <h3>Vini Selezionati</h3>
                    <p>Curati da esperti sommelier</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-5 bg-dark text-white newsletter-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-4">Iscriviti alla nostra newsletter</h2>
                <p class="mb-4">Ricevi offerte esclusive e scopri per primo le nuove annate</p>
                <form class="row g-3 justify-content-center">
                    <div class="col-md-8">
                        <input type="email" class="form-control" placeholder="La tua email">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Iscriviti</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-4 footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h5>Viteviside</h5>
                <p>La passione per il vino da oltre 30 anni.</p>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <h5>Link veloci</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">Shop</a></li>
                    <li><a href="#" class="text-white">Contatti</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contatti</h5>
                <p><i class="bi bi-envelope me-2"></i> info@viteviside.it</p>
                <p><i class="bi bi-telephone me-2"></i> +39 0123 456789</p>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">&copy; 2023 Viteviside. Tutti i diritti riservati.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>