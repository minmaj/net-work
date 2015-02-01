<?php

class EquipementManager
{

    private $db;

    function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function insert(Equipement $equipement)
    {
        $stmt = $this->db->prepare("INSERT INTO EQUIPEMENT (TYPE, NOM, FABRIQUANT, ADRESSE_PHYSIQUE, ADRESSE_IP, PROPRIETAIRE,"
                . " LOCALISATION, NUMERO_SUPPORT, ETAT_TECHNIQUE, ETAT_FONCTIONNEL, COMMENT, PARENT) "
                . "VALUES(:TYPE, :NOM, :FABRIQUANT, :ADRESSE_PHYSIQUE, :ADRESSE_IP, :PROPRIETAIRE, :LOCALISATION, :NUMERO_SUPPORT,"
                . " :ETAT_TECHNIQUE, :ETAT_FONCTIONNEL, :COMMENT, :PARENT)");
        $stmt->bindParam(":TYPE", $equipement->getType());
        $stmt->bindParam(":NOM", $equipement->getNom());
        $stmt->bindParam(":FABRIQUANT", $equipement->getFabriquant());
        $stmt->bindParam(":ADRESSE_PHYSIQUE", $equipement->getAdressePhysique());
        $stmt->bindParam(":ADRESSE_IP", $equipement->getAdresseIp());
        $stmt->bindParam(":PROPRIETAIRE", $equipement->getProprietaire());
        $stmt->bindParam(":LOCALISATION", $equipement->getLocalisation());
        $stmt->bindParam(":NUMERO_SUPPORT", $equipement->getNumeroSupport());
        $stmt->bindParam(":ETAT_TECHNIQUE", $equipement->getEtatTechnique());
        $stmt->bindParam(":ETAT_FONCTIONNEL", $equipement->getEtatFonctionnel());
        $stmt->bindParam(":COMMENT", $equipement->getComment());
        $stmt->bindParam(":PARENT", $equipement->getParent());
        return $stmt;
    }

}
