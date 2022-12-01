<?php
namespace App\Ndi\Lib;

use App\Ndi\Model\HTTP\Session;

class MessagesFlash{
    // Les messages sont enregistrés en session associée à la clé suivante
    private static string $cleFlash = "_messagesFlash";

    // $type parmi "success", "info", "warning" ou "danger"
    public static function ajouter(string $type, string $message): void
    {
        $session = Session::getInstance();

        if($type != "success" && $type != "info" && $type != "warning" && $type != "danger") return;

        // création de la session pour les MaessageFlash
        if(!$session->contient(static::$cleFlash)){
            $session->enregistrer(static::$cleFlash, [
                "success" => [],
                "info" => [],
                "warning" => [],
                "danger" => []
            ]);
        }

        $tab = $session->lire(static::$cleFlash);
        $tab[$type][] = $message;

        $session->enregistrer(static::$cleFlash, $tab);
    }

    public static function contientMessage(string $type): bool
    {
        if($type != "success" && $type != "info" && $type != "warning" && $type != "danger") return false;
        $session = Session::getInstance();

        return $session->contient(static::$cleFlash) && !empty($session->lire(static::$cleFlash)[$type]);
    }

    // Attention : la lecture doit détruire le message
    public static function lireMessages(string $type): array
    {
        $session = Session::getInstance();

        if(!self::contientMessage($type)) return array();;

        $tab = $session->lire(self::$cleFlash);
        $messages = $tab[$type];
        $tab[$type] = array();
        $session->enregistrer(self::$cleFlash, $tab);
        return $messages;
    }

    public static function lireTousMessages(): array
    {
        $session = Session::getInstance();

        $messages = $session->lire(self::$cleFlash);
        $session->enregistrer(self::$cleFlash, array());
        return $messages; // on garde la structure de sous tableaux avec des types
    }

}