<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MPrincipal extends CI_Model {

    /*instancia la clase de conexion a la BD para este modelo*/
    public function __construct() {
        
        parent::__construct();
        $this->db->query("SET time_zone='-5:00'");
        //$this->db->query("SET time_zone='America/Bogota'");
        
    }


    /**************************************************************************/
    public function verifymail($mail) {
                
        $query = $this->db->query("SELECT
                                u.idUsuario,
                                u.nombreUsuario,
                                u.identificacion,
                                u.correoElectronico,
                                u.password,
                                u.activo,
                                u.idRol,
                                r.nombreRol,
                                c.idComercio,
                                c.nombreComercio,
                                c.direccion,
                                c.telefono,
                                c.nombrePropietario,
                                c.horarioAtencion,
                                c.activo,
                                c.imgURLComercio
                                FROM usuarios u
                                JOIN roles r ON u.idRol = r.idRol
                                LEFT JOIN info_comercio c ON u.idUsuario = c.idUsuario
                                WHERE
                                u.correoElectronico = '".$mail."'");
        
        $cant = $query->num_rows();
        
        if($cant>0){
            
            return $query->row();
            
        } else {
            
            return FALSE;
            
        }
        
    }

    /**************************************************************************/
    public function setVisitant($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->query("INSERT INTO
                            usuarios (
                            nombreUsuario,
                            identificacion,
                            correoElectronico,
                            password,
                            activo,
                            fechaRegistro,
                            idRol
                            ) VALUES (
                            '".$data['name']."',
                            NULL,
                            '".$data['email']."',
                            '".$data['passwd']."',
                            'S',
                            NOW(),
							1)");
        
        $idClient = $this->db->insert_id();
        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return $idClient;

        }
        
    }


    /**************************************************************************/
    public function setComercio($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->query("INSERT INTO
                            usuarios (
                            nombreUsuario,
                            identificacion,
                            correoElectronico,
                            password,
                            activo,
                            fechaRegistro,
                            idRol
                            ) VALUES (
                            '".$data['nameProp']."',
                            '".$data['identificacion']."',
                            '".$data['email']."',
                            '".$data['passwd']."',
                            'S',
                            NOW(),
							2)");
        
        $idClient = $this->db->insert_id();

        $this->db->query("INSERT INTO
                            info_comercio (
                            nombreComercio,
                            direccion,
                            telefono,
                            nombrePropietario,
                            horarioAtencion,
                            activo,
                            imgURLComercio,
                            idUsuario
                            ) VALUES (
                            '".$data['name']."',
                            '".$data['direccion']."',
                            '".$data['movil']."',
                            '".$data['nameProp']."',
                            '".$data['horario']."',
                            'S',
                            'https://delicatezzapp.amadeusoluciones.tech/public/web/img/img_comercio_gen.png',
							".$idClient.")");

        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return $idClient;

        }
        
    }









    
    /***************************************************************************/
    public function getproducts($line) {
        
        /* MySQL */
        if ($line == 4){
            $query = $this->db->query("SELECT
                                p.idProducto,
                                c.idCategoria,
                                ca.nombreCategoria,
                                p.referenciaProducto,
                                p.nombreProducto,
                                p.descProducto,
                                p.tags,
                                i.urlImagen,
                                i.etiqueta,
                                '573163309422' as movilContact
                                FROM
                                productos p
                                JOIN productos_categorias c ON c.idProducto = p.idProducto
                                JOIN categorias_catalogo ca ON ca.idCategoria = c.idCategoria
                                LEFT JOIN imagenes_producto i ON i.idProducto = p.idProducto AND i.principal = 'Y' AND i.activo = 'Y'
                                WHERE
                                p.activo = 'Y'
                                and ca.activo = 'Y'
                                and p.tendencia = 'Y' 
                                order by rand()");
        } else {
            $query = $this->db->query("SELECT
                                p.idProducto,
                                c.idCategoria,
                                ca.nombreCategoria,
                                p.referenciaProducto,
                                p.nombreProducto,
                                p.descProducto,
                                p.tags,
                                i.urlImagen,
                                i.etiqueta,
                                '573163309422' as movilContact
                                FROM
                                productos p
                                JOIN productos_categorias c ON c.idProducto = p.idProducto
                                JOIN categorias_catalogo ca ON ca.idCategoria = c.idCategoria
                                LEFT JOIN imagenes_producto i ON i.idProducto = p.idProducto AND i.principal = 'Y' AND i.activo = 'Y'
                                WHERE
                                p.activo = 'Y'
                                and ca.activo = 'Y'
                                and c.idCategoria = ".$line." order by rand()");
        }

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result_array();

        }
        
    }
    
    /***************************************************************************/
    public function getdetailproduct($idProduct) {
        
        /* MySQL */
        $query = $this->db->query("SELECT
                                p.idProducto,
                                c.idCategoria,
                                ca.nombreCategoria,
                                p.referenciaProducto,
                                p.nombreProducto,
                                p.descProducto,
                                p.tags,
                                p.valueItemSite,
                                p.valueItemApp,
                                p.tendencia
                                FROM
                                productos p
                                JOIN productos_categorias c ON c.idProducto = p.idProducto
                                JOIN categorias_catalogo ca ON ca.idCategoria = c.idCategoria
                                WHERE
                                p.idProducto = ".$idProduct."
                                and p.activo = 'Y'
                                and ca.activo = 'Y'");

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result_array();

        }
        
    }
    
    /***************************************************************************/
    public function getimageproduct($idProduct) {
        
        /* MySQL */
        $query = $this->db->query("SELECT
                                ip.idImagen,
                                ip.urlImagen,
                                ip.etiqueta,
                                ip.principal
                                FROM
                                imagenes_producto ip
                                WHERE
                                ip.idProducto = ".$idProduct."
                                AND ip.activo = 'Y'
                                ORDER BY ip.principal DESC");

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result_array();

        }
        
    }
    
    /***************************************************************************/
    public function getrangesproduct($idProduct) {
        
        /* MySQL */
        $query = $this->db->query("SELECT
                                pr.idItem,
                                pr.idProducto,
                                pr.idRango,
                                pr.valorItemSite,
                                pr.valorItemApp,
                                re.nombreRango
                                FROM
                                productos_rango pr
                                JOIN rango_edad re ON re.idRango = pr.idRango AND re.activo = 'Y'
                                WHERE
                                pr.idProducto = ".$idProduct."
                                ORDER BY pr.idItem ASC");

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result_array();

        }
        
    }
    
    /***************************************************************************/
    public function gettalesrange($idRange) {
        
        /* MySQL */
        $query = $this->db->query("SELECT
                                t.idTalla,
                                t.descTalla
                                FROM tallas t
                                WHERE
                                t.idRango = ".$idRange."
                                AND t.activo = 'Y'
                                ORDER BY t.idTalla,t.descTalla DESC");

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result_array();

        }
        
    }
    
    /***************************************************************************/
    public function getListType() {
        
        /* MySQL */
        $query = $this->db->query("SELECT
                                c.idCategoria,
                                c.nombreCategoria,
                                (SELECT max(p.referenciaProducto)
                                FROM productos p
                                JOIN productos_categorias cp ON cp.idProducto = p.idProducto
                                WHERE
                                cp.idCategoria = c.idCategoria) as ultimaRef
                                FROM categorias_catalogo c
                                WHERE
                                c.activo = 'Y'
                                AND c.idCategoria IN (1,2,3)
                                ORDER BY 1");

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result_array();

        }
        
    }
    
    
    
    /**************************************************************************/
    public function verifylogin($data) {
                
        $query = $this->db->query("SELECT
                                u.idUsuarioApp,
                                u.identificacion,
                                u.nombreUsuarioApp,
                                u.activo
                                FROM usuarios_app u
                                WHERE
                                u.identificacion = '".$data['username']."'
                                and u.password = '".$data['password']."'");
        
        $cant = $query->num_rows();
        
        if($cant>0){
            
            return $query->row();
            
        } else {
            
            return FALSE;
            
        }
        
    }
    
        
    /**************************************************************************/
    public function setStatProduct($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->query("INSERT INTO
                            hits_producto (
                            idProducto,
                            idCliente,
                            fechaRegistro,
                            tipoHit
                            ) VALUES (
                            '".$data['idProduct']."',
                            '".$data['idUser']."',
                            NOW(),
                            '".$data['typeHit']."')");
        
        $idHit = $this->db->insert_id();
        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return $idHit;

        }
        
    }
    
    /**************************************************************************/
    public function setVisitApp($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->query("UPDATE clientes SET ultimoIngreso = NOW() WHERE idCliente = ".$data['idUser']."");
        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return "OK";

        }
        
    }
    
    /**************************************************************************/
    public function setImgFile($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        
        if ($data['portada'] == 'Y'){
            $this->db->query("UPDATE
                            imagenes_producto 
                            SET
                            principal = 'N'
                            WHERE
                            idProducto = ".$data['idProducto']."");
        }
        
        $this->db->query("INSERT INTO
                            imagenes_producto (
                            idProducto,
                            urlImagen,
                            principal,
                            etiqueta,
                            activo,
                            fechaCreacion
                            ) VALUES (
                            '".$data['idProducto']."',
                            'https://tiendacarrusel.com/public/web/images/".$data['category']."/".$data['nameLoad']."',
                            '".$data['portada']."',
                            '".$data['tagsImage']."',
                            'Y',
                            NOW())");
        
        $idImage = $this->db->insert_id();
        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return $idImage;

        }
        
    }
    
    /**************************************************************************/
    public function setProduct($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->query("INSERT INTO
                            productos (
                            referenciaProducto,
                            nombreProducto,
                            descProducto,
                            tags,
                            activo,
                            valueItemSite,
                            valueItemApp,
                            tendencia,
                            fechaCreacion
                            ) VALUES (
                            '".$data['ref']."',
                            '".$data['name']."',
                            '".$data['desc']."',
                            '".$data['tags']."',
                            'Y',
                            '".$data['valueSite']."',
                            '".$data['valueApp']."',
                            '".$data['tendence']."',
                            NOW()
                            )");
        
        $idProduct = $this->db->insert_id();
        
        $this->db->query("INSERT INTO
                            productos_categorias (
                            idProducto,
                            idCategoria
                            ) VALUES (
                            ".$idProduct.",
                            ".$data['category'].")");
        
        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return $idProduct;

        }
        
    }
    
    /***************************************************************************/
    public function talesBot($data) {
        
        $tallasFormat = array(
            '3M' => 1,
            '6M' => 2,
            '9M' => 3,
            '12M' => 4,
            '18M' => 5,
            '2T' => 6,
            '4T' => 7,
            '6T' => 8,
            '8T' => 9,
            '10T' => 10,
            '12T' => 11,
            '14T' => 12,
            '16T' => 13
        );
        
        log_message("DEBUG", "*********************************************");
        log_message("DEBUG", $tallasFormat['3M']);
        log_message("DEBUG", $tallasFormat['6M']);
        log_message("DEBUG", $tallasFormat['9M']);
        log_message("DEBUG", "*********************************************");
        
        /*Medida en Pecho*/
        if ($data['pecho'] < 40){
            //$tallaPecho = 'NA';
            $tallaPecho = $tallasFormat['3M'];
        }
        if ($data['pecho'] >= 40 && $data['pecho'] <=48){
            //$tallaPecho = '3-MESES';
            $tallaPecho = $tallasFormat['3M'];
        }
        if ($data['pecho'] >= 49 && $data['pecho'] <=51){
            $tallaPecho = $tallasFormat['6M'];
        }
        if ($data['pecho'] >= 52 && $data['pecho'] <=55){
            $tallaPecho = $tallasFormat['9M'];
        }
        if ($data['pecho'] >= 56 && $data['pecho'] <=57){
            $tallaPecho = $tallasFormat['12M'];
        }
        if ($data['pecho'] >= 58 && $data['pecho'] <=59){
            $tallaPecho = $tallasFormat['18M'];
        }
        if ($data['pecho'] >= 60 && $data['pecho'] <=63){
            $tallaPecho = $tallasFormat['2T'];
        }
        if ($data['pecho'] >= 64 && $data['pecho'] <=67){
            $tallaPecho = $tallasFormat['4T'];
        }
        if ($data['pecho'] >= 68 && $data['pecho'] <=71){
            $tallaPecho = $tallasFormat['6T'];
        }
        if ($data['pecho'] >= 72 && $data['pecho'] <=75){
            $tallaPecho = $tallasFormat['8T'];
        }
        if ($data['pecho'] >= 76 && $data['pecho'] <=79){
            $tallaPecho = $tallasFormat['10T'];
        }
        if ($data['pecho'] >= 80 && $data['pecho'] <=83){
            $tallaPecho = $tallasFormat['12T'];
        }
        if ($data['pecho'] >= 84 && $data['pecho'] <=87){
            $tallaPecho = $tallasFormat['14T'];
        }
        if ($data['pecho'] >= 88 && $data['pecho'] <=92){
            $tallaPecho = $tallasFormat['16T'];
        }
        if ($data['pecho'] > 92){
            //$tallaPecho = 'NA';
            $tallaPecho = $tallasFormat['16T'];
        }
        /************************************************/
        
        /*Medida en Cintura*/
        if ($data['cintura'] < 46){
            $tallaCintura = $tallasFormat['3M'];
        }
        if ($data['cintura'] >= 46 && $data['cintura'] <=50){
            //$tallaCintura = '3-MESES';
            $tallaCintura = $tallasFormat['3M'];
        }
        if ($data['cintura'] >= 51 && $data['cintura'] <=51){
            $tallaCintura = $tallasFormat['6M'];
        }
        if ($data['cintura'] >= 52 && $data['cintura'] <=54){
            $tallaCintura = $tallasFormat['9M'];
        }
        if ($data['cintura'] >= 55 && $data['cintura'] <=55){
            $tallaCintura = $tallasFormat['12M'];
        }
        if ($data['cintura'] >= 56 && $data['cintura'] <=56){
            $tallaCintura = $tallasFormat['18M'];
        }
        if ($data['cintura'] >= 57 && $data['cintura'] <=57){
            $tallaCintura = $tallasFormat['2T'];
        }
        if ($data['cintura'] >= 58 && $data['cintura'] <=58){
            $tallaCintura = $tallasFormat['4T'];
        }
        if ($data['cintura'] >= 59 && $data['cintura'] <=59){
            $tallaCintura = $tallasFormat['6T'];
        }
        if ($data['cintura'] >= 60 && $data['cintura'] <=60){
            $tallaCintura = $tallasFormat['8T'];
        }
        if ($data['cintura'] >= 61 && $data['cintura'] <=61){
            $tallaCintura = $tallasFormat['10T'];
        }
        if ($data['cintura'] >= 62 && $data['cintura'] <=62){
            $tallaCintura = $tallasFormat['12T'];
        }
        if ($data['cintura'] >= 63 && $data['cintura'] <=63){
            $tallaCintura = $tallasFormat['14T'];
        }
        if ($data['cintura'] >= 64 && $data['cintura'] <=64){
            $tallaCintura = $tallasFormat['16T'];
        }
        if ($data['cintura'] > 64){
            $tallaCintura = $tallasFormat['16T'];
        }
        /************************************************/
        
        /*Medida en Cadera*/
        if ($data['cadera'] < 48){
            //$tallaCadera = 'NA';
            $tallaCadera = $tallasFormat['3M'];
        }
        if ($data['cadera'] >= 48 && $data['cadera'] <=50){
            //$tallaCadera = '3-MESES';
            $tallaCadera = $tallasFormat['3M'];
        }
        if ($data['cadera'] >= 51 && $data['cadera'] <=51){
            $tallaCadera = $tallasFormat['6M'];
        }
        if ($data['cadera'] >= 52 && $data['cadera'] <=59){
            $tallaCadera = $tallasFormat['9M'];
        }
        if ($data['cadera'] >= 60 && $data['cadera'] <=61){
            $tallaCadera = $tallasFormat['12M'];
        }
        if ($data['cadera'] >= 62 && $data['cadera'] <=63){
            $tallaCadera = $tallasFormat['18M'];
        }
        if ($data['cadera'] >= 64 && $data['cadera'] <=67){
            $tallaCadera = $tallasFormat['2T'];
        }
        if ($data['cadera'] >= 68 && $data['cadera'] <=71){
            $tallaCadera = $tallasFormat['4T'];
        }
        if ($data['cadera'] >= 72 && $data['cadera'] <=75){
            $tallaCadera = $tallasFormat['6T'];
        }
        if ($data['cadera'] >= 76 && $data['cadera'] <=79){
            $tallaCadera = $tallasFormat['8T'];
        }
        if ($data['cadera'] >= 80 && $data['cadera'] <=83){
            $tallaCadera = $tallasFormat['10T'];
        }
        if ($data['cadera'] >= 84 && $data['cadera'] <=87){
            $tallaCadera = $tallasFormat['12T'];
        }
        if ($data['cadera'] >= 88 && $data['cadera'] <=91){
            $tallaCadera = $tallasFormat['14T'];
        }
        if ($data['cadera'] >= 92 && $data['cadera'] <=95){
            $tallaCadera = $tallasFormat['16T'];
        }
        if ($data['cadera'] >95){
            $tallaCadera = $tallasFormat['16T'];
        }
        /************************************************/
        
        /*Medida en Pantalon*/
        if ($data['pantalon'] < 32 || $data['pantalon'] >105){
            //$tallaPantalon = 'NA';
            $tallaPantalon = $tallasFormat['3M'];
        }
        if ($data['pantalon'] >= 32 && $data['pantalon'] <=40){
            //$tallaPantalon = '3-MESES';
            $tallaPantalon = $tallasFormat['3M'];
        }
        if ($data['pantalon'] >= 41 && $data['pantalon'] <=44){
            $tallaPantalon = $tallasFormat['6M'];
        }
        if ($data['pantalon'] >= 45 && $data['pantalon'] <=49){
            $tallaPantalon = $tallasFormat['9M'];
        }
        if ($data['pantalon'] >= 50 && $data['pantalon'] <=54){
            $tallaPantalon = $tallasFormat['12M'];
        }
        if ($data['pantalon'] >= 55 && $data['pantalon'] <=57){
            $tallaPantalon = $tallasFormat['18M'];
        }
        if ($data['pantalon'] >= 58 && $data['pantalon'] <=63){
            $tallaPantalon = $tallasFormat['2T'];
        }
        if ($data['pantalon'] >= 64 && $data['pantalon'] <=69){
            $tallaPantalon = $tallasFormat['4T'];
        }
        if ($data['pantalon'] >= 70 && $data['pantalon'] <=75){
            $tallaPantalon = $tallasFormat['6T'];
        }
        if ($data['pantalon'] >= 76 && $data['pantalon'] <=81){
            $tallaPantalon = $tallasFormat['8T'];
        }
        if ($data['pantalon'] >= 82 && $data['pantalon'] <=87){
            $tallaPantalon = $tallasFormat['10T'];
        }
        if ($data['pantalon'] >= 88 && $data['pantalon'] <=93){
            $tallaPantalon = $tallasFormat['12T'];
        }
        if ($data['pantalon'] >= 94 && $data['pantalon'] <=99){
            $tallaPantalon = $tallasFormat['14T'];
        }
        if ($data['pantalon'] >= 100 && $data['pantalon'] <=105){
            $tallaPantalon = $tallasFormat['16T'];
        }
        if ($data['pantalon'] >105){
            //$tallaPantalon = 'NA';
            $tallaPantalon = $tallasFormat['16T'];
        }
        /************************************************/
        
        /*Medida en Estatura*/
        if ($data['estatura'] < 50){
            //$tallaEstatura = 'NA';
            $tallaEstatura = $tallasFormat['3M'];
        }
        if ($data['estatura'] >= 50 && $data['estatura'] <=58){
            //$tallaEstatura = '3-MESES';
            $tallaEstatura = $tallasFormat['3M'];
        }
        if ($data['estatura'] >= 59 && $data['estatura'] <=67){
            $tallaEstatura = $tallasFormat['6M'];
        }
        if ($data['estatura'] >= 68 && $data['estatura'] <=74){
            $tallaEstatura = $tallasFormat['9M'];
        }
        if ($data['estatura'] >= 75 && $data['estatura'] <=77){
            $tallaEstatura = $tallasFormat['12M'];
        }
        if ($data['estatura'] >= 78 && $data['estatura'] <=82){
            $tallaEstatura = $tallasFormat['18M'];
        }
        if ($data['estatura'] >= 83 && $data['estatura'] <=102){
            $tallaEstatura = $tallasFormat['2T'];
        }
        if ($data['estatura'] >= 103 && $data['estatura'] <=112){
            $tallaEstatura = $tallasFormat['4T'];
        }
        if ($data['estatura'] >= 113 && $data['estatura'] <=122){
            $tallaEstatura = $tallasFormat['6T'];
        }
        if ($data['estatura'] >= 123 && $data['estatura'] <=132){
            $tallaEstatura = $tallasFormat['8T'];
        }
        if ($data['estatura'] >= 133 && $data['estatura'] <=142){
            $tallaEstatura = $tallasFormat['10T'];
        }
        if ($data['estatura'] >= 143 && $data['estatura'] <=152){
            $tallaEstatura = $tallasFormat['12T'];
        }
        if ($data['estatura'] >= 153 && $data['estatura'] <=154){
            $tallaEstatura = $tallasFormat['14T'];
        }
        if ($data['estatura'] >= 155 && $data['estatura'] <=158){
            $tallaEstatura = $tallasFormat['16T'];
        }
        if ($data['estatura'] >158){
            //$tallaEstatura = 'NA';
            $tallaEstatura = $tallasFormat['16T'];
        }
        /************************************************/
                
        log_message("DEBUG", "===calculateTales===");
        log_message("DEBUG", "pecho -> ".$tallaPecho);
        log_message("DEBUG", "cintura -> ".$tallaCintura);
        log_message("DEBUG", "cadera -> ".$tallaCadera);
        log_message("DEBUG", "pantalon -> ".$tallaPantalon);
        log_message("DEBUG", "estatura -> ".$tallaEstatura);
        
        /*Prendas Superiores*/
        if ($tallaPecho == 'NA' || $tallaCintura == 'NA' || $tallaCadera == 'NA'){
            $response['superior'] = "Lo siento mucho, con los datos y medidas indicadas no encuentro una talla sugerida para prendas superiores.";
        } else {
            if (($tallaPecho == $tallaCintura) && ($tallaPecho == $tallaCadera)){ /*Todas las medidas en la misma talla*/
                if ($tallaEstatura == $tallaPecho){
                    $tallaDef = array_search($tallaPecho,$tallasFormat);
                    $response['superior'] = "La talla sugerida para prendas superiores de ".$data['genero']." de acuerdo a las medidas es ".$tallaDef.".";
                } else {
                    if ($tallaPecho > $tallaEstatura){
                        $tallaDef = array_search(($tallaPecho),$tallasFormat);
                        $response['superior'] = "La talla sugerida para prendas superiores de ".$data['genero']." de acuerdo a las medidas es ".$tallaDef.".";
                    } else {
                        $tallaDef = array_search($tallaEstatura,$tallasFormat);
                        $response['superior'] = "La talla sugerida para prendas superiores de ".$data['genero']." de acuerdo a las medidas es ".$tallaDef.".";
                    }
                }
            }
            if (($tallaPecho == $tallaCintura) && ($tallaPecho !== $tallaCadera)){ /*Pecho y Cintura igual, pero diferente cadera*/
                if ($tallaEstatura == $tallaPecho){
                    $tallaDef = array_search($tallaPecho,$tallasFormat);
                    $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, pero es importante suministrar la medida de Cadera a nuestra diseñadora para tener una prenda de ".$data['genero']." mejor ajustada.";
                } else {
                    if ($tallaPecho > $tallaEstatura){
                        $tallaDef = array_search(($tallaPecho),$tallasFormat);
                        $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, pero es importante suministrar la medida de Cadera a nuestra diseñadora para tener una prenda de ".$data['genero']." mejor ajustada.";
                    } else {
                        $tallaDef = array_search($tallaEstatura,$tallasFormat);
                        $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, pero es importante suministrar la medida de Cadera a nuestra diseñadora para tener una prenda de ".$data['genero']." mejor ajustada.";
                    }
                }
            }
            if (($tallaPecho !== $tallaCintura) && ($tallaCintura == $tallaCadera)){ /*Cintura y Cadera igual, pero diferente pecho*/
                if ($tallaEstatura == $tallaCadera){
                    $tallaDef = array_search($tallaCadera,$tallasFormat);
                    $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, pero es importante suministrar la medida de Pecho a nuestra diseñadora para tener una prenda de ".$data['genero']." mejor ajustada.";
                } else {
                    if ($tallaCadera > $tallaEstatura){
                        $tallaDef = array_search(($tallaCadera),$tallasFormat);
                        $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, pero es importante suministrar la medida de Pecho a nuestra diseñadora para tener una prenda de ".$data['genero']." mejor ajustada.";
                    } else {
                        $tallaDef = array_search($tallaEstatura,$tallasFormat);
                        $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, pero es importante suministrar la medida de Pecho a nuestra diseñadora para tener una prenda de ".$data['genero']." mejor ajustada.";
                    }
                }
            }
            if (($tallaPecho == $tallaCadera) && ($tallaPecho !== $tallaCintura)){ /*Pecho y Cadera igual, pero diferente cintura*/
                if ($tallaEstatura == $tallaPecho){
                    $tallaDef = array_search($tallaPecho,$tallasFormat);
                    $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, sin embargo es importante informar a nuestra diseñadora la medida en Cintura para tener una prenda de ".$data['genero']." mejor ajustada.";
                } else {
                    if ($tallaPecho > $tallaEstatura){
                        $tallaDef = array_search(($tallaPecho),$tallasFormat);
                        $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, sin embargo es importante informar a nuestra diseñadora la medida en Cintura para tener una prenda de ".$data['genero']." mejor ajustada.";
                    } else {
                        $tallaDef = array_search($tallaEstatura,$tallasFormat);
                        $response['superior'] = "Con las medidas y datos suministrados te puedo decir que la talla ".$tallaDef." podria servirle para prendas superiores, sin embargo es importante informar a nuestra diseñadora la medida en Cintura para tener una prenda de ".$data['genero']." mejor ajustada.";
                    }
                }
            }
            if (($tallaPecho !== $tallaCadera) && ($tallaPecho !== $tallaCintura) && ($tallaCintura !== $tallaCadera)){ /*Todas las tallas diferentes*/
                $tallaDef = array_search($tallaEstatura,$tallasFormat);
                $response['superior'] = "Te informo que con los datos y las medidas suministradas no fue posible estimar una talla estándar para ".$data['genero']." en prendas superiores, por la estatura podria decirte que la talla es ".$tallaDef." pero te sugiero hablar directamente con nuestra diseñadora para una asesoría más especializada.";
            }
        }
        /*******************/
        
        /*Prendas Inferiores*/
        if ($tallaCadera == 'NA' || $tallaCintura == 'NA' || $tallaPantalon == 'NA'){
            $response['inferior'] = "En prendas inferiores para ".$data['genero']." no tenemos una talla estimada.";
        } else {
            if (($tallaCadera == $tallaCintura) && ($tallaCadera == $tallaPantalon)){ /*Todas las mismas tallas*/
                if ($tallaEstatura == $tallaCadera){
                    $tallaDef = array_search($tallaCadera,$tallasFormat);
                    $response['inferior'] = "La talla sugerida para prendas inferiores de ".$data['genero']." es ".$tallaDef;
                } else {
                    if ($tallaCadera > $tallaEstatura){
                        $tallaDef = array_search(($tallaCadera),$tallasFormat);
                        $response['inferior'] = "La talla sugerida para prendas inferiores de ".$data['genero']." es ".$tallaDef;
                    } else {
                        $tallaDef = array_search($tallaEstatura,$tallasFormat);
                        $response['inferior'] = "La talla sugerida para prendas inferiores de ".$data['genero']." es ".$tallaDef;
                    }
                }
            }
            if (($tallaCadera == $tallaCintura) && ($tallaCadera !== $tallaPantalon)){ /*Cadera y Cintura igual, diferente pantalon*/
                if ($tallaEstatura == $tallaCadera){
                    $tallaDef = array_search($tallaCadera,$tallasFormat);
                    $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida de Pantalón para que la prenda sea a la medida.";
                } else {
                    if ($tallaCadera > $tallaEstatura){
                        $tallaDef = array_search(($tallaCadera),$tallasFormat);
                        $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida de Pantalón para que la prenda sea a la medida.";
                    } else {
                        $tallaDef = array_search($tallaEstatura,$tallasFormat);
                        $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida de Pantalón para que la prenda sea a la medida.";
                    }
                }
            }
            if (($tallaCadera !== $tallaCintura) && ($tallaCintura == $tallaPantalon)){ /*Pantalon y Cintura igual, diferente cadera*/
                if ($tallaEstatura == $tallaCintura){
                    $tallaDef = array_search($tallaCintura,$tallasFormat);
                    $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida en Cadera para que la prenda sea a la medida.";
                } else {
                    if ($tallaCintura > $tallaEstatura){
                        $tallaDef = array_search(($tallaCintura),$tallasFormat);
                        $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida en Cadera para que la prenda sea a la medida.";
                    } else {
                        $tallaDef = array_search($tallaEstatura,$tallasFormat);
                        $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida en Cadera para que la prenda sea a la medida.";
                    }
                }
            }
            if (($tallaCadera == $tallaPantalon) && ($tallaCadera !== $tallaCintura)){ /*Cadera y Pantalon igual, diferente cintura*/
                if ($tallaEstatura == $tallaCadera){
                    $tallaDef = array_search($tallaCadera,$tallasFormat);
                    $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida en Cintura para que la prenda sea a la medida.";
                } else {
                    if ($tallaCadera > $tallaEstatura){
                        $tallaDef = array_search(($tallaCadera),$tallasFormat);
                        $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida en Cintura para que la prenda sea a la medida.";
                    } else {
                        $tallaDef = array_search($tallaEstatura,$tallasFormat);
                        $response['inferior'] = "Para las prendas inferiores la talla sugerida es ".$tallaDef.", considero tener en cuenta la medida en Cintura para que la prenda sea a la medida.";
                    }
                }
            }
            if (($tallaCadera !== $tallaCintura) && ($tallaCintura !== $tallaPantalon) && ($tallaCadera !== $tallaPantalon)){ /*Todas diferentes*/
                $tallaDef = array_search($tallaEstatura,$tallasFormat);
                $response['inferior'] = "Para las prendas inferiores no es posible calcular una talla estándar, por la estatura podria servirle la talla ".$tallaDef.", pero lo recomendable en este caso es asesorarte mejor con nuestra diseñadora.";
            }
        }
        /*******************/
        
        log_message("DEBUG", "===responseBOT===");
        log_message("DEBUG", "superior -> ".$response['superior']);
        log_message("DEBUG", "inferior -> ".$response['inferior']);
        log_message("DEBUG", "*************************************************");
        
        return $response;
        
    }
    
    /**************************************************************************/
    public function setOrderPay($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->query("INSERT INTO
                            ordenes_pago (
                            nombreUsuario,
                            tipoUsuario,
                            idUsuario,
                            movilUsuario,
                            fechaOrden,
                            idEstado
                            ) VALUES (
                            '".strtoupper($data['usuario']['nombre'])."',
                            '".$data['usuario']['tipoid']."',
                            '".$data['usuario']['id']."',
                            '".$data['usuario']['movil']."',
                            NOW(),
                            '1'
                            )");
        
        $idOrden = $this->db->insert_id();
        $acumValue = 0;
        
        foreach ($data['items'] as $value) {
            
            $this->db->query("INSERT INTO
                            item_orden (
                            referencia,
                            nombre,
                            valorUnidad,
                            descuento,
                            cantidad,
                            idOrden
                            ) VALUES (
                            '".strtoupper($value['referencia'])."',
                            'ITEM DESC',
                            ".$value['valor'].",
                            ".$value['descuento'].",
                            ".$value['cantidad'].",
                            ".$idOrden."
                            )");
            
            $acumValue = $acumValue + ($value['valor']*$value['cantidad']);
            
        }
        
        /*Actualiza Datos Generales*/
        $this->db->query("UPDATE 
                        ordenes_pago
                        SET
                        valorTotal = ".$acumValue."
                        WHERE
                        idOrden = ".$idOrden."");
        
        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return $idOrden;

        }
        
    }
    
    /**************************************************************************/
    public function createOrderPDF($data, $idOrder) {
                
        $this->load->library('pdfgenerator');
        $filename = 'orden-'.$idOrder;
        $viewdata['orden'] = $idOrder;
        $viewdata['nombreCliente'] = $data['usuario']['nombre'];
        $viewdata['tipoCliente'] = $data['usuario']['tipoid'];
        $viewdata['idCliente'] = $data['usuario']['id'];
        $viewdata['movilCliente'] = $data['usuario']['movil'];
        $viewdata['items'] = $data['items'];
        
        $html = $this->load->view('web/order-pdf', $viewdata, TRUE);
        
        // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
        $document = $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');
        
        if ($document){
            return true;
        } else {
            return false;
        }
        
    }
    
    /**************************************************************************/
    public function updateProduct($data) {       
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        
        /*Actualiza Datos Generales*/
        $this->db->query("UPDATE 
                        productos
                        SET
                        referenciaProducto = '".$data[0]->general[0]->referencia."',
                        nombreProducto = '".$data[0]->general[0]->nombreProducto."',
                        descProducto = '".$data[0]->general[0]->descProducto."',
                        tags = '".$data[0]->general[0]->tags."',
                        activo = '".$data[0]->general[0]->activo."',
                        valueItemSite = '".$data[0]->general[0]->valweb."',
                        valueItemApp = '".$data[0]->general[0]->valapp."',
                        tendencia = '".$data[0]->general[0]->tendencia."'
                        WHERE
                        idProducto = ".$data[0]->general[0]->idProducto."");
        
        /*Inactiva Imagenes*/
        foreach ($data[0]->images[0]->borrado as $value) {
            $frag = explode("|", $value);
            $idImg = $frag[0];
            $inactiva = $frag[1];
            
            $this->db->query("UPDATE 
                            imagenes_producto
                            SET
                            activo = '".$inactiva."'
                            WHERE
                            idImagen = ".$idImg."");
        }
        
        /*Setea Imagen Principal*/
        foreach ($data[0]->images[0]->principal as $value) {
            $frag = explode("|", $value);
            $idImg = $frag[0];
            $principal = $frag[1];
            
            $this->db->query("UPDATE 
                            imagenes_producto
                            SET
                            principal = '".$principal."'
                            WHERE
                            idImagen = ".$idImg."");
        }
                
        /*Actualiza Precios - Categoria 1-RopaInfantil*/
        if ($data[0]->general[0]->idCategoria == 1){
            
            $this->db->query("DELETE FROM productos_rango WHERE idProducto =".$data[0]->general[0]->idProducto."");
            
            if ($data[0]->precios[0]->rangoapp_1 > 0 && $data[0]->precios[0]->rangoweb_1 > 0){
                $this->db->query("INSERT INTO
                                productos_rango (
                                idProducto,
                                idRango,
                                valorItemSite,
                                valorItemApp
                                ) VALUES (
                                ".$data[0]->general[0]->idProducto.",
                                1,
                                ".$data[0]->precios[0]->rangoweb_1.",
                                ".$data[0]->precios[0]->rangoapp_1.")");
            }
            
            if ($data[0]->precios[0]->rangoapp_2 > 0 && $data[0]->precios[0]->rangoweb_2 > 0){
                $this->db->query("INSERT INTO
                                productos_rango (
                                idProducto,
                                idRango,
                                valorItemSite,
                                valorItemApp
                                ) VALUES (
                                ".$data[0]->general[0]->idProducto.",
                                2,
                                ".$data[0]->precios[0]->rangoweb_2.",
                                ".$data[0]->precios[0]->rangoapp_2.")");
            }
            
            if ($data[0]->precios[0]->rangoapp_3 > 0 && $data[0]->precios[0]->rangoweb_3 > 0){
                $this->db->query("INSERT INTO
                                productos_rango (
                                idProducto,
                                idRango,
                                valorItemSite,
                                valorItemApp
                                ) VALUES (
                                ".$data[0]->general[0]->idProducto.",
                                3,
                                ".$data[0]->precios[0]->rangoweb_3.",
                                ".$data[0]->precios[0]->rangoapp_3.")");
            }
            
            if ($data[0]->precios[0]->rangoapp_4 > 0 && $data[0]->precios[0]->rangoweb_4 > 0){
                $this->db->query("INSERT INTO
                                productos_rango (
                                idProducto,
                                idRango,
                                valorItemSite,
                                valorItemApp
                                ) VALUES (
                                ".$data[0]->general[0]->idProducto.",
                                4,
                                ".$data[0]->precios[0]->rangoweb_4.",
                                ".$data[0]->precios[0]->rangoapp_4.")");
            }
            
        }
        
        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return true;

        }
        
    }
    
    /**************************************************************************/
    public function setProductPrenda($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->query("INSERT INTO
                            productos (
                            referenciaProducto,
                            nombreProducto,
                            descProducto,
                            tags,
                            activo,
                            valueItemSite,
                            valueItemApp,
                            tendencia,
                            fechaCreacion
                            ) VALUES (
                            '".$data['ref']."',
                            '".$data['name']."',
                            '".$data['desc']."',
                            '".$data['tags']."',
                            'Y',
                            0,
                            0,
                            '".$data['tendence']."',
                            NOW()
                            )");
        
        $idProduct = $this->db->insert_id();
        
        $this->db->query("INSERT INTO
                            productos_categorias (
                            idProducto,
                            idCategoria
                            ) VALUES (
                            ".$idProduct.",
                            ".$data['category'].")");
        
        for ($i = 1; $i <= 4; $i++){
            
            if ($data['valapp_'.$i] > 0 && $data['valweb_'.$i] > 0) {
                
                $this->db->query("INSERT INTO
                                productos_rango (
                                idProducto,
                                idRango,
                                valorItemSite,
                                valorItemApp
                                ) VALUES (
                                ".$idProduct.",
                                ".$i.",
                                ".$data['valweb_'.$i].",
                                ".$data['valapp_'.$i].")");
                
            }
            
        }
        
        $this->db->trans_complete();
        $this->db->trans_off();
        
        if ($this->db->trans_status() === FALSE){

            return false;

        } else {
            
            return $idProduct;

        }
        
    }
    
    /**************************************************************************/
    public function sendSMS($movil,$text) {
        
        /*********Login***********/
        $data = array(
            'account' => $this->config->item('user_client'),
            'password' => $this->config->item('pwd_client')
        );
        $payload = json_encode($data);
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.cellvoz.co/v2/auth/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
              "api-key: ".$this->config->item('key_client'),
              "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        
        if (curl_errno($curl)) {
            
            $error_msg = curl_error($curl);
            log_message("ERROR", "***********************");
            log_message("ERROR", "error login - sms");
            log_message("ERROR", $error_msg);
            log_message("ERROR", "***********************");
            
            return FALSE;
            
        } else {
            
            $request = json_decode($response);
            $token = $request->token;
            
            /****SMS Simple*****/
            $dataText = array(
                'number' => "57".$movil,
                'message' => $text,
                'type' => 1
            );
            $payloadSMS = json_encode($dataText);
            $curlSMS = curl_init();

            curl_setopt_array($curlSMS, array(
                CURLOPT_URL => "https://api.cellvoz.co/v2/sms/single",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $payloadSMS,
                CURLOPT_HTTPHEADER => array(
                  "api-key: ".$this->config->item('key_client'),
                  "Authorization: Bearer ".$token,
                  "Content-Type: application/json"
                ),
            ));

            $responseSMS = curl_exec($curlSMS);
            curl_close($curlSMS);
            
            if (curl_errno($curlSMS)) {
                
                $error_msg = curl_error($curlSMS);
                log_message("ERROR", "***********************");
                log_message("ERROR", "error enviando sms - simple");
                log_message("ERROR", $error_msg);
                log_message("ERROR", "***********************");
                
                return FALSE;
                
            } else {
                
                $request = json_decode($responseSMS);
//                log_message("INFO", "***********************");
//                log_message("INFO", "exito envio sms - simple");
//                log_message("INFO", $request);
//                log_message("INFO", "***********************");
                
                return TRUE;
                
            }
            /********************/
            
        }
        /*********End Login***********/
        
    }
	
	/***************************************************************************/
    public function getCodeProduct($code) {
        
        /* MySQL */
        $query = $this->db->query("SELECT
                                c.idCertificado,
                                c.codigoVerificacion,
                                c.declaracion,
                                c.urlDocumento
                                FROM certificados c
                                WHERE c.codigoVerificacion = '".$code."'");

        if ($query->num_rows() == 1) {

            return $query->row();

        } else {
            
            return FALSE;

        }
        
    }
    
}
