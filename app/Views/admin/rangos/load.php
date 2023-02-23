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
                                 <h5 class="m-b-10">Formulario de Rangos</h5> 
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li> 
                                 <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/rangos';?>">Listado de Rangos</a></li>
                                 <li class="breadcrumb-item"><a>Rangos</a></li>
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
                                 <form enctype="multipart/form-data" name="form-rangos" method="post" action="javascript:void(0);" onsubmit="validate();">
                                       <div class="form-row">
                                          <div class="form-group col-md-12">
                                                <div class="form-group">
                                                      <label>ID</label>
                                                      <input class="form-control" type="text" value="<?php echo isset($obj_ranges[0]->range_id)?$obj_ranges[0]->range_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                      <input type="hidden" id="range_id" name="range_id" value="<?php echo isset($obj_ranges[0]->range_id)?$obj_ranges[0]->range_id:"";?>">
                                                </div>
                                          </div>
                                       <div class="form-group col-md-6">
                                             <div class="form-group">
                                                   <label>Nombre</label>
                                                   <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_ranges[0]->name)?$obj_ranges[0]->name:"";?>" class="input-xlarge-fluid" require>
                                             </div>
                                             <div class="form-group">
                                                   <label>Puntos Personales</label>
                                                   <input class="form-control" type="text" id="point_personal" name="point_personal" value="<?php echo isset($obj_ranges[0]->point_personal)?$obj_ranges[0]->point_personal:0;?>" class="input-xlarge-fluid" placeholder="Puntos" require>
                                             </div>
                                             <div class="form-group">
                                                   <label>Puntos Grupales</label>
                                                   <input class="form-control" type="text" id="point_grupal" name="point_grupal" value="<?php echo isset($obj_ranges[0]->point_grupal)?$obj_ranges[0]->point_grupal:0;?>" class="input-xlarge-fluid" placeholder="Puntos">
                                             </div>
                                          </div>
                                       <div class="form-group col-md-6">
                                             <div class="form-group">
                                                   <label for="inputState">Estado</label>
                                                   <select class="form-control" name="active" id="active" require>
                                                            <option value="1" <?php if($obj_ranges[0]->active == 1){ echo "selected";}?>>Activo</option>
                                                            <option value="0" <?php if($obj_ranges[0]->active == 0){ echo "selected";}?>>Inactivo</option>
                                                   </select>
                                             </div>
                                       </div>
                                       </div>
                                       <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                       <button class="btn btn-danger" type="reset" onclick="cancel_ranges();"><i class="fa fa-arrow-left" aria-hidden="true"></i>Cancelar</button>                    
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
      <script src="<?php echo base_url('js/backoffice/admin/ranges.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>