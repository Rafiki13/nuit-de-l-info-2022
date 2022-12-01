<?php
require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';
require_once __DIR__ . '/../src/Controller/GenericController.php';
use App\Ndi\Controller\GenericController;

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
    $controller = "genericcontroller";
}

// On recupère l'action passée dans l'URL
if(isset($_GET['action'])){
    $action = $_GET['action'];

}else{//attribution d'une valeur par défaut en cas d'erreur dans l'action
    $action = "accueil";
}

if(strtolower($controller) == 'genericcontroller'){
    $controllerClassName = 'App\Ndi\Controller\GenericController';
}else{
    $controllerClassName = 'App\Ndi\Controller\Controller' . ucfirst($controller);
}

//vérification de l'existance de la vue
if(!class_exists($controllerClassName) || !in_array($action, get_class_methods($controllerClassName))){
    // TODO
}else{
    // Appel de la méthode statique $action de ControllerVoiture
    $controllerClassName::$action();
}
