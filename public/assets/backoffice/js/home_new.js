						
function copy(text) {
    r = document.querySelector("#kt_referral_link_input"); 
    e = document.querySelector("#kt_referral_program_link_copy_btn");
    navigator.clipboard.writeText(text);
    //change boton
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
                        r.innerHTML = 'Derecha ';
                        l.innerHTML = 'Izquierda✓';
                        l.classList.add("scheme-success");
                        r.classList.remove("scheme-success");
                        r.classList.add("scheme-primary");
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
          l.innerHTML = 'Izquierda';
          r.innerHTML = 'Derecha✓';
          r.classList.add("scheme-success");
          l.classList.remove("scheme-success");
          l.classList.add("scheme-primary");
      }            
});
}