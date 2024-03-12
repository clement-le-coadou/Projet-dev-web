function validateContactForm() {
    var nom = document.getElementById("nom").value.trim();
    var prenom = document.getElementById("prenom").value.trim();
    var date = document.getElementById("date").value.trim();
    var genre = document.querySelector('input[name="genre"]:checked');
    var metier = document.getElementById("metier").value;
    var sujet = document.getElementById("sujet").value.trim();
    var mail = document.getElementById("mail").value.trim();
    var message = document.getElementById("message").value.trim();

    var isValid = true;

    var errorMessages = {
        "nom": "Veuillez entrer votre nom.",
        "prenom": "Veuillez entrer votre prénom.",
        "date": "Veuillez entrer votre date de naissance.",
        "genre": "Veuillez sélectionner votre genre.",
        "metier": "Veuillez sélectionner votre métier.",
        "sujet": "Veuillez entrer le sujet de votre message.",
        "mail": "Veuillez entrer une adresse email valide.",
        "message": "Veuillez entrer votre message."
    };

    // Vérification du format de l'adresse email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(mail)) {
        document.getElementById("mail").classList.add("error");
        document.getElementById("mail_error").innerText = errorMessages["mail"];
        isValid = false;
    } else {
        document.getElementById("mail").classList.remove("error");
        document.getElementById("mail_error").innerText = "";
    }

    // Validation des autres champs
    for (var field in errorMessages) {
        if (field !== "mail" && field !== "genre" && field !== "metier") {
            var value = eval(field);
            var errorMessage = errorMessages[field];

            var fieldElement = document.getElementById(field);
            var errorElement = document.getElementById(field + "_error");

            if (field === "genre" && !value) {
                document.getElementById("genre_error").innerText = errorMessage;
                isValid = false;
            } else if (field === "metier" && value === "") {
                document.getElementById("metier_error").innerText = errorMessage;
                isValid = false;
            } else {
                if (value === "") {
                    fieldElement.classList.add("error");
                    errorElement.innerText = errorMessage;
                    isValid = false;
                } else {
                    fieldElement.classList.remove("error");
                    errorElement.innerText = "";
                }
            }
        }
    }

    return isValid;
}
