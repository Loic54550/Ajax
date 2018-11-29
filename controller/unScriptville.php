<?php

require('../modele/modele.php');

$_POST['paysId'];


$ville = getVille($_POST['paysId']);

echo '<option value="-1">Sélectionnez votre ville</option>';
while ($unville = $ville->fetch()) {
    echo '<option value="' . $unville['id'] . '">' . $unville['ville'] . '</option>';
}