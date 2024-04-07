<?php

include 'php/bdd.php';

// Connexion à la base de données SQLite
$bdd = ouverture_bdd();

// Requête de création de la table utilisateur
$query = 'CREATE TABLE IF NOT EXISTS utilisateur (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nom TEXT NOT NULL,
            prenom TEXT NOT NULL,
            date TEXT NOT NULL,
            mail TEXT NOT NULL,
            mdp TEXT NOT NULL            
        )';

// Exécute la requête
$bdd->exec($query);

// Message d'erreur initialisé à une chaîne vide
$errorMessage = '';

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
        // On empêche les injections SQL et on stocke les variables
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
        $date = htmlspecialchars($_POST['date']); // Champ date

        // Convertit l'adresse e-mail en minuscules
        $mail = strtolower($mail);

        echo $nom;

        // Vérifie si l'adresse e-mail est déjà utilisée
        $check = $bdd->prepare('SELECT COUNT(*) AS count FROM utilisateur WHERE mail = ?');
        $check->execute(array($mail));
        $row = $check->fetch();

        // Si l'adresse e-mail n'est pas déjà utilisée
        if ($row['count'] == 0) {
            // Vérifie la longueur du nom et prénom
            if ((strlen($prenom) <= 20) && (strlen($nom) <= 20)) {
                // Vérifie la longueur de l'adresse e-mail
                if (strlen($mail) <= 100) {
                    // Vérifie si l'e-mail est au bon format
                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        // Vérifie si les mots de passe saisis correspondent
                        if ($_POST['mdp'] === $_POST['conf_mdp']) {
                            // "Crypte" le mot de passe
                            $options = ['cost' => 12];
                            $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT, $options);

                            // Insère les données dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, date, mail, mdp) VALUES(:nom, :prenom, :date, :mail, :mdp)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'date' => $date, // Champ date
                                'mail' => $mail,
                                'mdp' => $mdp
                            ));

                            // Redirige vers la page de connexion avec un message de succès
                            header('Location:index.php');
                            die();
                        } else {
                            $errorMessage = 'Les mots de passe saisis ne correspondent pas.';
                        }
                    } else {
                        $errorMessage = 'L\'adresse email n\'est pas valide.';
                    }
                } else {
                    $errorMessage = 'La longueur de l\'adresse email dépasse la limite autorisée.';
                }
            } else {
                $errorMessage = 'La longueur du nom ou du prénom dépasse la limite autorisée.';
            }
        } else {
            $errorMessage = 'Un utilisateur avec cette adresse email est déjà enregistré.';
        }
    } else {
        $errorMessage = 'Veuillez remplir tous les champs.';
    }


// Affiche le message d'erreur (s'il y en a un)
echo $errorMessage;

}

fermeture_bdd($bdd);
?>
