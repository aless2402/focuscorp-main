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
                                 <h5 class="m-b-10">Facturas</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Facturas</a></li>
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
                                    <h5>Listado de Facturas</h5>
                                 </div>
                                 <div class="card-block">
                                    <div class="table-responsive">
                                       <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                          <div class="row">
                                             <div class="col-sm-12">
                                                <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                   <div class="row">
                                                      <div class="col-sm-12">
                                                         <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                                                            <thead>
                                                            <tr role="row">
                                                               <th class="sorting_asc" tabindex="0">ID</th>
                                                               <th class="sorting" tabindex="0">Usuario</th>
                                                               <th class="sorting" tabindex="0">Cliente</th>
                                                               <th class="sorting" tabindex="0">Financiado</th>
                                                               <th class="sorting" tabindex="0">Plan</th>
                                                               <th class="sorting" tabindex="0">Fecha</th>
                                                               <th class="sorting" tabindex="0">Estado</th>
                                                               <th class="sorting" tabindex="0">Acciones</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                  <?php foreach ($obj_invoices as $key => $value): ?>
                                                                     <td><?php echo $value->invoice_id;?></td>
                                                                     <td><h6><?php echo $value->username;?></h6></td>
                                                                     <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                                                     <td>
                                                                           <?php if ($value->financy == 1) {
                                                                              $valor = "Si";
                                                                              $stilo = "label label-success";
                                                                           }else{
                                                                              $valor = "No";
                                                                              $stilo = "label label-info";
                                                                           }?>
                                                                           <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                                                     </td>
                                                                     <td><h6><?php echo $value->name;?></h6></td>
                                                                     <td><?php echo formato_fecha_barras($value->date);?></td>
                                                                     <td>
                                                                           <?php if ($value->active == 1) {
                                                                              $valor = "Esperando Activación";
                                                                              $stilo = "label label-info";
                                                                           }elseif($value->active == 2){
                                                                              $valor = "Procesado";
                                                                              $stilo = "label label-success";
                                                                           }elseif($value->active == 0){
                                                                              $valor = "Sin Acción";
                                                                              $stilo = "label";
                                                                           }else{
                                                                              $valor = "Cancelado";
                                                                              $stilo = "label label-danger";
                                                                           }?>
                                                                           <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                                                     </td>
                                                                     <td>
                                                                           <div class="operation">
                                                                              <div class="btn-group">
                                                                                 <button type="button" class="btn btn-icon btn-info" onclick="edit_invoices('<?php echo $value->invoice_id;?>');"><i class="fa fa-edit"></i></button>
                                                                              </div>
                                                                           </div>
                                                                     </td>
                                                                  </tr>
                                                                  <?php endforeach; ?>
                                                               </tbody>
                                                            <tfoot>
                                                               <tr>
                                                                  <th rowspan="1" colspan="1">ID</th>
                                                                  <th rowspan="1" colspan="1">Usuario</th>
                                                                  <th rowspan="1" colspan="1">Cliente</th>
                                                                  <th rowspan="1" colspan="1">Financiado</th>
                                                                  <th rowspan="1" colspan="1">Plan</th>
                                                                  <th rowspan="1" colspan="1">Fecha</th>
                                                                  <th rowspan="1" colspan="1">Estado</th>
                                                                  <th rowspan="1" colspan="1">Acciones</th>
                                                               </tr>
                                                            </tfoot>
                                                         </table>
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
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="<?php echo base_url('js/backoffice/admin/invoices.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>