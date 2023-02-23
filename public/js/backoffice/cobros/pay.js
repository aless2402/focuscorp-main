function show_wallet(value){
    $.ajax({
        type: "post",
        url: "/backoffice/cobros/validate_wallet",
        dataType: "json",
        data: {value: value},
        success:function(data){
            document.getElementById("wallet").value = data.wallet;
        }            
    });
}

function make_pay(){
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    document.getElementById("submit").disabled = true;

    var amount = document.getElementById("amount").value;
    var type = document.getElementById("type").value;
    var total_disponible = document.getElementById("total_disponible").value;
        if(amount < 50){
          Swal.fire({
              position: 'center',
              icon: 'info',
              title: 'El importe debe ser mayor o igual a 50$',
              showConfirmButton: true,
          });
          document.getElementById("submit").innerHTML = "Realizar Retiro <i class='fa fa-usd'></i>";
          document.getElementById("submit").disabled = false;
        }else{
            Swal.fire({
                title: 'Confirma que desea hacer el envio?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Confirmo'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: site+"/backoffice/cobros/make_pay",
                        dataType: "json",
                        data: {amount: amount,
                            type:type,
                            total_disponible:total_disponible},
                            success:function(data){
                                if(data.status == true){
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Cobro Solicitado',
                                        footer: 'De 24 a 48 horas hábiles se estará procesando su solicitud',
                                        showConfirmButton: false,
                                    });
                                    window.setTimeout(function () {
                                        window.location = site + "backoffice/cobros";
                                    }, 1500);
                                }else{
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'info',
                                        title: 'Importe Invalido',
                                        showConfirmButton: true,
                                    });
                                }
                                document.getElementById("submit").innerHTML = "Realizar Retiro <i class='fa fa-usd'></i>";
                                document.getElementById("submit").disabled = false;
                            }
                    });
                }else{
                    document.getElementById("submit").innerHTML = "Realizar Retiro <i class='fa fa-usd'></i>";
                    document.getElementById("submit").disabled = false;
                }
            });    
        }
}

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se aÃ±aden las letras validas
    var filtro = '1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}