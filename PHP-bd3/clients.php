<?php
    require_once('bd/connection.php');

    $query = 'select * from cliente';

    $result = mysqli_query($connect, $query);
    
    if($result->num_rows == 0){
            echo 'EMPTY CLIENTS';
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="style/rooms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
    <div id="main">
        <table>
            <tbody>
                <?php
                    while($data = mysqli_fetch_array($result)){
                        echo
                            '
                                <tr id="tr'. $data['id'] .'">
                                    <td>' . $data['nome'].'</td>
                                    <td>' . $data['document'] . '</td>
                                    <td>' . $data['data_nasc'] . '</td>
                                    <td>' . $data['cidade'] . '</td>
                                    <td>' . $data['estado'] . '</td>
                                    <td><a href="Controller/removeClient.php?id=' . $data['id'].' " style="color:red">Remove </a>
                                    <a href="index.php?idClient=' . $data['id'].' " style="color:green">Edit </a>
                                    </td>
                                </tr>' ;
                    }
                ?>
                
            </tbody>
        </table>
                        <button id="btnBookingList" ><a href="booking.php"> Booking</a></button>
                        <button id="btnClientList" ><a href="clients.php"> Clients</a></button>
                        <button id="btnRoomList" ><a href="rooms.php"> Rooms</a></button>
    </div>
    <a href="index.php">Voltar</a>
</body>

</html>