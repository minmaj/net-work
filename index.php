<?php

/*
 * Project: Net-Work
 * File: index.php
 * Purpose: landing page which handles all requests
 */

require_once("library/functions.php");

$loader     = new Loader(); //create the loader object
$controller = $loader->createController(); //creates the requested controller object based on the 'controller' URL value
$controller->executeAction(); //execute the requested controller's requested method based on the 'action' URL value. Controller methods output a View.
