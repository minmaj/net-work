<?php

/**
 * Fonctions utilisées pour le projet
 * @Project: Net-Work
 * @File   : /library/functions.php
 * @Purpose: Regroupe plusieurs fonctions utiles pour le projet
 */

/**
 * Converti un objet en un tableau
 * @param TypeEquipement $object
 * @return TypeEquipement
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
 * @param TypeEquipement $objectList
 * @return TypeEquipement
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
 * @param TypeEquipement $className
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



function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}

