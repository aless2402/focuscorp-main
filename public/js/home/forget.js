function recuperar(){
    var username = document.getElementById("username").value;
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Enviando...";
        $.ajax({
            type: "post",
            url: "/recuperar-contrasena/validate",
            dataType: "json",
            data: {username : username},
            success:function(data){          
                if(data.status == true){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Mensaje Enviado',
                        footer: 'Revise su bandeja de correo, en los próximos minutos le llegará un mensaje con los datos de acceso',
                        showConfirmButton: true,
                    });
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Usuario no registrado',
                        showConfirmButton: true,
                    });
                }
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Recuperar Contraseña";
            }         
            });
}

function recover(){

    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Actualizando...";
    var customer_id = document.getElementById("customer_id").value;
    var pass = document.getElementById("password").value;
    var confirm_pass = document.getElementById("new_password").value;
    if(pass == confirm_pass){
        $.ajax({
            type: "post",
            url: "/password/validate_recover",
            dataType: "json",
            data: {customer_id : customer_id,
                   pass : pass,
                   confirm_pass : confirm_pass},
            success:function(data){          
                if(data.status == true){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Contraseña Cambiada',
                        footer: 'Ahora puede iniciar sesión',
                        showConfirmButton: true,
                    });
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'En enlace no es valido',
                        showConfirmButton: true,
                    });
                }
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "<i class='fa fa-paper-plane'></i>&nbsp; Actualizar Contraseña";
            }         
        });
    }else{
        Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Las contraseñan no son iguales',
            showConfirmButton: true,
        });
        document.getElementById("submit").disabled = false;
        document.getElementById("submit").innerHTML = "<i class='fa fa-paper-plane'></i>&nbsp; Actualizar Contraseña";
    } 
}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}