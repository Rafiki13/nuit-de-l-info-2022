<?php

namespace App\Ndi\Model\HTTP;

class Cookie{
    public static function enregistrer(string $cle, mixed $valeur, ?int $dureeExpiration = null): void{
        $storedValue = serialize($valeur);
        if(empty($dureeExpiration)) $dureeExpiration = 0;

        setcookie($cle, $storedValue, $dureeExpiration);
    }

    public static function lire(string $cle): mixed{
        return unserialize($_COOKIE[$cle]);
    }

    public static function contient($cle) : bool{
        return array_key_exists($cle, $_COOKIE);
    }

    public static function supprimer($cle) : void{
        unset($_COOKIE[$cle]);
        setcookie($cle, "", 1);
    }
}