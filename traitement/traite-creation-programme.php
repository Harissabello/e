<?php
// session_start();
include('connexion.php');
if(isset($_POST['envoyer'])){
$periode = addslashes($_POST["periode"]);
$titre = addslashes($_POST["titre"]);
$contenu = addslashes($_POST["module"]);
$id_formations = addslashes($_POST["id_formation"]);
$sql = "INSERT INTO programme (periode, titre, contenu, id_formations)
VALUES ('$periode', '$titre', '$contenu', '$id_formations')";
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>