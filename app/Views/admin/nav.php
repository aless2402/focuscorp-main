<?php
      $url = explode("/", uri_string());
         if (isset($url[1])) {
               $nav = $url[1];
         } else {
               $nav = "";
         }
         $perfil_style = null;
         $licencias_style = null;
         $equipo_style = null;
         $finanzas_style = null;
         $retiro_style = null;
         $carrera_style = null;
         $documentos_style = null;
         $soporte_style = null;
         $panel_style = null;
         switch ($nav) {
               case "perfil":
                  $perfil_style = "navigation__item--active";
                  break;
               case "planes":
                  $licencias_style = "navigation__item--active";
                  break;
               case "upgrade":
                  $licencias_style = "navigation__item--active";
                  break;
               case "renovacion":
                  $licencias_style = "navigation__item--active";
                  break;
               case "binario":
                  $equipo_style = "navigation__item--active";
                  break;
               case "directos":
                  $equipo_style = "navigation__item--active";
                  break;
               case "historial":
                    $finanzas_style = "navigation__item--active";
               break;
               case "facturas":
                    $finanzas_style = "navigation__item--active";
               break;
               case "cobros":
                    $retiro_style = "navigation__item--active";
               break;
               case "carrera":
                  $carrera_style = "navigation__item--active";
                  break;
                case "documentos":
                    $documentos_style = "navigation__item--active";
                    break;
               case "ticket":
               $soporte_style = "navigation__item--active";
               break;  
               default:
                  $panel_style = "navigation__item--active";
                  break;
         }
         ?>
        <nav class="sidebar">
            <div class="logo">
                <a class="inline-flex items-center">
                    <img src="<?php echo site_url()."assets/images/logo/logo.png";?>" class="text-primary-600 transform mr-1 w-14 h-14" alt="logo" />
                    <span class="text-2xl italic transform -skew-x-3 font-semibold text-gray-500">FOCUS CORP</span>
                </a>
            </div>
            <!-- BEGIN: Sidebar Scroll -->
            <div class="sidebar__scroll-wrapper">
                <div id="sidebarNavScroll" class="sidebar__scroll scrollbar" data-scrollbar>
                    <nav class="navigation">
                        <!-- BEGIN: Dashboard -->
                        <div class="navigation__title">Ecosistema Disruptivo</div>
                        <ul>
                            <li class="navigation__item <?php echo $panel_style;?>">
                                <a href="<?php echo site_url()."backoffice";?>" class="navigation__item__toggler">
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__barChart2"></i>
                                    </span>
                                    <span class="navigation__item__title">Panel</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END: Dashboard -->
                        <!-- BEGIN: Applications -->
                        <ul>
                            <li class="navigation__item <?php echo $perfil_style;?>">
                                <a href="<?php echo site_url()."backoffice/perfil";?>" class="navigation__item__toggler">
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__users"></i>
                                    </span>
                                    <span class="navigation__item__title">Perfil</span>
                                </a>
                            </li>
                            <li class="navigation__item <?php echo $licencias_style;?>">
                                <a href="<?php echo site_url()."backoffice/planes";?>" class="navigation__item__toggler">
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__shoppingBag"></i>
                                    </span>
                                    <span class="navigation__item__title">Licencias</span>
                                </a>
                            </li>
                            <li class="navigation__item <?php echo $retiro_style;?>">
                                <a href="<?php echo site_url()."backoffice/cobros";?>" class="navigation__item__toggler">
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__creditCard"></i>
                                    </span>
                                    <span class="navigation__item__title">Retiro</span>
                                </a>
                            </li>
                            <li class="navigation__item <?php echo $equipo_style;?>">
                                <a href="javascript:;" class="navigation__item__toggler" data-collapse-toggle>
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__share2"></i>
                                    </span>
                                    <span class="navigation__item__title">Equipo</span>
                                    <i data-icon="feather__chevronRight" class="navigation__item__chevron"></i>
                                </a>
                                <nav class="navigation__item__content collapse" data-collapse-group="sidenav">
                                    <ul class="navigation-level">
                                        <li class="navigation-level__item">
                                            <a href="<?php echo site_url()."backoffice/directos";?>">Ventas Directas</a>
                                        </li>
                                        <li class="navigation-level__item">
                                            <a href="<?php echo site_url()."backoffice/binario";?>">Binario</a>
                                        </li>
                                    </ul>
                                </nav>
                            </li>
                            <li class="navigation__item <?php echo $finanzas_style;?>">
                                <a href="javascript:;" class="navigation__item__toggler" data-collapse-toggle>
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__dollarSign"></i>
                                    </span>
                                    <span class="navigation__item__title">Finanzas</span>
                                    <i data-icon="feather__chevronRight" class="navigation__item__chevron"></i>
                                </a>
                                <nav class="navigation__item__content collapse" data-collapse-group="sidenav">
                                    <ul class="navigation-level">
                                        <li class="navigation-level__item">
                                            <a href="<?php echo site_url()."backoffice/historial";?>">Historial</a>
                                        </li>
                                        <li class="navigation-level__item">
                                            <a href="<?php echo site_url()."backoffice/facturas";?>">Facturas</a>
                                        </li>
                                    </ul>
                                </nav>
                            </li>
                            <li class="navigation__item <?php echo $carrera_style;?>">
                                <a href="<?php echo site_url()."backoffice/carrera";?>" class="navigation__item__toggler">
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__star"></i>
                                    </span>
                                    <span class="navigation__item__title">Carrera</span>
                                </a>
                            </li>
                            <li class="navigation__item <?php echo $documentos_style;?>">
                                <a href="<?php echo site_url()."backoffice/documentos";?>" class="navigation__item__toggler">
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__fileText"></i>
                                    </span>
                                    <span class="navigation__item__title">Documentos</span>
                                </a>
                            </li>
                            <li class="navigation__item <?php echo $soporte_style;?>">
                                <a href="<?php echo site_url()."backoffice/ticket";?>" class="navigation__item__toggler">
                                    <span class="navigation__item__icon">
                                        <i data-icon="feather__messageSquare"></i>
                                    </span>
                                    <span class="navigation__item__title">Soporte</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END: Pages -->
                    </nav>
                </div>
            </div>
            <!-- END: Sidebar Scroll Wrapper -->
        </nav>