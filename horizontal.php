<?php    
    //Set content-type header
    header("Content-type: image/png");

    //Include phpMyGraph5.0.php
    include_once('phpMyGraph5.0.php');
    
    //Set config directives
    $cfg['title'] = 'Example graph';
    $cfg['width'] = 500;
    $cfg['height'] = 250;
    
    //Set data
    $data = array(
        'Jan' => 12,
        'Feb' => 25,
        'Mar' => 0,
        'Apr' => 7,
        'May' => 80,
        'Jun' => 67,
        'Jul' => 45,
        'Aug' => 66,
        'Sep' => 23,
        'Oct' => 23,
        'Nov' => 78,
        'Dec' => 23
    );
    
    //Create phpMyGraph instance
    $graph = new phpMyGraph();

    //Parse
    $graph->parseHorizontalLineGraph($data, $cfg);
?>
