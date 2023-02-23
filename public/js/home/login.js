function login(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form-login"));
        $.ajax({
            url: site + "/login_user",
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
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Datos Invalidos',
                        footer: 'Vuelva a Intentarlo'
                    });
                }
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Ingresar";
            }
        });
}