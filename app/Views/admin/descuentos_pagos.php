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
                  <h5 class="m-b-10">Integración</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="https://cantech-global.com/dashboard/">Panel</a></li>
                  <li class="breadcrumb-item"><a>Descuento de Pagos</a></li>
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
                    <h5>Listado de Descuento de Pagos</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_discount();"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nuevo</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="zero-configuration_length"><label>Show <select name="zero-configuration_length" aria-controls="zero-configuration" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="zero-configuration_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero-configuration"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row"><th class="sorting_desc" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-sort="descending" aria-label="ID: activate to sort column ascending" style="width: 51.5273px;">ID</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Usuario: activate to sort column ascending" style="width: 135.316px;">Usuario</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Cliente: activate to sort column ascending" style="width: 185.766px;">Cliente</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Importe: activate to sort column ascending" style="width: 84.34px;">Importe</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Fecha: activate to sort column ascending" style="width: 91.976px;">Fecha</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Acciones: activate to sort column ascending" style="width: 109.34px;">Acciones</th></tr>
                              </thead>
                              <tbody>
                                                                
                                                            
                                                            
                                                            
                                                            
                                                          <tr role="row" class="odd"><td class="sorting_1">12356</td>
                                <td><b>funes</b></td>
                                <td>Juan carlos  Funes funes</td>
                                <td>
                                  <span class="text-danger">$-200.00</span>
                                </td>
                                <td>20/12/2021</td>
                                <td>
                                  <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_discount('12356');"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="delete_discount('12356');"><i class="fa fa-trash"></i></button>
                                        </div>
                                  </div>
                                </td>    
                            </tr><tr role="row" class="even"><td class="sorting_1">11966</td>
                                <td><b>brandonalvarez</b></td>
                                <td>brandon alvarez</td>
                                <td>
                                  <span class="text-danger">$-500.00</span>
                                </td>
                                <td>15/12/2021</td>
                                <td>
                                  <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_discount('11966');"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="delete_discount('11966');"><i class="fa fa-trash"></i></button>
                                        </div>
                                  </div>
                                </td>    
                            </tr><tr role="row" class="odd"><td class="sorting_1">11965</td>
                                <td><b>rayenalvarez</b></td>
                                <td>Rayen Alvarez</td>
                                <td>
                                  <span class="text-danger">$-300.00</span>
                                </td>
                                <td>15/12/2021</td>
                                <td>
                                  <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_discount('11965');"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="delete_discount('11965');"><i class="fa fa-trash"></i></button>
                                        </div>
                                  </div>
                                </td>    
                            </tr><tr role="row" class="even"><td class="sorting_1">11964</td>
                                <td><b>fabiolarodriguez</b></td>
                                <td>Fabiola Rodriguez</td>
                                <td>
                                  <span class="text-danger">$-1,200.00</span>
                                </td>
                                <td>15/12/2021</td>
                                <td>
                                  <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_discount('11964');"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="delete_discount('11964');"><i class="fa fa-trash"></i></button>
                                        </div>
                                  </div>
                                </td>    
                            </tr><tr role="row" class="odd"><td class="sorting_1">11393</td>
                                <td><b>matiasjorquera</b></td>
                                <td>Matías Jorquera</td>
                                <td>
                                  <span class="text-danger">$-20.00</span>
                                </td>
                                <td>13/12/2021</td>
                                <td>
                                  <div class="operation">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-icon btn-info" onclick="edit_discount('11393');"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="delete_discount('11393');"><i class="fa fa-trash"></i></button>
                                        </div>
                                  </div>
                                </td>    
                            </tr></tbody>
                              <tfoot>
                                <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Usuario</th><th rowspan="1" colspan="1">Cliente</th><th rowspan="1" colspan="1">Importe</th><th rowspan="1" colspan="1">Fecha</th><th rowspan="1" colspan="1">Acciones</th></tr>
                              </tfoot>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero-configuration_info" role="status" aria-live="polite">Showing 1 to 5 of 5 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero-configuration_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero-configuration_previous"><a href="#" aria-controls="zero-configuration" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero-configuration" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="zero-configuration_next"><a href="#" aria-controls="zero-configuration" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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

<script src="<?php echo base_url('js/backoffice/admin/integration_discount.js'); ?>"></script>   
    <!-- [ Header ] end -->
    <!-- [ Main Content ] end -->
    <?php echo view("admin/footer"); ?>