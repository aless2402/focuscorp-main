<?php
    $url = explode("/", uri_string());
        if (isset($url[0])) {
            $nav = $url[0];
        } else {
            $nav = "";
        }
        $home_style = null;
        $about_style = null;
        $service_style = null;
        $contact_style = null;
        $login_style = null;
        
        switch ($nav) {
            case "acerca":
                $about_style = "active";
                break;
            case "nosotros":
                $about_style = "active";
                break;
            case "servicios":
                $service_style = "active";
                break;
            case "contacto":
                $contact_style = "active";
                break;
            case "iniciar-sesion":
              $login_style = "active";
              break;
            default:
                $home_style = "active";
                break;
        }
?>
<div id="sticky-header" class="cryptobit_nav_manu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="logo">
                    <a class="logo_img upper1" href="<?php echo site_url();?>" title="cryptobit">
                        <img src="<?php echo site_url()."assets/images/logo/logo.png";?>" alt="Logo" width="80" />
                    </a>
                    <a class="main_sticky upper1" href="<?php echo site_url();?>" title="cryptobit">
                        <img src="<?php echo site_url()."assets/images/logo/logo.png";?>" alt="Logo" width="80"/>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="cryptobit_menu upper">
                    <ul class="nav_scroll">
                        <li><a class="<?php echo $home_style;?>" href="<?php echo site_url();?>"><?php echo lang('Global.inicio');?></a></li>
                        <li><a class="<?php echo $login_style;?>" href="<?php echo site_url()."iniciar-sesion";?>"><?php echo lang('Global.login');?></a></li>
                    </ul>
                    <div class="header-button upper1">
                        <a href="<?= base_url('lang/es'); ?>" class="unset pointer">
                            <span class="symbol symbol-20px me-6">
                                <img class="rounded-1" src="<?php echo site_url()."assets/metronic8/media/flags/spain.svg";?>" alt="Español"/>
                            </span>
                        </a>
                        <a href="<?= base_url('lang/en'); ?>" class="unset pointer">
                            <span class="symbol symbol-20px me-6">
                                <img class="rounded-1" src="<?php echo site_url()."assets/metronic8/media/flags/united-states.svg";?>" alt="Ingles"/>
                            </span>
                        </a>
                        <a href="<?= base_url('lang/fr'); ?>" class="unset pointer">
                            <span class="symbol symbol-20px me-6">
                                <img class="rounded-1" src="<?php echo site_url()."assets/metronic8/media/flags/france.svg";?>" alt="Frances"/>
                            </span>
                        </a>
                    </div>
                    
                </nav>                      
            </div>
        </div>
    </div>
</div>
<!-- Cryptobit Mobile Menu Area -->
<div class="mobile-menu-area d-sm-block d-md-block d-lg-none ">
    <div class="mobile-menu">
        <nav class="cripto_menu">
            <ul class="nav_scroll">
                <li><a href="<?php echo site_url();?>">Inicio</a></li>
                <li><a href="<?php echo site_url()."iniciar-sesion";?>">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </div>
</div>