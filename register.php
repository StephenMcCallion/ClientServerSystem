<?php

require_once('Models/User.php');
$view = new stdClass();
$view->pageTitle = 'Register';

// Define variables and set to empty values
$fName = $lName = $email = $password = "";


if(($_SERVER["REQUEST_METHOD"] == "POST")) {

    $fName = sanitise($_POST['firstName']);
    $lName = sanitise($_POST['lastName']);
    $email = sanitise($_POST['email']);
    $password = sanitise($_POST['password']);


    // Creates new user data objects via the model passes variable via parameters
    $userDataSet = new User();
    $userDataSet->registerUser($fName, $lName, $email, $password);
}

// Sanitise input
function sanitise($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validate First Name

// Validate Last Name

// Validate Email

// Check Email

// Validate Password

require_once('Views/register.phtml');
