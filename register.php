<?php

session_start ();

require __DIR__.'/Model/model.php';


if(isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id'];
}  
// Register 
if (isset($_POST['register'])) {

	if (isset($_POST['login'], $_POST['pwd'], $_POST['email'], $_POST['confirm_pwd'])) {
		$login_register = htmlspecialchars($_POST['login']);
		$password_register = htmlspecialchars($_POST['pwd']);
		$email_register = htmlspecialchars($_POST['email']);
		$password_confirmation = htmlspecialchars($_POST['confirm_pwd']);
		
		if ($password_register === $password_confirmation) {
			$newUser = createNewMember($login_register, $password_register, $email_register);

			if ($newUser) {
				header('location: index.php');
			}
		} else {
			header('location: index.php');
		}
	} else {
		echo "Veuillez entrer un login/password/email valide";
	}
}

require __DIR__.'/View/registerview.php';