<?php

require_once ('Models/User.php');
require_once ('Models/Database.php');

class UserDataSet
{
    protected $_dbHandle, $_dbInstance;

    /**
     * UserDataSet constructor.
     */
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    //Registers a new user
    public function registerUser($fName, $lName, $email, $password) {

        //assigns a prepared statement to a variable
        $statement = $this->_dbHandle->prepare("INSERT INTO users(first_name, last_name, email, password, signup_date) VALUES(:firstName, :lastName, :email, :password, :signup)");

        //Binds the parameters
        $statement->bindParam(':firstName', $fName);
        $statement->bindParam(':lastName', $lName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $passwordHash);
        $statement->bindParam(':signup', $date);


        $statement->execute(array(':firstName' =>$fName, ':lastName' =>$lName, ':email' =>$email, ':password' =>$passwordHash, ':signup' =>$date));

        $this->_dbInstance->__destruct();
        }

        public function loginUser() {
        session_start();

        }

    public function userLogin($email, $password)
    {
        $statement = $this->_dbHandle->prepare('SELECT * FROM users WHERE email = :email');
        $this->_dbHandle->bind();
        
    }

}
