<!DOCTYPE html>
<html lang="en">
<?php echo view("admin/head"); ?>
<body style="display: none">
    <div class="layout">
        <?php echo view("admin/nav"); ?>
        <div class="wrapper">
            <?php echo view("admin/header"); ?>
            <main class="main">
                <div data-script="dashboardAnalytics" class="page">
                    <!-- BEGIN: Page Header -->
                    <div class="page__header flex flex-wrap gap-5 justify-between">
                        <div class="page__title">
                            <h1 class="page__title__text">Historial</h1>
                        </div>
                    </div>
                    <!-- END: Page Header -->
                    <!-- BEGIN: Page  Body -->
                    <div class="page__body">
                        <!-- BEGIN: Summary -->
                        <div class="card">
                            <div class="grid grid-cols-2 md:grid-cols-4">
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-green-100 to-green-200 rounded-b border-b-2 border-green-100 text-green-600 shadow-sm">
                                            <i data-icon="feather__creditCard"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Ganancia Total</span>
                                        <span class="text-2xl font-bold">$<?php echo format_number_miles_decimal($obj_total[0]->total);?></span>
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
                                        <span class="text-sm text-gray-400">Rentabilidad</span>
                                        <span class="text-2xl font-bold">$<?php echo format_number_miles_decimal($obj_total[0]->total_pagos_diarios);?></span>
                                    </span>
                                    <span id="totalVisitorChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a href="#" class="relative px-4 pt-5 pb-24 xl:pb-5 border-b md:border-b-0 border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-indigo-100 to-indigo-200 rounded-b border-b-2 border-indigo-100 text-indigo-600 shadow-sm">
                                            <i data-icon="feather__creditCard"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Inicio Rápido</span>
                                        <span class="text-2xl font-bold">$<?php echo format_number_miles_decimal($obj_total[0]->total_patrocinio);?></span>
                                    </span>
                                    <span id="newUserChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a href="#" class="relative px-4 pt-5 pb-24 xl:pb-5 border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-blue-100 to-blue-200 rounded-b border-b-2 border-blue-100 text-blue-600 shadow-sm">
                                            <i data-icon="feather__userCheck"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Binario</span>
                                        <span class="text-2xl font-bold">$<?php echo format_number_miles_decimal($obj_total[0]->total_binario);?></span>
                                    </span>
                                    <span id="newVisitorChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                
                            </div>
                        </div>
                        <!-- END: Summary -->
                        <!-- BEGIN: Other Sections -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 2xl:grid-cols-4 gap-8 items-start xl:items-stretch mt-8">
                            <!-- BEGIN: Query Analytics -->
                            <div class="lg:col-span-3 card">
                                <div class="card__header">
                                    <h3 class="text-2xl">Historial</h3>
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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            </footer>
        </div>
        <!-- END: Wrapper Main -->
    </div>
    <!--END: Root Layout -->
</body>

</html>