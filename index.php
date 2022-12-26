<?php
declare(strict_types=1);

use App\Banque\{CompteCourant, CompteEpargne, CompteEpargneCourant};
use App\Client\Compte as CompteClient;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Autoloader.php';
\App\Autoloader::register();

// On instancie le compte courant
$compte1 = new CompteCourant('Simon', $montant=500, 200);
$compte1->setDecouvert(200);
var_dump($compte1);

$compte1->setTitulaire('Clémence');
$compte1->retirer(300);
var_dump($compte1);

// On instancie le compte épargne
$compteEpargne = new CompteEpargne('Rika', 200, 1);

var_dump($compteEpargne);

$compteEpargne->setTauxInterets(10);

var_dump($compteEpargne);

$compteEpargne->verserInterets();

var_dump($compteEpargne);

// On instancie le compte épargne courant
$compteEpargneCourant = new CompteEpargneCourant('Tinkerbell', 200, 7, 100);
var_dump($compteEpargneCourant);

// retirer plus que ce qui est disponible sur le compte
$compteEpargneCourant->retirer(201);
var_dump($compteEpargneCourant);

// retire plus que le découvert autorisé
$compteEpargneCourant->retirer(100);

$compteEpargneCourant->setSolde(10);
$compteEpargneCourant->verserInterets();
var_dump($compteEpargneCourant);


// Compte client
$client = new CompteClient();
var_dump($client);