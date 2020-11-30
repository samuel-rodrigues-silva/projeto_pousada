<?php
    require_once('./../bd/connection.php');

    if(isset($_GET['nome']) && $_GET['nome']){
     
        
        $id = $_GET['nome'];
        $documento = $_GET['documento'];
        $data_nasc = $_GET['data'];

        $query = "UPDATE cliente SET document = '$documento' , data_nasc = '$data_nasc' WHERE id = $id ";

        $result = mysqli_query($connect,$query);

        echo json_encode($result);
    }

    if(isset($_GET['quarto']) && $_GET['quarto']){

        print_r($_GET);
        $data_entrada = $_GET['data_entrada'];
        $data_saida = $_GET['data_saida'];
        $valor_reserva = $_GET['preco'];
        $quarto = $_GET['quarto'];

            $query = "select id, d_price from quartos where num = '$quarto'";
            $result = mysqli_query($connect,$query);

            $req = mysqli_fetch_assoc($result);
            $id = $req['id'];
            $price = $req['d_price'];

            $price = subDays($data_entrada, $data_saida) * $price;
            echo $price;

        $query = "UPDATE reserva set data_entrada = '$data_entrada' , data_saida = '$data_saida', valor_reserva = $price WHERE id_quarto = $id";

        $result = mysqli_query($connect,$query);
        echo json_encode($req);
    }

    function subDays($data_inicio , $data_fim){
        $data1 = $data_fim;
        $data2 = $data_inicio;

        $data1 = implode('-', array_reverse(explode('/', $data1)));
        $data2 = implode('-', array_reverse(explode('/', $data2)));

        $d1 = strtotime($data1); 
        $d2 = strtotime($data2);

        $dataFinal = ($d2 - $d1) /86400;

        if($dataFinal < 0)
        $dataFinal *= -1;

        return floor($dataFinal);
        }
?>