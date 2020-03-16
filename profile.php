<?php
session_start();

require_once('Models/Authentication.php');
$view = new stdClass();
$view->pageTitle = 'Profile';

require_once('Views/profile.phtml');