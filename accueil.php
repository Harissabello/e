<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Learning</title>
    
</head>
<body>
<div class="container-fluid m-0">
 <header>
<nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    À propos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Notre entreprise</a>
                    <a class="dropdown-item" href="#">Notre équipe</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Contactez-nous</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Connexion</a>
            </li>
        </ul>
    </div>
</nav>
</header>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-3">
            <img src="image1.jpg" class="card-img-top" alt="Image 1">
            <div class="card-body">
                <h5 class="card-title">Titre 1</h5>
                <p class="card-text">Description de la carte 1.</p>
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3">
            <img src="image2.jpg" class="card-img-top" alt="Image 2">
            <div class="card-body">
                <h5 class="card-title">Titre 2</h5>
                <p class="card-text">Description de la carte 2.</p>
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3">
            <img src="image3.jpg" class="card-img-top" alt="Image 3">
            <div class="card-body">
                <h5 class="card-title">Titre 3</h5>
                <p class="card-text">Description de la carte 3.</p>
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
    </div>
</div>
</div>
    
</body>
</html>