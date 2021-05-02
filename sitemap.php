<?php
    require './include/header.inc.php';
?>
    <main style="display: flex; flex-direction: column; align-items: center;">
        <h1>Plan du site</h1>
        <ul id="sitemap_list">
            <li><a href="./">Page d'accueil</a></li>
            <li><a href="./search.php">&gt; Page de recherche</a></li>
            <li><a href="./movies.php">&gt; Films</a></li>
            <li><a href="./series.php">&gt; Séries</a></li>
            <li><a href="./statistics.php">Statistiques</a></li>
            <li><a href="./sitemap.php">Plan du site</a></li>
        </ul>
    </main>
<?php
    require './include/footer.inc.php';
?>