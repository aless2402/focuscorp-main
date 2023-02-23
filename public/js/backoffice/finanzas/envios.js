function search_username(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Buscando...";
    var username = document.getElementById("username").value;
        $.ajax({
            type: "post",
            url: site+"/backoffice/envios/search_username",
            dataType: "json",
            data: {username : username},
            success:function(data){  
                if(data.status == true){
                    document.getElementById('customer_id').value = data.customer_id;
                    document.getElementById('res_username').innerHTML = data.username;
                    document.getElementById('res_name').innerHTML = data.name;
                    document.getElementById('res_dni').innerHTML = data.dni;
                    document.getElementById('res_phone').innerHTML = data.phone;
                    if(data.active == 1){
                        document.getElementById('res_status').innerHTML = "Activo";
                    }else{
                        document.getElementById('res_status').innerHTML = "Inactivo";
                    }
                    document.getElementById("submit2").disabled = false;
                    document.getElementById("submit").disabled = false;
                    document.getElementById("submit").innerHTML = '<i class="fa fa-search"></i> Buscar';
                }else{
                    document.getElementById('res_name').innerHTML = "Sin Datos";
                    document.getElementById("submit").disabled = false;
                    document.getElementById("submit").innerHTML = '<i class="fa fa-search"></i> Buscar';
                }
            }         
        });
} 

function send_commissions(){
    document.getElementById("submit2").disabled = true;
    document.getElementById("submit2").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    var customer_id = document.getElementById("customer_id").value;
    var amount = document.getElementById("amount").value;
    var total_disponible = document.getElementById("total_disponible").value;
    Swal.fire({
        title: 'Confirma que desea hacer el envio?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site+"/backoffice/envios/send_commission",
                dataType: "json",
                data: {customer_id : customer_id,
                       amount : amount,
                       total_disponible : total_disponible},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Enviado',
                            showConfirmButton: true,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "backoffice/envios";
                        }, 1500);
                    } else if(data.status == "false2") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'info',
                            title: 'Importe invalido',
                        });
                        document.getElementById("submit2").disabled = false;
                        document.getElementById("submit2").innerHTML = "<i class='fa fa-paper-plane'></i> Enviar";
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Hubo un error',
                            footer: 'Comunique a soporte'
                        });
                        document.getElementById("submit2").disabled = false;
                        document.getElementById("submit2").innerHTML = "<i class='fa fa-paper-plane'></i> Enviar";
                    }
                }
            });
        }
    }); 
}