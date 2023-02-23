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
                              <h1 class="page__title__text">Documentos</h1>
                          </div>
                      </div>
                      <!-- END: Page Header -->
                      <!-- BEGIN: Page  Body -->
                      <div class="page__body">
                        <main class="main">
                            <div data-script="fileManager" class="cols main__full">
                                <!-- BEGIN: Sidebar -->
                                <!-- BEGIN: Page Body -->
                                <div class="page__body">
                                  <!-- BEGIN: Files -->
                                  <div class="flex flex-wrap gap-5 mt-5 mb-8">
                                      <div>
                                          <a href="<?php echo site_url()."doc/presentacion_focus_corp.pdf";?>" class="flex flex-col items-center justify-around p-4 w-44 h-44 gap-y-5 bg-gray-50 rounded shadow" download="Business presentation FC">
                                              <span class="relative">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="currentColor" class="w-12 h-12 icon icon--fc"><polygon fill="#90CAF9" points="40,45 8,45 8,3 30,3 40,13"></polygon><polygon fill="#E1F5FE" points="38.5,14 29,14 29,4.5"></polygon></svg>
                                                  <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 badge scheme-red">PDF</span>
                                              </span>
                                              <span class="text-center flex flex-col gap-y-2">
                                                  <span class="font-semibold line-clamp-2">Presentación de Negocio FC (es)</span>
                                                  <span class="text-sm text-gray-400">1.97 MB</span>
                                              </span>
                                          </a>
                                      </div>
                                  </div>
                                  <!-- END: Files -->
                              </div>
                              <!-- END: Page Body -->
                          </main>
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