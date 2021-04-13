<?php
    require_once '../include/utils.inc.php';

    $visits = getVisits();

    require_once '../jpgraph/jpgraph.php';
    require_once '../jpgraph/jpgraph_bar.php';

    $data = array_map(function (array $a) {
        return $a[3];
    }, $visits);

    // Create the graph. These two calls are always required
    $graph = new Graph(1000,500,'auto');
    $graph->SetScale("textint");

    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);

    $graph->Set90AndMargin(200,40,40,40);
    $graph->img->SetAngle(90); 

    // $graph->yaxis->SetTickPositions(array(0,10,20,30,40,50, 100), array(5,15,25,35,45));
    $graph->SetBox(false);

    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array_map(function (array $a) {
        return $a[1];
    }, $visits));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false,false);

    // Create the bar plots
    $bplot = new BarPlot($data);

    // Create the grouped bar plot
    // $gbplot = new GroupBarPlot(array($b1plot));
    // ...and add it to the graPH
    $graph->Add($bplot);

    $bplot->SetColor("white");
    $bplot->SetFillColor("#cc1111");

    $graph->title->Set("Nombre de visites par média");

    // Display the graph
    $graph->Stroke();