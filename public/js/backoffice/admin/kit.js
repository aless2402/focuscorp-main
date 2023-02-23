function validate_kit() {
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form-kit"));
    $.ajax({
        url: site + "dashboard/planes/validate",
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
                    title: 'Cambio Guardado',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = site + "dashboard/planes";
                }, 1500);
            } else {
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Guardar";
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Sucedio un error',
                    footer: 'Comunique a soporte'
                });
            }
        }
    });
}
function new_kit(){    
    var url = 'dashboard/planes/load/';
    location.href = site+url;   
}
function edit_kit(kit_id){    
     var url = 'dashboard/planes/load/'+kit_id;
     location.href = site+url;   
}
function cancel_kit(){
	var url= 'dashboard/planes';
	location.href = site+url;
}