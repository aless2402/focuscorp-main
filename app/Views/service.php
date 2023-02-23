<!DOCTYPE HTML>
<html lang="en-US">
<?php echo view("head");?>
<body>
<!--==================================================-->
<!-- Start cryptobit Main Menu Area -->
<!--==================================================-->
<?php echo view("header");?>
<!--==================================================-->
<!-- End cryptobit main menu Area -->
<!--==================================================-->
<!-- ===============//breatcome area start here \\================= -->
<div class="clearfix" style="clear: both;"></div>
<div class="breatcome-area d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome-content text-center">
                    <div class="breatcome-title">
                        <h1><?php echo lang('Global.servicios');?></h1>
                    </div>
                    <div class="breatcome-text">
                        <a href="<?php echo site_url();?>"><span><?php echo lang('Global.inicio');?></span> <?php echo lang('Global.servicios');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix" style="clear: both;"></div>
<!-- ===============//breatcome section end here \\================= -->
<!--==================================================-->
<!-- Start cryptobit feature Area -->
<!--==================================================-->
<div class="feature-area style-four pt-100 pb-70 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="feature-single-box wow fadeInLeft" data-wow-delay=".3s">
                    <div class="feature-box-inner">
                        <div class="feature-icon1">
                            <img src="<?php echo site_url()."assets/images/resource/service1.png";?>" alt="GENEX">
                        </div>
                        <div class="feature-title">
                            <h3><a href="#">GENEX</a></h3>
                            <p><?php echo lang('Global.genex_text');?></p>
                            <div class="feature-button">
                                <a href="#"><?php echo lang('Global.ver_mas');?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="feature-single-box upper1 wow fadeInLeft" data-wow-delay=".4s">
                    <div class="feature-box-inner">
                        <div class="feature-icon1">
                            <img src="<?php echo site_url()."assets/images/resource/service2.png";?>" alt="GENMIND">
                        </div>
                        <div class="feature-title">
                            <h3><a href="#">GENMIND</a></h3>
                            <p><?php echo lang('Global.plataforma_educativa');?></p>
                            <div class="feature-button">
                                <a href="#"><?php echo lang('Global.ver_mas');?></a>
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="feature-single-box upper2 wow fadeInLeft" data-wow-delay=".5s">
                    <div class="feature-box-inner">
                        <div class="feature-icon1">
                            <img src="<?php echo site_url()."assets/images/resource/service3.png";?>" alt="GENMO">
                        </div>
                        <div class="feature-title">
                            <h3><a href="#">GENMO</a></h3>
                            <p><?php echo lang('Global.inversores');?></p>
                            <div class="feature-button">
                                <a href="#"><?php echo lang('Global.ver_mas');?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="feature-single-box upper2 wow fadeInLeft" data-wow-delay=".5s">
                    <div class="feature-box-inner">
                        <div class="feature-icon1">
                        <img src="<?php echo site_url()."assets/images/resource/service4.png";?>" alt="GENCOM">
                        </div>
                        <div class="feature-title">
                            <h3><a href="#">GENECOM</a></h3>
                            <p><?php echo lang('Global.genecom_text');?></p>
                            <div class="feature-button">
                                <a href="#"><?php echo lang('Global.ver_mas');?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End cryptobit feature Area -->
<!--==================================================-->

<!--==================================================-->
<!-- Start Cryptobit counter Area -->
<!--==================================================-->
<div class="call-do-action-area pt-90 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="call-do-action-content">
                    <div class="call-do-action-title">
                        <h1><?php echo lang('Global.buscas_invertir');?></h1>
                    </div>
                    <div class="call-do-action-text">
                        <p><?php echo lang('Global.comunicate');?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="call-do-button">
                    <a href="<?php echo site_url()."contacto"?>"><i class="fa fa-headphones" aria-hidden="true"></i> <?php echo lang('Global.contactanos');?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End Cryptobit counter Area -->
<!--==================================================-->
<!--==================================================-->
<!-- Start Cryptobit Footer Middle Area -->
<!--==================================================-->
<?php echo view("footer");?>
<!--==================================================-->
<!-- End Cryptobit Footer Middle Area -->
<!--==================================================-->

<!--==================================================-->
<!-- Start scroll Area -->
<!--==================================================-->
<div class="scroll-area">
    <div class="top-wrap">
        <div class="go-top-btn-wraper">
            <div class="go-top go-top-button">
                <i class="fas fa-arrow-up"></i>
                <i class="fas fa-arrow-up"></i>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End scroll Area -->
<!--==================================================-->
<?php echo view("footerjs");?> 
     <!--jave script -->
    <script>
        $(window).on('scroll', function () {
            var scrolled = $(window).scrollTop();
            if (scrolled > 300) $('.go-top').addClass('active');
            if (scrolled < 300) $('.go-top').removeClass('active');
        });

        $('.go-top').on('click', function () {
            $("html, body").animate({
                scrollTop: "0"
            }, 1200);
        });
    </script>
</body>
</html>