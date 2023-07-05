  <?php
  include('connexion.php');
  session_start();
  include('reste-page-index.php');
  $acces = "oui";
  $id_users = $_GET["id"];
  $sqlFormI = "SELECT formation.* FROM formation JOIN inscrits ON formation.id_formation = inscrits.id_inscrits WHERE inscrits.acces = '$acces' AND inscrits.id_users = '$id_users'";
  $resultFormI = mysqli_query($conn, $sqlFormI);
  

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
    <h4 class= "text-dark"><b>Mes formations achetées</b></h4>
      <!-- <input type="text" id="searchInput" placeholder="Search...">
      <button onclick="exportTable()">Export as XLS</button> -->
      <font size ="3">
      <table id="dataTable" class="display text-dark table-bordered border-primary ">
        <thead>
          <tr>
            <th class ="texttd">Nom Formation</th>
            <th class ="texttd">Période de Formation</th>
            <!-- <th class ="texttd">Diplome/Certificat</th>
            <th class ="texttd">Status</th> -->
            <th class ="texttd">Devoirs</th>
          </tr>
        </thead>
        <tbody>
              <?php if (mysqli_num_rows($resultFormI) > 0) {    
                // output data of each row
                while($rowFormI = mysqli_fetch_assoc($resultFormI)) {
                    $idFormation = $rowFormI["id_formation"];
                    $sqlCountDevoirs = "SELECT COUNT(*) AS countDevoirs FROM devoir WHERE idFormation = '$idFormation'";
                    $resultCountDevoirs = mysqli_query($conn, $sqlCountDevoirs);
                    $rowCountDevoirs = mysqli_fetch_assoc($resultCountDevoirs);
                    $countDevoirs = $rowCountDevoirs["countDevoirs"];   
              ?>
          <tr>
            <td><a href ="info_formation.php" class ="texttd"><b><?php echo $rowFormI["titre"]?></b></a></td>
            <td class ="texttd"><?php echo date('d-m-Y', strtotime($rowFormI["debut"]))?> - <?php echo  date('d-m-Y', strtotime($rowFormI["fin"]))?></td>
            <!-- <td class ="texttd"><?php echo $rowFormI["diplome"]?></td>
            <td class ="texttd"><b>En cours</b></td> -->
            <td>
                <!-- <a href ="" class ="text-success"><button type="button"><i class="fa fa-video-camera text-danger"></i> Conférence</button></a> -->
                <a href="rendu.php?id=<?php echo $rowFormI["id_formation"] ?>" class="text-primary">
                  <button type="button">
                    <i class="fa fa-book text-primary"></i> Devoirs (<?php echo $countDevoirs ?>)
                  </button>
                </a>

            </td>
          </tr>

          <?php   }
          } else {
            echo "Vous n'avez accès à aucun cours !";
          }
          ?>
          <!-- <tr>
          <td><a href ="info_formation.php" class ="texttd"><b>Gestion financiere</b></a></td>
            <td class ="texttd">01/03/2023 - 11/04/2023</td>
            <td class ="texttd">Oui</td>
            <td class ="text-danger" ><b>Fin</b></td>
            <td>
          <a href ="rendu.php"><button type="button"><i class="fa fa-book text-primary"></i> Devoirs (5)</button></a><br>
          Contactez l'organisateur pour votre Diplome/Certificat
            </td>
          </tr> -->
          <!-- <tr>
          <td><a href ="info_formation.php" class ="texttd"><b>Anglais Technique avec Joe</b></a></td>
            <td class ="texttd">01/07/2023 - 11/10/2023</td>
            <td class ="texttd">Oui</td>
            <td class ="texttd"><b>Commence le 01/07/2023</b></td>
            <td class ="texttd">En cours</td>
          </tr> -->
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
          // dom: 'Bfrtip',
          // buttons: [
          //   'excelHtml5',
          //   'print'
          // ]
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