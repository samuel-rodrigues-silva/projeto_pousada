function changeForms(){

    let roomForm = document.getElementById('room');
    let clientForm = document.getElementById('client');
    let bookingForm = document.getElementById('booking')
    let Rform = document.getElementById("roomForm");
    let CForm = document.getElementById("clientForm");
    let Bform = document.getElementById("bookingForm");
    roomForm.addEventListener('click', () => {
        Rform.style = "display: block";
        CForm.style = "display: none";
        Bform.style = "display: none";
    })

    clientForm.addEventListener('click', () => {
        Rform.style = "display: none";
        CForm.style = "display: block";
        Bform.style = "display: none";
    })

    bookingForm.addEventListener('click', () => {
        Rform.style = "display: none";
        CForm.style = "display: none";
        Bform.style = "display: block";
    })



}

function calcPrice(){

    let initDate = document.getElementById("dateIn").value;
    let finalDate = document.getElementById("dateOut").value;
    let price = document.getElementById("selectRoom").value.split('/');
    let days = (new Date(finalDate) - new Date(initDate)) / 86400000;
    console.log(days, price[1])
    document.getElementById("totalPrice").value = 'R$' + price[1] * days + ',00';
    
}



changeForms();


