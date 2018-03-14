<?php
session_start();

require __DIR__.'/Model/model.php';

if (isset($_SESSION['user_id'])) {
$user = $_SESSION['user_id'];
}
$events = readAllEvents();


require __DIR__.'/View/browseeventsview.php';