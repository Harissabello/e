<?php 
include('connexion.php');
$id_formateur = $_GET["id"];
?>
<div class="card form" style="width: 60rem;">
    <div class="card-body">
        <h5 class="card-title text-center text-dark"><b>Créer une formation</b></h5>
        <form action="" method="POST" enctype="multipart/form-data" id="monFormulaire">
            <!-- <div class="form-outline">
    <input type="text" hidden id="name2" name="id_formateur"class="form-control" value='<?php echo $sonid?>' />
     </div> -->
            <!-- Name input -->
            <div class="form-outline mb-2">
                <input type="text" id="forma" name="forma" hidden class="form-control" value="<?php echo $id_formateur?>" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label text-dark" for="name2">Titre de la formation</label>
                <input type="text" id="titreClasse" name="titreClasse" class="form-control" />
            </div>

        <div class="form-group">
        <label for="categorie">Catégorie :</label>
        <select class="form-control" id="categorie" name="categorie" onchange="toggleOptions()">
          <option value="" selected disabled>Sélectionnez une catégorie</option>
          <option value="informatique">Informatique</option>
          <option value="marketing">Marketing</option>
          <option value="autre">Autre</option>
        </select>
      </div>

      <div id="brancheInformatique" style="display: none;">
              <label>Choisir une branche :</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="branche" id="branche" value="programmation">
          <label class="form-check-label" for="brancheProgrammation">
            Programmation
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="branche" id="branche" value="réseaux">
          <label class="form-check-label" for="brancheReseaux">
            Réseaux
          </label>
        </div>
      </div>

      <div id="brancheMarketing" style="display: none;">
      <label>Choisir une branche :</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="branche" id="branche" value="digital">
          <label class="form-check-label" for="brancheDigital">
            Digital
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="branche" id="branche" value="réseauxMarketing">
          <label class="form-check-label" for="brancheReseauxMarketing">
            Réseaux Marketing
          </label>
        </div>
      </div>
        <div class="mb-3"></div>
            
            <div>
                <textarea class="form-control mb-2" id="description" name="description" rows="3"
                    placeholder="Description de la formation"></textarea>
            </div>
            <div class="form-outline mb-2">
                <label class="form-label text-dark" for="name2">Nombre d'élèves</label>
                <input type="number" id="nbeleve" name="nbeleve" class="form-control" />
            </div>
            <div class="form-outline mb-2">
                <label class="form-label text-dark" for="name2">Montant de la formation</label>
                <input type="number" id="montant" name="montant" class="form-control" />
            </div>

            <!-- password input -->
            <div class="form-outline mb-4">
                <label class="form-label text-dark" for="password2">Date début de la formation</label>
                <input type="date" id="dateDebut" name="dateDebut" class="form-control" />
            </div>

            <!-- password input -->
            <div class="form-outline mb-4">
                <label class="form-label text-dark" for="password2">Date fin de la formation</label>
                <input type="date" id="dateFin" name="dateFin" class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label text-dark" for="formateur">Organisateur</label>
                <select class="form-control" aria-label="Default select example" id="organisateur" name="organisateur">
                    <option selected disabled>Choisir -------- </option>
                    <option value="Entreprise">Entreprise de formation</option>
                    <option value="Particulier">Particulier</option>
                    <option value="Ecole privée">Ecole privée</option>
                    <option value="Ecole publique">Ecole publique</option>
                    <option value="Institut de formation">Institut de formation</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>

            <div class="form-outline mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="diplome" id="diplome" value="oui" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Diplôme à la fin de la formation
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="diplome" id="diplome" value="non">
                    <label class="form-check-label" for="exampleRadios2">
                        Aucun Diplôme à la fin de la formation
                    </label>
                </div>
            </div>

            <div>
                <label class="form-label text-dark" for="password2">Parlez l'organisateur</label>
                <textarea class="form-control mb-4" name="parler" id="parler" rows="3"
                    placeholder="Information sur le formateur"></textarea>
            </div>

            <div>
                <label class="form-label text-dark" for="password2">Emploi du temps</label>
                <textarea class="form-control mb-4" name="temps" id="temps" rows="3"
                    placeholder="Définir votre emploi du temps"></textarea>
            </div>

            <div>
                <label class="form-label text-dark" for="conditions">Les termes et conditions </label>
                <textarea class="form-control mb-4" name="conditions" id="conditions" rows="3"
                    placeholder="Vos termes et conditions pour suivre votre formation"></textarea>
            </div>
 
            <div class="form-outline mb-2">
                <label class="form-label text-dark" for="name2">Lien Youtube</label>
                <input type="text" id="lienVideo" name="lienVideo" class="form-control"
                    placeholder="La video de présentation de la formation" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label text-dark" for="name2">Lien de la vidéo conférence pour la formation</label>
                <input type="text" id="visio" name="visio" class="form-control"
                    placeholder="lien google meet, Zoom, Team ..." />
            </div>

            <?php include "prix.php"?>

            <!-- <button type="submit" class="btn btn-primary" name="formation">Créer</button> -->


            <!-- Submit button -->
            <!-- <button type="submit" name="envoyer"class="btn btn-primary btn-block">Créer la classe</button> -->
        </form>
    </div>
    <script src="trainingform.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function toggleOptions() {
    var categorie = document.getElementById("categorie").value;
    var brancheInformatique = document.getElementById("brancheInformatique");
    var brancheMarketing = document.getElementById("brancheMarketing");

    brancheInformatique.style.display = "none";
    brancheMarketing.style.display
    brancheMarketing.style.display = "none";

    if (categorie === "informatique") {
        brancheInformatique.style.display = "block";
    } else if (categorie === "marketing") {
        brancheMarketing.style.display = "block";
    }
}
  </script>
</div>
</div>