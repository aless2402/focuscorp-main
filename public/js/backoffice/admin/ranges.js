function edit_ranges(range_id){    
    var url = 'dashboard/rangos/load/'+range_id;
    location.href = site+url;   
}
function cancel_ranges(){
   var url= 'dashboard/rangos';
   location.href = site+url;
}
function validate(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form-rangos"));
        $.ajax({
            url: site + "dashboard/rangos/validate",
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
                        window.location = site + "dashboard/rangos";
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

function update_range(comment_id){

   Swal.fire({
       title: 'Confirma que desea actualizar los rangos?',
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Si, Confirmo'
     }).then((result) => {
       if (result.isConfirmed) {
           $.ajax({
               type: "post",
               url: site + "dashboard/rangos/update_ranges",
               dataType: "json",
               data: {comment_id : comment_id},
               success: function (data) {
                   if (data.status == true) {
                       Swal.fire({
                           position: 'top-end',
                           icon: 'success',
                           title: 'Actualizado con Ã‰xito',
                           showConfirmButton: false,
                           timer: 1500
                       });
                       window.setTimeout(function () {
                           window.location = site + "dashboard/rangos";
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