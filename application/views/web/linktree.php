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
        //$this->load->view('web/includes/header-sec');
        ?>
        <!-- END nav -->

        <section class="ftco-section-cat contact-section">
            
            <center>
            <img src='<? echo base_url() . 'public/web/images/logo_carrusel2.png'; ?>' style="width: 220px; height: auto; margin-top: -50px" />
            </center>
            
            <div class="container">
                <div class="row d-flex contact-info">
                    <div class="w-100"></div>
                    <div class="col-md-4 d-flex" style="margin-top: 30px">
                        <a href="https://tiendacarrusel.com/CPrincipal/" class="btn btn-warning btn-lg" style="width: 100%; background-color: #ff99ff; color: #000; font-weight: bold">
                            <i class="fa fa-globe"></i> Portal Web
                        </a>
                    </div>
                    
                    <div class="col-md-4 d-flex" style="margin-top: 30px">
                        <a href="https://play.google.com/store/apps/details?id=com.tiendacarrusel.app&hl=es_419" class="btn btn-warning btn-lg" style="width: 100%; background-color: #ff99ff; color: #000; font-weight: bold">
                            <i class="fa fa-mobile"></i> App Móvil
                        </a>
                    </div>
                    
                    <div class="col-md-4 d-flex" style="margin-top: 30px">
                        <a href="https://wa.me/573163309422" class="btn btn-warning btn-lg" style="width: 100%; background-color: #ff99ff; color: #000; font-weight: bold">
                            <i class="fa fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
					
					<div class="col-md-4 d-flex" style="margin-top: 30px">
                        <a href="https://t.me/tiendacarrusel" class="btn btn-warning btn-lg" style="width: 100%; background-color: #ff99ff; color: #000; font-weight: bold">
                            <i class="fa fa-telegram"></i> Telegram
                        </a>
                    </div>
                </div>
            </div>
            <br /><br /><br /><br />
            <center>
                Copyright &copy;<?php echo date('Y'); ?> | Tienda Carrusel
            </center>
        </section>

        <!--Footer NAV-->
        <?php
        /* include */
        //$this->load->view('web/includes/footer-nav');
        ?>
        <!--END Footer NAV-->
        
        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen">
            <svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
        </div>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176001045-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-176001045-1');
        </script>

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