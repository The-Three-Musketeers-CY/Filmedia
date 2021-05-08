<?php
    $page_title = "Filmedia - Photo du jour";
    $page_description = "Accédez à la photo du jour de la NASA";
    require './include/header.inc.php';
?>
    <main>
        <h1>L'image du jour</h1>
        <section id="apod">  
<?php
    $dataNasa = getImageFromNasa() ;
    $urlNasa = $dataNasa['urlNasa'] ;
    $titleNasa = $dataNasa['title'] ;
    $dateNasa = $dataNasa['date'] ;
?>
            <h2><?php echo $titleNasa . " (" . date_format(date_create($dateNasa), "d-m-Y") . ")"; ?></h2>
            <figure>
                <img width="500" src="<?php echo $urlNasa; ?>" alt="<?php echo $titleNasa; ?>"/>
                <figcaption style="text-align: center;">Source : Astronomy Picture of the Day, NASA</figcaption>
            </figure>
        </section>
    </main>
<?php
    require './include/footer.inc.php';
?>