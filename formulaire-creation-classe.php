<?php 
include('connexion.php');
 include('traitement/traite-creation-classe.php');
if (session_status() == PHP_SESSION_ACTIVE) {
    $user = $_SESSION['email'];
    $query = "SELECT * FROM utilisateurs WHERE email = '$user'"; 
    $resultat = mysqli_query($conn, $query); 
     $rowU = mysqli_fetch_array($resultat);
    if($rowU > 0){
        $sonid = $rowU['id'];
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                    data-target="#myModal">Créer une classe</button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                     <div class="form-outline">
                                                        <input type="text" hidden id="name2" name="id_formateur"
                                                            class="form-control" value='<?php echo $sonid?>' />
                                                    </div>
                                                    <!-- Name input -->
                                                    <div class="form-outline mb-2">
                                                        <label class="form-label text-dark" for="name2">Titre de la formation</label>
                                                        <input type="text" id="name2" name="titreClasse"
                                                            class="form-control" />
                                                    </div>
                                                    <div>
                                                     <textarea class="form-control mb-2" name="description" rows="3" placeholder="Description de la formation"></textarea>
                                                    </div>
                                                    <div class="form-outline mb-2">
                                                        <label class="form-label text-dark" for="name2">Nombre d'élèves</label>
                                                        <input type="text" id="nbeleve" name="nbeleve"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-outline mb-2">
                                                        <label class="form-label text-dark" for="name2">Montant de la formation</label>
                                                        <input type="text" id="montant" name="montant"
                                                            class="form-control" />
                                                    </div>

                                                    <!-- password input -->
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label text-dark" for="password2">Date début
                                                            formation</label>
                                                        <input type="date" id="password2" name="dateDebut"
                                                            class="form-control" />
                                                    </div>

                                                    <!-- password input -->
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label text-dark" for="password2">Date fin
                                                            formation</label>
                                                        <input type="date" id="password2" name="dateFin"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label text-dark" for="password2">Ajouter une image adaptée à la formation</label>
                                                        <input type="file" id="fichier" name="fichier" class="form-control" />
                                                    </div>
                                                        <div>
                                                            <label class="form-label text-dark" for="password2">Parlez de vous !</label>
                                                            <textarea class="form-control mb-4" name="formateur" rows="3" placeholder="Information sur le formateur"></textarea>
                                                        </div>
                                                      

                                                    <!-- Submit button -->
                                                    <button type="submit" name="envoyer"
                                                        class="btn btn-primary btn-block">Créer la classe</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
</body>
</html>