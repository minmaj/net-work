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
    public function showStuff()
    {
        // Récupération du type d'équipement à afficher (transmis par la requête AJAX)
        $typeEquipement    = isset($_POST["typeEquipement"]) ? $_POST["typeEquipement"] : false;
        $type              = new TypeEquipement($typeEquipement);
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
     * @return TypeEquipement
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
        $idStuff    = isset($_POST["idStuff"]) ? $_POST["idStuff"] : false;
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
                    null, 
                    $newStuff["type"], 
                    $newStuff["nom"], 
                    $newStuff["fabriquant"], 
                    $newStuff["ad-physique"], 
                    $newStuff["ad-ip"], 
                    $newStuff["prop"], 
                    $newStuff["localisation"], 
                    $newStuff["numero"], 
                    $newStuff["technique"], 
                    $newStuff["fonctionnel"], 
                    "", 
                    $newStuff["parent"]);

            $equipementManager = new EquipementManager($this->db); 
            $equipementManager->insert($equipement);
        
            return array("error" => false);
            
        } else {
            
            return array("error" => "Votre equipement doit avoir un nom");
        }
        
    }
    
    public function deleteStuff()
    {
        $idStuff    = isset($_POST["idStuff"]) ? $_POST["idStuff"] : false;
        $equipementManager = new EquipementManager($this->db);
        $stuffDeleted = $equipementManager->deleteById($idStuff);
        
        return $stuffDeleted;
    }
}
