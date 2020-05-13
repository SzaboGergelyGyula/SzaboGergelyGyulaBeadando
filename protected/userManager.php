<?php 
function isUserLoggedIn(){
	return $_SESSION != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}

function UserLogout(){
	session_unset();
	session_destroy();
	header('Location: index.php');
}

function UserLogin($email, $password) {
	$query = "SELECT id, nick_name, email, permission FROM users WHERE email = :email AND password = :password";
	$params = [
		':email' => $email,
		':password' => sha1($password)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$_SESSION['uid'] = $record['id'];
		$_SESSION['nname'] = $record['nick_name'];
		$_SESSION['email'] = $record['email'];
		$_SESSION['permission'] = $record['permission'];
		header('Location: index.php');
	}
	return false;
}

function UserRegister($email, $password, $nname){
	$query = "SELECT id FROM users email = :email";
	$params = [':email' => $email];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)){
		$query = "INSERT INTO users (nick_name, email, password) VALUES (:nick_name, :email, :password)";
		$params = [
			':nick_name' =>$nname,
			':email' =>$email,
			':password' =>sha1($password)
		];

		if(executeDML($query, $params))
			header('Location: index.php?P=login');
	}
	return false;
}

?>