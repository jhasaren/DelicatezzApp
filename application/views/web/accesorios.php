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
                        <img src="<? echo base_url() . 'public/web/images/icon-corbata.png'; ?>" /><br />
                        <span style="color: gray; font-size: 35px; font-family: 'Oleo Script', cursive;">Accesorios</span>
                        <!--<h1 class="mb-0 bread">Contacto</h1>-->
                        <p class="breadcrumbs"><span class="mr-2">Colección Bebes, Niñas</span></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Contenido-->        
        <section class="ftco-section-line">
            <div class="container-fluid">
                
                <!--Menu Catalogo-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="product ftco-animate">
                            <div class="item">
                                <div class="product">
                                    <div class="text pt-3 px-3"align="center">
                                        <h3 style="font-size: 35px; font-family: 'Oleo Script', cursive;">
                                            <a href="<?php echo base_url().'CPrincipal/line/1'; ?>" style="color: gray">
                                                <img style="width: 64px; height: 64px" src="<? echo base_url() . 'public/web/images/icon-mode.png'; ?>" />
                                                Ropa Infantil
                                            </a>
                                        </h3>
                                    </div>
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
                                            <a href="<?php echo base_url().'CPrincipal/line/5'; ?>" style="color: gray">
                                                <img style="width: 64px; height: 64px" src="<? echo base_url() . 'public/web/images/icon-pets.png'; ?>" />
                                                Mascotas
                                            </a>
                                        </h3>
                                    </div>
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
                                                <img style="width: 64px; height: 64px" src="<? echo base_url() . 'public/web/images/icon-cubo.png'; ?>" />
                                                Artículos
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Menu Catalogo-->
                
                <div class="row">
                    <?php if ($list_products !== FALSE){ ?>
                        <?php foreach($list_products as $obj){ ?>
                            <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                                <div class="product">
                                    <a href="#" data-toggle="modal" data-target="#detailModal" data-id="<?php echo $obj['idProducto']; ?>" class="img-prod detailModel" >
                                        <img class="img-fluid" src="<? echo $obj['urlImagen']; ?>" alt="<?php echo $obj['etiqueta']; ?>">
                                        <span class="status"><?php echo $obj['tags']; ?></span>
                                    </a>
                                    <div class="text py-3 px-3">
                                        <h3><a href="#"><?php echo $obj['nombreProducto']; ?></a></h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <p class="price"><span class="price-sale">REF: <?php echo $obj['referenciaProducto']; ?></span></p>
                                            </div>
                                            <div class="rating">
                                                <p class="text-right">
                                                    <span class="ion-ios-star" style="color: yellow;"></span>
                                                    <span class="ion-ios-star" style="color: yellow;"></span>
                                                    <span class="ion-ios-star" style="color: yellow;"></span>
                                                    <span class="ion-ios-star" style="color: yellow;"></span>
                                                    <span class="ion-ios-star" style="color: yellow;"></span>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { echo "<br /><br />"; } ?>
                </div>
                
                <!--Menu Catalogo-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="product ftco-animate">
                            <div class="item">
                                <div class="product">
                                    <div class="text pt-3 px-3"align="center">
                                        <h3 style="font-size: 35px; font-family: 'Oleo Script', cursive;">
                                            <a href="<?php echo base_url().'CPrincipal/line/1'; ?>" style="color: gray">
                                                <img style="width: 64px; height: 64px" src="<? echo base_url() . 'public/web/images/icon-mode.png'; ?>" />
                                                Ropa Infantil
                                            </a>
                                        </h3>
                                    </div>
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
                                            <a href="<?php echo base_url().'CPrincipal/line/5'; ?>" style="color: gray">
                                                <img style="width: 64px; height: 64px" src="<? echo base_url() . 'public/web/images/icon-pets.png'; ?>" />
                                                Mascotas
                                            </a>
                                        </h3>
                                    </div>
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
                                                <img style="width: 64px; height: 64px" src="<? echo base_url() . 'public/web/images/icon-cubo.png'; ?>" />
                                                Artículos
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Menu Catalogo-->
            </div>
        </section>
        <!--END Contenido-->
        

        <!--Footer NAV-->
        <?php
        /* include */
        $this->load->view('web/includes/footer-nav');
        ?>
        <!--END Footer NAV-->

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <!-- Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title nameModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <!--Imagenes Detalle-->
                            <div class="product owl-carousel imgList" style="margin-bottom: 1px;"></div>
                            <!--End Imagenes Detales-->
                            
                            <div class="test"></div>
                            
                            <!--Valor de Prenda-->
                            <div class="valorPrenda" style="font-size: 45px; color: #000"></div>
                            <!--END Valor de Prenda-->
                            <div class="mediosPago"></div><br />
                            <br />
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <div class="btn-contact"></div>
                        <!--<a href="#" class="btn btn-primary" style="background-color: red; color: #fff"><i class="fa fa-whatsapp"></i> Proceso de compra</a>-->
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal-->
        
        
        <!--<script src="https://tiendacarrusel.com/public/web/js/jquery.min.js"></script>-->
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
        <!--<script src="https://tiendacarrusel.com/public/web/js/main-app.js"></script>-->
        <script src="<? echo base_url() . 'public/web/js/main-app.js'; ?>"></script>

    </body>
</html>