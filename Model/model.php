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
	//renvoi un objet pdostatement, false ou l'exception stoppée par try catch
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

//gets all articles
function readAllArticles() {
	
	$articles = [];
	$pdo_statement = prepareStatement('SELECT * FROM articles WHERE deleted_at IS NULL');

	if ($pdo_statement && 
		$pdo_statement->execute()) {
		$articles = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
	}
	return $articles;
}

//gets all events
function readAllEvents() {
	
	$events = [];
	$pdo_statement = prepareStatement('SELECT * FROM events WHERE deleted_at IS NULL');

	if ($pdo_statement && 
		$pdo_statement->execute()) {
		$events = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
	}
	return $events;
}

//gets all articles for of a certain user
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

//gets the selected article
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

//gets the selected event
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

//adds a new article
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

//adds a new event
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
   }  //if false return NULL by default
}

//deletes a selected article 
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

//deletes a selected event (soft delete)
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


//edits the selected article 
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

//edits the selected event
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

//connects a member
function connectMember($login, $password) {
	
	$pdo_statement = prepareStatement('SELECT * FROM user WHERE login=:login AND password=:password');
	$pdo_statement->execute(array('login' => $login,
    'password' => $password));

	$result = $pdo_statement->fetch();

	return $result;
}

//creates a new member
function createNewMember($login, $password, $email) {

	$pdo_statement = prepareStatement('INSERT INTO user (login, password, email) VALUES (:login, :password, :email)'); //on appel la fonction prepareSatatement qui retourne l'instance de pdo_statement que la prepare a créé

	if ( //EMBRANCHEMENT IF
  $pdo_statement &&
  $pdo_statement->bindParam(':login', $login) && //a faire avant le execute
  $pdo_statement->bindParam(':password', $password) &&
  $pdo_statement->bindParam(':email', $email) &&
  $pdo_statement->execute()
 ) {
 	return $pdo_statement; 
 }
}

//delete the selected member
function deleteMember($user_id) {

	$pdo_statement = prepareStatement('DELETE FROM user WHERE user_id=:user_id');
	
	if (
    $pdo_statement &&
    $pdo_statement->bindParam(':user_id', $user_id, PDO::PARAM_INT)/*return true on success or false on failure*/ &&
    $pdo_statement->execute()
  ) {
    return $pdo_statement;
  }
}
//todo : add roles to define an admin member
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

//adds an event to an account
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

//gets all events of a user
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


