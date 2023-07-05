<?php 
include('connexion.php');
include('traitement/traite-inscription-cours.php');

$id_courss = $_GET['id'];
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
                            <h6 class="m-0 font-weight-bold text-primary">Inscription au cours</h6>
                        </div>
                        <div class="card-body bg-gradient-info">
                            <!-- Outer Row -->
        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inscrivez-vous !</h1>
                                    </div>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                       
                                            <input type="text" name="apprenant" hidden class="form-control form-control-user"
                                                id="apprenant" value="<?php echo $id_courss?>">
                                         
                                        </div>
                                        <div class="form-group">
                                               
                                            <input type="text" hidden name="nom" class="form-control form-control-user"
                                                id="nom" placeholder="Nom">
                                                <?php if (isset($errors['nom'])) { ?>
                                                <div class="invalid-feedback"><?php echo $errors['nom']; ?></div>
                                                <?php } ?>

                                               
                                        </div>
                                        <div class="form-group">
                                            <input type="text" hidden name="prenom" class="form-control form-control-user"
                                                id="prenom" placeholder="Prénom">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" hidden name="email" class="form-control form-control-user"
                                                id="email" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="telephone" class="form-control form-control-user"
                                                id="telephone" placeholder="Numéro de téléphone">
                                        </div>
                                        <button type="submit" name="inscription" class="btn btn-primary btn-user btn-block">
                                            S'inscrire
                                        </button>
                                    </form>
                                    <hr>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
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