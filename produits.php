<?php 
include 'php/varSession.inc.php';

if(isset($_GET['cat']) && isset($_SESSION['categories'][$_GET['cat']])) {
    $categorie = $_GET['cat'];
    $produits = $_SESSION['categories'][$categorie];
} else {
    header("Location: index.html");
    exit;
}
?>
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
            <div id="collection">
                    <h1>Produits de la catégorie <?php echo ucfirst($categorie); ?></h1>

                    
                        <?php foreach($produits as $produit): ?>
                <div class="article">
                                <img src="images/<?php echo $produit['photo']; ?>" alt="<?php echo $produit['nom']; ?>">
                                <h3><?php echo $produit['nom']; ?></h3>
                                <p>Prix : <?php echo $produit['prix']; ?> €</p>
                                <p>Référence : <?php echo $produit['reference']; ?></p>  
                  </div>
                        <?php endforeach; ?>

                
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