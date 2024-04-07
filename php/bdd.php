<?php

if (!function_exists('ouverture_bdd')) {
    function ouverture_bdd(){
        try {
            // Connexion à la base de données SQLite
            $bdd = new PDO('sqlite:bdd.db');
            return $bdd;
        } catch (PDOException $e) {
            // En cas d'erreur lors de la connexion, afficher un message d'erreur et arrêter l'exécution du script
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            die();
        }
    }
}

if (!function_exists('fermeture_bdd')) {
    function fermeture_bdd($bdd){
        try {
            // Fermeture de la connexion à la base de données
            $bdd = null;
        } catch (PDOException $e) {
            // En cas d'erreur lors de la fermeture de la connexion, afficher un message d'erreur
            echo "Erreur lors de la fermeture de la connexion à la base de données : " . $e->getMessage();
        }
    }
}



if (!function_exists('requete_bdd')) {
    function requete_bdd($bdd){
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
    }
}

if(!isset($_SESSION['categories'])){
    $bdd = ouverture_bdd();
    requete_bdd($bdd);
    fermeture_bdd($bdd);
}
?>
