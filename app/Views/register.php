<!DOCTYPE HTML>
<html lang="en-US">
<?php echo view("head");?>
<body>
<?php echo view("header");?>

<div class="clearfix" style="clear: both;"></div>
<div class="breatcome-area style-two d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome-content text-center">
                    <div class="breatcome-title">
                        <h1><?php echo lang('Global.nuevo_registro');?></h1>
                    </div>
                    <div class="breatcome-text">
                        <a href="<?php echo site_url();?>"><span><?php echo lang('Global.inicio');?></span> <?php echo lang('Global.registro');?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix" style="clear: both;"></div>
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
                            <h3><?php echo lang('Global.nuevo_registro');?></h3>
                         </div> 
                         <form name="form-new_registro" action="javascript:void(0);" onsubmit="new_registro();" class="wpcf7-form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="temporal" value="<?php echo $obj_customer[0]->temporal;?>"/>
                            <input type="hidden" name="qty_node" value="<?php echo $obj_customer[0]->qty_node;?>"/>
                            <input type="hidden" name="parent_id" value="<?php echo $obj_customer[0]->customer_id;?>">
                            <input type="hidden" name="node" value="<?php echo $obj_customer[0]->node;?>">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <label><?php echo lang('Global.patrocinado_por');?></label>
                                    <div class="from-box">
                                        <input type="text" value="<?php echo $obj_customer[0]->first_name." ".$obj_customer[0]->last_name." / @".$obj_customer[0]->username;?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="from-box">
                                        <input type="text" name="username" id="username" onkeyup="this.value=Numtext(this.value)" onblur="validate_username(this.value);" placeholder="<?php echo lang('Global.ingrese_usuario');?>" required="">
                                    </div>
                                </div>
                                <span class="alert-0" style="padding: 15px;margin-top: -33px;"></span>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <div class="from-box">
                                        <input type="password" name="password" id="password" placeholder="<?php echo lang('Global.ingrese_contrasena');?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <div class="from-box">
                                        <input type="password" name="confirm_password" id="confirm_password" placeholder="<?php echo lang('Global.confirme_contrasena');?>" required="">
                                    </div>
                                </div>
                                <span class="alert-1" style="padding: 15px;margin-top: -33px;"></span>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="from-box">
                                        <input type="text" name="first_name" id="first_name" placeholder="<?php echo lang('Global.ingrese_nombre');?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="from-box">
                                        <input type="text" name="last_name" id="last_name" placeholder="<?php echo lang('Global.ingrese_apellidos');?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="from-box">
                                        <input type="email" name="email" id="email" placeholder="<?php echo lang('Global.ingrese_email');?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="from-box">
                                        <select name="country" id="country" required="">
                                            <option  selected value=""><?php echo lang('Global.seleccionar_pais');?></option>
                                            <?php  foreach ($obj_paises as $key => $value) { ?>
                                            <option value="<?php echo $value->id;?>"><?php echo $value->nombre;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="from-box">
                                <button type="submit" id="submit"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo lang('Global.nuevo_registro');?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<?php echo view("footer");?>
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
    <script src='<?php echo site_url().'assets/js/script/new_registro.js?123';?>'></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</body>
</html>