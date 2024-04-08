<?php
if (!function_exists('validateNom')) {
    function validateNom($nom) {
        if (empty($nom)) {
            return "Le champ Nom est vide.";
        } elseif (strlen($nom) < 2 || strlen($nom) > 50) {
            return "Le nom doit avoir entre 2 et 50 caractères.";
        }
        return "";
    }
}

if (!function_exists('validatePrenom')) {
    function validatePrenom($prenom) {
        if (empty($prenom)) {
            return "Le champ Prénom est vide.";
        } elseif (strlen($prenom) < 2 || strlen($prenom) > 50) {
            return "Le prénom doit avoir entre 2 et 50 caractères.";
        }
        return "";
    }
}

if (!function_exists('validateEmail')) {
    function validateEmail($email) {
        if (empty($email)) {
            return "Le champ Email est vide.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "L'adresse email n'est pas valide.";
        }
        return "";
    }
}

if (!function_exists('validateGenre')) {
    function validateGenre($genre) {
        if (empty($genre)) {
            return "Le champ Genre est vide.";
        } elseif ($genre != "H" && $genre != "F") {
            return "Veuillez sélectionner un genre valide.";
        }
        return "";
    }
}

if (!function_exists('validateMetier')) {
    function validateMetier($metier) {
        if (empty($metier)) {
            return "Le champ Métier est vide.";
        }
        return "";
    }
}

if (!function_exists('validateDateNaissance')) {
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
}

if (!function_exists('validateSujet')) {
    function validateSujet($sujet) {
        if (empty($sujet)) {
            return "Le champ Sujet est vide.";
        }
        return "";
    }
}

if (!function_exists('validateContenu')) {
    function validateContenu($contenu) {
        if (empty($contenu)) {
            return "Le champ Contenu est vide.";
        }
        return "";
    }
}

if (!function_exists('validateMdp')) {
    function validateMdp($mdp) {
        if (empty($mdp)) {
            return "Le champ Mot de passe est vide.";
        }
        return "";
    }
}

if (!function_exists('validateConfMdp')) {
    function validateConfMdp($mdp, $conf_mdp) {
        if (empty($conf_mdp)) {
            return "Le champ Confirmation du mot de passe est vide.";
        } elseif ($mdp !== $conf_mdp) {
            return "La confirmation du mot de passe ne correspond pas.";
        }
        return "";
    }
}
?>
