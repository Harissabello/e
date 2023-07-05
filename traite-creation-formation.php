<?php
// Connexion à la base de données (vous devrez adapter les informations de connexion)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learning";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
// if(isset($_POST["coupon"])){
// Récupérer les données envoyées depuis le formulaire
$titreClasse = addslashes($_POST['titreClasse']);
$categorie = addslashes($_POST['categorie']);
$branche = addslashes($_POST['branche']);
$nomImage = addslashes($_POST['nomImage']);
$imageUrl = addslashes($_POST['imageUrl']);
$lienVideo = addslashes($_POST['lienVideo']);
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
$visio = addslashes($_POST["visio"]);
// $coupon = addslashes($_POST["coupon"]);
$forma = addslashes($_POST['forma']);
 
// $sql = "SELECT * FROM coupons WHERE basic='$coupon' OR standard='$coupon' OR premium='$coupon'";
// $result = $conn->query($sql);
// if($result->num_rows > 0) {

//      while($row = $result->fetch_assoc()) {

    // Télécharger l'image à partir de l'URL
$imageData = file_get_contents($imageUrl);

// Dossier de destination pour les images
$dossier = "fichier/"; // Remplacez par le chemin vers votre dossier

// Obtenir l'extension de l'image à partir de l'URL
$extension = pathinfo($imageUrl, PATHINFO_EXTENSION);

// Générer un nom de fichier unique
$nomImage = uniqid() . '.' . $extension;

// Chemin complet du fichier image
$cheminImage = $dossier . $nomImage;

// Enregistrer l'image dans le dossier
file_put_contents($cheminImage, $imageData);


// Préparer la requête d'insertion
$stmt = $conn->prepare("INSERT INTO formation (titre, categorie, branche, des_formation, nbeleves, montant, debut, fin, organisateur, diplome, 
des_organisateur, emploi_temps, conditions, img, videos_formation, lien_conference, id_users) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssssssss", $titreClasse, $categorie, $branche, $description, $nbeleve, $montant, $dateDebut, $dateFin, $organisateur, $diplome, $parler, $temps, $conditions, $nomImage, $lienVideo, $visio, $forma);

// Exécuter la requête
if ($stmt->execute() === TRUE) {
    $response = array("success" => true, "message" => "Données insérées avec succès");
} else {
    $response = array("success" => false, "message" => "Erreur lors de l'insertion des données : " . $conn->error);
}

$stmt->close();
$conn->close();

// Renvoyer la réponse en format JSON
header('Content-Type: application/json');
echo json_encode($response);
//  }
  
// }  
//   } else {
//   alert("oooh");
// }
// $conn->close();
?>
