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
                                 <h5 class="m-b-10">Formulario de Activación</h5> 
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard/activaciones">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Activaciones</a></li>
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
                                    <form name="activate-form" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="active();">
                                       <div class="form-row">
                                          <div class="form-group col-md-6">
                                             <div class="form-group">
                                                <label>Usuario</label>
                                                <input class="form-control" onblur="validate_user(this.value);" type="text" id="username" name="username" placeholder="Ingrese Usuario" required="">
                                                <input type="hidden" id="customer_id" name="customer_id">
                                                <span class="alert-0"></span>
                                             </div>
                                             <div class="form-group">
                                                <label>Cliente</label>
                                                <input class="form-control" type="text" id="customer" name="customer" placeholder="Cliente" disabled="">
                                             </div>
                                             <div class="form-group">
                                                <label>Documento</label>
                                                <input class="form-control" type="text" id="dni" name="dni" placeholder="DNI" disabled="">
                                             </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <div class="form-group">
                                                <label for="inputState">Kit</label>
                                                <select name="kit_id" id="kit_id" class="form-control" required="">
                                                      <option value="">[ Seleccionar ]</option>
                                                         <?php foreach ($obj_kit as $value ): ?>
                                                      <option value="<?php echo $value->kit_id;?>">
                                                         <?php echo $value->name." - $".$value->price;?>
                                                      </option>
                                                      <?php endforeach; ?>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Financiada</label>
                                                <select name="financy" id="financy" class="form-control" required="">
                                                   <option value="">[ Seleccionar ]</option>
                                                   <option value="1">Si</option>
                                                   <option value="0">No</option>
                                                </select>
                                             </div>
                                          </div>
                                          <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                          <button class="btn btn-danger" type="reset" onclick="cancel_activate_kit();"><i class="fa fa-arrow-left" aria-hidden="true"></i>Cancelar</button>                    
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
      <script src="<?php echo base_url('js/backoffice/admin/active.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>