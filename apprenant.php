<?php 
include('connexion.php');
include('traitement/traite-creation-classe.php');
 session_start();

 //Hashag lien
 $link ="details_classe.php";
 $hash = hash('sha256', $link);
 if(!isset($_SESSION['email'])){
  	header("location:index.php");
    }
$sql = "SELECT * FROM classe";
$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
          .card {
      width: 400px;
      border-radius: 20px;
      overflow: hidden;
    }
    
    .circle {
      position: relative;
      width: 150px;
      height: 150px;
      background-color: #f2f2f2;
      border-radius: 50%;
      transition: transform 0.3s ease;
      margin: 0 auto;
      margin-top: 20px;
      overflow: hidden;
    }
    
    .circle:hover {
      transform: scale(1.1);
    }
    
    .image {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .card-body {
      padding: 20px;
      text-align: center;
    }
    
    .card-title {
      margin-top: 20px;
    }
    
    .card-text {
      margin-bottom: 10px;
    }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include('sidebar-apprenant.php')?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Menu de la page -->
                <?php include('menu-apprenant.php')?>
                <!-- Fin Menu de la page -->


                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="col-md-12">
                            <!-- d-flex flex-column -->
                            <div class="d-flex flex-column p-3 h-100">
                                <!-- <h1>Mon Contenu</h1> -->

                                <div class="row flex-row">
                                    <?php if(mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                         while($row = mysqli_fetch_assoc($result)) { 
                                         ?>

                                    <div class="card col-md-4 mr-4 mb-2">
                                        <div class="circle">
                                            <img src="<?php echo $row['images']; ?>" alt="Image" class="image">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title text-success text-uppercase"><?php echo  $row["titreClasse"]?></h5>
                                            <p class="text-primary"><?php echo  $row["Montant"]?> F.CFA</p>
                                             <h6 class="text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore magni, aut repellendus aliquam alias culpa soluta asperiores ducimus excepturi sed a provident quaerat quisquam eius? At minus pariatur dolore porro?</h6>
                                             <div class="row">
                            <div class="col-auto">
                                <a href="info-cours.php?id=<?php echo $row['id']?>" class="btn btn-primary">Voir plus</a>
                            </div>
                            <div class="col-auto">
                                <p><?php if ($row['dateDebut'] <= date('Y-m-d')) { ?>
                                    <?php 
                                    ?>
                                    <div class='ml-4 text-success'>Commencé</div>
                                    <?php

                                    }else{ ?>
                                    <?php
                                    ?>
                                         <div class='ml-4 text-success'>En cours</div>
                                        <?php
                                    }?></p>
                            </div>
                        </div>
                                        </div>
                                    </div>

                                    <!-- </div> -->
                                    <!--Fin Content Row -->

                                    <?php   
                                    }
                                            } else {
                                           echo " <div style='margin-top: 25px;'>
                                                    <h2> Vous n'avez pas encore créé de classe !</h2>
                                           </div>";
                                            }
                                           ?>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</html>