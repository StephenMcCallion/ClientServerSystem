<?php

require_once('Models/PostsDataSet.php');

$view = new stdClass();
$postsDataset = new PostsDataSet();

if (isset($_POST['searchPosts'])) {
    $searchWord = htmlentities($_POST['searchPosts']);

    $postsData = new PostsDataSet();

    $postsData->searchPosts($searchWord);
    $view->pageTitle = $searchWord;
    $view->postsDataset = $postsDataset->fetchAll();
}

$view->pageTitle = $searchWord;
