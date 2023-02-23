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
                            <h1 class="page__title__text">Plan Carrera</h1>
                        </div>
                    </div>
                    <!-- END: Page Header -->
                    <!-- BEGIN: Page  Body -->
                    <div class="page__body">
                        <!-- BEGIN: Summary -->
                        <div class="card">
                            <div class="grid grid-cols-2 md:grid-cols-3">
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-green-100 to-green-200 rounded-b border-b-2 border-green-100 text-green-600 shadow-sm">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10 icon icon--feather"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Rango actual</span>
                                        <span class="text-2xl font-bold"><?php echo isset($obj_customer->name) != ""?str_to_mayusculas($obj_customer->name):" - ";?></span>
                                    </span>
                                    <span id="subscriptionChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 border-b md:border-b-0 border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-info-100 to-info-200 rounded-b border-b-2 border-info-100 text-info-600 shadow-sm">
                                            <i data-icon="feather__chevronLeft"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Puntos Izquierda</span>
                                        <span class="text-2xl font-bold"><?php echo format_number_miles($obj_customer[0]->total_point_left);?></span>
                                    </span>
                                    <span id="totalVisitorChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a href="#" class="relative px-4 pt-5 pb-24 xl:pb-5 border-b md:border-b-0 border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-indigo-100 to-indigo-200 rounded-b border-b-2 border-indigo-100 text-indigo-600 shadow-sm">
                                             <i data-icon="feather__chevronRight"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Puntos Derecha</span>
                                        <span class="text-2xl font-bold"><?php echo format_number_miles($obj_customer[0]->total_point_right);?></span>
                                    </span>
                                    <span id="newUserChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                            </div>
                        </div>
                        <!-- END: Summary -->
                        <section id="usage" class="mb-10">
                           <div class="card mt-5">
                                <div class="card__header">
                                    <h3 class="text-xl font-semibold">Rangos</h3>
                                </div>
                                <?php foreach($obj_range as $range){ ?>
                                    <?php if($range->point_personal > 2000){  ?>
                                            <!-- range -->
                                            <div class="flex-1 card">
                                                <div class="card__body">
                                                        <div class="py-3 text-center items-center">
                                                            <img class="items-center" src='<?php echo site_url()."img/rangos/$range->img";?>' alt="rango" width="40" style="margin:auto"/> 
                                                            <span class="text-2xl font-bold"><?php echo $range->name ?></span>
                                                        </div>
                                                        <div class="text-sm text-center">
                                                        <?php 
                                                        $begin = $point > $range->point_personal ? $range->point_personal : $point;
                                                        ?>   
                                                        <?php echo $begin." de ". $range->point_personal; ?>
                                                        </div>
                                                        <div class="space-y-5">
                                                            <span class="font-bold w-8"></span>
                                                            <div class="flex items-center gap-5 text-sm">
                                                            <div class="flex-1 rounded-full bg-gray-200">
                                                                    <div class="rounded-full bg-primary-400 h-2" style="width: <?php
                                                                            if(($point/$range->point_personal)*100 > 100){
                                                                                echo 100;
                                                                            }
                                                                            else{
                                                                                echo ($point/$range->point_personal)*100;
                                                                            }
                                                                        ?>%"> </div>
                                                            </div>
                                                            <span class="w-8">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div> 
                                            <!-- range -->
                                    <?php } ?>
                                 <?php } ?>
                           </div>
                        </section>
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