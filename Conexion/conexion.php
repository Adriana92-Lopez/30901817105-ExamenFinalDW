<?php

function conectar(){

    $server="mysql5045.site4now.net";
    $db="db_a7c17d_web";
    $user="a7c17d_web";
    $pass="Alfabeto2021";
    
    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error al conectar ".mysqli_error());

    return $con;
}

?>

