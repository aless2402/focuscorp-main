<!DOCTYPE html>
<html lang="en">
<?php echo view("admin/head"); ?>
<body style="display: none">
    <div class="layout">
        <?php echo view("admin/nav"); ?>
        <div class="wrapper">
            <?php echo view("admin/header"); ?>
            <main class="main">
                <div class="p-md lg:p-lg main__full">
                    <div data-script="email" class="cols card h-full">
                        <!-- BEGIN: Main Content -->
                        <div class="cols__main">
                            <div class="flex flex-col h-full">
                                <!-- BEGIN: Mail Filter & Control -->
                                <div class="card__header relative z-10 flex-col gap-y-5 items-stretch gap-x-5 border-b py-3">
                                    <div class="flex items-center gap-x-5 pt-1.5">
                                        <button onclick="show();" class="button scheme-primary button--icon">
                                            Solicitar Retiro
                                        </button>
                                    </div>
                                    <div id="content-ticket" style="display:none;">
                                       <form name="form-wallet" onsubmit="make_pay();" enctype="multipart/form-data" action="javascript:void(0);" method="post" class="form">
                                          <input type="hidden" name="total_disponible" id="total_disponible" value="<?php echo $obj_earn_disponible;?>">
                                            <div class="card__body">
                                                   <fieldset class="field">
                                                    <label class="field__label">Balance Disponible: <b>$<?php echo $obj_earn_disponible;?></b></label>
                                                </fieldset>
                                                <fieldset class="field">
                                                    <label class="field__label">Importe</label>
                                                    <div class="form-control">
                                                        <span class="self-stretch flex items-center">
                                                            <i data-icon="feather__star"></i>
                                                        </span>
                                                        <input type="text" name="amount" id="amount" placeholder="Ingresar importe"  required>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="field">
                                                    <label class="field__label"><span class="required">PIN</span>&nbsp; <span id="text_pin" style="cursor:pointer; color:#33C7FF;" onclick="send_pin('<?php echo $obj_customer[0]->customer_id;?>','<?php echo $obj_customer[0]->first_name;?>','<?php echo $obj_customer[0]->email;?>');">Generar PIN</span> </label>
                                                    <div class="form-control">
                                                        <span class="self-stretch flex items-center">
                                                            <i data-icon="feather__star"></i>
                                                        </span>
                                                        <input type="text" name="pin" id="pin" placeholder="Ingresar PIN" required>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="field">
                                                    <label for="fullName" class="field__label">Billetera</label>
                                                    <label class="form-control">
                                                         <input type="text" value="<?php echo $wallet;?>" placeholder="Ingresar Wallet" readonly>
                                                    </label>
                                                    <label class="text-sm">* Verificar los datos de cobros, es bajo su responsabilidad.</label>
                                                </fieldset>
                                            </div>
                                            <div class="card__footer gap-5">
                                                <button type="button" onclick="hide();" class="button button--flat button--soft ml-auto">Cancelar</button>
                                                <button type="submit" id="submit" class="button scheme-primary">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END: Mail Filter & Control -->
                                <!-- BEGIN: Inbox List -->
                                <section id="messageList" class="flex-1 flex flex-col h-0 scrollbar" data-scrollbar>
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                                <th>ID</th>
                                                <th>Usuario</th>
                                                <th>Fecha</th>
                                                <th>Importe</th>
                                                <th>Comisión</th>
                                                <th>Estado</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($obj_pay as $value) { ?>
                                            <tr>
                                                <td><?php echo $value->pay_id;?></td>
                                                <td><?php echo $value->first_name." ".$value->last_name;?><br>@<?php echo $value->username;?></td>
                                                <td><?php echo formato_fecha_dia_mes_anio_abrev($value->date);?></td>
                                                <td><?php echo format_number_dolar($value->amount);?></td>
                                                <td><?php echo format_number_dolar($value->descount);?></td>
                                                <td>
                                                    <?php 
                                                        if($value->active == "1"){ ?>
                                                                <a class="badge scheme-yellow">En espera</a>
                                                        <?php } elseif($value->active == "2"){ ?>
                                                                <a class="badge scheme-green">Procesado</a>
                                                        <?php }else{ ?>
                                                                <a class="badge scheme-red">Cancelado</a>
                                                        <?php } ?>
                                                    </td>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!-- And so on.. -->
                                        </tbody>
                                    </table>
                                </section>
                                <!-- END: Inbox List -->
                            </div>
                        </div>
                        <!-- END: Main Content -->
                    </div>
                </div>
            </main>
            <footer>
            <script>
                function show() {
                    var x = document.getElementById("content-ticket");
                    x.style.display = "block";
                }
                function hide() {
                    var x = document.getElementById("content-ticket");
                    x.style.display = "none";
                }
            </script>
            <script src='<?php echo site_url().'assets/backoffice/js/pay_new.js';?>'></script>
            <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
            </footer>
        </div>
    </div>
</body>
</html>