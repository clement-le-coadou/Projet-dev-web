<?php
session_start();

// Définition des variables de session

// Tableau associatif contenant les catégories avec leurs produits et leurs informations
$_SESSION['categories'] = array(
    'citadines' => array(
        array('nom' => 'Toyota Yaris', 'prix' => 15000, 'reference' => 'TOY-001', 'photo' => 'yaris.jpg','stock'=>6,'panier'=>0),
        array('nom' => 'Renault Clio', 'prix' => 16000, 'reference' => 'REN-002', 'photo' => 'clio.jpg','stock'=>13,'panier'=>0),
        array('nom' => 'Volkswagen Polo', 'prix' => 17000, 'reference' => 'VOLK-003', 'photo' => 'polo.jpg','stock'=>9,'panier'=>0),
        array('nom' => 'Peugeot 208', 'prix' => 17000, 'reference' => 'PEU-004', 'photo' => '208.jpg','stock'=>8,'panier'=>0),
        array('nom' => 'Fiat 500', 'prix' => 16000, 'reference' => 'FIA-005', 'photo' => '500.jpg','stock'=>10,'panier'=>0),
    ),
    'sportives' => array(
        array('nom' => 'Porsche 911', 'prix' => 100000, 'reference' => 'POR-001', 'photo' => 'porsche.jpg','stock'=>1,'panier'=>0),
        array('nom' => 'BMW M4', 'prix' => 90000, 'reference' => 'BMW-002', 'photo' => 'm4.jpg','stock'=>2,'panier'=>0),
        array('nom' => 'Audi R8', 'prix' => 110000, 'reference' => 'AUD-003', 'photo' => 'r8.jpg','stock'=>0,'panier'=>0),
        array('nom' => 'Nissan GT-R', 'prix' => 120000, 'reference' => 'NIS-004', 'photo' => 'gtr.jpg','stock'=>4,'panier'=>0),
        array('nom' => 'Ford Mustang Shelby GT500', 'prix' => 125000, 'reference' => 'FOR-005', 'photo' => 'shelby.jpg','stock'=>2,'panier'=>0),
    ),
    'coupes' => array(
        array('nom' => 'Ford Mustang', 'prix' => 70000, 'reference' => 'FOR-001', 'photo' => 'mustang.jpg','stock'=>5,'panier'=>0),
        array('nom' => 'Chevrolet Camaro', 'prix' => 75000, 'reference' => 'CHEV-002', 'photo' => 'camaro.jpg','stock'=>7,'panier'=>0),
        array('nom' => 'Mercedes-Benz Classe C Coupé', 'prix' => 80000, 'reference' => 'MB-003', 'photo' => 'mercedes.jpg','stock'=>3,'panier'=>0),
        array('nom' => 'Aston Martin Vantage', 'prix' => 140000, 'reference' => 'AST-004', 'photo' => 'vantage.jpg','stock'=>6,'panier'=>0),
        array('nom' => 'Jaguar F-Type', 'prix' => 135000, 'reference' => 'JAG-005', 'photo' => 'ftype.jpg','stock'=>3,'panier'=>0),
    ),
);

?>
