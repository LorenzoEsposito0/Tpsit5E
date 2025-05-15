<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Vini Preziosi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .wine-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .wine-card:hover {
            transform: translateY(-5px);
        }
        .price {
            font-weight: bold;
            color: #8B0000;
        }
    </style>
</head>
<body>
<!-- Navbar (same as homepage) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Vini Preziosi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="shop.html">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contatti</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Product Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">La nostra selezione di vini</h2>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Barolo DOCG">
                    <div class="card-body">
                        <h5 class="card-title">Barolo DOCG</h5>
                        <p class="card-text">Barolo di altissima qualità, proveniente dalle Langhe. Invecchiamento 36 mesi in botte.</p>
                        <p class="price">€89.90</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Brunello di Montalcino">
                    <div class="card-body">
                        <h5 class="card-title">Brunello di Montalcino DOCG</h5>
                        <p class="card-text">Eccellenza toscana, 48 mesi di invecchiamento. Note di ciliegia e spezie.</p>
                        <p class="price">€120.00</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Amarone della Valpolicella">
                    <div class="card-body">
                        <h5 class="card-title">Amarone della Valpolicella</h5>
                        <p class="card-text">Vino veneto corposo, ottenuto da uve appassite. Note di frutta secca e cacao.</p>
                        <p class="price">€75.50</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Chianti Classico Riserva">
                    <div class="card-body">
                        <h5 class="card-title">Chianti Classico Riserva</h5>
                        <p class="card-text">Vino toscano di grande struttura, 24 mesi in legno. Gallo Nero garantito.</p>
                        <p class="price">€45.00</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Bolgheri Superiore">
                    <div class="card-body">
                        <h5 class="card-title">Bolgheri Superiore</h5>
                        <p class="card-text">Eccellenza della costa toscana, blend internazionale di grande classe.</p>
                        <p class="price">€150.00</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Nero d'Avola">
                    <div class="card-body">
                        <h5 class="card-title">Nero d'Avola Riserva</h5>
                        <p class="card-text">Vino siciliano di grande carattere, 18 mesi in barrique. Note di mora e liquirizia.</p>
                        <p class="price">€32.90</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Gavi di Gavi">
                    <div class="card-body">
                        <h5 class="card-title">Gavi di Gavi DOCG</h5>
                        <p class="card-text">Eccellente bianco piemontese da uve Cortese. Freschezza ed eleganza.</p>
                        <p class="price">€28.50</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Prosecco Superiore">
                    <div class="card-body">
                        <h5 class="card-title">Prosecco Superiore DOCG</h5>
                        <p class="card-text">Spumante veneto di altissima qualità, perlage fine e persistente.</p>
                        <p class="price">€22.90</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 9 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Franciacorta Satèn">
                    <div class="card-body">
                        <h5 class="card-title">Franciacorta Satèn</h5>
                        <p class="card-text">Spumante metodo classico lombardo, 36 mesi sui lieviti. Eleganza assoluta.</p>
                        <p class="price">€48.00</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 10 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Etna Rosso">
                    <div class="card-body">
                        <h5 class="card-title">Etna Rosso DOC</h5>
                        <p class="card-text">Vino vulcanico da uve Nerello Mascalese. Mineralità e freschezza uniche.</p>
                        <p class="price">€39.90</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 11 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sagrantino di Montefalco">
                    <div class="card-body">
                        <h5 class="card-title">Sagrantino di Montefalco</h5>
                        <p class="card-text">Vino umbro di grande struttura, 30 mesi in legno. Tannini potenti ma eleganti.</p>
                        <p class="price">€65.00</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 12 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Vermentino di Gallura">
                    <div class="card-body">
                        <h5 class="card-title">Vermentino di Gallura DOCG</h5>
                        <p class="card-text">Bianco sardo di grande carattere, note agrumate e minerali.</p>
                        <p class="price">€25.50</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 13 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Taurasi DOCG">
                    <div class="card-body">
                        <h5 class="card-title">Taurasi DOCG</h5>
                        <p class="card-text">Il "Barolo del Sud" da uve Aglianico. 36 mesi di invecchiamento.</p>
                        <p class="price">€55.00</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 14 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Lambrusco Grasparossa">
                    <div class="card-body">
                        <h5 class="card-title">Lambrusco Grasparossa</h5>
                        <p class="card-text">Vino frizzante emiliano, secco e strutturato. Perfetto con i salumi.</p>
                        <p class="price">€15.90</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>

            <!-- Product 15 -->
            <div class="col-md-4">
                <div class="card wine-card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Soave Classico">
                    <div class="card-body">
                        <h5 class="card-title">Soave Classico DOCG</h5>
                        <p class="card-text">Bianco veneto da uve Garganega. Freschezza ed equilibrio.</p>
                        <p class="price">€18.50</p>
                        <a href="#" class="btn btn-primary">Aggiungi al carrello</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer (same as homepage) -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Vini Preziosi</h5>
                <p>Il miglior e-commerce di vini selezionati.</p>
            </div>
            <div class="col-md-4">
                <h5>Link Utili</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-white">Home</a></li>
                    <li><a href="shop.html" class="text-white">Shop</a></li>
                    <li><a href="contact.php" class="text-white">Contatti</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contatti</h5>
                <p>Email: info@vinipreziosi.it<br>Tel: +39 012 345 6789</p>
            </div>
        </div>
        <div class="text-center mt-3">
            <p>&copy; 2023 Vini Preziosi. Tutti i diritti riservati.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>