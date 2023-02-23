function change_state(comment_id){
    Swal.fire({
        title: 'Confirma que desea marcarlo como contestado?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/comentarios/cambiar_status",
                dataType: "json",
                data: {comment_id : comment_id},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Cambio Guardado',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/comentarios";
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

function change_state_no(comment_id){
    Swal.fire({
        title: 'Confirma que desea marcarlo como no contestado?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/comentarios/cambiar_status_no",
                dataType: "json",
                data: {comment_id : comment_id},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Cambio Guardado',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/comentarios";
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