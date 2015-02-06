<?php

/*
 * Project: Net-Work
 * File: /models/administration.php
 * Purpose: model for the administration controller.
 */

class AdministrationModel extends BaseModel
{

    //data passed to the home index view
    public function index()
    {
        $equipementManager = new EquipementManager($this->db);
        // Liste de tous les types d'équipements à afficher
        $typeEquipements   = $equipementManager->countEquipementByType();
        $this->viewModel->set("typeEquipements", $typeEquipements);

        return $this->viewModel;
    }

    /**
     * 
     * @return boolean
     */
    public function showStuff()
    {
        // Récupération du type d'équipement à afficher (transmis par la requête AJAX)
        $typeEquipement    = isset($_POST["typeEquipement"]) ? $_POST["typeEquipement"] : "false";
        $type              = new Type($typeEquipement);
        $equipementManager = new EquipementManager($this->db);

        // le type de l'équipement a bien été récupéré via $_POST
        if ($typeEquipement) {
            // Renvoie un tableau contenant la liste des équipements de type (Ordinateur, Ordinateur portable, Routeur ...)
            $equipementList      = convertObjectListToArray($equipementManager->findAllByType($type));
            $nbEquipementEnPanne = $equipementManager->countEquipementEnPanneByType($type);
            return array("equipementList" => $equipementList, "nbEquipementEnPanne" => $nbEquipementEnPanne);
        } else {
            return false;
        }
    }

    /**
     * Récupère les équipements en panne
     * @return type
     */
    public function showFailureStuff()
    {
        $equipementManager = new EquipementManager($this->db);
        $panneMineure      = new EtatTechnique("En panne mineure");
        $panneMajeure      = new EtatTechnique("En panne majeure");
        $panneCritique     = new EtatTechnique("En panne critique");

        $equipementEnPanneMineure  = convertObjectListToArray($equipementManager->findEquipementByEtatTechnique($panneMineure));
        $equipementEnPanneMajeure  = convertObjectListToArray($equipementManager->findEquipementByEtatTechnique($panneMajeure));
        $equipementEnPanneCritique = convertObjectListToArray($equipementManager->findEquipementByEtatTechnique($panneCritique));

        return array(
            "mineure" => $equipementEnPanneMineure,
            "majeure" => $equipementEnPanneMajeure,
            "critique" => $equipementEnPanneCritique
        );
    }

    public function donutData()
    {
        $etatTechniqueManager        = new etatTechniqueManager($this->db);
        $equipementByTechnicalStatus = $etatTechniqueManager->countEquipementByEtatTechnique();

        return convertObjectListToArray($equipementByTechnicalStatus);
    }
    
    public function detailsData()
    {
        $idStuff    = isset($_POST["idStuff"]) ? $_POST["idStuff"] : "false";
        $equipementManager = new EquipementManager($this->db);
        $stuffFound = $equipementManager->find($idStuff);
        
        return convertObjectListToArray($stuffFound);
    }

}
