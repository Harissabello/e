<?php

//Par de retour sur la page index lorsque l'utilisateur est connecté !
if(isset($_SESSION['email'])){
        $emailutilisateur = $_SESSION['email'];
     $sql = "SELECT * FROM utilisateurs WHERE email='$emailutilisateur'";
    $checke = mysqli_query($conn, $sql);
     if(mysqli_num_rows($checke) != 0){
            $rowIndex = mysqli_fetch_assoc($checke);
            $_SESSION["id"] = $rowIndex["id"];
    if(isset($_GET['id'])){
        $user = $_GET['id'];
    }else{
        $user = $_SESSION["id"];
        header('location:index.php?id=' .$user);
        exit;
    }
}else{
    $user = 'index.php';
}
 }

$sqlClasse = "SELECT * FROM formation ORDER BY id_formation DESC";
$resultClasse = mysqli_query($conn, $sqlClasse);
  ?>