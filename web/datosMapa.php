<?php
include_once '../lib/helphers.php';
    $x = $_GET['x'];
    $y = $_GET['y'];
 $conca = $x.$y;

$pure = array("x" => $x, "y" => "$y");
 redirect(getUrl("Solicitud","Solicitud","getSolicitud",array("x"=> $x, "y" => $y)));
?>

