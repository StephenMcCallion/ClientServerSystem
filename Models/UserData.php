<?php

require_once ('Models/Database.php');

class UserData
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

    /*
     * Registration and login
     */

    // Registers a new user
    public function registerUser($fName, $lName, $email, $password) {
        //assigns a prepared statement to a variable
        $statement = $this->_dbHandle->prepare("INSERT INTO users(first_name, last_name, email, password, signup_date) VALUES(:firstName, :lastName, :email, :password, :signup)");

        //Hash password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        //Assigns signup date
        $date = (date("Y-m-d"));
        //Binds the parameters
        $statement->bindParam(':firstName', $fName);
        $statement->bindParam(':lastName', $lName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $passwordHash);
        $statement->bindParam(':signup', $date);
        //Executes the query
        $statement->execute(array(':firstName' =>$fName, ':lastName' =>$lName, ':email' =>$email, ':password' =>$passwordHash, ':signup' =>$date));
        //Closes the db connection
        $this->_dbInstance->__destruct();
    }

    // Login user
    public function loginUser($email, $password){
        $statement = $this->_dbHandle->prepare('SELECT email, password FROM users WHERE email=:email AND password=:password');

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $passwordHash);

        if (password_verify($password, $passwordHash)){
            return true;
        }
        $statement->execute(array(':email' =>$email, ':password' =>$passwordHash));
        $this->_dbInstance->__destruct();

        if ($statement->rowCount() > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    public function findUserByEmail($email){
        $statement = $this->_dbHandle->prepare("SELECT email FROM users WHERE email=:email");
        $statement->bindParam(':email', $email);
        $statement->execute();
        $this->_dbInstance->__destruct();

        if ($statement->rowCount() > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    public function fetchUser($userID){
        $statement = $this->_dbHandle->prepare("SELECT * FROM users WHERE user_id = :userID");
        $statement->bindParam(':userID', $userID);
        $statement->execute();
        $this->_dbInstance->__destruct();

        $dataSet = [];
        while ($dbRow = $statement->fetch()) {
            $dataSet[] = new User($dbRow);
        }
        return $dataSet;
    }

}
