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

if ($type == "movie") {
    $title = $media->title;
    $date = $media->release_date;
} else {
    $title = $media->name;
    $date = $media->first_air_date;
}

$genres = "" ;
$i = 0 ;
foreach($media->genres as $genre){
    if($i != 0) $genres .= ", ";
    $genres .= $genre->name;
    $i++;
}

if(isset($media->poster_path)){
    $src = "https://image.tmdb.org/t/p/w300". $media->poster_path;
}else{
    $src = "./img/no-image.svg" ;
}
?>
    <main>
        <h1>Vue d'ensemble</h1>
        <div id="back-stats">
            <a href="./">Retour à l'accueil</a>
            <p>301 vues</p>
        </div>
        <section>
            <img src="<?php echo $src; ?>" width="300" alt="Affiche de <?php echo $title; ?>"/>
            <h2><?php echo $title; ?></h2>
            <p><?php echo $date; ?></p>
            <p>Genres : <?php echo $genres; ?>
            <p><?php echo $media->overview; ?></p>
            <article>
                <h3>Disponible sur :</h3>
<?php
if(isset($media->{"watch/providers"}->results->FR)){
    $providers = $media->{"watch/providers"}->results->FR ;
    if(isset($providers->buy)){
        echo "<p>A l'achat</p>\n";
        foreach($providers->buy as $provider){
            echo "<img src=\"https://image.tmdb.org/t/p/w45". $provider->logo_path ."\" alt=\"logo de ". $provider->provider_name ."\"/>\n";
        }
    }
    if(isset($providers->rent)){
        echo "<p>A la location</p>\n";
        foreach($providers->rent as $provider){
            echo "<img src=\"https://image.tmdb.org/t/p/w45". $provider->logo_path ."\" alt=\"logo de ". $provider->provider_name ."\"/>\n";
        }
    }
    if(isset($providers->flatrate)){
        echo "<p>En streaming</p>\n";
        foreach($providers->flatrate as $provider){
            echo "<img src=\"https://image.tmdb.org/t/p/w45". $provider->logo_path ."\" alt=\"logo de ". $provider->provider_name ."\"/>\n";
        }
    }
}
?>
            </article>
        </section>
    </main>
<?php
    require './include/footer.inc.php';
?>