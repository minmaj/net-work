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

    private $nom;
    private $nationalite;

    function __construct($nom, $nationalite)
    {
        $this->nom         = $nom;
        $this->nationalite = $nationalite;
    }

    function getNom()
    {
        return $this->nom;
    }

    function getNationalite()
    {
        return $this->nationalite;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
        return $this;
    }

}
