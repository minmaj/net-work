<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of localisation
 *
 * @author youvann
 */
class Localisation
{

    private $nomSite;
    private $pays;

    function __construct($nomSite, $pays)
    {
        $this->nomSite = $nomSite;
        $this->pays    = $pays;
    }

    function getNomSite()
    {
        return $this->nomSite;
    }

    function getPays()
    {
        return $this->pays;
    }

    function setNomSite($nomSite)
    {
        $this->nomSite = $nomSite;
        return $this;
    }

    function setPays($pays)
    {
        $this->pays = $pays;
        return $this;
    }

}
