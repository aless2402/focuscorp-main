function validate(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form-customer"));
        $.ajax({
            url: site + "dashboard/clientes/validate",
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
                        window.location = site + "dashboard/clientes";
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



function edit_customer(customer_id){    
     var url = 'dashboard/clientes/load/'+customer_id;
     location.href = site+url;   
}
function cancelar_customer(){
	var url= 'dashboard/clientes';
	location.href = site+url;
}