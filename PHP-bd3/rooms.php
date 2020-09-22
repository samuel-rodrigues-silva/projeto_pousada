<?php
    require_once('bd/connection.php');

    $query = 'select * from quartos';
    
    $result = mysqli_query($connect, $query);
   
    if($result->num_rows == 0){
            echo 'EMPTY ROOMS';
    }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
    <title>Rooms</title>
    <link rel="stylesheet" href="style/rooms.css">
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
                                    <td>' . $data['num'].'</td>
                                    <td>' . $data['room_type'] . '</td>
                                    <td>R$' . $data['d_price'] . ',00</td>
                                    <td>' . $data['room_status'] . '</td>
                                    <td><a href="Controller/remove.php?id=' . $data['id'].' " style="color:red">Remove </a>
                                    <a href="index.php?id=' . $data['id'].' " style="color:green">Edit </a>
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