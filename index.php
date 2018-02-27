<?php
session_start();

require __DIR__.'/Model/model.php';

$articles = readAllTasks();

require __DIR__.'/View/indexview.php';