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
class HighestEquipement
{

    private $lastId;

    function __construct($lastId)
    {
        $this->lastId     = $lastId;
    }


    function getLastId()
    {
        return $this->lastId;
    }

}
