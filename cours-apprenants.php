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

@$id_formateur = base64_decode($_GET["id"]);
$sql = "SELECT * FROM classe WHERE id_formateur = '$id_formateur'";
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
                                    <!-- Content Row -->
                                    <!-- <div class="d-flex flex-row"> -->
                                    <!-- Earnings (Monthly) Card Example -->
                                    <!-- col-xl-3 col-md-6 mb-4 -->
                                    
                                    <div class="col-xl-3 col-md-6 mt-4">
                                      <a href="details_classe.php?id=<?php echo $row["id"]; ?>" class="text-decoration-none">
                                        <div class="card border-left-primary shadow h-100 py-2 taille">
                                            <div class="card-body">
                                                <div class="no-gutters align-items-center">
                                                    <div class="mr-2">
                                                        <div
                                                            class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            <?php echo  $row["titreClasse"]?>
                                                        </div>

                                                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                            <?php echo $row["dateDebut"]?> -
                                                            <?php echo  $row["dateFin"]?>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-auto">
                                                         <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                         </div> -->
                                                </div>

                                            </div>
                                        </div>
                                          </a>
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