<header>            
    <h2><?php echo $categorie ?></h2>
    <h1 class="name"> Nom Entreprise</h1>
    <img class="Logo" src="img/Logo.png" alt="Not Loaded" width="100" />    
    <input type="email" name="Identifiant" id="Id" placeholder="Identifiant">
    <input type="text" name="Mot de passe" id="Mdp" placeholder="Mot de passe">
    <button type="submit"><img src="img/user.png" alt="Connexion"></button>
    <a href="inscription.php" id="NewUser"> Nouvel Utilisateur ?</a>
</header>
<div class="topnav">
    <li><a href="index.php">Accueil</a></li>
    <li><a href="http://localhost:8080/produits.php?cat=sportives">Sportive</a></li>
    <li><a href="http://localhost:8080/produits.php?cat=coupes">Coupé</a></li>
    <li><a href="http://localhost:8080/produits.php?cat=citadines">Citadine</a></li>
    <li><a href="contact.php">Contact</a></li>
</div