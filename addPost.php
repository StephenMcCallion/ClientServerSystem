<?php
session_start();
require_once ('Models/PostsDataSet.php');
require_once ('addImg.php');

if (isset($_POST['subject'])) {

    $addPost = new PostsDataSet();

    $subject = htmlentities($_POST['subject']);
    $postMessage = htmlentities($_POST['textArea']);
    $user = $_SESSION['userID'];
    $postImage = null;

    //Handles posting an image
        $file = $_FILES['addImg'];
        $filename = $_FILES['addImg']['name'];
        $fileTmpName = $_FILES['addImg']['tmp_name'];
        $fileSize = $_FILES['addImg']['size'];
        $fileError = $_FILES['addImg']['error'];
        $fileType = $_FILES['addImg']['type'];

        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', null);

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 6000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'media/images/postImages/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $postImage = $fileNameNew;

                    header("Location: posts.php");
                } else {
                    echo 'Your file is too big!';
                }
            } else {
                echo 'There was an error uploading your file!';
            }
        } else {
            echo 'You cannot upload files of this type';
        }
        var_dump($postImage);
$addPost->addPost($user, $subject, $postMessage, $postImage);
header("Location: posts.php");

}