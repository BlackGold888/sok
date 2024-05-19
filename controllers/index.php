<?php

use Core\App;
use Core\Database;

$header = 'header from file';

$db = App::get(Database::class);



function getSections($parent_id = null, $db) {

    if ($parent_id === null) {
        $sections = $db->query("SELECT * FROM sections WHERE parent_id IS NULL")->get();
    } else {
        $sections = $db->query("SELECT * FROM sections WHERE parent_id = :parent_id", [
            'parent_id' => $parent_id
        ])->get();
    }

    foreach ($sections as &$section) {
        $section['subsections'] = getSections($section['id'], $db);
    }

    return $sections;
}

$sections = getSections(null, $db);

// adjacency list algorithm to get all sections
function displaySections($sections) {
    if (empty($sections)) {
        return;
    }
    echo '<ul>';
    foreach ($sections as $section) {
        echo '<li>';
        echo '<h4>' . $section['name'] . '</h4>';
        echo '<div class="section-actions">';
        echo '<a class="btn" href="/section/edit?id=' . $section['id'] . '">Edit</a>';
        echo '<form action="/section/delete" method="post">';
        echo '<input type="hidden" name="id" value="' . $section['id'] . '">';
        echo '<input type="hidden" name="_method" value="DELETE">';
        echo '<button type="submit">Delete</button>';
        echo '</form>';
        echo '</div>';
        if (!empty($section['subsections'])) {
            displaySections($section['subsections']);
        }
        echo '</li>';
    }
    echo '</ul>';
}


view('index.view.php', [
    'header' => $header,
    'title' => 'Home',
    'name' => isset($_SESSION['user']) ? $_SESSION['user']['username'] : 'Guest',
    'sections' => $sections
]);