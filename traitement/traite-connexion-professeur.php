<?php
ini_set('display_errors', 'off');
include('connexion.php');
session_start();

$emailutilisateur = addslashes($_POST["email"]);
$motdepasseutilisateur = $_POST["passe"];

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['email']) && !empty($_POST['passe'])) {
        $sql = "SELECT * FROM utilisateurs WHERE email='$emailutilisateur' AND motDePasse='$motdepasseutilisateur'";
        $check = mysqli_query($conn, $sql);

        if (mysqli_num_rows($check) != 0) {
            $row = mysqli_fetch_assoc($check);
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $emailutilisateur;
            $_SESSION["motDePasse"] = $motdepasseutilisateur;

            // Clé de chiffrement AES (16 caractères)
            $encryptionKey = "CeCiEsTm0nS@ltS3cRet";

            // Chiffrement de l'ID
            $encryptedId = openssl_encrypt($_SESSION["id"], "AES-128-ECB", $encryptionKey);

            header('Location: index.php?id=' . urlencode($encryptedId));
            exit();
        } else {
            echo '0';
        }
    } else {
        $info = "Veuillez remplir tous les champs !";
    }
}

mysqli_close($conn); // fermer la connexion
?>
