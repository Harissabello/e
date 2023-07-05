<?php
include('connexion.php');
if(isset($_POST["moduler"])){

$module = addslashes($_POST["module"]);
$id_classe = $_POST["classe"];
$sql = "INSERT INTO modules (nom_module, id_classe_module) VALUES ('$module', '$id_classe')";

if (mysqli_query($conn, $sql)) {
  header('location: details_classe.php?id=' . $id_classe);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>