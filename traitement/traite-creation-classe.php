<?php
include('connexion.php');
if(isset($_POST['envoyer'])){
$sonid = addslashes($_POST['forma']);
$titreClasse = addslashes($_POST['titreClasse']);
$description = addslashes($_POST['description']);
$nbeleve = addslashes($_POST['nbeleve']);
$montant = addslashes($_POST['montant']);
$dateDebut = addslashes($_POST['dateDebut']);
$dateFin = addslashes($_POST['dateFin']);
$organisateur= addslashes($_POST["organisateur"]);
$diplome = addslashes($_POST["diplome"]);
$parler = addslashes($_POST["parler"]);
$temps = addslashes($_POST["temps"]);
$conditions = addslashes($_POST["conditions"]);
$youtube = addslashes($_POST["youtube"]);
$visio = addslashes($_POST["visio"]);
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fichier"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// $datep= date('d/m/y h:i:s') ;
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fichier"]["tmp_name"]);
    if($check !== false) {
      echo "Le fichier est une image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "Le fichier n'est pas une image.";
      $uploadOk = 0;
    }
// utiliser un certains type de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

@$temp = explode(".", $_FILES["fichier"]["name"]);
$newfilename = round(microtime(true)) . '.' .end($temp);
@$finaldestination = $target_dir .$newfilename;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 if (move_uploaded_file($_FILES["fichier"]["tmp_name"],"" .$finaldestination)) {
      // echo "Le fichier ". htmlspecialchars( basename( $_FILES["fic"]["name"])). " a été télechargé.";
     $sql = "INSERT INTO `classe` (titreClasse, descriptionCours, nombreEleves, Montant, dateDebut, dateFin, images, id_formateur)
      VALUES ('$titreClasse','$description', '$nbeleve', '$montant', '$dateDebut', '$dateFin', '$finaldestination', '$sonid')";
      if (mysqli_query($conn, $sql)) {
    echo "Enregistré avec succès";
    header('location: professeur.php?id=' . base64_encode($sonid));
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
  
    } 

// $sql = "INSERT INTO classe (titreClasse, dateDebut, dateFin, id_formateur)
// VALUES ('$titreClasse', '$dateDebut', '$dateFin', '$sonid')";

// if (mysqli_query($conn, $sql)) {
//  header('location: professeur.php?id=' . base64_encode($sonid));
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// mysqli_close($conn);
}
?>