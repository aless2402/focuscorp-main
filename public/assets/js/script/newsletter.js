function newsletter(){
    document.getElementById("submit_new").disabled = true;
    oData = new FormData(document.forms.namedItem("form-newsletter"));
        $.ajax({
            url: site + "newsletter",
            method: "POST",
            data: oData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                var data = JSON.parse(data);
                if (data.status == true) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Email guardado',
                        timer: 1500,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Email guardado',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
                document.getElementById("submit_new").disabled = false;
            }
        });
}

function newsletter2(){
    document.getElementById("submit_new2").disabled = true;
    document.getElementById("submit_new2").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Enviando...";
    oData = new FormData(document.forms.namedItem("form-newsletter2"));
        $.ajax({
            url: site + "newsletter",
            method: "POST",
            data: oData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                var data = JSON.parse(data);
                if (data.status == true) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Email guardado',
                        timer: 1500,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Email guardado',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
                document.getElementById("submit_new2").disabled = false;
                document.getElementById("submit_new2").innerHTML = "SUSCRIBIRSE";
            }
        });
}
