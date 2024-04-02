<?php 
include 'php/bdd.php';

if(isset($_GET['cat']) && isset($_SESSION['categories'][$_GET['cat']])) {
    $categorie = $_GET['cat'];
    $produits = $_SESSION['categories'][$categorie];
} else {
    header("Location: index.php");
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
        <link href="css/article.css" rel="stylesheet" />
    </head>

    <body>
        <?php include "header.php" ?>


        <div class="content">
            <div class="left_nav">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=sportives">Sportive</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=coupes">Coupé</a></li>
                <li><a href="http://localhost:8080/produits.php?cat=citadines">Citadine</a></li>
                <li><a href="contact.php">Contact</a></li>
            </div>
            <div id="collection">
                <h1>Produits de la catégorie <?php echo ucfirst($categorie); ?></h1>

                    
                <?php foreach($produits as $produit): ?>
                <div class="article">
                    <img src="img/<?php echo $produit['photo']; ?>" alt="<?php echo $produit['nom']; ?>">
                    <h3><?php echo $produit['nom']; ?></h3>
                    <p>Prix : <?php echo $produit['prix']; ?> €</p>
                    <p>Référence : <?php echo $produit['reference']; ?></p>
                    <p><div class="stock" style="visibility:hidden">Quantité : <?php echo $produit['stock']; ?></div></p>
                    <p><button onclick="">-</button><?php echo $produit['panier']?><button onclick="">+</button></p>
                </div>
                <?php endforeach; ?>
                <button type="button" onclick="var stocks = document.getElementsByClassName('stock');
                    for (var i = 0; i < stocks.length; i++) {
                        stocks[i].style.visibility = 'visible';}">Voir le stock</button>

            </div>

        </div>
        <?php include "footer.php" ?>

      
    </body>
  
</html>
