<?php

class SenderModel extends BaseModel {

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "Application Net-Work");
        return $this->viewModel;
    }

    public function getCountStuff() {
        $equipementManager = new EquipementManager($this->db);
        $typeEquipements = $equipementManager->countEquipementByType();
        
        return convertObjectListToArray($typeEquipements);
    }
    
    public function refreshNotif() {
        $notificationManager = new NotificationManager($this->db);
        $notifList = $notificationManager->findAllWithType();
    
        return convertObjectListToArray($notifList);
    }

}
