<?php

namespace Models;

final class AnnoncesModel extends Model
{
    protected string $table = 'annonces';

    protected int $id;

    protected string $titre;

    protected string $description;

    protected \DateTimeImmutable $created_at;

    protected bool $actif;

    public function __construct()
    {
        parent::__construct();
        // $this->table = 'annonces';
        // $this->created_at = new \DateTimeImmutable();
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id):self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return self
     */
    public function setTitre(string $titre):self
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description):self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->created_at;
    }

    /**
     * @param \DateTimeImmutable $created_at
     * @return self
     */
    public function setCreatedAt(\DateTimeImmutable $created_at):self
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActif($asBool = true): int|bool
    {
        return $asBool ? (bool)$this->actif: (int) $this->actif;
    }

    /**
     * @param bool $actif
     * @return self
     */
    public function setActif(int|bool $actif):self
    {
        if (is_int($actif)) {
            $actif = (bool)$actif;
        }
        $this->actif = $actif;
        return $this;
    }

}