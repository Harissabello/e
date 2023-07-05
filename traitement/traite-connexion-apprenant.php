<?php
 ini_set('display_errors', 'off');
 include('connexion.php');
session_start();
$emailapprenant=addslashes($_POST["email"]);
$motdepasseapprenant=addslashes($_POST["passe"]); 
 if(isset($_POST['connexion'])){   
    if(!empty($_POST['email']) && !empty($_POST['passe'])){
        $sql = "SELECT * FROM apprenants WHERE email='$emailapprenant' AND motDePasse='$motdepasseapprenant'";
        $check = mysqli_query($conn, $sql);
        if(mysqli_num_rows($check) != 0){
            $row = mysqli_fetch_assoc($check);
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"]=$emailapprenant;
            $_SESSION["motDePasse"]=$motdepasseapprenant;
           header('location: apprenant.php?id=' . base64_encode($_SESSION["id"]));
        }
        if($_SESSION["email"]!=$emailapprenant){
           echo '0';
    }
    } else{
            $info = "Veuillez remplir tous les champs !";
         }
      
}
mysqli_close($conn); // fermer la connexion
?>