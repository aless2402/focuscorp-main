function change_pass(){
    var pass = document.getElementById("pass").value;
    var new_pass = document.getElementById("new_pass").value;
    var new_pass_confirm = document.getElementById("new_pass_confirm").value;
                if(new_pass == new_pass_confirm){
                    $.ajax({
                       type: "post",
                       url: site + "/backoffice/perfil/update_password",
                       dataType: "json",
                       data: {pass : pass,
                              new_pass : new_pass,
                              new_pass_confirm : new_pass_confirm},
                       success:function(data){   

                           if(data.status == true){
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Cambio Guardado',
                                    showConfirmButton: false,
                                });
                                window.setTimeout(function () {
                                    window.location = site + "/backoffice/perfil";
                                }, 1000);
                           }else{
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'info',
                                    title: 'No se pudo guardar',
                                    showConfirmButton: false,
                                });
                           }


                       }         
                     });
                     
                }else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Las Contraseñas no son Iguales',
                        showConfirmButton: false,
                    });
                }
}   

function change_wallet(){

    document.getElementById("wallet_botton").disabled = true;
    document.getElementById("wallet_botton").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";

    var usdt = document.getElementById("usdt").value;
    var ltc = document.getElementById("ltc").value;
        $.ajax({
            type: "post",
            url: site + "backoffice/perfil/update_wallet",
            dataType: "json",
            data: {usdt : usdt,
                   ltc : ltc},
            success:function(data){          
                if(data.status == true){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cambio Guardado',
                        showConfirmButton: false,
                    });
                    window.setTimeout(function () {
                        window.location = site + "backoffice/perfil";
                    }, 1000);
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'No se pudo guardar',
                        showConfirmButton: false,
                    });
                }
            }         
        });
} 

function save_profile(){

    document.getElementById("profile_botton").disabled = true;
    document.getElementById("profile_botton").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";

    var dni = document.getElementById("dni").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
        $.ajax({
            type: "post",
            url: site +"/backoffice/perfil/save_profile",
            dataType: "json",
            data: {dni : dni,
                    phone : phone,
                    address : address},
            success:function(data){   
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cambio Guardado',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.setTimeout(function () {
                        window.location = site + "backoffice/perfil";
                    }, 1500);
                }   else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Hubo un error',
                        footer: 'Comunique a soporte'
                    });
                }
            }         
        });
            
} 
