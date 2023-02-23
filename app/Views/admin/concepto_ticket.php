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
                  <h5 class="m-b-10">Mantenimientos de Concepto de Ticket</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="https://cantech-global.com/dashboard/panel">Panel</a></li>
                  <li class="breadcrumb-item"><a>Concepto de Ticket</a></li>
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
                    <h5>Listado de Concepto de Ticket</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_concep();"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nuevo Concepto</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="zero-configuration_length"><label>Show <select name="zero-configuration_length" aria-controls="zero-configuration" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="zero-configuration_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero-configuration"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row"><th class="sorting_desc" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-sort="descending" aria-label="ID: activate to sort column ascending" style="width: 39.6133px;">ID</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Título: activate to sort column ascending" style="width: 268.539px;">Título</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Fecha: activate to sort column ascending" style="width: 138.285px;">Fecha</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Estado: activate to sort column ascending" style="width: 122.113px;">Estado</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Acciones: activate to sort column ascending" style="width: 113.715px;">Acciones</th></tr>
                              </thead>
                              <tbody>
                                                                   
                                                            
                                                            
                                                            
                                                            
                                                            
                                                          <tr role="row" class="odd">
                                <th class="sorting_1">6</th>
                                <td><h6>Cantech Token</h6></td>
                                <td>19/10/2021</td>
                                <td>
                                                                        <span class="label label-success">Activo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_concept('6');"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="even">
                                <th class="sorting_1">5</th>
                                <td><h6>Otros Conceptos</h6></td>
                                <td>06/10/2021</td>
                                <td>
                                                                        <span class="label label-success">Activo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_concept('5');"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="odd">
                                <th class="sorting_1">4</th>
                                <td><h6>Cobros &amp; Payout</h6></td>
                                <td>06/10/2021</td>
                                <td>
                                                                        <span class="label label-success">Activo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_concept('4');"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="even">
                                <th class="sorting_1">3</th>
                                <td><h6>Comisiones</h6></td>
                                <td>06/10/2021</td>
                                <td>
                                                                        <span class="label label-success">Activo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_concept('3');"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="odd">
                                <th class="sorting_1">2</th>
                                <td><h6>Cambio de Datos</h6></td>
                                <td>06/10/2021</td>
                                <td>
                                                                        <span class="label label-success">Activo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_concept('2');"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="even">
                                <th class="sorting_1">1</th>
                                <td><h6>Membresías y Licencias</h6></td>
                                <td>06/10/2021</td>
                                <td>
                                                                        <span class="label label-success">Activo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_concept('1');"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr></tbody>
                              <tfoot>
                                <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Título</th><th rowspan="1" colspan="1">Fecha</th><th rowspan="1" colspan="1">Estado</th><th rowspan="1" colspan="1">Acciones</th></tr>
                              </tfoot>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero-configuration_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero-configuration_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero-configuration_previous"><a href="#" aria-controls="zero-configuration" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero-configuration" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="zero-configuration_next"><a href="#" aria-controls="zero-configuration" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
 
<script src="<?php echo base_url('js/backoffice/admin/concept_ticket.js'); ?>"></script> 
    <!-- [ Header ] end -->
    <!-- [ Main Content ] end -->
    <?php echo view("admin/footer"); ?>