function change_value(price, img, kit_id){
    var title = document.getElementById("title"); 
    title.innerHTML = 'Licencia: ROCKET PRO <a  class="fw-bold link-primary">$' + price + '</a>';
    document.getElementById("ustd").src = site + "assets/rocketpro/" + img;
    //change price
    document.getElementById("price").value = price;
    //change kit_id
    document.getElementById("kit_id").value = kit_id;
}

function register_rocket_pro(){
    document.getElementById("submit").innerHTML = "Enviando...";
    oData = new FormData(document.forms.namedItem("form-rocketpro"));
    Swal.fire({
        title: 'Confirma que desea enviar datos de transferencia?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: site + "backoffice_new/planes/create_invoice_rocketpro",
                method: "POST",
                data: oData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var data = JSON.parse(data);
                    if (data.status == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Transferencia enviada con éxito',
                            footer: 'Su cuenta será activada en breves unos minutos',
                            timer: 3000,
                            showConfirmButton: false,
                        });
                        window.setTimeout(function () {
                            window.location = site + "backoffice_new/facturas";
                        }, 3000);
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Ups! verifique los datos nuevamente',
                            timer: 3000,
                            showConfirmButton: false,
                        });
                    }
                }
            });
        }else{
            document.getElementById("submit").disabled = false;
            document.getElementById("submit").innerHTML = "Enviar";
        }
    }); 

    
}