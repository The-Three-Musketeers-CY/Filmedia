<?php
    require './include/header.inc.php';

    if(isset($_GET['q']) && !empty($_GET['q'])) {
        $query = htmlspecialchars($_GET['q']);
    } else{
        header('Location: ./');
        exit();
    }
?>
    <main>
        <h1>Filmedia - Trouvez ce qui vous plait !</h1>
        <section id="search">
            <h2>Recherche :</h2>
            <form action="./search.php" method="get">
                <input type="text" name="q" id="search-bar-reduce" value="<?php echo $query; ?>" placeholder="Films, séries, ..." />
                <input type="submit" value="Rechercher" />
            </form>
        </section>
        <section id="results">
            <h2>Résultats de la recherche "<?php echo $query; ?>"</h2>
<?php
$medias = searchMedia($query);

if(count($medias) == 0){
    echo "\t<p>Aucun résultat trouvé</p>\n" ;
}

foreach($medias as $media){
    if ($media->media_type != "person") {
        if ($media->media_type == "movie") {
            $title = $media->title;
            $date = $media->release_date;
        } else {
            $title = $media->name;
            $date = $media->first_air_date;
        }
        echo "<a href=\"./details.php?id=" . $media->id . "&amp;type=". $media->media_type ."\">\n";
        echo "<article class=\"result\" id=\"". $media->id ."\">\n";
        echo "\t<aside class=\"result-img\">\n";
        if(isset($media->poster_path)){
            echo "\t\t<img src=\"https://image.tmdb.org/t/p/w154". $media->poster_path ."\" alt=\"Affiche de ". $title ."\"/>\n";
        }else{
            echo "\t\t<img src=\"./img/no-image.svg\" width=\"154\" alt=\"no image\"/>\n";
        }
        echo "\t</aside>\n";
        echo "\t<div class=\"result-info\">\n";
        echo "\t\t<h3>". $title ."</h3>\n";
        echo "\t\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($date))) . "</p>\n";
        echo "\t\t\t<p class=\"result-description\">" . $media->overview . "</p>\n";
        echo "\t</div>\n";
        echo "</article>\n";
        echo "</a>\n";
    }
    else {
        $known_for = "Connu pour : ";
        $i = 0;
        foreach ($media->known_for as $known) {
            if ($known->media_type == "movie") {
                $title = $known->title;
            } else {
                $title = $known->name;
            }
            $known_for .= $title;
            if ($i < count($media->known_for) - 1) {
                $known_for .= ", ";
            }
            $i++;
        }
        echo "<a href=\"./details.php?id=" . $media->id . "&amp;type=". $media->media_type ."\">\n";
        echo "<article class=\"result\" id=\"". $media->id ."\">\n";
        echo "\t<aside class=\"result-img\">\n";
        if(isset($media->profile_path)){
            echo "\t\t<img src=\"https://image.tmdb.org/t/p/w92". $media->profile_path ."\" alt=\"Photo de ". $media->name ."\"/>\n";
        }else{
            echo "\t\t<img src=\"./img/no-image.svg\" width=\"154\" alt=\"no image\"/>\n";
        }
        echo "\t</aside>\n";
        echo "\t<div class=\"result-info\">\n";
        echo "\t\t<h3>". $media->name ."</h3>\n";
        echo "\t\t\t<p class=\"result-description\">" . $known_for . "</p>\n";
        echo "\t</div>\n";
        echo "</article>\n";
        echo "</a>\n";
    }
}
?>
        </section>
    </main>
<?php
    require './include/footer.inc.php';
?>