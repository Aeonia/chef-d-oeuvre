<?php

require __DIR__.'/Model/model.php';


// Login
if (isset($_POST['connect'])) {

	if (isset($_POST['login'], $_POST['pwd'])) {
		$login_entered = htmlspecialchars($_POST['login']);
		$password_entered = htmlspecialchars($_POST['pwd']);
		$user = connectMember($login_entered, $password_entered);


		if ($user) {

			session_start ();

			$_SESSION['userid'] = $user['userid'];
			$_SESSION['login'] = $user['login'];
			$_SESSION['pwd'] = $user['password'];

			header ('location: index.html');

		} else {
			echo '<body onLoad="alert(\'Membre non reconnu...\')">';
			//header ('location: index.html');
		}

	} else {
		echo 'Veuillez entrer un nom d\'utilisateur et un mot de passe.';
	}
}


require __DIR__.'/View/loginview.php';