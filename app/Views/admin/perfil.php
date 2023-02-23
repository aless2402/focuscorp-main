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
                            <h1 class="page__title__text">Perfil</h1>
                        </div>
                    </div>
                    <!-- END: Page Header -->
                    <!-- BEGIN: Page  Body -->
                    <div class="page__body">
                        <div class="w-full max-w-4xl">
                            <div class="card">
                                <div class="card__header">
                                    <div>
                                        <h3 class="text-xl">Información sobre la cuenta</h3>
                                        <p class="text-sm text-gray-400">Configure sus preferencias de inicio de sesión y experiencias de cuenta.</p>
                                    </div>
                                    <a href="javascript:;" class="button button--icon button--flat scheme-info rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    </a>
                                </div>
                                <form name="form-perfil" onsubmit="save_profile();" enctype="multipart/form-data" action="javascript:void(0);" id="kt_account_profile_details_form" method="post" class="form">
                                    <div class="card__body">
                                          <fieldset class="field">
                                             <label class="form-control">
                                             <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                                                <input type="text" placeholder="Usuario" value="<?php echo $obj_customer[0]->username;?>" readonly>
                                             </label>
                                          </fieldset>
                                          <fieldset class="field">
                                             <label class="form-control">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
                                                <input type="email" name="email" id="email" value="<?php echo $obj_customer[0]->email;?>" placeholder="Email address">
                                             </label>
                                          </fieldset>
                                          <fieldset class="field">
                                             <div class="form-control">
                                                <span class="self-stretch flex items-center">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                </span>
                                                <select name="country" id="country">
                                                      <?php foreach ($obj_paises as $value ): ?>
                                                         <option value="<?php echo $value->id;?>"
                                                            <?php 
                                                                  if(isset($obj_customer)){
                                                                        if($obj_customer[0]->country==$value->id){
                                                                           echo "selected";
                                                                        }
                                                                  }else{
                                                                        echo "";
                                                                  }
                                                            ?>><?php echo $value->nombre;?>
                                                         </option>
                                                      <?php endforeach; ?>
                                                </select>
                                             </div>
                                          </fieldset>
                                    </div>
                                    <div class="card__divider"></div>
                                    <div class="card__header">
                                          <div>
                                             <h3 class="text-xl">Perfil</h3>
                                             <p class="text-sm text-gray-400">Complete su perfil en segundos.</p>
                                          </div>
                                          <a href="javascript:;" class="button button--icon button--flat scheme-info rounded-full">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                          </a>
                                    </div>
                                    <div class="card__body">
                                          <fieldset class="field">
                                             <label for="fullName" class="field__label">Nombres Completo</label>
                                             <label class="form-control">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                                                <input type="text" name="name" id="name" placeholder="Nombres" value="<?php echo $obj_customer[0]->first_name;?>" />
                                             </label>
                                          </fieldset>
                                          <fieldset class="field">
                                             <label for="profileUrl" class="field__label">Apellidos</label>
                                             <label class="form-control">
                                             <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                                             <input type="text" name="last_name" id="last_name" placeholder="Apellidos" value="<?php echo $obj_customer[0]->last_name;?>" />
                                             </label>
                                          </fieldset>
                                          <fieldset class="field">
                                             <label for="profileUrl" class="field__label">Teléfono</label>
                                             <label class="form-control">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                                             <input type="tel" name="phone" id="phone" placeholder="Teléfono" value="<?php echo $obj_customer[0]->phone;?>" />
                                             </label>
                                          </fieldset>
                                    </div>
                                    <div class="card__divider"></div>
                                    <div class="card__header">
                                          <div>
                                             <h3 class="text-xl">Billetera</h3>
                                             <p class="text-sm text-gray-400">Verifica correctamente los datos para recibir su cobre, recuerde que es bajo su responzabilidad.</p>
                                          </div>
                                          <a href="javascript:;" class="button button--icon button--flat scheme-info rounded-full">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                          </a>
                                    </div>
                                    <div class="card__body">
                                          <fieldset class="field">
                                             <label for="profileUrl" class="field__label">Billetera TRON</label>
                                             <label class="form-control">
                                             <input type="text" name="wallet" id="wallet" placeholder="USDT red de tron" value="<?php echo $obj_customer[0]->usdt;?>" required/>
                                             </label>
                                          </fieldset>
                                    </div>
                                    <div class="card__divider"></div>
                                    <div class="card__footer gap-5">
                                          <button type="button" class="button button--flat button--soft ml-auto">Cancelar</button>
                                          <button type="submit" id="profile" class="button scheme-primary">Guardar</button>
                                    </div>
                                </form>
                                <div class="card__divider"></div>
                                <form name="form-pass" onsubmit="save_pass();" enctype="multipart/form-data" action="javascript:void(0);" method="post" class="form">
                                    <div class="card__header">
                                          <div>
                                             <h3 class="text-xl">Contraseña</h3>
                                          </div>
                                          <a href="javascript:;" class="button button--icon button--flat scheme-info rounded-full">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                          </a>
                                    </div>
                                    <div class="card__body">
                                          <fieldset class="field">
                                             <label for="profileUrl" class="field__label">Nueva contraseña</label>
                                             <label class="form-control">
                                             <input type="password" name="newpass" id="newpass" placeholder="Ingrese contraseña" required/>
                                             </label>
                                          </fieldset>
                                          <fieldset class="field">
                                             <label for="profileUrl" class="field__label">Confirmar nueva contraseña</label>
                                             <label class="form-control">
                                             <input type="password" name="confirmpass" id="confirmpass" placeholder="Ingrese confirmación" required/>
                                             </label>
                                          </fieldset>
                                    </div>
                                    <div class="card__divider"></div>
                                    <div class="card__footer gap-5">
                                          <button type="button" class="button button--flat button--soft ml-auto">Cancelar</button>
                                          <button id="kt_password_submit" type="submit" class="button scheme-primary">Guardar</button>
                                    </div>
                                 </form>
                           </div>
                        </div>
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