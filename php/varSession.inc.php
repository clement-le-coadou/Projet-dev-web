<?php
session_start();

// Définition des variables de session

// Tableau associatif contenant les catégories avec leurs produits et leurs informations
$_SESSION['categories'] = array(
    'citadines' => array(
        array('nom' => 'Toyota Yaris', 'prix' => 15000, 'reference' => 'TOY-001', 'photo' => 'yaris.jpg'),
        array('nom' => 'Renault Clio', 'prix' => 16000, 'reference' => 'REN-002', 'photo' => 'clio.jpg'),
        array('nom' => 'Volkswagen Polo', 'prix' => 17000, 'reference' => 'VOLK-003', 'photo' => 'polo.jpg'),
    ),
    'sportives' => array(
        array('nom' => 'Porsche 911', 'prix' => 100000, 'reference' => 'POR-001', 'photo' => 'porsche.jpg'),
        array('nom' => 'BMW M4', 'prix' => 90000, 'reference' => 'BMW-002', 'photo' => 'm4.jpg'),
        array('nom' => 'Audi R8', 'prix' => 110000, 'reference' => 'AUD-003', 'photo' => 'r8.jpg'),
    ),
    'coupes' => array(
        array('nom' => 'Ford Mustang', 'prix' => 70000, 'reference' => 'FOR-001', 'photo' => 'mustang.jpg'),
        array('nom' => 'Chevrolet Camaro', 'prix' => 75000, 'reference' => 'CHEV-002', 'photo' => 'camaro.jpg'),
        array('nom' => 'Mercedes-Benz Classe C Coupé', 'prix' => 80000, 'reference' => 'MB-003', 'photo' => 'mercedes.jpg'),
    ),
);

?>
