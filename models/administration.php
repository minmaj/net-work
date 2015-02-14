<?php

/*
 * Project: Net-Work
 * File: /models/administration.php
 * Purpose: model for the administration controller.
 */

class AdministrationModel extends BaseModel {

    //data passed to the home index view
    public function index() {
        $equipementManager = new EquipementManager($this->db);
        // Liste de tous les types d'équipements à afficher
        $typeEquipements = $equipementManager->countEquipementByType();
        $this->viewModel->set("typeEquipements", $typeEquipements);

        //Lister les etats techniques
        $etatTechManager = new etatTechniqueManager($this->db);
        $etatsTechniques = $etatTechManager->selectAll();
        $this->viewModel->set("etatsTechniques", $etatsTechniques);

        //Lister les etats fonctionnels
        $etatFoncManager = new etatFonctionnelManager($this->db);
        $etatsFonctionnels = $etatFoncManager->selectAll();
        $this->viewModel->set("etatsFonctionnels", $etatsFonctionnels);

        return $this->viewModel;
    }

    /**
     * 
     * @return boolean
     */
    public function showStuff() {
        // Récupération du type d'équipement à afficher (transmis par la requête AJAX)
        $typeEquipement = isset($_POST["typeEquipement"]) ? $_POST["typeEquipement"] : false;
        $type = new TypeEquipement($typeEquipement);
        $equipementManager = new EquipementManager($this->db);

        // le type de l'équipement a bien été récupéré via $_POST
        if ($typeEquipement) {
            // Renvoie un tableau contenant la liste des équipements de type (Ordinateur, Ordinateur portable, Routeur ...)
            $equipementList = convertObjectListToArray($equipementManager->findAllByType($type));
            $nbEquipementEnPanne = $equipementManager->countEquipementEnPanneByType($type);
            return array("equipementList" => $equipementList, "nbEquipementEnPanne" => $nbEquipementEnPanne);
        } else {
            return false;
        }
    }


    public function donutData() {
        $etatTechniqueManager = new etatTechniqueManager($this->db);
        $equipementByTechnicalStatus = $etatTechniqueManager->countEquipementByEtatTechnique();

        return convertObjectListToArray($equipementByTechnicalStatus);
    }

    public function detailsData() {
        $idStuff = isset($_POST["idStuff"]) ? $_POST["idStuff"] : false;
        $equipementManager = new EquipementManager($this->db);
        $stuffFound = $equipementManager->find($idStuff);

        return convertObjectToArray($stuffFound);
    }

    /**
     * Ajouter un nouvel equipement dans la BD
     */
    public function addStuff() {
        $newStuff = filter_input_array(INPUT_POST, array(
            "nom" => FILTER_SANITIZE_SPECIAL_CHARS,
            "type" => FILTER_SANITIZE_SPECIAL_CHARS,
            "fabriquant" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ad-physique" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ad-ip" => FILTER_SANITIZE_SPECIAL_CHARS,
            "prop" => FILTER_SANITIZE_SPECIAL_CHARS,
            "localisation" => FILTER_SANITIZE_SPECIAL_CHARS,
            "numero" => FILTER_SANITIZE_SPECIAL_CHARS,
            "technique" => FILTER_SANITIZE_SPECIAL_CHARS,
            "fonctionnel" => FILTER_SANITIZE_SPECIAL_CHARS,
            "parent" => FILTER_SANITIZE_SPECIAL_CHARS,
        ));
        if (0 != strcmp($newStuff["nom"], "")) {
            $equipement = new Equipement(
                    null, $newStuff["type"], $newStuff["nom"], $newStuff["fabriquant"], $newStuff["ad-physique"], $newStuff["ad-ip"], $newStuff["prop"], $newStuff["localisation"], $newStuff["numero"], $newStuff["technique"], $newStuff["fonctionnel"], "", $newStuff["parent"]);

            $equipementManager = new EquipementManager($this->db);
            $equipementManager->insert($equipement);
            $lastId = $equipementManager->theHighestId();
            $notification = new Notification(1, time(), $lastId->getLastId(), 2, 0, null, "CREATE", 0, $newStuff["nom"]);
            $notificationManager = new NotificationManager($this->db);
            $notificationManager->insert($notification);
            return array("error" => false);
        } else {
            return array("error" => "Votre equipement doit avoir un nom");
        }
    }

