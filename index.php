<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Homepage';
require_once('Views/index.phtml');
