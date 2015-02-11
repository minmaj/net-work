<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notification
 *
 * @author youvann
 */
class Notification
{

    private $id;
    private $date;
    private $equipementId;
    private $typeId;
    private $read;
    private $negative;
    private $libelle;
    private $nomequip;

        
    function __construct($id, $date, $equipementId, $typeId, $read, $libelle = null, $negative = null, $nomequip = null)
    {
        $this->id           = $id;
        $this->date         = $date;
        $this->equipementId = $equipementId;
        $this->typeId       = $typeId;
        $this->read         = $read;
        $this->libelle      = $libelle;
        $this->negative     = $negative;
        $this->nomequip     = $nomequip;
    }

    function getId()
    {
        return $this->id;
    }

    function getDate()
    {
        return $this->date;
    }

    function getEquipementId()
    {
        return $this->equipementId;
    }

    function getTypeId()
    {
        return $this->typeId;
    }

    function getRead()
    {
        return $this->read;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    function setEquipementId($equipementId)
    {
        $this->equipementId = $equipementId;
        return $this;
    }

    function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    function setRead($read)
    {
        $this->read = $read;
        return $this;
    }
    
    function getNegative() {
        return $this->negative;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setNegative($negative) {
        $this->negative = $negative;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function getNomequip() {
        return $this->nomequip;
    }

    function setNomequip($nomequip) {
        $this->nomequip = $nomequip;
    }


}
