    <?php
    $list = [];
        require('../bd/connection.php');

        foreach($_POST  as $p => $val){
            $list[$p] = "'" . $val . "'";  
        }

        
    if(isset($_GET['idClient'])){


        $query = 'update cliente set nome = '. $list['clientName'] .', document = '. $list['document'] .', data_nasc = ' . $list['date'] .', cidade = '. $list['city'] .', estado = '. $list['state'] . ' where id = '. $_GET['idClient'].'';

        $result = mysqli_query($connect,$query);
        //echo $query;
        header('Location: ../index.php');

    }
        
    ?>