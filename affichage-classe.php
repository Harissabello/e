<?php
include('connexion.php');

$sql = "SELECT * FROM classe";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body class="vh-100">
    <?php if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) { 
 ?>

    <div class="row">
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo  $row["titreClasse"]?></h5>
                <p class="card-text"><?php echo  $row["titreFormation"]?></p>
                <a href="#" class="btn btn-primary"><?php echo  $row["dateDebut"]?> - <?php echo  $row["dateFin"]?></a>
            </div>
        </div>
    </div>
  
    
  <!-- <div class="card mt-4 col-md-4 d-flex flex-wrap">
  <?php echo  $row["titreClasse"]?>
  </div> -->
</div>
<!-- 
 <div class="container col-md-4 d-flex justify-content-between">
  <div class="card mt-4">
    <div class="card-header bg-primary text-white">
      <h4><?php echo  $row["titreClasse"]?></h4>
    </div>
    <div class="card-body">
      <ul class="list-group">
      
      </ul>
    </div>
  </div>
</div> -->


 <?php   }
} else {
  echo "0 results";
}
?>
    
</body>
</html>