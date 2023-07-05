<?php
// Connexion à la base de données
include('connexion.php');

if (isset($_POST['inscrire'])) {

    // Nettoyage des entrées utilisateur pour éviter les injections SQL
    $acces = sanitizeInput($_POST['acces']);
    $id_formation = sanitizeInput($_POST['id_formation']);
    $id_user = sanitizeInput($_POST['id_user']);
    $nom = sanitizeInput($_POST['nom']);
    $email = sanitizeInput($_POST['email']);
    $telephone = sanitizeInput($_POST['telephone']);

    // Vérification de l'e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // L'e-mail n'est pas valide
        $error = "L'e-mail saisi n'est pas valide.";
        // header("Location: formulaire.php?error=" . urlencode($error));
        // exit;
    } else {
        // Insertion des données dans la base de données si aucune erreur n'est présente
        $stmt = $conn->prepare("INSERT INTO inscrits (nom_prenoms, email, telephone, acces, id_formation, id_users) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nom, $email, $telephone, $acces, $id_formation, $id_user);
        if ($stmt->execute()) {
            // Données enregistrées avec succès
        } else {
            // Erreur lors de l'enregistrement des données
            $error = "Une erreur s'est produite lors de l'enregistrement des données.";
        }

        $stmt->close();
    }
}
mysqli_close($conn);

// Fonction pour échapper les caractères spéciaux et éviter les attaques par injection SQL
function sanitizeInput($input) {
    global $conn;
    $input = trim($input);
    $input = mysqli_real_escape_string($conn, $input);
    $input = htmlspecialchars($input);
    return $input;
}

?>
