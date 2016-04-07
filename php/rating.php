<?php 
session_start();   
    //Set content-type header
    header("Content-type: image/png");

    //Include phpMyGraph5.0.php
    include_once('phpMyGraph5.0.php');
    
    //Set config directives
    $cfg['title'] = 'Conors Rating';
    $cfg['label'] = $_GET['param'];//'Now';
    $cfg['zero-line-visible'] = 0;
    $cfg['width'] = 500;
    $cfg['height'] = 350;
    
    //Set data
    $data = array(
        '1984' => 1212,
        '1985' => 1396,
        '1986' => 1454,
        '2001' => 1727,
        '2003' => 1785,
        '2004' => 1764,
        '2005' => 1751,
        '2006' => 1737,
        '2007' => 1675,
        '2008' => 1688,
        '2009' => 1702,
        '2010' => 1657,
        '2011' => 1666,
        '2012' => 1662,
        '2013' => 1667,
        '2014' => 1672
    );
    
    //Create phpMyGraph instance
    $graph = new phpMyGraph();

    //Parse
    $graph->parseVerticalLineGraph($data, $cfg);


session_destroy();   

?>
