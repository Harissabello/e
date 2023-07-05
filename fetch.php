<?php
// Établir la connexion à la base de données MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learning";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données depuis la base de données
$sql = "SELECT * FROM classe LIMIT 3";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Fermer la connexion à la base de données
$conn->close();

// Renvoyer les données au format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
