function connexion() {
    var emailInput = document.getElementById('Id');
    var passwordInput = document.getElementById('Mdp');
    var isValid = true;

    // Vérification de l'adresse e-mail
    if (!emailInput.value || !isValidEmail(emailInput.value)) {
        emailInput.classList.add('error');
        isValid = false;
    } else {
        emailInput.classList.remove('error');
    }

    // Vérification du mot de passe
    if (!passwordInput.value) {
        passwordInput.classList.add('error');
        isValid = false;
    } else {
        passwordInput.classList.remove('error');
    }

    return isValid;
}

function isValidEmail(email) {
    // Expression régulière pour vérifier le format de l'e-mail
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
