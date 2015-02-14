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
class NotificationManager {

    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    public function insert(Notification $notification) {
        try {
            $sql = "INSERT INTO NOTIFICATION (NOTIF_DATE, NOTIF_EQUIP_ID, NOTIF_TYPE_ID, NOTIF_READ, EQUIP_NOM, TYPE_NOTIF_LIBELLE, NOTIF_NEGATIVE) VALUES(:DATE, :EQUIP_ID, :TYPE_ID, :NOTIF_READ, :EQUIP_NOM, :TYPE_NOTIF_LIBELLE, :NOTIF_NEGATIVE);";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(
                ":DATE" => $notification->getDate(),
                ":EQUIP_ID" => $notification->getEquipementId(),
                ":TYPE_ID" => $notification->getTypeId(),
                ":NOTIF_READ" => $notification->getRead(),
                ":EQUIP_NOM" => $notification->getNomequip(),
                ":TYPE_NOTIF_LIBELLE" => $notification->getLibelle(),
                ":NOTIF_NEGATIVE" => $notification->getNegative()
            ));
            
            return "lol";
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

    /*public function update(Notification $notification) {
        try {
            $sql = "UPDATE NOTIFICATION"
                    . "SET TYPE NOTIF_DATE = :DATE, NOTIF_EQUIP_ID = :EQUIP_ID, NOTIF_TYPE_ID = :TYPE_ID, READ = :READ"
                    . "WHERE NOTIF_ID = :ID";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(":ID" => $notification->getId()));
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }*/

    /*public function findAll() {
        try {
            $sql = "SELECT * FROM NOTIFICATION ORDER BY NOTIF_ID";
            $stmt = $this->db->query($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $notifications = array();
            foreach ($results as $rs) {
                $notifications[] = new Notification($rs["NOTIF_ID"], $rs["NOTIF_DATE"], $rs["NOTIF_EQUIP_ID"], $rs["NOTIF_TYPE_ID"], $rs["READ"]);
            }
            return $notifications;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }*/

    public function findAllWithType() {
        try {
            $sql = "SELECT NOTIF_ID AS ID, NOTIF_DATE AS DATE, NOTIF_EQUIP_ID AS EQUIPID, NOTIF_READ, NOTIF_TYPE_ID, TYPE_NOTIF_LIBELLE AS LIBELLE, NOTIF_NEGATIVE, EQUIP_NOM
                    FROM NOTIFICATION
                    WHERE NOTIF_READ = 0
                    ORDER BY DATE DESC";
            $stmt = $this->db->query($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $notifications = array();
            foreach ($results as $rs) {
                $notifications[] = new Notification($rs["ID"], $rs["DATE"], $rs["EQUIPID"], $rs["NOTIF_TYPE_ID"], $rs["NOTIF_READ"], time_elapsed_string($rs["DATE"]), $rs["LIBELLE"], $rs["NOTIF_NEGATIVE"], $rs["EQUIP_NOM"]);
            }
            return $notifications;
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }
    
    public function updateRead() {
        try {
            $sql = "UPDATE NOTIFICATION SET NOTIFICATION.NOTIF_READ = 1 WHERE NOTIFICATION.NOTIF_READ = 0";
            $stmt = $this->db->query($sql);
            $stmt->execute();
            
            return "Toutes les notifications sont maintenant lues";
        } catch (Exception $ex) {
            exit('<div class="alert alert-danger" role="alert"><b>Catched exception at line '
                    . $ex->getLine() . ' : </b> ' . $ex->getMessage() . '</div>');
        }
    }

}
