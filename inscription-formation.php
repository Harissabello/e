<?php 
include('connexion.php');
 session_start();
include('traitement/traite-creation-programme.php');
include('traitement/traite-inscription-cours.php');
include('reste-page-index.php');
// include('check.php');
$id_formations = $_GET["id"];

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
    <title>Ajouter un Programme</title>
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
    <h5 class="card-title text-center text-dark"><b>Inscription à la formation</b></h5>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-outline">
    <input type="text" hidden id="acces" name="acces" class="form-control" value="non"/>
     </div>
     <div class="form-outline">
    <input type="text" hidden id="id_formation" name="id_formation" class="form-control" value='<?php echo $id_formations?>' />
     </div>
     <div class="form-outline">
      <?php  if(isset($_SESSION['email'])) {
        $sqlUser = "SELECT * FROM utilisateurs WHERE email='" . $_SESSION['email'] . "'";
        $resultUser = mysqli_query($conn, $sqlUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
         $iduser = $rowUser["id"];
         ?>
    <input type="text" hidden id="id_user" name="id_user" class="form-control" value='<?php echo $iduser?>' />
    <?php
      }
      ?>
     </div>
    <!-- Name input -->
     <div class="form-outline mb-2">
     <label class="form-label text-dark" for="name2">Nom et prénoms</label>
      <input type="text" id="nom" name="nom" class="form-control" />
     </div>
     <div class="form-outline mb-2">
     <label class="form-label text-dark" for="name2">Email</label>
      <input type="text" id="email" name="email" class="form-control" />
     </div>
     <div class="form-outline mb-2">
   <label class="form-label text-dark" for="name2">Téléphone</label>
      <input type="text" id="telephone" name="telephone" class="form-control" />
    </div>
     
    <button type="submit" name ="inscrire" class="btn btn-primary btn-block">M'inscrire</button>
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