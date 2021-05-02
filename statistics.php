<?php
    $page_title = "Filmedia - Statistiques" ;
    $page_description = "Toutes les statistiques de visites de Filmedia";
    require './include/header.inc.php';
?>
    <main style="display: flex; flex-direction: column; align-items: center;">
        <h1>Statistiques</h1>
        <figure style="text-align: center;">
            <img src="./img/visits_stats_graph.php" alt="Graphique représentant le nombre de visites par média" />
            <figcaption>Nombre de visites par média</figcaption>
        </figure>
    </main>
<?php
    require './include/footer.inc.php';
?>