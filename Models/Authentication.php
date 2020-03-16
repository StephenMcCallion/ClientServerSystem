<?php

require_once ('Models/Database.php');
require_once 'Models/User.php';

class Authentication
{
    /*
 * UserData Session methods
 */
    //Checks user is logged in
    public function isLoggedIn(){

        if (isset($_SESSION['email'])){
            return true;
        }
        else{
            header('Location: login.php');
        }
    }
}