<?php

session_start ();


require __DIR__.'/Model/model.php';
$user = isset($_SESSION['user_id']);
	$articles = readAllArticles();

require __DIR__.'/View/browseview.php';
