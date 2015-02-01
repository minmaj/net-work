<?php
/* 
 * Project: Net-Work
 * File: /models/home.php
 * Purpose: model for the home controller.
 */

class HomeModel extends BaseModel
{
    //data passed to the home index view
    public function index()
    {   
        $this->viewModel->set("pageTitle","Application Net-Work");
        return $this->viewModel;
    }
}

?>
