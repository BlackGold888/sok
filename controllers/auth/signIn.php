<?php

use Core\App;
use Core\Database;
use Core\Validator;

$username = $_POST['username'];
$password = $_POST['password'];

// validate the form data
$validator = new Validator([
    'username' => $username,
    'password' => $password
]);

$validator->validate('username', 'required|min:3|max:15');
$validator->validate('password', 'required|min:6|max:20');


$errors = $validator->errors();


if (!empty($errors)) {
    view('login.view.php', ['errors' => $errors]);
    exit();
}


$db = App::resolve(Database::class);

//check if the user exists in the database
$user = $db->query('SELECT * FROM users WHERE username = :username', ['username' => $username])->find();
//if yes then log the user in
if ($user) {
    //check if the password is correct
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: /');
    }else {
        $errors['password'][] = 'The password is incorrect';
        view('login.view.php', ['errors' => $errors]);
    }

}else {

    //if no then save the user to the database and log the user in
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db->query('INSERT INTO users (username, password) VALUES (:username, :password)', ['username' => $username, 'password' => $password]);
    $user = $db->query('SELECT * FROM users WHERE username = :username', ['username' => $username])->find();
    $_SESSION['user'] = $user;
    header('Location: /');
}

