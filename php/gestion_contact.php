<?php

// Variables pour stocker les messages d'erreur
$errorMessageNom = $errorMessagePrenom = $errorMessageMail = $errorMessageGenre = $errorMessageMetier = $errorMessageDate = $errorMessageSujet = $errorMessageContenu = "";


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

function validateGenre($genre) {
    if (empty($genre)) {
        return "Le champ Genre est vide.";
    } elseif ($genre != "H" && $genre != "F") {
        return "Veuillez sélectionner un genre valide.";
    }
    return "";
}

function validateMetier($metier) {
    if (empty($metier)) {
        return "Le champ Métier est vide.";
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

function validateSujet($sujet) {
    if (empty($sujet)) {
        return "Le champ Sujet est vide.";
    }
    return "";
}

function validateContenu($contenu) {
    if (empty($contenu)) {
        return "Le champ Contenu est vide.";
    }
    return "";
}




// Traitement du formulaire lors de la soumission
if (isset($_POST['contact'])) {
    // Validation de chaque champ et assignation des messages d'erreur
    $errorMessageNom = validateNom($_POST['nom'] ?? '');
    $errorMessagePrenom = validatePrenom($_POST['prenom'] ?? '');
    $errorMessageMail = validateEmail($_POST['mail'] ?? '');
    $errorMessageGenre = validateGenre($_POST['genre'] ?? '');
    $errorMessageMetier = validateMetier($_POST['metier'] ?? '');
    $errorMessageDate = validateDateNaissance($_POST['date'] ?? '');
    $errorMessageSujet = validateSujet($_POST['sujet'] ?? '');
    $errorMessageContenu = validateContenu($_POST['contenu'] ?? '');

    // Si aucune erreur de validation n'est présente, traiter le formulaire
    if (empty($errorMessageNom) && empty($errorMessagePrenom) && empty($errorMessageMail) && empty($errorMessageGenre) && empty($errorMessageMetier) && empty($errorMessageDate) && empty($errorMessageSujet) && empty($errorMessageContenu)) {
        // Toutes les données sont valides, envoyez l'e-mail

        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $genre = $_POST['genre'];
        $metier = $_POST['metier'];
        $date = $_POST['date'];
        $sujet = $_POST['sujet'];
        $contenu = $_POST['contenu'];

        // Construire l'URL avec toutes les données transmises via l'URL
        $redirect_url = "confirmation.php?";
        $redirect_url .= "nom=" . urlencode($nom) . "&";
        $redirect_url .= "prenom=" . urlencode($prenom) . "&";
        $redirect_url .= "mail=" . urlencode($mail) . "&";
        $redirect_url .= "genre=" . urlencode($genre) . "&";
        $redirect_url .= "metier=" . urlencode($metier) . "&";
        $redirect_url .= "date=" . urlencode($date) . "&";
        $redirect_url .= "sujet=" . urlencode($sujet) . "&";
        $redirect_url .= "contenu=" . urlencode($contenu);

        // Redirection vers la page de confirmation avec toutes les données du formulaire
        header("Location: " . $redirect_url);
        exit();
        /* Envoyer l'e-mail
        if (mail($to, $subject, $message, $headers)) {
            echo "E-mail envoyé avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
        }
        */
    }
}
?>
