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
                            <h1 class="page__title__text">Licencias</h1>
                        </div>
                    </div>
                    <!-- END: Page Header -->
                    <!-- BEGIN: Page  Body -->
                    <div class="page__body">
                    <div class="grid grid-cols-1 lg:grid-cols-3 2xl:grid-cols-4 gap-8 items-start xl:items-stretch mt-8">
                      <?php foreach ($obj_kit as $key => $value) { ?>
                            <!-- Carrera -->
                            <div class="flex-1 card">
                                <div class="card__header">
                                    <h3 class="text-lg font-bold">
                                        <?php echo $value->name;?>
                                    </h3>
                                </div>
                                <div class="card__body">
                                    <div class="py-4 text-center">
                                        <span class="text-2xl font-bold">$<?php echo  format_number_miles($value->price);?></span>
                                    </div>
                                    <h3 class="font-bold text-center">
                                        Detalle
                                    </h3>
                                    <br>
                                    <div class="text-sm text-center">
                                      <?php echo $value->description;?>    
                                    </div>
                                    <br>
                                    <div class="space-y-5 text-center">
                                        <button class="button scheme-primary button--icon"  disabled>
                                            Comprar
                                        </button>                                    
                                    </div>
                                </div>
                            </div>    
                            <!-- end -->
                        <?php } ?>
                    </div>
                    <!-- End: Page Body -->
                </div>
            </main>
            <footer>
            <script src='<?php echo site_url().'assets/backoffice/js/profile_new.js';?>'></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            </footer>
        </div>
        <!-- END: Wrapper Main -->
    </div>
    <!--END: Root Layout -->
</body>

</html>