<?php
 include('connexion.php');
  // session_start();
//  if (session_status() == PHP_SESSION_ACTIVE) {
//     $user = $_SESSION['email'];
//     $query = "SELECT * FROM utilisateurs WHERE email = '$user'"; 
//     $resultat = mysqli_query($conn, $query); 
//      $rowU = mysqli_fetch_array($resultat);
//     if($rowU > 0){
//         $iduser = $rowU['id'];
//     }
//   }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="icon/logo2.png" width="200" height="70" alt="Logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <form class="form-inline my-4 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      <?php
      if(isset($_SESSION['email'])) {
        $sqlUser = "SELECT * FROM utilisateurs WHERE email='" . $_SESSION['email'] . "'";
        $resultUser = mysqli_query($conn, $sqlUser);
        $rowUser = mysqli_fetch_assoc($resultUser);
        $acces = "oui";
        $iduser = $rowUser["id"];
         $emailutilisateur = $_GET["id"];
            // Clé de chiffrement AES (16 caractères)
            $encryptionKey = "CeCiEsTm0nS@ltS3cRet";

            // Chiffrement de l'ID
            $encryptedId = openssl_encrypt($iduser, "AES-128-ECB", $encryptionKey);
            $decryptedId = openssl_decrypt($emailutilisateur, "AES-128-ECB", $encryptionKey);
                //Afficher le nombre de sessions
            $sqlSession = "SELECT COUNT(*) AS nombre_sessions FROM formation WHERE id_users = ' " .$decryptedId. " '";
            $sqlFormations = "SELECT COUNT(*) AS total_formations FROM inscrits WHERE id_users = '$iduser' AND inscrits.acces = '$acces'";
             $resultSession = mysqli_query($conn, $sqlSession);
             $result = mysqli_query($conn, $sqlFormations);
             $rowSession = mysqli_fetch_assoc($resultSession);
             $row = mysqli_fetch_assoc($result);
             $nombreSession = $rowSession['nombre_sessions'];
             $nombreFormation = $row['total_formations'];

        if($iduser != ""){
      ?>
          <a class="nav-link" href="mescours.php?id=<?php echo urlencode($encryptedId); ?>"><button type="button" class="btn btn-outline-success"><i class="fas fa-chalkboard-teacher"></i> Mes sessions (<?php echo $nombreSession?>)</button></a>
          <a class="nav-link" href="mesachat.php?id=<?php echo $iduser; ?>"><button type="button" class="btn btn-outline-primary"><i class="fas fa-book"></i> Mes formations (<?php echo $nombreFormation?>)</button></a>
          <a class="nav-link" href="mesinfos.php?id=<?php echo $iduser; ?>"><button type="button" class="btn btn-outline-danger"><i class="fa fa-cog"></i> Configuration</button></a>
   <?php
      }
       }
     
      
      ?>
        </form>
      </li>
    </ul>
    <ul class="navbar-nav">
    
    <?php
        if (isset($_SESSION['email'])) {
        $sqlUser = "SELECT * FROM utilisateurs WHERE email='" . $_SESSION['email'] . "'";
        $resultUser = mysqli_query($conn, $sqlUser);
        $rowUser = mysqli_fetch_assoc($resultUser);

        $iduser = $rowUser["id"];
             if($iduser != ""){
      ?>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Deconnexion</a>
      </li>
      <?php
      }
       }
     else{
        ?>

<li class="nav-item">
        <a class="nav-link" href="login.php">Connexion</a>
        </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">/ Enregistrement</a>
      </li>
        <?php  
      }
      ?>
    </ul>
  </div>
</nav>
<br>
