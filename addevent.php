<?php

session_start();

require __DIR__.'/Model/model.php';

if (isset($_POST['title'],$_POST['description'])){

$events = addNewEvent($_POST['title'],$_POST['body'], $_POST['description'], $_SESSION['user_id']);

if ($events) {
	header('Location:browseevents.php');
	exit;
}
}

require __DIR__.'/View/addeventview.php';