<?php
namespace App\Ndi\Config;

class Config
{
    private static array $databases = [
        'hostname' => '127.0.0.1',
        'database' => 'newTDphp',
        'login' => 'root',
        'password' => '',
        'port' => '3306'
    ];

    private static $dureeExpiration = 3600; // temps en secondes

    static public function getHostname()
    {
        return static::$databases['hostname'];
    }

    static public function getLogin()
    {
        return static::$databases['login'];
    }

    static public function getDatabase()
    {
        return static::$databases['database'];
    }

    static public function getPassword()
    {
        return static::$databases['password'];
    }

    static public function getPort()
    {
        return static::$databases['port'];
    }

    /**
     * @return int
     */
    public static function getDureeExpiration(): int
    {
        return self::$dureeExpiration;
    }
}