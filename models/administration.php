<?php

/*
 * Project: Net-Work
 * File: /models/administration.php
 * Purpose: model for the administration controller.
 */

class AdministrationModel extends BaseModel
{

    //data passed to the home index view
    public function index()
    {
        $equipementManager = new EquipementManager(database::getInstance()->getConnection());
        $typeEquipements   = $equipementManager->countEquipementByType();

        var_dump($typeEquipements);

        $this->viewModel->set("test", "ceci est un test");
        return $this->viewModel;
    }

}
