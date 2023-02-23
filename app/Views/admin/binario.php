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
                            <h1 class="page__title__text">Arbol Binario</h1>
                        </div>
                    </div>
                    <!-- END: Page Header -->
                    <!-- BEGIN: Page  Body -->
                    <div class="page__body">
                        <!-- BEGIN: Summary -->
                        <div class="card">
                            <div class="grid grid-cols-2 md:grid-cols-4">
                                <a class="relative px-4 pt-5 pb-24 border-b border-r xl:pb-5 flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-indigo-100 to-indigo-200 rounded-b border-b-2 border-indigo-100 text-indigo-600 shadow-sm">
                                            <i data-icon="feather__userCheck"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Total socios en red</span>
                                        <span class="text-2xl font-bold"><?php echo format_number_miles($total_partner);?></span>
                                    </span>
                                    <span id="subscriptionChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 border-b border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-indigo-100 to-indigo-200 rounded-b border-b-2 border-indigo-100 text-indigo-600 shadow-sm">
                                            <i data-icon="feather__userCheck"></i>
                                        </span>
                                    </span>
                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                        <span class="text-sm text-gray-400">Puntos Izquierda</span>
                                        <span class="text-2xl font-bold"><?php echo format_number_miles($obj_customer[0]->total_point_left);?></span>
                                    </span>
                                    <span id="totalVisitorChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                </a>
                                <a class="relative px-4 pt-5 pb-24 xl:pb-5 border-b border-r flex flex-wrap items-start gap-x-3">
                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                        <span class="pt-4 pb-2.5 px-2.5 bg-gradient-to-b from-indigo-100 to-indigo-200 rounded-b border-b-2 border-indigo-100 text-indigo-600 shadow-sm">
                                            <i data-icon="feather__userCheck"></i>
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
                        <!-- BEGIN: Other Sections -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 2xl:grid-cols-4 gap-8 items-start xl:items-stretch mt-8">
                            <!-- BEGIN: Query Analytics -->
                            <div class="lg:col-span-3 card">
                                <div class="card__header">
                                    <h3 class="text-2xl">Arbol Binario</h3>
                                </div>
                                <div class="card__body px-0 scrollbar" data-scrollbar>
                                    <!-- BEGIN: INFO -->
                                        <div class="card" id="info_content" style="display:none;">
                                            <div class="grid grid-cols-2 md:grid-cols-4">
                                                <a class="relative px-4 pt-5 pb-5 border-b border-r xl:pb-5 flex flex-wrap items-start gap-x-3">
                                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                                        <span class="pt-4 pb-2.5 px-2.5 text-indigo-600">
                                                            <i data-icon="feather__user"></i>
                                                        </span>
                                                    </span>
                                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                                        <span class="text-sm text-gray-400">Nombre</span>
                                                        <span class="font-bold" id="i_name"></span>
                                                    </span>
                                                    <span id="subscriptionChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                                </a>
                                                <a class="relative px-4 pt-5 pb-5 xl:pb-5 border-b border-r flex flex-wrap items-start gap-x-3">
                                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                                        <span class="pt-4 pb-2.5 px-2.5 text-indigo-600">
                                                            <i data-icon="feather__shoppingBag"></i>
                                                        </span>
                                                    </span>
                                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                                        <span class="text-sm text-gray-400">Licencia</span>
                                                        <span class="font-bold" id="i_membership"></span>
                                                        <span id="i_status"></span>
                                                    </span>
                                                    <span id="totalVisitorChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                                </a>
                                                <a class="relative px-4 pt-5 pb-5 xl:pb-5 border-b border-r flex flex-wrap items-start gap-x-3">
                                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                                        <span class="pt-4 pb-2.5 px-2.5 text-indigo-600">
                                                            <i data-icon="heroiconsSolid__star"></i>
                                                        </span>
                                                    </span>
                                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                                        <span class="text-sm text-gray-400">Rango</span>
                                                        <span class="font-bold" id="i_range"></span>
                                                        
                                                    </span>
                                                    <span id="newUserChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                                </a>
                                                <a class="relative px-4 pt-5 pb-5 xl:pb-5 border-b border-r flex flex-wrap items-start gap-x-3">
                                                    <span class="flex flex-col items-center space-y-2 relative -top-5">
                                                        <span class="pt-4 pb-2.5 px-2.5 text-indigo-600">
                                                            <i data-icon="feather__mapPin"></i>
                                                        </span>
                                                    </span>
                                                    <span class="summary-text flex-1 flex flex-col ml-1">
                                                        <span class="text-sm text-gray-400">País</span>
                                                        <span class="font-bold" id="i_country"></span>
                                                    </span>
                                                    <span id="newUserChart" class="xl:w-16 absolute bottom-0 left-0 right-0 xl:static xl:h-12"></span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- END: INFO -->
                                    <!------------->
                                    <!--BEGIN TREE-->
                                    <!------------->
                                    <div class="col-md-12 col-xl-12">
                                    <div class="element-box" style="overflow-x: scroll;">
                                        <div class="tree" style="padding: 0px !important;width:max-content;margin: 0 auto;">
                                        <div class="card widget" style="box-shadow: none;">
                                            <ul class="arvore" style="padding-bottom: 80px;padding-top: 20px;position: relative;">
                                            <li style="">
                                                <div>
                                                    <!------------->
                                                    <!--//NIVEL 1-->
                                                    <!------------->
                                                    <ul class="init">
                                                        <li>
                                                            <!-- Meu Usuario -->
                                                            <a href="javascript:void(0);"> 
                                                            <div id="level-0"> 
                                                                <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                            </a>
                                                            <a href="#" onclick="show_info('<?php echo $obj_customer[0]->first_name;?>', '<?php echo $obj_customer[0]->last_name;?>', '<?php echo $obj_customer[0]->username;?>', '<?php echo $obj_customer[0]->kit_name;?>', '<?php echo $obj_customer[0]->range_name;?>', '<?php echo $obj_customer[0]->active;?>', '<?php echo $obj_customer[0]->pais_img;?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                            <!------------->
                                                            <!--//NIVEL 2-->
                                                            <!------------->
                                                            <ul>
                                                            <li> 
                                                                <?php 
                                                                if(!is_null($level_2_left)){ ?>
                                                                    <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_2_left['customer_id']);?>"> 
                                                                        <div id="level-1"> 
                                                                        <?php 
                                                                            $kit_img = $level_2_left['kit_img'];
                                                                            ?>
                                                                        <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;"/>
                                                                        </div> 
                                                                    </a>
                                                                    <a href="#" onclick="show_info('<?php echo $level_2_left['first_name'];?>', '<?php echo $level_2_left['last_name'];?>', '<?php echo $level_2_left['username'];?>', '<?php echo $level_2_left['kit_name'];?>', '<?php echo $level_2_left['range_name'];?>', '<?php echo $level_2_left['active'];?>', '<?php echo $level_2_left['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                <?php }else{ ?>
                                                                <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                <?php } ?>
                                                                <!------------->
                                                                <!--//NIVEL 3-->
                                                                <!------------->
                                                                <ul class="d-sm-block">
                                                                <li> 
                                                                <?php 
                                                                    if(!is_null($level_3_left)){ ?>
                                                                    <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_3_left['customer_id']);?>">     
                                                                        <div id="level-3"> 
                                                                        <?php 
                                                                            $kit_img = $level_3_left['kit_img'];
                                                                            ?>
                                                                        <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                    </div> 
                                                                    </a>
                                                                    <a href="#" onclick="show_info('<?php echo $level_3_left['first_name'];?>', '<?php echo $level_3_left['last_name'];?>', '<?php echo $level_3_left['username'];?>', '<?php echo $level_3_left['kit_name'];?>', '<?php echo $level_3_left['range_name'];?>', '<?php echo $level_3_left['active'];?>', '<?php echo $level_3_left['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                    <?php }else{ ?>
                                                                        <a> 
                                                                            <div id="level-3"> 
                                                                            <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                            </div> 
                                                                        </a>
                                                                    <?php } ?>
                                                                    <!------------->
                                                                    <!--//NIVEL 4-->
                                                                    <!------------->
                                                                    <ul class="d-sm-block">
                                                                    <li> 
                                                                    <?php if(!is_null($level_4_left)){ ?>
                                                                        <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_4_left['customer_id']);?>">     
                                                                            <div id="level-4"> 
                                                                            <?php 
                                                                                $kit_img = $level_4_left['kit_img'];
                                                                                ?>
                                                                            <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                        </div> 
                                                                    </a>    
                                                                    <a href="#" onclick="show_info('<?php echo $level_4_left['first_name'];?>', '<?php echo $level_4_left['last_name'];?>', '<?php echo $level_4_left['username'];?>', '<?php echo $level_4_left['kit_name'];?>', '<?php echo $level_4_left['range_name'];?>', '<?php echo $level_4_left['active'];?>', '<?php echo $level_4_left['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                    <?php }else{ ?>
                                                                            <a class="border border-gray-300 border-dashed rounded"> 
                                                                                <div id="level-3"> 
                                                                                <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                </div> 
                                                                            </a>
                                                                    <?php } ?>          
                                                                </li>
                                                                    <li> 
                                                                        <?php if(!is_null($level_4_2_right)){ ?>
                                                                        <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_4_2_right['customer_id']);?>">     
                                                                        <div id="level-4"> 
                                                                        <?php 
                                                                            $kit_img = $level_4_2_right['kit_img'];
                                                                            ?>
                                                                        <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                        </div> 
                                                                    </a>
                                                                    <a href="#" onclick="show_info('<?php echo $level_4_2_right['first_name'];?>', '<?php echo $level_4_2_right['last_name'];?>', '<?php echo $level_4_2_right['username'];?>', '<?php echo $level_4_2_right['kit_name'];?>', '<?php echo $level_4_2_right['range_name'];?>', '<?php echo $level_4_2_right['active'];?>', '<?php echo $level_4_2_right['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                    <?php }else{ ?>
                                                                        <a class="border border-gray-300 border-dashed rounded"> 
                                                                            <div id="level-3"> 
                                                                                <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">  
                                                                            </div> 
                                                                        </a>
                                                                    <?php } ?>               
                                                                    </li>
                                                                </ul>
                                                                </li>
                                                                <li> 
                                                                    <!--LEVEL 3_2_LEFT -->
                                                                <?php if(!is_null($level_3_right)){ ?>
                                                                    <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_3_right['customer_id']);?>">  
                                                                    <div id="level-2">  
                                                                        <?php 
                                                                            $kit_img = $level_3_right['kit_img'];
                                                                        ?>
                                                                        <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                        </div> 
                                                                    </a>
                                                                    <a href="#" onclick="show_info('<?php echo $level_3_right['first_name'];?>', '<?php echo $level_3_right['last_name'];?>', '<?php echo $level_3_right['username'];?>', '<?php echo $level_3_right['kit_name'];?>', '<?php echo $level_3_right['range_name'];?>', '<?php echo $level_3_right['active'];?>', '<?php echo $level_3_right['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                    <?php }else{ ?>
                                                                            <a class="border border-gray-300 border-dashed rounded"> 
                                                                                <div id="level-3"> 
                                                                                <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">  
                                                                                </div> 
                                                                            </a>
                                                                    <?php } ?> 
                                                                    <!------------->
                                                                    <!--//NIVEL 4-->
                                                                    <!------------->
                                                                    <ul class="d-sm-block">
                                                                    <li> 
                                                                        <?php if(!is_null($level_4_3_left)){ ?>
                                                                        <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_4_3_left['customer_id']);?>">  
                                                                        <div id="level-2">  
                                                                            <?php 
                                                                                $kit_img = $level_4_3_left['kit_img'];
                                                                            ?>
                                                                            <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                            </div> 
                                                                        </a>
                                                                        <a href="#" onclick="show_info('<?php echo $level_4_3_left['first_name'];?>', '<?php echo $level_4_3_left['last_name'];?>', '<?php echo $level_4_3_left['username'];?>', '<?php echo $level_4_3_left['kit_name'];?>', '<?php echo $level_4_3_left['range_name'];?>', '<?php echo $level_4_3_left['active'];?>', '<?php echo $level_4_3_left['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                        <?php }else{ ?>
                                                                            <a class="border border-gray-300 border-dashed rounded"> 
                                                                                <div id="level-3"> 
                                                                                    <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                </div> 
                                                                            </a>
                                                                        <?php } ?>               
                                                                    </li>
                                                                    <li> 
                                                                        <?php if(!is_null($level_4_4_right)){ ?>
                                                                        <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_4_4_right['customer_id']);?>">  
                                                                            <div id="level-2">  
                                                                                <?php 
                                                                                $kit_img = $level_4_4_right['kit_img'];
                                                                                ?>
                                                                                <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                            </div> 
                                                                        </a>
                                                                        <a href="#" onclick="show_info('<?php echo $level_4_4_right['first_name'];?>', '<?php echo $level_4_4_right['last_name'];?>', '<?php echo $level_4_4_right['username'];?>', '<?php echo $level_4_4_right['kit_name'];?>', '<?php echo $level_4_4_right['range_name'];?>', '<?php echo $level_4_4_right['active'];?>', '<?php echo $level_4_4_right['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                        <?php }else{ ?>
                                                                            <a class="border border-gray-300 border-dashed rounded"> 
                                                                                <div id="level-3"> 
                                                                                <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                </div> 
                                                                            </a>
                                                                        <?php } ?>               
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <!------------->
                                                                <!--//NIVEL 2R-->
                                                                <!------------->
                                                            <?php if(!is_null($level_2_right)){ ?> 
                                                                <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_2_right['customer_id']);?>"> 
                                                                <div id="level-1"> 
                                                                    <?php 
                                                                    $kit_img = $level_2_right['kit_img'];
                                                                    ?>
                                                                    <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                </div> 
                                                            </a>
                                                            <a href="#" onclick="show_info('<?php echo $level_2_right['first_name'];?>', '<?php echo $level_2_right['last_name'];?>', '<?php echo $level_2_right['username'];?>', '<?php echo $level_2_right['kit_name'];?>', '<?php echo $level_2_right['range_name'];?>', '<?php echo $level_2_right['active'];?>', '<?php echo $level_2_right['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                            <?php }else{ ?>
                                                                <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                            <?php } ?>
                                                                <!------------->
                                                                <!--//NIVEL 3-->
                                                                <!------------->
                                                                <ul class="d-sm-block">
                                                                <li> 
                                                                <?php if(!is_null($level_3_3_left)){ ?> 
                                                                    <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_3_3_left['customer_id']);?>"> 
                                                                        <div id="level-3"> 
                                                                        <?php 
                                                                            $kit_img = $level_3_3_left['kit_img'];
                                                                        ?>
                                                                        <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                        </div> 
                                                                    </a>
                                                                    <a href="#" onclick="show_info('<?php echo $level_3_3_left['first_name'];?>', '<?php echo $level_3_3_left['last_name'];?>', '<?php echo $level_3_3_left['username'];?>', '<?php echo $level_3_3_left['kit_name'];?>', '<?php echo $level_3_3_left['range_name'];?>', '<?php echo $level_3_3_left['active'];?>', '<?php echo $level_3_3_left['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                    <?php }else{ ?>
                                                                            <a class="border border-gray-300 border-dashed rounded"> 
                                                                                <div id="level-3"> 
                                                                                <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                </div> 
                                                                            </a>
                                                                    <?php } ?>
                                                                    <!------------->
                                                                    <!--//NIVEL 4-->
                                                                    <!------------->
                                                                    <ul class="d-sm-block">
                                                                    <li> 
                                                                        <?php if(!is_null($level_4_5_left)){ ?> 
                                                                        <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_4_5_left['customer_id']);?>"> 
                                                                            <div id="level-4"> 
                                                                                <?php 
                                                                                $kit_img = $level_4_5_left['kit_img'];
                                                                                ?>
                                                                                <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                            </div> 
                                                                            </a>
                                                                            <a href="#" onclick="show_info('<?php echo $level_4_5_left['first_name'];?>', '<?php echo $level_4_5_left['last_name'];?>', '<?php echo $level_4_5_left['username'];?>', '<?php echo $level_4_5_left['kit_name'];?>', '<?php echo $level_4_5_left['range_name'];?>', '<?php echo $level_4_5_left['active'];?>', '<?php echo $level_4_5_left['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                            <?php }else{ ?>
                                                                                <a class="border border-gray-300 border-dashed rounded"> 
                                                                                    <div id="level-3"> 
                                                                                    <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                    </div> 
                                                                                </a>
                                                                            <?php } ?>           
                                                                    </li>
                                                                    <li> 
                                                                        <?php if(!is_null($level_4_6_right)){ ?> 
                                                                        <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_4_6_right['customer_id']);?>"> 
                                                                            <div id="level-4"> 
                                                                                <?php 
                                                                                $kit_img = $level_4_6_right['kit_img'];
                                                                                ?>
                                                                                <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                            </div> 
                                                                            </a>
                                                                            <a href="#" onclick="show_info('<?php echo $level_4_6_right['first_name'];?>', '<?php echo $level_4_6_right['last_name'];?>', '<?php echo $level_4_6_right['username'];?>', '<?php echo $level_4_6_right['kit_name'];?>', '<?php echo $level_4_6_right['range_name'];?>', '<?php echo $level_4_6_right['active'];?>', '<?php echo $level_4_6_right['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                            <?php }else{ ?>
                                                                                <a class="border border-gray-300 border-dashed rounded"> 
                                                                                    <div id="level-3"> 
                                                                                    <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                    </div> 
                                                                                </a>
                                                                            <?php } ?>           
                                                                    </li>
                                                                    </ul>
                                                                </li>
                                                                <li> 
                                                                <?php if(!is_null($level_3_4_right)){ ?> 
                                                                    <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_3_4_right['customer_id']);?>"> 
                                                                    <div id="level-3"> 
                                                                        <?php 
                                                                            $kit_img = $level_3_4_right['kit_img'];
                                                                        ?>
                                                                        <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                        </div> 
                                                                    </a>
                                                                    <a href="#" onclick="show_info('<?php echo $level_3_4_right['first_name'];?>', '<?php echo $level_3_4_right['last_name'];?>', '<?php echo $level_3_4_right['username'];?>', '<?php echo $level_3_4_right['kit_name'];?>', '<?php echo $level_3_4_right['range_name'];?>', '<?php echo $level_3_4_right['active'];?>', '<?php echo $level_3_4_right['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                    <?php }else{ ?>
                                                                            <a class="border border-gray-300 border-dashed rounded"> 
                                                                                <div id="level-3"> 
                                                                                <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                </div> 
                                                                            </a>
                                                                    <?php } ?>
                                                                    <!------------->
                                                                    <!--//NIVEL 4-->
                                                                    <!------------->
                                                                    <ul class="d-sm-block">
                                                                    <li> 
                                                                        <?php if(!is_null($level_4_7_left)){ ?> 
                                                                        <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_4_7_left['customer_id']);?>" > 
                                                                            <div id="level-3"> 
                                                                                <?php 
                                                                                $kit_img = $level_4_7_left['kit_img'];
                                                                                ?>
                                                                                <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                            </div> 
                                                                            </a>     
                                                                            <a href="#" onclick="show_info('<?php echo $level_4_7_left['first_name'];?>', '<?php echo $level_4_7_left['last_name'];?>', '<?php echo $level_4_7_left['username'];?>', '<?php echo $level_4_7_left['kit_name'];?>', '<?php echo $level_4_7_left['range_name'];?>', '<?php echo $level_4_7_left['active'];?>', '<?php echo $level_4_7_left['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                            <?php }else{ ?>
                                                                                <a class="border border-gray-300 border-dashed rounded"> 
                                                                                    <div id="level-3"> 
                                                                                    <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                    </div> 
                                                                                </a>
                                                                            <?php } ?> 
                                                                    </li>
                                                                    <li> 
                                                                        <?php if(!is_null($level_4_8_right)){ ?> 
                                                                        <a href="<?php echo site_url().BACKOFFICE.'/binario/'.encrypt($level_4_8_right['customer_id']);?>"> 
                                                                            <div id="level-4"> 
                                                                                <?php 
                                                                                $kit_img = $level_4_8_right['kit_img'];
                                                                                ?>
                                                                                <img src="<?php echo site_url()."assets/images/user.png";?>" style="width: 50px;border-radius: 50px;">
                                                                            </div> 
                                                                            </a>     
                                                                            <a href="#" onclick="show_info('<?php echo $level_4_8_right['first_name'];?>', '<?php echo $level_4_8_right['last_name'];?>', '<?php echo $level_4_8_right['username'];?>', '<?php echo $level_4_8_right['kit_name'];?>', '<?php echo $level_4_8_right['range_name'];?>', '<?php echo $level_4_8_right['active'];?>', '<?php echo $level_4_8_right['pais_img'];?>');"  data-bs-toggle="modal" data-bs-target="#kt_modal_info" class="button button--soft scheme-success" style="margin-top:3px;padding:0 3px;color:green !important">Info</a>    
                                                                            <?php }else{ ?>
                                                                                <a class="border border-gray-300 border-dashed rounded"> 
                                                                                    <div id="level-3"> 
                                                                                    <img src="<?php echo site_url()."assets/images/blank.png";?>" style="width: 50px;border-radius: 50px;">
                                                                                    </div> 
                                                                                </a>
                                                                        <?php } ?>         
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                </ul>
                                                            </li>
                                                            </ul>
                                                        </li>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <!------------->
                                    <!--END TREE-->
                                    <!------------->
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
            <script src='<?php echo site_url().'assets/backoffice/js/binario.js';?>'></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            </footer>
        </div>
        <!-- END: Wrapper Main -->
    </div>
    <!--END: Root Layout -->
</body>

</html>