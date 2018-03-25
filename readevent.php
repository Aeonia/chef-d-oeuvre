<?php
session_start();

require __DIR__.'/Model/model.php';

if(isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id'];
}  

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$event = readSelectedEvent($id);
}

require __DIR__.'/View/readeventview.php';
