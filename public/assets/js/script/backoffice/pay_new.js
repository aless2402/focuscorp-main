function make_pay(){
      document.getElementById("submit").disabled = true;
      document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
      var amount = document.getElementById("amount").value;
      var total_disponible = document.getElementById("total_disponible").value;
      var pin = document.getElementById("pin").value;
          if(amount < 50){
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'El importe debe ser mayor o igual a 50$',
                showConfirmButton: true,
            });
          }else{
            Swal.fire({
                title: 'Confirma que desea realizar el cobro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Confirmo'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: site + "backoffice_new/pay/make_pay",
                        dataType: "json",
                        data: {amount: amount,
                               total_disponible:total_disponible,
                               pin:pin},
                        success:function(data){
                            if(data.status == true){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Cobro Solicitado',
                                    footer: 'De 24 a 48 horas hábiles se estará procesando su solicitud',
                                    showConfirmButton: true,
                                });
                                window.setTimeout(function () {
                                    window.location = site + "backoffice_new/cobros";
                                }, 2500);
                            }else{
                                Swal.fire({
                                    position: 'center',
                                    icon: 'info',
                                    title: 'Verifique los Datos',
                                    showConfirmButton: true,
                                });
                                document.getElementById("submit").disabled = false;
                                document.getElementById("submit").innerHTML = "Enviar";
                            }
                        }            
                });
                }
            });


              
          }
}

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = '.1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}