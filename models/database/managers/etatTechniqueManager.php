<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of etatTechniqueManager
 *
 * @author youvann
 */
class EtatTechniqueManager {

    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    public function countEquipementByEtatTechnique() {
        try {
            $sql = "SELECT sum(case when ETAT_TECHNIQUE is null then 0 else 1 end) nbEtat, STATUT_TECHNIQUE.LIBELLE_STATUT as libelle "
                    . "FROM STATUT_TECHNIQUE LEFT JOIN EQUIPEMENT ON STATUT_TECHNIQUE.LIBELLE_STATUT = EQUIPEMENT.ETAT_TECHNIQUE "
                    . "GROUP BY ETAT_TECHNIQUE;";

            $stmt = $this->db->query($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            $etatTechniques = array();
            foreach ($rs as $etat) {
                $etatTechniques[] = new EtatTechnique($etat["libelle"], $etat["nbEtat"]);
            }
            return $etatTechniques;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function selectAll() {
        try {
            $sql = "SELECT * FROM statut_technique";

            $stmt = $this->db->query($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            $etatTechniques = array();
            foreach ($rs as $etat) {
                $etatTechniques[] = new EtatTechnique($etat["LIBELLE_STATUT"], null);
            }
            return $etatTechniques;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

}
