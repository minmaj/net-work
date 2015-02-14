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

$typeOrdiFixe = new TypeEquipement("Ordinateur fixe");
$ordiFixes    = $equipementManager->findAllByType($typeOrdiFixe);

function convertObjectToArray($object)
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

function convertObjectListToArray($objectList)
{
    $jsonList = array();
    foreach ($objectList as $object) {
        $jsonList[] = convertObjectToArray($object);
    }
    return $jsonList;
}

//echo json_encode(convertObjectListToArray($ordiFixes));
//var_dump($equipementManager->findAll());
//var_dump($equipementManager->find(58));

$etatTechniqueManager = new EtatTechniqueManager($db);
//var_dump($etatTechniqueManager->countEquipementByEtatTechnique());

//var_dump($equipementManager->findByEtatTechnique(new EtatTechnique("En panne mineure")));
//$notification = new Notification(null, time(), 68, 4, 0);
//$notificationManager = new NotificationManager($db);
//var_dump($notificationManager->insert($notification));

$equipementTest1 = $equipementManager->find(58);
$equipementTest2 = $equipementManager->find(60);
$equipementTest3 = $equipementManager->find(62);
$notificationManager = new NotificationManager($this->db);

$equipementTest1->setEtatTechnique("Inconnu");
$notification = new Notification(1, time(), $equipementTest1.getId(), 7, 0, null, "UNKNOWN", 0, $equipementTest1.getNom());
$notificationManager->insert($notification);
$equipementManager->update($equipementTest1);

sleep(10);

$equipementTest2->setEtatTechnique("En panne majeure");
$notification = new Notification(1, time(), $equipementTest2.getId(), 5, 0, null, "MAJOR", 0, $equipementTest2.getNom());
$notificationManager->insert($notification);
$equipementManager->update($equipementTest2);

sleep(10);

$equipementTest1->setEtatTechnique("En panne mineure");
$notification = new Notification(1, time(), $equipementTest1.getId(), 1, 0, null, "MINOR", 0, $equipementTest1.getNom());
$notificationManager->insert($notification);
$equipementManager->update($equipementTest1);

sleep(10);

$equipementTest1->setEtatTechnique("Fonctionnel");
$notification = new Notification(1, time(), $equipementTest1.getId(), 6, 0, null, "REPAIRED", 0, $equipementTest1.getNom());
$notificationManager->insert($notification);
$equipementManager->update($equipementTest1);