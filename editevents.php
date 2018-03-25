<?php 

session_start();

require __DIR__.'/Model/model.php';
$user = isset($_SESSION['user_id']);

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$event = readSelectedEvent($id);

	if (isset($_POST['title'], $_POST['description'])) {

		$title = $_POST['title'];
		$body = $_POST['body'];
		$description = $_POST['description'];

		if (editSelectedEvent($id, $title, $body, $description, $user_id)) {

			header('Location:read.php?id=' . $id);

		} else {
			
		  header('Location:browseevents.php');
		}
	}
}

require __DIR__.'/View/editeventsview.php';


