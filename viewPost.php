<?php
session_start();

require_once ('Models/PostsDataSet.php');
require_once ('Models/UserData.php');

$view = new stdClass();
$view->pageTitle = 'Post';

$post = $_GET['post'];

$postData = new PostsDataSet();
$post = $postData->fetchPostByID($post);


$view->posts = $post;

$userData = new UserData();


require_once('Views/viewPost.phtml');
