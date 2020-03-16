<?php

/*
 * Initialise view.
 * Since we are using a standard class for the view object,
 * it is good practice to remember to initialise any properties of the view object.

If the login button was pressed,
check the credentials provided and if they are correct,
create a session. If they are not, prepare an error message.
For the moment use a simple if statement to check the username
and password against a fixed username and password in your code.

If the logout button was pressed, delete the session.

If the user is already logged in (or just logged in successfully),
pass the right information to the view in order to print the user's name
and provide a logout button.

If any of the buy buttons were pressed,
pass the necessary information to the view in order to display the
right message to the user.

 */

require_once 'Models/UserData.php';
require_once 'Models/Authentication.php';

$view = new stdClass();
$view->pageTitle = 'Login';

//Login UserData
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //Array of error messages for validation
//    $error =[
//        'emailError' => '',
//        'passwordError' => '',
//    ];
    $email = sanitise($_POST['email']);
    $password = sanitise($_POST['password']);

    $userData = new UserData();
    //Validate email
//    if (empty($email)){
//        $error['emailError'] = "Please enter an email";
//    }

    //Validate password
//    if (empty($password)){
//        $error['passwordError'] = "Please enter a password";
//    }

    if ($userData->loginUser($email, $password) == true){
        $_SESSION['email'] = $email;
        header("Location: profile.php");
    }
    else{
        header("Location: index.php");
    }
}

require_once('Views/login.phtml');
