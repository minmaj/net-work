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
                    . "VALUES(:TYPE, :NOM, :FABRIQUANT, :ADRESSE_PHYSIQUE, :ADRESSE_IP, :PROPRIETAIRE, :LOCALISATION,"
                    . " :NUMERO_SUPPORT, :ETAT_TECHNIQUE, :ETAT_FONCTIONNEL, :COMMENT, :PARENT);";
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
                ":EQUIPEMENT_ID"    => $equipement->getId(),
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
                ":EQUIPEMENT_ID" => $equipement->getId()
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

    public function findAllByType(Type $type)
    {
        try {
            $sql         = "SELECT * FROM EQUIPEMENT WHERE TYPE = :TYPE";
            $stmt        = $this->db->prepare($sql);
            $stmt->execute(array(":TYPE" => $type->getLibelle()));
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
            //var_dump($equipements);
            return $equipements;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function findEquipementByEtatTechnique(EtatTechnique $etatTechnique)
    {
        try {
            $sql  = "SELECT * FROM EQUIPEMENT WHERE ETAT_TECHNIQUE = :ETAT_TECHNIQUE";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(":ETAT_TECHNIQUE" => $etatTechnique->getLibelle()));
            $rs   = $stmt->fetchAll();

            $equipements = array();
            foreach ($rs as $equipement) {
                $equipements[] = new Equipement($equipement["EQUIPEMENT_ID"], $equipement["TYPE"], $equipement["NOM"],
                                              $equipement["FABRIQUANT"], $equipement["ADRESSE_PHYSIQUE"],
                                              $equipement["ADRESSE_IP"], $equipement["PROPRIETAIRE"], $equipement["LOCALISATION"],
                                              $equipement["NUMERO_SUPPORT"], $equipement["ETAT_TECHNIQUE"],
                                              $equipement["ETAT_FONCTIONNEL"], $equipement["COMMENT"], $equipement["PARENT"]);
            }
            return $equipements;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function countEquipementEnPanneByType(Type $type)
    {
        try {
            $sql  = 'SELECT COUNT(*) as occurence '
                    . 'FROM equipement '
                    . 'WHERE (ETAT_TECHNIQUE = "En panne mineure" OR ETAT_TECHNIQUE = "En panne majeure") AND TYPE = :TYPE';
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(":TYPE" => $type->getLibelle()));
            $rs   = $stmt->fetch();
            return $rs["occurence"];
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function countEquipementByType()
    {
        try {
            $sql   = "SELECT sum(case when EQUIPEMENT_ID is null then 0 else 1 end) total, type_libelle, html_display "
                    . "FROM type LEFT JOIN equipement ON type.type_libelle = equipement.type "
                    . "GROUP BY type_libelle";
            $stmt  = $this->db->query($sql);
            $stmt->execute();
            $rs    = $stmt->fetchAll();
            $types = array();
            foreach ($rs as $type) {
                $types[] = new Type($type["type_libelle"], $type["total"], $type["html_display"]);
            }
            return $types;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

}
