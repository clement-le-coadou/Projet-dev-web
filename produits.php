<?php 
session_start();
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
                <?php foreach($produits as $produit): ?>
                <div class="article">
                <img src="img/<?php echo $produit['photo']; ?>" alt="<?php echo $produit['nom']; ?>" onclick="showImageFullscreen('img/<?php echo $produit['photo']; ?>')">
                    <h3><?php echo $produit['nom']; ?></h3>
                    <p>Prix : <?php echo $produit['prix']; ?> €</p>
                    <p>Référence : <?php echo $produit['reference']; ?></p>
                    <p><div class="stock" style="visibility:collapse">Quantité : <span id="stock_<?php echo $produit['id'];?>"><?php echo $produit['stock']; ?></span></div></p>
                    <p>
                        <button onclick="decrement(<?php echo $produit['id']; ?>)">-</button>
                        <span id="panier_<?php echo $produit['id']; ?>"><?php echo $produit['panier']; ?></span>
                        <button onclick="increment(<?php echo $produit['id']; ?>)">+</button>
                    </p>
                    
                    <p><button onclick="addToCart(<?php echo $produit['id']; ?>, '<?php echo $categorie; ?>', '<?php echo $produit['nom']; ?>')">Ajouter au panier</button></p>

                </div>
            
                
                <?php endforeach; ?>
                <button class="stock" type="button" onclick=<?php
                    // Vérifier si la variable de session indiquant que l'utilisateur est administrateur est définie et est vraie
                    if($_SESSION['admin'] == true) {
                        echo "toggleStockVisibility();"; // Exécuter la fonction seulement si l'utilisateur est administrateur
                    }
                    else{
                        echo "Vous n'avez pas l'autorisation nécessaire pour effectuer cette action";
                    }
                    ?>
                 style="width:100px;height:50px;"> Afficher/Cacher le stock </button>

            </div>


        </div>
        <?php include "footer.php"; ?>
        
        <div id="modal" class="modal" onclick="this.style.display='none'">
            <img id="modal-image" class="modal-content">
        </div>

    </body>
  
</html>
