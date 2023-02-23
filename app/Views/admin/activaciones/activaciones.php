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
                                 <h5 class="m-b-10">Activaciones</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
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
                                    <h5>Listado de Activaciones</h5>
                                    <button class="btn btn-secondary" type="button" onclick="new_activate();"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nuevo</span></button>
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
                                                                  <th class="sorting_desc" rowspan="1" colspan="1">ID</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Usuario</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Cliente</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Imagen</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Financiado</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Kit</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Precio</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Fecha</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Estado</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($obj_invoices as $key => $value): ?>
                                                                  <td><?php echo $value->invoice_id;?></td>
                                                                  <td><b><?php echo "@".$value->username;?></b></td>
                                                                  <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                                                  <td>
                                                                      <?php 
                                                                      if($value->img != ""){?>
                                                                      <img id="<?php echo $key;?>" onclick="modal_img(<?php echo $key;?>);" src='<?php echo site_url()."static/backoffice/invoice/$value->img";?>' width="40" alt="imagen" />
                                                                      <?php }else{
                                                                          echo "---";
                                                                      }
                                                                      ?>
                                                                  </td>
                                                                  <td>
                                                                      <?php if ($value->financy == 1) {
                                                                          $valor = "Si";
                                                                          $stilo = "label label-info";
                                                                      }else{
                                                                          $valor = "No";
                                                                          $stilo = "label label-success";
                                                                      }?>
                                                                      <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                                                  </td>
                                                                  <td><?php echo $value->name;?></td>
                                                                  <td><?php echo format_number_dolar($value->price);?></td>
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
                                                              </tr>
                                                              <?php endforeach; ?>
                                                            </tbody>
                                                            <tfoot>
                                                               <tr>
                                                                  <th rowspan="1" colspan="1">ID</th>
                                                                  <th rowspan="1" colspan="1">Usuario</th>
                                                                  <th rowspan="1" colspan="1">Cliente</th>
                                                                  <th rowspan="1" colspan="1">Imagen</th>
                                                                  <th rowspan="1" colspan="1">Financiado</th>
                                                                  <th rowspan="1" colspan="1">Kit</th>
                                                                  <th rowspan="1" colspan="1">Precio</th>
                                                                  <th rowspan="1" colspan="1">Fecha</th>
                                                                  <th rowspan="1" colspan="1">Estado</th>
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
      <script src="<?php echo base_url('js/backoffice/admin/active.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>