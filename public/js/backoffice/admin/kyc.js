function verificado(customer_id){

    Swal.fire({
        title: 'Desea marcarlo como Verificado?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/kyc/cambiar_verificado",
                dataType: "json",
                data: {customer_id : customer_id},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Cambios Guardados',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/kyc_pendientes";
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

function rechazado(customer_id){

    Swal.fire({
        title: 'Desea marcarlo como Rechazado?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",   
                url: site + "dashboard/kyc/cambiar_rechazado",
                dataType: "json",
                data: {customer_id : customer_id},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Cambios Guardados',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/kyc_pendientes";
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
