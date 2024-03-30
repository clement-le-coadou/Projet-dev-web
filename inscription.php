<?php include 'php/bddData.php';?>
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
        <script src="JS/connexion.js"></script>
    </head>

    <body>
        <header>            
            <h2><?php echo $categorie ?></h2>
            <h1 class="name"> Nom Entreprise</h1>
            <img class="Logo" src="img/Logo.png" alt="Not Loaded" width="100" />    
            <input type="email" name="Identifiant" id="Id" placeholder="Identifiant">
            <input type="text" name="Mot de passe" id="Mdp" placeholder="Mot de passe">
            <button type="submit"><img src="img/user.png" alt="Connexion"></button>
            <a href="inscription.html" id="NewUser"> Nouvel Utilisateur ?</a>
        </header>

        <div class="topnav">
            <li><a href="index.html">Accueil</a></li>
            <li><a href="http://localhost:8080/produits.php?cat=sportives">Sportive</a></li>
            <li><a href="http://localhost:8080/produits.php?cat=coupes">Coupé</a></li>
            <li><a href="http://localhost:8080/produits.php?cat=citadines">Citadine</a></li>
            <li><a href="contact.html">Contact</a></li>
        </div>

        <div class="content">
            <div class="left_nav">
                <li><a href="index.html">Accueil</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=sportives">Sportive</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=coupes">Coupé</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=citadines">Citadine</a></li>
                <li><a href="contact.html">Contact</a></li>
            </div>
            <div class="formulaire">
                <form action="" method="POST" onsubmit="return validateForm()">
                    <div class="align-label" id="top">
                        <label for="nom">Votre nom :</label>
                        <input id="nom" name="nom" type="text" placeholder="Entrez votre nom"><br>
                        <span id="nom_error" class="error-message"><?php echo $errorMessageNom; ?></span> <!-- Message d'erreur pour le nom -->
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="prenom">Votre prénom :</label>
                        <input id="prenom" name="prenom" type="text" placeholder="Entrez votre prénom"><br>
                        <span id="prenom_error" class="error-message"><?php echo $errorMessagePrenom; ?></span> <!-- Message d'erreur pour le prénom -->
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="date">Votre date de naissance :</label><br>
                        <input id="date" name="date" type="date">
                        <span id="date_error" class="error-message"><?php echo $errorMessageDate; ?></span> <!-- Message d'erreur pour la date de naissance -->
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="mail">Votre adresse email :</label>
                        <input id="mail" name="mail" type="email" placeholder="Entrez votre email"><br>
                        <span id="mail_error" class="error-message"><?php echo $errorMessageMail; ?></span> <!-- Message d'erreur pour l'email -->
                    </div>
                    
                    <div class="align-label">
                        <label for="mdp">Mot de passe :</label>
                        <input id="mdp" name="mdp" type="password">
                        <span id="mdp_error" class="error-message"><?php echo $errorMessageMdp; ?></span> <!-- Message d'erreur pour le mot de passe -->
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="conf_mdp">Confirmation du mot de passe :</label>
                        <input id="conf_mdp" name="conf_mdp" type="password">
                        <span id="conf_mdp_error" class="error-message"><?php echo $errorMessageConfMdp; ?></span> <!-- Message d'erreur pour la confirmation du mot de passe -->
                    </div>
                    <br>
                    <div class="button">
                       <input type="submit" value="Inscription" name="Inscription">
                    </div>
                </form>
                
            </div>

        </div>
        <footer>
            <img src="img/Logo.png" alt="Logo" width="100px">
            <div id="EL"><h2>Espace Légal</h2>
                <li><a href=""> Copyright DripTeam ©2024</a></li>
                <li><a href=""> Mentions Légales</a></li>
            </div>
        </footer>

      
    </body>
  
</html>
