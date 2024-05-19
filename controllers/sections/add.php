<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sections = $db->query('SELECT * FROM sections')->get();

view('add.view.php', [
    'sections' => $sections
]);