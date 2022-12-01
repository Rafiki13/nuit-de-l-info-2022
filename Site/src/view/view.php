<!DOCTYPE html>
<?php
    use App\Ndi\Lib\MessagesFlash;
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./assets/style/styles.css">
    <link rel="stylesheet" type="text/css" href="./assets/style/accueil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<main>
    <?php

    if(isset($pageName)){
        require __DIR__ . "/" . $pageName;
    }
    ?>
</main>
</body>
<footer>
    <a href="src/view/accueil.php"><p>Retour à l'accueil</p></a>
</footer>
</html>