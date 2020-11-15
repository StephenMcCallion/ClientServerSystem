<?php
session_start();
require_once ('Models/MessagesDataSet.php');
require_once ('Models/UserData.php');

$userData = new UserData();
$messageData = new MessagesDataSet();
date_default_timezone_set('Europe/London');
$date = (date("Y-m-d H:i:s"));
$message = $_GET['message'];
$sentBy = $_SESSION['userID'];
$sentTo = $_SESSION['myFriend'];

$messageData->addMessage($message, $sentBy, $sentTo, $date);
