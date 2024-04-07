<?php
session_start();

include 'php/bdd.php';

$bdd = ouverture_bdd();

if(isset($_POST['valider_panier'])){
    foreach ($_SESSION['categories'] as $categorie => $produits) {

        foreach ($produits as $produit) {

            if (isset($produit['panier']) && $produit['panier'] != 0) {
                // Calcul de la nouvelle valeur du stock
                $quantity = $produit['stock'] - $produit['panier'];
    
                // Mise à jour du stock dans la base de données
                $sql = "UPDATE voitures SET stock = :quantity WHERE nom = :name"; // Met à jour le stock
                $stmt = $bdd->prepare($sql);
                $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                $stmt->bindParam(':name', $produit['nom'], PDO::PARAM_STR);
    
                // Exécution de la requête préparée et gestion des erreurs
                if ($stmt->execute()) {
                    // Mise à jour du panier dans la session
                    //$_SESSION['categories'][$categorie][$produit]['panier'] = 0;
                    echo "La base de données et la session ont été mises à jour avec succès.";
                } else {
                    echo "Erreur lors de la mise à jour de la base de données.";
                }
            }
        }
    }
    
    
    requete_bdd($bdd);
}

fermeture_bdd($bdd);
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
    <link href="css/panier.css" rel="stylesheet" />
</head>

<body>
    <?php include "header.php"; ?>

    <div class="content">
        <?php include "left_nav.php" ?>
        <div id="collection">
            <div id="panier" class="article" style="margin-left:15%">
                <h1>Votre Panier:</h1>
                <?php

                if (isset($_SESSION['categories'])) {
                    foreach ($_SESSION['categories'] as $categorie => $produits) {
                        foreach ($produits as $nom => $produit) {
                            if (isset($produit['panier']) && $produit['panier'] != 0) {
                                ?> <div class='produit'><?php
                                echo $produit['nom'] . "<br>";
                                echo "Catégorie: " . $categorie . "<br>";
                                echo "Quantité: " . $produit['panier'] . "<br>";
                                echo "Prix Unitaire " . $produit['prix']."€<br>";
                                echo "Prix Total ".$produit['prix']*$produit['panier']."€<br>";
                                ?><hr></div><?php
                                
                            }
                        }
                    }
                } else {
                    echo "Votre panier est vide.";
                }
                ?>
            </div>
            <form action="" method="POST">
                <input type="submit" value="Valider panier" name="valider_panier">
            </form>

        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
