<?php
declare(strict_types=1);
namespace App\Banque;
use App\Client\Compte as CompteClient;
/**
 * Compte bancaire (hérite de Compte)
 */
class CompteCourant extends Compte
{
    /**
     * Découvert autorisé
     * @var int
     */
    private int $decouvert;

    /**
     * Constructeur de compte courant
     * @param CompteClient $compteClient Compte client du titulaire
     * @param float $montant Montant du solde à l'ouverture
     * @param int $decouvert Découvert autorisé
     */
    public function __construct(CompteClient $compteClient, float $montant, int $decouvert)
    {
        // On transfère les informations nécessaires au constructeur de Compte
        parent::__construct($compteClient, $montant);
        $this->decouvert = $decouvert;
    }


    /**
     * @return int
     */
    public function getDecouvert(): int
    {
        return $this->decouvert;
    }

    /**
     * @param int $decouvert
     * @return CompteCourant
     */
    public function setDecouvert(int $decouvert): self
    {
        if ($decouvert > 0) {
            $this->decouvert = $decouvert;
        }
        return $this;
    }

    public function retirer(float $montant): void
    {
        // On vérifie si le découvert permet le retrait
        if ($montant >0 && $this->solde - $montant >= -$this->decouvert) {
            $this->solde -= $montant;
        } else {
            echo "Solde insuffisant.\n";
        }
    }
}
