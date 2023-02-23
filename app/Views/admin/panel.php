<!doctype html>
<html>
   <?php echo view("admin/head"); ?>
   <body data-new-gr-c-s-check-loaded="14.1042.0" data-gr-ext-installed="">
      <?php echo view("admin/header"); ?>
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <div class="pcoded-content">
               <div class="pcoded-inner-content">
                  <div class="page-header">
                     <div class="page-block">
                        <div class="row align-items-center">
                           <div class="col-md-12">
                              <div class="page-header-title">
                                 <h5 class="m-b-10">Tablero</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a>Panel General</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="main-body">
                     <div class="page-wrapper">
                        <div class="row">
                           <!-- [ bitcoin-wallet section ] start-->
                           <div class="col-md-6 col-xl-4">
                              <div class="card theme-bg bitcoin-wallet">
                                 <div class="card-block">
                                    <h5 class="text-white mb-2">Total Inversión</h5>
                                    <h2 class="text-white mb-2 f-w-300"><?php echo format_number_dolar($obj_pending[0]->total_invest);?></h2>
                                    <span class="text-white d-block">Capitalización Genex</span>
                                    <i class="fa fa-btc f-70 fa-4x text-white"></i>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-xl-4">
                              <div class="card theme-bg2 bitcoin-wallet">
                                 <div class="card-block">
                                    <h5 class="text-white mb-2">Comisiones Pagadas</h5>
                                    <h2 class="text-white mb-2 f-w-300"><?php echo format_number_dolar($obj_pending[0]->total_pagos);?></h2>
                                    <span class="text-white d-block">Importe de Pagos Realizados</span>
                                    <i class="fa fa-dollar-sign f-70 fa-4x text-white"></i>
                                 </div>
                              </div>
                           </div>
                           <!-- [ comentarios ] start -->
                           <div class="col-md-12 col-xl-4">
                              <div class="card bg-c-blue visitor" style="background: #04a9f5">
                                 <div class="card-block text-center">
                                    <h5 class="text-white m-0">COMENTARIOS</h5>
                                    <h3 class="text-white m-t-20 f-w-300"><?php echo $obj_pending[0]->total_comments;?></h3>
                                    <a href="<?php echo site_url()."/";?>"><span class="text-white"><?php echo $obj_pending[0]->total_comments_pending;?> Pendientes de Responder</span></a>
                                 </div>
                              </div>
                           </div>
                           <!-- Ticket start-->
                           <div class="col-md-12 col-xl-4">
                              <div class="card theme-bg visitor">
                                 <div class="card-block text-center">
                                    <h5 class="text-white m-0">Socios</h5>
                                    <h3 class="text-white m-t-20 f-w-300"><?php echo format_number_miles($obj_pending[0]->total_customer);?></h3>
                                    <span class="text-white">0 Activos por pago</span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-xl-4">
                              <div class="card theme-bg2 bitcoin-wallet">
                                 <div class="card-block">
                                    <h5 class="text-white mb-2">Soporte & Ticket</h5>
                                    <h2 class="text-white mb-2 f-w-300"><?php echo format_number_miles($obj_pending[0]->total_ticket);?></h2> 
                                    <a href="/dashboard/ticket" class="text-white"><span class="text-wh  ite"><?php echo format_number_miles($obj_pending[0]->total_ticket_pending);?> Pendientes de Responder</span></a>
                                    <i class="fa fa-dollar-sign f-70 fa-4x text-white"></i>
                                 </div>
                              </div>
                           </div>
                           <!-- [socios] end-->
                           <div class="col-md-12 col-xl-4">
                              <div class="card theme-bg visitor" style="background: #04a9f5">
                                 <div class="card-block text-center">
                                    <h5 class="text-white m-0">Rangos</h5>
                                    <h3 class="text-white m-t-20 f-w-300"><?php echo format_number_miles($obj_pending[0]->total_users);?></h3>
                                    <a href="/dashboard/nuevos_rangos" class="text-white"><span class="text-white">Nuevos Rangos</span></a>
                                 </div>
                              </div>
                           </div>
                           <!-- [ bitcoin-wallet section ] end-->
                           <div class="col-xl-4 col-md-6">
                              <div class="card user-list">
                                 <div class="card-header">
                                    <h5>Clientes por Membresías <b>(activos)</b></h5>
                                 </div>
                                 <div class="card-block">
                                    <div class="row">
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX100</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_100);?></h6>
                                          <div class="progress m-t-30 m-b-20" style="height: 6px;">
                                             <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX300</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_300);?></h6>
                                          <div class="progress m-t-30 m-b-20" style="height: 6px;">
                                             <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX500</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_500);?></h6>
                                          <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                             <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX1,000</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_1000);?></h6>
                                          <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                             <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX2,000</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_2000);?></h6>
                                          <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                             <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX4,000</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_4000);?></h6>
                                          <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                             <div class="progress-bar" role="progressbar" style="width:100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX8,000</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_8000);?></h6>
                                          <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                             <div class="progress-bar" role="progressbar" style="width:100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX15,000</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_15000);?></h6>
                                          <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                             <div class="progress-bar" role="progressbar" style="width:100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX30,000</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_30000);?></h6>
                                          <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                             <div class="progress-bar" role="progressbar" style="width:100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                       <div class="col-xl-12">
                                          <h6 class="align-items-center float-left"><i class="fas fa-star f-10 m-r-10 text-c-yellow"></i>GX50,000</h6>
                                          <h6 class="align-items-center float-right"><?php echo format_number_miles($obj_pending[0]->total_50000);?></h6>
                                          <div class="progress m-t-30  m-b-20" style="height: 6px;">
                                             <div class="progress-bar" role="progressbar" style="width:100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- [ statistic-line chat ] start -->

                           <div class="col-xl-8 col-md-12">
                              <div class="card">
                              <div class="card-header">
                                 <h5>Socios Nuevos por Mes <b>(activos)</b></h5>
                              </div>
                              <div class="card-block">
                                 <div id="line-area2" class="lineAreaDashboard" style="height: 330px; overflow: hidden; text-align: left;">
                                    <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                                    <div style="overflow: hidden; position: relative; text-align: left; width: 993px; height: 48px; cursor: default;" class="amChartsLegend amcharts-legend-div"><svg version="1.1" style="position: absolute; width: 993px; height: 48px;"><g transform="translate(49,10)"><path cs="100,100" d="M0.5,0.5 L943.5,0.5 L943.5,37.5 L0.5,37.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path><g transform="translate(0,11)"><g cursor="pointer" aria-label="" transform="translate(0,0)"><g><path cs="100,100" d="M0.5,8.5 L32.5,8.5" fill="none" stroke-width="3" stroke-opacity="0.9" stroke="#1de9b6"></path><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#000000" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(17,8)"></circle></g><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(76,7)"> </text><rect x="32" y="0" width="60" height="18" rx="0" ry="0" stroke-width="0" stroke="none" fill="#fff" fill-opacity="0.005"></rect></g><g cursor="pointer" aria-label="" transform="translate(107,0)"><g><path cs="100,100" d="M0.5,8.5 L32.5,8.5" fill="none" stroke-width="3" stroke-opacity="0.9" stroke="#10adf5"></path><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#000000" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(17,8)"></circle></g><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(76,7)"> </text><rect x="32" y="0" width="60" height="18" rx="0" ry="0" stroke-width="0" stroke="none" fill="#fff" fill-opacity="0.005"></rect></g></g></g></svg></div>
                                    <div
                                       style="overflow: hidden; position: relative; text-align: left; width: 993px; height: 282px; padding: 0px; cursor: default;" class="amcharts-chart-div"><svg version="1.1" style="position: absolute; width: 993px; height: 282px; top: 0px; left: 0px;"><g><path cs="100,100" d="M0.5,0.5 L992.5,0.5 L992.5,281.5 L0.5,281.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path><path cs="100,100" d="M0.5,0.5 L943.5,0.5 L943.5,236.5 L0.5,236.5 L0.5,0.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" transform="translate(49,10)"></path></g><g><g transform="translate(49,10)"></g><g transform="translate(49,10)" visibility="visible"><g><path cs="100,100" d="M0.5,236.5 L0.5,236.5 L943.5,236.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,189.5 L0.5,189.5 L943.5,189.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,142.5 L0.5,142.5 L943.5,142.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,94.5 L0.5,94.5 L943.5,94.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,47.5 L0.5,47.5 L943.5,47.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,0.5 L0.5,0.5 L943.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000"></path></g></g></g><g transform="translate(49,10)" clip-path="url(#AmChartsEl-3)"><g visibility="hidden"><g transform="translate(40,0)" visibility="hidden"><rect x="0.5" y="0.5" width="79" height="236" rx="0" ry="0" stroke-width="0" fill="#000000" stroke="#000000" fill-opacity="0" stroke-opacity="0" transform="translate(-40,0)"></rect></g></g></g><g></g><g></g><g></g><g><g transform="translate(49,10)"><g clip-path="url(#AmChartsEl-6)"><path cs="100,100" d="M39.5,231.78 L118.5,208.18 L196.5,212.9 L275.5,184.58 L354.5,194.02 L432.5,175.14 L511.5,179.86 L589.5,137.38 L668.5,160.98 L747.5,132.66 L825.5,123.22 L904.5,94.9 M0,0 L0,0" fill="none" stroke-width="3" stroke-opacity="0.9" stroke="#1de9b6" stroke-linejoin="round"></path></g><g clip-path="url(#AmChartsEl-5)"><path cs="100,100" d="M39.5,231.78 L118.5,208.18 L196.5,212.9 L275.5,184.58 L354.5,194.02 L432.5,175.14 L511.5,179.86 L589.5,137.38 L668.5,160.98 L747.5,132.66 L825.5,123.22 L904.5,94.9 M0,0 L0,0" fill="none" stroke-width="3" stroke-opacity="0.9" stroke="#1de9b6" stroke-linejoin="round"></path></g><clipPath id="AmChartsEl-5"><rect x="0" y="0" width="943" height="236" rx="0" ry="0" stroke-width="0"></rect></clipPath><clipPath id="AmChartsEl-6"><rect x="0" y="236" width="943" height="1" rx="0" ry="0" stroke-width="0"></rect></clipPath><g></g></g><g transform="translate(49,10)"><g clip-path="url(#AmChartsEl-8)"><path cs="100,100" d="M39.5,160.98 L118.5,146.82 L196.5,154.372 L275.5,90.18 L354.5,104.34 L432.5,97.732 L511.5,113.78 L589.5,66.58 L668.5,85.46 L747.5,71.3 L825.5,80.74 L904.5,47.7 M0,0 L0,0" fill="none" stroke-width="3" stroke-opacity="0.9" stroke="#10adf5" stroke-linejoin="round"></path></g><g clip-path="url(#AmChartsEl-7)"><path cs="100,100" d="M39.5,160.98 L118.5,146.82 L196.5,154.372 L275.5,90.18 L354.5,104.34 L432.5,97.732 L511.5,113.78 L589.5,66.58 L668.5,85.46 L747.5,71.3 L825.5,80.74 L904.5,47.7 M0,0 L0,0" fill="none" stroke-width="3" stroke-opacity="0.9" stroke="#10adf5" stroke-linejoin="round"></path></g><clipPath id="AmChartsEl-7"><rect x="0" y="0" width="943" height="236" rx="0" ry="0" stroke-width="0"></rect></clipPath><clipPath id="AmChartsEl-8"><rect x="0" y="236" width="943" height="1" rx="0" ry="0" stroke-width="0"></rect></clipPath><g></g></g></g><g></g><g><path cs="100,100" d="M0.5,236.5 L943.5,236.5 L943.5,236.5" fill="none" stroke-width="1" stroke-opacity="0.2" stroke="#000000" transform="translate(49,10)"></path><g><path cs="100,100" d="M0.5,0.5 L943.5,0.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(49,246)"></path></g><g><path cs="100,100" d="M0.5,0.5 L0.5,236.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(49,10)" visibility="visible"></path></g></g><g><g transform="translate(49,10)" style="pointer-events: none;" clip-path="url(#AmChartsEl-4)"><path cs="100,100" d="M0.5,0.5 L943.5,0.5 L943.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.3" stroke="#000000" visibility="hidden" transform="translate(0,185)"></path></g><clipPath id="AmChartsEl-4"><rect x="0" y="0" width="943" height="236" rx="0" ry="0" stroke-width="0"></rect></clipPath></g><g></g><g><g transform="translate(49,10)"><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(39,231) scale(1)" aria-label=" Jan 5"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(118,208)" aria-label=" Feb 30"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(196,212) scale(1)" aria-label=" Mar 25"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(275,184) scale(1)" aria-label=" Apr 55"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(354,194) scale(1)" aria-label=" May 45"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(432,175) scale(1)" aria-label=" Jun 65"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(511,179) scale(1)" aria-label=" Jul 60"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(589,137) scale(1)" aria-label=" Aug 105"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(668,160) scale(1)" aria-label=" Sep 80"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(747,132)" aria-label=" Oct 110"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(825,123)" aria-label=" Nov 120"></circle><circle r="4" cx="0" cy="0" fill="#1de9b6" stroke="#1de9b6" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(904,94)" aria-label=" Dec 150"></circle></g><g transform="translate(49,10)"><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(39,160) scale(1)" aria-label=" Jan 80"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(118,146)" aria-label=" Feb 95"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(196,154) scale(1)" aria-label=" Mar 87"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(275,90) scale(1)" aria-label=" Apr 155"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(354,104) scale(1)" aria-label=" May 140"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(432,97) scale(1)" aria-label=" Jun 147"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(511,113) scale(1)" aria-label=" Jul 130"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(589,66) scale(1)" aria-label=" Aug 180"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(668,85) scale(1)" aria-label=" Sep 160"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(747,71)" aria-label=" Oct 175"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(825,80)" aria-label=" Nov 165"></circle><circle r="4" cx="0" cy="0" fill="#10adf5" stroke="#10adf5" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(904,47)" aria-label=" Dec 200"></circle></g></g><g><g></g></g><g><g transform="translate(49,10)" visibility="visible"><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(39,253.5)"><tspan y="6" x="0">Jan</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(118,253.5)"><tspan y="6" x="0">Feb</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(196,253.5)"><tspan y="6" x="0">Mar</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(275,253.5)"><tspan y="6" x="0">Apr</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(354,253.5)"><tspan y="6" x="0">May</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(432,253.5)"><tspan y="6" x="0">Jun</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(511,253.5)"><tspan y="6" x="0">Jul</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(589,253.5)"><tspan y="6" x="0">Aug</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(668,253.5)"><tspan y="6" x="0">Sep</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(747,253.5)"><tspan y="6" x="0">Oct</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(825,253.5)"><tspan y="6" x="0">Nov</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(904,253.5)"><tspan y="6" x="0">Dec</tspan></text></g><g transform="translate(49,10)" visibility="visible"><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,235)"><tspan y="6" x="0">0</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,188)"><tspan y="6" x="0">50</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,141)"><tspan y="6" x="0">100</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,93)"><tspan y="6" x="0">150</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,46)"><tspan y="6" x="0">200</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,-1)"><tspan y="6" x="0">250</tspan></text></g></g><g></g><g transform="translate(49,10)"></g><g></g><g></g><clipPath id="AmChartsEl-3"><rect x="-1" y="-1" width="945" height="238" rx="0" ry="0" stroke-width="0"></rect></clipPath></svg>
                                    </div>
                                 </div>
                              </div>
                              </div>
                           </div>
                          
                           <!-- [ statistic-line chat ] end -->
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
            $(document).ready(function() {
            	var chart = AmCharts.makeChart("line-area2", {
            		"type": "serial",
            		"theme": "light",
            		"marginTop": 10,
            		"marginRight": 0,
            		"dataProvider": [{
            			"year": "Ene",
            			"value2": <?php echo $obj_pending[0]->total_ene;?>,
            		},
            		{
            			"year": "Feb",
            			"value2": <?php echo $obj_pending[0]->total_feb;?>,
            		},
            		{
            			"year": "Mar",
            			"value2": <?php echo $obj_pending[0]->total_mar;?>,
            		},
            		{
            			"year": "Abr",
            			"value2": <?php echo $obj_pending[0]->total_abr;?>,
            		},
            		{
            			"year": "May",
            			"value2": <?php echo $obj_pending[0]->total_may;?>,
            		},
            		{
            			"year": "Jun",
            			"value2": <?php echo $obj_pending[0]->total_jun;?>,
            		},
            		{
            			"year": "Jul",
            			"value2": <?php echo $obj_pending[0]->total_jul;?>,
            		},
            		{
            			"year": "Ago",
            			"value2": <?php echo $obj_pending[0]->total_ago;?>,
            		},
            		{
            			"year": "Sep",
            			"value2": <?php echo $obj_pending[0]->total_set;?>,
            		},
            		{
            			"year": "Oct",
            			"value2": <?php echo $obj_pending[0]->total_oct;?>,
            		},
            		{
            			"year": "Nov",
            			"value2": <?php echo $obj_pending[0]->total_nov;?>,
            		},
            		{
            			"year": "Dic",
            			"value2": <?php echo $obj_pending[0]->total_dic;?>,
            		}],
            		"valueAxes": [{
            			"axisAlpha": 0,
            			"position": "left"
            		}],
            		"graphs": [{
            			"id": "g1",
            			"balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
            			"bullet": "round",
            			"lineColor": "#1de9b6",
            			"lineThickness": 3,
            			"negativeLineColor": "#1de9b6",
            			"valueField": "value"
            		},
            		{
            			"id": "g2",
            			"balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
            			"bullet": "round",
            			"lineColor": "#10adf5",
            			"lineThickness": 3,
            			"negativeLineColor": "#10adf5",
            			"valueField": "value2"
            		}],
            		"chartCursor": {
            			"cursorAlpha": 0,
            			"valueLineEnabled": true,
            			"valueLineBalloonEnabled": true,
            			"valueLineAlpha": 0.3,
            			"fullWidth": true
            		},
            		
            		"categoryField": "year",
            		"categoryAxis": {
            			"minorGridAlpha": 0,
            			"minorGridEnabled": true,
            			"gridAlpha": 0,
            			"axisAlpha": 0,
            			"lineAlpha": 0
            		},
            		
            		"legend": {
            			"useGraphSettings": true,
            			"position": "top"
            		},
            		
            	});
            });
         </script>
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>