<?php

// MODELE
require('modele/modele.php');

// CONTROLLER
$reponse = getContinent();

// VIEWS
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('view');

$twig = new Twig_Environment($loader);

echo $twig->render('index.twig.html', array(
    'continents' => $reponse
));


/* 
// connection
$messageErreur = "";
if (isset($_POST['nomConnexion'], $_POST['prenomConnexion'])) {
    $dataUser = getUser($_POST['nomConnexion'], $_POST['prenomConnexion']);
    $res = $dataUser->fetch(); 
    if ($res) {
        $_SESSION['id'] = $res['id'];
        $messageErreur = "YOU ARE CONNECTED";
    }
    else {
        $messageErreur = "Erreur";
    }
}
*/

// S'enregistrer
if (isset($_POST['nomInscription'], $_POST['prenomInscription'])) {
    $dataUser = getUser($_POST['nomInscription'], $_POST['prenomInscription']);
    $res = $dataUser->fetch(); 
    if (!$res) insertUser($_POST['nomInscription'], $_POST['prenomInscription']);
}


