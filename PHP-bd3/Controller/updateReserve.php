<?php

    print_r($_POST);
    $list = [];
        require('../bd/connection.php');

        foreach($_POST  as $p => $val){
                if($val != $_POST['selectClient'] && $val != $_POST['selectRoom'] && $val != $_POST['totalPrice']){
                 $list[$p] = "'" . $val . "'"; 
                }
        }

        $id_quarto = explode('/',$_POST['selectRoom']);
        


    if(isset($_GET['idBooking'])){


        $query = 'update reserva set id_quarto = '. $id_quarto[0] .', id_cliente = '. $_POST['selectClient'] .', data_entrada = ' . $list['dateIn'] .', data_saida = '. $list['dateOut'] .', valor_reserva = '. $_POST['totalPrice'] .', status_reserva = '. $list['status'] .' where id_reserva = '. $_GET['idBooking'].'';

        $result = mysqli_query($connect,$query);
        // echo $query;
        header('Location: ../index.php');

    }
        
    ?>