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
                        <h1><?php echo lang('Global.login');?></h1>
                    </div>
                    <div class="breatcome-text">
                        <a href="<?php echo site_url();?>"><span><?php echo lang('Global.inicio');?></span> <?php echo lang('Global.login');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix" style="clear: both;"></div>
<!-- ===============//breatcome section end here \\================= -->
<!--==================================================-->
<!-- Start Cryptobit contact Area -->
<!--==================================================-->
<div class="contact-form-area style-two pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="contact-form-thumb wow fadeInRight" data-wow-delay=".4s">
                    <img src="<?php echo site_url()."assets/images/resource/cripto.png";?>" alt="">
                    <div class="form-inner-thumb bounce-animate3">
                        <img src="<?php echo site_url()."assets/images/resource/cripto1.png";?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="contact-form-box wow fadeInLeft" data-wow-delay=".4s">
                         <div class="contact-form-title">
                            <h3><?php echo lang('Global.login');?></h3>
                         </div> 
                         <form name="form-login" action="javascript:void(0);" onsubmit="login();" class="wpcf7-form init" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <div class="from-box">
                                        <input type="text" name="username" id="username" placeholder="<?php echo lang('Global.ingrese_usuario');?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <div class="from-box">
                                        <input type="password" name="password" id="password" placeholder="<?php echo lang('Global.ingrese_contrasena');?>" required>
                                    </div>
                                </div>
                            </div>
                            <a class="white" href="<?php echo site_url()."recuperar-contrasena";?>"><?php echo lang('Global.olvido_contrasena');?></a>
                            <div class="from-box">
                                <button type="submit" id="submit"><i class="fa fa-share-square-o" aria-hidden="true"></i> <?php echo lang('Global.ingresar_oficina');?></button>
                            </div>
                        </form>
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
    <script src='<?php echo site_url().'assets/js/script/login2.js?123';?>'></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</body>
</html>