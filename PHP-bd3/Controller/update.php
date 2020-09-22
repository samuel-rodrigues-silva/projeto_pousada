  <?php

      require('../bd/connection.php');
      print_r($_POST);
      $room_type = "'" .$_POST['type']. "'";
      $av =  "'" .$_POST['av']. "'";
      $roomNumber = "'" . $_POST['roomNumber'] .  "'";
    if(isset($_GET['id'])){
      
      $query = 'update quartos set num = '. $roomNumber .', room_type = '. $room_type .', d_price = ' .$_POST['price'] .', room_status = '. $av. ' where id = '.$_GET['id'].'' ;

      $result = mysqli_query($connect,$query);
      echo $query;

      header('Location: ../index.php');

    }
      
  ?>