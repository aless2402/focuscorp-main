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
                                 <h5 class="m-b-10">Formulario de Comisiones</h5> 
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Comisiones</a></li>
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
                                 <form name="form-comission" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="validate();">
                                    <div class="form-row">
                                       <div class="form-group col-md-12">
                                             <div class="form-group">
                                                   <label>ID</label>
                                                   <input class="form-control"  type="text" value="<?php echo isset($obj_comission[0]->commissions_id)?$obj_comission[0]->commissions_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                   <input type="hidden" id="commissions_id" name="commissions_id" value="<?php echo isset($obj_comission[0]->commissions_id)?$obj_comission[0]->commissions_id:"";?>">
                                             </div>
                                       </div>
                                    <div class="form-group col-md-6">
                                          <div class="form-group">
                                             <label>Usuario</label>
                                             <input class="form-control" type="text" id="username" name="username" value="<?php echo isset($obj_comission[0]->username)?$obj_comission[0]->username:"";?>" class="input-xlarge-fluid" placeholder="Username" disabled="">
                                          </div>
                                          <div class="form-group">
                                             <label>Nombres</label>
                                             <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_comission[0]->first_name)?$obj_comission[0]->first_name." ".$obj_comission[0]->last_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre" disabled="">
                                          </div>
                                          <div class="form-group">
                                             <label for="inputState">Estado</label>
                                                <select name="active" id="active" class="form-control">
                                                      <option value="1" <?php if($obj_comission[0]->active == 1){ echo "selected";}?>>Abonado</option>
                                                      <option value="2" <?php if($obj_comission[0]->active == 2){ echo "selected";}?>>Abonado 2</option>
                                                      <option value="0" <?php if($obj_comission[0]->active == 3){ echo "selected";}?>>No Abonado</option>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                          <div class="form-group">
                                                <label>Fecha</label>
                                                <input class="form-control" type="text" id="date" name="date" value="<?php echo isset($obj_comission[0]->date)?formato_fecha_barras($obj_comission[0]->date):"";?>" class="input-xlarge-fluid">
                                          </div>
                                          <div class="form-group">
                                                <label>Importe</label>
                                                <input class="form-control" type="text" id="amount" name="amount" value="<?php echo isset($obj_comission[0]->amount)?$obj_comission[0]->amount:0;?>" class="input-xlarge-fluid">
                                          </div>
                                          <div class="form-group">
                                          <label for="inputState">Bono</label>
                                          <select name="bonus_id" id="bonus_id" class="form-control" required="">
                                                <option value="">Seleccionar Bono</option>
                                                      <?php foreach ($obj_bonus as $value) { ?>
                                                         <option  <?php
                                                         if (isset($obj_comission)) {
                                                            if ($obj_comission[0]->bonus_id == $value->bonus_id) {
                                                                  echo "selected";
                                                            }
                                                         } else {
                                                            echo "";
                                                         }
                                                         ?> value="<?php echo $value->bonus_id; ?>"><?php echo $value->name;?></option>
                                                      <?php } ?>
                                             </select>
                                          </div>                
                                    </div>
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                    <button class="btn btn-danger" type="reset" onclick="cancel_comissions();"><i class="fa fa-arrow-left" aria-hidden="true"></i>Cancelar</button>                    
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
      <script src="<?php echo base_url('js/backoffice/admin/comission.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>