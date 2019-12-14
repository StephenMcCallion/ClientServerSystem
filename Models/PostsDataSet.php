<?php

require_once ('Models/Database.php');
require_once 'Models/Posts.php';

class PostsDataSet
{
    protected $_dbHandle, $_dbInstance;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAll()
    {
        $statement = $this->_dbHandle->prepare("SELECT * FROM posts ORDER BY post_date");
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;

    }

}