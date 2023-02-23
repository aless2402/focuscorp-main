<!doctype html>
<html lang="en" class="fa-events-icons-ready">
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
                           <div class="col-md-4 col-xl-4">
                              <div class="card theme-bgtotal bitcoin-wallet">
                                 <div class="card-block">
                                    <h5 class="text-white mb-2">Ganancia Disponible</h5>
                                    <h2 class="text-white mb-2 f-w-300"><b><?php echo format_number_dolar($total_disponible);?></b></h2>
                                    <i class="fa fa-usd f-70 text-white fa-4x" aria-hidden="true"></i>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-xl-4"></div><div class="col-md-4 col-xl-4"></div>
                           <div class="col-md-6 col-xl-4">
                                 <div class="card color-bg-plan visitor">
                                 <div class="card-block text-center">
                                       <h5 class="text-white m-0">PLAN</h5>
                                       <?php 
                                       $img = $obj_kit[0]->img;
                                       ?>
                                       <img alt="Planes de Inversión" src='<?php echo base_url('img/plan/'.$img);?>' width="100"> 
                                       <h3 class="text-white m-t-10 f-w-300"><?php echo $obj_kit[0]->name;?></h3>
                                       <span class="text-white">
                                       <div>
                                          <p class="m-t_menos9"></p>
                                          <button id="submit" onclick="renovation('<?php echo $total_disponible;?>','<?php echo $obj_kit[0]->kit_id;?>','<?php echo $obj_kit[0]->price;?>','<?php echo $customer_id;?>','<?php echo $node;?>', '<?php echo $leg;?>' , '<?php echo $sponsor;?>' , '<?php echo $qty_renovation;?>' , '<?php echo $tope_amount;?>');" class="buy-with-crypto">
                                             Comprar con Comisiones
                                          </button>
                                       </div>
                                    </span>
                                    <hr>
                                       <div class="col text-white">
                                          <?php echo $obj_kit[0]->description;?>
                                          <p style="font-size:13px !important">
                                             <em>En las renovaciones se repartirá el 50% de los puntos. En la tercera renovación se repartirá el 25% de los puntos.</em>
                                          </p>
                                       </div>
                                 </div>
                                 </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <script type="text/javascript" src="<?php echo base_url('js/backoffice/b_home_renovation.js'); ?>"></script>
      </div>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/vendor-all.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/bootstrap.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/menu-setting.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('js/backoffice/pcoded.js'); ?>"></script>
      <script>
         feather.replace()
      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </body>
</html>