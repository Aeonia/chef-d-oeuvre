<?php
session_start();

require __DIR__.'/Model/model.php';
$user = isset($_SESSION['user_id']);

if (isset($_POST['title'], $_POST['body'], $_POST['description'], $_SESSION['user_id'])){

	$articles = addNewArticle($_POST['title'], $_POST['body'], $_POST['description'], $_SESSION['user_id']);

	if ($articles){
		header('Location:browse.php');
		exit;
	}
}

require __DIR__.'/View/addview.php';