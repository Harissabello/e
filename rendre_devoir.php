<?php
include("connexion.php");
session_start();
// include('reste-page-index.php');
if(isset($_GET['id'])){
  $idDevoir = $_GET['id'];
  $sqlDevoirs = "SELECT * FROM devoir WHERE id_devoir = '$idDevoir'";
  $resultDevoirs = mysqli_query($conn, $sqlDevoirs);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes formation achetees</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  
  <style>

.card-img-top {
  object-fit: cover;
  height: 100px;
}
.max-height-im{
    max-height: 200px;
}

.texttd {
    color: black;
  }

th {
    color: black;
  }
  </style>


</head>
<body>

<div class="wrapper">
         <?php include('menu-page-index.php') ?>
  <div class="container">
  <h4 class= "text-dark"><b>Devoir</b></h4>
    <!-- <input type="text" id="searchInput" placeholder="Search...">
    <button onclick="exportTable()">Export as XLS</button> -->
    <font size ="3">
    <div class="card text-dark">
      <?php
      if(mysqli_num_rows($resultDevoirs) > 0) {
        $rowDevoir = mysqli_fetch_assoc($resultDevoirs);
      ?>
  <div class="card-header">
  <?php echo $rowDevoir['titre']?> note /20
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
      <?php echo $rowDevoir['description']?>
        <br>
        <li><a href="">Lien enligne du document</a>
            <li><a href="">Téléchargé le document</a>
    </p>
  </div>
 
  <div class="card-footer text-body-secondary">
  <h5 class="card-title text-center text-dark"><b>Rendre le Devoir</b></h5>
<form action="upload.php" method="POST" enctype="multipart/form-data">
     <div class="form-outline">
    <input type="text" hidden id="name2" name="id_formateur"class="form-control" value='<?php echo $sonid?>' />
     </div>
    <!-- Name input -->
 
     <div>
   <textarea class="form-control mb-2" name="reponse" rows="3" placeholder="Donnez votre reponse"></textarea>
    </div>
    <div class="form-outline">
    <input type="text" hidden id="id_devoir" name="id_devoir" class="form-control" value='<?php echo $rowDevoir['id_devoir']?>' />
    </div>

    <div class="form-outline">
      <?php
        if (isset($_SESSION['id'])) {
          $user = $_SESSION['id'];
  
          // Vérifier si l'utilisateur existe dans la table utilisateurs
          $sqlUser = "SELECT * FROM utilisateurs WHERE id = '$user'";
          $resultUser = mysqli_query($conn, $sqlUser);
          $userI = mysqli_fetch_assoc($resultUser);
          $userId = $userI['id'];
         ?>
    <input type="text" hidden id="id_user" name="id_user" class="form-control" value='<?php echo $userId?>' />
    <?php
      }
      ?>
 
                 <div class="mb-4">
          <label class="form-label text-dark" for="password2">Ajouter un fichier</label>
              <input type="file" id="fichier" name="fichier" class="form-control" />
               </div>
               

                 <div class="form-outline mb-2">
     <label class="form-label text-dark" for="name2">Lien document(Séparer les liens par des virgules)</label>
     <textarea class="form-control mb-2" name="lien" rows="3" placeholder="Donnez votre reponse"></textarea>
     </div>           

                    <button type="submit" name = "envoyer" class="btn btn-danger btn-block">Soumettre votre travail</button>
                </form>
  </div>
</div>

<?php

   }
  ?>
<div class="card form" style="width: 45rem;">
            <div class="card-body">

            </div>  


                                                    <!-- Submit button -->
           <!-- <button type="submit" name="envoyer"class="btn btn-primary btn-block">Créer la classe</button> -->
               </div>
  
     </div>
      </div>



</font>
  </div>
  </div><br>
  <?php include("footer.php") ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
  <script>
    $(document).ready(function() {
      // Initialize DataTable with sorting and export options
      $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'excelHtml5',
          'print'
        ]
      });
    });

    function exportTable() {
      // Trigger the export button click event
      $('.buttons-excel').click();
    }
  </script>

</body>
</html>