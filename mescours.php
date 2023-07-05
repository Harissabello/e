<?php
 include('connexion.php');
session_start();

include('reste-page-index.php');

// Clé de chiffrement AES (16 caractères)
$encryptionKey = "CeCiEsTm0nS@ltS3cRet";
     $emailutilisateur = $_GET["id"];

$decryptedId = openssl_decrypt($emailutilisateur, "AES-128-ECB", $encryptionKey);

     $sql = "SELECT * FROM utilisateurs WHERE id='$decryptedId'";
    $checke = mysqli_query($conn, $sql);
    $rowIndex = mysqli_fetch_assoc($checke);

    //Affiche formations
   $sqlF = "SELECT * FROM formation WHERE id_users='$decryptedId'";
   $resultF = mysqli_query($conn, $sqlF);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes sessions de formation</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <link href="css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <h4 class="text-dark"><b>Mes sessions de formation</b></h4>
            <p> <a href="maketraining.php?id=<?php echo $rowIndex["id"];?>" class="btn btn-primary">+ Ajouter une
                    formation</a><br>
                <font size="3">
                    <table id="dataTable" class="display table-bordered border-primary ">
                        <thead>
                            <tr>
                                <th>Formation</th>
                                <th>Période</th>
                                <th>Diplome/Certificat</th>
                                <th>Participants max.</th>
                                <th>Montant</th>
                                <th>Action</th>
                                <th>Autres</th>
                            </tr>
                        </thead>
                            
                        <tbody>

                            <?php if(mysqli_num_rows($resultF) > 0) {
                                    // output data of each row
                                while($rowF = mysqli_fetch_assoc($resultF)) { 
                                    ?>
                             <?php //les inscrits
            $sqlN = "SELECT COUNT(*) AS nombre_inscrits FROM inscrits WHERE id_formation = ' " . $rowF["id_formation"]. " '";
             $resultN = mysqli_query($conn, $sqlN);
             $rowN = mysqli_fetch_assoc($resultN);
             $nombreInscrits = $rowN['nombre_inscrits'];?>
                            <tr>
                                <td><a href="info_formation.php" class="text-dark"><b>
                                            <?php echo $rowF["titre"]?>
                                        </b></a>
                                    <p class="text-danger">(Votre formation n'est pas publiée, il faudra ajouter le
                                        programme de formation)</p>
                                </td>
                                <td class="texttd">
                                    <?php echo date('d-m-Y', strtotime($rowF["debut"]))?> -
                                    <?php echo  date('d-m-Y', strtotime($rowF["fin"]))?>
                                </td>
                                <td class="texttd">
                                    <?php echo  $rowF["diplome"]?>
                                </td>
                                <td class="texttd"><b>10</b></td>
                                <td class="texttd"><b>
                                        <?php echo  $rowF["montant"]?>
                                    </b></td>

                                <td>

                                    <a href="participants.php?id=<?php echo $rowF["id_formation"];?>"
                                        class="text-dark"><i class="fa fa-male mr-4"
                                            style="vertical-align: middle;"><span style="vertical-align: middle;"> Les
                                                inscrits (
                                                <?php echo $nombreInscrits;?>)
                                            </span></i></a>
                                    <a href="" class="text-warning"><i class="fas fa-edit"></i>Modifications</a><br>
                                    <a href="program.php?id=<?php echo $rowF["id_formation"];?>"
                                        class="text-success"><i class="fas fa-file-alt"></i> Le
                                        programme</a>

                                </td>


                                <td>
                                    <a href="" class="text-danger">
                                        <i class="fa fa-video-camera" style="vertical-align: middle;"></i>
                                        <span style="vertical-align: middle;">Conférence</span>
                                    </a>

                                    <a href="devoirdonnee.php" class="text-primary" style="vertical-align: middle;"><i
                                            class="fa fa-book text-primary"><span style="vertical-align: middle;">
                                                Devoirs (5)</span></i></a>
                                </td>
                            </tr>


                            <!-- <tr>
                                <td><a href="info_formation.php" class="text-dark"><b>Formation Flutter par Simplon cote
                                            d'Ivoire</b></a>
                                    <p class="text-primary"><a href="participants.php">(En cours avec 6
                                            participants)</a></p>
                                </td>
                                <td class="texttd">01/05/2023 - 11/07/2023</td>
                                <td class="texttd">Non</td>
                                <td class="texttd"><b>10</b></td>
                                <td class="texttd"><b>25000</b></td>
                                <td>
                                    <a href="" class="text-danger"><i class="fa fa-video-camera "></i>
                                        Conférence</a><br>
                                    <a href="devoirdonnee.php" class="text-primary"><i
                                            class="fa fa-book text-primary"></i> Devoirs (5)</a>
                                </td>
                            </tr>  -->

                            <!-- <tr>
                                <td><a href="info_formation.php" class="text-dark"><b>Gestion financiere</b></a>
                                    <p class="text-danger">(Terminée)</p>
                                </td>
                                <td class="texttd">01/03/2023 - 11/04/2023</td>
                                <td class="texttd">Oui</td>
                                <td class="texttd"><b>30</b></td>
                                <td class="texttd"><b>6000</b></td>
                                <td>
                                    <a href="maketraining.php"><i class="fas fa-chalkboard-teacher text-danger"></i> +
                                        Créer une autre formation</a><br>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td><a href="info_formation.php" class="text-dark"><b>Anglais Technique avec
                                            Joe</b></a><br>
                                    <a href="" class="text-success"><i class="fa fa-play"></i> Commencer la
                                        formation</a><br>
                                </td>
                                <td class="texttd">01/07/2023 - 11/10/2023</td>
                                <td class="texttd">Oui</td>
                                <td class="texttd"><b>60</b></td>
                                <td class="texttd"><b>30000</b></td>
                                <td>
                                    <a href="participants.php" class="text-dark"><i class="fa fa-male"></i> Les
                                        inscripts (23)</a><br>
                                    <a href="" class="text-warning"><i class="fas fa-edit"></i> Modifications</a><br>
                                    <a href="program.php" class="text-success"><i class="fas fa-file-alt"></i> Le
                                        programme</a>


                                </td>
                            </tr> -->
                            <!-- Add more rows as needed -->
                                                                     <?php
                                            }
                                            ?>
                            <?php   }
 else {
  echo "0 results";
}
?>
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
        $(document).ready(function () {
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