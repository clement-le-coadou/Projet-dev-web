<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST['quantity'];
    $categorie = $_POST['categorie'];
    $name = $_POST['name'];
    $_SESSION['categories'][$categorie][$name]['panier'] = $quantity;
    echo "Le produit a été ajouté au panier avec succès.";
    echo $_SESSION['categories'][$categorie][$name]['panier'];
}
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <title>Drip Team - Panier</title>
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/article.css" rel="stylesheet" />
</head>

<body>
    <?php include "header.php"; ?>

    <div class="content">
        <?php include "left_nav.php" ?>
        <div id="collection">
            <div id="panier" class="article" style="margin-left:15%">
                <h1>Votre Panier:</h1>
                <?php
                echo isset($_SESSION['categories']);
                if (isset($_SESSION['categories'])) {
                    foreach ($_SESSION['categories'] as $categorie => $produits) {
                        foreach ($produits as $nom => $produit) {
                            if (isset($produit['panier']) && $produit['panier'] != 0) {
                                echo "Nom: " . $nom . "<br>";
                                echo "Catégorie: " . $categorie . "<br>";
                                echo "Quantité: " . $produit['panier'] . "<br>";
                                echo "Prix Unitaire" . $produit['prix']."<br>";
                                echo "Prix Total".$produit['prix']*$produit['panier']."<br>";
                                echo "<hr>";
                            }
                        }
                    }
                } else {
                    echo "Votre panier est vide.";
                }
                ?>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
