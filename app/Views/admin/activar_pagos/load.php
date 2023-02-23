<!doctype html>
<html lang="es-PE">
   <?php echo view("backoffice/admin/head"); ?>
   <body data-new-gr-c-s-check-loaded="14.1042.0" data-gr-ext-installed="">
      <?php echo view("backoffice/admin/header"); ?>
      <section class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <div class="pcoded-content">
               <div class="pcoded-inner-content">
                  <div class="page-header">
                     <div class="page-block">
                        <div class="row align-items-center">
                           <div class="col-md-12">
                              <div class="page-header-title">
                                 <h5 class="m-b-10">Formulario de Activación de Pagos</h5> 
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Activación de Pagos</a></li>
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
                                    <form name="form-pay" enctype="multipart/form-data" method="post" action="javascript:void(0);"; onsubmit="validate();">
                                          <div class="form-row">
                                          <?php 
                                          if(isset($obj_pay)){ ?>
                                          <div class="form-group col-md-12">
                                                <div class="form-group">
                                                      <label>ID</label>
                                                      <input class="form-control" type="text" value="<?php echo isset($obj_pay[0]->pay_id)?$obj_pay[0]->pay_id:null;?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                      <input type="hidden" id="id" name="id" value="<?php echo isset($obj_pay[0]->pay_id)?$obj_pay[0]->pay_id:null;?>">
                                                </div>
                                          </div>
                                       <?php } ?>
                                          <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <label>Cliente</label>
                                                <input class="form-control" type="text" value="<?php echo isset($obj_pay)?$obj_pay[0]->first_name." ".$obj_pay[0]->last_name:"";?>" class="input-xlarge-fluid" disabled>
                                                </div>
                                                <div class="form-group">
                                                <label>Usuario</label>
                                                <input class="form-control" type="text" value="<?php echo isset($obj_pay)?$obj_pay[0]->username:"";?>" class="input-xlarge-fluid" disabled>
                                                </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <label>Importe</label>
                                                <input class="form-control" type="text" name="amount" id="amount" value="<?php echo isset($obj_pay)?$obj_pay[0]->amount:"";?>" class="input-xlarge-fluid" required="">
                                                </div>
                                                <div class="form-group">
                                                <label>Descuento</label>
                                                <input class="form-control" type="text" name="descount" id="descount" value="<?php echo isset($obj_pay)?$obj_pay[0]->descount:"";?>" class="input-xlarge-fluid" required="">
                                                </div>
                                                <div class="form-group">
                                                <label>Importe Total</label>
                                                <input class="form-control" type="text" name="amount_total" id="amount_total" value="<?php echo isset($obj_pay)?$obj_pay[0]->amount_total:"";?>" class="input-xlarge-fluid" required="">
                                                </div>
                                                <div class="form-group">
                                                <label>Hash ID</label>
                                                <textarea class="form-control" name="hash_id" id="hash_id" placeholder="Ingrese Hash ID"><?php echo isset($obj_pay[0]->hash_id)?$obj_pay[0]->hash_id:"";?></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label>Observacion</label>
                                                <textarea class="form-control" name="obs" id="obs" placeholder="Ingrese Observacion"><?php echo isset($obj_pay[0]->obs)?$obj_pay[0]->obs:"";?></textarea>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-12">
                                                      <label for="inputState">Estado</label>
                                                         <select name="active" id="active" class="form-control" required="">
                                                         <option value="">[ Seleccionar ]</option>
                                                            <option value="1" <?php if(isset($obj_pay)){
                                                               if($obj_pay[0]->active == 1){ echo "selected";}
                                                            }else{echo "";} ?>>En Espera</option>
                                                            <option value="2" <?php if(isset($obj_pay)){
                                                               if($obj_pay[0]->active == 2){ echo "selected";}
                                                            }else{echo "";} ?>>Pagado</option>
                                                            <option value="3" <?php if(isset($obj_pay)){
                                                               if($obj_pay[0]->active == 3){ echo "selected";}
                                                            }else{echo "";} ?>>Cancelado</option>
                                                      </select>

                                                </div>
                                             </div>
                                          </div>
                                          </div>
                                          <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                          <button class="btn btn-danger" type="reset" onclick="cancelar_pay();"><i class="fa fa-arrow-left" aria-hidden="true"></i>Cancelar</button>                    
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
      <script src="<?php echo base_url('js/backoffice/admin/activar_pagos.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("backoffice/admin/footer"); ?>