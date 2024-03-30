<?php

$errorMessageNom = $errorMessagePrenom = $errorMessageMail = $errorMessageMdp = $errorMessageConfMdp = $errorMessageDate = "";

// Définition des fonctions de validation
function validateNom($nom) {
    if (empty($nom)) {
        return "Le champ Nom est vide.";
    } elseif (strlen($nom) < 2 || strlen($nom) > 50) {
        return "Le nom doit avoir entre 2 et 50 caractères.";
    }
    return "";
}

function validatePrenom($prenom) {
    if (empty($prenom)) {
        return "Le champ Prénom est vide.";
    } elseif (strlen($prenom) < 2 || strlen($prenom) > 50) {
        return "Le prénom doit avoir entre 2 et 50 caractères.";
    }
    return "";
}

function validateEmail($email) {
    if (empty($email)) {
        return "Le champ Email est vide.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "L'adresse email n'est pas valide.";
    }
    return "";
}

function validateMdp($mdp) {
    if (empty($mdp)) {
        return "Le champ Mot de passe est vide.";
    }
    return "";
}

function validateConfMdp($mdp, $conf_mdp) {
    if (empty($conf_mdp)) {
        return "Le champ Confirmation du mot de passe est vide.";
    } elseif ($mdp !== $conf_mdp) {
        return "La confirmation du mot de passe ne correspond pas.";
    }
    return "";
}

function validateDateNaissance($dateNaissance) {
    if (empty($dateNaissance)) {
        return "Le champ Date de naissance est vide.";
    } elseif (!strtotime($dateNaissance)) {
        return "La date de naissance n'est pas valide.";
    } elseif (strtotime($dateNaissance) > time()) {
        return "La date de naissance ne peut pas être dans le futur.";
    }
    return "";
}

// Traitement du formulaire lors de la soumission
if (isset($_POST['Inscription'])) {
    // Validation de chaque champ et assignation des messages d'erreur
    $errorMessageNom = validateNom($_POST['nom'] ?? '');
    $errorMessagePrenom = validatePrenom($_POST['prenom'] ?? '');
    $errorMessageMail = validateEmail($_POST['mail'] ?? '');
    $errorMessageMdp = validateMdp($_POST['mdp'] ?? '');
    $errorMessageConfMdp = validateConfMdp($_POST['mdp'] ?? '', $_POST['conf_mdp'] ?? '');
    $errorMessageDate = validateDateNaissance($_POST['date'] ?? '');

    // Si aucune erreur de validation n'est présente, traiter le formulaire
    if (empty($errorMessageNom) && empty($errorMessagePrenom) && empty($errorMessageMail) && empty($errorMessageMdp) && empty($errorMessageConfMdp) && empty($errorMessageDate)) {
        header("Location: php/bdd.php");
        exit;
    }
}
?>
