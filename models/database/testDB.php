<?php

require_once "database.php";
require_once "equipement.php";
require_once "equipementManager.php";

echo "salut <br/>";
$equipement = new Equipement(1, "routeur", "nomRouteur", "Apple", "chaispas", "168d.0.0.1", "Kevin", "Aix", "0566611", "bon",
                             "chais pas", "oulala", "5");

$db                = database::getInstance()->getConnection();
$equipementManager = new EquipementManager($db);

//$equipementManager->insert($equipement);
$result = $equipementManager->find(1);
var_dump($result);

/*$dsn      = 'mysql:dbname=net-work-db;host=localhost';
$user     = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMessage();
    exit;
}

// Ceci fera que PDO lancera une erreur de niveau E_WARNING au lieu d'une exception (lorsque la table n'existe pas)
$reponse = $dbh->query("SELECT TYPE, NOM FROM EQUIPEMENT WHERE EQUIPEMENT_ID = 1");
while ($donnes  = $reponse->fetch()) {
    echo "type : " . $donnes["TYPE"];
}*/


