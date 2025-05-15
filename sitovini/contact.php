<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti - Vini Preziosi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .contact-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .contact-card:hover {
            transform: translateY(-5px);
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
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="contact.html">Contatti</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Il nostro team</h2>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card contact-card h-100">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Mario Rossi">
                    <div class="card-body text-center">
                        <h5 class="card-title">Mario Rossi</h5>
                        <p class="card-text text-muted">Fondatore & Sommelier</p>
                        <p class="card-text">Con oltre 20 anni di esperienza nel settore enologico, Mario ha selezionato personalmente ogni vino presente nel nostro catalogo.</p>
                        <p class="card-text"><i class="bi bi-envelope"></i> mario@vinipreziosi.it</p>
                        <p class="card-text"><i class="bi bi-phone"></i> +39 345 678 9012</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card contact-card h-100">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Laura Bianchi">
                    <div class="card-body text-center">
                        <h5 class="card-title">Laura Bianchi</h5>
                        <p class="card-text text-muted">Responsabile Vendite</p>
                        <p class="card-text">Laura è a vostra disposizione per consigliarvi la selezione perfetta per ogni occasione e gestire ordini personalizzati.</p>
                        <p class="card-text"><i class="bi bi-envelope"></i> laura@vinipreziosi.it</p>
                        <p class="card-text"><i class="bi bi-phone"></i> +39 345 678 9013</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card contact-card h-100">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Giovanni Verdi">
                    <div class="card-body text-center">
                        <h5 class="card-title">Giovanni Verdi</h5>
                        <p class="card-text text-muted">Responsabile Logistica</p>
                        <p class="card-text">Giovanni garantisce che ogni bottiglia venga imballata con cura e consegnata nel più breve tempo possibile.</p>
                        <p class="card-text"><i class="bi bi-envelope"></i> giovanni@vinipreziosi.it</p>
                        <p class="card-text"><i class="bi bi-phone"></i> +39 345 678 9014</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Scrivici</h3>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Messaggio</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Invia messaggio</button>
                            </div>
                        </form>
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
                    <li><a href="shop.php" class="text-white">Shop</a></li>
                    <li><a href="contact.html" class="text-white">Contatti</a></li>
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
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>