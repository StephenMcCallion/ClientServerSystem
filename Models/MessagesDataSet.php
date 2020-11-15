<?php

require_once ('Models/Database.php');
require_once 'Models/Messages.php';

class MessagesDataSet
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
        $statement = $this->_dbHandle->prepare("SELECT * FROM messages ORDER BY message_date DESC");
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Messages($dbRow);
        }
        return $dataSet;
    }

    public function fetchMessagesByUserID($userFrom, $userTo)
    {
        $statement = $this->_dbHandle->prepare("SELECT * FROM messages ORDER BY message_date ASC");
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Messages($dbRow);
        }
        return $dataSet;
    }

    public function getMessagesByID($messageID) {
        $statement = $this->_dbHandle->prepare("SELECT * FROM messages WHERE message_id = :messageID ORDER BY post_date DESC");
        $statement->bindParam(':messageID', $userId);
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new Posts($dbRow);
        }
        return $dataSet;
    }

    public function addMessage($message, $sentBy, $sentTo, $messageDate) {
        //assigns a prepared statement to a variable
        $statement = $this->_dbHandle->prepare("INSERT INTO messages (message, sent_by, sent_to, message_date) 
        VALUES(:message, :sentBy, :sentTo, :messageDate)");

        //Binds the parameters
        $statement->bindParam(':message', $message);
        $statement->bindParam(':sentBy', $sentBy);
        $statement->bindParam(':sentTo', $sentTo);
        $statement->bindParam(':messageDate', $messageDate);
        //Executes the query
        $statement->execute(array(':message' =>$message, ':sentBy' =>$sentBy, ':sentTo' =>$sentTo, ':messageDate' =>$messageDate));
        //Closes the db connection
        $this->_dbInstance->__destruct();
    }

}