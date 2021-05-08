<?php
    $page_title = "Filmedia - Résultats de recherche";
    $page_description = "Résultats de recherche";
    require './include/header.inc.php';

    if(isset($_GET['q']) && !empty($_GET['q'])) {
        $query = htmlspecialchars($_GET['q']);
    }
?>
    <main>
        <h1>Filmedia - Trouvez ce qui vous plait !</h1>
        <section id="search">
            <h2>Recherche :</h2>
            <form action="./search.php" method="get">
                <input type="text" name="q" id="search-bar-reduce" value="<?php echo $query; ?>" placeholder="Films, séries, ..." />
                <input type="submit" value="Rechercher" />
                <input type="checkbox" name="search_movies" id="search_movies" <?php if((!isset($_GET['search_movies']) && !isset($_GET['search_series']) && !isset($_GET['search_persons'])) || isset($_GET['search_movies']) ){ echo "checked=\"checked\""; }?>/>
                <label for="search_movies">Films</label>
                <input type="checkbox" name="search_series" id="search_series" <?php if((!isset($_GET['search_movies']) && !isset($_GET['search_series']) && !isset($_GET['search_persons'])) || isset($_GET['search_series']) ){ echo "checked=\"checked\""; }?>/>
                <label for="search_series">Séries</label>
                <input type="checkbox" name="search_persons" id="search_persons" <?php if((!isset($_GET['search_movies']) && !isset($_GET['search_series']) && !isset($_GET['search_persons'])) || isset($_GET['search_persons']) ){ echo "checked=\"checked\""; }?>/>
                <label for="search_persons">Acteurs, réalisateurs...</label>
            </form>
        </section>
<?php
    if(isset($query)){

        $medias = searchMedia($query);

        $medias_count = 0;

        echo "<section id=\"results\">\n";
        echo "\t<h2>Résultats de la recherche \"" . $query . "\"</h2>\n";

        foreach ($medias as $media) {

            if (isset($_GET['search_movies']) || isset($_GET['search_series']) || isset($_GET['search_persons'])) {
                if (!isset($_GET['search_movies']) && $media->media_type == "movie" ) {
                    continue;
                }

                if (!isset($_GET['search_series']) && $media->media_type == "tv" ) {
                    continue;
                }

                if (!isset($_GET['search_persons']) && $media->media_type == "person" ) {
                    continue;
                }
            }

            $medias_count++;

            if ($media->media_type != "person") {
                if ($media->media_type == "movie") {
                    $title = htmlspecialchars($media->title);
                    $date = $media->release_date;
                } else {
                    $title = htmlspecialchars($media->name);
                    $date = $media->first_air_date;
                }
                echo "\t<a href=\"./details.php?id=" . $media->id . "&amp;type=" . $media->media_type . "\">\n";
                echo "\t\t<article class=\"result\">\n";
                echo "\t\t\t<div class=\"result-img\">\n";
                if (isset($media->poster_path)) {
                    echo "\t\t\t\t<img src=\"https://image.tmdb.org/t/p/w154" . $media->poster_path . "\" alt=\"Affiche de " . $title . "\"/>\n";
                } else {
                    echo "\t\t\t\t<img src=\"./img/no-image.svg\" width=\"154\" alt=\"no image\"/>\n";
                }
                echo "\t\t\t</div>\n";
                echo "\t\t\t<div class=\"result-info\">\n";
                echo "\t\t\t\t<h3>" . $title . "</h3>\n";
                echo "\t\t\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($date))) . "</p>\n";
                echo "\t\t\t\t<p class=\"result-description\">" . htmlspecialchars($media->overview) . "</p>\n";
                echo "\t\t\t</div>\n";
                echo "\t\t</article>\n";
                echo "\t</a>\n";
            }
            else {
                $known_for = "Connu pour : ";
                $i = 0;
                foreach ($media->known_for as $known) {
                    if ($known->media_type == "movie") {
                        $title = htmlspecialchars($known->title);
                    } else {
                        $title = htmlspecialchars($known->name);
                    }
                    $known_for .= $title;
                    if ($i < count($media->known_for) - 1) {
                        $known_for .= ", ";
                    }
                    $i++;
                }
                echo "\t<a href=\"./details.php?id=" . $media->id . "&amp;type=" . $media->media_type . "\">\n";
                echo "\t\t<article class=\"result\">\n";
                echo "\t\t\t<div class=\"result-img\">\n";
                if (isset($media->profile_path)) {
                    echo "\t\t\t\t<img src=\"https://image.tmdb.org/t/p/w92" . $media->profile_path . "\" alt=\"Photo de " . htmlspecialchars($media->name) . "\"/>\n";
                } else {
                    echo "\t\t\t\t<img src=\"./img/no-image.svg\" width=\"92\" alt=\"no image\"/>\n";
                }
                echo "\t\t\t</div>\n";
                echo "\t\t\t<div class=\"result-info\">\n";
                echo "\t\t\t\t<h3>" . htmlspecialchars($media->name) . "</h3>\n";
                echo "\t\t\t\t<p class=\"result-description\">" . $known_for . "</p>\n";
                echo "\t\t\t</div>\n";
                echo "\t\t</article>\n";
                echo "\t</a>\n";
            }
        }

        if ($medias_count == 0) {
            echo "\t<p>Aucun résultat trouvé</p>\n" ;
        }

        echo "</section>\n";
    }
?>
    </main>
<?php
    require './include/footer.inc.php';
?>