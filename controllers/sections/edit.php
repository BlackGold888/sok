<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sectionId = $_GET['id'] ?? null;

if ($sectionId === null) {
    header('Location: /sections');
    exit;
}

$section = $db->query("SELECT * FROM sections WHERE id = :id", [
    'id' => $sectionId
])->find();

if ($section === null) {
    header('Location: /sections');
    exit;
}

view('edit.view.php', [
    'section' => $section
]);

