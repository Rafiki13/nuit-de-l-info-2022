<?php
require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';
require_once __DIR__ . '/../src/Controller/GenericController.php';
use App\Ndi\Controller\GenericController;
require_once __DIR__ . '/../src/Controller/ControllerVoiture.php';
use App\Ndi\Controller\ControllerVoiture;
require_once __DIR__ . '/../src/Lib/PreferenceControleur.php';
use App\Covoiturage\Lib\PreferenceControleur;

// instantiate the loader
$loader = new App\Covoiturage\Lib\Psr4AutoloaderClass();
// register the base directories for the namespace prefix
$loader->addNamespace('App\Covoiturage', __DIR__ . '/../src');
// register the autoloader
$loader->register();

//on récupère le controller passé dans l'url
if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
}else{
    if(PreferenceControleur::existe()){
        $controller = PreferenceControleur::lire();
    }else{
        $controller = 'voiture';
    }
}

// On recupère l'action passée dans l'URL
if(isset($_GET['action'])){
    $action = $_GET['action'];

}else{//attribution d'une valeur par défaut en cas d'erreur dans l'action
    switch($controller){
        default://inclus voiture
            $action = 'readAll';
            break;
    }
}

if(strtolower($controller) == 'genericcontroller'){
    $controllerClassName = 'App\Covoiturage\Controller\GenericController';
}else{
    $controllerClassName = 'App\Covoiturage\Controller\Controller' . ucfirst($controller);
}

//vérification de l'existance de la vue
if(!class_exists($controllerClassName) || !in_array($action, get_class_methods($controllerClassName))){
    ControllerVoiture::error("Error 404 : Not found");
}else{
    // Appel de la méthode statique $action de ControllerVoiture
    $controllerClassName::$action();
}
