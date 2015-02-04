<?php

/* require_once "database.php";
  require_once "equipement.php";
  require_once "equipementManager.php"; */

function autoloadDatabase($className)
{
    $filename = "entities/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }

    $filename = "managers/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }

    $filename = "./" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}

spl_autoload_register("autoloadDatabase");


$equipement = new Equipement(1, "routeur", "nomRouteur", "Apple", "chaispas", "168d.0.0.1", "Kevin", "Aix", "0566611", "bon",
                             "chais pas", "oulala", "5");

$db                = database::getInstance()->getConnection();
$equipementManager = new EquipementManager($db);

//$equipementManager->insert($equipement);
//var_dump($equipementManager->find(1));
//var_dump($equipementManager->findAll());
$equipement2 = new Equipement(1, "routeur5", "nomRouteur", "Apple", "chaispas", "168d.0.0.1", "Kevin", "Aix", "0566611", "bon",
                              "chais pas", "oulala", "5");
//$equipementManager->update($equipement2);
//$equipementManager->update($equipement2);
$equipement2->setId(47);
//$equipementManager->delete($equipement2);

$typeOrdiFixe = new Type("Ordinateur fixe");
$ordiFixes    = $equipementManager->findAllByType($typeOrdiFixe);

function dismount($object)
{
    $reflectionClass = new ReflectionClass(get_class($object));
    $array           = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}

$ordiFixesJson = array();
foreach ($ordiFixes as $ordiFixe) {
    $ordiFixesJson[] = dismount($ordiFixe);
}
//var_dump($ordiFixesJson);
//var_dump($equipementManager->findAll());

var_dump($equipementManager->countEquipementByType());
