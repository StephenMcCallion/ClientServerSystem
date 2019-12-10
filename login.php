<?php

require_once 'Models/UserDataSet.php';

$view = new stdClass();
$view->pageTitle = 'Login';

if(isset($_POST['submit'])) {
    session_start();
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $userLogin = new User();
    $userLogin->userLogin($email, $password);
}

require_once('Views/login.phtml');
