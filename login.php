<?php 
session_start();
include('connexion.php');
include('traitement/traite-connexion-professeur.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connexion</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <style>
        html, body {
            height: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
         
        }
    </style>
</head>

<body class="bg-white">
<?php include('menu-page-index.php') ?><br>
    <div class="container">
        <!-- Outer Row -->
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title text-center"><b>Connectez vous</b></h5>
                <form method = "POST" action = "">
                    <div class="form-group">
                        <label for="surname">Email</label>
                        <input type="text" class="form-control" id="email" name ="email" placeholder="Votre Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="passe" name="passe" placeholder="Mot de passe">
                    </div>
                    <button type="submit" name = "envoyer" class="btn btn-primary btn-block">Se connecter</button>
                </form>
<br>
                <div class="alert alert-secondary" role="alert">
                <center>Ou <a href = "">Vous avez oublié votre mot de passe?</a>.<hr>
            Vous n'avez pas de compte ? <a href = "login.php">Enregistrez-vous</a></center>
            </div>  
            </div>  
        </div>
        <?php //include("footer.php") ?> 
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

     <!-- <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="login.js"></script> -->
    
</body>

</html>