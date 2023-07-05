<?php
include('connexion.php');
session_start();
if (isset($_POST['envoyer'])) {
    $res = addslashes($_POST['reponse']);
    $lien = $_POST['lien'];
    $dev = $_POST['id_devoir'];
    $user = $_POST['id_user'];
    
    
    $fichier = $_FILES['fichier']['name'];
    $tempname = $_FILES['fichier']['tmp_name'];
    $temp = explode(".", $_FILES["fichier"]["name"]);
    $newfilename = round(microtime(true)) . '.' .end($temp);
    $finaldestination = "upload/".$newfilename;  
    $folder = "upload/".$newfilename;
    if(move_uploaded_file($tempname,$folder)){
        echo 'images est uplade';
    }


        $sql = "INSERT INTO devoir_rendu (response, file, link, id_devoir, id_users) 
        VALUES ('$res', '$finaldestination', '$lien', '$dev', '$user' )";


        if (mysqli_query($conn, $sql)) {
            // Succès de l'insertion
            echo "<div class='success-message'>Le travail a été soumis avec succès.</div>";
        } else {
            // Erreur lors de l'insertion
            echo "Erreur : " . mysqli_error($conn);
        }
    } else {
        echo "Utilisateur non connecté.";
    }

?>
