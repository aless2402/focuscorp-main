function go_home(){
    window.location = site + "backoffice_new/binario";
}

function go_back(){
    window.history.back();
}

function go_top(encryt_username){
    $.ajax({
        type: "post",
        url: site + "backoffice_new/binario_top",
        dataType: "json",
        data: {encryt_username : encryt_username},
        success:function(data){   
            if(data.status == true){
                window.setTimeout(function () {
                    window.location = site + "backoffice_new/binario/"+ data.id;
                }, 0000);
            }
        }         
    });
}

function go_left(encryt_username){
    $.ajax({
        type: "post",
        url: site + "backoffice_new/binario_left",
        dataType: "json",
        data: {encryt_username : encryt_username},
        success:function(data){   
            if(data.status == true){
                window.setTimeout(function () {
                    window.location = site + "backoffice_new/binario/"+ data.id;
                }, 0000);
            }
        }         
    });
}

function go_right(encryt_username){
    $.ajax({
        type: "post",
        url: site + "backoffice_new/binario_right",
        dataType: "json",
        data: {encryt_username : encryt_username},
        success:function(data){   
            if(data.status == true){
                window.setTimeout(function () {
                    window.location = site + "backoffice_new/binario/"+ data.id;
                }, 0000);
            }
        }         
    });
}  

function show_info(name, last_name, username, membership , range , status, pais_img){

    var info_content = document.getElementById("info_content");

    var name_text = document.getElementById("i_name");
    name_text.innerHTML = name +" "+ last_name;
    
    var membership_text = document.getElementById("i_membership");
    membership_text.innerHTML = membership;

    var range_text = document.getElementById("i_range");
    range_text.innerHTML = range;
    
    var pais_text = document.getElementById("i_country");
    url_img = site + "img/paises/" + pais_img;
    pais_text.innerHTML = "<img src='" +url_img+ "' alt='pais' width='40'/> ";

    var status_text = document.getElementById("i_status");
    if(status == 1){
        status_text.innerHTML = '<span id="i_status" style="color:green !important">Active</span>';
    }else{
        status_text.innerHTML = '<span id="i_status" style="color:red !important">Inactive</span>';
    }

    info_content.style.display = "block";
    info_content.focus();
}