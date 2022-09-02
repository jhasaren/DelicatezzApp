<?php
/**************************************************************************
* Nombre de la Clase: CPrincipal
* Descripcion: Es el controlador principal el cual carga por default al iniciar
* en el sistema.
* Autor: @jhasaren
* Fecha Creacion: 01/09/2022, Ultima modificacion: 
**************************************************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

class CPrincipal extends CI_Controller {

    function __construct() {
        
        parent::__construct(); /*por defecto*/
        $this->load->helper('url'); /*Carga la url base por defecto*/
        date_default_timezone_set('America/Bogota'); /*Zona horaria*/
        //require_once(str_replace("\\","/",APPPATH).'libraries/nusoap/lib/nusoap.php');

        //lineas para eliminar el historico de navegacion./
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
        
        $this->load->model('MPrincipal'); /*Carga el Modelo*/
    }
    
    /**************************************************************************
     * Nombre del Metodo: index (por defecto CodeIgniter)
     * Descripcion: Carga la vista home cuando se carga el inicio
     * Autor: @jhasaren
     * Fecha Creacion: 01/09/2022, Ultima modificacion:
     **************************************************************************/
    public function index() {
        
        $this->load->view('web/home');     
        
    }
    
    /**************************************************************************
     * Nombre del Metodo: contact
     * Descripcion: Redirecciona a la vista contact
     * Autor: jasanchezr
     * Fecha Creacion: 07/08/2020, Ultima modificacion: 
     **************************************************************************/
    public function contact() {
        
        $this->load->view('web/contact');     
        
    }
    
    /**************************************************************************
     * Nombre del Metodo: datosPersonales
     * Descripcion: Redirecciona a la vista datos personales
     * Autor: jasanchezr
     * Fecha Creacion: 21/08/2020, Ultima modificacion: 
     **************************************************************************/
    public function datosPersonales() {
        
        $this->load->view('web/datos-personales');     
        
    }
    
    /**************************************************************************
     * Nombre del Metodo: politicaDevolucion
     * Descripcion: Redirecciona a la vista Politica de Devoluciones
     * Autor: jasanchezr
     * Fecha Creacion: 21/08/2020, Ultima modificacion: 
     **************************************************************************/
    public function terminosCondiciones() {
        
        $this->load->view('web/terminos-condiciones');     
        
    }
    
    /**************************************************************************
     * Nombre del Metodo: line
     * Descripcion: Carga los productos de una categoria y redirecciona a la vista
     * Autor: jasanchezr
     * Fecha Creacion: 07/08/2020, Ultima modificacion: 
     **************************************************************************/
    public function line($item) {
        
        if ($item == 1) {
            
            /*Consulta Modelo*/
            $datos = $this->MPrincipal->getproducts($item);
            $info['list_products'] = $datos;
            
            /*Ropa Infantil*/
            $this->load->view('web/ropa-infantil', $info);
            
        } else {
            
            if ($item == 2){
                
                /*Consulta Modelo*/
                $datos = $this->MPrincipal->getproducts($item);
                $info['list_products'] = $datos;

                /*Accesorios*/
                $this->load->view('web/accesorios', $info);
                
            } else {
                
                if ($item == 3){
                    
                    /*Consulta Modelo*/
                    $datos = $this->MPrincipal->getproducts($item);
                    $info['list_products'] = $datos;

                    /*Accesorios*/
                    $this->load->view('web/articulos', $info);
                    
                } else {
                    
                    if ($item == 4) {
                        
                        /*Consulta Modelo*/
                        $datos = $this->MPrincipal->getproducts($item);
                        $info['list_products'] = $datos;

                        /*Tendencias*/
                        $this->load->view('web/tendencias', $info);
                        
                    } else {
                        
                        if ($item == 5) {
                        
                            /*Consulta Modelo*/
                            $datos = $this->MPrincipal->getproducts($item);
                            $info['list_products'] = $datos;

                            /*Mascotas*/
                            $this->load->view('web/mascotas', $info);

                        } else {
                            
                            show_404();
                            
                        }
                        
                    }
                    
                }
            }
        }
    }
    
    /**************************************************************************
     * Nombre del Metodo: detailProduct
     * Descripcion: recupera el detalle de un producto
     * Autor: jasanchezr
     * Fecha Creacion: 07/08/2020, Ultima modificacion: 
     **************************************************************************/
    public function detailProduct($idProduct) {
        
        //$postData = $this->input->post('idProduct');
        $postData = $idProduct;
                
        if ($postData !== NULL){
            /*Consulta Modelo*/
            $datos['dataProduct'] = $this->MPrincipal->getdetailproduct($postData);
            $datos['imagesProduct'] = $this->MPrincipal->getimageproduct($postData);
            $datos['rangesProduct'] = $this->MPrincipal->getrangesproduct($postData);
            echo json_encode($datos);
        }
        
    }
    
    /**************************************************************************
     * Nombre del Metodo: getTales
     * Descripcion: recupera las tallas de un rango
     * Autor: jasanchezr
     * Fecha Creacion: 07/08/2020, Ultima modificacion: 
     **************************************************************************/
    public function getTales() {
        
        $data = $this->input->post('idRange');
                
        if ($data !== NULL){
            /*Consulta Modelo*/
            $datos['dataTales'] = $this->MPrincipal->gettalesrange($data);
            echo json_encode($datos);
        }
        
    }
    
    /**************************************************************************
     * Nombre del Metodo: register
     * Descripcion: permite el registro de un cliente
     * Autor: jasanchezr
     * Fecha Creacion: 07/08/2020, Ultima modificacion: 
     **************************************************************************/
    public function register(){

        /*valida que la peticion http sea POST*/
        if (!$this->input->post()){
            
            show_404();
            
        } else {
            
            /*valida que los datos no esten vacios*/
            if ($this->input->post('email') == NULL || $this->input->post('movilPhone') == NULL || $this->input->post('firstName') == NULL) { 

                $info['message'] = 'Hacen falta datos obligatorios.';
                $info['stateMessage'] = 1;
                $this->load->view('web/membresia',$info);

            } else {

                /*Captura Variables*/
                $data['movil'] = $this->input->post('movilPhone');
                $data['name'] = strtoupper($this->input->post('firstName'));
                $data['email'] = strtoupper($this->input->post('email'));
                $data['gender'] = $this->input->post('gender');
                $data['source'] = 'WEB';

                /*Consulta el Modelo Principal validacion de credenciales*/
                $validatePhone = $this->MPrincipal->verifyphone($data['movil']);
                                
                if ($validatePhone == FALSE){
				
					/**********************************************/
                    /*Codigo Cupon - 5 caracteres*/
                    $key = '';
                    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                    $max = strlen($pattern)-1;
                    for($i=0; $i < 5 ; $i++) {
                        $key .= $pattern{mt_rand(0,$max)};
                    }
                    $data['cupon'] = strtoupper($key);
                    /**********************************************/
                    
                    $registerClient = $this->MPrincipal->setClient($data);
                    
                    if ($registerClient != FALSE){
                        
                        /************************************************/
                        /* Enviar SMS - Bienvenida */
                        /************************************************/
                        /*$textSMS = "Carrusel: Te damos la bienvenida! Mira nuestro catálogo: ropa infantil, accesorios y artículos. Descarga nuestra App o visita la Página Web https://rb.gy/bzjlzl";
                        $numberPhone = $data['movil'];
                        $this->MPrincipal->sendSMS($numberPhone,$textSMS);*/
                        /************************************************/
						
						/************************************************/
                        /* Enviar SMS - Cupon*/
                        /************************************************/
                        $textSMS = "Carrusel: bienvenido(a), te regalamos cupon del 10% de descuento para redimirlo en tu proxima compra. Valido en este mes. CODIGO: ".$data['cupon'];
                        $numberPhone = $data['movil'];
                        $this->MPrincipal->sendSMS($numberPhone,$textSMS);
                        /************************************************/
                        
                        $info['message'] = 'Te damos la bienvenida como miembro registrado de Tienda Carrusel.';
                        $info['stateMessage'] = 0;
                        $this->load->view('web/membresia',$info);
                        
                    } else {
                        
                        $info['message'] = 'No fue posible registrar la membresía. Por favor intenta más tarde.';
                        $info['stateMessage'] = 1;
                        $this->load->view('web/membresia',$info);
                        
                    }

                } else {

                    $info['message'] = 'El número de teléfono ya se encuentra registrado.';
                    $info['stateMessage'] = 1;
                    $this->load->view('web/membresia',$info);

                }

            }
            
        }
        
    }
         
}
