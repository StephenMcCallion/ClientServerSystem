<?php
require_once ('Models/Database.php');
require_once ('Models/Friends.php');

class FriendsDataSet
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

    public function fetchMyFriends($user1) {
        $statement = $this->_dbHandle->prepare("SELECT * FROM friends WHERE friend1=:user1");
        $statement->bindParam(':user1', $user1);

        $statement->execute(array(':user1' =>$user1));

        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Friends($dbRow);
        }
        return $dataSet;
    }

    public function fetchFriendship($user1, $user2) {
        $statement = $this->_dbHandle->prepare("SELECT * FROM friends WHERE :user1, :user2");
        $statement->bindParam(':user1', $user1);
        $statement->bindParam(':user2', $user2);

        $statement->execute(array(':user1' =>$user1, ':user2' =>$user2));

        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Friends($dbRow);
        }
        return $dataSet;
    }

    public function addFriend($user1, $user2, $friendshipDate) {
        $statement = $this->_dbHandle->prepare("INSERT INTO friends(friend1, friend2, friendship_date) VALUES(:user1, :user2, :friendshipDate)");

        //Binds the parameters
        $statement->bindParam(':user1', $user1);
        $statement->bindParam(':user2', $user2);
        $statement->bindParam(':friendshipDate', $friendshipDate);

        //Executes the query
        $statement->execute(array(':user1' =>$user1, ':user2' =>$user2, ':friendshipDate' =>$friendshipDate));
        //Closes the db connection
        $this->_dbInstance->__destruct();
    }

    public function checkIfFriend($user1, $user2) {
        $statement = $this->_dbHandle->prepare("SELECT * FROM friends WHERE :user1, :user2");
        $statement->bindParam(':user1', $user1);
        $statement->bindParam(':user2', $user2);

        $statement->execute(array(':user1' =>$user1, ':user2' =>$user2));

        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Friends($dbRow);
        }
        return $dataSet;
    }
}