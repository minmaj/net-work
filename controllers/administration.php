<?php

/*
 * Project: Net-Work
 * File: /controllers/administration.php
 * Purpose: controller for the administration of the app.
 */

class AdministrationController extends BaseController
{

    //add to the parent constructor
    public function __construct($action, $urlValues)
    {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/administration.php");
        $this->model = new AdministrationModel();
    }

    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }

    protected function showStuff()
    {
        // Réponse à la requête AJAX
        echo json_encode($this->model->showStuff());
    }

    protected function showStuffDown()
    {
        // Réponse à la requête AJAX
        echo json_encode($this->model->showStuffDown());
    }

    protected function donutData()
    {
        // Réponse à la requête AJAX
        echo json_encode($this->model->donutData());
    }

}
