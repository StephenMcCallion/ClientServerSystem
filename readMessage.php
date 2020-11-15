<?php
session_start();

require_once ('Models/MessagesDataSet.php');
require_once ('Models/UserData.php');

$view = new stdClass();

$messageDataSet = new MessagesDataSet();
$userDataSet = new UserData();
$loggedIn = $_SESSION['userID'];

$friend = '';

$fetchMessages = $messageDataSet->fetchMessagesByUserID($_SESSION['userID'], $friend);

$token = '';

$messages = array(
    "MyMessages" => array(),
);
$json = '';
foreach ($fetchMessages as $message) {
        $messages['MyMessages'][] = array(
            'sentBy' => $message->getSentBy(),
            'sentTo' => $message->getSentTo(),
            'myMessage' => $message->getMessage(),
            'myMessageDate' => $message->getMessageDate(),
        );
}
if (isset($_SESSION["ajaxToken"])) {
    $token = $_SESSION["ajaxToken"];
}

if (!isset($_GET["token"]) || $_GET["token"] != $token) {
    $data = new stdClass();
    $data->error = "You are not permitted to view this content";
    echo json_encode($data);
}
else {
    echo json_encode($messages);
}

