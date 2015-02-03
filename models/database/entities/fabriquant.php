<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fabriquant
 *
 * @author youvann
 */
class Fabriquant
{

    private $nomFabriquant;
    private $nationalite;

    function __construct($nomFabriquant, $nationalite)
    {
        $this->nomFabriquant = $nomFabriquant;
        $this->nationalite   = $nationalite;
    }

    function getNomFabriquant()
    {
        return $this->nomFabriquant;
    }

    function getNationalite()
    {
        return $this->nationalite;
    }

    function setNomFabriquant($nomFabriquant)
    {
        $this->nomFabriquant = $nomFabriquant;
        return $this;
    }

    function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
        return $this;
    }

}
