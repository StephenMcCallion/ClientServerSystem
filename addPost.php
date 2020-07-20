<?php
session_start();
require_once ('Models/PostsDataSet.php');

if (isset($_POST['subject'])) {

    $addPost = new PostsDataSet();

    $subject = htmlentities($_POST['subject']);
    $postMessage = htmlentities($_POST['textArea']);
    $user = $_SESSION['userID'];

    $addPost->addPost($user, $subject, $postMessage);
    header("Location: posts.php");

}