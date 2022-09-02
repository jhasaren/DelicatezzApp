<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MPrincipal extends CI_Model {

    /*instancia la clase de conexion a la BD para este modelo*/
    public function __construct() {
        
        parent::__construct();
        $this->db->query("SET time_zone='-5:00'");
        //$this->db->query("SET time_zone='America/Bogota'");
        
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
    public function talesBot($data) {
        
        return TRUE;
        
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
    public function verifyphone($phone) {
                
        $query = $this->db->query("SELECT
                                c.idCliente,
                                c.identificacion,
                                c.nombreApellido,
                                c.genero,
                                c.telefonoMovil,
                                c.email,
                                c.activo
                                FROM
                                clientes c
                                WHERE
                                telefonoMovil = '".$phone."'");
        
        $cant = $query->num_rows();
        
        if($cant>0){
            
            return $query->row();
            
        } else {
            
            return FALSE;
            
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
    public function setClient($data) {
                
        $this->db->trans_strict(TRUE);
        $this->db->trans_start();
        $this->db->query("INSERT INTO
                            clientes (
                            identificacion,
                            nombreApellido,
                            genero,
                            telefonoMovil,
                            email,
                            password,
                            activo,
                            fechaRegistro,
                            fuenteRegistro
                            ) VALUES (
                            '".$data['movil']."',
                            '".$data['name']."',
                            '".$data['gender']."',
                            '".$data['movil']."',
                            '".$data['email']."',
                            '".sha1('CAR2020')."',
                            'Y',
                            NOW(),
                            '".$data['source']."')");
        
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
    
}
