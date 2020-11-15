<?php
require_once ('Models/PostsDataSet.php');
require_once ('Models/UserData.php');

session_start();

$view = new stdClass();
$view->pageTitle = 'Posts';

$postsDataset = new PostsDataSet();
$q = $_REQUEST["q"];

$hint = "";

$hint = array(
  "hint" => array()
);

$a = $postsDataset->searchPosts($q);
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach ($a as $posts) {
        $hint["hint"][] = array(
            'postID' => $posts->getPostId(),
            'postImage' => $posts->getPostImage(),
            'postSubject' => $posts->getPostSubject(),
        );
    }
}
echo $hint === "" ? "no suggestion" : json_encode($hint);