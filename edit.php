<?php 

session_start();

require __DIR__.'/Model/model.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$article = readSelectedTask($id);

	if (isset($_POST['title'], $_POST['description'])) {

		$title = $_POST['title'];
		$description = $_POST['description'];

		if (editSelectedTask($id, $title, $description, $user_id)) {

			header('Location:read.php?id=' . $id);

		} else {
			
		  header('Location:browse.php');
		}
	}
}

require __DIR__.'/View/editview.php';


/*<?php 

session_start();

require __DIR__.'/Model/model.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	if (isset($_POST['title'], $_POST['description'])) {
		$title = $_POST['title'];
		$description = $_POST['description'];

		if (editSelectedTask($id, $title, $description, $user_id)) {
			header('Location:read.php?id=' . $id);
		} else {
		  header('Location:browse.php');
		}
	}

} else {
	$article = readSelectedTask($id);
}

require __DIR__.'/View/editview.php';*\