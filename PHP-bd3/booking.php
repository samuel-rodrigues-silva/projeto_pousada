    <?php
        require_once('bd/connection.php');

        $query = 'select * from reserva';
        $result = mysqli_query($connect, $query);
        $result = mysqli_query($connect, $query);
        if($result->num_rows == 0){
            echo 'EMPTY BOOK';
        }

        
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking</title>
        <link rel="stylesheet" href="style/rooms.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <table>
                <tbody>
                    <?php

                        while($data = mysqli_fetch_array($result)){
                            
                            $query2 = 'select q.num , c.nome from quartos q, cliente  c where q.id = ' . $data['id_quarto'].' and c.id = ' . $data['id_cliente'] . ' ';
                            $result2 = mysqli_query($connect, $query2);
                            $list = $result2->fetch_all(MYSQLI_NUM);

                            
                            echo
                                '
                                    <tr id="tr'. $data['id_reserva'] .'">
                                        <td>' . $list[0][1].'</td>
                                        <td>' . $list[0][0] . '</td>
                                        <td>' . $data['data_entrada'] . '</td>
                                        <td>' . $data['data_saida'] . '</td>
                                        <td>R$' . $data['valor_reserva'] . ',00</td>
                                        <td>' . $data['status_reserva'] . '</td>
                                        <td>' . $data['status_dataHora'] . '</td>
                                        <td><a href="Controller/removeReserve.php?id=' . $data['id_reserva'].' " style="color:red">Remove </a>
                                        <a href="index.php?idBooking=' . $data['id_reserva'].' " style="color:green">Edit </a>
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