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
        $this->viewModel->set("test","ceci est un test");
        return $this->viewModel;
    }
}

?>
