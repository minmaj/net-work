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
        try {
            $query = "INSERT INTO EQUIPEMENT (TYPE, NOM, FABRIQUANT, ADRESSE_PHYSIQUE, ADRESSE_IP, PROPRIETAIRE,"
                    . " LOCALISATION, NUMERO_SUPPORT, ETAT_TECHNIQUE, ETAT_FONCTIONNEL, COMMENT, PARENT) "
                    . "VALUES(:TYPE, :NOM, :FABRIQUANT, :ADRESSE_PHYSIQUE, :ADRESSE_IP, :PROPRIETAIRE, :LOCALISATION, :NUMERO_SUPPORT,"
                    . " :ETAT_TECHNIQUE, :ETAT_FONCTIONNEL, :COMMENT, :PARENT);";
            $stmt  = $this->db->prepare($query);
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
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function update(Equipement $equipement)
    {
        try {
            $query = "UPDATE EQUIPEMENT "
                    . "SET TYPE = :TYPE, NOM = :NOM, FABRIQUANT = :FABRIQUANT, "
                    . "ADRESSE_PHYSIQUE = :ADRESSE_PHYSIQUE, ADRESSE_IP = :ADRESSE_IP, PROPRIETAIRE = :PROPRIETAIRE,"
                    . " LOCALISATION = :LOCALISATION, NUMERO_SUPPORT = :NUMERO_SUPPORT, ETAT_TECHNIQUE = :ETAT_TECHNIQUE,"
                    . " ETAT_FONCTIONNEL = :ETAT_FONCTIONNEL, COMMENT = :COMMENT, PARENT = :PARENT "
                    . " WHERE EQUIPEMENT_ID = :EQUIPEMENT_ID;";
            $stmt  = $this->db->prepare($query);
            $stmt->execute(array(
                ":EQUIPEMENT_ID"    => $equipement->getEquipementId(),
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
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function delete(Equipement $equipement)
    {
        try {
            $query = "DELETE FROM EQUIPEMENT "
                    . "WHERE EQUIPEMENT_ID = :EQUIPEMENT_ID;";
            $stmt  = $this->db->prepare($query);
            $stmt->execute(array(
                ":EQUIPEMENT_ID" => $equipement->getEquipementId()
            ));
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function find($id)
    {
        try {
            $query = "SELECT * "
                    . "FROM EQUIPEMENT "
                    . "WHERE EQUIPEMENT_ID = :ID;";
            $stmt  = $this->db->prepare($query);
            $stmt->execute(array(":ID" => $id));
            $rs    = $stmt->fetch();
            return new Equipement($rs["EQUIPEMENT_ID"], $rs["TYPE"], $rs["NOM"], $rs["FABRIQUANT"], $rs["ADRESSE_PHYSIQUE"],
                                  $rs["ADRESSE_IP"], $rs["PROPRIETAIRE"], $rs["LOCALISATION"], $rs["NUMERO_SUPPORT"],
                                  $rs["ETAT_TECHNIQUE"], $rs["ETAT_FONCTIONNEL"], $rs["COMMENT"], $rs["PARENT"]);
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function findAll()
    {
        try {
            $query = "SELECT * "
                    . "FROM EQUIPEMENT "
                    . "ORDER BY EQUIPEMENT_ID;";

            $stmt        = $this->db->query($query);
            $stmt->execute();
            $rs          = $stmt->fetchAll();
            $equipements = array();
            foreach ($rs as $equipement) {
                $equipements[] = new Equipement($equipement["EQUIPEMENT_ID"], $equipement["TYPE"], $equipement["NOM"],
                                                $equipement["FABRIQUANT"], $equipement["ADRESSE_PHYSIQUE"],
                                                $equipement["ADRESSE_IP"], $equipement["PROPRIETAIRE"],
                                                $equipement["LOCALISATION"], $equipement["NUMERO_SUPPORT"],
                                                $equipement["ETAT_TECHNIQUE"], $equipement["ETAT_FONCTIONNEL"],
                                                $equipement["COMMENT"], $equipement["PARENT"]);
            }
            return $equipements;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

}
