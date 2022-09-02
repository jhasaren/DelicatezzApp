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
                        <span style="color: gray; font-size: 35px; font-family: 'Oleo Script', cursive;">Términos y Condiciones</span>
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
                                <B>POLÍTICA DE DEVOLUCIÓN</B>
                                <br /><br />
                                1. Todos los accesorios y prendas de uso personal <B>NO TIENEN DEVOLUCIÓN</B>, salvo que se presente un problema con la calidad del producto.
                                <br /><br />
                                2. Solo se realizarán <B>AJUSTES</B> sobre los productos entregados por diseños defectuosos y/o talla diferente a la elegida por el cliente al momento de la compra.
                                <br /><br />
                                3. Para cualquier duda o inquietud comunicarse con nosotros por los siguientes medios:
                                <br /><br />
                                • Nuestra línea de WhatsApp: <B>(+57) 316 330 9422</B><br />
                                • A través de nuestro correo electrónico: <B>infoclientes@tiendacarrusel.com</B><br />
                                <br /><br />
                                <B>PAGOS ELECTRÓNICOS</B>
                                <br /><br />
                                Adoptamos el uso de la pasarela de pagos <B>PayU</B> con el fin de garantizar total transparencia, seguridad y confianza en cada una de las transacciones electrónicas que realices en nuestro comercio. A continuación podrás encontrar toda la información relacionada con los términos y condiciones de uso de la pasarela como usuario comprador: 
                                <br /><a href="https://colombia.payu.com/legal" style="color: #ff00cc" target="_blank">https://colombia.payu.com/legal</a>
                                <br /><br /><br />
                                <B>POLÍTICA DE DATOS PERSONALES</B>
                                <br /><br />
                                En el siguiente enlace puedes consultar nuestra política de tratamiento de datos personales:
                                <br /><a href="<?php echo base_url().'CPrincipal/datosPersonales'; ?>" style="color: #ff00cc" target="_blank">Política de Datos Personales</a>
                                <br /><br /><br />
                            </p>
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