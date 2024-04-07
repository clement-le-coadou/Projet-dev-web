<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST['quantity'];
    $categorie=$_POST['categorie'];
    $name=$_POST['name'];
    $produits = $_SESSION['categories'][$categorie];
    foreach ($produits as $index => $produit) {
        if ($produit['nom'] == $name) {
            $_SESSION['categories'][$categorie][$index]['panier'] = $quantity;
            echo "Le produit a été ajouté au panier avec succès.";
            echo $_SESSION['categories'][$categorie][$index]['panier'];
        }
    }

}
?>
