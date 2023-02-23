function send_message(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Enviando...";
    oData = new FormData(document.forms.namedItem("form-contact"));
        $.ajax({
            url: site + "/send_messages",
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
                        title: 'Mensaje enviado 👋',
                        footer: 'Nos estaremos comunicando con usted a la brevedad posible.',
                        showConfirmButton: false,
                    });
                    window.setTimeout(function () {
                        window.location = site;
                    }, 1500);
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Sucedio un error',
                        footer: 'Vuelva a Intentarlo'
                    });
                }
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Enviar Mensaje";
            }
        });
}
function validate_username(username){

    console.log(username);

    if(username == ""){
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    }else{
        $.ajax({
        type: "post",
        url: site + "register/validate_username",
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

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se aÃ±aden las letras validas
    var filtro = 'abcdefghijklmnÃ±opqrstuvwxyzABCDEFGHIJKLMNÃ‘OPQRSTUVWXYZ1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}