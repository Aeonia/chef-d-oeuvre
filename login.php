<?php

session_start ();

require __DIR__.'/Model/model.php';


$user = isset($_SESSION['user_id']);

// Login
if (isset($_SESSION['login'],$_SESSION['pwd'])){
	$connected = $_SESSION['login'];
	echo 'Vous êtes connecté';
}
	else {
if (isset($_POST['connect'])) {

	if (isset($_POST['login'], $_POST['pwd'])) {
		$login_entered = htmlspecialchars($_POST['login']);
		$password_entered = htmlspecialchars($_POST['pwd']);
		$user = connectMember($login_entered, $password_entered);


		if ($user) {

			session_start ();

			$_SESSION['user_id'] = $user['user_id'];
			$_SESSION['login'] = $user['login'];
			$_SESSION['pwd'] = $user['password'];

			header ('location: index.php');

		} else {
			echo '<body onLoad="alert(\'Membre non reconnu...\')">';
			//header ('location: index.php');
		}

	} else {
		echo 'Veuillez entrer un nom d\'utilisateur et un mot de passe.';
	}
}
	}


require __DIR__.'/View/loginview.php';