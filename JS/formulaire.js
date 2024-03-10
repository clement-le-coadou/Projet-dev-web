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
        "mail": "Veuillez entrer votre adresse email.",
        "mdp": "Veuillez entrer votre mot de passe.",
        "conf_mdp": "Les mots de passe ne correspondent pas."
    };

    for (var field in errorMessages) {
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
