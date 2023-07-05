<?php
include('connexion.php');
$id_cours = $_GET['id'];
$sqlCours = "SELECT * FROM classe WHERE id = '$id_cours'";
$resultCours = mysqli_query($conn, $sqlCours);

//
$sqlLimitCours = "SELECT * FROM classe LIMIT 3";
$resultLimitCours = mysqli_query($conn, $sqlLimitCours);

//requete pour le module
// $sqlM = "SELECT nom_module FROM modules WHERE id_classe_module = '$id_cours'";
// $resultM = mysqli_query($conn, $sqlM);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* Ratio 16:9 pour les vidéos */
            height: 0;
            overflow: hidden;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
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
    <div class="wrapper">
        <?php include('menu-page-index.php') ?>
        <div class="container-fluid m-0">

            <main class="flex-grow-1">
                <section class="jumbotron text-center bg-info mt-2">
                    <?php if(mysqli_num_rows($resultCours) > 0) {
                                        // output data of each row
                                         while($rowCours = mysqli_fetch_assoc($resultCours)) { 
                                         ?>
                    <h1 class="jumbotron-heading text-uppercase text-dark">
                        <?php echo  $rowCours["titreClasse"]?>
                    </h1>
                    <p class="lead text-dark">Période de formation : <span class="text-white">
                            <?php echo date('d-m-Y', strtotime($rowCours["dateDebut"]))?> -
                            <?php echo  date('d-m-Y', strtotime($rowCours["dateFin"]))?>
                        </span></p>
                    </p>
                    <!-- <a href="inscription-cours.php?id=<?php echo $rowCours["id"]?>" class="btn btn-primary my-2">M'inscrire au cours</a> -->
                    <a href="login.php" class="btn btn-primary my-2">M'inscrire</a>
                        <!-- <button class="btn btn-primary my-2" id="monBouton"><a href="login.php">M'inscrire</a></button> -->



                </section>
                <section>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Boîte de gauche -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- Contenu de votre base de données ici -->
                                    <div>
                                        <h3 class="card-title text-primary">Description du cours</h3>
                                        <p>
                                            <?php echo  $rowCours["descriptionCours"]?>
                                        </p>

                                    </div>
                                    <div class="mb-3">
                                        <h3 class="text-primary">Programme de formation</h3>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>

                                    
                                     <div>
                                    <h3 class="text-primary">Infos formateur</h3>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur maiores eum
                                        officiis harum! Hic alias eveniet quisquam molestiae dolore quia aperiam?
                                        Reiciendis iste neque commodi sunt quam error quisquam maiores.</p>
                                </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-6 h-75">
                            <!-- Boîte de droite -->
                            <div class="card" style="">
                                <div class="card-body">
                                    <!-- Contenu de votre vidéo ici -->
                                    <h5 class="card-title"></h5>
                                    <div class="embed-responsive embed-responsive-16by9 video-container">
                                        <iframe width="500" height="320"
                                            src="https://www.youtube.com/embed/lcZDWo6hiuI"> </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <?php   
                                }
                                            } else {
                                           echo " <div style='margin-top: 25px;'>
                                                    
                                           </div>";
                                            }
                                           ?>
                <h3 class="mb-4">D'autres cours qui pourrais vous intéresser !</h3>
                <section class="row">
                    <?php if(mysqli_num_rows($resultLimitCours) > 0) {
                                        // output data of each row
                                         while($rowLimitCours = mysqli_fetch_assoc($resultLimitCours)) { 
                                         ?>
                    <div class="col-md-3">
                <a href="info-cours.php?id=<?php echo $rowLimitCours['id']?>" class="text-decoration-none">
                <div class="card mb-3">
                    <img src="<?php echo $rowLimitCours['images']; ?>" class="card-img-top img-fluid max-height-im" alt="Image 1">
                    <div class="card-body">
                        <h5 class="card-title text-success">
                            <?php echo  $rowLimitCours["titreClasse"]?>
                        </h5>

                        <p class="text-primary"><?php echo  $rowLimitCours["Montant"]?> F.CFA</p>
                        <h6 class="text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore magni, aut repellendus aliquam alias culpa soluta asperiores ducimus excepturi sed a provident quaerat quisquam eius? At minus pariatur dolore porro?</h6>
                        <div class="row">
                            <div class="col-auto">
                                <a href="info-cours.php?id=<?php echo $rowLimitCours['id']?>" class="btn btn-primary">Voir plus</a>
                            </div>
                            <!-- <div class="col-auto">
                                <p>Commencé</p>
                            </div> -->
                        </div>
                       
                    </div>
                </div>
                 </a>
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

    <?php include("footer.php") ?>
    


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>