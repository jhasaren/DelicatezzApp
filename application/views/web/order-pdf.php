<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Carrusel - Tienda Infantil</title>
    </head>
    <body>
        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0; width: 100%}
            .tg td{border-color:black;border-style:solid;border-width:0px;font-family:Arial, sans-serif;font-size:14px;
              overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:0px;font-family:Arial, sans-serif;font-size:14px;
              font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg .tg-0lax{text-align:left;vertical-align:top}
        </style>
        <table class="tg">
            <thead>
                <tr>
                    <th class="tg-0lax" style="width: 30%; text-align: center">
                        <img src="<?php echo FCPATH."public/web/images/logo_carrusel_orden.jpg" ?>" style="//width: 160px; height: auto">
                    </th>
                    <th class="tg-0lax" style="width: 50%">
                        <br />
                        <B>CARRUSEL TIENDA INFANTIL</B><br />
                        Leidy Johana Mendoza Yara<br />
                        RUT 1.112.462.813-0<br />
                        Régimen Simplificado
                    </th>
                    <th class="tg-0lax" style="text-align: center; width: 20%">
                        <br />
                        Nro. Cuenta de Cobro<br />
                        <span style="font-size: 30px; font-weight: bold"><?php echo $orden ?></span>
                    </th>
                </tr>
            </thead>
        </table>
        <br />
        <table class="tg" style="width: 90%; margin-left:auto; margin-right:auto;">
            <thead>
                <tr>
                    <th class="tg-0lax" style="width: 60%; background-color: #cccccc">
                        <B>Datos del Cliente</B><br />
                        Nombre: <?php echo $nombreCliente; ?><br />
                        Identificación: <?php echo $tipoCliente." ".$idCliente; ?><br />
                        Teléfono: <?php echo $movilCliente; ?><br />
                    </th>
                    <th class="tg-0lax" style="text-align: right; width: 40%">
                        infoclientes@tiendacarrusel.com<br />
                        Fecha [año/mes/día]: <?php echo date("Y/m/d"); ?><br />
                        Jamundí - Valle del Cauca<br />
                    </th>
                </tr>
            </thead>
        </table>
        <br />
        <table class="tg" style="width: 100%; margin-left:auto; margin-right:auto;">
            <thead>
                <tr style="color: #FFF; background-color: #cccccc">
                    <th class="tg-0lax" style="width: 40%; text-align: center">Item</th>
                    <th class="tg-0lax" style="width: 15%; text-align: center">Precio</th>
                    <th class="tg-0lax" style="width: 15%; text-align: center">Cantidad</th>
                    <th class="tg-0lax" style="width: 15%; text-align: center">Descuento</th>
                    <th class="tg-0lax" style="width: 15%; text-align: center">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($items as $value) {
                    ?>
                    <tr style="background-color: #ffcccc;">
                        <th class="tg-0lax"><?php echo $value['referencia']; ?></th>
                        <th class="tg-0lax">$<?php echo number_format($value['valor'],0,',','.'); ?></th>
                        <th class="tg-0lax"><?php echo $value['cantidad']; ?></th>
                        <th class="tg-0lax">$<?php echo number_format($value['descuento'],0,',','.'); ?></th>
                        <th class="tg-0lax">$<?php echo number_format(($value['valor']*$value['cantidad']-$value['descuento']),0,',','.'); ?></th>
                    </tr>
                    <?php
                    $acumValue = $acumValue + ($value['valor']*$value['cantidad']);
                    $acumDescuento = $acumDescuento + $value['descuento'];
                }
                ?>
            </tbody>
        </table>
        <table class="tg" style="width: 100%; margin-left:auto; margin-right:auto;">
            <thead>
                <tr>
                    <th class="tg-0lax" style="width: 100%; background-color: #cccccc">
                        <B>Cuenta de Ahorros 912131487-32 de Bancolombia</B>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="tg" style="width: 100%; margin-left:auto; margin-right:auto;">
            <thead style="line-height: 5px">
                <tr>
                    <th class="tg-0lax" style="width: 70%;">
                    </th>
                    <th class="tg-0lax" style="width: 15%;">
                        Subtotal
                    </th>
                    <th class="tg-0lax" style="width: 15%; ">
                        $ <?php echo number_format($acumValue,0,',','.'); ?>
                    </th>
                </tr>
                <tr>
                    <th class="tg-0lax" style="width: 70%;">
                    </th>
                    <th class="tg-0lax" style="width: 15%;">
                        Descuento
                    </th>
                    <th class="tg-0lax" style="width: 15%; ">
                        $ <?php echo number_format($acumDescuento,0,',','.'); ?>
                    </th>
                </tr>
                <tr>
                    <th class="tg-0lax" style="width: 70%;">
                    </th>
                    <th class="tg-0lax" style="width: 15%;">
                        Iva(0%)
                    </th>
                    <th class="tg-0lax" style="width: 15%; ">
                        $ 0
                    </th>
                </tr>
                <tr>
                    <th class="tg-0lax" style="width: 70%;">
                    </th>
                    <th class="tg-0lax" style="width: 15%; background-color: #cccccc">
                        <B>Total</B>
                    </th>
                    <th class="tg-0lax" style="width: 15%; background-color: #cccccc">
                        <B>$ <?php echo number_format(($acumValue-$acumDescuento),0,',','.'); ?></B>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="tg" style="width: 100%; margin-left:auto; margin-right:auto;">
            <thead style="line-height: 12px">
                <tr>
                    <th class="tg-0lax" style="width: 70%;">
                        <img src="<?php echo FCPATH."public/web/images/firma_digital_1112462813.jpg" ?>"style="//width: 140px; height: auto"><br />
                        Leidy Johana Mendoza Yara<br />
                        CC. 1112.469.153<br />
                        Dir. Calle 16 #17-31 Jamundí / Tel. (+57) 316 330 9422
                    </th>
                    <th class="tg-0lax" style="width: 30%; text-align: center">
                        <span style="font-size: 8px">Visita nuestra Tienda Virtual</span>
                        <br />
                        <img src="<?php echo FCPATH."public/web/images/qr_img_web.png" ?>"style="width: 140px; height: auto">
                    </th>
                </tr>
            </thead>
        </table>
    </body>
</html>