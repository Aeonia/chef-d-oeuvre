<?php
session_start();

require __DIR__.'/Model/model.php';

$user = isset($_SESSION['user_id']);

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$article = readSelectedArticle($id);
}

require __DIR__.'/View/readview.php';
