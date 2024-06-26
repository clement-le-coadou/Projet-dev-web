<?php include 'php/gestion_inscription.php';?>
<!doctype html>
<!doctype html>
<html lang="fr-FR">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet"> 
        <title>Drip Team</title>
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/formulaires.css" rel="stylesheet" />
        <script src="JS/inscription.js" defer></script>
    </head>

    <body>
        <?php include "header.php"; ?>


        <div class="content">
        <?php include "left_nav.php" ?>
            <div class="formulaire">
            <form action="" method="POST" onsubmit="validateForm()">
                <div class="align-label" id="top">
                    <label for="nom">Votre nom :</label>
                    <input id="nom" name="nom" type="text" placeholder="Entrez votre nom" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>"><br>
                    <span id="nom_error" class="error-message"><?php echo $errorMessageNom; ?></span>
                </div>
                <br>
                <div class="align-label">
                    <label for="prenom">Votre prénom :</label>
                    <input id="prenom" name="prenom" type="text" placeholder="Entrez votre prénom" value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>"><br>
                    <span id="prenom_error" class="error-message"><?php echo $errorMessagePrenom; ?></span>
                </div>
                <br>
                <div class="align-label">
                    <label for="date">Votre date de naissance :</label><br>
                    <input id="date" name="date" type="date" value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date']) : ''; ?>">
                    <span id="date_error" class="error-message"><?php echo $errorMessageDate; ?></span>
                </div>
                <br>
                <div class="align-label">
                    <label for="mail">Votre adresse email :</label>
                    <input id="mail" name="mail" type="email" placeholder="Entrez votre email" value="<?php echo isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : ''; ?>"><br>
                    <span id="mail_error" class="error-message"><?php echo $errorMessageMail; ?></span>
                </div>
                <br>
                <div class="align-label">
                    <label for="mdp">Mot de passe :</label>
                    <input id="mdp" name="mdp" type="password" value="<?php echo isset($_POST['mdp']) ? htmlspecialchars($_POST['mdp']) : ''; ?>">
                    <span id="mdp_error" class="error-message"><?php echo $errorMessageMdp; ?></span>
                </div>
                <br>
                <div class="align-label">
                    <label for="conf_mdp">Confirmation du mot de passe :</label>
                    <input id="conf_mdp" name="conf_mdp" type="password" value="<?php echo isset($_POST['conf_mdp']) ? htmlspecialchars($_POST['conf_mdp']) : ''; ?>">
                    <span id="conf_mdp_error" class="error-message"><?php echo $errorMessageConfMdp; ?></span>
                </div>
                <br>
                <div class="button">
                    <input type="submit" value="Inscription" name="Inscription">
                </div>
            </form>

                
            </div>

        </div>
        <?php include "footer.php"; ?>

      
    </body>
  
</html>
