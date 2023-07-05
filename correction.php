<?php
 include('connexion.php');
session_start();

include('reste-page-index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Devoir à corriger</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  
  <style>
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
  <h4 class= "text-dark"><b>Correction devoir Entreprise XYZ</b></h4>
    <!-- <input type="text" id="searchInput" placeholder="Search...">
    <button onclick="exportTable()">Export as XLS</button> -->
    <font size ="3">
    <table id="dataTable" class="display table-bordered border-primary ">
      <thead>
      <tr>

          <th>Apprenant</th>
          <th>Contenu</th>
          <th>Note</th>
       
        </tr>
      </thead>
      <tbody>
      <tr>
          <td class ="texttd">YAO Ndri<br>
            yao@gmail.com
          </td>
          <td class ="texttd">
            <li><a href="correct_rendu.php">Afficher rendu</a>
          </td>
        <td>
       <p class="text-danger">Pas encore corrigé</p>
        </td>
     </tr>
     <tr>
          <td class ="texttd">Mamadou franck<br>
            yao@gmail.com
          </td>
          <td class ="texttd">
            <li><a href="correct_rendu.php">Afficher rendu</a>
          </td>
        <td class ="texttd">
         Note : 10/20<br>Passable
        </td>
     </tr>
      
      
      
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

</body>
</html>