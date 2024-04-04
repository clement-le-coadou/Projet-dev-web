<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$productId] = $quantity;
    echo "Le produit a été ajouté au panier avec succès.";
    echo $_SESSION['cart'][$productId];
}
?>
