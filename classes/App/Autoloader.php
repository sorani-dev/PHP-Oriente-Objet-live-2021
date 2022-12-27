<?php
namespace App;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    /**
     * @param string $className
     * @return void
     */
    public static function autoload(string $className): void
    {
        // On récupère dans $className la totalité du namespace de la classe concernée. (ex: App\Client/Compte)
        $path = str_ireplace(__NAMESPACE__ . '\\', DIRECTORY_SEPARATOR, $className);
        // On remplace les \ par le caract  ère de séparateur de répertoire (ex: /)
        $path = str_ireplace('\\', DIRECTORY_SEPARATOR, $path);
        $fichier = __DIR__. DIRECTORY_SEPARATOR . $path . '.php';
        // On vérifie que le fichier existe
        if (file_exists($fichier)) {
            require_once $fichier;
        }
    }
}