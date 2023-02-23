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
                                 <h5 class="m-b-10">Bonos</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Pagos</a></li>
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
                                    <h5>Listado de Pagos</h5>
                                 </div>
                                 <div class="card-block">
                                    <div class="table-responsive">
                                       <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                          <div class="row">
                                             <div class="col-md-6 col-xl-4">
                                                <div class="card theme-bg bitcoin-wallet">
                                                      <div class="card-block">
                                                         <h5 class="text-white mb-2">Importe a Pagar</h5>
                                                         <h2 class="text-white mb-2 f-w-300"><?php echo format_number_dolar($obj_total[0]->pending_total_pay);?></h2>
                                                         <span class="text-white d-block">Listado de todo los Payout</span>
                                                         <i class="fab fa-btc f-70 text-white"></i>
                                                      </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-12">
                                                <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                   <div class="row">
                                                      <div class="col-sm-12">
                                                         <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                                                            <thead>
                                                               <tr role="row">
                                                                  <th class="sorting_asc" rowspan="1" colspan="1">ID</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Fecha</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Usuario</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Nombres</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Wallet</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Importe</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Tax</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Total</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">País</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Estado</th>
                                                                  <th class="sorting" rowspan="1" colspan="1">Acciones</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php foreach ($obj_pay as $value): ?>
                                                                  <tr>
                                                                     <td><?php echo $value->pay_id;?></td>
                                                                     <td><?php echo formato_fecha_barras($value->date);?></td>
                                                                     <td><b><?php echo "@".$value->username;?></b></td>
                                                                     <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                                                     <td><?php echo $value->usdt;?></td>
                                                                     <td><?php echo format_number_dolar($value->amount);?></td>
                                                                     <td><?php echo format_number_dolar($value->descount);?></td>
                                                                     <td><?php echo format_number_dolar($value->amount_total);?></td>
                                                                     <td><h6><?php echo $value->pais;?></h6></td>
                                                                     <td>
                                                                           <?php if ($value->active == 1) {
                                                                              $valor = "Es espera";
                                                                              $stilo = "label label-warning";
                                                                           }elseif($value->active == 2){
                                                                              $valor = "Pagado";
                                                                              $stilo = "label label-success";
                                                                           }elseif($value->active == 3){
                                                                              $valor = "Cancelado";
                                                                              $stilo = "label label-danger";
                                                                           } ?>
                                                                           <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                                                     </td>
                                                                     <td>
                                                                        <div class="operation">
                                                                           <div class="btn-group">
                                                                              <?php if($value->active == 1){ ?>
                                                                                 <button class="btn btn-success" type="button" onclick="pagado('<?php echo $value->pay_id;?>','<?php echo $value->amount;?>','<?php echo $value->descount;?>','<?php echo $value->amount_total;?>','<?php echo $value->email;?>','<?php echo $value->first_name;?>','<?php echo $value->hash_id;?>');"><span class="pcoded-micon"><i data-feather="dollar-sign"></i></span> Pagado</button>
                                                                                 <button class="btn btn-danger" type="button" onclick="devolver('<?php echo $value->pay_id;?>');"><span class="pcoded-micon"><i data-feather="x-circle"></i></span> Devolver</button>
                                                                                 <button type="button" class="btn btn-icon btn-info" onclick="edit_pay('<?php echo $value->pay_id;?>');"><i class="fa fa-edit"></i></button>
                                                                              <?php }else{ ?>
                                                                                 <button type="button" class="btn btn-icon btn-info" onclick="edit_pay('<?php echo $value->pay_id;?>');"><i class="fa fa-edit"></i></button>
                                                                              <?php } ?>
                                                                           </div>
                                                                        </div>
                                                                     </td>
                                                                  </tr>
                                                                  <?php endforeach; ?>
                                                            </tbody>
                                                            <tfoot>
                                                               <tr>
                                                                  <th rowspan="1" colspan="1">ID</th>
                                                                  <th rowspan="1" colspan="1">Fecha</th>
                                                                  <th rowspan="1" colspan="1">Usuario</th>
                                                                  <th rowspan="1" colspan="1">Nombres</th>
                                                                  <th rowspan="1" colspan="1">Wallet</th>
                                                                  <th rowspan="1" colspan="1">Importe</th>
                                                                  <th rowspan="1" colspan="1">Tax</th>
                                                                  <th rowspan="1" colspan="1">Total</th>
                                                                  <th rowspan="1" colspan="1">País</th>
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
      <script src="<?php echo base_url('js/backoffice/admin/activar_pagos.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>