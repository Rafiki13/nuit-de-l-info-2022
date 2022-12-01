<!DOCTYPE html>
<?php
    use App\Ndi\Lib\MessagesFlash;
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./assets/style/styles.css"
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="frontController.php?action=readAll&controller=voiture" alt="liste des voitures">Liste des voitures</a></li>
            <li><a href="frontController.php?action=readAll&controller=utilisateur" alt="utilisateurs">Utilisateurs</a></li>
            <li><a href="frontController.php?action=readAll&controller=trajet" alt="trajets">Trajets</a></li>
            <li><a href="frontController.php?action=formulairePreferences&controller=genericcontroller" alt="préférences"><img src="./assets/img/heart.png" alt="cœur"/></a></li>
        </ul>
    </nav>
</header>
<main>
    <?php
    //messages flashes
    foreach(MessagesFlash::lireMessages("danger") as $message){
        echo '<div class="alert alert-danger">' . $message . '</div>';
    }
    foreach(MessagesFlash::lireMessages("warning") as $message){
        echo '<div class="alert alert-warning">' . $message . '</div>';
    }
    foreach(MessagesFlash::lireMessages("info") as $message){
        echo '<div class="alert alert-info">' . $message . '</div>';
    }
    foreach(MessagesFlash::lireMessages("success") as $message){
        echo '<div class="alert alert-success">' . $message . '</div>';
    }
    
    require __DIR__ . "/view.php";
    ?>
</main>
</body>
</html>