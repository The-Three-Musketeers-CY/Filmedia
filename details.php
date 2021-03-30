<?php

require_once './include/functions.inc.php';

$movie = getMovieDetails($_GET['id']);

if($movie != false)
    print_r($movie);
else echo "Erreur :(";