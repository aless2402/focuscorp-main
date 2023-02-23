function go_renovation(){
    window.location = site + "/backoffice/renovacion";
} 

function renovation(total_disponible, kit_id , price, customer_id, node, leg , sponsor , qty_renovation, tope_amount){

    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    document.getElementById("submit").disabled = true;

    if(total_disponible >= price){
        Swal.fire({
            title: 'Confirma que desea realizar la renovación?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Confirmo'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: site + "/dashboard/activaciones/activar_from_renovation",
                    dataType: "json",
                    data: {total_disponible: total_disponible,
                        kit_id : kit_id,
                        price : price,
                        customer_id : customer_id,
                        node : node,
                        leg : leg,
                        sponsor : sponsor,
                        qty_renovation : qty_renovation,
                        tope_amount : tope_amount
                    },
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Licencia Renovada',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                window.location = "/backoffice/facturas";
                            }, 1500);
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'info',
                                title: 'Saldo Insuficiente',
                                showConfirmButton: true,
                            });
                            document.getElementById("submit").innerHTML = "Comprar con Comisiones";
                            document.getElementById("submit").disabled = false; 
                        }
                    }
                });
            }else{
                document.getElementById("submit").innerHTML = "Comprar con Comisiones";
                document.getElementById("submit").disabled = false;
            }
        });
    }else{
        Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Saldo Insuficiente',
            showConfirmButton: true,
        });
        document.getElementById("submit").innerHTML = "Comprar con Comisiones";
        document.getElementById("submit").disabled = false;
    }
    
}