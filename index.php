<?php
declare(strict_types=1);

require_once __DIR__ . '/classes/Compte.php';

// On instancie le compte
$compte1 = new Compte('Simon', $montant=500);

// On écrit dans la propriété titulaire
//$compte1->titulaire = 'Simon';

// On écrit dans la propriété solde
//$compte1->solde = 500;

// Avec ancien solde
var_dump($compte1);

echo "Setter: 200 euros" . PHP_EOL;
// Solde sera de 200 euros après le setter
$compte1->setSolde(200);

var_dump($compte1);

// On dépose 100 euros
echo "Dépose: 100 euros" . PHP_EOL;
$compte1->deposer(100);
// Montant invalide
$compte1->deposer(0);

var_dump($compte1);
?>
<p><?=$compte1->voirSolde();?></p>
<?php

// Retire plus que le solde courant
echo "Retire: 500 euros" . PHP_EOL;
$compte1->retirer(500);
var_dump($compte1);

// Retirer un montant invalide
$compte1->retirer(700);
$compte1->retirer(-10);
$compte1->retirer(0);

echo "Le taux d'intêrets du compte est: " . Compte::TAUX_INTERETS . "%." . PHP_EOL;

// Compte en chaîne de caractères
echo $compte1 . PHP_EOL;

// Seconde instance de compte
$compte2 = new  Compte($nom='Tinkerbell', $solde=389.25);

//$compte2->titulaire = 'Tinkerbell';
//$compte2->solde = 389.25;
var_dump($compte2);

$compte3 = new  Compte($nom='Wendy');
var_dump($compte3);
