<!doctype html>
<html lang="es-PE">
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
                                 <h5 class="m-b-10">Formulario de Clientes</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard/clientes">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Clientes</a></li>
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
                                    <h5>Datos</h5>
                                 </div>
                                 <div class="card-body">
                                    <form name="form-customer" id="form-customer" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="validate();">
                                       <div class="form-row">
                                          <div class="form-group col-md-12">
                                             <div class="form-group">
                                                <label>ID</label>
                                                <input class="form-control" type="text" id="customer_id" name="customer_id" value="<?php echo isset($obj_customer[0]->customer_id)?$obj_customer[0]->customer_id:"";?>" placeholder="ID" disabled="">
                                                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo isset($obj_customer)?$obj_customer[0]->customer_id:"";?>">
                                                <input type="hidden" name="binary_id" id="binary_id" value="<?php echo isset($obj_customer)?$obj_customer[0]->id:"";?>">
                                             </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <div class="form-group">
                                                <label>Usuario</label>
                                                <input class="form-control" type="text" id="username" name="username" value="<?php echo isset($obj_customer[0]->username)?$obj_customer[0]->username:"";?>" placeholder="Username">
                                             </div>
                                             <div class="form-group">
                                                <label>Nombres</label>
                                                <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo isset($obj_customer[0]->first_name)?$obj_customer[0]->first_name:"";?>" placeholder="Nombre">
                                             </div>
                                             <div class="form-group"> 
                                                <label>Apellidos</label>
                                                <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo isset($obj_customer[0]->last_name)?$obj_customer[0]->last_name:"";?>" placeholder="Apellidos">
                                             </div>
                                             <div class="form-group">
                                                <label>Dirección</label>
                                                <textarea class="form-control" name="address" id="address" rows="3"><?php echo isset($obj_customer[0]->address)?$obj_customer[0]->address:"";?></textarea>
                                             </div>
                                             <div class="form-group">
                                                <label>Financiado</label>
                                                <select name="financy" id="financy" class="form-control">
                                                   <option value="">[ Seleccionar ]</option>
                                                   <option value="1" <?php if(isset($obj_customer)){
                                                      if($obj_customer[0]->financy == 1){ echo "selected";}
                                                   }else{echo "";} ?>>Si</option>
                                                   <option value="0" <?php if(isset($obj_customer)){
                                                      if($obj_customer[0]->financy == 0){ echo "selected";}
                                                   }else{echo "";} ?>>No</option>
                                             </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Pais</label>
                                                <select name="pais" id="pais" class="form-control">
                                                   <option value="">[ Seleccionar ]</option>
                                                   <?php foreach ($obj_paises as $value ): ?>
                                                      <option value="<?php echo $value->id;?>"
                                                            <?php 
                                                                  if(isset($obj_customer[0]->country)){
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
                                             <div class="form-group">
                                                <label for="inputState">Planes</label>
                                                <select name="kit" id="kit" class="form-control">
                                                   <option value="">[ Seleccionar ]</option>
                                                      <?php foreach ($obj_kit as $value ): ?>
                                                   <option value="<?php echo $value->kit_id;?>"
                                                      <?php 
                                                               if(isset($obj_customer[0]->kit_id)){
                                                                     if($obj_customer[0]->kit_id==$value->kit_id){
                                                                           echo "selected";
                                                                     }
                                                               }else{
                                                                        echo "";
                                                               }
                                                      ?>><?php echo $value->name;?>
                                                   </option>
                                                      <?php endforeach; ?>
                                             </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Pagos Líderes</label>
                                                <select name="pay" id="pay" class="form-control">
                                                      <option value="">[ Seleccionar ]</option>
                                                      <option value="1" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->pay == 1){ echo "selected";}
                                                      }else{echo "";} ?>>Activo</option>
                                                      <option value="0" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->pay == 0){ echo "selected";}
                                                      }else{echo "";} ?>>Inactivo</option>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label>Fecha de Pago</label>
                                                <input class="form-control" type="text" id="date_pay" name="date_pay" placeholder="YYYY/mm/dd" value="<?php echo isset($obj_customer[0]->date_pay)?$obj_customer[0]->date_pay:"";?>">
                                             </div>
                                             <div class="form-group">
                                                <label>Fecha de Activación</label>
                                                <input class="form-control" type="text" id="date_start" name="date_start" placeholder="YYYY/mm/dd" value="<?php echo isset($obj_customer[0]->date_start)?$obj_customer[0]->date_start:"";?>">
                                             </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <div class="form-group">
                                                <label>E-mail</label>
                                                <input class="form-control" type="text" id="email" name="email" value="<?php echo isset($obj_customer[0]->email)?$obj_customer[0]->email:"";?>" placeholder="Correo Electrónico">
                                             </div>
                                             <div class="form-group">
                                                <label>DNI</label>
                                                <input class="form-control" type="text" id="dni" name="dni" value="<?php echo isset($obj_customer[0]->dni)?$obj_customer[0]->dni:"";?>" placeholder="DNI">
                                             </div>
                                             <div class="form-group">
                                                <label>Telefono</label>
                                                <input class="form-control" type="text" id="phone" name="phone" placeholder="Telefono" value="<?php echo isset($obj_customer[0]->phone)?$obj_customer[0]->phone:"";?>">
                                             </div>
                                             <div class="form-group">
                                                <label>USDT Wallet</label>
                                                <input class="form-control" type="text" id="btc_address" name="btc_address" placeholder="Direccion de USDT" value="<?php echo isset($obj_customer[0]->usdt)?$obj_customer[0]->usdt:"";?>">
                                             </div>
                                             <div class="form-group">
                                                <label>LTC Wallet</label>
                                                <input class="form-control" type="text" id="usdt_wallet" name="usdt_wallet" placeholder="Direccion de LTC" value="<?php echo isset($obj_customer[0]->ltc)?$obj_customer[0]->ltc:"";?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Rango</label>
                                                <select name="rango" id="rango" class="form-control">
                                                   <option value="">[ Seleccionar ]</option>
                                                      <?php foreach ($obj_ranges as $value ): ?>
                                                      <option value="<?php echo $value->range_id;?>"
                                                         <?php 
                                                               if(isset($obj_customer[0]->range_id)){
                                                                     if($obj_customer[0]->range_id==$value->range_id){
                                                                           echo "selected";
                                                                     }
                                                               }else{
                                                                        echo "";
                                                               }

                                                         ?>><?php echo str_to_mayusculas($value->name);?>
                                                   </option>
                                                   <?php endforeach; ?>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Tope</label>
                                                <select name="tope" id="tope" class="form-control">
                                                      <option value="">[ Seleccionar ]</option>
                                                      <option value="1" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->tope == 1){ echo "selected";}
                                                      }else{echo "";} ?>>Si</option>
                                                      <option value="0" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->tope == 0){ echo "selected";}
                                                      }else{echo "";} ?>>No</option>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label>Tope De Ganancia</label>
                                                <input class="form-control" type="text" id="tope_amount" name="tope_amount" placeholder="Fecha de Creación" value="<?php echo isset($obj_customer[0]->tope_amount)?$obj_customer[0]->tope_amount:"";?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Binario</label>
                                                <select name="binary_active" id="binary_active" class="form-control" require="">
                                                      <option value="">[ Seleccionar ]</option>
                                                      <option value="1" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->binary_active == 1){ echo "selected";}
                                                      }else{echo "";} ?>>Si</option>
                                                      <option value="0" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->binary_active == 0){ echo "selected";}
                                                      }else{echo "";} ?>>No</option>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Izquierda</label>
                                                <select name="left_active" id="left_active" class="form-control" require="">
                                                      <option value="">[ Seleccionar ]</option>
                                                      <option value="1" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->left_active == 1){ echo "selected";}
                                                      }else{echo "";} ?>>Si</option>
                                                      <option value="0" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->left_active == 0){ echo "selected";}
                                                      }else{echo "";} ?>>No</option>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Derecha</label>
                                                <select name="right_active" id="right_active" class="form-control" require="">
                                                      <option value="">[ Seleccionar ]</option>
                                                      <option value="1" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->right_active == 1){ echo "selected";}
                                                      }else{echo "";} ?>>Si</option>
                                                      <option value="0" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->right_active == 0){ echo "selected";}
                                                      }else{echo "";} ?>>No</option>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="inputState">Estado</label>
                                                <select name="active" id="active" class="form-control">
                                                      <option value="">[ Seleccionar ]</option>
                                                      <option value="1" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->active == 1){ echo "selected";}
                                                      }else{echo "";} ?>>Activo</option>
                                                      <option value="0" <?php if(isset($obj_customer)){
                                                            if($obj_customer[0]->active == 0){ echo "selected";}
                                                      }else{echo "";} ?>>Inactivo</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-cloud" aria-hidden="true"></i>Guardar</button>
                                       <button class="btn btn-danger" type="reset" onclick="cancelar_customer();"><i class="fa fa-arrow-left" aria-hidden="true"></i>Cancelar</button>                    
                                    </form>
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
      <script src="<?php echo base_url('js/backoffice/admin/customer.js'); ?>"></script>   
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>