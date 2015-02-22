<?php

class EtatFonctionnelManager {

    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    public function selectAll() {
        try {
            $sql = "SELECT * FROM statut_fonctionnel";

            $stmt = $this->db->query($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            $etatFonctionnel = array();
            foreach ($rs as $etat) {
                $etatFonctionnel[] = new EtatFonctionnel($etat["LIBELLE_STATUT"]);
            }
            return $etatFonctionnel;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

}
