<?php
    require '../bd/connection.php';

   // print_r($_POST);
    if(isset($_POST['roomNumber']) && $_POST['roomNumber'] != ''){
        $roomNumber = $_POST['roomNumber'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $av = $_POST['av'];
    }

    $query = "insert into quartos(num,room_type,d_price,room_status)value
    ('$roomNumber','$type', '$price','$av')";
    
    $result = mysqli_query($connect,$query);

    header('Location: ../index.php');
?>