<?php
session_start();

require_once('Models/Authentication.php');
require_once('Models/UserData.php');
require_once('Models/PostsDataSet.php');
require_once('Models/FriendsDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Profile';

$userData = new UserData();
$postData = new PostsDataSet();
$friendsData = new FriendsDataSet();

$user2 = htmlentities($_GET['thisUser']);
$_SESSION['thisUser'] = $user2;

$view->userData = $userData->fetchUser($_SESSION['thisUser']);
$view->postData = $postData->getPostsByUserID($_SESSION['thisUser']);


/*
 * add a friend. Use the session IDs to add as friend.
 */
if (isset($_POST['addFriend'])) {
    $user1 = htmlentities($_SESSION['userID']);
    $friendshipDate = htmlentities(date("Y-m-d H:i:s"));
    $friendsData->addFriend($user1, $user2, $friendshipDate);
    $friendsData->addFriend($user2, $user1, $friendshipDate);
}

require_once('Views/userProfile.phtml');