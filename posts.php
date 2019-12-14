<?php
require_once ('Models/PostsDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Posts';

// View Posts
$postsDataset = new PostsDataSet();
$view->postsDataset = $postsDataset->fetchAll();

require_once('Views/posts.phtml');
// Add Post


//restrict photos for non registered in users

/*
 * Filter posts
 */

// View top posts

// View newest posts

// View Oldest

// View users posts
