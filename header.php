<?php session_start(); ?>
<link href="css/header.css" rel="stylesheet" />
<?php include "php/gestion_connexion.php";?>
<header>            
    <h2><?php echo $categorie ?></h2>
    <h1 class="name"> DripCars</h1>
    <img class="Logo" src="img/Logo.png" alt="Not Loaded" width="100" />    
    <?php if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='true'){
        ?><form action="php/deconnexion.php" method="post">
            <button type=submit name="deco"><img src="img/connexion.png" alt=""></button>
        </form>
    <?php
    }else{ ?>
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
    <?php }?>
</header>
<div class="topnav">
    <li><a href="index.php">Accueil</a></li>
    <li><a href="http://localhost:8080/produits.php?cat=sportives">Sportive</a></li>
    <li><a href="http://localhost:8080/produits.php?cat=coupes">Coupé</a></li>
    <li><a href="http://localhost:8080/produits.php?cat=citadines">Citadine</a></li>
    <li><a href="http://localhost:8080/panier.php">Panier</a></li>
    <li><a href="contact.php">Contact</a></li>
</div>
