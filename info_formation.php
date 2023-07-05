<?php
include('connexion.php');
 session_start();
include('check.php');
// include('reste-page-index.php');
  $id_formation = $_GET["id"];

  if (isset($_SESSION['email'])) {
    $inscription = "inscription-formation.php?id=" . $id_formation;
} else {

    $inscription = "login.php";
}

   //formation affiche
   $sqlForm = "SELECT * FROM formation WHERE id_formation='$id_formation'";
   $resultForm = mysqli_query($conn, $sqlForm);

   
   //programme affiche
   $sqlProgramme = "SELECT * FROM programme WHERE id_formations='$id_formation'";
   $resultProgramme = mysqli_query($conn, $sqlProgramme);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Information sur la formation</title>
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
.card {
  border: none;
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
  <div class="card mb-3" style="max-width: 1020px;">
  <div class="row g-0">
    
    <div class="col-md-8">
      <div class="card-body">
           <?php if (mysqli_num_rows($resultForm) > 0) {
  // output data of each row
  while($rowForm = mysqli_fetch_assoc($resultForm)) { 
 ?>
      <h4 class = "text-primary"><b>Formation : <?php echo $rowForm["titre"]?></b></h4>
  <p class = "texttd">Du <?php echo date('d-m-Y', strtotime($rowForm["debut"]))?>  au <?php echo date('d-m-Y', strtotime($rowForm["fin"]))?><br>
  10 participants enregistrés / 20 prévus<br>
  F : 4, M: 5, A : 1<br>
  Coût de la formation/participant : <?php echo $rowForm["montant"]?> XOF
  <hr>
  <h5 class= "texttd"><b>La formation</b></h5>
  <p class= "texttd"><?php echo $rowForm["des_formation"]?>
  </p>
  <h5 class= "texttd"><b>Emploi du temps</b></h5>
  <p class= "texttd">La formation se déroulera : <?php echo $rowForm["emploi_temps"]?>
  </p>
  <h5 class= "texttd"><b>Programme de formation</b></h5>
  
  <p class="text-"></p>
    <!-- <input type="text" id="searchInput" placeholder="Search...">
    <button onclick="exportTable()">Export as XLS</button> -->
    <font size ="3">
    <table id="dataTable" class="display table-bordered border-primary ">
      <thead>
      <tr>
          <th>Periode</th>
          <th>Titre</th>
          <th>Contenu</th>

        </tr>
      </thead>
      <tbody>
         <?php if (mysqli_num_rows($resultProgramme) > 0) {
  // output data of each row
  while($rowProgramme = mysqli_fetch_assoc($resultProgramme)) { 
 ?>
      <tr>
          <td class ="texttd"><?php echo $rowProgramme["periode"]?></td>
          <td class ="texttd"><?php echo $rowProgramme["titre"]?></td>
          <td class ="texttd">
         <?php echo $rowProgramme["contenu"]?>
          </td>
     
     </tr>
         <?php   }
} else {
  echo "Aucun programme en cours";
}
?>
  
      

        <!-- Add more rows as needed -->
      </tbody>
    </table>
</font>
<h5 class= "texttd"><b>Organisateur</b></h5>
  <p class= "texttd"> <?php echo $rowForm["organisateur"]?></p>
  <p>

<h5 class= "text-danger"><b>Termes et Conditions</b></h5>
    <p class= "texttd text-justify">
    <?php echo $rowForm["conditions"]?>
    </p>


    <p><a href ="<?php echo $inscription?>"><button type="button" class="btn btn-outline-danger">S'inscrire pour la formation</button></a></p>

      </div>
    </div>
    <div class="col-md-4"><br>
    <iframe width="320" height="250" src="https://www.youtube.com/embed/lcZDWo6hiuI"> </iframe>
    </div>

  </div>
</div>
  
  </div>
    <?php   }
} else {
  echo "Aucun info sur la formation !";
}
?>

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
      {
        extend: 'print',
        text: 'Télécharger la fiche de formation'
      }
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