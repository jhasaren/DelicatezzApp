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
        $this->load->view('web/includes/header-nav');
        ?>
        <!-- END nav -->

        <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url() . 'public/web/images/bg_home5.jpg'; ?>');">
            <!--<div class="overlay" style="background-color: #ff99ff"></div>-->
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <h3 class="v"><i class="fa fa-star"></i>Diseños a la medida<i class="fa fa-star"></i></h3>
                    <h3 class="vr"><i class="fa fa-star"></i>Tienda Infantil<i class="fa fa-star"></i></h3>
                    <div class="col-md-11 ftco-animate text-center">
                        <span class="title-home">Tienda Infantil</span>
                        <!--#ffcc00-->
<!--                        <h2>
                            <span style="color: #000">Amor</span>
                        </h2>-->
                    </div>
                    <div class="mouse">
                        <a href="#" class="mouse-icon">
                            <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
                        </a>
                        <center><img src="<? echo base_url() . 'public/web/images/app-carrusel.png'; ?>" style="" /></center>
                    </div>
                </div>
            </div>
        </div>

        <div class="goto-here"></div>

        <section class="ftco-section-cat ftco-product">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h1 class="big" style="color: #ffccff; font-family: 'Oleo Script', cursive;">Catálogo</h1>
                        <h2 class="mb-4" style="color: gray"><i class="fa fa-star"></i>Catálogo<i class="fa fa-star"></i></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="product ftco-animate">
                        <!--<div class="product-slider owl-carousel ftco-animate">-->
                            <div class="item">
                                <div class="product">
                                    <div class="text pt-3 px-3" align="center">
                                        <h3 style="color: #ffcc00; font-size: 35px; font-family: 'Oleo Script', cursive;">
                                            <a href="<?php echo base_url().'CPrincipal/line/1'; ?>" style="color: gray">
                                                <img style="color: gray; width: 32px; height: 32px" src="<? echo base_url() . 'public/web/images/icon-mode.png'; ?>" />
                                                Ropa Infantil
                                            </a>
                                        </h3>
                                    </div>
                                    <a href="<?php echo base_url().'CPrincipal/line/1'; ?>" class="img-prod"><img class="img-fluid" src="<? echo base_url() . 'public/web/images/categoria-1.jpg'; ?>" alt="Ropa Infantil">
                                        <span class="status">Colección Bebes, Niños y Niñas</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product ftco-animate">
                            <div class="item">
                                <div class="product">
                                    <div class="text pt-3 px-3"align="center">
                                        <h3 style="font-size: 35px; font-family: 'Oleo Script', cursive;">
                                            <a href="<?php echo base_url().'CPrincipal/line/2'; ?>" style="color: gray">
                                                <img style="color: gray; width: 32px; height: 32px" src="<? echo base_url() . 'public/web/images/icon-corbata.png'; ?>" />
                                                Accesorios
                                            </a>
                                        </h3>
                                    </div>
                                    <a href="<?php echo base_url().'CPrincipal/line/2'; ?>" class="img-prod"><img class="img-fluid" src="<? echo base_url() . 'public/web/images/categoria-2.jpg'; ?>" alt="Accesorios">
                                        <span class="status">Colección Bebes y Niñas</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="product ftco-animate">
                            <div class="item">
                                <div class="product">
                                    <div class="text pt-3 px-3" align="center">
                                        <h3 style="color: #ffcc00; font-size: 35px; font-family: 'Oleo Script', cursive;">
                                            <a href="<?php echo base_url().'CPrincipal/line/3'; ?>" style="color: gray">
                                                <img style="color: gray; width: 32px; height: 32px" src="<? echo base_url() . 'public/web/images/icon-cubo.png'; ?>" />
                                                Artículos
                                            </a>
                                        </h3>
                                    </div>
                                    <a href="<?php echo base_url().'CPrincipal/line/3'; ?>" class="img-prod"><img class="img-fluid" src="<? echo base_url() . 'public/web/images/categoria-3.jpg'; ?>" alt="Antojos">
                                        <span class="status">Varios Artículos</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
            <br />
            <div class="container">
                <div class="row">
                    <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<? echo base_url() . 'public/web/images/bg-006.jpg'; ?>);">
<!--                        <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                            <span class="icon-play"></span>
                        </a>-->
                    </div>
                    <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                        <div class="heading-section-bold mb-5 mt-md-5">
                            <div class="ml-md-0">
                                <center><img src='<? echo base_url() . 'public/web/images/logo_carrusel2.png'; ?>' style="width: 55%; height: 55%" /></center>
                            </div>
                        </div>
                        <div class="pb-md-5">
                            <p style="color: gray; font-size: 24px; font-family: 'Marck Script'; line-height: 25px">En Carrusel somos apasionados por la moda y por el diseño, nos enamora hacer feliz a nuestros clientes y en particular a los más pequeños.</p>
                            <p style="color: gray; font-size: 24px; font-family: 'Marck Script'; line-height: 25px">Actualmente contamos con línea de Ropa Infantil para bebes, niños y niñas; amplia variedad de accesorios para acompañar las prendas y una gran cantidad de artículos innovadores para los pequeños.</p>
                            <p style="color: gray; font-size: 24px; font-family: 'Marck Script'; line-height: 25px">Todos los productos de nuestro catálogo son elaborados 100% a mano, diseños totalmente ajustados a la medida. </p>
                            <center style="color: #ff66ff"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></center>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </section>

        <section class="ftco-section ftco-section-more img" style="background-image: url(<? echo base_url() . 'public/web/images/bg_home04.jpg'; ?>);">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                            <span style="color: gray; font-size: 55px; font-family: 'Oleo Script', cursive;">
                             Diseños a la medida
                            </span>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section-cat ftco-services">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h1 class="big" style="color: #ffccff; font-family: 'Oleo Script', cursive;">Calidad</h1>
                        <h2 class="mb-4">100% garantizados</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services">
                            <div class="icon d-flex justify-content-center align-items-center mb-4">
                                <img style="width: 128px; height: 128x" src="<? echo base_url() . 'public/web/images/el-respeto.png'; ?>" />
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Hechos a mano</h3>
                                <p>Todas las prendas, accesorios y artículos son elaborados por nosotros mismos.</p>
                            </div>
                        </div>      
                    </div>
                    <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services">
                            <div class="icon d-flex justify-content-center align-items-center mb-4">
                                <img style="width: 128px; height: 128x" src="<? echo base_url() . 'public/web/images/regalo.png'; ?>" />
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Todo Colombia</h3>
                                <p>Realizamos envios a cualquier parte del país.</p>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services">
                            <div class="icon d-flex justify-content-center align-items-center mb-4">
                                <img style="width: 128px; height: 128x" src="<? echo base_url() . 'public/web/images/aguja.png'; ?>" />
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Diseños a la Medida</h3>
                                <p>Elige el diseño de nuestro catálogo y lo hacemos a la medida de tú pequeño.</p>
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section bg-light">
            <div class="parallax-img d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center py-5">
                        <div class="col-md-7 text-center heading-section ftco-animate">
                            <h1 class="big">Recibimos</h1>
                            <h2><i class="fa fa-credit-card"></i> Todos los medios de pago</h2>
                            <div class="row d-flex justify-content-center mt-5">
                                <div class="col-md-8">
                                    <img class="responsive-img" src="<? echo base_url() . 'public/web/images/medios_pago.png'; ?>" />
                                </div>
                                <div class="col-md-4">
                                    <img class="" src="<? echo base_url() . 'public/web/images/pagobancolombia.png'; ?>" />
                                </div>
                            </div>
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