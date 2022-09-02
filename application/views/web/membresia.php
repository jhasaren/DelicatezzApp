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
    <body style="background-image: url('<? echo base_url() . 'public/web/images/memphis-colorful.png'; ?>');" >
        
        <?php
        /*Registro Exitoso*/
        if ($stateMessage === 0){
        ?>
            <div class="container">
                <center>
                <img src='<? echo base_url() . 'public/web/images/logo_carrusel2.png'; ?>' style="width: 35%; height: 35%" />
                <div class="card text-center" style="width: 80%; margin-top: 20px;">
                    <div class="card-header" style="color: gray; font-size: 35px; font-family: 'Oleo Script'; line-height: 25px">
                        Bienvenido y muchas gracias
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Te has registrado exitosamente!!</h5>
                        <p class="card-text" style="font-size: 16px; line-height: 18px;"><?php echo $message; ?></p>
                        <a href="<?php echo base_url().'CPrincipal/'; ?>" class="btn btn-success">Volver a la Tienda</a>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo date("Y-m-d H:i:s") ?>
                    </div>
                </div>
                <br />
                <span>
                    Copyright &copy;<?php echo date('Y'); ?> | Todos los derechos reservados Tienda Carrusel
                </span>
                </center>
            </div>
        <?php
        } else {
            
            /*Error en el registro*/
            if ($stateMessage === 1){
                ?>
                <div class="container">
                    <center>
                    <img src='<? echo base_url() . 'public/web/images/logo_carrusel_thumb.png'; ?>' style="margin-top: 25px" />
                    <div class="card text-center" style="width: 80%; margin-top: 20px;">
                        <div class="card-header" style="color: gray; font-size: 35px; font-family: 'Oleo Script'; line-height: 25px">
                            Algo paso, lo sentimos
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="color: gray"><i class="fa fa-frown-open"></i></h5>
                            <p class="card-text" style="font-size: 16px; line-height: 18px;"><?php echo $message; ?></p>
                            <a href="<?php echo base_url().'CPrincipal/'; ?>" class="btn btn-warning">Volver a la Tienda</a>
                        </div>
                        <div class="card-footer text-muted">
                            <?php echo date("Y-m-d H:i:s") ?>
                        </div>
                    </div>
                    <br />
                    <span>
                        Copyright &copy;<?php echo date('Y'); ?> | Todos los derechos reservados Tienda Carrusel
                    </span>
                    </center>
                </div>
                <?php
            }
            
        }
        ?>
        
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