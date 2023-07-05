// Envoi des données au serveur
function sendDataToServer(acces, id_formation, id_user, nom, email, telephone) {
    var url = "traite-inscription-cours.php";
    var data = {
        acces: acces,
        id_formation: id_formation,
        id_user: id_user,
        nom: nom,
        email: email,
        telephone: telephone
    };

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
        .then(function (response) {
            if (response.ok) {
                return response.text();
            } else {
                throw new Error("Erreur lors de l'envoi des données au serveur.");
            }
        })
        .then(function (responseText) {
            displayMessage(responseText, "success-message");
        })
        .catch(function (error) {
            displayMessage(error.message, "error-message");
        });
}

// Validation de l'email avec une expression régulière
function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Validation du formulaire côté client
function validateForm() {
    var acces = document.getElementById("acces").value;
    var id_formation = document.getElementById("id_formation").value;
    var id_user = document.getElementById("id_user").value;
    var nom = document.getElementById("nom").value;
    var email = document.getElementById("email").value;
    var telephone = document.getElementById("telephone").value;

    if (nom === "" || email === "" || telephone === "") {
        displayMessage("Veuillez remplir tous les champs du formulaire.", "error-message");
        return false;
    }

    if (!validateEmail(email)) {
        displayMessage("Veuillez fournir une adresse e-mail valide.", "error-message");
        return false;
    }

    sendDataToServer(acces, id_formation, id_user, nom, email, telephone);
}

// Affichage des messages dans un élément de la page
function displayMessage(message, className) {
    var messageElement = document.getElementById("message");
    messageElement.innerHTML = message;
    messageElement.className = className;
}


