<?php
namespace Db;
use PDO;
use PDOException;

class Db extends PDO
{
    /**
     * Instance unique de la classe
     * @var Db
     */
    private static $instance;

    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = 'root';
    private const DBNAME = 'demo_poo_nt';

    private const DBCHARSET = 'utf8mb4';


    private function __construct()
    {
        // DSN de la connexion
        $dsn = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST . ';charset=' . self::DBCHARSET;

        // On appelle le constructeur de la classe PDO
        try {
            parent::__construct($dsn, self::DBUSER, self::DBPASS, []);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8mb4');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, self::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, self::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if ($e->getMessage()) {
                die($e->getMessage());
            }
        }
    }

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}