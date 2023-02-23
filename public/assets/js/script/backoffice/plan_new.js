function change_value(kit_id, price){
    document.getElementById("kit_id").value = kit_id;
    document.getElementById("price").value = price;
}

function update(total_disponible, kit_id , price_new, price, customer_id, node, leg , sponsor){
    result_diff = price_new - price;
    result_diff = result_diff + 15;
    if(total_disponible >= result_diff){
        Swal.fire({
            title: 'Confirma que desea realizar la compra?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Confirmo'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "/backoffice_new/planes/activar",
                    dataType: "json",
                    data: {total_disponible: total_disponible,
                        kit_id : kit_id,
                        price_new : price_new,
                        price : price,
                        customer_id : customer_id,
                        node : node,
                        leg : leg,
                        sponsor : sponsor,
                        result_diff : result_diff
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
        Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Saldo Insuficiente',
            showConfirmButton: true,
        });
    }
    
}