<?php
session_start();

require __DIR__.'/Model/model.php';
if (isset($_POST['title'],$_POST['description'])){

$articles = addNewTask($_POST['title'], $_POST['description'], $_SESSION['userid']);

if ($articles) {
	header('Location:browse.php');
	exit;
}
}

require __DIR__.'/View/addview.php';