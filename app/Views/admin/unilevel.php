<!doctype html>
<html lang="e-PE" class="fa-events-icons-ready">
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
              <div class="col-md-6 col-xl-6">
                <div class="card theme-bgtotal bitcoin-wallet">
                    <div class="card-block">
                      <h5 class="text-white mb-2">Total Socios Unilevel</h5>
                      <h2 class="text-white mb-2 f-w-300"><?php echo format_number_miles($obj_total_referidos[0]->total);?></h2>
                      <i class="fa fa-chevron-left f-70 text-white fa-4x" aria-hidden="true"></i>
                    </div>
                </div>
              </div> 
              <div class="col-md-6 col-xl-6">
                <div class="card theme-bgtotal bitcoin-wallet">
                    <div class="card-block">
                      <h5 class="text-white mb-2">Socios Directas</h5>
                      <h2 class="text-white mb-2 f-w-300"><?php echo format_number_miles($obj_total_direct);?></h2>
                      <i class="fa fa-chevron-left f-70 text-white fa-4x" aria-hidden="true"></i>
                    </div>
                </div>
              </div> 
              <!--MODAL INFO -->
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title h4" id="myLargeModalLabel">Información de Socios</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                          <div class="card user-designer">
                            <div class="card-block text-center">
                                <h5 id="i_name"></h5>
                                <span id="i_username" class="d-block mb-4"></span>
                                <img class="img-fluid rounded-circle" src="<?php echo site_url('img/user_active.jpg');?>" alt="socio">
                                <div class="row m-t-30">
                                  <div class="col-md-3 col-6 m-t-10">
                                      <h5>Licencia</h5>
                                      <span id="i_membership" class="text-muted"></span>
                                  </div>
                                  <div class="col-md-3 col-6 m-t-10">
                                      <h5>Rango</h5>
                                      <span id="i_range" class="text-muted"></span>
                                  </div>
                                  <div class="col-md-3 col-6 m-t-10">
                                      <h5>País</h5>
                                      <span id="i_country" class="text-muted"></span>
                                  </div>
                                  <div class="col-md-3 col-6 m-t-10">
                                      <h5>Estado</h5>
                                      <span id="i_status" class="text-muted"></span>
                                  </div>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
              <!--end -->
                <div class="col-md-12 col-xl-12">
              <div class="element-box" style="overflow-x: scroll;background-color: white;">
                <div class="tree" style="padding: 0px !important;width:max-content">
                  <div class="card widget" align="center">
                    <div class="row">
                      <div class="col-md-6"></div>
                      <div class="col-md-6"></div>
                    </div>
                    <ul class="arvore" style="padding-bottom: 80px">
                      <li style="">
                        <div align="center">
                            <!------------->
                            <!--//NIVEL 1-->
                            <!------------->
                          <ul class="init">
                            <li>
                              <!-- Meu Usuario -->
                              <a href="javascript:void(0);">
                                  <div id="level-0">
                                    <img src="<?php echo site_url("img/plan/".$obj_customer[0]->kit_img);?>" class="img-responsive" style="width: 70px;"> 
                                    <a onclick="show_info('<?php echo $obj_customer[0]->first_name;?>', '<?php echo $obj_customer[0]->last_name;?>', '<?php echo $obj_customer[0]->username;?>', '<?php echo $obj_customer[0]->kit_name;?>', '<?php echo $obj_customer[0]->range_name;?>', '<?php echo $obj_customer[0]->active;?>', '<?php echo $obj_customer[0]->pais_img;?>' );" style="border-radius:50%;cursor: pointer" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@getbootstrap"><i class="fa fa-eye text-c-green" aria-hidden="true" ></i></a> 
                                  </div>
                              </a>
                                    <!------------->
                                    <!--//NIVEL 2-->
                                    <!------------->
                                    <?php if(count($obj_customer_n2) > 0){ ?>
                                  <ul>
                                      <?php foreach ($obj_customer_n2 as $value) { ?>
                                                <li>
                                                    <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value->customer_id);?>">
                                                        <div id="level-1"> 
                                                      <img src="<?php echo site_url("img/plan/").$value->kit_img;?>" class="img-responsive" style="width: 70px;"> 
                                                      <a onclick="show_info('<?php echo $value->first_name;?>', '<?php echo $value->last_name;?>', '<?php echo $value->username;?>', '<?php echo $value->kit_name;?>', '<?php echo $value->range_name;?>', '<?php echo $value->active;?>', '<?php echo $value->pais_img;?>' );" style="border-radius:50%;cursor: pointer" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@getbootstrap"><i class="fa fa-eye text-c-green" aria-hidden="true" ></i></a> 
                                                    </div>
                                                    </a>
                                                    <!------------->
                                                    <!--//NIVEL 3-->
                                                    <!------------->
                                                    <?php if(count($obj_customer_n3) > 0){ 
                                                                ?>
                                                        <ul class="d-sm-block">
                                                            <?php foreach ($obj_customer_n3 as $value3) { ?>
                                                                <?php if($value->customer_id == $value3->parend_id){ ?>
                                                                    <li>
                                                                          <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value3->customer_id);?>">
                                                                            <div id="level-2">
                                                                            <img src="<?php echo site_url("img/plan/").$value3->kit_img;?>" class="img-responsive" style="width: 70px;"> </div>
                                                                              <a onclick="show_info('<?php echo $value3->first_name;?>', '<?php echo $value3->last_name;?>', '<?php echo $value3->username;?>', '<?php echo $value3->kit_name;?>', '<?php echo $value3->range_name;?>', '<?php echo $value3->active;?>', '<?php echo $value3->pais_img;?>' );" style="border-radius:50%;cursor: pointer" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@getbootstrap"><i class="fa fa-eye text-c-green" aria-hidden="true" ></i></a> 
                                                                          </a>
                                                                            <!------------->
                                                                            <!--//NIVEL 4-->
                                                                            <!------------->
                                                                            <?php if(count($obj_customer_n4) > 0){ ?>
                                                                                 <ul class="d-sm-block">
                                                                                     <?php  foreach ($obj_customer_n4 as $value4) { ?>
                                                                                            <?php if($value3->customer_id == $value4->parend_id){ ?>
                                                                                                    <li>
                                                                                                          <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value4->customer_id);?>">
                                                                                                            <div id="level-3">
                                                                                                            <img src="<?php echo site_url("img/plan/").$value4->kit_img;?>" class="img-responsive" style="width: 70px;"> </div>
                                                                                                              <a onclick="show_info('<?php echo $value4->first_name;?>', '<?php echo $value4->last_name;?>', '<?php echo $value4->username;?>', '<?php echo $value4->kit_name;?>', '<?php echo $value4->range_name;?>', '<?php echo $value4->active;?>', '<?php echo $value4->pais_img;?>' );" style="border-radius:50%;cursor: pointer" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@getbootstrap"><i class="fa fa-eye text-c-green" aria-hidden="true" ></i></a> 
                                                                                                          </a>
                                                                                                    </li>
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                </ul>
                                                                            <?php } ?>
                                                                    </li>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </li>                                
                                      <?php } ?>
                                  </ul>
                              <?php } ?>

                              </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
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
    <script src="<?php echo base_url('js/backoffice/binario/register.js'); ?>"></script>
  </div>
  <script type="text/javascript" src="<?php echo base_url('js/backoffice/vendor-all.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/backoffice/bootstrap.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/backoffice/menu-setting.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/backoffice/pcoded.js'); ?>"></script>
  <script>
         feather.replace()
      </script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </body>
</html>