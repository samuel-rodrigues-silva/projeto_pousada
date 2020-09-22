<?php
    require '../bd/connection.php';

   // print_r($_POST);
    if(isset($_POST['clientName']) && $_POST['clientName'] != ''){
        $name = $_POST['clientName'];
        $document = $_POST['document'];
        $date = $_POST['date'];
        $city = $_POST['city'];
        $state = $_POST['state'];
    }

    $query = "insert into cliente(nome,document,data_nasc,cidade,estado)value
    ('$name','$document', '$date','$city','$state')";
    
    $result = mysqli_query($connect,$query);

    header('Location: ../index.php');
?>