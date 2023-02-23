function new_registro(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    //get pass
    password = document.getElementById("password").value;
    confirm_password = document.getElementById("confirm_password").value;
    oData = new FormData(document.forms.namedItem("form-new_registro")); 
    var term = document.getElementById("terms");
    if (term.checked){
        if(password == confirm_password){
            $.ajax({
                url: site + "/register/validacion",
                method: "POST",
                data: oData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var data = JSON.parse(data);
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Bienvenido',
                            showConfirmButton: false,
                        });
                        window.setTimeout(function () {
                            window.location = site + "/backoffice";
                        }, 1000);
                    }else if(data.status == "username"){
                        document.getElementById("submit").disabled = false;
                        document.getElementById("submit").innerHTML = "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp; Registrar";
                        document.getElementById('username').focus();
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'info',
                            title: 'Datos Invalidos',
                            footer: 'Vuelva a Intentarlo'
                        });
                    }
                    document.getElementById("submit").disabled = false;
                    document.getElementById("submit").innerHTML = "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp; Registrar";
                }
            });
        }else{
            document.getElementById("respose_pass").style.display = "block";
            document.getElementById("submit").innerHTML = "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp; Registrar";
            document.getElementById("submit").disabled = false;
        }
    }else{
        document.getElementById("respose_term").style.display = "block";
        document.getElementById('respose_term').focus();
        document.getElementById("submit").innerHTML = "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp; Registrar";
        document.getElementById("submit").disabled = false;
    }    
}

function validate_username(username){
    if(username == ""){
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    }else{
        $.ajax({
        type: "post",
        url: site + "/registro/validate_username",
        dataType: "json",
        data: {username: username},
        success:function(data){            
            if(data.message == "true"){         
                $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
            }else{
                $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
            }
        }            
        });
    }
}

function validate_pass(){
    pass = document.getElementById("password").value;
    confirm_password = document.getElementById("confirm_password").value;
    if(pass != confirm_password){
        $(".alert-pass").removeClass('text-success').addClass('text-danger').html("Las contraseñas no son iguales <i class='fa fa-times-circle-o' aria-hidden='true'></i>");   
    }else{
        $(".alert-pass").removeClass('text-danger').addClass('text-success').html("Contraseñas iguales <i class='fa fa-check-square-o' aria-hidden='true'></i>");
    }
}

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se aÃ±aden las letras validas
    var filtro = 'abcdefghijklmnÃ±opqrstuvwxyzABCDEFGHIJKLMNÃ‘OPQRSTUVWXYZ1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}