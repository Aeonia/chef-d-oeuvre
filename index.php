<?php
session_start();

require __DIR__.'/Model/model.php';

$articles = readAllArticles();
$user = $_SESSION['user_id'];

require __DIR__.'/View/indexview.php';