<?php
require_once __DIR__ . '/classes/Compte.php';

// On instancie le compte
$compte1 = new Compte('Simon', $montant=500);

// On écrit dans la propriété titulaire
//$compte1->titulaire = 'Simon';

// On écrit dans la propriété solde
//$compte1->solde = 500;

// Avec ancien solde
var_dump($compte1);

// On dépose 100 euros
$compte1->deposer(100);
// Montant invalide
$compte1->deposer(0);

var_dump($compte1);
?>
<p><?=$compte1->voirSolde();?></p>
<?php

$compte1->retirer(100);
var_dump($compte1);

// Retirer un montant invalide
$compte1->retirer(700);
$compte1->retirer(-10);
$compte1->retirer(0);

// Seconde instance de compte
$compte2 = new  Compte($nom='Tinkerbell', $solde=389.25);

//$compte2->titulaire = 'Tinkerbell';
//$compte2->solde = 389.25;
var_dump($compte2);

$compte3 = new  Compte($nom='Wendy');
var_dump($compte3);