<?php


include 'php/bdd.php';
include 'php/gestion_formulaire.php';

$bdd = ouverture_bdd();

// Initialisez les messages d'erreur à vide
$emailError = $passwordError = "";

$error = "";



$errorMessageMailConnexion = "";
$errorMessageMdpConnexion = "";

// Vérifiez si le formulaire a été soumis
if (isset($_POST['connexion'])) {
    $errorMessageMailConnexion = validateEmail($_POST['Identifiant'] ?? '');
    $errorMessageMdpConnexion = validateMdp($_POST['Mot_de_passe'] ?? '');

    if(empty($errorMessageMdpConnexion) && empty($errorMessageMailConnexion)){
        // Récupérez les valeurs des champs du formulaire
        $email = $_POST['Identifiant'] ?? '';
        $password = $_POST['Mot_de_passe'] ?? '';

        // Validez l'adresse e-mail
        if (empty($email)) {
            $emailError = "Adresse e-mail vide";
        }

        // Validez le mot de passe
        if (empty($password)) {
            $passwordError = "Veuillez entrer un mot de passe";
        }

        // Si aucune erreur n'a été détectée, procédez à la connexion
        if (empty($emailError) && empty($passwordError)) {

            if (!empty($_POST['Identifiant']) && !empty($_POST['Mot_de_passe'])) { // on regarde si les valeurs du formulaire récupérées avec la variable superglobale $_POST sont non vide
                // On récupère les variables en évitant les injections SQL
                $mail = htmlspecialchars($_POST['Identifiant']);
                $mdp = htmlspecialchars($_POST['Mot_de_passe']);
        
                $mail = strtolower($mail); // Email transformé en minuscule
        
                // On regarde si l'utilisateur est inscrit dans la table utilisateur
        
        
        
                // Si row = 1 alors l'utilisateur existe
                $check = $bdd->prepare('SELECT COUNT(*) AS count FROM utilisateur WHERE mail = ?');
                $check->execute(array($mail));
                $row = $check->fetch();
        
                if ($row['count'] > 0) {
                    // Si le mail est au bon format
                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        
                        // récupération des données de l'utilisateur
                        $check = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
                        $check->execute(array($mail));
                        $data = $check->fetch();
        
                        // vérification du mot de passe
                    
                        if (password_verify($mdp, $data['mdp'])) {
                            
        
                            //stockage des données utilisateur dans la session
                            $_SESSION['id'] = $data['id'];
                            $_SESSION['nom'] = $data['nom'];
                            $_SESSION['prenom'] = $data['prenom'];
                            $_SESSION['mail'] = $data['mail'];
                            $_SESSION['date'] = $data['date'];
                                
                            $_SESSION['connexion']='true';
        
                            $connexion = "Vous êtes connecté !";
                        } else {
                            $errorMessageMdpConnexion = 'Mot de passe incorrect.';
                        }
                    } else {
                        $errorMessageMailConnexion = 'Adresse email invalide.';
                    }
                } else if($mail != 'admin@admin.com')
                    $errorMessageMailConnexion = 'Aucun utilisateur trouvé avec cette adresse email.';
                }
        }
        // Connexion 'spéciale' pour l'utilisateur admin
        if ($mail == 'admin@admin.com' && $mdp == '0000'){
            $_SESSION['id'] = 'adminID';
            $_SESSION['nom'] = 'admin';
            $_SESSION['prenom'] = 'admin';
            $_SESSION['mail'] = 'admin@admin.com';
            $_SESSION['date'] = '11/11/1111';
                
            $_SESSION['connexion']='true';
            $_SESSION['admin']='true';

            echo "connexion réussie en tant qu'administrateur";
        }
        
    }
}


fermeture_bdd($bdd);

?>
