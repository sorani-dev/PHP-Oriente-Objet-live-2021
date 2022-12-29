<?php
declare(strict_types=1);

use Models\Model;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Autoloader.php';
Autoloader::register();


$model = new \Models\AnnoncesModel();
var_dump($model);
$annonces = $model->findBy(['actif' => 1]);
var_dump($annonces);


$model = new \Models\UsersModel();
var_dump($model);
$user = $model->setEmail('contact@simon-invalid.tld')
    ->setPassword(password_hash('azerty', PASSWORD_ARGON2I));
$model->create($user);
die;

$annonce = new \Models\AnnoncesModel();
// Hydratation

$donnees = [
    'titre' => 'Annonce hydratée 2',
    'titre' => 'Description de l\'annonce hydratée 2',
    'actif' => 1,
];

$annonce->hydrate($donnees);
var_dump($annonce);
$success = $model->update(6, $annonce);
var_export($success);

$model->delete(3);

// Création directe
$model = new \Models\AnnoncesModel();
$annonce = $model->setTitre('Nouvelle annonce')
    ->setDescription('Nouvelle description')
    ->setActif(false);

// $model->create($annonce);