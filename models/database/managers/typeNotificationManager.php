<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeNotificationManager
 *
 * @author youvann
 */
class TypeNotificationManager
{

    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function find(Notification $notification)
    {
        try {
            $sql  = "SELECT * "
                    . "FROM NOTIFICATION N, TYPE_NOTIF T"
                    . "WHERE N.NOTIF_TYPE_ID = T.TYPE_NOTIF_ID AND N.NOTIF_TYPE_ID = :ID";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(":ID" => $notification->getId()));
            $rs   = $stmt->fetch();
            return new TypeNotification($rs["TYPE_NOTIF_ID"], $rs["TYPE_NOTIF_LIBELLE"], $rs["NEGATIVE"]);
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

}
