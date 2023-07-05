<?php
// Assurez-vous d'établir une connexion avec votre base de données au préalable
include('connexion.php');
// Récupérer la valeur du bouton depuis la requête POST

$buttonValue = $_POST['buttonValue'];
$id = $_POST['emailValue'];
$acces = "oui";
// Exécuter la mise à jour dans la base de données
$sql = "UPDATE inscrits SET acces = '$acces' WHERE id_formation = '$buttonValue' AND email='$id'"; // À adapter selon votre structure de base de données et vos conditions
if ($conn->query($sql) === TRUE) {
    $response = "update_success";
} else {
    $response = "update_failed";
}

// Fermer la connexion à la base de données
$conn->close();

// Retourner la réponse au client
echo $response;

?>
