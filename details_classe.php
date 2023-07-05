<?php 
include('connexion.php');
include('traitement/traite-insert-lien.php');
// include('traitement/traite-insert-module.php');
session_start();

@$id_formateur = $_GET["id"];

// $sqlL = "SELECT nom_lien FROM liens WHERE id_classe = '$id_formateur'";
// $resultL = mysqli_query($conn, $sqlL);

//requete pour le module
// $sqlM = "SELECT nom_module FROM modules WHERE id_classe_module = '$id_formateur'";
// $resultM = mysqli_query($conn, $sqlM);

//affichage
$sqlD = "SELECT * FROM devoirs WHERE id_formateur_devoir = '$id_formateur' ORDER BY id_devoirs DESC";
$resultD = mysqli_query($conn, $sqlD);

// @$id_class = $_GET['id'];
// $sqlD = "SELECT * FROM classe WHERE id = '$id_'";
// $resultD = mysqli_query($conn, $sqlD);

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

    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .collapse-arrow {
            transition: transform 0.3s;
        }

        .collapse.show + .card-header .collapse-arrow {
            transform: rotate(-180deg);
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <?php include('sidebar.php')?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
   <!-- Menu de la page -->
        <?php include('menu.php')?>
            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8 mb-2">
                            <div class="card text-center">
                                <div class="card-body d-flex flex-row justify-content-center">
                                    <a href="#" class="btn btn-primary mx-2" data-toggle="modal"
                                        data-target="#devoir">Ajouter un devoir</a>
                                    <!-- <a href="#" class="btn btn-primary mx-2" data-toggle="modal"
                                        data-target="#ajouter-document-modal">Ajouter lien</a>
                                    <a href="#" class="btn btn-primary mx-2" data-toggle="modal"
                                        data-target="#module">Ajouter un module</a> -->
                                    <a href="liste-inscrit.php?id=<?php echo $id_formateur?>" class="btn btn-primary mx-2">Liste des inscrits</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                   <!-- Modal pour ajouter un devoir -->
                <div class="modal fade" id="devoir" tabindex="-1" role="dialog"
                    aria-labelledby="devoir-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="devoir-label">Ajouter un devoir</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <p>Cliquez sur le bouton ci-dessous pour ajouter un lien dans le champs :</p> -->
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control" hidden name="formateur" id=""
                                            value="<?php echo $id_formateur ?>">
                                            <label for="">Titre du devoir</label>
                                        <input type="text" class="form-control" name="titre" id="lien-eleve"
                                            placeholder="Entrez le lien">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contexte du devoir</label>
                                         <textarea class="form-control mb-4" name="contenu" rows="3" placeholder="détails"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lien</label>
                                        <input type="text" class="form-control" name="lien" id="lien-eleve"
                                            placeholder="Entrez le lien">
                                    </div>

                                     <div class="form-group">
                                        <label for="fichier">Ajouter un document</label>
                                        <input type="file" class="form-control-file" id="fichier" name="fichier">
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="valide">Valider</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal pour ajouter un lien -->
                <div class="modal fade" id="ajouter-document-modal" tabindex="-1" role="dialog"
                    aria-labelledby="ajouter-document-modal-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajouter-document-modal-label">Ajouter un lien</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <p>Cliquez sur le bouton ci-dessous pour ajouter un lien dans le champs :</p> -->
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" hidden name="classe" id=""
                                            value="<?php echo $id_formateur ?>">
                                        <input type="text" class="form-control" name="lien" id="lien-eleve"
                                            placeholder="Entrez le lien">
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="envoyer">Valider</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>


                <!-- Modal pour ajouter un module -->
                <div class="modal fade" id="module" tabindex="-1" role="dialog"
                    aria-labelledby="module" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="module">Ajouter un module</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <p>Cliquez sur le bouton ci-dessous pour ajouter un module dans le champs :</p> -->
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" hidden name="classe" id=""
                                            value="<?php echo $id_formateur ?>">
                                        <input type="text" class="form-control" name="module" id="module"
                                            placeholder="Entrez le nom du module">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="moduler">Valider</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>



                <!-- Modal pour ajouter un document -->
                <div class="modal fade" id="doc" tabindex="-1" role="dialog"
                    aria-labelledby="ajouter-document-modal-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="doc-label">Ajouter un document</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="fichier">Sélectionnez un fichier</label>
                                        <input type="file" class="form-control-file" id="fichier">
                                    </div>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"></h1>

                    <!-- DataTales Example -->
                     <?php if(mysqli_num_rows($resultD) > 0) {
                                        // output data of each row
                                         while($rowD = mysqli_fetch_assoc($resultD)) { 
                                         ?>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3" onclick="toggleCollapse(this)">                               
                                        <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?php echo $rowD["titre"]?></h6>
                                        <span class="collapse-arrow"><i class="fas fa-chevron-down"></i></span>
                                    </div>
                                    <div class="card-body collapse">

                                            
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Boîte de gauche -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- Contenu de votre base de données ici -->
                                    
                                     <div>
                                    <h3 class="text-dark">Contenu du cours</h3>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur maiores eum
                                        officiis harum! Hic alias eveniet quisquam molestiae dolore quia aperiam?
                                        Reiciendis iste neque commodi sunt quam error quisquam maiores.</p>
                                </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Boîte de droite -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- Contenu de votre base de données ici -->
                                 
                                    <div class="mb-3">
                                        <h5 class="text-dark text-decoration-underline">Liens pour le cours</h5>
                                        <p class="card-text"><ul><li><a href="<?php echo $rowD["lien"]?>"><?php echo $rowD["lien"]?></a></li></ul></p>
                                    </div>

                                    <div>
                                        <h5 class="text-dark text-decoration-underline">Documents</h5>
                                        <div class="iframe-download">
                                       <ul><li><a href="<?php echo $rowD['fichier']; ?>" download> Télécharger le document </a></li></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               
                        </div>
                       
                    </div>
                                       
                                    </div>
                                </div>




                     <?php   
                                }
                                            } else {
                                           echo " <div style='margin-top: 25px;'>
                                                    <h2> Aucun devoir disponible !</h2>
                                           </div>";
                                            }
                                           ?>

                </div>
                
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
        function toggleCollapse(element) {
    var collapseElement = element.nextElementSibling;
    collapseElement.classList.toggle('show');
}

    </script>


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