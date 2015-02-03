<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pays
 *
 * @author youvann
 */
class Pays
{

    private $nomPays;
    private $shortNomPays;

    function __construct($nomPays, $shortNomPays)
    {
        $this->nomPays      = $nomPays;
        $this->shortNomPays = $shortNomPays;
    }

    function getNomPays()
    {
        return $this->nomPays;
    }

    function getShortNomPays()
    {
        return $this->shortNomPays;
    }

    function setNomPays($nomPays)
    {
        $this->nomPays = $nomPays;
        return $this;
    }

    function setShortNomPays($shortNomPays)
    {
        $this->shortNomPays = $shortNomPays;
        return $this;
    }

}
