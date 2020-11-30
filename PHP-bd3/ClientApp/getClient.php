<?php
    require_once('./../bd/connection.php');
    if(isset($_POST['id']) && $_POST['id']){
        $data = $_POST['id'];
        $id = json_decode($data,true);

        $query = "select nome,document,data_nasc from cliente where id = $id";

        $result = mysqli_query($connect,$query);

        while($x = mysqli_fetch_array($result)){
            $fetch[] = $x;
        };        
        
           echo json_encode($fetch);

    }else if(isset($_POST['idReservation']) && $_POST['idReservation']){
        $data = $_POST['idReservation'];
        $id = json_decode($data,true);

        $query = "select id_reserva,id_quarto,data_entrada,data_saida, valor_reserva, status_reserva from reserva where id_cliente = $id";

        $result = mysqli_query($connect,$query);

        if($result){
            $row = mysqli_num_rows($result);
            if($row < 1){
                echo '[{"erro":"<span id=\'error_message\' class=\'alert alert-danger\'>Não há dados disponível para consulta <i onclick=\'RemoveError()\' class=\'fas fa-times \'><i></span>"}]';
            }else{  
                while($x = mysqli_fetch_array($result)){
                    $fetch[] = $x;
                }; 
                echo json_encode($fetch, JSON_PRETTY_PRINT);
            } 
                
        }

    }else if(isset($_POST['idQuarto']) && $_POST['idQuarto']){
        $data = $_POST['idQuarto'];
        $id = json_decode($data,true);

        $query = "select num from quartos where id = $id";

        $result = mysqli_query($connect,$query);

        while($x = mysqli_fetch_array($result)){
            $fetch[] = $x;
        };        
        
           echo json_encode($fetch);
    }else if(isset($_POST['idRoom']) && $_POST['idRoom']){
        $data = $_POST['idRoom'];
        $id = json_decode($data,true);


            $query = "select id from quartos where num = '$id'";
            $result = mysqli_query($connect,$query);

            $req = mysqli_fetch_assoc($result);
            $id = $req['id'];


        $query = "select id_reserva,id_quarto,data_entrada,data_saida, valor_reserva, status_reserva from reserva where id_quarto = $id";

        $result = mysqli_query($connect,$query);

        if($result){
            $row = mysqli_num_rows($result);
            if($row < 1){
                echo '[{"erro":"<span id=\'error_message\' class=\'alert alert-danger\'>Não há dados disponível para consulta <i onclick=\'RemoveError()\' class=\'fas fa-times \'><i></span>"}]';
            }else{  
                while($x = mysqli_fetch_array($result)){
                    $fetch[] = $x;
                }; 
                echo json_encode($fetch, JSON_PRETTY_PRINT);
            } 
                
        }
    }
   
        
?>