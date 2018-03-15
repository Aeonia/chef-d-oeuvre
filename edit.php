<?php 

session_start();

require __DIR__.'/Model/model.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$article = readSelectedArticle($id);

	if (isset($_POST['title'], $_POST['description'])) {

		$title = $_POST['title'];
		$body = $_POST['body'];
		$description = $_POST['description'];

		if (editSelectedArticle($id, $title, $body, $description, $user_id)) {

			header('Location:read.php?id=' . $id);

		} else {
			
		  header('Location:browse.php');
		}
	}
}

require __DIR__.'/View/editview.php';


