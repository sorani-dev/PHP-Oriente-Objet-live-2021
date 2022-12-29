<?php

namespace Models;

use Db\Db;
use PDOStatement;

class Model
{
    /**
     * Table dans la base de données
     * @var string
     */
    protected string $table;

    /***
     * Instance de Db
     * @var Db
     */
    private Db $db;


    public function __construct()
    {
        $this->getTableName();
    }


    /**
     * @param array $criteres Citères de recherche
     * @return array|false
     */
    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach ($criteres as $champ => $valeur) {
            // SELECT * FROM annonces WHERE actif = ?
            // bindValue(, valeur)
            $champs[] = "$champ = ?";
            $valeur = $this->convertToCompatibleValue($valeur);
            $valeurs[] = $valeur;
        }

        // Transformation du tableau "champs" en un chaîne de caractères
        $listeChamps = implode(' AND ', $champs);

        // Execution de la requête
        return $this->query("SELECT * from " . $this->table . ' WHERE ' . $listeChamps, $valeurs)->fetchAll();
    }

    public function find(int $id)
    {
        return $this->query(sql: "SELECT * FROM {$this->table} WHERE id = ?", attributs: $id)->fetch();
    }

    public function findAll()
    {
        $query = $this->query('SELECT * FROM ' . $this->table);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setteur correpondant à la clé (key)
            // ex: titre -> setTitre
            $setter = 'set' . ucwords($key);

            // On vérifie que le setteur existe
            if (method_exists($this, $setter)) {
                // On appelle le setteur
                $this->$setter($value);
            } elseif (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        return $this;
    }

    /**
     * Met à jour un enregistrement
     *
     * @param Model $model
     * @return bool
     */
    public function update(int $id, Model $model): bool
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach ($model as $champ => $valeur) {
            var_dump($champ, $valeur);
            // UPDATE demo_poo_nt.annonces SET titre = ?, description = ?, created_at = ?, actif = ? WHERE id = ?;
            if (null !== $valeur && !array_key_exists($champ, get_class_vars(__CLASS__))) {
//            if (null !== $valeur && $champ !== "db" && $champ !== 'table') {
                $champs[] = "$champ = ?";
                $valeur = $this->convertToCompatibleValue($valeur);
                $valeurs[] = $valeur;
            }
        }

        $valeurs[] = $id;

        // Transformation du tableau "champs" en un chaîne de caractères
        $listeChamps = implode(', ', $champs);

        echo "<hr>";
        $query = "UPDATE " . $this->table . ' SET ' . $listeChamps . ' WHERE id = ?';

        // Execution de la requête
        return (bool)$this->query($query, $valeurs);
    }

    /**
     * Efface/retire un enregistrement
     * @param int $id Primary key
     * @return bool Succès ou erreur
     */
    public function delete(int $id): bool
    {
        return (bool)$this->query("DELETE FROM {$this->table} WHERE id = ?;", [$id]);
    }

    /**
     * Crée un enregistrement
     *
     * @param Model $model
     * @return bool
     */
    public function create(Model $model): bool
    {
        $champs = [];
        $valeurs = [];
        $inter = [];

        // On boucle pour éclater le tableau
        foreach ($model as $champ => $valeur) {
            var_dump($champ, $valeur);
            // INSERT INTO demo_poo_nt.annonces (titre, description, created_at, actif) VALUES(?, ?, ?, ?);
            echo "<br>";
            var_dump($champ, $valeur, array_key_exists($champ, get_class_vars(__CLASS__)));
            if (null !== $valeur && !array_key_exists($champ, get_class_vars(__CLASS__))) {
//            if (null !== $valeur && $champ !== "db" && $champ !== 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeur = $this->convertToCompatibleValue($valeur);
                $valeurs[] = $valeur;
            }
        }

        // Transformation du tableau "champs" en un chaîne de caractères
        $listeChamps = implode(', ', $champs);
        $listeInter = implode(', ', $inter);

        echo "<hr>";
        $query = "INSERT INTO " . $this->table . ' ( ' . $listeChamps . ') VALUES (' . $listeInter . ');';

        // Execution de la requête
        return (bool)$this->query($query, $valeurs);
    }

    /**
     * Exécute un requête
     *
     * @param string $sql
     * @param array|null $attributs
     * @return false|PDOStatement
     */
    protected function query(string $sql, ?array $attributs = null)
    {
        // On récupère l'instance de Db
        $this->db = Db::getInstance();

        // On vérifie si des attributs sont présents
        if (null !== $attributs) {
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }
        // Requête simple
        return $this->db->query($sql);

    }

    /**
     * Change le type de la valeur selon le Driver de Base de données
     * @param mixed $value Value to compute
     * @return mixed
     */
    private function convertToCompatibleValue(mixed $value): mixed
    {
        $driver = Db::getInstance()->getAttribute(\PDO::ATTR_DRIVER_NAME);
        if ($driver === 'mysql' && is_bool($value)) {
            return (int)$value;
        }
        return $value;
    }

    protected function getTableName(): string
    {
        if (null === $this->table) {
            $this->table = strtolower(str_replace([__NAMESPACE__ . '\\', 'Model'], '', __CLASS__));
        }
        return $this->table;
    }
}