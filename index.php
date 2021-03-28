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
            <h2>A l'affiche</h2>
            <div class="horizontal-scroll">
            
            </div>
        </section>
        <section id="tendances">
            <h2>Tendances du moment</h2>
            <div class="horizontal-scroll">
            
            </div>
        </section>
    </main>
<?php
    require './include/footer.inc.php';
?>