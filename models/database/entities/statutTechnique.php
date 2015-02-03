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
class StatutTechnique
{

    private $libelleStatut;

    function __construct($libelleStatut)
    {
        $this->libelleStatut = $libelleStatut;
    }

    function getLibelleStatut()
    {
        return $this->libelleStatut;
    }

    function setLibelleStatut($libelleStatut)
    {
        $this->libelleStatut = $libelleStatut;
        return $this;
    }

}
