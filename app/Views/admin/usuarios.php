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
                  <h5 class="m-b-10">Mantenimientos de Usuario</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="https://cantech-global.com/dashboard/">Panel</a></li>
                  <li class="breadcrumb-item"><a>Usuario</a></li>
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
                    <h5>Listado de Usuario</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_user();"><span><span class="pcoded-micon"><i class="fa fa-plus"></i>&nbsp;</span> Nuevo Usuario</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="zero-configuration_length"><label>Show <select name="zero-configuration_length" aria-controls="zero-configuration" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="zero-configuration_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero-configuration"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row"><th class="sorting_desc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-sort="descending" aria-label="ID: activate to sort column ascending" style="width: 14.5352px;">ID</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 122.152px;">Nombre</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Contraseña: activate to sort column ascending" style="width: 77.895px;">Contraseña</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending" style="width: 250.902px;">E-mail</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Privilegio: activate to sort column ascending" style="width: 96.098px;">Privilegio</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Fecha: activate to sort column ascending" style="width: 74.3008px;">Fecha</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 75.9219px;">Estado</th><th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 80.863px;">Acciones</th></tr>
                              </thead>
                              <tbody>
                                  
                                                                
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                          <tr role="row" class="odd"><td class="sorting_1"><b>8</b></td>
                                <td><h6>Maryan Ramirez</h6></td>
                                <td><b></b></td>
                                <td><h6>maryan.ramirez@cantech-gloabal.com</h6></td>
                                <td>
                                    <b>Control Total</b>                                </td>
                                <td>10/09/2021</td>
                                <td>
                                                                        <span class="label label-danger">Inactivo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_users('8');"><span class="pcoded-micon"><i data-feather="edit"></i></span>  Editar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="even"><td class="sorting_1"><b>7</b></td>
                                <td><h6>Michel Villiers</h6></td>
                                <td><b></b></td>
                                <td><h6>michel.villiers@cantech-global.com</h6></td>
                                <td>
                                    <b>Control Total</b>                                </td>
                                <td>15/08/2021</td>
                                <td>
                                                                        <span class="label label-danger">Inactivo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_users('7');"><span class="pcoded-micon"><i data-feather="edit"></i></span>  Editar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="odd"><td class="sorting_1"><b>6</b></td>
                                <td><h6>Bruno Montero</h6></td>
                                <td><b></b></td>
                                <td><h6>bruno.montero@cantech-global.com</h6></td>
                                <td>
                                    <b>Control Total</b>                                </td>
                                <td>14/08/2021</td>
                                <td>
                                                                        <span class="label label-danger">Inactivo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_users('6');"><span class="pcoded-micon"><i data-feather="edit"></i></span>  Editar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="even"><td class="sorting_1"><b>5</b></td>
                                <td><h6>Lucia Acero</h6></td>
                                <td><b></b></td>
                                <td><h6>lucia.acero@cantech-global.com</h6></td>
                                <td>
                                    <b>Control Total</b>                                </td>
                                <td>14/07/2021</td>
                                <td>
                                                                        <span class="label label-danger">Inactivo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_users('5');"><span class="pcoded-micon"><i data-feather="edit"></i></span>  Editar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="odd"><td class="sorting_1"><b>4</b></td>
                                <td><h6>Erika Santillan</h6></td>
                                <td><b></b></td>
                                <td><h6>erika.santillan@cantech-global.com</h6></td>
                                <td>
                                    <b>Control Total</b>                                </td>
                                <td>14/07/2021</td>
                                <td>
                                                                        <span class="label label-danger">Inactivo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_users('4');"><span class="pcoded-micon"><i data-feather="edit"></i></span>  Editar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="even"><td class="sorting_1"><b>3</b></td>
                                <td><h6>John Mora</h6></td>
                                <td><b>123456789</b></td>
                                <td><h6>john_mora@cantech-global.com</h6></td>
                                <td>
                                    <b>Control Total</b>                                </td>
                                <td>//</td>
                                <td>
                                                                        <span class="label label-success">Activo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_users('3');"><span class="pcoded-micon"><i data-feather="edit"></i></span>  Editar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr><tr role="row" class="odd"><td class="sorting_1"><b>1</b></td>
                                <td><h6>Rolando Contreras</h6></td>
                                <td><b>123456789</b></td>
                                <td><h6>software.contreras@gmail.com</h6></td>
                                <td>
                                    <b>Control Medio</b>                                </td>
                                <td>13/11/2019</td>
                                <td>
                                                                        <span class="label label-success">Activo</span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_users('1');"><span class="pcoded-micon"><i data-feather="edit"></i></span>  Editar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr></tbody>
                              <tfoot>
                                <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Nombre</th><th rowspan="1" colspan="1">Contraseña</th><th rowspan="1" colspan="1">E-mail</th><th rowspan="1" colspan="1">Privilegio</th><th rowspan="1" colspan="1">Fecha</th><th rowspan="1" colspan="1">Estado</th><th rowspan="1" colspan="1">Acciones</th></tr>
                              </tfoot>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero-configuration_info" role="status" aria-live="polite">Showing 1 to 7 of 7 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero-configuration_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero-configuration_previous"><a href="#" aria-controls="zero-configuration" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero-configuration" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="zero-configuration_next"><a href="#" aria-controls="zero-configuration" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
 
<script src="<?php echo base_url('js/backoffice/admin/users.js'); ?>"></script>   
    <!-- [ Header ] end -->
    <!-- [ Main Content ] end -->
    <?php echo view("admin/footer"); ?>