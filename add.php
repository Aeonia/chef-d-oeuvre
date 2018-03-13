<?php
session_start();

require __DIR__.'/Model/model.php';
if (isset($_POST['title'],$_POST['description'])){

$articles = addNewArticle($_POST['title'], $_POST['body'], $_POST['description'], $_SESSION['user_id']);

var_dump($articles);
if ($articles){
	header('Location:browse.php');
	exit;
}
}

require __DIR__.'/View/addview.php';