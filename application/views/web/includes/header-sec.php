<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url().'CPrincipal/'; ?>"><img src='<? echo base_url() . 'public/web/images/logo_carrusel2.png'; ?>' style="width: 35%; height: 35%" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="<?php echo base_url().'CPrincipal/'; ?>" class="nav-link" style="color: #ff00cc; font-size: 22px; font-family: 'Oleo Script', cursive;">Inicio</a></li>
                <li class="nav-item active"><a href="<?php echo base_url().'CPrincipal/line/4'; ?>" class="nav-link" style="color: #ff00cc; font-size: 22px; font-family: 'Oleo Script', cursive;">Tendencias</a></li>
                <li class="nav-item active"><a href="<?php echo base_url().'CPrincipal/line/1'; ?>" class="nav-link" style="color: #ff00cc; font-size: 22px; font-family: 'Oleo Script', cursive;">Catálogo</a></li>
                <li class="nav-item active"><a href="<?php echo base_url().'CPrincipal/line/5'; ?>" class="nav-link" style="color: #ff00cc; font-size: 22px; font-family: 'Oleo Script', cursive;">Mascotas</a></li>
                <li class="nav-item active"><a href="<?php echo base_url().'CPrincipal/contact'; ?>" class="nav-link" style="color: #ff00cc; font-size: 22px; font-family: 'Oleo Script', cursive;">Tiendas</a></li>
                <li class="nav-item active"><a href="#" data-toggle="modal" data-target="#detailModalMember" class="nav-link" style="color: #ff00cc; font-size: 28px; font-family: 'Oleo Script', cursive;" title="Identidad"><i class="fa fa-user-circle"></i></a></li>
            </ul>
            
        </div>
        <center>
            <img src="<? echo base_url() . 'public/web/images/app-carrusel.png'; ?>" style="" />
        </center>
    </div>
</nav>

<!-- Modal Membresia -->
<div class="modal-login fade" id="detailModalMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog center-modal" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffccff">
                <h5 class="modal-title" style="color: gray; font-size: 24px; font-family: 'Marck Script';">Membresía de Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <p style="color: #ff66ff; font-size: 24px; font-family: 'Oleo Script'; line-height: 25px">Registrate en nuestra tienda virtual</p>
                    Recibe Descuentos, Promociones y Obsequios en las próximas compras que realices.
                    <br /><br />

                    <div class="row">
                        <form class="col-md-12" name="form_login" action="<?php echo base_url().'CPrincipal/register'; ?>" method="post" onsubmit="disableSend()">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="movilPhone" class="col-sm-3 col-form-label" style="color: #000; font-weight: bold">#Teléfono Celular</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-lg" name='movilPhone' type="number" placeholder="316 330 0993" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="firstName" class="col-sm-3 col-form-label" style="color: #000; font-weight: bold">Nombres y Apellidos</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-lg" name='firstName' type="text" placeholder="John Sanchez" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-3 col-form-label" style="color: #000; font-weight: bold">Género</label>
                                <div class="col-sm-9">
                                    <select name='gender' class="form-control form-control-lg">
                                        <option value='M'>Masculino</option>
                                        <option value='F'>Femenino</option>
                                        <option value='S'>No definido</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label" style="color: #000; font-weight: bold">Correo Electrónico</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-lg" name='email' type="email" placeholder="johnsanchez@xyz.com" required=""><br />
                                </div>
                            </div>
                        </div>
                        <label><input type="checkbox" id="cbox1" value="terms" required="" > 
                            Acepto todos los <a href="<?php echo base_url().'CPrincipal/terminosCondiciones'; ?>" style="color: #ff00cc" target="_blank">Términos y Condiciones</a>
                        </label>
                        <label><input type="checkbox" id="cbox2" value="police" required=""> 
                            Acepto la <a href="<?php echo base_url().'CPrincipal/datosPersonales'; ?>" style="color: #ff00cc" target="_blank">Política de Datos Personales</a>
                        </label>
                        <br /><br />
                        <button class="btn-lg btn-secondary" id="btn-register" style="background-color: #46e271; border: none;">
                            <i class="fa fa-star"></i> Registrarme
                        </button>
                        </form>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--End Modal Membresia-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-176001045-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-176001045-1');
</script>
