<?php
declare(strict_types=1);

namespace App\Banque;

use App\Client\Compte as CompteClient;

/**
 * Objet Compte Bancaire
 */
abstract class Compte
{
    // Propriétés
    /**
     * Titulaire du compte
     * @var CompteClient
     */
    private CompteClient $titulaire;
 
    /**
     * Solde du compte
     * @var float
     */
    protected float $solde;

    // Méthodes

    /**
     * Constructeur du compte bancaire
     *
     * @param CompteClient $compte Compte client du titulaire
     * @param float $montant Montant initial du solde
     */
    public function __construct(CompteClient $compte, float $montant = 100)
    {
        // On attribue le nom à la propriété titulaire de l'instance créée
        $this->titulaire = $compte;

        // On attribue le montant à la propriété solde
        $this->solde = $montant;
    }


    /**
     * Méthode magique pour le conversion en chaîne de caractères
     *
     * @return string
     */
    public function __toString(): string
    {
        return "Vous visualisez le compte de {$this->titulaire}, le solde est de {$this->solde} euros.";
    }

    // Accesseurs

    /**
     * Getter du Titulaire - Retourne la valeur du Compte du titulaire du compte
     * @return CompteClient
     */
    public function getTitulaire(): CompteClient
    {
        return $this->titulaire;
    }

    /**
     * Modifie le compte du titulaire du compte et retourne l'objet
     * @param CompteClient $compte Nouveau Compte Client du titulaire
     * @return Compte Compte bancaire
     */
    public function setTitulaire(CompteClient $compte): self
    {
        $this->titulaire = $compte;
        return $this;
    }

    /**
     * Retourne le solde du compte
     *
     * @return float Solde du Compte
     */
    public function getSolde(): float
    {
        return $this->solde;
    }

    /**
     * Modifie le solde du compte
     *
     * @param float $montant Montant du solde
     * @return Compte Compte bancaire
     */
    public function setSolde(float $montant): self
    {
        if ($montant >= 0) {
            $this->solde = $montant;
        }
        return $this;
    }

    /**
     * Déposer de l'argent sur le compte
     *
     * @param float $montant Montant déposé
     * @return void
     */
    public function deposer(float $montant): void
    {
        // On vérifie que le montant soit positif
        if ($montant > 0) {
            $this->solde += $montant;
        }
    }

    /**
     * Retire un montant du solde du compte
     *
     * @param float $montant Montant à retirer
     * @return void
     */
    public function retirer(float $montant): void
    {
        // On vérifie le montant et le solde
        if ($montant > 0 && $this->solde >= $montant) {
            $this->solde -= $montant;
        } else {
            echo "Montant invalide ou solde insuffisant.\n";
        }
    }

    /**
     * Retourne une chaîne de caractères affichant le solde
     *
     * @return string
     */
    public function voirSolde(): string
    {
        return "Le solde du compte est de $this->solde.\n";
    }
}
