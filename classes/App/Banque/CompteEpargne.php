<?php
declare(strict_types=1);
namespace App\Banque;
use App\Client\Compte as CompteClient;

class CompteEpargne extends Compte
{
    /**
     * Taux d'intérêts du compte (en pourcentage, de 1 à 100)
     *
     * @var integer
     */
    private int $tauxInterets;

    /**
     * Constructeur du compte épargne
     *
     * @param CompteClient $compte Compte client du titulaire
     * @param float $montant Montant initial du solde
     * @param int $taux Taux d'intérêts
     */
    public function __construct(CompteClient $compte, float $montant, int $taux)
    {
        // On transfère les valeurs nécessaires au constructeur parent
        parent::__construct($compte, $montant);
        $this->tauxInterets = $taux;
    }

    /**
     * Get taux d'intérêts du compte
     *
     * @return  int
     */
    public function getTauxInterets(): int
    {
        return $this->tauxInterets;
    }

    /**
     * Set taux d'intérêts du compte
     *
     * @param  int  $tauxInterets  Taux d'interêts du compte
     *
     * @return  self
     */
    public function setTauxInterets(int $tauxInterets): self
    {
        if ($tauxInterets >= 0) {
            $this->tauxInterets = $tauxInterets;
        }

        return $this;
    }

    /**
     * Verser l'intérêt sur le compte
     *
     * @return void
     */
    public function verserInterets(): void
    {
        if ($this->solde >= 0) {
            $this->solde = $this->solde + ($this->solde * $this->tauxInterets / 100);
        }
    }
}
