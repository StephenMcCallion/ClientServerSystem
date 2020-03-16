<?php

session_start();

require_once('Models/UserData.php');
$view = new stdClass();
$view->pageTitle = 'Register';

// Sanitise any post data
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(($_SERVER["REQUEST_METHOD"] == "POST")) {
    //Array of error messages
    $error =[
        'firstNameError' => '',
        'lastNameError' => '',
        'emailError' => '',
        'confirmEmailError' => '',
        'passwordError' => '',
        'confirmPasswordError' => '',
    ];
    //Form Data
    $fName = sanitise($_POST['firstName']);
    $lName = sanitise($_POST['lastName']);
    $email = sanitise($_POST['email']);
    $emailConf = sanitise($_POST['confirmEmail']);
    $password = sanitise($_POST['password']);
    $passwordConf = sanitise($_POST['confirmPassword']);

    // Creates new user data objects via the model passes variable via parameters
    $userDataSet = new UserData();
//    //Validate First Name
//    if (empty($fName)){
//        $error['firstNameError'] = "Please enter your first name";
//    }
//    //Validate Last Name
//    if (empty($lName)){
//        $error['lastNameError'] = "Please enter your last name";
//    }
//    //Validate email
//    if (empty($email)){
//        $error['emailError'] = "Please enter an email";
//    }
//    elseif ($email !== $emailConf){
//        $error['confirmEmailError'] = "Email and confirmation email do not match";
//    }
    //Check Email
    if ($userDataSet->findUserByEmail($email) == true){
        $error['emailError'] = "This email is already in use";
    }
//
//    //Validate password
//    if (empty($password)){
//        $error['passwordError'] = "Please enter a password";
//    }
//    elseif (strlen($password) >= 8){
//        $error['passwordError'] = "Passwords must be 8 or more chara characters";
//    }
//
//    //Validating confirm password
//    if (empty($passwordConf)){
//        $error['confirmPasswordError'] = "Please confirm password";
//    }
//    elseif ($password !== $passwordConf) {
//        $error['confirmPasswordError'] = "Password and confirmation email do not match";
//    }
//
//    if (empty($error['firstNameError']) && empty($error['lastNameError']) && empty($error['emailError'])
//        && empty($error['confirmEmailError']) && empty($error['passwordError']) && empty($error['confirmPasswordError'])){
        $userDataSet->registerUser($fName, $lName, $email, $password);
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $fName;
        header("Location: profile.php");
//    }
//    else{
//        $view->error = $error;
//    }
//    echo $error['firstNameError'];
}

// Sanitise input
function sanitise($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
}

require_once('Views/register.phtml');
