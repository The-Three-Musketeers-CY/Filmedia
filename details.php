<?php

require './include/header.inc.php';

if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['type']) && !empty($_GET['type'])) {
    $id = htmlspecialchars($_GET['id']);
    $type = htmlspecialchars($_GET['type']);
} else{
    header('Location: ./');
    exit();
}

switch ($type) {
    case 'movie':
        $media = getMovieDetails($id);
        break;
    case 'tv':
        $media = getTVDetails($id);
        break;
    case 'person':
        $media = getPersonDetails($id);
        break;
    default:
        header('Location: ./');
        exit();
}

if ($type != "person") {
    include './include/details_movie_tv.inc.php';
} else {
    include './include/details_person.inc.php';
}

require './include/footer.inc.php';