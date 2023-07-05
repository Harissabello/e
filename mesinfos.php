<?php
 include('connexion.php');
session_start();

include('reste-page-index.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mes infos</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
<?php include('menu-page-index.php') ?>
<br>
    <div class="container">

    <div class="card" style="width: 35rem;">
            <div class="card-body">
                <h5 class="card-title text-center"><b>Mes informations</b></h5>
                <form method = "POST" action = "">
                    <div class="form-group">
                        <label for="surname">Nom complet</label>
                        <input type="text" class="form-control" id="surname" name ="surname" placeholder="Votre nom et prénoms">
                    </div>

                    <div class="form-group">
                        <label for="surname">Email</label>
                        <input type="text" class="form-control" id="surname" name ="surname" placeholder="Votre Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                    </div>
                    <button type="submit" name = "submit" class="btn btn-primary btn-block">Modifier</button>
                </form>
            </div> 
           
    </div>
    <?php //include('footer.php') ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>