<?php 
include('connexion.php');
session_start();
include('check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <!-- <link href="css/footer.css" rel="stylesheet"> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <title>Document</title>
    <style>

.card-img-top {
  object-fit: cover;
  height: 100px;
}
.max-height-im{
    max-height: 200px;
}

  </style>

</head>
<body>
  <?php
  if(isset($_GET['sector'])){
    $sector = $_GET['sector'];
    if($sector == "formation"){
        include "listformation.php";
    }else if($sector == "mescours"){
        include "mescours.php";
    }else if($sector == "mesachats"){
        include "mesachat.php";
    }
  }else{
    include "listformation.php";
  }
 
  
  ?>
        <?php include("footer.php") ?>

      <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>