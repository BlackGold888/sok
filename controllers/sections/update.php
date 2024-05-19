<?php


use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$sectionId = $_POST['id'] ?? null;
$sectionName = $_POST['name'] ?? null;
$sectionDescription = $_POST['description'] ?? null;

//validation
$validator = new Validator([
    'name' => $sectionName,
    'description' => $sectionDescription
]);

$validator->validate('name', 'required|min:3|max:50');
$validator->validate('description', 'required|min:6|max:500');

$errors = $validator->errors();

if (!empty($errors)) {
    view('sections/edit', [
        'section' => [
            'id' => $sectionId,
            'name' => $sectionName,
            'description' => $sectionDescription
        ],
        'errors' => $errors
    ]);
    return;
}

$db->query('UPDATE sections SET name = :name, description = :description WHERE id = :id', [
    'name' => $sectionName,
    'description' => $sectionDescription,
    'id' => $sectionId
]);

header('Location: /');



