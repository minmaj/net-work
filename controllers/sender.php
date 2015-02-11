<?php

/**
 * Permet d'envoyer des données en streaming (Utilisation du server sent events)
 * au client qui initie toutefois la demande de cette méthode de réponse de la
 * part du serveur.
 * 
 */
class SenderController extends BaseController {

    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/sender.php");
        $this->model = new SenderModel();
    }

    protected function index() {
        
    }

    protected function stuffCountBadges() {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        while (true) {
            echo "event: stuffCountBadges\n";
            echo "retry:" . rand(5000, 10000) . "\n";
            echo 'data:' . json_encode($this->model->getCountStuff()) . "\n\n";
            ob_flush();
            flush();
            sleep(1);
        }
    }

}
