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
<div class="breatcome-area style-two d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome-content text-center">
                    <div class="breatcome-title">
                        <h1><?php echo lang('Global.contactanos');?></h1>
                    </div>
                    <div class="breatcome-text">
                        <a href="<?php echo site_url();?>"><span><?php echo lang('Global.inicio');?></span> <?php echo lang('Global.contacto');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix" style="clear: both;"></div>
<!-- ===============//breatcome section end here \\================= -->

<!--==================================================-->
<!-- Start cryptobit contact info Area -->
<!--==================================================-->
<div class="contact-info-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="contact-info-single-box wow fadeInLeft" data-wow-delay=".4s">
                    <div class="contact-info-thumb">
                        <img src="<?php echo site_url()."assets/images/resource/contact-3.png";?>" alt="Phone">
                    </div>
                    <div class="contact-info-title">
                        <h2><?php echo lang('Global.direccion');?></h2>
                    </div>
                    <p style="color:#919da4">Av. Huayna Capac #205 Cuzco</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="contact-info-single-box wow fadeInLeft" data-wow-delay=".5s">
                    <div class="contact-info-thumb">
                        <img src="<?php echo site_url()."assets/images/resource/contact-2.png";?>" alt="Email">
                    </div>
                    <div class="contact-info-title">
                        <h2><?php echo lang('Global.llamadas');?></h2>
                        <p>+51 970 530 999</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="contact-info-single-box wow fadeInLeft" data-wow-delay=".5s">
                    <div class="contact-info-thumb">
                        <img src="<?php echo site_url()."assets/images/resource/contact-1.png";?>" alt="Email">
                    </div>
                    <div class="contact-info-title">
                        <h2><?php echo lang('Global.correos');?></h2>
                        <p>contacto@genexlatam.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End cryptobit contact info Area -->
<!--==================================================-->

<!--==================================================-->
<!-- Start Cryptobit contact Area -->
<!--==================================================-->
<div class="contact-form-area style-two pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="dreamit-section-title text-center upper1 pb-70">
                <h4><?php echo lang('Global.informacion');?></h4>
                <h1 class="section-title"><?php echo lang('Global.escribenos');?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="contact-form-thumb wow fadeInRight" data-wow-delay=".4s">
                    <img src="<?php echo site_url()."assets/images/resource/cartoon-bg.png";?>" alt="">
                    <div class="form-inner-thumb bounce-animate3">
                        <img src="<?php echo site_url()."assets/images/resource/cartoon.png";?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="contact-form-box wow fadeInLeft" data-wow-delay=".4s">
                         <div class="contact-form-title">
                            <h3><?php echo lang('Global.pongase_contacto');?></h3>
                         </div> 
                         <form name="form-contact" action="javascript:void(0);" onsubmit="send_message();" class="wpcf7-form init" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <div class="from-box">
                                        <input type="text" name="name" id="name" placeholder="<?php echo lang('Global.ingrese_nombre');?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <div class="from-box">
                                        <input type="text" name="phone" id="phone" placeholder="<?php echo lang('Global.ingrese_telefono');?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="from-box">
                                        <input type="text" name="email" id="email" placeholder="<?php echo lang('Global.ingrese_email');?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="from-box">
                                        <textarea name="message" id="message" placeholder="<?php echo lang('Global.ingrese_mensaje');?>" required></textarea>
                                    </div>                                  
                                </div>
                            </div>
                            <div class="from-box">
                                <button type="submit" id="submit"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo lang('Global.enviar_mensaje');?></button>
                            </div>
                        </form>
                        <div id="status"></div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<!--==================================================-->
<!-- Start Cryptobit contact Area -->
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
    <script>
        $(document).ready(function(){
            $('#bar1').barfiller({ duration: 7000 });
            $('#bar2').barfiller({ duration: 7000 });
            $('#bar3').barfiller({ duration: 7000 });
            $('#bar4').barfiller({ duration: 7000 });
            $('#bar5').barfiller({ duration: 7000 });
            $('#bar6').barfiller({ duration: 7000 });
        });
    </script>
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
    <script src='<?php echo site_url().'assets/js/script/contact.js';?>'></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</body>
</html>