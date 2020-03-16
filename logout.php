<?php
session_start();
// Logout & Destroy Session
unset($_SESSION['name']);
unset($_SESSION['email']);
session_destroy();
header("Location: index.php");