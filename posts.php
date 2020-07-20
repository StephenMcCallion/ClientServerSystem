<?php
require_once ('Models/PostsDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Posts';

session_start();

$postsDataset = new PostsDataSet();
$view->postsDataset = $postsDataset->fetchAll();

require_once('Views/posts.phtml');
