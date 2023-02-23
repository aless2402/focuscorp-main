function pagado(comission_id){
   Swal.fire({
       title: 'Confirma que desea marcar como pagado?',
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Si, Confirmo'
     }).then((result) => {
       if (result.isConfirmed) {
           $.ajax({
               type: "post",
               url: site + "dashboard/bono_liderazgo/pagado",
               dataType: "json",
               data: {comission_id : comission_id},
               success: function (data) {
                   if (data.status == true) {
                       Swal.fire({
                           position: 'top-end',
                           icon: 'success',
                           title: 'Actualizado con éxito',
                           showConfirmButton: false,
                           timer: 1500
                       });
                       window.setTimeout(function () {
                           window.location = site + "dashboard/bono_liderazgo";
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