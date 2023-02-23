function pagado(pay_id, amount, descount, amount_total, email, first_name, hash_id){
    Swal.fire({
        title: 'Confirma que desea pagar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/activar_pagos/pagado",
                dataType: "json",
                data: {pay_id : pay_id,
                    amount : amount,
                    descount : descount,
                    amount_total : amount_total,
                    email : email,
                    first_name : first_name,
                    hash_id : hash_id},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Pago Procesado',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/activar_pagos";
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

function devolver(pay_id){

    Swal.fire({
        title: 'Confirma que desea devuelver las comisiones?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/activar_pagos/devolver",
                dataType: "json",
                data: {pay_id : pay_id},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Pago Devuelto',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/activar_pagos";
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


function validate(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form-pay"));
        $.ajax({
            url: site + "dashboard/activar_pagos/validate",
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
                        title: 'Cambios Guardado',
                        showConfirmButton: false,
                    });
                    window.setTimeout(function () {
                        window.location = site + "dashboard/activar_pagos";
                    }, 1500);
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Sucedio un error',
                        footer: 'Vuelva a Intentarlo'
                    });
                    document.getElementById("submit").disabled = false;
                    document.getElementById("submit").innerHTML = "Guardar";
                }
            }
        });
    
}
function edit_pay(id){    
    var url = 'dashboard/activar_pagos/load/'+id;
    location.href = site+url;   
}
function cancelar_pay(){
   var url= 'dashboard/activar_pagos';
   location.href = site+url;
}

