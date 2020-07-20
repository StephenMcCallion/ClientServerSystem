<?php

require_once ('Models/Database.php');
require_once ('Models/UserData.php');
require_once ('Models/User.php');

class Authentication
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

    public function login($email, $password) {
        $query = ("SELECT user_id, watchlist_id, first_name, last_name, email, password, signup_date, profile_pic FROM users WHERE email = :email");

        $statement = $this->_dbHandle->prepare($query);

        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        $this->_dbInstance->__destruct();

        if ($user == null) {
            return false;
        } else {
            $verifiedPassword = password_verify($password, $user['password']);

            // Password provided matches the value in the database for a given account
            if ($verifiedPassword) {
                // Return the associated User
                return new User($user);
            } else {

                return false;
            }
        }

    }
}