						
function copy(text) {
    r = document.querySelector("#kt_referral_link_input"); 
    e = document.querySelector("#kt_referral_program_link_copy_btn");
    navigator.clipboard.writeText(text);
    //change boton
    r.classList.add("bg-success")
    e.innerHTML = "Copied!"
}

function left(position){
        l = document.querySelector("#botton_left"); 
        r = document.querySelector("#botton_right"); 
              $.ajax({
                type: "post",
                url: site + "backoffice_new/temporal",
                dataType: "json",
                data: {position: position},
                success:function(data){
                    if(data.status == true){
                        //change boton
                        r.innerHTML = 'Derecha <i class="fa fa-chevron-right" aria-hidden="true"></i>';
                        l.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> Selected';
                    }
                }            
        });
}

function right(position){
    l = document.querySelector("#botton_left"); 
    r = document.querySelector("#botton_right"); 
    $.ajax({
      type: "post",
      url: site + "backoffice/temporal",
      dataType: "json",
      data: {position: position},
      success:function(data){
          //change boton
          l.innerHTML = '<i class="fa fa-chevron-left" aria-hidden="true"></i> Izquierda';
          r.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> Selected';
      }            
});
}