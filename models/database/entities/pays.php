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

    private $nom;
    private $shortNom;

    function __construct($nom, $shortNom)
    {
        $this->nom      = $nom;
        $this->shortNom = $shortNom;
    }

    function getNom()
    {
        return $this->nom;
    }

    function getShortNom()
    {
        return $this->shortNom;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    function setShortNom($shortNom)
    {
        $this->shortNom = $shortNom;
        return $this;
    }

}
