<?php
include 'controller.php';
$act = isset($_GET['act']) ? $_GET['act'] : 'index';
$controller = new controller();
$controller->$act();