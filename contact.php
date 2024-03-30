<?php include 'php/gestion_contact.php'; include 'php/gestion_connexion.php'; ?>

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
        <script src="JS/contact.js" defer></script>
        <script src="JS/connexion.js" defer></script>
    </head>

    <body>
        <header>            
            <h2><?php echo $categorie ?></h2>
            <h1 class="name"> Nom Entreprise</h1>
            <img class="Logo" src="img/Logo.png" alt="Not Loaded" width="100" />
            <form action="" method="POST" onsubmit="">    
                <input type="email" name="Identifiant" id="Id" placeholder="Identifiant">
                <span id="emailError" class="error" style="display:none;">Adresse e-mail incorrecte</span>
                <br>
                <input type="password" name="Mot_de_passe" id="Mdp" placeholder="Mot de passe">
                <span id="passwordError" class="error" style="display:none;">Veuillez entrer un mot de passe</span>
                <br>
                <button type="submit" value = "connexion" name="connexion"><img src="img/user.png" alt="Connexion"></button>
            </form>
            <a href="inscription.php" id="NewUser"> Nouvel Utilisateur ?</a>
        </header>

        <div class="topnav">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="http://localhost:8080/produits.php?cat=sportives">Sportive</a></li>
            <li><a href="http://localhost:8080/produits.php?cat=coupes">Coupé</a></li>
            <li><a href="http://localhost:8080/produits.php?cat=citadines">Citadine</a></li>
            <li><a href="contact.php">Contact</a></li>
        </div>

        <div class="content">
            <div class="left_nav">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=sportives">Sportive</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=coupes">Coupé</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=citadines">Citadine</a></li>
                <li><a href="contact.php">Contact</a></li>
            </div>
            <div id="contact">           
                <form action="" method="POST" onsubmit="return validateContactForm()">
                    <div class="align-label" id="top">
                        <label for="nom">Votre nom :</label>
                        <input id="nom" name="nom" type="text" placeholder="Entrez votre nom" value="<?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : ''; ?>">
                        <span id="nom_error" class="error-message"><?php echo $errorMessageNom; ?></span>
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="prenom">Votre prénom :</label>
                        <input id="prenom" name="prenom" type="text" placeholder="Entrez votre prénom" value="<?php echo isset($_SESSION['prenom']) ? $_SESSION['prenom'] : ''; ?>">
                        <span id="prenom_error" class="error-message"><?php echo $errorMessagePrenom; ?></span>
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="mail">Votre adresse email :</label>
                        <input id="mail" name="mail" type="email" placeholder="Entrez votre email" value="<?php echo isset($_SESSION['mail']) ? $_SESSION['mail'] : ''; ?>">
                        <span id="mail_error" class="error-message"><?php echo $errorMessageMail; ?></span>
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="genre">Votre genre :</label>
                        <input id="genre" name="genre" value="H" type="radio" >
                        <label for="H">H</label>
                        <input id="genre" name="genre" value="F" type="radio" >
                        <label for="F">F</label>
                        <span id="genre_error" class="error-message"><?php echo $errorMessageGenre; ?></span>
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="metier">Votre métier :</label>
                        <select name="metier" id="metier">
                            <option value="">Choississez votre métier</option>
                            <option value="Fonctionnaire">Education</option>
                            <option value="Medical">Médical</option>
                            <option value="Autre">Autre</option>
                        </select>
                        <span id="metier_error" class="error-message"><?php echo $errorMessageMetier; ?></span>
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="date">Votre date de naissance :</label><br>
                        <input id="date" name="date" type="date" value="<?php echo isset($_SESSION['date']) ? $_SESSION['date'] : ''; ?>">
                        <span id="date_error" class="error-message"><?php echo $errorMessageDate; ?></span>
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="sujet">Sujet :</label>
                        <input id="sujet" name="sujet" type="text" placeholder="Le sujet de votre message">
                        <span id="sujet_error" class="error-message"><?php echo $errorMessageSujet; ?></span>
                    </div>
                    <br>
                    <div class="align-label">
                        <label for="contenu">Contenu :</label>
                        <input id="contenu" name="contenu" type="text" placeholder="Votre message">
                        <span id="contenu_error" class="error-message"><?php echo $errorMessageContenu; ?></span>
                    </div>
                    <br>
                    <div class="button">
                       <input type="submit" value="Envoyer" name="contact">
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
