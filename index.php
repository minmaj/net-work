<?php

/*
 * Project: Net-Work
 * File: index.php
 * Purpose: landing page which handles all requests

 */

//load the required classes
/* require("classes/basecontroller.php");  
  require("classes/basemodel.php");
  require("classes/view.php");
  require("classes/viewmodel.php");
  require("classes/loader.php"); */

function autoloadClasses($className)
{
    $filename = "classes/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }

    $filename = "models/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }

    $filename = "models/database" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }

    $filename = "controllers/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}

spl_autoload_register("autoloadClasses");

$loader     = new Loader(); //create the loader object
$controller = $loader->createController(); //creates the requested controller object based on the 'controller' URL value
$controller->executeAction(); //execute the requested controller's requested method based on the 'action' URL value. Controller methods output a View.
