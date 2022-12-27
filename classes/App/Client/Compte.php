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
     * @param string $nom
     * @param string $prenom
     */
    public function __construct(string $nom, string $prenom)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }


}