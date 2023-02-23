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
                                 <h5 class="m-b-10">Formulario de Concepto de ticket</h5> 
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Concepto de ticket</a></li>
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
                                    <form name="form-concepto-ticket" enctype="multipart/form-data" method="post" action="javascript:void(0);"; onsubmit="validate();">
                                       <div class="form-row">
                                       <?php 
                                       if(isset($obj_concepto_ticket)){ ?>
                                       <div class="form-group col-md-12">
                                             <div class="form-group">
                                                   <label>ID</label>
                                                   <input class="form-control" type="text" value="<?php echo isset($obj_concepto_ticket[0]->id)?$obj_concepto_ticket[0]->id:null;?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                             </div>
                                       </div>
                                    <?php } ?>
                                    <input type="hidden" id="id" name="id" value="<?php echo isset($obj_concepto_ticket[0]->id)?$obj_concepto_ticket[0]->id:null;?>">
                                       <div class="form-group col-md-6">
                                             <div class="form-group">
                                             <label>Título</label>
                                             <input class="form-control" type="text" id="title" name="title" value="<?php echo isset($obj_concepto_ticket[0]->title)?$obj_concepto_ticket[0]->title:"";?>" class="input-xlarge-fluid" placeholder="Ingrese Título" required="">
                                             </div>
                                       </div>
                                       <div class="form-group col-md-6">
                                             <div class="form-row">
                                             <div class="form-group col-md-12">
                                                   <label for="inputState">Estado</label>
                                                      <select name="status" id="status" class="form-control" required="">
                                                      <option value="">[ Seleccionar ]</option>
                                                         <option value="1" <?php if(isset($obj_concepto_ticket)){
                                                            if($obj_concepto_ticket[0]->status == 1){ echo "selected";}
                                                         }else{echo "";} ?>>Activo</option>
                                                         <option value="0" <?php if(isset($obj_concepto_ticket)){
                                                            if($obj_concepto_ticket[0]->status == 0){ echo "selected";}
                                                         }else{echo "";} ?>>Inactivo</option>
                                                   </select>

                                             </div>
                                          </div>
                                       </div>
                                       </div>
                                             <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                             <button class="btn btn-danger" type="reset" onclick="cancelar_concep();"><i class="fa fa-arrow-left" aria-hidden="true"></i>Cancelar</button>                    
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
      <script src="<?php echo base_url('js/backoffice/admin/concept_ticket.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>