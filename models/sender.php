<?php

class SenderModel extends BaseModel {

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "Application Net-Work");
        return $this->viewModel;
    }

    public function refreshFailureStuff() {
        $equipementManager = new EquipementManager($this->db);
        $panneMineure = new EtatTechnique("En panne mineure");
        $panneMajeure = new EtatTechnique("En panne majeure");
        //$panneCritique     = new EtatTechnique("En panne critique");

        $equipementEnPanneMineure = convertObjectListToArray($equipementManager->findEquipementByEtatTechnique($panneMineure));
        $equipementEnPanneMajeure = convertObjectListToArray($equipementManager->findEquipementByEtatTechnique($panneMajeure));
        //$equipementEnPanneCritique = convertObjectListToArray($equipementManager->findEquipementByEtatTechnique($panneCritique));

        return array(
            "mineure" => $equipementEnPanneMineure,
            "majeure" => $equipementEnPanneMajeure
        );
    }

    public function getCountStuff() {
        $equipementManager = new EquipementManager($this->db);
        $typeEquipements = $equipementManager->countEquipementByType();

        return convertObjectListToArray($typeEquipements);
    }

    public function getStuffTable() {
        $equipementManager = new EquipementManager($this->db);
        $stuff = $equipementManager->findAll(true);
        return $stuff;
    }

    public function refreshNotif() {
        $notificationManager = new NotificationManager($this->db);
        $notifList = $notificationManager->findAllWithType();

        return convertObjectListToArray($notifList);
    }

    public function donutData() {
        $etatTechniqueManager = new EtatTechniqueManager($this->db);
        $equipementByTechnicalStatus = $etatTechniqueManager->countEquipementByEtatTechnique();

        return convertObjectListToArray($equipementByTechnicalStatus);
    }

}
