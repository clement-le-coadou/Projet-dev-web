<?php

// Variables pour stocker les messages d'erreur
$errorMessageNom = $errorMessagePrenom = $errorMessageMail = $errorMessageGenre = $errorMessageMetier = $errorMessageDate = $errorMessageSujet = $errorMessageContenu = "";


include 'php/gestion_formulaire.php';




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
