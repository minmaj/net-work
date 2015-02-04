<?php

/**
 * Fonctions utilisées pour le projet
 * @Project: Net-Work
 * @File   : /library/functions.php
 * @Purpose: Regroupe plusieurs fonctions utiles pour le projet
 */

/**
 * Converti un objet en un tableau
 * @param type $object
 * @return type
 */
function convertObjectToArray($object)
{
    $reflectionClass = new ReflectionClass(get_class($object));
    $array           = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}

/**
 * Converti une liste d'objet en un tableau de tableau
 * @param type $objectList
 * @return type
 */
function convertObjectListToArray($objectList)
{
    $jsonList = array();
    foreach ($objectList as $object) {
        $jsonList[] = convertObjectToArray($object);
    }
    return $jsonList;
}

/**
 * Charge automatiquement tous les fichiers nécessaires au bon fonctionnement de l'application
 * @param type $className
 */
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

    $filename = "models/database/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }

    $filename = "models/database/entities/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }

    $filename = "models/database/managers/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }

    $filename = "controllers/" . $className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}

spl_autoload_register("autoloadClasses");
