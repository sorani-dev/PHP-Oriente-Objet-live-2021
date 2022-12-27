<?php
declare(strict_types=1);

use App\Autoloader;
use App\Client\Compte as CompteClient;
use App\Banque\{CompteCourant, CompteEpargne, CompteEpargneCourant};

require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Autoloader.php';
Autoloader::register();

// On instancie le compte courant
$compte1 = new CompteCourant('Nara', prenom:'Shika',  montant: 500, decouvert: 200);
//$compte1->setDecouvert(200);
//var_dump($compte1);
//
//$compte1->setTitulaire('Clémence');
//$compte1->retirer(300);
var_dump($compte1);

// On instancie le compte épargne
$compteEpargne = new CompteEpargne('Yama', 'Shin', 200, 1);
var_dump($compteEpargne);

$compteEpargne->setTauxInterets(10);
var_dump($compteEpargne);

$compteEpargne->verserInterets();
var_dump($compteEpargne);

// Compte client
$client = new CompteClient('Sora', 'Nakamura');
var_dump($client);