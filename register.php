<?php

require_once ('Models/UserDataSet.php');
$view = new stdClass();
$view->pageTitle = 'Register';

if(isset($_POST['submit'])) {

    //
    $fName = htmlentities($_POST['firstName']);
    $lName = htmlentities($_POST['lastName']);
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $date = (date("Y-m-d"));

    //Hash the password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    // Creates new user data objects via the model passes variable via parameters
    $userDataSet = new UserDataSet();
    $userDataSet->registerUser($fName, $lName, $email, $passwordHash, $date);
}

require_once('Views/register.phtml');
