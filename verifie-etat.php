<?php
include('connexion.php');

$acces = "oui";
// Effectuer une requête de sélection pour récupérer l'état actuel dans la base de données
$sql = "SELECT acces FROM inscrits WHERE acces = '$acces'"; // À adapter selon votre structure de base de données et vos conditions
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer la valeur de votre_colonne dans la première ligne du résultat
    $row = $result->fetch_assoc();
    $valeurDansBD = $row["acces"];

    // Déterminer l'état du bouton en fonction de la valeur dans la base de données
    if ($valeurDansBD === "oui") {
        $buttonState = "enabled"; // Activer le bouton
    } else {
        $buttonState = "disabled"; // Désactiver le bouton
    }
} else {
    $buttonState = "disabled"; // Aucun résultat trouvé dans la base de données, désactiver le bouton
}
// Fermer la connexion à la base de données
$conn->close();

?>