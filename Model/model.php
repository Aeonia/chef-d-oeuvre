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
function readAllArticles() {
	
	$articles = [];
	$pdo_statement = prepareStatement('SELECT * FROM articles WHERE deleted_at IS NULL');

	if ($pdo_statement && 
		$pdo_statement->execute()) {
		$articles = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
	}
	return $articles;
}

function readAllEvents() {
	
	$events = [];
	$pdo_statement = prepareStatement('SELECT * FROM events WHERE deleted_at IS NULL');

	if ($pdo_statement && 
		$pdo_statement->execute()) {
		$events = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
	}
	return $events;
}


function readAllExistingArticles($user_id) {
	
	$articles = [];
	$pdo_statement = prepareStatement('SELECT * FROM articles WHERE deleted_at IS NULL AND user_id=:user_id');

	if ($pdo_statement && 
		$pdo_statement->bindParam(':user_id', $user_id, PDO::PARAM_INT) &&
		$pdo_statement->execute()) {
		$articles = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
	}
	return $articles;
}


function readSelectedArticle($id) {
	
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


function readSelectedEvent($id) {
	
	$event = null;
	$pdo_statement = prepareStatement('SELECT * FROM events WHERE id=:id');

	if (
  	$pdo_statement &&
  	$pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
  	$pdo_statement->execute()
	) {
  	$event = $pdo_statement->fetch(PDO::FETCH_ASSOC);
	}
  return $event;
}

//Ajout d'une nouvelle ligne dans la liste des tâches et un niveau de priorité 
function addNewArticle($title, $body, $description, $user_id) {
	
	$pdo_statement = prepareStatement(
		'INSERT INTO articles (title, body, description, user_id) VALUES (:title, :body, :description, :user_id)');

	if (
	  $pdo_statement &&
		$pdo_statement->bindParam(':title', $title) &&
		$pdo_statement->bindParam(':body', $body) &&
	  $pdo_statement->bindParam(':description', $description) &&
	  $pdo_statement->bindParam(':user_id', $user_id) &&
	  $pdo_statement->execute()
	 ) {
	 	return true;
	 }  
	 return false;
}

function addNewEvent($title, $body, $description, $user_id) {
	
	$pdo_statement = prepareStatement(
		'INSERT INTO events (title, body, description, user_id) VALUES (:title, :body, :description, :user_id)');

	if (
	  $pdo_statement &&
		$pdo_statement->bindParam(':title', $title) &&
		$pdo_statement->bindParam(':body', $body) &&
	  $pdo_statement->bindParam(':description', $description) &&
	  $pdo_statement->bindParam(':user_id', $user_id) &&
	  $pdo_statement->execute()
	 ) {
	 	return $pdo_statement;
   }  
}

//Suppression d'une ligne de la liste des tâches
function deleteSelectedArticle($id) {
	
	$pdo_statement = prepareStatement('UPDATE articles SET deleted_at = CURRENT_TIMESTAMP() WHERE id=:id');
	
	if (
    !$pdo_statement ||
    !$pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) ||
    !$pdo_statement->execute()
  ) {
    return $pdo_statement;
  }
}

function deleteSelectedEvent($id) {
	
	$pdo_statement = prepareStatement('UPDATE events SET deleted_at = CURRENT_TIMESTAMP() WHERE id=:id');
	
	if (
    !$pdo_statement ||
    !$pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) ||
    !$pdo_statement->execute()
  ) {
    return $pdo_statement;
  }
}


//Modification d'une activité de la liste des tâches ainsi que son niveau de priorité (WIP)   
function editSelectedArticle($id, $title, $body, $description) {
	
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

function editSelectedEvent($id, $title, $body, $description) {
	
	$event = null;
	$pdo_statement = prepareStatement('UPDATE events SET title=:title, body=:body, description=:description WHERE id=:id');

	if (
	  $pdo_statement &&
	  $pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
		$pdo_statement->bindParam(':title', $title) &&
		$pdo_statement->bindParam(':body', $body) &&
	  $pdo_statement->bindParam(':description', $description) &&
	  $pdo_statement->execute()
	) {
	  $event = $pdo_statement->fetch(PDO::FETCH_ASSOC);
	  return $event;
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


function deleteMember($user_id) {

	$pdo_statement = prepareStatement('DELETE FROM user WHERE user_id=:user_id');
	
	if (
    $pdo_statement &&
    $pdo_statement->bindParam(':user_id', $user_id, PDO::PARAM_INT) &&
    $pdo_statement->execute()
  ) {
    return $pdo_statement;
  }
}

function createNewAdminMember($login, $password, $role) {

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

function addEventToAccount ($event_id, $user_id) {

	$pdo_statement = prepareStatement('INSERT INTO event_user (event_id, user_id) VALUES (:event_id, :user_id)');
	if (
	$pdo_statement &&
  $pdo_statement->bindParam(':user_id', $user_id) &&
  $pdo_statement->bindParam(':event_id', $event_id) &&
  $pdo_statement->execute()
 ) {
 	return $pdo_statement;
 }
}

function readEventOfAccount ($user_id) {

	$pdo_statement = prepareStatement('SELECT * FROM event_user sc INNER JOIN events s ON s.id = sc.event_id WHERE sc.user_id=:user_id');
	if (
	$pdo_statement &&
  $pdo_statement->bindParam(':user_id', $user_id) &&
  $pdo_statement->execute()
 ) {
	$events_of_account = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
 	return $events_of_account;
 }
}