    public function editStuff() {
        $newStuff = filter_input_array(INPUT_POST, array(
            "nom" => FILTER_SANITIZE_SPECIAL_CHARS,
            "type" => FILTER_SANITIZE_SPECIAL_CHARS,
            "fabriquant" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ad-physique" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ad-ip" => FILTER_SANITIZE_SPECIAL_CHARS,
            "prop" => FILTER_SANITIZE_SPECIAL_CHARS,
            "localisation" => FILTER_SANITIZE_SPECIAL_CHARS,
            "numero" => FILTER_SANITIZE_SPECIAL_CHARS,
            "technique" => FILTER_SANITIZE_SPECIAL_CHARS,
            "fonctionnel" => FILTER_SANITIZE_SPECIAL_CHARS,
            "comment" => FILTER_SANITIZE_SPECIAL_CHARS,
            "parent" => FILTER_SANITIZE_SPECIAL_CHARS,
        ));

        $idStuff = isset($_POST["idStuff"]) ? $_POST["idStuff"] : false;
        $passerEquipementEnMarche = isset($_POST["passerEquipementEnMarche"]) ? $_POST["passerEquipementEnMarche"] : false;
        $passerEquipementEnMaintenance = isset($_POST["passerEquipementEnMaintenance"]) ? $_POST["passerEquipementEnMaintenance"] : false;
        $passerEquipementEnMarche = ($passerEquipementEnMarche === "true") ? true : false;
        $passerEquipementEnMaintenance = ($passerEquipementEnMaintenance === "true") ? true : false;

        if ($passerEquipementEnMaintenance) {
            $newStuff["fonctionnel"] = "En arret de maintenance";
        }

        if ($passerEquipementEnMarche) {
            //var_dump("passerEquipementEnMarche");
            $newStuff["fonctionnel"] = "En marche";
        }

        $equipementManager = new EquipementManager($this->db);
        $errorMessage = array("nom" => "", "comment" => "");
        if (0 != strcmp($newStuff["nom"], "")) { // Nom n'est pas nul
            if (!$passerEquipementEnMarche && !$passerEquipementEnMaintenance) { // Aucun état à changer
                $equipement = new Equipement(
                        $idStuff, $newStuff["type"], $newStuff["nom"], $newStuff["fabriquant"], $newStuff["ad-physique"], $newStuff["ad-ip"], $newStuff["prop"], $newStuff["localisation"], $newStuff["numero"], $newStuff["technique"], $newStuff["fonctionnel"], $newStuff["comment"], $newStuff["parent"]);

                $notification = new Notification(1, time(), $idStuff, 3, 0, null, "UPDATE", 0, $newStuff["nom"]);
                $notificationManager = new NotificationManager($this->db);
                $notificationManager->insert($notification);

                $equipementManager->update($equipement);
            }

            if ($passerEquipementEnMarche || $passerEquipementEnMaintenance) { // Etats à changer
                if (0 != strcmp($newStuff["comment"], "")) {
                    $equipement = new Equipement(
                            $idStuff, $newStuff["type"], $newStuff["nom"], $newStuff["fabriquant"], $newStuff["ad-physique"], $newStuff["ad-ip"], $newStuff["prop"], $newStuff["localisation"], $newStuff["numero"], $newStuff["technique"], $newStuff["fonctionnel"], $newStuff["comment"], $newStuff["parent"]);

                    if ($passerEquipementEnMarche) {
                        $notification = new Notification(1, time(), $idStuff, 6, 0, null, "REPAIRED", 0, $newStuff["nom"]);
                        $notificationManager = new NotificationManager($this->db);
                        $notificationManager->insert($notification);
                    }

                    if ($passerEquipementEnMaintenance) {
                        $notification = new Notification(1, time(), $idStuff, 8, 0, null, "MAINTENANCE", 0, $newStuff["nom"]);
                        $notificationManager = new NotificationManager($this->db);
                        $notificationManager->insert($notification);
                    }

                    $equipementManager->update($equipement);
                } else {
                    $errorMessage["comment"] = "Vous devez inserer un commentaire.";
                }
            }
        } else {
            $errorMessage["nom"] = "Votre equipement doit avoir un nom.";
            if ($passerEquipementEnMarche || $passerEquipementEnMaintenance) {
                if (0 != strcmp($newStuff["comment"], "")) {
                    
                } else {
                    $errorMessage["comment"] = "Vous devez inserer un commentaire.";
                }
            }
        }
        return $errorMessage;
    }

    public function deleteStuff() {
        $idStuff = isset($_POST["idStuff"]) ? $_POST["idStuff"] : false;
        $equipementManager = new EquipementManager($this->db);
        $equipementWillBeDeleted = $equipementManager->find($idStuff);
        $deletedName = $equipementWillBeDeleted->getNom();
        $deletedId = $equipementWillBeDeleted->getId();
        $stuffDeleted = $equipementManager->deleteById($idStuff);

        $notification = new Notification(1, time(), $deletedId, 4, 0, null, "DELETE", 0, $deletedName);
        $notificationManager = new NotificationManager($this->db);
        $notificationManager->insert($notification);
        return $stuffDeleted;
    }

    public function notifData() {
        //Lister les notifications
        $notificationManager = new notificationManager($this->db);
        $notifs = $notificationManager->findAllWithType();

        return convertObjectListToArray($notifs);
    }

    public function updateRead() {
        //Lister les notifications
        $notificationManager = new notificationManager($this->db);
        $updateRead = $notificationManager->updateRead();

        return $updateRead;
    }

}