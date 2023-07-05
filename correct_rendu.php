<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Correction</title>
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
  <h4 class= "text-dark"><b>Rendu du participant : Yao Ndri</b></h4>
    <!-- <input type="text" id="searchInput" placeholder="Search...">
    <button onclick="exportTable()">Export as XLS</button> -->
    <font size ="3">
    <div class="card text-dark">
  <div class="card-header">
  Entreprise XYZ note /20
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
   Formation Gestion Financière -  Devoir : Entreprise XYZ est une entreprise de fabrication de meubles qui souhaite évaluer la rentabilité de l'un de ses produits. Les informations suivantes sont disponibles :

Le coût de production du produit est de 50 $ par unité.
Le prix de vente du produit est de 80 $ par unité.
Les frais généraux de l'entreprise s'élèvent à 10 000 $ par mois.
L'entreprise produit et vend 500 unités du produit par mois.
Calculez les mesures de rentabilité suivantes :

Marge bénéficiaire brute :
Calculez le chiffre d'affaires mensuel en multipliant le prix de vente par le nombre d'unités vendues.
Calculez le coût des marchandises vendues mensuel en multipliant le coût de production par le nombre d'unités vendues.
Soustrayez le coût des marchandises vendues du chiffre d'affaires pour obtenir la marge bénéficiaire brute.
Calculez la marge bénéficiaire brute en pourcentage en divisant la marge bénéficiaire brute par le chiffre d'affaires et en multipliant par 100.
Marge bénéficiaire nette :
Soustrayez les frais généraux du chiffre d'affaires pour obtenir le bénéfice net.
Calculez la marge bénéficiaire nette en pourcentage en divisant le bénéfice net par le chiffre d'affaires et en multipliant par 100.
Retour sur investissement (ROI) :
Calculez le bénéfice net annuel en multipliant le bénéfice net mensuel par 12.
Calculez le retour sur investissement en divisant le bénéfice net annuel par le capital investi initial et en multipliant par 100.
Utilisez ces calculs pour évaluer la rentabilité du produit pour l'entreprise XYZ.
        <br>
       <h4>Liens enligne ajoutés au rendu</h4>
       <li><a href="">Lien 1</a></li>
       <li><a href="">Lien 2</a></li>
       <li><a href="">Lien 3</a></li>

       <h4>Document associé</h4>


            <li><a href="">Téléchargé le document associé au rendu</a>
    </p>
  </div>
  <div class="card-footer text-body-secondary">
  <h5 class="card-title text-center text-dark"><b>Corriger le Devoir</b></h5>
<form action="" method="POST" enctype="multipart/form-data">
     <div class="form-outline">
    <input type="text" hidden id="name2" name="id_formateur"class="form-control" value='<?php echo $sonid?>' />
     </div>
    <!-- Name input -->

    <div class="mb-4">
          <label class="form-label text-dark" for="password2">Mettre une note</label>
              <input type="text" id="note" name="note" class="form-control" />
               </div>
 
     <div>
   <textarea class="form-control mb-2" name="reponse" rows="3" placeholder="Observation"></textarea>
    </div>
 
                

                    <button type="submit" name = "envoyer" class="btn btn-danger btn-block">Corriger</button>
                </form>
  </div>
</div>

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