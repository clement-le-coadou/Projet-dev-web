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
        <script src="JS/produit.js" defer></script>
    </head>

    <body>
        <?php include "header.php"; ?>


        <div class="content">
            <?php include "left_nav.php" ?>
            <div id="collection">
                <h1>Produits de la catégorie <?php echo ucfirst($categorie); ?></h1>

                    
                <?php foreach($produits as $produit): ?>
                <div class="article">
                    <img src="img/<?php echo $produit['photo']; ?>" alt="<?php echo $produit['nom']; ?>">
                    <h3><?php echo $produit['nom']; ?></h3>
                    <p>Prix : <?php echo $produit['prix']; ?> €</p>
                    <p>Référence : <?php echo $produit['reference']; ?></p>
                    <p><div class="stock" style="visibility:hidden">Quantité : <span id="stock_<?php echo $produit['id'];?>"><?php echo $produit['stock']; ?></span></div></p>
                    <p>
                        <button onclick="decrement(<?php echo $produit['id']; ?>)">-</button>
                        <span id="panier_<?php echo $produit['id']; ?>"><?php echo $produit['panier']; ?></span>
                        <button onclick="increment(<?php echo $produit['id']; ?>)">+</button>
                    </p>
                    <p><button onclick="addToCart(<?php echo $produit['id']; ?>)">Ajouter au panier</button></p>

                </div>
            
                <?php endforeach; ?>
                <button type="button" onclick="var stocks = document.getElementsByClassName('stock');
                    for (var i = 0; i < stocks.length; i++) {
                        stocks[i].style.visibility = 'visible';}">Voir le stock</button>

            </div>

        </div>
        <?php include "footer.php"; ?>
        
      
    </body>
  
</html>
