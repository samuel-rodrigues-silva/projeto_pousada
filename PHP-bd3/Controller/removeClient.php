<?php
    require('../bd/connection.php');

    if(isset($_GET['id'])){

        $id = $_GET['id'];
    }

    $query = 'delete from cliente where id =' . $id;

    $result = mysqli_query($connect,$query);

    header('Location: ../clients.php')
?>