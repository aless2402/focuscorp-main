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
                                 <h5 class="m-b-10">Comentarios</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Comentarios</a></li>
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
                                    <h5>Listado de Comentarios</h5>
                                    
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
                                                               <th class="sorting" tabindex="0">Fecha</th>
                                                               <th class="sorting" tabindex="0">Nombres</th>
                                                               <th class="sorting" tabindex="0">E-mail</th>
                                                               <th class="sorting" tabindex="0">Comentario</th>
                                                               <th class="sorting" tabindex="0">Estado</th>
                                                               <th class="sorting" tabindex="0">Acciones</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php foreach ($obj_comments as $value): ?>
                                                            <tr>
                                                            <th><?php echo $value->comment_id;?></th>
                                                            <td><?php echo formato_fecha_barras($value->date_comment);?></td>
                                                            <td><h6><?php echo str_to_first_capital($value->name);?></h6></td>
                                                            <td><?php echo $value->email;?></td>
                                                            <td><?php echo $value->comment;?></td>
                                                            <td>
                                                                  <?php if ($value->active == 0) {
                                                                     $valor = "Leido";
                                                                     $stilo = "label label-success";
                                                                  }else{
                                                                     $valor = "No Leido";
                                                                     $stilo = "label label-danger";
                                                                  } ?>
                                                                  <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
                                                            </td>
                                                            <td>
                                                                  <div class="operation">
                                                                        <div class="btn-group">
                                                                           <?php 
                                                                           if($value->active == 0){ ?>
                                                                                    <button class="btn btn-secondary buttons-copy buttons-html5" onclick="change_state_no('<?php echo $value->comment_id;?>');" tabindex="0" aria-controls="key-act-button" type="button"><span>Marcar como no Contestado</span></button>
                                                                           <?php }else{ ?>
                                                                                    <button class="btn btn-secondary buttons-copy buttons-html5" onclick="change_state('<?php echo $value->comment_id;?>');" tabindex="0" aria-controls="key-act-button" type="button"><span>Marcar como Contestado</span></button>
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
                                                               <th rowspan="1" colspan="1">Nombres</th>
                                                               <th rowspan="1" colspan="1">E-mail</th>
                                                               <th rowspan="1" colspan="1">Comentario</th>
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
      <script src="<?php echo base_url('js/backoffice/admin/comments.js'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>