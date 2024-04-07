<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Confirmation d'envoi</h1>
    <p>Voici les informations que vous avez soumises :</p>
    <ul>
        <li>Nom : <?php echo isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : ''; ?></li>
        <li>Prénom : <?php echo isset($_GET['prenom']) ? htmlspecialchars($_GET['prenom']) : ''; ?></li>
        <li>Adresse email : <?php echo isset($_GET['mail']) ? htmlspecialchars($_GET['mail']) : ''; ?></li>
        <li>Genre : <?php echo isset($_GET['genre']) ? htmlspecialchars($_GET['genre']) : ''; ?></li>
        <li>Métier : <?php echo isset($_GET['metier']) ? htmlspecialchars($_GET['metier']) : ''; ?></li>
        <li>Date de naissance : <?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date']) : ''; ?></li>
        <li>Sujet : <?php echo isset($_GET['sujet']) ? htmlspecialchars($_GET['sujet']) : ''; ?></li>
        <li>Contenu : <?php echo isset($_GET['contenu']) ? htmlspecialchars($_GET['contenu']) : ''; ?></li>

    </ul>
</body>
</html>
