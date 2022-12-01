<?php

namespace App\Ndi\Controller;

use App\Covoiturage\Lib\MessagesFlash;
use App\Covoiturage\Lib\PreferenceControleur;

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
}