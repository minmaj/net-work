<?php

class Equipement
{

    private $equipementId;
    private $type;
    private $nom;
    private $fabriquant;
    private $adressePhysique;
    private $adresseIp;
    private $proprietaire;
    private $localisation;
    private $numeroSupport;
    private $etatTechnique;
    private $etatFonctionnel;
    private $comment;
    private $parent;

    function __construct($equipementId, $type, $nom, $fabriquant, $adressePhysique, $adresseIp, $proprietaire, $localisation,
                         $numeroSupport, $etatTechnique, $etatFonctionnel, $comment, $parent)
    {
        $this->equipementId    = $equipementId;
        $this->type            = $type;
        $this->nom             = $nom;
        $this->fabriquant      = $fabriquant;
        $this->adressePhysique = $adressePhysique;
        $this->adresseIp       = $adresseIp;
        $this->proprietaire    = $proprietaire;
        $this->localisation    = $localisation;
        $this->numeroSupport   = $numeroSupport;
        $this->etatTechnique   = $etatTechnique;
        $this->etatFonctionnel = $etatFonctionnel;
        $this->comment         = $comment;
        $this->parent          = $parent;
    }

    public function __toString()
    {
        return "Type : " . $this->type;
    }

    function getEquipementId()
    {
        return $this->equipementId;
    }

    function getType()
    {
        return $this->type;
    }

    function getNom()
    {
        return $this->nom;
    }

    function getFabriquant()
    {
        return $this->fabriquant;
    }

    function getAdressePhysique()
    {
        return $this->adressePhysique;
    }

    function getAdresseIp()
    {
        return $this->adresseIp;
    }

    function getProprietaire()
    {
        return $this->proprietaire;
    }

    function getLocalisation()
    {
        return $this->localisation;
    }

    function getNumeroSupport()
    {
        return $this->numeroSupport;
    }

    function getEtatTechnique()
    {
        return $this->etatTechnique;
    }

    function getEtatFonctionnel()
    {
        return $this->etatFonctionnel;
    }

    function getComment()
    {
        return $this->comment;
    }

    function getParent()
    {
        return $this->parent;
    }

    function setEquipementId($equipementId)
    {
        $this->equipementId = $equipementId;
        return $this;
    }

    function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    function setFabriquant($fabriquant)
    {
        $this->fabriquant = $fabriquant;
        return $this;
    }

    function setAdressePhysique($adressePhysique)
    {
        $this->adressePhysique = $adressePhysique;
        return $this;
    }

    function setAdresseIp($adresseIp)
    {
        $this->adresseIp = $adresseIp;
        return $this;
    }

    function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;
        return $this;
    }

    function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
        return $this;
    }

    function setNumeroSupport($numeroSupport)
    {
        $this->numeroSupport = $numeroSupport;
        return $this;
    }

    function setEtatTechnique($etatTechnique)
    {
        $this->etatTechnique = $etatTechnique;
        return $this;
    }

    function setEtatFonctionnel($etatFonctionnel)
    {
        $this->etatFonctionnel = $etatFonctionnel;
        return $this;
    }

    function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

}
