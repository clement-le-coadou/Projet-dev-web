<!doctype html>
<html lang="fr-FR">
    
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet"> 
        <title>Drip Team</title>
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/article.css" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet" />
    </head>

    <body>
        <?php include "header.php"; ?>

        <div class="contenant">
        <?php include "left_nav.php" ?>   
            <div class="visionneuse">
                <?php foreach ($_SESSION['categories'] as $category => $cars): ?>
                    <h2><?php echo ucfirst($category); ?></h2>
                    <div class="gallery">
                        <?php foreach ($cars as $car): ?>
                            <div class="item">
                                <img src="img/<?php echo $car['photo']; ?>" alt="<?php echo $car['nom']; ?>">
                                <p><?php echo $car['nom']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <?php include "footer.php"; ?>

      
    </body>
  
</html>
