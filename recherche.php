<?php
// Vérifier si le formulaire de recherche a été soumis
if(isset($_GET['q'])) {
    // Récupérer la valeur de recherche depuis les paramètres GET
    $recherche = $_GET['q'];

    // Effectuer la connexion à la base de données
    $servername = "nom_du_serveur";
    $username = "nom_d_utilisateur";
    $password = "mot_de_passe";
    $dbname = "nom_de_la_base_de_donnees";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier si la connexion à la base de données a réussi
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données: " . $conn->connect_error);
    }

    // Construire la requête de recherche
    $sql = "SELECT * FROM table WHERE colonne LIKE '%$recherche%'";

    // Exécuter la requête
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats de recherche
    if ($result->num_rows > 0) {
        // Afficher les résultats
        while($row = $result->fetch_assoc()) {
            // Traiter les données récupérées
            $id = $row['id'];
            $nom = $row['nom'];
            // Afficher les résultats sous la forme souhaitée
            echo "<p>Résultat: ID=$id, Nom=$nom</p>";
        }
    } else {
        echo "<p>Aucun résultat trouvé.</p>";
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
