<?php

$host = 'localhost';
$user = 'root';
$pwd = '';
$bco = 'pousada';

    $connect = mysqli_connect($host,$user,$pwd);

    if(mysqli_connect_errno()){
        echo 'Connection Error' . mysqli_connect_error();
        exit();
    }

    $db = mysqli_select_db($connect,$bco) or die("Error choosin database");
    mysqli_set_charset($connect,'UTF-8')

?>