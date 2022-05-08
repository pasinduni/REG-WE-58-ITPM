<?php

function find_user_by_username(string $username)
{
    $sql = 'SELECT username, password, designation, role, name, email, phone, id
            FROM users
            WHERE username=:username';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
   
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function login(string $username, string $password): bool
{
    $user = find_user_by_username($username);

    // if user found, check the password
    if ($user && password_verify($password, $user['password'])) {

        // prevent session fixation attack
        session_regenerate_id();

        // set username in the session
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['role']  = $user['role'];
        $_SESSION['designation']  = $user['designation'];
        $_SESSION['name']  = $user['name'];
        $_SESSION['email']  = $user['email'];
        $_SESSION['phone']  = $user['phone'];
        



        return true;
    }

    return false;
}


function is_user_logged_in(): bool
{
    return isset($_SESSION['username']);
}

function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('login.php');
    }
}

function logout(): void
{
    if (is_user_logged_in()) {
        unset($_SESSION['username'], $_SESSION['user_id']);
        session_destroy();
        redirect_to('login.php');
    }
}

function current_user()
{
    if (is_user_logged_in()) {
        return $_SESSION['name'];
    }
    return null;
}

function current_user_id()
{
    if (is_user_logged_in()) {
        return $_SESSION['user_id'];
    }
    return null;
}

function current_user_designation()
{
    if (is_user_logged_in()) {
        return $_SESSION['designation'];
    }
    return null;
}

function database_run($query,$vars = array())
{
	$string = "mysql:host=localhost;dbname=itpm";
	$con = new PDO($string,'root','');

	if(!$con){
		return false;
	}

	$stm = $con->prepare($query);
	$check = $stm->execute($vars);

	if($check){
		
		$data = $stm->fetchAll(PDO::FETCH_OBJ);
		
		if(count($data) > 0){
			return $data;
		}
	}

	return false;
}