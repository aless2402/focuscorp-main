function login(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form-login"));
        $.ajax({
            url: site + "/iniciar-sesion/login_user",
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
                        window.location = site + "backoffice_new";
                    }, 1000);
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Datos Invalidos',
                        footer: 'Verifique el usuario y/o contraseña',
                        timer: 1500,
                    });

                }
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = '<i class="fa fa-share-square-o" aria-hidden="true"></i> Ingresar a la oficina';
            }
        });
}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}