 <?php
 //Initialisation du PDO et récupération de la config
function initializePdo() {
	
	try {
	  require __DIR__ . '/config.php';

	  $pdo = new PDO(
	    "mysql:dbname=$dbname;host=$host;charset=utf8", $user, $password
	  );
	} catch (PDOException $e) {
	  echo 'erreur : ' . $e->getMessage();
	  $pdo = null;
	}
	return $pdo;
}

//Préparation de la requête SQL
function prepareStatement($sql) {
	
	$pdo_statement = null;
	$pdo = initializePdo();

	if ($pdo) {
		try {
		  $pdo_statement = $pdo->prepare($sql);
		} catch (PDOException $e) {
		  echo 'erreur : ' . $e->getMessage();
		}
	}
	return $pdo_statement;
}

//Récupération de la liste des tâches
function readAllTasks() {
	
	$articles = [];
	$pdo_statement = prepareStatement('SELECT * FROM articles WHERE deleted_at IS NULL');

	if ($pdo_statement && 
		$pdo_statement->execute()) {
		$articles = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
	}
	return $articles;
}

//Récupération de la liste des tâches
function readAllExistingTasks($userid) {
	
	$articles = [];
	$pdo_statement = prepareStatement('SELECT * FROM articles WHERE deleted_at IS NULL AND userid=:userid');

	if ($pdo_statement && 
		$pdo_statement->bindParam(':userid', $userid, PDO::PARAM_INT) &&
		$pdo_statement->execute()) {
		$articles = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
	}
	return $articles;
}

//Récupération d'une ligne de la liste des tâches
function readSelectedTask($id) {
	
	$article = null;
	$pdo_statement = prepareStatement('SELECT * FROM articles WHERE id=:id');

	if (
  	$pdo_statement &&
  	$pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
  	$pdo_statement->execute()
	) {
  	$article = $pdo_statement->fetch(PDO::FETCH_ASSOC);
	}
  return $article;
}

//Ajout d'une nouvelle ligne dans la liste des tâches et un niveau de priorité 
function addNewTask($title, $body, $description, $userid) {
	
	$pdo_statement = prepareStatement(
		'INSERT INTO articles (title, body, description, userid) VALUES (:title, :body, :description, :userid)');

	if (
	  $pdo_statement &&
		$pdo_statement->bindParam(':title', $title) &&
		$pdo_statement->bindParam(':body', $body) &&
	  $pdo_statement->bindParam(':description', $description) &&
	  $pdo_statement->bindParam(':userid', $userid) &&
	  $pdo_statement->execute()
	 ) {
	 	return $pdo_statement;
   }  
}

//Suppression d'une ligne de la liste des tâches
function deleteSelectedTask($id) {
	
	$pdo_statement = prepareStatement('UPDATE articles SET deleted_at = CURRENT_TIMESTAMP() WHERE id=:id');
	
	if (
    !$pdo_statement ||
    !$pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) ||
    !$pdo_statement->execute()
  ) {
    return $pdo_statement;
  }
}


//Modification d'une activité de la liste des tâches ainsi que son niveau de priorité (WIP)   
function editSelectedTask($id, $title, $body, $description) {
	
	$article = null;
	$pdo_statement = prepareStatement('UPDATE articles SET title=:title, body=:body, description=:description WHERE id=:id');

	if (
	  $pdo_statement &&
	  $pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
		$pdo_statement->bindParam(':title', $title) &&
		$pdo_statement->bindParam(':body', $body) &&
	  $pdo_statement->bindParam(':description', $description) &&
	  $pdo_statement->execute()
	) {
	  $article = $pdo_statement->fetch(PDO::FETCH_ASSOC);
	  return $article;
	}
}


function connectMember($login, $password) {
	
	$pdo_statement = prepareStatement('SELECT * FROM user WHERE login=:login AND password=:password');
	$pdo_statement->execute(array('login' => $login,
    'password' => $password));

	$result = $pdo_statement->fetch();

	return $result;
}


function createNewMember($login, $password, $email) {

	$pdo_statement = prepareStatement('INSERT INTO user (login, password, email) VALUES (:login, :password, :email)');

	if (
  $pdo_statement &&
  $pdo_statement->bindParam(':login', $login) &&
  $pdo_statement->bindParam(':password', $password) &&
  $pdo_statement->bindParam(':email', $email) &&
  $pdo_statement->execute()
 ) {
 	return $pdo_statement;
 }
}


function deleteMember($userid) {

	$pdo_statement = prepareStatement('DELETE FROM user WHERE userid=:userid');
	
	if (
    $pdo_statement &&
    $pdo_statement->bindParam(':userid', $userid, PDO::PARAM_INT) &&
    $pdo_statement->execute()
  ) {
    return $pdo_statement;
  }
}
