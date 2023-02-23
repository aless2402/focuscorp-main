<nav class="pcoded-navbar navbar-collapsed" style="overflow-y:auto;overflow-x: hidden !important;">
   <div class="navbar-wrapper">
      <div class="navbar-brand header-logo">
         <a href="index.html" class="b-brand">
            <div class="b-bg">
               <i class="feather icon-trending-up"></i>
            </div>
            <span class="b-title">Focus Corp!</span>
         </a>
         <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      </div>
      <?php
            $url = explode("/", uri_string());
            if (isset($url[1])) {
                $nav = $url[1];
            } else {
                $nav = "";
            }
            $panel_style = null;
            $panel_color = null;
            $noches_style = null;
            $noches_color = null;
            $mantenimientos_style = null;
            $bonos_color =  null;
            $clientes_color =  null;
            $comentarios_color =  null;
            $comisiones_color =  null;
            $facturas_color =  null;
            $planes_color =  null;
            $pagos_color =  null;
            $puntos_color =  null;
            $rangos_color =  null;
            $usuarios_color = null;
            $usuarios_style = null;
            $activaciones_style = null;
            $nuevos_rangos_style = null;
            $activaciones_color = null;
            $upgrade_color = null;
            $pagos_style = null; 
            $activar_pagos_color = null;
            $rentabilidad_style = null;
            $rentabilidad_color = null;
            $integracion_pagos_style = null;
            $concepto_ticket_color = null;
            $integracion_pagos_color = null;
            $integracion_descuentos_color = null;
            $integracion_puntos_color = null;
            $soporte_style = null;
            $setting_color = null;
            $ticket_color = null;
            $nuevos_rangos_color = null;
            $bono_liderazgo_color = null;
            $kyc_style = null;
            $kyc_pendientes_color = null;
            $kyc_verificados_color = null;

            switch ($nav) {
                case "usuarios":
                    $mantenimientos_style = "active pcoded-trigger";
                    $usuarios_color = "active_nav";
                    break;
               case "kyc_pendientes":
                     $kyc_style = "active pcoded-trigger";
                     $kyc_pendientes_color = "active_nav";
                    break;
               case "kyc_verificados":
                     $kyc_style = "active pcoded-trigger";
                     $kyc_verificados_color = "active_nav";
                    break;
                case "nuevos_rangos":
                   $nuevos_rangos_style = "active pcoded-trigger";
                   $nuevos_rangos_color = "active_nav";
                  break;
               case "bono_liderazgo":
                  $nuevos_rangos_style = "active pcoded-trigger";
                  $bono_liderazgo_color = "active_nav";
                  break;
                case "bonos":
                    $mantenimientos_style = "active pcoded-trigger";
                    $bonos_color = "active_nav";
                    break;
                case "clientes":
                    $mantenimientos_style = "active pcoded-trigger";
                    $clientes_color = "active_nav";
                    break;
                case "comentarios":
                    $mantenimientos_style = "active pcoded-trigger";
                    $comentarios_color = "active_nav";
                    break;
                case "concepto_ticket":
                    $mantenimientos_style = "active pcoded-trigger";
                    $concepto_ticket_color = "active_nav";
                    break;
                case "comisiones":
                    $mantenimientos_style = "active pcoded-trigger";
                    $comisiones_color = "active_nav";
                    break;
                case "facturas":
                    $mantenimientos_style = "active pcoded-trigger";
                    $facturas_color = "active_nav";
                    break;
                case "planes":
                    $mantenimientos_style = "active pcoded-trigger";
                    $planes_color = "active_nav";
                    break;
                case "pagos":
                    $mantenimientos_style = "active pcoded-trigger";
                    $pagos_color = "active_nav";
                    break;
                case "puntos":
                    $mantenimientos_style = "active pcoded-trigger";
                    $puntos_color = "active_nav";
                    break;  
                case "rangos":
                    $mantenimientos_style = "active pcoded-trigger";
                    $rangos_color = "active_nav";
                    break;
                case "usuarios":
                    $mantenimientos_style = "active pcoded-trigger";
                    $usuarios_color = "active_nav";
                    break;   
               case "setting":
                    $mantenimientos_style = "active pcoded-trigger";
                    $setting_color = "active_nav";
                  break;   
                case "upgrade":
                    $activaciones_style = "active pcoded-trigger";
                    $upgrade_color = "active_nav";
                    break;   
                case "activaciones":
                    $activaciones_style = "active pcoded-trigger";
                    $activaciones_color = "active_nav";
                    break;   
                case "activar_pagos":
                    $pagos_style = "active pcoded-trigger";
                    $activar_pagos_color = "active_nav";
                    break;  
                case "integracion_pagos":
                    $integracion_pagos_style = "active pcoded-trigger";
                    $integracion_pagos_color = "active_nav";
                    break;  
                case "descuentos_pagos":
                    $integracion_pagos_style = "active pcoded-trigger";
                    $integracion_descuentos_color = "active_nav";
                    break;    
                case "integracion_puntos":
                    $integracion_pagos_style = "active pcoded-trigger";
                    $integracion_puntos_color = "active_nav";
                    break;    
                case "ticket":
                    $soporte_style = "active pcoded-trigger";
                    $ticket_color = "active_nav";
                    break;  
                default:
                    $panel_style = "active pcoded-trigger";
                    $panel_color = "active_nav";
                    break;
            }
        ?>
      <div class="navbar-content scroll-div">
         <ul class="nav pcoded-inner-navbar">
            <li class="nav-item pcoded-menu-caption">
               <label>Inicio</label>
            </li>
            <li class="nav-item <?php echo $panel_style;?>">
               <a href="/dashboard/panel" class="nav-link <?php echo $panel_color;?>">
               <span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Panel</span>
               </a>
            </li>
            <?php 
            if($_SESSION['privilage'] == 2 || $_SESSION['privilage'] == 3){ ?>
               <li class="nav-item pcoded-menu-caption">
                  <label>Nuevos Rangos & Liderazgo</label>
               </li>
               <li class="nav-item pcoded-hasmenu <?php echo $nuevos_rangos_style;?>">
                  <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fa fa-bullhorn" aria-hidden="true"></i></span><span class="pcoded-mtext">Rangos & Liderazgo</span></a>
                  <ul class="pcoded-submenu">
                     <li class=""><a href="/dashboard/nuevos_rangos" class="<?php echo $nuevos_rangos_color;?>">Nuevos Rangos</a></li>
                     <li class=""><a href="/dashboard/bono_liderazgo" class="<?php echo $bono_liderazgo_color;?>">Bono de Liderazgo</a></li>
                  </ul>
               </li>
            
            <li class="nav-item pcoded-menu-caption">
               <label>Mantenimientos</label>
            </li>
            <li class="nav-item pcoded-hasmenu <?php echo $mantenimientos_style;?>">
               <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Todas las Tablas</span></a>
               <ul class="pcoded-submenu">
                  <li class=""><a href="/dashboard/bonos" class="<?php echo $bonos_color;?>">Bonos</a></li>
                  <li class=""><a href="/dashboard/clientes" class="<?php echo $clientes_color;?>">Clientes</a></li>
                  <li class=""><a href="/dashboard/comisiones" class="<?php echo $comisiones_color;?>">Comisiones</a></li>
                  <!--li class=""><a href="/dashboard/facturas" class="<?php echo $facturas_color;?>">Facturas</a></li-->
                  <li class=""><a href="/dashboard/planes" class="<?php echo $planes_color;?>">Planes</a></li>
                  <li class=""><a href="/dashboard/pagos" class="<?php echo $pagos_color;?>">Pagos</a></li>
                  <li class=""><a href="/dashboard/puntos" class="<?php echo $puntos_color;?>">Puntos Binario</a></li>
                  <li class=""><a href="/dashboard/rangos" class="<?php echo $rangos_color;?>">Rangos</a></li>
                  <li class=""><a href="/dashboard/concepto_ticket" class="<?php echo $concepto_ticket_color;?>">Concepto Tikect</a></li>
                  <li class=""><a href="/dashboard/usuarios" class="<?php echo $usuarios_color;?>">Usuarios</a></li>
                  <li class=""><a href="/dashboard/setting" class="<?php echo $setting_color;?>">Setting</a></li>
               </ul>
            </li>
            <li class="nav-item pcoded-menu-caption">
               <label>Activaciones</label>
            </li>
            <li class="nav-item pcoded-hasmenu <?php echo $activaciones_style;?>">
               <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fa fa-check" aria-hidden="true"></i></span><span class="pcoded-mtext">Activaciones</span></a>
               <ul class="pcoded-submenu">
                  <li class=""><a href="/dashboard/activaciones" class="<?php echo $activaciones_color;?>">Nuevos Paquetes</a></li>
               </ul>
            </li>
            <?php } ?>
            <?php
            if($_SESSION['privilage'] == 3){ ?>
            <li class="nav-item pcoded-menu-caption">
               <label>Pagos</label>
            </li>
            <li class="nav-item pcoded-hasmenu <?php echo $pagos_style;?>">
               <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fa fa-credit-card" aria-hidden="true"></i></span><span class="pcoded-mtext">Procesar Pagos</span></a>
               <ul class="pcoded-submenu">
                  <li class=""><a href="/dashboard/activar_pagos" class="<?php echo $activar_pagos_color;?>">Procesar Pagos</a></li>
               </ul>
            </li>
            <li class="nav-item pcoded-menu-caption">
               <label>Integración &amp; Descuento</label>
            </li>
            <li class="nav-item pcoded-hasmenu <?php echo $integracion_pagos_style;?>">
               <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-plus"></i></span><span class="pcoded-mtext">Integración</span></a>
               <ul class="pcoded-submenu">
                  <li class=""><a href="/dashboard/integracion_pagos" class="<?php echo $integracion_pagos_color;?>">Integración Pagos</a></li>
                  <li class=""><a href="/dashboard/descuentos_pagos" class="<?php echo $integracion_descuentos_color;?>">Descuento Pagos</a></li>
                  <li class=""><a href="/dashboard/integracion_puntos" class="<?php echo $integracion_puntos_color;?>">Integración Puntos Binario</a></li>
               </ul>
            </li>
            <?php } ?>
            <li class="nav-item pcoded-menu-caption">
               <label>Soporte</label>
            </li>
            <li class="nav-item pcoded-hasmenu <?php echo $soporte_style;?>">
               <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fa fa-phone" aria-hidden="true"></i></span><span class="pcoded-mtext">Soporte</span></a>
               <ul class="pcoded-submenu">
                  <li class=""><a href="/dashboard/ticket" class="<?php echo $ticket_color;?>">Ticket</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
   <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
      <a href="index.html" class="b-brand">
         <div class="b-bg">
            <i class="feather icon-trending-up"></i>
         </div>
         <span class="b-title">GENEX!</span>
      </a>
   </div>
   <a class="mobile-menu" id="mobile-header" href="#!">
   <i class="feather icon-more-horizontal"></i>
   </a>
   <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
         <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
      </ul>
      <ul class="navbar-nav ml-auto">
         <li>
            <div class="dropdown drp-user">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="icon feather icon-settings"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right profile-notification">
                  <div class="pro-head">
                     <img src="<?php echo site_url("img/avatar-2.jpg");?>" class="img-radius" alt="Imagen de Perfil">
                     <span><?php echo corta_texto($session_name, 10);?></span>
                     <a href="/dashboard/logout" class="dud-logout" title="Logout">
                     <i class="feather icon-log-out"></i>
                     </a>
                  </div>
                  <ul class="pro-body">
                     <li><a href="/dashboard/logout" class="dropdown-item"><i class="feather icon-lock"></i> Salir</a></li>
                  </ul>
               </div>
            </div>
         </li>
      </ul>
   </div>
</header>