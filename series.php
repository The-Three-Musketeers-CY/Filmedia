<?php
    $page_title = "Filmedia - Toutes les séries";
    $page_description = "Accédez à toutes les catégories de séries";
    require './include/header.inc.php';
?>
    <main>
        <h1>Séries</h1>
        <section id="tv-tendances">
            <h2>Tendances du moment</h2>
            <div class="horizontal-scroll">
<?php
$trends = getWeekTVTrends();
foreach($trends as $trend){
    echo "<a href=\"./details.php?id=" . $trend->id . "&amp;type=tv\">\n";
    echo "\t<article>\n";
    if(isset($trend->poster_path)){
        echo "\t\t<img src=\"https://image.tmdb.org/t/p/w185". $trend->poster_path ."\" alt=\"Affiche de ". $trend->name ."\"/>\n";
    }else{
        echo "\t\t<img src=\"./img/no-image.svg\" width=\"185\" alt=\"no image\"/>\n";
    }
    echo "\t\t<div class=\"info\">\n";
    echo "\t\t\t<h3>". $trend->name ."</h3>\n";
    echo "\t\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($trend->first_air_date))) . "</p>\n";
    echo "\t\t</div>\n";
    echo "\t</article>\n";
    echo "</a>\n";
}
?>
            </div>
        </section>
<?php
    $genres = getTVGenres();
    foreach($genres as $genre){
        echo "<section id=\"".$genre->name."\" style=\"margin-top:4rem; margin-bottom: 4rem;\">\n";
        echo "\t<h2>".$genre->name."</h2>\n";
        echo "\t<div class=\"horizontal-scroll\">\n";

        $series = getPopularTVByGenre($genre->id);

        foreach($series as $serie){
            echo "<a href=\"./details.php?id=" . $serie->id . "&amp;type=tv\">\n";
            echo "\t<article>\n";
            if(isset($serie->poster_path)){
                echo "\t\t<img src=\"https://image.tmdb.org/t/p/w185". $serie->poster_path ."\" alt=\"Affiche de ". $serie->name ."\"/>\n";
            }else{
                echo "\t\t<img src=\"./img/no-image.svg\" width=\"185\" alt=\"no image\"/>\n";
            }
            echo "\t\t<div class=\"info\">\n";
            echo "\t\t\t<h3>".$serie->name."</h3>\n";
            echo "\t\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($serie->first_air_date))) . "</p>\n";
            echo "\t\t</div>\n";
            echo "\t</article>\n";
            echo "</a>\n";
        }

        echo "\t</div>\n";
        echo "</section>\n";
    }
?>
    </main>
<?php
    require './include/footer.inc.php';
?>