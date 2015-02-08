<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of statutFonctionnel
 *
 * @author youvann
 */
class EtatFonctionnel
{

    private $libelle;

    function __construct($libelle)
    {
        $this->libelle = $libelle;
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

}
