
document.getElementById("monFormulaire").addEventListener("submit", function (event) {
    event.preventDefault(); // Empêcher l'envoi du formulaire pour le moment

    let titreClasse = document.getElementById("titreClasse").value;
    let categorie = document.getElementById("categorie").value;
    let branche = document.getElementById("branche").value;
    let description = document.getElementById("description").value;
    let nbeleve = document.getElementById("nbeleve").value;
    let montant = document.getElementById("montant").value;
    let dateDebut = document.getElementById("dateDebut").value;
    let dateFin = document.getElementById("dateFin").value;
    let organisateur = document.getElementById("organisateur").value;
    let diplome = document.getElementById("diplome").value;
    let parler = document.getElementById("parler").value;
    let temps = document.getElementById("temps").value;
    let conditions = document.getElementById("conditions").value;
    let lienVideo = document.getElementById("lienVideo").value;
    let visio = document.getElementById("visio").value;
    let coupon = document.getElementById("coupon").value;
    let forma = document.getElementById("forma").value;

    // Extraction de l'identifiant de la vidéo YouTube
    let videoId = lienVideo.split('v=')[1];
    if (videoId) {
        let ampersandPosition = videoId.indexOf('&');
        if (ampersandPosition !== -1) {
            videoId = videoId.substring(0, ampersandPosition);
        }
    }

    // Génération de l'URL de l'image
    let imageUrl = "https://img.youtube.com/vi/" + videoId + "/0.jpg";

    // Affichage de l'image générée
    let imageElement = document.createElement("img");
    imageElement.src = imageUrl;
    document.body.appendChild(imageElement);
    // Attribution du nom de l'image générée
    let nomImage = videoId + ".jpg";

    // Création d'un objet FormData pour envoyer les données
    let formData = new FormData();
    formData.append("titreClasse", titreClasse);
    formData.append("categorie", categorie);
    formData.append("branche", branche);
    formData.append("description", description);
    formData.append("nbeleve", nbeleve);
    formData.append("montant", montant);
    formData.append("dateDebut", dateDebut);
    formData.append("dateFin", dateFin);
    formData.append("organisateur", organisateur);
    formData.append("diplome", diplome);
    formData.append("parler", parler);
    formData.append("temps", temps);
    formData.append("conditions", conditions);
    formData.append("lienVideo", lienVideo);
    formData.append("nomImage", nomImage);
    formData.append("imageUrl", imageUrl);
    formData.append("visio", visio);
    // formData.append("coupon", coupon);
    formData.append("forma", forma);

    // Envoi des données à la base de données en utilisant Fetch
    fetch("traite-creation-formation.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            console.log(data); // Afficher la réponse du serveur (facultatif)
            // Faire d'autres traitements ou afficher un message de succès ici
        })
        .catch(error => {

        });
});
