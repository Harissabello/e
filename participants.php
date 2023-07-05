<?php
include('connexion.php');
 session_start();
include('check.php');

//rester sur index si pas session
include('reste-page-index.php');
 $id_formation = $_GET["id"];
   //inscrits affiche
   $sqlInscrit = "SELECT * FROM inscrits WHERE id_formation='$id_formation'";
   $resultInscrit = mysqli_query($conn, $sqlInscrit);

  $sqlN = "SELECT COUNT(*) AS nombre_inscrits FROM inscrits WHERE id_formation = '$id_formation'";
  $resultN = mysqli_query($conn, $sqlN);
  $rowN = mysqli_fetch_assoc($resultN);
  $nombreInscrits = $rowN['nombre_inscrits'];

//formation affiche
   $sqlForm = "SELECT * FROM formation WHERE id_formation='$id_formation'";
   $resultForm = mysqli_query($conn, $sqlForm);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Participants</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
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
               <?php if (mysqli_num_rows($resultForm) > 0) {
  // output data of each row
  while($rowForm = mysqli_fetch_assoc($resultForm)) { 
 ?>
  <h4 ><b><a href = "info_formation.php" class= "texttd">Participants : <?php echo $rowForm["titre"]?></a></b></h4>
  <p class = "texttd">Du <?php echo date('d-m-Y', strtotime($rowForm["debut"]))?>  au <?php echo date('d-m-Y', strtotime($rowForm["fin"]))?><br>


  <?php echo $nombreInscrits?> participants / 20 prévus<br>
  F : 4, M: 5, A : 1<br>
  Coût de la formation/participant : <?php echo $rowForm["montant"]?> frs
  <p>
          <?php   }
} else {
  echo "Aucun info sur la formation !";
}
?>
    <!-- <input type="text" id="searchInput" placeholder="Search...">
    <button onclick="exportTable()">Export as XLS</button> -->
    <font size ="3">
    <table id="dataTable" class="display table-bordered border-primary ">
      <thead>
      <tr>

          <th>Nom et Prénoms</th>
          <th>Email</th>
          <th>Téléphone</th>
          <th>Point total</th>
          <th>Observation</th>
          <th>Action</th>
       
        </tr>
      </thead>
      <tbody>
          <?php if (mysqli_num_rows($resultInscrit) > 0) {
  // output data of each row
  while($rowInscrit = mysqli_fetch_assoc($resultInscrit)) { 
 ?>
 <?php 
 //Valider l'accès à un utilisateur
$acces = "oui";
$em = $rowInscrit["email"];
// Effectuer une requête de sélection pour récupérer l'état actuel dans la base de données
$sql = "SELECT acces FROM inscrits WHERE acces = '$acces' AND email='$em'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $valeurDansBD = $row["acces"];

    if ($valeurDansBD === "non") {
        $buttonState = "enabled"; 
    } else {
        $buttonState = "disabled"; 
    }
} else {
    $buttonState = "enable"; 
}
//Fin Valider l'accès à un utilisateur

 ?>
 
      <tr>
          <td class ="texttd"><?php echo $rowInscrit["nom_prenoms"]?></td>
          <td class ="texttd"><?php echo $rowInscrit["email"]?></td>
          <td class ="texttd"><?php echo $rowInscrit["telephone"]?></td>
          <td class ="texttd"><?php echo $nombreInscrits?></td>
          <td class ="texttd"></td>
          <td>
            <a class="btn btn-outline-danger" href="#" role="button"><i class="fa fa-trash-o"></i></a>
            <input type="hidden" id="buttonValue" value="<?php echo $id_formation; ?>">
            <input type="hidden" id="emailValue" value="<?php echo $rowInscrit["email"]?>">
            <button class="btn btn-outline-danger" id="updateButton" <?php if ($buttonState === 'disabled') echo 'disabled'; ?> onclick="updateDatabase()">Valider accès au cours</button>

        </td>
     </tr>
     <tr>

</tr>
    <?php   }
} else {
  echo "Aucun participants";
}
?>
</thead>

    </table>
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

  <script>
// Appeler la fonction pour récupérer l'état de la base de données lors du chargement de la page
getDatabaseState();

function updateDatabase() {
  // Récupérer la valeur du bouton que vous souhaitez envoyer avec la requête POST
  var buttonValue = document.getElementById('buttonValue').value;
  var emailValue = document.getElementById('emailValue').value;

  // Effectuer la requête AJAX pour mettre à jour la base de données
  // Assurez-vous d'envoyer les données nécessaires au serveur

  // Exemple d'utilisation de la bibliothèque jQuery pour la requête AJAX
  $.ajax({
    url: 'update.php',
    method: 'POST',
    data: {
      buttonValue: buttonValue,
      emailValue: emailValue
    },
    success: function(response) {
      // Mettre à jour l'état du bouton en fonction de la réponse du serveur
      if (response === 'update_success') {
        document.getElementById('updateButton').disabled = true; // Désactiver le bouton
      } else {
        document.getElementById('updateButton').disabled = false; // Activer le bouton
      }
    },
    error: function() {
      // Gérer les erreurs de la requête AJAX
    }
  });
}

  </script>
   <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>