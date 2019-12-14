<?php

require_once ('Models/Database.php');

class User
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

    /*
     * Registration and login
     */

    // Registers a new user
    public function registerUser($fName, $lName, $email, $password) {
        //assigns a prepared statement to a variable
        $statement = $this->_dbHandle->prepare("INSERT INTO users(first_name, last_name, email, password, signup_date) VALUES(:firstName, :lastName, :email, :password, :signup)");

        //Hash password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $date = (date("Y-m-d"));

        //Binds the parameters
        $statement->bindParam(':firstName', $fName);
        $statement->bindParam(':lastName', $lName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $passwordHash);
        $statement->bindParam(':signup', $date);
        $statement->execute(array(':firstName' =>$fName, ':lastName' =>$lName, ':email' =>$email, ':password' =>$passwordHash, ':signup' =>$date));
        $this->_dbInstance->__destruct();
    }

    // Login user
    public function loginUser($email, $password){

        $sqlQuery = 'SELECT email, password FROM users WHERE :email, :password';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->execute();
    }

    // Check user exists
    public function checkUserExists($userAccount){
        $statement = $this->_dbHandle->prepare("SELECT user_id, email, password FROM users WHERE :email");
        $statement->execute();
    }


}
