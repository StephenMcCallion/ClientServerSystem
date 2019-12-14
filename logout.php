<?php
// Logout & Destroy Session
 function logout(){
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
}
