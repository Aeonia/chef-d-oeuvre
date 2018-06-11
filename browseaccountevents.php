<?php
session_start();

require __DIR__.'/Model/model.php';

$user = $_SESSION['user_id'] ?? NULL;

if (isset($_POST['id'], $_SESSION['user_id'])){
    $new_event_in_account = addEventToAccount ($_POST['id'], $_SESSION['user_id']);
    if ($new_event_in_account) {
       echo "Evénement ajouté"; 
    };
    }

if (isset($_SESSION['user_id'])) {
    $events_of_account = readEventOfAccount ($_SESSION['user_id']);
    } 


require __DIR__.'/View/browseaccounteventsview.php';