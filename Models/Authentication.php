<?php


class Authentication
{


    /*
 * User Session methods
 */
    //Checks user is logged in
    public function isLoggedIn(){
        if (isset($_SESSION['user_id'])){
            return true;
        }
        else{
            return false;
        }
    }
}