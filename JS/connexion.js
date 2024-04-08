function isValidEmail(email) {
    // Expression régulière pour vérifier le format de l'e-mail
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
function connexionUtilisateur() {
    var emailInput = document.getElementById('IdConnexion');
    var passwordInput = document.getElementById('MdpConnexion');
    var isValid = true;

    var errorMessages = {
        "Id": "Adresse e-mail incorrecte",
        "Mdp": "Veuillez entrer un mot de passe"
    };

    // Vérification de l'adresse e-mail
    if (!emailInput.value || !isValidEmail(emailInput.value)) {
        emailInput.classList.add('error');
        document.getElementById('email_error').innerText = errorMessages["Id"];
        isValid = false;
    } else {
        emailInput.classList.remove('error');
        document.getElementById('email_error_Connexion').innerText = "";
        document.getElementById('email_error_Connexion').style.display = 'none';
    }

    // Vérification du mot de passe
    if (!passwordInput.value) {
        passwordInput.classList.add('error');
        document.getElementById('mdp_error').innerText = errorMessages["Mdp"];
        isValid = false;
    } else {
        passwordInput.classList.remove('error');
        document.getElementById('mdp_error_Connexion').innerText = "";
        document.getElementById('mdp_error_Connexion').style.display = 'none';
    }

    return isValid;
}



