function go_home(){
    window.location = site + "backoffice/binario";
}

function go_back(){
    window.history.back();
}

function go_top(encryt_username){
    document.getElementById("submit3").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span>";
    document.getElementById("submit3").disabled = true;
    $.ajax({
        type: "post",
        url: site + "/backoffice/binario_top",
        dataType: "json",
        data: {encryt_username : encryt_username},
        success:function(data){   
            if(data.status == true){
                window.setTimeout(function () {
                    window.location = site + "/backoffice/binario/"+ data.id;
                }, 0000);
            }else{
                document.getElementById("submit3").innerHTML = "<i class='feather icon-corner-up-left'></i>Subir";
                document.getElementById("submit3").disabled = false;
            }
        }         
    });
}

function go_left(encryt_username){
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span>";
    document.getElementById("submit").disabled = true;
    $.ajax({
        type: "post",
        url: site + "/backoffice/binario_left",
        dataType: "json",
        data: {encryt_username : encryt_username},
        success:function(data){   
            if(data.status == true){
                window.setTimeout(function () {
                    window.location = site + "/backoffice/binario/"+ data.id;
                }, 0000);
            }else{
                document.getElementById("submit").innerHTML = "<i class='feather icon-chevron-right'></i>Último Izquierda";
                document.getElementById("submit").disabled = false;
            }
        }         
    });
}

function go_right(encryt_username){
    document.getElementById("submit2").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span>";
    document.getElementById("submit2").disabled = true;
    $.ajax({
        type: "post",
        url: site + "/backoffice/binario_right",
        dataType: "json",
        data: {encryt_username : encryt_username},
        success:function(data){   
            if(data.status == true){
                window.setTimeout(function () {
                    window.location = site + "/backoffice/binario/"+ data.id;
                }, 0000);
            }else{
                document.getElementById("submit2").innerHTML = "<i class='feather icon-chevron-right'></i>Último Derecha";
                document.getElementById("submit2").disabled = false;
            }
        }         
    });
}  