<?php

class Database
{
    protected static $_dbInstance = null; // A Static instance
    protected $_dbHandle;

    /**
     * Database constructor.
     * @param $username
     * @param $password
     * @param $host
     * @param $database
     */
    public function __construct($username, $password, $host, $database)
    {
        //Create PDO instance
        try {
            $this->_dbHandle = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->_dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance() {
        $username='sgb880';
        $host = 'poseidon.salford.ac.uk';
        $password = '3gNoOGfcbhjJLE1';
        $dbName = 'sgb880';

        if (self::$_dbInstance === null) { //Checks if the PDO exists
            // If a PDO doesnt exists creates a new one sending the connection info
            self::$_dbInstance = new self($username, $password, $host, $dbName);
        }
        return self::$_dbInstance;
    }

    public function getdbConnection() {
        return $this->_dbHandle; //returns the PDO handle to be used elsewhere
    }

    public function __destruct()
    {
        $this->_dbHandle = null;
    }

}