            <?php  require_once('bd/connection.php');?>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style/style.css">
                <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
                <title>Document</title>
            </head>
            <body>
            <div id="main">
                <div id="card">
                    <?php if(!isset($_GET['id']) && !isset($_GET['idClient']) && !isset($_GET['idBooking'])){?>
                        <div id="btnToggle">
                        <button id="booking">Booking</button>
                        <button id="room">Room</button>
                        <button id="client">Client</button>
                        </div>
                    <?php }?>
                        
                            <?php if(isset($_GET['id']) && $_GET['id'] != ''){?>
                                <!-- Room Edition -->
                                <?php $query = 'select * from quartos where id = '. $_GET['id'] .'';
                                    $result = mysqli_query($connect,$query);
                                    $obj = mysqli_fetch_array($result);
                                
                                    
                                ?>
                                <h1>Editar Quarto <?= $obj['num']?></h1>
                                <form action="Controller/update.php?id=<?=$_GET['id']?>" method="POST" id="RoomForm" style="display:">
                            
                            <label for="roomNumber">Room</label>
                            <input type="text" name="roomNumber" value="<?= $obj['num']?>">
                            <div class="radioCheck">
                                <?php if($obj['room_type'] == 'simple'){?>
                                    <input type="radio" value="simple" name="type" checked required>Simple
                                <?php }else{?>
                                    <input type="radio" value="simple" name="type" required>Simple                               
                                <?php }?>    

                                <?php if($obj['room_type'] == 'doble'){?>
                                    <input type="radio" value="doble" name="type" checked required>Doble
                                <?php }else{?>
                                    <input type="radio" value="doble" name="type" required>Doble
                                <?php }?> 

                                <?php if($obj['room_type'] == 'triple'){?>
                                    <input type="radio" value="triple" name="type" checked required>Triple
                                <?php }else{?>
                                    <input type="radio" value="triple" name="type" required>Triple
                                <?php }?>  
                                
                                
                            </div><br>

                            <label for="price">$$</label>
                            <input type="number" name="price" id="price" value="<?= $obj['d_price']?>">
                            
                            <div class="radioCheck">

                                <?php if($obj['room_status'] == 'free'){?>
                                <input type="radio" value="free" name="av" checked required>Free
                                <?php }else{?>
                                    <input type="radio" value="free" name="av" required>Free
                                <?php }?> 

                                <?php if($obj['room_status'] == 'busy'){?>
                                    <input type="radio" value="busy" name="av" checked required>Busy
                                <?php }else{?>
                                    <input type="radio" value="busy" name="av" required>Busy
                                <?php }?> 

                                <?php if($obj['room_status'] == 'Closed'){?>
                                    <input type="radio" value="Closed" name="av" checked required>Closed
                                <?php }else{?>
                                    <input type="radio" value="Closed" name="av" required>Closed
                                <?php }?> 

                            </div><br>
                            <input type="submit">
                            </form> 
                            <?php }else if(isset($_GET['idClient']) && $_GET['idClient'] != ''){?>
                                <?php $query = 'select * from cliente where id = '. $_GET['idClient'] .'';
                                    $result = mysqli_query($connect,$query);
                                    $obj = mysqli_fetch_array($result);    
                                    $nome = explode(' ',$obj['nome']);
                                    
                                
                                ?>

                                <!-- Client Edition -->
                                
                                <h1>Client <?= $nome[0] ?></h1>
                                    <form action="Controller/updateClient.php?idClient=<?=$_GET['idClient']?>" method="POST" id="clientForm" style="display:block">
                                <label for="clientName">Name</label>
                                <input type="text" name="clientName" id="clientName" value="<?=$obj['nome']?>">
                                <label for="document">CPF/RG</label>
                                <input type="text" name="document" id="document" value="<?=$obj['document']?>">
                                <label for="date">birth:</label>
                                <input type="date" name="date" id="date" value="<?=$obj['data_nasc']?>"><br>
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" value="<?=$obj['cidade']?>">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" value="<?=$obj['estado']?>">  
                                <input type="submit">
                                </form> 

                                <!-- Booking Edition -->
                            <?php }else if(isset($_GET['idBooking']) && $_GET['idBooking'] != ''){?>
                                <?php 

                                $query = 'select * from reserva where id_reserva = '. $_GET['idBooking'] .'';
                                $result = mysqli_query($connect,$query);
                                $obj = mysqli_fetch_array($result); 
                               echo $obj['id_quarto'];

                                $query = "select id, num, d_price from quartos where room_status = 'free'";
                                $result = mysqli_query($connect,$query);
                                $room_list = $result->fetch_all(MYSQLI_NUM);
                                
                                $query = "select id,nome from cliente";
                                $result = mysqli_query($connect,$query);
                                $client_list = $result->fetch_all(MYSQLI_NUM);  

                                $query2 = 'select q.num , c.nome from quartos q, cliente  c where q.id = ' . $obj['id_quarto'].' and c.id = ' . $obj['id_cliente'] . ' ';
                                $result2 = mysqli_query($connect, $query2);
                                $list = $result2->fetch_all(MYSQLI_NUM);

                                ?>
                                <h1>Edit Book <?=$list[0][0] . '/' . $list[0][1]?></h1>
                                <form action="Controller/updateReserve.php?idBooking=<?=$_GET['idBooking']?>" method="POST" id="bookingForm" style="display:block">
                            
                                <label for="selectRoom">Select room</label>
                                <select name="selectRoom" id="selectRoom">
                                    <?php foreach($room_list as $room){?>
                                        <?php if($obj['id_quarto'] == $room[0]){?>
                                            <option value="<?= $room[0]. '/' . $room[2]?>" selected><?= $room[1]?></option>
                                        <?php }else{?>
                                            <option value="<?= $room[0]. '/' . $room[2]?>"><?= $room[1]?></option>
                                        <?php }?>
                                    <?php }?>

                                </select>
                                <label for="selectClient">Select Client</label>
                                <select name="selectClient" id="selectClient">
                                    <?php foreach( $client_list as $client){?>
                                        <option value="<?= $client[0]?>"><?= $client[1]?></option>
                                        <?php if($client[0] == $obj['id_cliente']) $ckClient = false?>
                                    <?php }?> 
                                        <?php if($ckClient){?>                           
                                        <option value="<?=$obj['id_cliente']?>"checked><?= $list[0][1]?></option>
                                        <?php }?>
                                </select>
                                <label for="dataIn">Date In:</label>
                                <input type="date" name="dateIn" id="dateIn" value="<?=$obj['data_entrada']?>">
                                <label for="dateOut">Date Out:</label>
                                <input type="date" name="dateOut" id="dateOut" value="<?=$obj['data_saida']?>" onchange="calcPrice()"><br>
                                <label for="totalPrice">Total Price:</label>
                                <input type="text" name="totalPrice" id="totalPrice" value="<?=$obj['valor_reserva']?>" readonly>
                                <label for="status">Status:</label>

                                    <?php if($obj['status_reserva'] == 'checkin'){?>
                                        <input type="radio" name="status" value="checkin" checked required> checkin
                                    <?php }else{?>
                                        <input type="radio" name="status" value="checkin" required>checkin
                                    <?php }?>
                                    
                                    <?php if($obj['status_reserva'] == 'checkout'){?>
                                        <input type="radio" name="status" value="checkout" checked required> checkout
                                    <?php }else{?>
                                        <input type="radio" name="status" value="checkout" required> checkout
                                    <?php }?>

                                    <?php if($obj['status_reserva'] == 'reserved'){?>
                                        <input type="radio" name="status" value="reserved" checked required> reserved
                                    <?php }else{?>
                                        <input type="radio" name="status" value="reserved" required> reserved
                                    <?php }?>

                                    <?php if($obj['status_reserva'] == 'canceled'){?>
                                        <input type="radio" name="status" value="canceled" selected> canceled
                                    <?php }else{?>
                                        <input type="radio" name="status" value="canceled" required> canceled
                                    <?php }?>
                                <input type="submit">
                                </form> 
                        </div>
                        
                    </div>

                            <?php }else{?>
                                <!-- room register -->
                            <form action="Controller/BdInsert.php" method="POST" id="roomForm">
                            <label for="roomNumber">Room</label>
                            <input type="text" name="roomNumber">
                            <div class="radioCheck">
                                <input type="radio" value="simple" name="type" required>Simple
                                <input type="radio" value="doble" name="type" required>Doble
                                <input type="radio" value="triple" name="type" required>Triple
                            </div><br>

                            <label for="price">$$</label>
                            <input type="number" name="price" id="price">
                            
                            <div class="radioCheck">
                                <input type="radio" value="free" name="av" required>Free
                                <input type="radio" value="busy" name="av" required>Busy
                                <input type="radio" value="Closed" name="av" required>Closed
                            </div><br>
                            <input type="submit">
                            </form> 
                            <?php }?>
                        
                            <!-- client register -->
                            <form action="Controller/BdInsertClient.php" method="POST" id="clientForm" style="display:none">
                                <label for="clientName">Name</label>
                                <input type="text" name="clientName" id="clientName">
                                <label for="document">CPF/RG</label>
                                <input type="text" name="document" id="document">
                                <label for="date">birth:</label>
                                <input type="date" name="date" id="date"><br>
                                <label for="city">City</label>
                                <input type="text" name="city" id="city">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state">  
                                <input type="submit">
                                </form> 

                            <!-- booking register -->
                            
                            <form action="Controller/BdInsertReserve.php" method="POST" id="bookingForm" style="display:none">
                            <?php
                                $query = "select id, num, d_price from quartos where room_status = 'free'";
                                $result = mysqli_query($connect,$query);
                                $room_list = $result->fetch_all(MYSQLI_NUM);
                                
                                $query = "select id,nome from cliente";
                                $result = mysqli_query($connect,$query);
                                $client_list = $result->fetch_all(MYSQLI_NUM);
                                
                            ?>
                                <label for="selectRoom">Select room</label>
                                <select name="selectRoom" id="selectRoom">
                                    <?php foreach($room_list as $room){?>
                                        <option value="<?= $room[0]. '/' . $room[2]?>"><?= $room[1]?></option>
                                    <?php }?>
                                </select>
                                <label for="selectClient">Select Client</label>
                                <select name="selectClient" id="selectClient">
                                <?php foreach( $client_list as $client){?>
                                        <option value="<?= $client[0]?>"><?= $client[1]?></option>
                                    <?php }?>                            
                                </select>
                                <label for="dataIn">Date In:</label>
                                <input type="date" name="dateIn" id="dateIn">
                                <label for="dateOut">Date Out:</label>
                                <input type="date" name="dateOut" id="dateOut" onchange="calcPrice()"><br>
                                <label for="totalPrice">Total Price:</label>
                                <input type="text" name="totalPrice" id="totalPrice" readonly>
                                <label for="status">Status:</label>
                                <input type="radio" name="status" value="checkin"> checkin
                                <input type="radio" name="status" value="checkout"> checkout
                                <input type="radio" name="status" value="reserved"> reserved
                                <input type="radio" name="status" value="canceled"> canceled 
                                <input type="submit">
                                </form> 
                        </div>
                        <button id="btnBookingList" ><a href="booking.php"> Booking</a></button>
                        <button id="btnClientList" ><a href="clients.php"> Clients</a></button>
                        <button id="btnRoomList" ><a href="rooms.php"> Rooms</a></button>
                    </div>
            </body>
            <script src="js/index.js"></script>
            </html>

