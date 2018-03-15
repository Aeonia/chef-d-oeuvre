<?php

session_start ();


require __DIR__.'/Model/model.php';

	$articles = readAllArticles();

require __DIR__.'/View/browseview.php';
