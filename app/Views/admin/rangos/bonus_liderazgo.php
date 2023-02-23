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
                                 <h5 class="m-b-10">Nuevos Rangos</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Nuevos Rangos</a></li>
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
                                    <h5>Listado de Nuevos Rangos</h5>
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
                                                                  <th class="sorting_asc" rowspan="1" colspan="1">ID</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Cliente</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Usuario</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Bono</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Importe</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Fecha</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Estado</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Acciones</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php foreach ($obj_commissions as $value): ?>
                                                               <tr>
                                                                  <th><?php echo $value->customer_id;?></th>
                                                                  <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                                                  <th><?php echo $value->username;?></th>
                                                                  <td><h6><?php echo $value->name;?></h6></td>
                                                                  <td><h6><?php echo "$".format_number_miles($value->amount);?></h6></td>
                                                                  <td><?php echo formato_fecha_dia_mes_anio_abrev($value->date);?></td>
                                                                  <td>
                                                                     <?php if ($value->active == 1) {
                                                                           $valor = "Sin Acción";
                                                                           $stilo = "label label-warning";
                                                                     }else{
                                                                           $valor = "Pagado";
                                                                           $stilo = "label label-success";
                                                                     } ?>
                                                                     <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
                                                                  </td>
                                                                  <td>
                                                                     <?php 
                                                                     if($value->active == 1){  ?>
                                                                        <div class="operation">
                                                                              <div class="btn-group">
                                                                                 <button class="btn btn-success" type="button" onclick="pagado('<?php echo $value->commissions_id;?>');"><span class="pcoded-micon"><i data-feather="dollar-sign"></i></span>Marcar Pagado</button>
                                                                              </div>
                                                                        </div>
                                                                     <?php } ?>
                                                                  </td>
                                                               </tr>
                                                               <?php endforeach; ?>
                                                            </tbody>
                                                            <tfoot>
                                                               <tr>
                                                                  <th>ID</th>
                                                                  <th>Cliente</th>
                                                                  <th>Usuario</th>
                                                                  <th>Bono</th>
                                                                  <th>Importe</th>
                                                                  <th>Fecha</th>
                                                                  <th>Estado</th>
                                                                  <th>Acciones</th>
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
      <script src="<?php echo base_url('js/backoffice/admin/liderazgo.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>