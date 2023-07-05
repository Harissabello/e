<?php
include('connexion.php');
if(isset($_POST['valide'])){
$classe= addslashes($_POST["formateur"]);
$titre = addslashes($_POST['titre']);
$contenu = addslashes($_POST['contenu']);
$lien = addslashes($_POST['lien']);

$target_dir = "fichiers/";
$target_file = $target_dir . basename($_FILES["fichier"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// $datep= date('d/m/y h:i:s') ;
// Check if image file is a actual image or fake image

    // $check = getimagesize($_FILES["fichier"]["tmp_name"]);
    // if($check !== false) {
    //   echo "Le fichier est une image - " . $check["mime"] . ".";
    //   $uploadOk = 1;
    // } else {
    //   echo "Le fichier n'est pas une image.";
    //   $uploadOk = 0;
    // }
// utiliser un certains type de fichier
if($imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "doc"
&& $imageFileType != "zip" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

@$temp = explode(".", $_FILES["fichier"]["name"]);
$newfilename = round(microtime(true)) . '.' .end($temp);
@$finaldestination = $target_dir .$newfilename;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 if (move_uploaded_file($_FILES["fichier"]["tmp_name"],"" .$finaldestination)) {
      // echo "Le fichier ". htmlspecialchars( basename( $_FILES["fic"]["name"])). " a été télechargé.";
     $sql = "INSERT INTO `devoirs` (titre, contenu, lien, fichier, id_formateur_devoir)
      VALUES ('$titre','$contenu', '$lien', '$finaldestination', '$classe')";
      if (mysqli_query($conn, $sql)) {
    echo "Enregistré avec succès";
    header('location: details_classe.php?id=' . base64_encode($classe));
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
  
    } 
}
?>