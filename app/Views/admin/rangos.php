<html>
    
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
                  <h5 class="m-b-10">Mantenimientos de Rangos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/dashboard/">Panel</a></li>
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
                    <h5>Listado de Rangos</h5>
                    <button class="btn btn-secondary" type="button" onclick="update_range();"><span><span class="pcoded-micon"><i class="fa fa-plus"></i>&nbsp;</span> Actualizar Rangos Red</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6">
                              <div class="dataTables_length" id="zero-configuration_length">
                                <label>Show <select name="zero-configuration_length" aria-controls="zero-configuration" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                              </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-6"><div id="zero-configuration_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero-configuration"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row"><th class="sorting_desc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-sort="descending" aria-label="ID: activate to sort column ascending" style="width: 16px;">ID</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 147.719px;">Nombre</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Puntos Personales: activate to sort column ascending" style="width: 124.789px;">Puntos Personales</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Puntos Grupales: activate to sort column ascending" style="width: 111.645px;">Puntos Grupales</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Imagen: activate to sort column ascending" style="width: 89.984px;">Imagen</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 87.094px;">Estado</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 59.3789px;">Acciones</th></tr>
                              </thead>
                              <tbody>
                                                          
                                                         
                                                       
<?php 
    foreach($data as $row => $value){
?>

                        <tr role="row" class="odd">
                            <th class="sorting_1">12</th>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->point_personal; ?></td>
                            <td><?php echo $value->point_grupal; ?></td>
                            <td><img width="90" src="https://cantech-global.com/static/backoffice/images/rangos/crown_ambassador.png" alt="Crown Ambassador"></td>
                            <td>
                              <span class="label label-danger">No Activo</span>
                            </td>
                            <td align="center">
                                <div class="operation">
                                  <div class="btn-group">
                                    <button type="button" class="btn btn-icon btn-info" onclick="edit_ranges('12');"><i class="fa fa-edit"></i></button>
                                        </div>
                                </div>
                            </td>
                        </tr>

                        <!--
                        <tr role="row" class="even">
                            <th class="sorting_1">11</th>
                            <td>Royal Diamond</td>
                            <td>3,000,000</td>
                            <td>3,000,000</td>
                            <td><img width="90" src="https://cantech-global.com/static/backoffice/images/rangos/royal_diamond.png" alt="Royal Diamond"></td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td align="center">
                                <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_ranges('11');"><i class="fa fa-edit"></i></button>
                                        </div>
                                </div>
                            </td>
                        </tr>
    -->

<?php
    }
?>

                      </tbody>
                              <tfoot>
                                <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Nombre</th><th rowspan="1" colspan="1">Puntos Personales</th><th rowspan="1" colspan="1">Puntos Grupales</th><th rowspan="1" colspan="1">Imagen</th><th rowspan="1" colspan="1">Estado</th><th rowspan="1" colspan="1">Acciones</th></tr>
                              </tfoot>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero-configuration_info" role="status" aria-live="polite">Showing 1 to 10 of 17 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero-configuration_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero-configuration_previous"><a href="#" aria-controls="zero-configuration" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero-configuration" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero-configuration" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="zero-configuration_next"><a href="#" aria-controls="zero-configuration" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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

<script src="<?php echo base_url('js/backoffice/admin/ranges.js'); ?>"></script> 
    <!-- [ Header ] end -->
    <!-- [ Main Content ] end -->
    <?php echo view("admin/footer"); ?>