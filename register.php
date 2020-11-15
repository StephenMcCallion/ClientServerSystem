<?php

session_start();

require_once('Models/UserData.php');
$view = new stdClass();
$view->pageTitle = 'Register';

if (isset($_POST['firstName'])) {
    $userData = new UserData();

    $fName = htmlentities($_POST['firstName']);
    $lName = htmlentities($_POST['surname']);
    $email = htmlentities($_POST['email']);;
    $confEmail = htmlentities($_POST['confEmail']);;
    $password = htmlentities($_POST['password']);;
    $confPassword = htmlentities($_POST['confPassword']);

    $userData->registerUser($fName, $lName, $email, $password);
    header("Location: index.php");
}

require_once('Views/register.phtml');
