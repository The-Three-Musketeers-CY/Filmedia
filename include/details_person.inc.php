<?php

if (isset($media->birthday) && !empty($media->birthday)) {
    $displayDate = strftime("%d %b %Y", date_timestamp_get(date_create($media->birthday)));
}

if(isset($media->profile_path)){
    $src = "https://image.tmdb.org/t/p/w300". $media->profile_path;
}else{
    $src = "./img/no-image.svg" ;
}

?>
<main>
        <div id="back-stats">
            <a href="./"><img src="./img/back-arrow.svg" alt="Retour arrière" width="20" />Retour à l'accueil</a>
            <p><?php echo $count; ?> vues</p>
        </div>
        <h1>Vue d'ensemble</h1>
        <section id="details">
            <img src="<?php echo $src; ?>" width="300" alt="Affiche de <?php echo $media->name; ?>"/>
            <div id="details-info">
                <div id="details-info-title">
                    <h2><?php echo $media->name; ?></h2>
<?php
    if (isset($displayDate)) {
        echo "<p>Date de naissance : ".$displayDate."</p>";
    }
?>               
                </div>
                <div id="details-info-description">
                    <p><?php echo $media->biography; ?></p>
<?php
    if(isset($media->external_ids->facebook_id)||isset($media->external_ids->instagram_id)||isset($media->external_ids->twitter_id)){
        echo "<article id=\"details-social\">\n" ;
        echo "\t<h3>Réseaux sociaux :</h3>\n";
        if(isset($media->external_ids->facebook_id)){
            echo "\t<a href=\"https://facebook.com/".$media->external_ids->facebook_id."\"><img width=\"24\" src=\"./img/facebook.svg\" alt=\"logo facebook\"/></a>\n";
        }
        if(isset($media->external_ids->instagram_id)){
            echo "\t<a href=\"https://instagram.com/".$media->external_ids->instagram_id."\"><img width=\"24\" src=\"./img/instagram.svg\" alt=\"logo instagram\"/></a>\n";
        }
        if(isset($media->external_ids->twitter_id)){
            echo "\t<a href=\"https://twitter.com/".$media->external_ids->twitter_id."\"><img width=\"24\" src=\"./img/twitter.svg\" alt=\"logo twitter\"/></a>\n";
        }
        echo "</article>\n";
    }
?>    
                </div>
            </div>
        </section>

<?php
$credits = $media->combined_credits->cast;

if (count($credits) > 0) {
    echo "<section id=\"credits\">\n";
    echo "\t<h2>Connu pour </h2>\n";
    echo "\t<div class=\"horizontal-scroll\"\n>";
}

foreach($credits as $credit){
    if ($credit->media_type == "movie") {
        $title = $credit->title;
        $date = $credit->release_date;
    } else {
        $title = $credit->name;
        $date = $credit->first_air_date;
    }
    echo "\t\t<a href=\"./details.php?id=" . $credit->id . "&amp;type=". $credit->media_type ."\">\n";
    echo "\t\t\t<article>\n";
    if(isset($credit->poster_path)){
        echo "\t\t\t\t<img src=\"https://image.tmdb.org/t/p/w185". $credit->poster_path ."\" alt=\"Affiche de ". $title ."\"/>\n";
    }else{
        echo "\t\t\t\t<img src=\"./img/no-image.svg\" alt=\"Affiche de ". $title ."\"/>\n";
    }
    echo "\t\t\t\t<div class=\"info\">\n";
    echo "\t\t\t\t\t<h3>". $title ."</h3>\n";
    echo "\t\t\t\t\t<p>" . strftime("%d %b %Y", date_timestamp_get(date_create($date))) . "</p>\n";
    echo "\t\t\t\t</div>\n";
    echo "\t\t\t</article>\n";
    echo "\t\t</a>\n";
}

if (count($credits) > 0) {
    echo "\t</div>\n";
    echo "</section>\n";
}
?>
</main>