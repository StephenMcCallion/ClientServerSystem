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

$user = htmlentities($_SESSION['userID']);

$view->userData = $userData->fetchUser($user);
$view->postData = $postData->getPostsByUserID($user);

$friendData = $friendsData->fetchMyFriends($user);

foreach ($friendData as $friend) {
    $view->myFriends = $userData->fetchUser($friend->getUser2());
}

require_once('Views/profile.phtml');