<?php
session_start();

require __DIR__.'/Model/model.php';

$user = isset($_SESSION['user_id']);

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$event = readSelectedEvent($id);
}

require __DIR__.'/View/readeventview.php';
