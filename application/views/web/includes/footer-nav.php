<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Redes Sociales</h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="https://www.facebook.com/Carrusel-Tienda-Infantil-105176157994600/" target="_blank"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.instagram.com/carrusel8686/" target="_blank"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Ayuda</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Preguntas Frecuentes</a></li>
                            <li><a href="<?php echo base_url().'CPrincipal/terminosCondiciones'; ?>" class="py-2 d-block">Términos y Condiciones</a></li>
                            <li><a href="<?php echo base_url().'CPrincipal/datosPersonales'; ?>" class="py-2 d-block">Política de Datos Personales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Tienes una pregunta?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+57 316 330 9422</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">infoclientes@tiendacarrusel.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<?php echo date('Y'); ?> | Todos los derechos reservados Tienda Carrusel
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>


<!--Bot Maria-->
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<style>
  df-messenger {
   --df-messenger-bot-message: #878fac;
   --df-messenger-button-titlebar-color: #df9b56;
   --df-messenger-chat-background-color: #fafafa;
   --df-messenger-font-color: white;
   --df-messenger-send-icon: #878fac;
   --df-messenger-user-message: #479b3d;
   --df-messenger-width: 250px;
  }
</style>
<df-messenger 
  chat-icon="<? echo base_url() . 'public/web/images/avatar3.png'; ?>"
  chat-title="Maria - Asesor Virtual Carrusel"
  agent-id="6074df98-af88-4256-b9a9-1c16241f8e1e"
  language-code="es"
  intent="WELCOME"
></df-messenger>



