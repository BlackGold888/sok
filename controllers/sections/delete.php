<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sectionId = $_POST['id'] ?? null;

//delete cascade
$db->query('DELETE FROM sections WHERE id = :id and user_id = :user_id', [
    'id' => $sectionId,
    'user_id' => $_SESSION['user']['id']
]);

header('Location: /');
