function validateForm() {
    var nom = document.getElementById("nom").value.trim();
    var prenom = document.getElementById("prenom").value.trim();
    var date = document.getElementById("date").value.trim();
    var mail = document.getElementById("mail").value.trim();
    var mdp = document.getElementById("mdp").value;
    var conf_mdp = document.getElementById("conf_mdp").value;

    var isValid = true;

    var errorMessages = {
        "nom": "Veuillez entrer votre nom.",
        "prenom": "Veuillez entrer votre prénom.",
        "date": "Veuillez entrer votre date de naissance.",
        "mail": "Veuillez entrer une adresse email valide.",
        "mdp": "Veuillez entrer votre mot de passe.",
        "conf_mdp": "Les mots de passe ne correspondent pas."
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
        if (field !== "mail") {
            var value = eval(field);
            var errorMessage = errorMessages[field];

            var fieldElement = document.getElementById(field);
            var errorElement = document.getElementById(field + "_error");

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

    // Vérification de la correspondance des mots de passe
    if (conf_mdp !== mdp) {
        document.getElementById("conf_mdp").classList.add("error");
        document.getElementById("conf_mdp_error").innerText = errorMessages["conf_mdp"];
        isValid = false;
    } else {
        document.getElementById("conf_mdp").classList.remove("error");
        document.getElementById("conf_mdp_error").innerText = "";
    }

    return isValid;
}
