<?php

class Database
{

    protected static $instance;
    protected $connection;
    protected $dns      = 'mysql:host=localhost;dbname=net-work-db';
    protected $username = 'root';
    protected $password = '';

    /**
     * Singleton pattern implementation makes "new" unavailable
     */
    protected function __construct()
    {
        try {
            $this->connection = new PDO($this->dns, $this->username, $this->password);
            // Affichage des erreurs en warning
            //$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            // Activation des exceptions PDO
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            trigger_error($ex->getMessage(), E_USER_ERROR);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Singleton pattern implementation makes "clone" unavailable
     */
    protected function __clone()
    {
        
    }
    
    

}
