<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of statutTechnique
 *
 * @author youvann
 */
class etatTechnique
{

    private $label;
    private $value;

    function __construct($libelle, $nbEquipementAssocie = 0)
    {
        $this->label = $libelle;
        $this->value = $nbEquipementAssocie;
    }

    function getLibelle()
    {
        return $this->libelle;
    }

    function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    function getNbEquipementAssocie()
    {
        return $this->nbEquipementAssocie;
    }

    function setNbEquipementAssocie($nbEquipementAssocie)
    {
        $this->nbEquipementAssocie = $nbEquipementAssocie;
        return $this;
    }

}
