function new_concep(){
	var url= 'dashboard/concepto_ticket/load';
	location.href = site+url;
}
function validate(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form-concepto-ticket"));
        $.ajax({
            url: site + "dashboard/concepto_ticket/validate",
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
                        window.location = site + "dashboard/concepto_ticket";
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

function edit_concept(id){    
     var url = 'dashboard/concepto_ticket/load/'+id;
     location.href = site+url;   
}
function cancelar_concep(){
	var url= 'dashboard/concepto_ticket';
	location.href = site+url;
}