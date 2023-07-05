<?php 
include('connexion.php');
 session_start();
include('check.php');
// if(!isset($_SESSION['email'])){
//   //  include('menu-page-index.php');
//     //   header("location:professeur.php");
//   }else{
//     // include('menu-page-index.php');
//   }
//  if(isset($_SESSION['email'])){
//   header("location:index.php");
//     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <link href="css/footer.css" rel="stylesheet">
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <style>

.card-img-top {
  object-fit: cover;
  height: 100%;
}
.max-height-im{
    max-height: 200px;
}

  </style>

</head>
<body>
        <?php include('menu-page-index.php') ?>
         <?php include("listformation.php") ?>
        <?php include("footer.php") ?>

      <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>