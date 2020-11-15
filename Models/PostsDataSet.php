<?php

require_once ('Models/Database.php');
require_once 'Models/Posts.php';
require_once 'Models/User.php';

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

    //Enables users to search for posts
    public function searchPosts($search){
        $statement = $this->_dbHandle->prepare("SELECT * FROM posts WHERE post_subject LIKE CONCAT( '%', :search, '%')");
        $statement->bindParam(':search', $search, PDO::PARAM_STR);
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

    public function addPost($userId, $postSubject, $postText, $postImage) {
        //assigns a prepared statement to a variable
        $statement = $this->_dbHandle->prepare("INSERT INTO posts(user_id, post_subject, post_text, post_date, post_image) VALUES(:userID, :postSubject, :postText, :postDate, :postImage)");

        //Assigns timestamp date
        date_default_timezone_set('Europe/London');
        $date = (date("Y-m-d H:i:s"));
        //Binds the parameters
        $statement->bindParam(':userID', $userId);
        $statement->bindParam(':postSubject', $postSubject);
        $statement->bindParam(':postText', $postText);
        $statement->bindParam(':postDate', $date);
        $statement->bindParam(':postImage', $postImage);
        //Executes the query
        $statement->execute(array(':userID' =>$userId, ':postSubject' =>$postSubject, ':postText' =>$postText, ':postDate' =>$date, ':postImage' =>$postImage));
        //Closes the db connection
        $this->_dbInstance->__destruct();
    }

    public function getPostsByUserID($userID) {
        $statement = $this->_dbHandle->prepare("SELECT * FROM posts WHERE user_id = :userID ORDER BY post_date DESC");
        $statement->bindParam(':userID', $userID);
        $statement->execute(array(':userID' =>$userID));
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

    public function fetchPostsWithUsers()
    {
        $statement = $this->_dbHandle->prepare("SELECT P.post_id, P.post_subject, P.post_text, P.post_image, P.post_date, U.user_id, U.userName, U.first_name FROM posts P JOIN users U ON P.user_id = U.user_id ORDER BY post_date DESC");
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

    public function fetchPostByID($postID) {
        $statement = $this->_dbHandle->prepare("SELECT P.post_id FROM posts P WHERE P.post_id = :postID");
        $statement->bindParam(':postID', $postID);
        $statement->execute(array(':postID' =>$postID));

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

}