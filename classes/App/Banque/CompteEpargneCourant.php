<?php
declare(strict_types=1);
namespace App\Banque;

use App\Client\Compte as CompteClient;
/**
 * Compte bancaire (hérite de Compte)
 */
final class CompteEpargneCourant extends CompteEpargne
{
    /**
     * Découvert autorisé
     * @var int
     */
    private int $decouvert;

    /**
     * Constructeur de compte courant
     * @param CompteClient $compte Compte client du titulaire
     * @param float $montant Montant du solde à l'ouverture
     * @param int $taux
     * @param int $decouvert Découvert autorisé
     */
    public function __construct(CompteClient $compte, float $montant, int $taux, int $decouvert)
    {
        // On transfère les informations nécessaires au constructeur de Compte
        parent::__construct($compte, $montant, $taux);
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
     * @return CompteEpargneCourant
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
