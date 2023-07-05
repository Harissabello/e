<?php 
include('connexion.php');
session_start();
include('check.php');
include('reste-page-index.php');
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
    <title>Enregistrer une formation</title>
    <style>

.card-img-top {
  object-fit: cover;
  height: 100px;
}
.max-height-im{
    max-height: 200px;
}
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
<body>
     <div class="wrapper">
         <?php include('menu-page-index.php') ?>
    <div class="container"><br>
   
    
<div class="card form" style="width: 45rem;">
            <div class="card-body">
                <h5 class="card-title text-center text-dark"><b>Rendre le devoir : Entreprise XYZ</b></h5>
<form action="" method="POST" enctype="multipart/form-data">
     <div class="form-outline">
     </div>
    <!-- Name input -->
   
   <textarea class="form-control mb-2" name="description" rows="3" placeholder="Contenu"></textarea>
    </div>
 
                 <div class="mb-4">
          <label class="form-label text-dark" for="password2">Ajouter un fichier</label>
              <input type="file" id="fichier" name="fichier" class="form-control" />
               </div>
               

                 <div class="form-outline mb-2">
     <label class="form-label text-dark" for="name2">Lien de documents</label>
      <input type="text" id="doc" name="doc" class="form-control" placeholder="La video de présentation de la formation"/>
     </div>           

                    <button type="submit" name = "envoyer" class="btn btn-primary btn-block">Soumettre le devoir</button>
                </form>
            </div>  


                                                    <!-- Submit button -->
           <!-- <button type="submit" name="envoyer"class="btn btn-primary btn-block">Créer la classe</button> -->
          </form>
               </div>
  
     </div>
      </div>



<br>


<br>
    </div>
  
    </div>
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