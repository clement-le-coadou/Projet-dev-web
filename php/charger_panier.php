<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST['quantity'];
    $categorie=$_POST['categorie'];
    $name=$_POST['name'];
    $_SESSION[$categorie][$name]['panier']= $quantity;
    echo "Le produit a été ajouté au panier avec succès.";
    echo $_SESSION[$categorie][$name]['panier'];
}
?>
