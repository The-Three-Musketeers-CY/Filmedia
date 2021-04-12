<?php
    require './include/header.inc.php';
?>
    <main>
        <h1>Films</h1>
        <section id="movies-tendances">
            <h2>Tendances du moment</h2>
            <div class="horizontal-scroll">
<?php
$trends = getWeekMoviesTrends();
foreach($trends as $trend){
    echo "<a href=\"./details.php?id=" . $trend->id . "&amp;type=movie\">\n";
    echo "\t<article id=\"trend-". $trend->id ."\">\n";
    echo "\t\t<img src=\"https://image.tmdb.org/t/p/w185". $trend->poster_path ."\" alt=\"Affiche de ". $trend->title ."\"/>\n";
    echo "\t\t<h3>". $trend->title ."</h3>\n";
    echo "\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($trend->release_date))) . "</p>\n";
    echo "\t</article>\n";
    echo "</a>\n";
}
?>
            </div>
        </section>        
<?php
    $genres = getMovieGenres();
    foreach($genres as $genre){
        echo "<section id=\"".$genre->name."\" style=\"margin-top:4rem; margin-bottom: 4rem;\">\n";
        echo "\t<h2>".$genre->name."</h2>\n";
        echo "\t<div class=\"horizontal-scroll\">\n";

        $movies = getPopularMovieByGenre($genre->id);

        foreach($movies as $movie){
            echo "<a href=\"./details.php?id=" . $movie->id . "&amp;type=movie\">\n";
            echo "\t<article>\n";
            echo "\t\t<img src=\"https://image.tmdb.org/t/p/w185".$movie->poster_path."\" alt=\"Affiche de ".$movie->title."\"/>\n";
            echo "\t\t<h3>".$movie->title."</h3>\n";
            echo "\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($movie->release_date))) . "</p>\n";
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