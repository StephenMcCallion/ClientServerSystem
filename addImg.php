<?php

session_start();
require_once ('Models/PostsDataSet.php');

if (isset($_POST['submit'])) {
    $file = $_FILES['addImg'];

    $filename = $_FILES['addImg']['name'];
    $fileTmpName = $_FILES['addImg']['tmp_name'];
    $fileSize = $_FILES['addImg']['size'];
    $fileError = $_FILES['addImg']['error'];
    $fileType = $_FILES['addImg']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 6000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'media/images/postImages/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                return $fileNameNew;

                header("Location: posts.php?uploadsuccess");
            } else {
                echo 'Your file is too big!';
            }
        } else {
            echo 'There was an error uploading your file!';
        }
    } else {
        echo 'You cannot upload files of this type';
    }
}
