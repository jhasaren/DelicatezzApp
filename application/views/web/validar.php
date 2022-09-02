<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="icon" href="<? echo base_url() . 'public/web/images/favicon.ico'; ?>" type="image/gif">
        <title>Carrusel - Tienda Infantil</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/open-iconic-bootstrap.min.css'; ?>">
        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/animate.css'; ?>">

        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/owl.carousel.min.css'; ?>">
        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/owl.theme.default.min.css'; ?>">
        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/magnific-popup.css'; ?>">

        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/aos.css'; ?>">

        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/ionicons.min.css'; ?>">

        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/bootstrap-datepicker.css'; ?>">
        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/jquery.timepicker.css'; ?>">

        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/flaticon.css'; ?>">
        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/icomoon.css'; ?>">
        <link rel="stylesheet" href="<? echo base_url() . 'public/web/css/style.css'; ?>">

        <link rel="stylesheet" href="https://use.fontawesome.com/6596d20554.css">
        <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&family=Euphoria+Script&family=Marck+Script&display=swap" rel="stylesheet">
    </head>
    <body>

        <!--Navigation-->
        <?php
        /* include */
        $this->load->view('web/includes/header-sec');
        ?>
        <!-- END nav -->
        
        <div class="hero-wrap hero-bread" style="background-image: url('<? echo base_url() . 'public/web/images/bg_9.jpg'; ?>'); background-attachment: fixed;">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <span style="color: gray; font-size: 35px; font-family: 'Oleo Script', cursive;">Autenticidad de Prendas</span>
                        <!--<h1 class="mb-0 bread">Contacto</h1>-->
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section-cat contact-section" style="padding: 5em 0 5em 0">
            <div class="container">
                <div class="row d-flex">
                    <div class="w-100"></div>
                    <div class="col-md-12 d-flex" style="background-color: #ff99ff;">
                        <div class="info bg-white p-4">
                            
                            <p style="color: #000; text-align: justify">
                                <form class="col-md-12" name="form_valida" action="<?php echo base_url().'CValidar/datacode'; ?>" method="post">
                                    <center>
                                        <B>Digita el Código de Verificación:</B>
                                        <br /><br />
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <input class="form-control form-control-lg" name='code' type="text" minlength="7" maxlength="8" placeholder="Código" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <button class="btn-lg btn-secondary" id="btn-register" style="background-color: #46e271; border: none;">
                                            <i class="fa fa-certificate"></i> Consultar 
                                        </button>
                                        <br /><br />
                                    </center>
                                </form>
                            </p>
                            <?php 
                            if ($stateMessage === 1){

                                echo "<center>".$message."</center>";

                            } else {

                                if ($stateMessage === 2){
                                    ?>
                                    <div class="row">
                                        <div class="col-sm col-md-12 col-lg-4 ftco-animate"></div>
                                        <div class="col-sm col-md-12 col-lg-4 ftco-animate">
                                            <?php
                                            echo "<span style='font-size:28px'>".$data->codigoVerificacion."</span><br />";
                                            echo "<span style='color:#000'>".$data->declaracion."</span><br />";
                                            
                                            echo "[<a href='".$data->urlDocumento."' target='_blank' style='font-weight:bold; color:red'>Descargar Certificado</a>]<br />";
                                            ?>
                                        </div>
                                        <div class="col-sm col-md-12 col-lg-4 ftco-animate"></div>
                                    </div>
                                    <?php
                                }

                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Footer NAV-->
        <?php
        /* include */
        $this->load->view('web/includes/footer-nav');
        ?>
        <!--END Footer NAV-->

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="<? echo base_url() . 'public/web/js/jquery.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/jquery-migrate-3.0.1.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/popper.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/bootstrap.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/jquery.easing.1.3.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/jquery.waypoints.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/jquery.stellar.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/owl.carousel.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/jquery.magnific-popup.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/aos.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/jquery.animateNumber.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/bootstrap-datepicker.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/scrollax.min.js'; ?>"></script>
        <script src="<? echo base_url() . 'public/web/js/main-app.js'; ?>"></script>

    </body>
</html>