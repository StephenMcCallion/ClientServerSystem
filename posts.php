<?php
require_once ('Models/PostsDataSet.php');
require_once ('Models/Pagination.php');


$view = new stdClass();
$view->pageTitle = 'Posts';

session_start();

$postsDataset = new PostsDataSet();
$view->postsDataset = $postsDataset->fetchAll();

if (isset($_POST['SubmitSearchPosts'])) {
    $search = $_POST['searchPosts'];
    $view->postsDataset = $postsDataset->searchPosts($search);
}
else{
    $view->postsDataset = $postsDataset->fetchAll();
}

if (isset($_POST['SubmitAddPost'])){
    //Array of error messages
    $error =[
        'firstNameError' => '',
        'lastNameError' => '',
    ];
    //Form Data

    $postSubject = sanitise($_POST['subject']);
    $postText = sanitise($_POST['textArea']);
    $postsDataset->addPost();
}
require_once('Views/posts.phtml');
