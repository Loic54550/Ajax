<?php 

function co() {
    $db = "ajax";
    $host = "localhost";
    $username = "root";
    $password = "";

    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=' . $db . ';charset=utf8', $username, $password);
        return $pdo;
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
}

function getContinent() {
    $pdo = co();
    $sql =  'SELECT * FROM continent';
    $reponse = $pdo->query($sql);
    return $reponse;
}

function getPays($id) {
    $pdo = co();
    $sql =  'SELECT * FROM pays WHERE continentId = ' . $id;
    $reponse = $pdo->query($sql);
    return $reponse;
}

function getVille($id1) {
    $pdo = co();
    $sql =  'SELECT * FROM ville WHERE paysId = ' . $id1;
    $reponse = $pdo->query($sql);
    return $reponse;
}


//Récupération nom prenom ville
function getUser($nom, $prenom) {
    $pdo = co();
    $req = $pdo->prepare('SELECT * FROM utilisateur WHERE nom = :nom AND prenom = :prenom');
    $req->bindParam(':nom', $nom, PDO::PARAM_STR);
    $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $req->execute();
    return $req;
}

//Insertion nom prenom
function insertUser($nom, $prenom, $villeId) {
    $pdo = co();
    $req = $pdo->prepare('INSERT INTO utilisateur (nom, prenom, villeId) VALUES (:nom, :prenom, :ville)');
    $req->bindParam(":nom", $nom);
    $req->bindParam(":prenom", $prenom);
    $req->bindParam(":ville", $villeId);
    $req->execute();
}
// récupération id continent
function idToContinent($id) {
    $pdo = co();
    $req = $pdo->prepare('SELECT * FROM continent WHERE id = :id');
    $req->bindParam(':id', $id, PDO::PARAM_STR);
    $req->execute();
    return $req;
}
// récupération id pays
function idToPays($id) {
    $pdo = co();
    $req = $pdo->prepare('SELECT * FROM pays WHERE id = :id');
    $req->bindParam(':id', $id, PDO::PARAM_STR);
    $req->execute();
    return $req;
}

// récupération id ville
function idToville($id) {
    $pdo = co();
    $req = $pdo->prepare('SELECT * FROM ville WHERE id = :id');
    $req->bindParam(':id', $id, PDO::PARAM_STR);
    $req->execute();
    return $req;
}