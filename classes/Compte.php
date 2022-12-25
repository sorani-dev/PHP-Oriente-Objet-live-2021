<?php


/**
 * Objet Compte Bancaire
 */
class Compte
{
    // Propriétés
    /**
     * Titulaire du compte
     * @var string
     */
    public string $titulaire;

    /**
     * Solde du compte
     * @var float
     */
    public float $solde;


    // Méthodes
    /**
     * Constructeur du compte bancaire
     *
     * @param string $nom Nom du titulaire
     * @param float $montant Montant initial du solde
     */
    public function __construct(string $nom, float $montant = 100)
    {
        // On attribue le nom à la propriété titulaire de l'instance créée
        $this->titulaire = $nom;

        // On attribue le montant à la propriété solde
        $this->solde = $montant;
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