function pay(id_button, total_disponible, kit_id , amount, amount_total, customer_id, node, leg , sponsor){

    document.getElementById(id_button).disabled = true;
    document.getElementById(id_button).innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";

    if(total_disponible >= amount_total){
        Swal.fire({
            title: 'Confirma que desea realizar el upgrade?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Confirmo'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "/dashboard/activaciones/activar_from_upgrade",
                    dataType: "json",
                    data: {total_disponible: total_disponible,
                        kit_id : kit_id,
                        amount : amount,
                        amount_total : amount_total,
                        customer_id : customer_id,
                        node : node,
                        leg : leg,
                        sponsor : sponsor
                    },
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Licencia Crecida',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                window.location = "/backoffice/facturas";
                            }, 1500);
                        } else {
                            document.getElementById(id_button).disabled = false;
                            document.getElementById(id_button).innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Comprar con Comisiones";
                            Swal.fire({
                                position: 'center',
                                icon: 'info',
                                title: 'Saldo Insuficiente',
                                showConfirmButton: true,
                            });
                        }
                    }
                });
            }
        });
    }else{
        document.getElementById(id_button).disabled = false;
        document.getElementById(id_button).innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Comprar con Comisiones";
        Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Disponible Insuficiente',
            showConfirmButton: true,
        });
    }
    
}
