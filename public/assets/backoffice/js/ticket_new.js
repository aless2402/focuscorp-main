function new_ticket(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Enviando...";
    oData = new FormData(document.forms.namedItem("ticket-form"));
    Swal.fire({
        title: 'Confirma que desea enviar el Ticket?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: site + "backoffice_new/ticket/send_ticket",
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
                            title: 'Ticket Enviado',
                            footer: 'En breve estaremos contestando su solicitud',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "backoffice_new/ticket";
                        }, 1500);
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Sucedio un error',
                            footer: 'Verifique la información'
                        });
                    }
                }
            });
        }else{
            document.getElementById("submit").disabled = false;
            document.getElementById("submit").innerHTML = "Enviar";
        }
    }); 
}