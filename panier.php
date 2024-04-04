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
</head>

<body>
    <?php include "header.php"; ?>

    <div class="content">
        <?php include "left_nav.php" ?>
        <div id="collection">
            <div class="article">
                <h1>Votre Panier:</h1>
                <?php
                session_start();
                if (empty($_SESSION['cart'])) {
                    echo "<p>Votre panier est vide.</p>";
                } else {
                    foreach ($_SESSION['cart'] as $productId => $quantity) {
                        $product = getProductById($productId);
                        echo "<p>Nom: " . $product['nom'] . "</p>";
                        echo "<p>Prix unitaire: " . $product['prix'] . " €</p>";
                        echo "<p>Quantité: " . $quantity . "</p>";
                        echo "<hr>";
                    }
                }

                function getProductById($productId)
                {
                    return array(
                        'nom' => 'Produit ' . $productId,
                        'prix' => rand(10, 100)
                    );
                }
                ?>
            </div>
        </div>

    </div>
    <?php include "footer.php"; ?>


</body>

</html>
