<?php

class EquipementManager
{

    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function insert(Equipement $equipement)
    {
        $sql  = "INSERT INTO EQUIPEMENT (TYPE, NOM, FABRIQUANT, ADRESSE_PHYSIQUE, ADRESSE_IP, PROPRIETAIRE,"
                . " LOCALISATION, NUMERO_SUPPORT, ETAT_TECHNIQUE, ETAT_FONCTIONNEL, COMMENT, PARENT) "
                . "VALUES(:TYPE, :NOM, :FABRIQUANT, :ADRESSE_PHYSIQUE, :ADRESSE_IP, :PROPRIETAIRE, :LOCALISATION, :NUMERO_SUPPORT,"
                . " :ETAT_TECHNIQUE, :ETAT_FONCTIONNEL, :COMMENT, :PARENT);";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            ":TYPE"             => $equipement->getType(),
            ":NOM"              => $equipement->getNom(),
            ":FABRIQUANT"       => $equipement->getFabriquant(),
            ":ADRESSE_PHYSIQUE" => $equipement->getAdressePhysique(),
            ":ADRESSE_IP"       => $equipement->getAdresseIp(),
            ":PROPRIETAIRE"     => $equipement->getProprietaire(),
            ":LOCALISATION"     => $equipement->getLocalisation(),
            ":NUMERO_SUPPORT"   => $equipement->getNumeroSupport(),
            ":ETAT_TECHNIQUE"   => $equipement->getEtatTechnique(),
            ":ETAT_FONCTIONNEL" => $equipement->getEtatFonctionnel(),
            ":COMMENT"          => $equipement->getComment(),
            ":PARENT"           => $equipement->getParent()
        ));
        return $stmt;
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM EQUIPEMENT WHERE EQUIPEMENT_ID = :ID;");
        $stmt->execute(array(":ID" => $id));
        $rs   = $stmt->fetch();
        return new Equipement($rs["EQUIPEMENT_ID"], $rs["TYPE"], $rs["NOM"], $rs["FABRIQUANT"], $rs["ADRESSE_PHYSIQUE"],
                              $rs["ADRESSE_IP"], $rs["PROPRIETAIRE"], $rs["LOCALISATION"], $rs["NUMERO_SUPPORT"],
                              $rs["ETAT_TECHNIQUE"], $rs["ETAT_FONCTIONNEL"], $rs["COMMENT"], $rs["PARENT"]);
    }

}
