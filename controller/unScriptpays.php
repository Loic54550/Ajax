<?php

require('../modele/modele.php');

$_POST['continentId'];


$pays = getPays($_POST['continentId']);

echo '<option value="-1">Sélectionnez votre pays</option>';
while ($unPays = $pays->fetch()) {
    echo '<option value="' . $unPays['id'] . '">' . $unPays['pays'] . '</option>';
}