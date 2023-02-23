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
                  <h5 class="m-b-10">Mantenimientos de Kit</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="https://cantech-global.com/dashboard/">Panel</a></li>
                  <li class="breadcrumb-item"><a>Kit</a></li>
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
                    <h5>Listado de Kit</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_kit();"><span><span class="pcoded-micon"><i class="fa fa-plus"></i>&nbsp;</span> Nuevo Kit</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="zero-configuration_length"><label>Show <select name="zero-configuration_length" aria-controls="zero-configuration" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="zero-configuration_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero-configuration"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row"><th class="sorting_desc" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-sort="descending" aria-label="ID: activate to sort column ascending" style="width: 20.1016px;">ID</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Nombre: activate to sort column ascending" style="width: 63.8711px;">Nombre</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Precio: activate to sort column ascending" style="width: 81.117px;">Precio</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Puntos: activate to sort column ascending" style="width: 54.6133px;">Puntos</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Tipo: activate to sort column ascending" style="width: 112.523px;">Tipo</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Imagen: activate to sort column ascending" style="width: 112.719px;">Imagen</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Estado: activate to sort column ascending" style="width: 73.5781px;">Estado</th><th class="sorting" rowspan="1" colspan="1" tabindex="0" aria-controls="zero-configuration" aria-label="Acciones: activate to sort column ascending" style="width: 91.742px;">Acciones</th></tr>
                              </thead>
                              <tbody>
                                                         
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                          <tr role="row" class="odd">
                            <th class="sorting_1">12</th>
                            <td>X50000</td>
                            <td>$50,000.00</td>
                            <td>50,000</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/x50000.png" alt="x50000">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('12');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="even">
                            <th class="sorting_1">11</th>
                            <td>X25000</td>
                            <td>$25,000.00</td>
                            <td>25,000</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/x25000.png" alt="x25000">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('11');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="odd">
                            <th class="sorting_1">10</th>
                            <td>X15000</td>
                            <td>$15,000.00</td>
                            <td>15,000</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/x15000.png" alt="X15000">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('10');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="even">
                            <th class="sorting_1">9</th>
                            <td>X50</td>
                            <td>$50.00</td>
                            <td>50</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/50.png" alt="x50">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('9');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="odd">
                            <th class="sorting_1">8</th>
                            <td>X10000</td>
                            <td>$10,000.00</td>
                            <td>10,000</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/10000_2.png" alt="x10000">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('8');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="even">
                            <th class="sorting_1">7</th>
                            <td>X5000</td>
                            <td>$5,000.00</td>
                            <td>5,000</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/5000_2.png" alt="x5000">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('7');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="odd">
                            <th class="sorting_1">5</th>
                            <td>X3000</td>
                            <td>$3,000.00</td>
                            <td>3,000</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/3000_2.png" alt="x3000">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('5');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="even">
                            <th class="sorting_1">4</th>
                            <td>X1000</td>
                            <td>$1,000.00</td>
                            <td>1,000</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/1000_2.png" alt="x1000">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('4');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="odd">
                            <th class="sorting_1">3</th>
                            <td>X500</td>
                            <td>$500.00</td>
                            <td>500</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/500_2.png" alt="x500">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('3');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr><tr role="row" class="even">
                            <th class="sorting_1">2</th>
                            <td>X300</td>
                            <td>$300.00</td>
                            <td>300</td>
                            <td>
                                                                <span class="label label-warning">Inversiones</span>
                            </td>
                            <td>
                                <img width="100" src="https://cantech-global.com/static/backoffice/images/plan/300_2.png" alt="x300">
                            </td>
                            <td>
                                                                <span class="label label-success">Activo</span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_franchise('2');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr></tbody>
                              <tfoot>
                                <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Nombre</th><th rowspan="1" colspan="1">Precio</th><th rowspan="1" colspan="1">Puntos</th><th rowspan="1" colspan="1">Tipo</th><th rowspan="1" colspan="1">Imagen</th><th rowspan="1" colspan="1">Estado</th><th rowspan="1" colspan="1">Acciones</th></tr>
                              </tfoot>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero-configuration_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero-configuration_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero-configuration_previous"><a href="#" aria-controls="zero-configuration" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero-configuration" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero-configuration" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="zero-configuration_next"><a href="#" aria-controls="zero-configuration" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
 
<script src="<?php echo base_url('js/backoffice/admin/kit.js'); ?>"></script>   
    <!-- [ Header ] end -->
    <!-- [ Main Content ] end -->
    <?php echo view("admin/footer"); ?>