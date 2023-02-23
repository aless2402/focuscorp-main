function validate_username_transfer(username){
    if(username == ""){
        $(".valid-feedback_username").removeClass('text-success').addClass('text-danger').html("Usuario Invalido");
    }else{
        $.ajax({
        type: "post",
        url: site + "/backoffice_new/envios/search_username",
        dataType: "json",
        data: {username: username},
        success:function(data){            
            if(data.status == true){         
                $(".valid-feedback_username").removeClass('text-danger').addClass('text-success').html(data.name);
                document.getElementById('customer_id').value = data.customer_id;
            }else{
                $(".valid-feedback_username").removeClass('text-success').addClass('text-danger').html("Usuario Invalido");
                document.getElementById('customer_id').value = "";
            }
        }            
        });
    }
}

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se aÃ±aden las letras validas
    var filtro = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890-_';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}

function send_commissions(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Enviando...";
    var customer_id = document.getElementById("customer_id").value;
    var amount = document.getElementById("amount").value;
    var total_disponible = document.getElementById("total_disponible").value;
    var pin = document.getElementById("pin").value;
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
                url: site + "/backoffice_new/envios/send_commission",
                dataType: "json",
                data: {customer_id : customer_id,
                        pin : pin,
                       amount : amount,
                       total_disponible : total_disponible},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Enviado',
                            showConfirmButton: true,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "backoffice_new/envios";
                        }, 1500);
                    } else if(data.status == "false2") {
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: data.message
                        });
                        document.getElementById("submit").disabled = false;
                        document.getElementById("submit").innerHTML = "<i class='fa fa-paper-plane'></i> Enviar";
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: data.message
                        });
                        document.getElementById("submit").disabled = false;
                        document.getElementById("submit").innerHTML = "<i class='fa fa-paper-plane'></i> Enviar";
                    }
                }
            });
        }
    }); 
}