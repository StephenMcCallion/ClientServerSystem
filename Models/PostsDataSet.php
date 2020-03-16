<?php

require_once ('Models/Database.php');
require_once 'Models/Posts.php';

class PostsDataSet
{
    protected $_dbHandle, $_dbInstance;

    /**
     * UserData constructor.
     */
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAll()
    {
        $statement = $this->_dbHandle->prepare("SELECT * FROM posts ORDER BY post_date DESC");
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

    public function fetchTopPosts(){
        $statement = $this->_dbHandle->prepare("SELECT * FROM posts ORDER BY likes DESC");
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

    public function fetchOldestPosts(){
        $statement = $this->_dbHandle->prepare("SELECT * FROM posts ORDER BY post_date ASC");
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

    public function searchPosts($search){
        $statement = $this->_dbHandle->prepare("SELECT * FROM posts WHERE post_subject LIKE " . $search .  "ORDER BY post_date ASC");
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

    public function addPost($userId, $postSubject, $postText) {
        //assigns a prepared statement to a variable
        $statement = $this->_dbHandle->prepare("INSERT INTO posts(user_id, post_subject, post_text, post_date) VALUES(:userID, :postSubject, :postText, :postDate)");

        //Assigns timestamp date
        $date = (date("Y-m-d"));
        //Binds the parameters
        $statement->bindParam(':userID', $userId);
        $statement->bindParam(':postSubject', $postSubject);
        $statement->bindParam(':postText', $postText);
        $statement->bindParam(':postDate', $date);
        //Executes the query
        $statement->execute(array(':userID' =>$userId, ':postSubject' =>$postSubject, ':postText' =>$postText, ':postDate' =>$date,));
        //Closes the db connection
        $this->_dbInstance->__destruct();
    }

}