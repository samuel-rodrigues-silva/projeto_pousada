<?php

    require '../bd/connection.php';

    if(isset($_POST['selectRoom']) && $_POST['selectRoom'] != ''){
        $selectRoom = explode('/', $_POST['selectRoom']);
        $selectRoom = $selectRoom[0];
        $selectClient = $_POST['selectClient'];
        $dateIn = $_POST['dateIn'];
        $dateOut = $_POST['dateOut'];
        $totalPrice = explode('R$',$_POST['totalPrice']);
        $totalPrice = explode(',00', $totalPrice[1]);
        $status = $_POST['status'];
    }
    
    if($status == 'checkin' || $status == 'reserved'){
        // change table quartos to busy
        $query = "update quartos set room_status = 'busy' where id = " . $selectRoom;
        $result = mysqli_query($connect,$query);
    }else if($status == 'checkout' || $status == 'canceled'){
        $query = "update quartos set room_status = 'free' where id = " . $selectRoom;
        $result = mysqli_query($connect,$query);
    }

    $query = "insert into reserva(id_quarto,id_cliente,data_entrada,data_saida,valor_reserva,status_reserva)value($selectRoom,$selectClient,'$dateIn','$dateOut',$totalPrice[0],'$status')";
    $result = mysqli_query($connect,$query);

    header('Location: ../index.php')
?>