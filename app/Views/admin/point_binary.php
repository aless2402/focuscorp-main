<!doctype html>
<html lang="es-PE" class="fa-events-icons-ready">
   <?php echo view("admin/head"); ?>
   <body data-new-gr-c-s-check-loaded="14.1042.0" data-gr-ext-installed="">
      <?php echo view("admin/header"); ?>
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <div class="pcoded-content">
               <div class="pcoded-inner-content">
                  <div class="main-body">
                     <div class="page-wrapper">
                        <div class="row">
                           <div class="col-md-6 col-xl-3">
                              <div class="card theme-bgtotal bitcoin-wallet">
                                 <div class="card-block">
                                    <h5 class="text-white mb-2">Puntos Izquierda</h5>
                                    <h2 class="text-white mb-2 f-w-300"><?php echo format_number_miles($obj_customer[0]->total_point_left);?></h2>
                                    <i class="fa fa-chevron-left f-70 text-white fa-4x" aria-hidden="true"></i>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-xl-3">
                              <div class="card theme-bgtotal bitcoin-wallet">
                                 <div class="card-block">
                                    <h5 class="text-white mb-2">Puntos Derecha</h5>
                                    <h2 class="text-white mb-2 f-w-300"><?php echo format_number_miles($obj_customer[0]->total_point_right);?></h2>
                                    <i class="fa fa-chevron-right f-70 text-white fa-4x" aria-hidden="true"></i>
                                 </div>
                              </div>
                           </div>   
                        </div>
                           <div class="card Recent-Users">
                              <div class="card-header">
                                 <h5>Historial Puntos Binario</h5>
                              </div>
                              <div class="card-header">
                                 <form name="form-search" method="post" action="<?php echo site_url() . 'backoffice/puntosbinario';?>">
                                    <div class="row card-active">
                                       <div class="col-md-4 col-6">
                                          <h6>Desde: </h6>
                                          <input type="text" id="from" name="from" class="form-control" required>
                                       </div>
                                       <div class="col-md-4 col-6">
                                          <h6>Hasta: </h6>
                                          <input type="text" id="to" name="to" class="form-control"required>
                                       </div>
                                       <div class="col-md-4 col-6">
                                          <h6>Buscar: </h6>
                                          <button type="submit" class="btn btn-dark-green">
                                             <i class="fa fa-search" aria-hidden="true"></i>
                                          </button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="px-0 py-3">
                                 <div class="table-responsive">
                                    <table class="table table-hover">
                                       <tr role="row">
                                          <th class="sorting_desc" tabindex="0" rowspan="1" colspan="1"></th>
                                          <th class="sorting" tabindex="0" rowspan="1" colspan="1">Fecha</th>
                                          <th class="sorting" tabindex="0" rowspan="1" colspan="1">P. Izquierda</th>
                                          <th class="sorting" tabindex="0" rowspan="1" colspan="1">P. Derecha</th>
                                          <th class="sorting" tabindex="0" rowspan="1" colspan="1">Concepto Por</th>
                                          <th class="sorting" tabindex="0" rowspan="1" colspan="1">Estado</th>
                                       </tr>
                                       <tbody>
                                       <?php 
                                       if (is_array($obj_points_binary) && count($obj_points_binary) > 0) { ?>
                                         <?php foreach ($obj_points_binary as $value) { ?>
                                            <tr class="unread">
                                              <td>
                                                <img class="rounded-circle" style="width:40px;" src="<?php echo base_url('img/avatar-2.jpg'); ?>" alt="Sistema">
                                              </td>
                                              <td>
                                              <?php 
                                              if($value->status == 2){  ?>
                                                   <?php echo formato_fecha_dia_mes($value->date);?> <?php echo formato_fecha_minutos($value->date);?></h6>
                                                <?php }else{ ?>
                                                   <h6 class="text-muted"><i class="fa fa-circle text-c-green f-10 m-r-15" aria-hidden="true"></i><?php echo formato_fecha_dia_mes($value->date);?> <?php echo formato_fecha_minutos($value->date);?></h6>
                                                <?php } ?>
                                              </td>
                                              <td>
                                                <?php 
                                                if($value->left == 0){
                                                   echo "-";
                                                 }elseif($value->left < 0){ ?>
                                                   <a href="#!" class="label buy-botton text-white f-12"><?php echo format_number_dolar($value->left);?></a>
                                                <?php }else{ ?>
                                                   <a href="#!" class="label bg-genex text-white f-12">+ <?php echo format_number_dolar($value->left);?></a>
                                                <?php } ?>
                                              </td>
                                              <td>
                                                <?php 
                                                if($value->right == 0){
                                                   echo "-";
                                                 }elseif($value->left < 0){ ?>
                                                   <a href="#!" class="label buy-botton text-white f-12"><?php echo format_number_dolar($value->right);?></a>
                                                <?php }else{ ?>
                                                   <a href="#!" class="label bg-genex text-white f-12">+ <?php echo format_number_dolar($value->right);?></a>
                                                <?php } ?>
                                              </td>
                                              <td>
                                                <?php 
                                                if($value->first_name == null){ 
                                                     echo "-";
                                                }else{ ?>
                                                   <p class="m-0"><?php echo str_to_first_capital($value->first_name)." ".str_to_first_capital($value->last_name);?></p>
                                                   <h6 class="mb-1"><?php echo "@".str_to_first_capital($value->username);?></h6>
                                                <?php } ?>
                                              </td>
                                              <td>
                                                 <?php 
                                                 if($value->status == 2){  ?>
                                                   <a href="#!" class="label buy-botton text-white f-12"><?php echo "Pago Binario";?></a>
                                                <?php }else{ ?>
                                                   <a href="#!" class="label bg-genex text-white f-12">+ <?php echo "Abonado";?></a>
                                                <?php } ?>
                                              </td>
                                            </tr>
                                          <?php } ?>
                                          <?php }else{ ?>
                                             <tr class="unread">
                                                <td colspan="6">
                                                   <p class="m-0">Sin Datos</p>
                                                </td>
                                          </tr>
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/vendor-all.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/bootstrap.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/menu-setting.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/pcoded.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/amcharts.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/serial.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/ammap.js'); ?>"></script>
      <script>
         feather.replace()
      </script>
      <!-- datapicker -->
      <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
      <script>
            $( function() {
               var dateFormat = "mm/dd/yy",
                  from = $( "#from" )
                  .datepicker({
                     defaultDate: "+1w",
                     changeMonth: true,
                     numberOfMonths: 3
                  })
                  .on( "change", function() {
                     to.datepicker( "option", "minDate", getDate( this ) );
                  }),
                  to = $( "#to" ).datepicker({
                  defaultDate: "+1w",
                  changeMonth: true,
                  numberOfMonths: 3
                  })
                  .on( "change", function() {
                  from.datepicker( "option", "maxDate", getDate( this ) );
                  });
            
               function getDate( element ) {
                  var date;
                  try {
                  date = $.datepicker.parseDate( dateFormat, element.value );
                  } catch( error ) {
                  date = null;
                  }
            
                  return date;
               }
            } );
      </script>
</html>