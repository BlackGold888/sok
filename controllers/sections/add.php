<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sections = $db->query('SELECT * FROM sections where user_id = :userId', [
    'userId' => $_SESSION['user']['id']
])->get();

view('add.view.php', [
    'sections' => $sections
]);