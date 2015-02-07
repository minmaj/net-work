<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notificationManager
 *
 * @author youvann
 */
class NotificationManager
{

    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function insert(Notification $notification)
    {
        try {
            $sql  = "INSERT INTO NOTIFICATION (NOTIF_DATE, NOTIF_EQUIP_ID, NOTIF_TYPE_ID, READ) VALUES(:DATE, :EQUIP_ID, :TYPE_ID, :READ);";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(
                ":DATE"     => $notification->getDate(),
                ":EQUIP_ID" => $notification->getEquipementId(),
                ":TYPE_ID"  => $notification->getTypeId(),
                ":READ"     => $notification->getRead()
            ));
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function update(Notification $notification)
    {
        try {
            $sql  = "UPDATE NOTIFICATION"
                    . "SET TYPE NOTIF_DATE = :DATE, NOTIF_EQUIP_ID = :EQUIP_ID, NOTIF_TYPE_ID = :TYPE_ID, READ = :READ"
                    . "WHERE NOTIF_ID = :ID";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(":ID" => $notification->getId()));
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    public function findAll()
    {
        try {
            $sql           = "SELECT * FROM NOTIFICATION ORDER BY NOTIF_ID";
            $stmt          = $this->db->query($sql);
            $stmt->execute();
            $results       = $stmt->fetchAll();
            $notifications = array();
            foreach ($results as $rs) {
                $notifications[] = new Notification($rs["NOTIF_ID"], $rs["NOTIF_DATE"], $rs["NOTIF_EQUIP_ID"],
                                                    $rs["NOTIF_TYPE_ID"], $rs["READ"]);
            }
            return $notifications;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

}
