

let client = document.getElementById('client-btn');
let book = document.getElementById('book-btn');

    client.addEventListener('click', _ => {
        document.getElementById('client-card').style.display = 'block';
        document.getElementById('book-card').style.display = 'none';
        RemoveError();
    })

    book.addEventListener('click', _ => {
        document.getElementById('client-card').style.display = 'none';
        document.getElementById('book-card').style.display = 'block';
    })

function selectClient(id){
    $("#select_quarto").children('option:not(:first)').remove();
    $.post('getClient.php', "id=" + id , data =>{
        
        var array = JSON.parse(data);
        document.getElementById("documento").value = array[0][1]
        document.getElementById("data").value = array[0][2]
        
            selectReservation(id);
    })

}

function selectReservation(id){
    $.post('getClient.php', 'idReservation=' + id , data => {
            
            var array = JSON.parse(data);
            if(!array[0]['erro']){
            console.log(array);
                
                document.getElementById("data_entrada").value = array[0]['data_entrada']
                document.getElementById("data_saida").value = array[0]['data_saida']
                
                    array.forEach(element => {
                        $.post('getClient.php', 'idQuarto=' + element['id_quarto'], data =>{
                            var room = JSON.parse(data) ;
                            $("#select_quarto").append(`<option value="${room[0][0]}">${room[0][0]}</option>`)
                        });
                    });

                document.getElementById("preco").value = array[0]['valor_reserva']
                document.getElementById("status").value = array[0]['status_reserva']
                RemoveError();
            }else{

                $('#erro').html(array[0]['erro']);
                document.getElementById("data_entrada").value = ''
                document.getElementById("data_saida").value = ''
                document.getElementById("preco").value = ''
                document.getElementById("status").value = ''
                $("#select_quarto").children('option').remove();
            }

        
    })

}

function selectRoom(id){

    $.post('getClient.php', 'idRoom=' + id , data => {
            
        var array = JSON.parse(data);
        if(!array[0]['erro']){
        console.log(array);
            
            document.getElementById("data_entrada").value = array[0]['data_entrada']
            document.getElementById("data_saida").value = array[0]['data_saida']
            
               /* array.forEach(element => {
                    $.post('getClient.php', 'idQuarto=' + element['id_quarto'], data =>{
                        var room = JSON.parse(data) ;
                        $("#select_quarto").append(`<option value="${room[0][0]}">${room[0][0]}</option>`)
                    });
                });*/

            document.getElementById("preco").value = array[0]['valor_reserva']
            document.getElementById("status").value = array[0]['status_reserva']
            RemoveError();
        }else{

            $('#erro').html(array[0]['erro']);
            document.getElementById("data_entrada").value = ''
            document.getElementById("data_saida").value = ''
            document.getElementById("preco").value = ''
            document.getElementById("status").value = ''
            $("#select_quarto").children('option').remove();
        }

    
})

}
function EditClient(){
       
        let values = $('#clientForm').serializeArray();
        console.log(values)
         $.ajax({
            url : 'Edition.php',
            type : "GET",
            data : $.param(values),
            success : (data) => {
                console.log('A',data)
            },
            error : (data) => {
                console.error(data)
            }
        })
}

function EditReservation(){
    
    let values = $('#reservForm').serializeArray();
        console.log(values)
         $.ajax({
            url : 'Edition.php',
            type : "GET",
            data : $.param(values),
            success : (data) => {
                let value = JSON.parse(data);
                document.getElementById("data_entrada").value = value['data_entrada'];
                document.getElementById("data_saida").value = value['data_saida']
                document.getElementById("preco").value = value['preco']
                document.getElementById("status").value = value['status']
                console.log(value)
            },
            error : (data) => {
                console.error(data)
            }
        })
    
}


function RemoveError(){
    document.getElementById('error_message').remove();
}

