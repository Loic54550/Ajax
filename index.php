<?php

// MODELE
require('modele/modele.php');

// S'enregistrer
if (isset ($_POST['nomInscription'], $_POST['prenomInscription'], $_POST['villeInscription'])) {
    $dataUser = getUser($_POST['nomInscription'], $_POST['prenomInscription']);
    $res = $dataUser->fetch();
    if (!$res) insertUser($_POST['nomInscription'], $_POST['prenomInscription'], $_POST['villeInscription']);
}

//afficher utlisateur continent, pays, ville)
if(isset($_POST['nom'], $_POST['prenom'])) {
    $dataUser = getUser($_POST['nom'], $_POST['prenom']);
    $res = $dataUser->fetch();

    $id = idToville($res['villeId']);
    $id = $id->fetch();
    $nomVille = $id['ville'];

    $id = idToPays($id['paysId']);
    $id = $id->fetch();
    $nomPays = $id['pays'];

    $id = idToContinent($id['continentId']);
    $id = $id->fetch();
    $nomContinent = $id['continent'];

    echo "$nomContinent, $nomPays, $nomVille";

    exit;
}

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
}*/