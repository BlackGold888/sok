<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$sectionName = $_POST['name'] ?? null;
$sectionDescription = $_POST['description'] ?? null;
$parentId = $_POST['parent_id'] ?? null;

//validation
$validator = new Validator([
    'name' => $sectionName,
    'description' => $sectionDescription
]);

$validator->validate('name', 'required|min:3|max:50');
$validator->validate('description', 'required|min:6|max:500');

$errors = $validator->errors();

if (!empty($errors)) {
    $sections = $db->query('SELECT * FROM sections where user_id = :userId', [
        'userId' => $_SESSION['user']['id']
    ])->get();


    view('add.view.php', [
        'errors' => $errors,
        'sections' => $sections,
    ]);

    return;
}

//check if parent id is null
if ($parentId === '') {
    $parentId = null;
}


$db->query('INSERT INTO sections (name, description, parent_id, user_id) VALUES (:name, :description, :parentId, :userId)', [
    'name' => $sectionName,
    'description' => $sectionDescription,
    'parentId' => $parentId,
    'userId' => $_SESSION['user']['id']
]);

header('Location: /');