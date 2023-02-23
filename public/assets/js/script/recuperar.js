function recuperar(){
    var code = document.getElementById("code").value;
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Enviando...";
        $.ajax({
            type: "post",
            url: site+"recuperar-contrasena/validate",
            dataType: "json",
            data: {code : code},
            success:function(data){          
                if(data.status == true){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Mensaje Enviado',
                        footer: 'Revise su bandeja de correo, le llegará un mensaje con los datos de acceso',
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
    var customer_id = document.getElementById("customer_id").value;
    var pass = document.getElementById("pass").value;
    var confirm_pass = document.getElementById("confirm_pass").value;
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Enviando...";
    if(pass == confirm_pass){
        $.ajax({
            type: "post",
            url: site+"password/validate_recover",
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
                        title: 'Usuario no registrado',
                        showConfirmButton: true,
                    });
                }
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Cambiar Contraseña";
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
    }
}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}