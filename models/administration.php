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

    public function donutData()
    {
        $etatTechniqueManager        = new etatTechniqueManager($this->db);
        $equipementByTechnicalStatus = $etatTechniqueManager->countEquipementByEtatTechnique();
        
        return convertObjectListToArray($equipementByTechnicalStatus);
    }

}
