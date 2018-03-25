<?php

session_start();

require __DIR__.'/Model/model.php';
$user = isset($_SESSION['user_id']);

if (isset($_GET['id'])) {
	$id = $_GET['id'];

  if (deleteSelectedEvent($id)) {
  	header('Location:readevent.php?id=' . $id);
  	exit;
	} else {
		header('Location:browseevents.php');
	}
}

require __DIR__.'/View/deleteeventview.php';