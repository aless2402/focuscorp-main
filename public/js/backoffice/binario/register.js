function register(){
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form-register"));
    var div_success = document.getElementById("success");
    var div_error = document.getElementById("error");
    var term = document.getElementById("terms");
    if (term.checked){
        $.ajax({
            url: site + "/backoffice/binario/register",
            method: "POST",
            data: oData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                var data = JSON.parse(data);
                if (data.status == true) {
                    div_success.style.display = "block";
                    window.setTimeout(function () {
                        window.location = site + "/backoffice/binario";
                    }, 1500);
                }else if (data.status == "username") {
                    div_error.style.display = "block";
                } else {
                    div_error.style.display = "block";
                }
            }
        });
    }else{
        term.focus();
        alert("Debe de aceptar los términos y condiciones")
        document.getElementById("submit").innerHTML = "Guardar";
    }
}

function validate_username(username){
    if(username == ""){
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    }else{
        $.ajax({
        type: "post",
        url: site + "/registro/validate_username",
        dataType: "json",
        data: {username: username},
        success:function(data){            
            if(data.message == "true"){         
                $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
            }else{
                $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
            }
        }            
        });
    }
}

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}

function change(node, qty_node, temporal, customer_id){
    var customer_id_text = document.getElementById("customer_id");
    customer_id_text.value = customer_id;

    var node_text = document.getElementById("node");
    node_text.value = node;

    var qty_node_text = document.getElementById("qty_node");
    qty_node_text.value = qty_node;

    var temporal_text = document.getElementById("temporal");
    temporal_text.value = temporal;
}

function show_info(name, last_name, username, membership , range , status, pais_img){

    var name_text = document.getElementById("i_name");
    name_text.innerHTML = name +" "+ last_name;
    
    var username_text = document.getElementById("i_username");
    username_text.innerHTML = username;

    var membership_text = document.getElementById("i_membership");
    membership_text.innerHTML = membership;

    var range_text = document.getElementById("i_range");
    range_text.innerHTML = range;
    
    var pais_text = document.getElementById("i_country");
    url_img = site + "img/paises/" + pais_img;
    pais_text.innerHTML = "<img src='" +url_img+ "' alt='pais' width='40'/> ";
    var status_text = document.getElementById("i_status");
    if(status == 1){
        status_text.innerHTML = "<a href='#!' class='label theme-bg text-white f-12'>Activo</a>";
    }else{
        status_text.innerHTML = "<a href='#!' class='label theme-bg2 text-white f-12'>Inactivo</a>";
    }
}


function go_home(){
    window.location = site + "backoffice/binario";
}

function go_back(){
    window.history.back();
}