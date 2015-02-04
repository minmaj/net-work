<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of type
 *
 * @author youvann
 */
class Type
{

    private $libelle;
    private $occurence;

    function __construct($libelle, $occurrence = 0)
    {
        $this->libelle   = $libelle;
        $this->occurence = $occurrence;
    }

    function getLibelle()
    {
        return $this->libelle;
    }

    function getOccurence()
    {
        return $this->occurence;
    }

    function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    function setOccurence($occurence)
    {
        $this->occurence = $occurence;
        return $this;
    }

}
