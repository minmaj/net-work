<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeNotification
 *
 * @author youvann
 */
class TypeNotification
{

    private $id;
    private $libelle;
    private $negative;

    function __construct($id, $libelle, $negative)
    {
        $this->id       = $id;
        $this->libelle  = $libelle;
        $this->negative = $negative;
    }

    function getId()
    {
        return $this->id;
    }

    function getLibelle()
    {
        return $this->libelle;
    }

    function getNegative()
    {
        return $this->negative;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    function setNegative($negative)
    {
        $this->negative = $negative;
        return $this;
    }

}
