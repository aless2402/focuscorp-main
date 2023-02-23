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
                                 <h5 class="m-b-10">KYC Verificados</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>KYC Verificados</a></li>
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
                                    <h5>Listado de Usuarios</h5>
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
                                                                  <th rowspan="1" colspan="1">ID</th>
                                                                  <th rowspan="1" colspan="1">Fecha</th>
                                                                  <th rowspan="1" colspan="1">Usuario</th>
                                                                  <th rowspan="1" colspan="1">Nombres</th>
                                                                  <th rowspan="1" colspan="1">DNI</th>
                                                                  <th rowspan="1" colspan="1">Teléfono</th>
                                                                  <th rowspan="1" colspan="1">Dirección</th>
                                                                  <th rowspan="1" colspan="1">Anverso</th>
                                                                  <th rowspan="1" colspan="1">Reverso</th>
                                                                  <th rowspan="1" colspan="1">Estado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($obj_customer as $value): ?>
                                                               <tr>
                                                                  <th><?php echo $value->customer_id;?></th>
                                                                  <td><?php echo formato_fecha_barras($value->date);?></td>
                                                                  <td><h6><?php echo $value->username;?></h6></td>
                                                                  <td><h6><?php echo $value->first_name."<br/>".$value->last_name;?></h6></td>
                                                                  <td><span class="text-c-purple ml-3"><?php echo $value->dni;?></span></td>
                                                                  <td><?php echo $value->phone;?></td>
                                                                  <td><?php echo $value->address;?></td>
                                                                  <td>
                                                                     <a href="<?php echo site_url() . "kyc/$value->customer_id"."/".$value->anverso;?>" data-lightbox="roadtrip">
                                                                        <i class="fa fa-eye fa-2x"></i>
                                                                     </a>
                                                                  </td>
                                                                  <td>
                                                                     <a href="<?php echo site_url() . "kyc/$value->customer_id"."/".$value->reverso;?>" data-lightbox="roadtrip">
                                                                        <i class="fa fa-eye fa-2x"></i>
                                                                     </a>
                                                                  </td>
                                                                  <td>
                                                                        <?php if ($value->kyc == 1) {
                                                                           $valor = "Pendiente";
                                                                           $stilo = "label label-warning";
                                                                        }else{
                                                                           $valor = "Verificado";
                                                                           $stilo = "label label-success";
                                                                        } ?>
                                                                        <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
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
      <script src="<?php echo base_url('js/backoffice/admin/kyc.js?123'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>