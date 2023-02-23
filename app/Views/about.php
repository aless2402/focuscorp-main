
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
                        <h1><?php echo lang('Global.acerca_nosotros');?></h1>
                    </div>
                    <div class="breatcome-text">
                        <a href="<?php echo site_url();?>"><span><?php echo lang('Global.inicio');?></span> <?php echo lang('Global.nosotros');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix" style="clear: both;"></div>
<!-- ===============//breatcome section end here \\================= -->

<!--==================================================-->
<!-- Start cryptobit about Area -->
<!--==================================================-->
<div class="about-area pt-90 pb-90" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="dreamit-about-thumb wow fadeInLeft" data-wow-delay=".4s">
                    <img src="<?php echo site_url()."assets/images/resource/about.png"?>" alt="Nosotros">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                 <div class="dreamit-section-title upper1 pb-5 wow fadeInLeft" data-wow-delay=".5s">
                    <h4><?php echo lang('Global.acerca_genex');?></h4>
                    <h1 class="section-title"><?php echo lang('Global.te_presentamos');?> </h1>
                    <h1 class="section-title"><?php echo lang('Global.nueva_oportunidad');?> </h1>
                    <p class="section-text1"><?php echo lang('Global.profesionales_texto');?></p>
                    <div class="about-check-text">
                        <p><span><i class="fas fa-check"></i></span> <?php echo lang('Global.posibilidad');?> </p>
                        <p><span><i class="fas fa-check"></i></span> <?php echo lang('Global.plan_recomensa');?></p>
                        <p><span><i class="fas fa-check"></i></span> <?php echo lang('Global.asesoramiento');?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End cryptobit about Area -->
<!--==================================================-->

<!--==================================================-->
<!-- Start cryptobit feature Area -->
<!--==================================================-->
<div class="feature-area style-three pt-90 ">
    <div class="container">
        <div class="row">
             <div class="col-lg-12 col-sm-12">
                 <div class="dreamit-section-title text-center upper1 pb-30 ">
                    <h1 class="section-title"><?php echo lang('Global.caracteristicas');?></h1>
                    <br/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="feature-single-box wow fadeInLeft" data-wow-delay=".3s">
                    <div class="feature-box-inner">
                        <div class="feature-icon1">
                            <img src="<?php echo site_url()."assets/images/resource/f-icon1.png?123"?>" alt="Mision">
                        </div>
                        <div class="feature-title">
                            <h3><?php echo lang('Global.mision');?></h3>
                            <p><?php echo lang('Global.mision_texto');?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="feature-single-box upper1 wow fadeInLeft" data-wow-delay=".4s">
                    <div class="feature-box-inner">
                        <div class="feature-icon1">
                            <img src="<?php echo site_url()."assets/images/resource/f-icon2.png"?>" alt="Vision">
                        </div>
                        <div class="feature-title">
                            <h3><?php echo lang('Global.vision');?></h3>
                            <p><?php echo lang('Global.vision_texto');?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="feature-single-box upper2 wow fadeInLeft" data-wow-delay=".5s">
                    <div class="feature-box-inner">
                        <div class="feature-icon1">
                            <img src="<?php echo site_url()."assets/images/resource/f-icon3.png"?>" alt="Valores">
                        </div>
                        <div class="feature-title">
                            <h3><?php echo lang('Global.valores');?></h3>
                            <p><?php echo lang('Global.valores_texto');?></p>
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
<!-- Start Cryptobit skill Area -->
<!--==================================================-->
<div class="skill-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                 <div class="dreamit-section-title upper1  pb-5 wow fadeInLeft" data-wow-delay=".4s">
                    <h1 class="section-title"><?php echo lang('Global.experiencia');?></h1>
                        <p class="skill-text"><?php echo lang('Global.experiencia_texto');?></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="prossess-ber-plugin style-two wow fadeInLeft" data-wow-delay=".3s">
                    <span class="prosses-bar"><?php echo lang('Global.10_anos');?></span>
                    <div id="bar1" class="barfiller">
                        <div class="tipWrap">
                            <span class="tip"></span>
                        </div>
                        <span class="fill" data-percentage="100"></span>
                    </div>  
                    <span class="prosses-bar"><?php echo lang('Global.expertos');?> </span>
                    <div id="bar2" class="barfiller">
                        <div class="tipWrap">
                            <span class="tip"></span>
                        </div>
                        <span class="fill" data-percentage="100"></span>
                    </div>
                    <span class="prosses-bar"><?php echo lang('Global.empresa_vanguardista');?> </span>
                    <div id="bar4" class="barfiller">
                        <div class="tipWrap">
                            <span class="tip"></span>
                        </div>
                        <span class="fill" data-percentage="100"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End Cryptobit skill Area -->
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

</body>
</html>