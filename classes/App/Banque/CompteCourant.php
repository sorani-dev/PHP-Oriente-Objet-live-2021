<?php
declare(strict_types=1);
namespace App\Banque;
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
     * @param string $nom Nom du titulaire
     * @param float $montant Montant du solde à l'ouverture
     * @param int $decouvert Découvert autorisé
     */
    public function __construct(string $nom, string $prenom, float $montant, int $decouvert)
    {
        // On transfère les informations nécessaires au constructeur de Compte
        parent::__construct($nom, $prenom, $montant);
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
