<?php
session_start();

require __DIR__.'/Model/model.php';

if(isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id'];
}  

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$article = readSelectedArticle($id);
}

require __DIR__.'/View/readview.php';
