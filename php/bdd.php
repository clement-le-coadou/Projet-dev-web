<?php

if(!isset($_SESSION['categories'])){
    // Connexion à la base de données SQLite
    $bdd = new PDO('sqlite:bdd.db');



    // Requête pour récupérer les données de la base de données
    $sql = "SELECT * FROM voitures";
    $result = $bdd->query($sql);


    // Initialisation de la variable de session
    $_SESSION['categories'] = array();

    // Traitement des résultats
    if ($result !== false) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $categorie = $row['categorie'];
            unset($row['categorie']); // Supprimer la colonne 'categorie' car elle est déjà dans la clé de tableau
            $_SESSION['categories'][$categorie][] = $row;
        }
    } else {
        echo "Erreur lors de l'exécution de la requête";
    }

    // Fermeture de la connexion à la base de données
    $bdd = null;
}
?>
