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
                                 <h5 class="m-b-10">Formulario de Planes</h5>  
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Planes</a></li>
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
                                 <form name="form-kit" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="validate_kit();">
                                       <div class="form-row">
                                          <div class="form-group col-md-12">
                                             <?php 
                                             if(isset($obj_kit)){ ?>
                                                <div class="form-group">
                                                      <label>ID</label>
                                                      <input class="form-control" type="text" value="<?php echo isset($obj_kit[0]->kit_id)?$obj_kit[0]->kit_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                      <input type="hidden" id="kit_id" name="kit_id" value="<?php echo isset($obj_kit[0]->kit_id)?$obj_kit[0]->kit_id:"";?>">
                                                </div>
                                          <?php } ?>
                                          </div>
                                       <div class="form-group col-md-6">
                                             <div class="form-group">
                                                   <label>Nombre</label>
                                                   <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_kit[0]->name)?$obj_kit[0]->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
                                             </div>
                                             <div class="form-group">
                                                   <label>Precio</label>
                                                   <input class="form-control" type="text" id="price" name="price" value="<?php echo isset($obj_kit[0]->price)?$obj_kit[0]->price:"";?>" class="input-xlarge-fluid" placeholder="Precio">
                                             </div>
                                                <div class="form-group">
                                                      <label>Puntos</label>
                                                      <input class="form-control" type="text" id="point" name="point" value="<?php echo isset($obj_kit[0]->point)?$obj_kit[0]->point:"";?>" class="input-xlarge-fluid" placeholder="Puntos">
                                             </div>
                                             <div class="form-group">
                                                      <label>Descripción</label>
                                                      <textarea class="form-control" name="description" id="" placeholder="Descripción" style="height: 200px;width: 100% !important" placeholder="Descripcion"><?php echo isset($obj_kit[0]->description)?$obj_kit[0]->description:"";?></textarea>
                                             </div>
                                          </div>
                                       <div class="form-group col-md-6">
                                             <?php 
                                                /*if(isset($obj_kit)){ ?>
                                                   <div class="form-group">
                                                         <label>Imagen Actual</label><br/>
                                                         <img src='<?php echo site_url()."static/backoffice/images/plan/$obj_kit->img";?>' width="100" />
                                                         <input type="hidden" name="img2" id="img2" value="<?php echo isset($obj_kit)?$obj_kit->img:"";?>">
                                                   </div>
                                          <?php } */?>
                                             <!--div class="form-group">
                                                   <label>Imagen</label>
                                                   <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="validatedCustomFile" value="Upload Imagen de Envio" name="image_file" id="image_file">
                                                      <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                   </div>
                                             </div-->
                                             <div class="form-group">
                                                   <label for="inputState">Tipo</label>
                                                   <select class="form-control" name="type" id="type" required="">
                                                            <option value="">[ Seleccionar ]</option>
                                                            <option value="1" <?php if(isset($obj_kit)){
                                                               if($obj_kit[0]->type == 1){ echo "selected";}
                                                            }else{echo "";} ?>>CryptoPool</option>
                                                            <option value="2" <?php if(isset($obj_kit)){
                                                               if($obj_kit[0]->type == 2){ echo "selected";}
                                                            }else{echo "";} ?>>Inmobiliario</option>
                                                   </select>
                                             </div>
                                             <div class="form-group">
                                                   <label for="inputState">Estado</label>
                                                   <select class="form-control" name="active" id="active" required="">
                                                            <option value="">[ Seleccionar ]</option>
                                                            <option value="0" <?php if(isset($obj_kit)){
                                                               if($obj_kit[0]->active == 0){ echo "selected";}
                                                            }else{echo "";} ?>>Inactivo</option>
                                                            <option value="1" <?php if(isset($obj_kit)){
                                                               if($obj_kit[0]->active == 1){ echo "selected";}
                                                            }else{echo "";} ?>>Activo</option>
                                                   </select>
                                             </div>
                                       </div>
                                       </div>
                                       <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                       <button class="btn btn-danger" type="reset" onclick="cancel_kit();"><i class="fa fa-arrow-left" aria-hidden="true"></i>Cancelar</button>                    
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
      <script src="<?php echo base_url('js/backoffice/admin/kit.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>