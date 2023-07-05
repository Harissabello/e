<?php
include('connexion.php');
$id_cours = $_GET['id'];
$sqlCours = "SELECT * FROM classe WHERE id = '$id_cours'";
$resultCours = mysqli_query($conn, $sqlCours);

//
$sqlLimitCours = "SELECT * FROM classe LIMIT 3";
$resultLimitCours = mysqli_query($conn, $sqlLimitCours);

//requete pour le module
$sqlM = "SELECT nom_module FROM modules WHERE id_classe_module = '$id_cours'";
$resultM = mysqli_query($conn, $sqlM);
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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('sidebar.php')?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- Inserer le menu -->
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Détails du cours</h6>
                        </div>
                        <div class="card-body">

                             <main class="flex-grow-1">
            <section class="jumbotron text-center bg-info">
                 <?php if(mysqli_num_rows($resultCours) > 0) {
                                        // output data of each row
                                         while($rowCours = mysqli_fetch_assoc($resultCours)) { 
                                         ?>
                <h1 class="jumbotron-heading text-uppercase"> <?php echo  $rowCours["titreClasse"]?></h1>
               <p class="lead">Période de formation : <span class="text-white"><?php echo date('d-m-Y', strtotime($rowCours["dateDebut"]))?> - <?php echo  date('d-m-Y', strtotime($rowCours["dateFin"]))?></span></p>
                                         </p> 
                <!-- <a href="inscription-cours.php?id=<?php echo $rowCours["id"]?>" class="btn btn-primary my-2">M'inscrire au cours</a> -->
            <a href="inscription-cours.php?id=<?php echo $rowCours["id"]?>" class="btn btn-primary my-2">M'inscrire</a>
                                          <?php   
                                }
                                            } else {
                                           echo " <div style='margin-top: 25px;'>
                                                    
                                           </div>";
                                            }
                                           ?>
                    
                   
                
            </section>
            <section>
                 <!-- Collapsable Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Ce que vous apprendrez dans ce cours !</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <?php if(mysqli_num_rows($resultM) > 0) {
                                        // output data of each row
                                         while($rowM = mysqli_fetch_assoc($resultM)) { 
                                         ?>
                                            <!-- <li><?php echo $rowM["nom_module"]?></li> -->
                                            <p><span class="text-success"><i class="bi bi-check-circle-fill mr-2">&radic;</i></span><?php echo $rowM["nom_module"]?></p>
                                          <?php   
                                }
                                            } else {
                                           echo " <div style='margin-top: 25px;'>
                                                  
                                           </div>";
                                            }
                                           ?>
                                        
                                    </div>
                                </div>
                            </div>
            </section>
                      <h3 class="mb-4">D'autres cours qui pourrais vous intéresser !</h3>
            <section class="row">
                 <?php if(mysqli_num_rows($resultLimitCours) > 0) {
                                        // output data of each row
                                         while($rowLimitCours = mysqli_fetch_assoc($resultLimitCours)) { 
                                         ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="img/node-js.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo  $rowLimitCours["titreClasse"]?></h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="info-cours.php?id=<?php echo $rowLimitCours['id']?>" class="btn btn-primary">Voir plus</a>
                                </div>
                                <small class="text-muted">Publié il y a 3 jours</small>
                            </div>
                        </div>

                    </div>
         
                </div>
                           <?php   
                                }
                                            } else {
                                           echo " <div style='margin-top: 25px;'>
                                                    // <h2> Module absent !</h2>
                                           </div>";
                                            }
                                           ?>
            </section>
        </main>
                            
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>