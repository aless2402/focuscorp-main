function new_activate() {
    var url = 'dashboard/activaciones/nuevo';
    location.href = site + url;
}
function cancel_activate_kit() {
    var url = 'dashboard/activaciones';
    location.href = site + url;
}

function active_financiada(invoice_id,customer_id,kit_id){

    Swal.fire({
        title: 'Confirma que desea activar como financiada?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/activaciones/active_financy",
                dataType: "json",
                data: {invoice_id : invoice_id,
                    customer_id : customer_id,
                    kit_id : kit_id},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Activado como Financiada',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/activaciones";
                        }, 1500);
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'info',
                            title: 'Sucedio un error',
                            footer: 'Comunique a soporte'
                        });
                    }
                }
            });
        }
    }); 
}

function active(customer_id,kit_id,type){

    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("activate-form"));
    var financy = document.getElementById("financy").value;
    if(financy == 1){
        var url_link = site + "dashboard/activaciones/active_financy";
    }else{
        var url_link = site + "dashboard/activaciones/active";
    }

    Swal.fire({
        title: 'Confirma que desea activar la cuenta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url_link,
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
                            title: 'Cuenta Activada',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/activaciones";
                        }, 1500);
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'info',
                            title: 'Sucedio un error',
                            footer: 'Comunique a soporte'
                        });
                    }
                }
            });
        }
    }); 
}

function validate_user(username) {
    if (username == "") {
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    } else {
        $.ajax({
            type: "post",
            url: site + "dashboard/activaciones/validate_user",
            dataType: "json",
            data: {username: username},
            success: function (data) {
                if (data.message == true) {
                    $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
                    var inputCustomer_id = document.getElementById("customer_id");
                    inputCustomer_id.value = data.customer_id;
                    var inputCustomer = document.getElementById("customer");
                    inputCustomer.value = data.name;
                    var inputDni = document.getElementById("dni");
                    inputDni.value = data.dni;
                } else {
                    $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
                }
            }
        });
    }
}
  