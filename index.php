<?php
    require './include/header.inc.php';
?>
    <main>
        <h1>Filmedia - Trouvez ce qui vous plait !</h1>
        <section id="welcome-search">
            <h2>Que recherchez-vous ?</h2>
            <form action="./search.php" method="get">
                <input type="text" name="q" id="search-bar" placeholder="Films, séries, ..." />
                <input type="submit" value="Rechercher" />
            </form>
            <!--
            <article id="last-film">
                <h3>Dernière recherche</h3>
                ...
            </article>
            -->
        </section>
        <section id="actuals-media">
            <h2>Films à l'affiche</h2>
            <div class="horizontal-scroll">
<?php
$movies = getNowPlayingMovies();
foreach($movies as $movie){
    echo "<a href=\"./details.php?id=" . $movie->id . "&amp;type=movie\">\n";
    echo "\t<article id=\"nowplaying-".$movie->id."\">\n";
    echo "\t\t<img src=\"https://image.tmdb.org/t/p/w185".$movie->poster_path."\" alt=\"Affiche de ".$movie->title."\"/>\n";
    echo "\t\t<h3>".$movie->title."</h3>\n";
    echo "\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($movie->release_date))) . "</p>\n";
    echo "\t</article>\n";
    echo "</a>\n";
}
?>
            </div>
        </section>
        <section id="tendances">
            <h2>Tendances du moment</h2>
            <div class="horizontal-scroll">
<?php
$trends = getWeekTrends();
foreach($trends as $trend){
    if ($trend->media_type == "movie") {
        $title = $trend->title;
        $date = $trend->release_date;
    } else {
        $title = $trend->name;
        $date = $trend->first_air_date;
    }
    echo "<a href=\"./details.php?id=" . $trend->id . "&amp;type=". $trend->media_type ."\">\n";
    echo "<article id=\"trend-". $trend->id ."\">\n";
    echo "\t<img src=\"https://image.tmdb.org/t/p/w185". $trend->poster_path ."\" alt=\"Affiche de ". $title ."\"/>\n";
    echo "\t<h3>". $title ."</h3>\n";
    echo "\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($date))) . "</p>\n";
    echo "</article>\n";
    echo "</a>\n";
}
?>
            </div>
        </section>
    </main>
<?php
    require './include/footer.inc.php';
?>