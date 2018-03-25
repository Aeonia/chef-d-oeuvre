<?php

session_start();

require __DIR__.'/Model/model.php';
$user = isset($_SESSION['user_id']);

if (isset($_GET['id'])) {
	$id = $_GET['id'];

  if (deleteSelectedArticle($id)) {
  	header('Location:read.php?id=' . $id);
  	exit;
	} else {
		header('Location:browse.php');
	}
}

require __DIR__.'/View/deleteview.php';