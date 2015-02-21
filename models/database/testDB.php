<?php

function testDB() {
    $equipement = new Equipement(1, "routeur", "nomRouteur", "Apple", "chaispas", "168d.0.0.1", "Kevin", "Aix", "0566611", "bon", "chais pas", "oulala", "5");

    $db = database::getInstance()->getConnection();
    $equipementManager = new EquipementManager($db);

    $equipement2 = new Equipement(1, "routeur5", "nomRouteur", "Apple", "chaispas", "168d.0.0.1", "Kevin", "Aix", "0566611", "bon", "chais pas", "oulala", "5");
    
    $equipement2->setId(47);

    $typeOrdiFixe = new TypeEquipement("Ordinateur fixe");
    $ordiFixes = $equipementManager->findAllByType($typeOrdiFixe);


    $etatTechniqueManager = new EtatTechniqueManager($db);


    $equipementTest1 = $equipementManager->find(58);
    $equipementTest2 = $equipementManager->find(60);
    $equipementTest3 = $equipementManager->find(62);
    $notificationManager = new NotificationManager($db);

    $equipementTest1->setEtatTechnique("Inconnu");
    $notification = new Notification(1, time(), $equipementTest1->getId(), 7, 0, null, "UNKNOWN", 1, $equipementTest1->getNom());
    $notificationManager->insert($notification);
    $equipementManager->update($equipementTest1);

    sleep(10);

    $equipementTest2->setEtatTechnique("En panne majeure");
    $notification = new Notification(1, time(), $equipementTest2->getId(), 5, 0, null, "MAJOR", 1, $equipementTest2->getNom());
    $notificationManager->insert($notification);
    $equipementManager->update($equipementTest2);

    sleep(10);

    $equipementTest1->setEtatTechnique("En panne mineure");
    $notification = new Notification(1, time(), $equipementTest1->getId(), 1, 0, null, "MINOR", 1, $equipementTest1->getNom());
    $notificationManager->insert($notification);
    $equipementManager->update($equipementTest1);

    sleep(10);

    $equipementTest1->setEtatTechnique("Fonctionnel");
    $notification = new Notification(1, time(), $equipementTest1->getId(), 6, 0, null, "REPAIRED", 0, $equipementTest1->getNom());
    $notificationManager->insert($notification);
    $equipementManager->update($equipementTest1);

    return array("state" => "finished");
}
