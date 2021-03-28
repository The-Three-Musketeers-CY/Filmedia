<?php
    require './include/header.inc.php';
?>
    <main>
        <h1>Filmedia - Trouvez ce qui vous plait !</h1>
        <section id="welcome-search">
            <h2>Que recherchez vous ?</h2>
            <form action="#" method="get">
                <input type="text" name="q" id="search-bar" placeholder="Films, séries, ..." />
                <input type="submit" value="Rechercher" />
            </form>
            <article id="last-film">
                <h3>Dernière recherche</h3>
                <!-- ... -->
            </article>
        </section>
        <section id="actuals-media">
            <h2>Films à l'affiche</h2>
            <div class="horizontal-scroll">
<?php
$movies = getNowPlayingMovies();
foreach($movies as $movie){
    echo "<article id=\"".$movie->id."\">\n";
    echo "\t<img src=\"https://image.tmdb.org/t/p/w185".$movie->poster_path."\"alt=\"Affiche de ".$movie->title."\"/>\n";
    echo "\t<h3>".$movie->title."</h3>\n";
    echo "\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($movie->release_date))) . "</p>\n";
    echo "</article>\n";
}
?>
            </div>
        </section>
        <section id="tendances">
            <h2>Tendances du moment</h2>
            <div class="horizontal-scroll">
<?php
$movies = getWeekTrends();
foreach($movies as $movie){
    echo "<article id=\"".$movie->id."\">\n";
    echo "\t<img src=\"https://image.tmdb.org/t/p/w185".$movie->poster_path."\"alt=\"Affiche de ". ((isset($movie->title)) ? $movie->title : "") . ((isset($movie->name)) ? $movie->name : "") ."\"/>\n";
    echo "\t<h3>". ((isset($movie->title)) ? $movie->title : "") . ((isset($movie->name)) ? $movie->name : "") ."</h3>\n";
    echo "</article>\n";
}
?>
            </div>
        </section>
    </main>
<?php
    require './include/footer.inc.php';
?>