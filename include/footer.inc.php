    <footer>
        <p><a href="./statistics.php">Statistiques </a> | <a href="./apod.php"> L'image du jour </a> |<a href="./sitemap.php"> Plan du site </a></p>
        <p>&#xA9;2021 - Filmedia</p>
        <p>Par Benjamin WALLETH &amp; William DENOYER</p>
<?php 
    //Get position of the visitor
    $data = getPosition(getIp());
    if(isset($data['erreur'])){
        echo "<p>".$data['erreur']."</p>\n";
    }else{
        $city = $data['city'];
        $dept = $data['dept'];
        $country = $data['country'];
        echo "<p>".$city.", ".$dept." - ".$country."</p>\n";
    }
?>
        <p>Données fournies par :</p>
        <img id="tmdb-logo" src="./img/tmdb.svg" alt="The Movie DB" />
    </footer>
</body>
</html>