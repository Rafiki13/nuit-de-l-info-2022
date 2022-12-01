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
<main>
    <?php

    if(isset($pageName)){
        require __DIR__ . "/" . $pageName;
    }
    ?>
</main>
</body>
</html>