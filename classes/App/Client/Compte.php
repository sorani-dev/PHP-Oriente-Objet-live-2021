<?php
namespace App\Client;

class Compte
{
    /**
     * @var string
     */
    private string $nom;

    /**
     * @var string
     */
    private string $prenom;

    /**
     * @var string
     */
    private string $ville;

    /**
     * @param string $nom
     * @param string $prenom
     */
    public function __construct(string $nom, string $prenom, string $ville)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
    }


}