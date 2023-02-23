<!DOCTYPE html>
<html lang="en">
<?php echo view("admin/head"); ?>
<body style="display: none">
    <div class="layout">
        <?php echo view("admin/nav"); ?>
        <div class="wrapper">
            <?php echo view("admin/header"); ?>
            <style>
            .mask.full,
            .circle .fill {
                animation: fill ease-in-out 3s;
                transform: rotate(<?php echo $grade;?>deg);
            }
            
            @keyframes fill{
                0% {
                transform: rotate(0deg);
                }
                100% {
                transform: rotate(<?php echo $grade;?>deg);
                }
            }
        </style>
            <main class="main">
                <div data-script="dashboardAnalytics" class="page">
                    <!-- BEGIN: Page Header -->
                    <div class="page__header flex flex-wrap gap-5 justify-between">
                        <div class="page__title">
                            <h1 class="page__title__text">Panel</h1>
                        </div>
                    </div>
                    <!-- END: Page Header -->
                    <!-- BEGIN: Page  Body -->
                    <div class="page__body">
                        <!-- BEGIN: Summary -->
                        <div class="card">
                            <div class="grid grid-cols-2 md:grid-cols-4">
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 border-b border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-green-100 to-green-200 rounded-b border-b-2 border-green-100 text-green-600 shadow-sm">
                                            <i data-icon="feather__creditCard"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Ganancia Total</span>
                                        <span class="text-2xl font-bold">$<?php echo format_number_miles_decimal($total_comissions);?></span>
                                    </span>
                                    <span id="subscriptionChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 border-b md:border-b-0 border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-info-100 to-info-200 rounded-b border-b-2 border-info-100 text-info-600 shadow-sm">
                                            <i data-icon="feather__creditCard"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Ganancia Disponible</span>
                                        <span class="text-2xl font-bold">$<?php echo format_number_miles_decimal($total_disponible);?></span>
                                    </span>
                                    <span id="totalVisitorChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 border-b md:border-b-0 border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-indigo-100 to-indigo-200 rounded-b border-b-2 border-indigo-100 text-indigo-600 shadow-sm">
                                            <i data-icon="feather__creditCard"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Rentabilidad</span>
                                        <span class="text-2xl font-bold">$<?php echo format_number_miles_decimal($total_pagos_diarios);?></span>
                                    </span>
                                    <span id="newUserChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-blue-100 to-blue-200 rounded-b border-b-2 border-blue-100 text-blue-600 shadow-sm">
                                            <i data-icon="feather__userCheck"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Licencia Adquirida</span>
                                        <span class="text-2xl font-bold"><?php echo $obj_customer[0]->kit;?></span>
                                    </span>
                                    <span id="newVisitorChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                
                            </div>
                        </div>
                        <!-- END: Summary -->
                        <!-- BEGIN: Other Sections -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 2xl:grid-cols-4 gap-8 items-start xl:items-stretch mt-8">
                            <!-- BEGIN: Active User -->
                            <div class="card order-last xl:order-none">
                                <div class="card__header">
                                    <h3 class="text-lg font-bold">Porcentaje de Ganancias</h3>
                                </div>
                                <div class="card__body">
                                    <div class="circle-wrap">
                                        <div class="circle">
                                        <div class="mask full">
                                            <div class="fill"></div>
                                        </div>
                                        <div class="mask half">
                                            <div class="fill"></div>
                                        </div>
                                        <div class="inside-circle"> <?php echo $percent_cicle;?>% </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-9 mt-5">
                                        <div class="text-center border-r">
                                            <span class="text-sm text-gray-400">Faltan $<?php echo format_number_miles($missing);?> para $<?php echo format_number_miles($tope_amount);?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Active User -->
                            <!-- Enlace Referido-->
                            <div class="bg-gradient-to-br from-primary-600 to-primary-400 shadow rounded flex md:flex-col xl:flex-row md:w-1/2 xl:w-full md:gap-10 xl:relative">
                                <div class="flex-1 min-w-0 p-lg">
                                    <div class="text-xl font-semibold text-white">Enlace de Referido</div>
                                    <p class="text-sm mb-5 w-2/3 pr-3 text-primary-200">Gana comisiones con nuestro plan de recompensas.</p>
                                    <label class="form-control">
                                        <input id="kt_referral_link_input" type="text" value="<?php echo site_url()."registro/".$obj_customer[0]->username;?>" readonly>
                                    </label>
                                    <br/>
                                    <button class="button button--soft scheme-primary" id="kt_referral_program_link_copy_btn" onclick='copy("<?php echo site_url()."registro/".$obj_customer[0]->username;?>")' class="btn btn-block btn-light btn-active-light-primary fw-bold flex-shrink-0">Copiar Enlace</button>
                                </div>
                                <div class="flex justify-end self-end w-1/3 md:w-3/5 md:self-center xl:w-36 xl:absolute bottom-0 right-3 overflow-hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="649.67538" height="516.23162" viewBox="0 0 649.67538 516.23162" xmlns:xlink="http://www.w3.org/1999/xlink" class="text-primary-600 w-full h-auto mt-5 translate-y-1"><path d="M759.79588,701.91485c-8.99256-7.59865-14.45479-19.60227-13.02232-31.28789s10.30472-22.42829,21.81332-24.90978,24.62761,4.38768,28.12315,15.62987c1.92376-21.6745,4.14055-44.25714,15.66409-62.715,10.43429-16.71314,28.50667-28.672,48.09305-30.81147s40.20832,5.941,52.42363,21.40027,15.20618,37.93388,6.6509,55.68241c-6.30238,13.07474-17.91359,22.80511-30.07923,30.72128a194.12948,194.12948,0,0,1-132.77224,29.04621" transform="translate(-275.16231 -191.88419)" fill="#f2f2f2"></path><path d="M893.52217,574.20948a317.62446,317.62446,0,0,0-44.26411,43.95415,318.55051,318.55051,0,0,0-49.85571,83.314c-.89774,2.19991,2.67454,3.15752,3.56229.98208a316.7584,316.7584,0,0,1,93.16976-125.638c1.8443-1.5018-.78314-4.10164-2.61223-2.61223Z" transform="translate(-275.16231 -191.88419)" fill="#fff"></path><path d="M434,707.11581H383a6.50745,6.50745,0,0,1-6.5-6.5v-106a6.50745,6.50745,0,0,1,6.5-6.5h51a6.50745,6.50745,0,0,1,6.5,6.5v106A6.50745,6.50745,0,0,1,434,707.11581Z" transform="translate(-275.16231 -191.88419)" fill="currentColor"></path><path d="M555.00008,708.11581h-51a7.50836,7.50836,0,0,1-7.5-7.5v-206a7.50836,7.50836,0,0,1,7.5-7.5h51a7.50836,7.50836,0,0,1,7.5,7.5v206A7.50836,7.50836,0,0,1,555.00008,708.11581Zm-51-219a5.50623,5.50623,0,0,0-5.5,5.5v206a5.50622,5.50622,0,0,0,5.5,5.5h51a5.50622,5.50622,0,0,0,5.5-5.5v-206a5.50622,5.50622,0,0,0-5.5-5.5Z" transform="translate(-275.16231 -191.88419)" fill="#3f3d56"></path><path d="M676.00008,708.11581h-51a7.50836,7.50836,0,0,1-7.5-7.5v-337a7.50836,7.50836,0,0,1,7.5-7.5h51a7.50836,7.50836,0,0,1,7.5,7.5v337A7.50836,7.50836,0,0,1,676.00008,708.11581Zm-51-350a5.50623,5.50623,0,0,0-5.5,5.5v337a5.50622,5.50622,0,0,0,5.5,5.5h51a5.50622,5.50622,0,0,0,5.5-5.5v-337a5.50622,5.50622,0,0,0-5.5-5.5Z" transform="translate(-275.16231 -191.88419)" fill="#3f3d56"></path><path d="M798.12948,707.61581h-51a6.50753,6.50753,0,0,1-6.5-6.5v-475a6.50753,6.50753,0,0,1,6.5-6.5h51a6.50753,6.50753,0,0,1,6.5,6.5v475A6.50753,6.50753,0,0,1,798.12948,707.61581Z" transform="translate(-275.16231 -191.88419)" fill="currentColor"></path><path d="M480.94169,414.24247a10.05581,10.05581,0,0,0-10.48188-11.30867L452.6832,370.32469l-4,14,12.17889,29.88574a10.11027,10.11027,0,0,0,20.0796.032Z" transform="translate(-275.16231 -191.88419)" fill="#a0616a"></path><polygon points="68.816 351.113 78.717 358.342 111.312 323.589 96.698 312.92 68.816 351.113" fill="#a0616a"></polygon><path d="M335.82708,548.54689H374.3578a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H350.71393a14.88686,14.88686,0,0,1-14.88686-14.88686v0A0,0,0,0,1,335.82708,548.54689Z" transform="translate(38.89227 1022.53744) rotate(-143.86855)" fill="#2f2e41"></path><polygon points="121.201 389.377 133.461 389.376 139.293 342.088 121.199 342.089 121.201 389.377" fill="#a0616a"></polygon><path d="M393.73673,577.75756h38.53073a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H408.62359a14.88686,14.88686,0,0,1-14.88686-14.88686v0A0,0,0,0,1,393.73673,577.75756Z" transform="translate(550.8686 978.49895) rotate(179.99738)" fill="#2f2e41"></path><path d="M433.1832,396.82469s6,58-9,98l-11,76h-19l2-90-7-80S403.1832,364.82469,433.1832,396.82469Z" transform="translate(-275.16231 -191.88419)" fill="#2f2e41"></path><polygon points="93.021 208.94 113.021 277.94 74.021 339.94 93.521 356.44 138.021 286.94 125.021 201.94 93.021 208.94" fill="#2f2e41"></polygon><circle cx="144.02483" cy="29.6531" r="24.56103" fill="#a0616a"></circle><path d="M398.6832,255.32469s15-10,32,12l4.5,138.5s-13-18-40-1-33-2-33-2S343.1832,259.82469,398.6832,255.32469Z" transform="translate(-275.16231 -191.88419)" fill="#ccc"></path><path d="M429.47327,266.9755h0a17.50586,17.50586,0,0,1,16.53679,16.56026l3.1731,60.28892,21,57-12,10-39-68-7.98473-55.89313A17.50587,17.50587,0,0,1,429.47327,266.9755Z" transform="translate(-275.16231 -191.88419)" fill="#ccc"></path><path d="M401.14009,239.96055c4.01526,4.27712,11.47215,1.98106,11.99535-3.86208a7.05905,7.05905,0,0,0-.00889-1.36328c-.27013-2.58827-1.76543-4.9381-1.40725-7.67094a4.02264,4.02264,0,0,1,.7362-1.88313c3.19965-4.28461,10.71059,1.9164,13.73032-1.96233,1.85163-2.37835-.32494-6.12294,1.096-8.78115,1.87537-3.5084,7.43013-1.7777,10.91355-3.69907,3.87574-2.13777,3.64392-8.08425,1.09265-11.7012-3.11139-4.411-8.56664-6.76475-13.95392-7.104s-10.73745,1.11709-15.767,3.07715c-5.71454,2.227-11.38133,5.3048-14.898,10.32961-4.27662,6.11072-4.68817,14.326-2.54936,21.47132C393.42083,231.15805,397.8612,236.46783,401.14009,239.96055Z" transform="translate(-275.16231 -191.88419)" fill="#2f2e41"></path><path d="M923.647,707.69147H276.353a1.19069,1.19069,0,0,1,0-2.38137H923.647a1.19069,1.19069,0,0,1,0,2.38137Z" transform="translate(-275.16231 -191.88419)" fill="#3f3d56"></path></svg>
                                </div>
                                
                            </div>
                            <!-- Equipo -->
                            <div class="card order-4 2xl:order-none">
                                <div class="card__header">
                                    <h3 class="text-lg font-bold">Equipo</h3>
                                </div>
                                <div class="card__body">
                                    <div class="grid grid-cols-2 gap-y-5">
                                        <div class="text-sm text-gray-400">Socios</div>
                                        <div class="text-sm text-gray-400 text-right">%</div>
                                        <div class="font-bold">Directos</div>
                                        <div class="text-right"><?php echo format_number_miles($obj_customer[0]->total_referred);?></div>
                                        <div class="font-bold">Izquierda</div>
                                        <div class="text-right"><?php echo format_number_miles($total_partner_left);?></div>
                                        <div class="font-bold">Derecha</div>
                                        <div class="text-right"><?php echo format_number_miles($total_partner_right);?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Carrera -->
                            <div class="flex-1 card">
                                <div class="card__header">
                                    <h3 class="text-lg font-bold">
                                        Carrera
                                    </h3>
                                    <a href="<?php echo site_url()."backoffice/carrera"?>" class="text-primary-500 hover:text-primary-400 inline-flex items-center">
                                        Ver Más
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 icon icon--feather"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                </div>
                                <div class="card__body items-center">
                                    <div class="py-2 text-center items-center">
                                        <img class="text-center items-center" src="<?php echo base_url('img/rangos/'.$obj_customer[0]->img);?>" alt="Rango" style="margin:auto" width="50">
                                    </div>
                                    <div class="text-2xl text-center">
                                        <b><?php echo $obj_ranges[0]->name?></b>
                                    </div>
                                    <div class="text-sm text-center">
                                        Rango Actual
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="py-3 text-center">
                                        <span class="text-2xl font-bold"><?php echo format_number_miles($point);?> pts</span>
                                    </div>
                                    <div class="text-sm text-center">
                                        Próximo Rango: <span class="font-bold"><?php echo $obj_ranges[0]->next_range_name?></span><br/>
                                        <?php echo format_number_miles($point);?> de <?php echo format_number_miles($obj_ranges[0]->next_range_point);?>
                                    </div>
                                    <div class="space-y-5">
                                    <span class="font-bold w-10"></span>
                                        <div class="flex items-center gap-5 text-sm">
                                            <div class="flex-1 rounded-full bg-gray-200">
                                                <div class="rounded-full bg-primary-400 h-2" style="width: <?php echo $percent;?>%"></div>
                                            </div>
                                            <span class="w-8"><?php echo $percent;?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <!-- Binario -->
                            <div class="card md:w-1/2 xl:w-full">
                                    <div class="card__header">
                                        <h3 class="text-lg font-bold">Puntos de Binario</h3>
                                    </div>
                                    <div class="card__body flex items-center space-x-8">
                                        <div class="flex items-center w-1/2 space-x-4">
                                            <a class="button button--icon button--flat button--flat--soft scheme-primary">
                                                <i data-icon="feather__chevronLeft"></i>
                                            </a>
                                            <div>
                                                <span class="text-sm text-gray-500">Izquierda</span>
                                                <div class="text-2xl font-bold"><?php echo format_number_miles($obj_customer[0]->total_point_left);?></div>
                                            </div>
                                        </div>
                                        <div class="flex items-center w-1/2 space-x-4">
                                            <a class="button button--icon button--flat button--flat--soft scheme-primary w-16 h-16">
                                                <i data-icon="feather__chevronRight"></i>
                                            </a>
                                            <div>
                                                <span class="text-sm text-gray-500">Derecha</span>
                                                <div class="text-2xl font-bold"><?php echo format_number_miles($obj_customer[0]->total_point_right);?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-4 text-center">
                                        <span class="text-sm">Seleccionar lado del Binario</span>
                                    </div>
                                    <div class="card__body flex items-center space-x-8">
                                        <div class="flex items-center w-1/2 space-x-4">
                                            <a class="scheme-primary">
                                                <i data-icon="feather__chevronLeft"></i>
                                            </a>
                                            <?php 
                                                if($obj_customer[0]->temporal == 1){ ?>
                                                    <button id="botton_left" onclick="left(1)" class="button button--soft scheme-success">Izquierda✓</button>
                                                <?php }else{ ?>
                                                    <button id="botton_left" onclick="left(1)" class="button button--soft scheme-primary">Izquierda</button>
                                                <?php } ?>
                                        </div>
                                        <div class="flex items-center w-1/2 space-x-4">
                                            <?php 
                                            if($obj_customer[0]->temporal == 2){ ?>
                                                <button id="botton_right" onclick="right(2)" class="button button--soft scheme-success">Derecha✓</button>
                                            <?php }else{ ?>
                                                <button id="botton_right" onclick="right(2)" class="button button--soft scheme-primary">Derecha</button>
                                            <?php } ?>
                                            <a class="scheme-primary">
                                                <i data-icon="feather__chevronRight"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            <!-- BEGIN: Query Analytics -->
                            <div class="lg:col-span-3 card">
                                <div class="card__header">
                                    <h3 class="text-2xl">Historial de Comisiones</h3>
                                </div>
                                <div class="card__body px-0 scrollbar" data-scrollbar>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Bono</th>
                                                <th>Fecha</th>
                                                <th>Importe</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
											foreach ($obj_commissions as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value->commissions_id;?></td>
                                                <td><?php echo str_to_first_capital($value->bonus);?></td>
                                                <td><?php echo formato_fecha_dia_mes_anio_abrev($value->date);?></td>
                                                <td>
                                                <?php 
                                                    if($value->active == 2){  ?>
                                                        <?php echo format_number_miles_decimal($value->amount);?>$
                                                    <?php }else{ ?>
                                                        $<?php echo format_number_miles_decimal($value->amount);?>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    if($value->active == 2){  ?>
                                                        <span class="badge scheme-red">Salida</span>
                                                    <?php }else{ ?>
                                                        <span class="badge scheme-green">Ingreso</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END: Query Analytics -->
                        </div>
                        <!-- END: Other Sections -->
                    </div>
                    <!-- End: Page Body -->
                </div>
            </main>
            <footer>
            <script src='<?php echo site_url().'assets/backoffice/js/home_new.js?2';?>'></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            </footer>
        </div>
        <!-- END: Wrapper Main -->
    </div>
    <!--END: Root Layout -->
</body>

</html>