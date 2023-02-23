function edit_invoices(invoice_id){    
    var url = 'dashboard/facturas/load/'+invoice_id;
    location.href = site+url;   
}
function cancelar_invoice(){
   var url= 'dashboard/facturas';
   location.href = site+url;
}

function validate(){
  document.getElementById("submit").disabled = true;
  document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
  oData = new FormData(document.forms.namedItem("form-invoices"));
      $.ajax({
          url: site + "dashboard/facturas/validate",
          method: "POST",
          data: oData,
          contentType: false,
          cache: false,
          processData: false,
          success: function (data) {
              var data = JSON.parse(data);
              if (data.status == true) {
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Cambio Guardado',
                      showConfirmButton: false,
                  });
                  window.setTimeout(function () {
                      window.location = site + "dashboard/facturas";
                  }, 1500);
              } else {
                  Swal.fire({
                      position: 'top-end',
                      icon: 'info',
                      title: 'Sucedio un error',
                      footer: 'Vuelva a Intentarlo'
                  });
                  document.getElementById("submit").disabled = false;
                  document.getElementById("submit").innerHTML = "Guardar";
              }
          }
      });
}


function modal_img(id){
   // Get the modal
   var modal = document.getElementById('myModal');
   var captionText = "Imagen";
   // Get the image and insert it inside the modal - use its "alt" text as a caption
   var img = document.getElementById(id);
   var modalImg = document.getElementById("img01");
   img.onclick = function(){
     modal.style.display = "block";
     modalImg.src = this.src;
     captionText.innerHTML = this.alt;
   }
   // Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close")[0];
   // When the user clicks on <span> (x), close the modal
   span.onclick = function() { 
     modal.style.display = "none";
   }
}