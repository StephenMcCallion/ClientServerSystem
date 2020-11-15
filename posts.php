<?php
require_once ('Models/PostsDataSet.php');
require_once ('Models/UserData.php');

$view = new stdClass();
$view->pageTitle = 'Posts';

session_start();

$postsDataset = new PostsDataSet();

$userDataSet = new userData();
$view->users = $userDataSet;

//Fetches all posts
$view->postsWithUsersDataset = $postsDataset->fetchPostsWithUsers();
$postsDataset->fetchPostsWithUsers();

//Searching for a post
if (isset($_POST['searchPosts'])) {
    $searchWord = htmlentities($_POST['searchPosts']);
    $view->postsDataset = $postsDataset->searchPosts($searchWord);
    $view->pageTitle = $searchWord;
}
require_once('Views/posts.phtml');