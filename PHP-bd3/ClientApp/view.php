<html lang="pt-br">
<?php
        require_once('../bd/connection.php');
                    $query = " SELECT * FROM cliente ";
                    $result = mysqli_query($connect,$query);
                    $data = mysqli_fetch_all($result);
                                    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/client.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./js/fontawesome/css/all.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Pousada - Client</title>
</head>
<body>
    <div class="container-fluid">
        <a href="../index.php"><i class="fas fa-door-open float-right p-5 display-5" id="exit">Sair</i></a>
    </div>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-header bg-dark">
                        <div class="row">
                            <div class="col text-center" id="book-btn">
                                <i class="fas fa-calendar text-white"></i>
                            </div>
                            |
                            <div class="col text-center" id="client-btn">
                                <i class="fas fa-user text-white" ></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" id='client-card'>
                            <div class="col-md-12">
                                
                                <form action="" method="" id="clientForm" class="form-group border-top-0 border-right-0">
                                    <label for="nome">Nome</label>
                                    <select onchange="selectClient(this.value)" name="nome" id="select_nome" class="form-control border-top-0 border-right-0 m-2">
                                        <option value="0"> - </option>
                                        <?php foreach($data as $client){?>
                                        <option value="<?= $client[0]?>" > <?= $client[1]?> </option>
                                        <?php }?>
                                    </select>
                                    <label for="documento">Documento</label>
                                    <input type="documento" name="documento" id="documento" class="form-control border-top-0 border-right-0 m-2" >
                                    <label for="data">Data Nascimento</label>
                                    <input type="date" name="data" id="data" class="form-control border-top-0 border-right-0 m-2" >
                                    <a onclick="EditClient()" class="form-control border-top-0 border-right-0 m-2 bg-success text-white">Editar</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row" id='book-card'>
                            <div class="col-md-12">
                                <form action="" method="" id="reservForm" class="form-group border-top-0 border-right-0">
                                    <div id="erro" class="p-1"></div>
                                    <div class='d-flex justify-content-between'>
                                        <i class="fas fa-door-open"></i>
                                        <input type="date"class="form-control border-0" name="data_entrada" id="data_entrada"></input>
                                        
                                    </div>
                                    <div class='d-flex justify-content-between'>
                                        <i class="fas fa-door-closed"></i>
                                        <input type="date"class="form-control border-0" name="data_saida" id="data_saida"></input>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="quarto">Quarto</label>
                                        <select onchange="selectRoom(this.value)" name="quarto" id="select_quarto" class="form-control border-top-0 border-right-0 m-2">
                                        </select>
                                        <label for="preco">Preço</label>
                                        <input type="text" name="preco" id="preco" class="form-control border-top-0 border-right-0 m-2" readonly>
                                        <label for="status">Status</label>
                                        <input type="text" name="status" id="status" class="form-control border-top-0 border-right-0 m-2" readonly>
                                        <a type="submit" value="Editar" onclick="EditReservation(document.getElementById('select_quarto').value)" class="form-control border-top-0 border-right-0 m-2 bg-success text-white">Editar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</body>
<script src="js/client.js"></script>
</html>