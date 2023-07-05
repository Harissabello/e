<?php
include('connexion.php');
 session_start();
include('check.php');
include('reste-page-index.php');
// $id_utilisateur = $_GET["id"];
 //Affiche formations
  $id_formation = $_GET["id"];

   //programme affiche
   $sqlProgramme = "SELECT * FROM programme WHERE id_formations='$id_formation'";
   $resultProgramme = mysqli_query($conn, $sqlProgramme);
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
  <h4 class= "text-dark"><b>Faire le programme de formation pour : Gestion financière</b></h4>
  <p>  <a href="ajout_programme.php?id=<?php echo $id_formation ?>" class="btn btn-primary">+ Ajouter un programme</a><br>
 
  <!-- <input type="text" id="searchInput" placeholder="Search...">
    <button onclick="exportTable()">Export as XLS</button> -->
    <font size ="3">
    <table id="dataTable" class="display table-bordered border-primary ">
      <thead>
      <tr>
          <th>Periode</th>
          <th>Titre</th>
          <th>Contenu</th>
          <th>Action</th>
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
          <td class ="texttd"><?php echo $rowProgramme["contenu"]?></td>
          <td>
          <b><p><a href ="" class = "text-warning">Modifier</a> 
          <a href ="" class = "text-danger">Supprimer</a></p></b>
          </td>
     </tr>

    <?php   }
} else {
  echo "0 results";
}
?>
      
      
        <!-- Add more rows as needed -->
      </tbody>
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
 <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>