<?php

session_start();

require __DIR__.'/Model/model.php';
$user = isset($_SESSION['user_id']);

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];

  if (deleteMember($user_id)) {
  	header('Location: logout.php');
  	exit;
	}
}