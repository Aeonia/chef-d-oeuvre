<?php
session_start();

require __DIR__.'/Model/model.php';

$user = $_SESSION['user_id'];

$events = readAllEvents();


require __DIR__.'/View/browseeventsview.php';