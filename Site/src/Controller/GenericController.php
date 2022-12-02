<?php

namespace App\Ndi\Controller;

use App\Ndi\Lib\MessagesFlash;

class GenericController{
    protected static function afficheVue(string $cheminVue, array $parametres = []): void
    {
        extract($parametres); // Crée des variables à partir du tableau $parametres

        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }

    public static function redirect(string $url){
        header("Location: $url");
        exit();
    }

    public static function accueil(){
        self::afficheVue("view.php", [
            "pagetitle" => "ISTower",
            "pageName" => "accueil.php"]);
    }

    public static function bestiaire(){
        self::afficheVue("view.php", [
            "pagetitle" => "ISTdex",
            "pageName" => "bestiaire.php"]);
    }

    public static function jeu(){
        /*header('Location: __DIRindex.html');*/
        self::redirect("index.html");
    }
}