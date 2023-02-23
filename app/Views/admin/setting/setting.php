<!doctype html>
<html lang="es-PE">
   <?php echo view("admin/head"); ?>
   <body data-new-gr-c-s-check-loaded="14.1042.0" data-gr-ext-installed="">
      <?php echo view("admin/header"); ?>
      <section class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <div class="pcoded-content">
               <div class="pcoded-inner-content">
                  <div class="page-header">
                     <div class="page-block">
                        <div class="row align-items-center">
                           <div class="col-md-12">
                              <div class="page-header-title">
                                 <h5 class="m-b-10">Setting</h5> 
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Configuraciones</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="main-body">
                     <div class="page-wrapper">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-header">
                                    <h5>Datos</h5>
                                 </div>
                                 <div class="card-body">
                                 <form name="form-setting" enctype="multipart/form-data" method="post" action="javascript:void(0);"; onsubmit="validate();">
                                       <div class="form-row">
                                          <div class="form-group col-md-6">
                                                <div class="form-group">
                                                   <label>Porcentaje Payout (%)</label>
                                                   <input class="form-control" type="text" id="payout" name="payout" onkeyup="this.value=Numtext(this.value)" value="<?php echo isset($obj_setting_payout[0]->percent)?$obj_setting_payout[0]->percent:"";?>" class="input-xlarge-fluid" placeholder="Ingrese porcentaje de cobros" required="">
                                                </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <div class="form-group">
                                                <label>Porcentaje Wallet a Wallet (%)</label>
                                                <input class="form-control" type="text" id="transfer" name="transfer" onkeyup="this.value=Numtext(this.value)" value="<?php echo isset($obj_setting_tranfer[0]->percent)?$obj_setting_tranfer[0]->percent:"";?>" class="input-xlarge-fluid" placeholder="Ingrese Porcentaje de transferencias" required="">
                                             </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <div class="form-group">
                                                <label>Boton de Cobro</label>
                                                      <select name="button_pay" id="button_pay" class="form-control">
                                                      <option value="">[ Seleccionar ]</option>
                                                         <option value="1" <?php if(isset($obj_setting_button_pay)){
                                                            if($obj_setting_button_pay[0]->status == 1){ echo "selected";}
                                                         }else{echo "";} ?>>Activo</option>
                                                         <option value="0" <?php if(isset($obj_setting_button_pay)){
                                                            if($obj_setting_button_pay[0]->status == 0){ echo "selected";}
                                                         }else{echo "";} ?>>Inactivo</option>
                                                   </select>
                                             </div>
                                          </div>
                                       </div>
                                       <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="<?php echo base_url('js/backoffice/admin/setting.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>