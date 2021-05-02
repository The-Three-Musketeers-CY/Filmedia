<?php
    setlocale(LC_TIME, "fr_FR.UTF8");

    require_once './include/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php 
    if(isset($page_description)){
        echo "<meta name=\"description\" content=\"".$page_description."\" />";
    }else{
        echo "<meta name=\"description\" content=\"Projet dev web\" />";
    }
?>      
    <meta name="author" content="Benjamin Walleth" />
    <meta name="author" content="William Denoyer" />
<?php
    if(isset($page_title)){
        echo "<title>".$page_title."</title>";
    }else{
        echo "<title>Filmedia - Trouvez ce qui vous plait !</title>";
    }
?>
    <link rel="icon" href="./img/favicon.ico" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Roboto&display=swap" rel="stylesheet" />
</head>
<body>
    <header>
        <a href="./"><img id="logo" src="./img/logo.png" alt="Filmedia" /></a>
        <nav id="navbar">
            <ul>
                <li><a href="./search.php">Recherche</a></li>
                <li>|</li>
                <li><a href="./movies.php">Films</a></li>
                <li><a href="./series.php">Séries</a></li>
            </ul>
        </nav>
    </header>