    <?php
        print_r($_GET);

        require('../bd/connection.php');

        if(isset($_GET['id'])){

            $id = $_GET['id'];
        }

        $query = 'select id_quarto from reserva where id_reserva ='. $id;
        $result = mysqli_query($connect,$query);
        $quarto = mysqli_fetch_array($result);
        

        $query = 'delete from reserva where id_reserva =' . $id;
        $result = mysqli_query($connect,$query);

        $query = "update quartos set room_status = 'free' where id =". $quarto[0];
        $result = mysqli_query($connect,$query);
        header('Location: ../booking.php')
    ?>