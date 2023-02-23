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
                                 <h5 class="m-b-10">Formulario de Integración de Puntos Binario</h5> 
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard/panel">Panel</a></li>
                                 <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/integracion_puntos';?>">Listado de Integración de Puntos Binario</a></li>
                                 <li class="breadcrumb-item"><a>Integración de Puntos Binario</a></li>
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
                                 <form name="integration-form-points" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="integration_active_points();">
                                       <div class="form-row">
                                       <?php 
                                          if($obj_point_binary){ ?>
                                             <div class="form-group col-md-12">
                                             <div class="form-group">
                                                   <label>ID</label>
                                                   <input class="form-control" type="text" value="<?php echo isset($obj_point_binary[0]->id)?$obj_point_binary[0]->id:null;?>" class="input-xlarge-fluid" placeholder="ID" readonly>
                                             </div>
                                       </div>
                                       <?php  } ?>
                                       <div class="form-group col-md-6">
                                          <div class="form-group">
                                             <label>Usuario</label>
                                             <input class="form-control" onblur="validate_user(this.value);" type="text" id="username" name="username" class="input-xlarge-fluid" placeholder="Ingrese Usuario" required="" value="<?php echo isset($obj_point_binary)?$obj_point_binary[0]->username:"";?>" />
                                             <input type="hidden" id="customer_id" name="customer_id" value="<?php echo isset($obj_point_binary)?$obj_point_binary[0]->customer_id:"";?>">
                                             <input class="form-control" type="hidden" id="points_binary_id" name="points_binary_id" value="<?php echo isset($obj_point_binary[0]->id)?$obj_point_binary[0]->id:"";?>" class="input-xlarge-fluid">
                                             <span class="alert-0"></span>
                                             </div>
                                             <div class="form-group">
                                                <label>Cliente</label>
                                                <input class="form-control" type="text" id="customer" name="customer" class="input-xlarge-fluid" placeholder="Cliente" disabled="" value="<?php echo isset($obj_point_binary)?$obj_point_binary[0]->first_name." ".$obj_point_binary[0]->last_name:"";?>">
                                             </div>
                                             <div class="form-group">
                                                <label>Documento</label>
                                                   <input class="form-control" type="text" id="dni" name="dni" class="input-xlarge-fluid" placeholder="DNI" disabled="" value="<?php echo isset($obj_point_binary)?$obj_point_binary[0]->dni:"";?>">
                                             </div>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <div class="form-group">
                                                <label>Puntos Izquierda</label>
                                                   <input class="form-control" type="number" id="left" name="left" class="input-xlarge-fluid" placeholder="Ingresar Puntos" required="" step="any" value="<?php echo isset($obj_point_binary)?$obj_point_binary[0]->left:"";?>" />
                                          </div>
                                          <div class="form-group">
                                                <label>Puntos Derecha</label>
                                                   <input class="form-control" type="number" id="right" name="right" class="input-xlarge-fluid" placeholder="Ingresar Puntos" required="" step="any" value="<?php echo isset($obj_point_binary)?$obj_point_binary[0]->right:"";?>" />
                                          </div>
                                          <div class="form-group">
                                             <label for="inputState">Estado</label>
                                                   <select name="active" id="active" class="form-control" required="">
                                                   <option value="">[ Seleccionar ]</option>
                                                   <option value="1" <?php if(isset($obj_point_binary)){
                                                         if($obj_point_binary[0]->status == 1){ echo "selected";}
                                                   }else{echo "";} ?>>Activo</option>
                                                   <option value="0" <?php if(isset($obj_point_binary)){
                                                         if($obj_point_binary[0]->status == 0){ echo "selected";}
                                                   }else{echo "";} ?>>Inactivo</option>
                                             </select>
                                          </div>
                                       </div>
                                          <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                          <button class="btn btn-danger" type="reset" onclick="cancel_points();"><i class="fa fa-arrow-left" aria-hidden="true"></i>Cancelar</button>      
                                       </div>
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
      <script src="<?php echo base_url('js/backoffice/admin/integration_points.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>