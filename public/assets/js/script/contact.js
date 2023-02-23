function send_message(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Enviando...";
    oData = new FormData(document.forms.namedItem("form-contact"));
        $.ajax({
            url: site + "contacto/send_messages",
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
                        title: 'Mensaje enviado',
                        footer: 'Nos estaremos comunicando con usted pronto.',
                        timer: 3000,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Sucedio un error',
                        footer: 'Vuelva a Intentarlo',
                        timer: 3000,
                    });
                }
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = '<i class="fa fa-envelope-o" aria-hidden="true"></i> Enviar Mensaje';
            }
        });
}

