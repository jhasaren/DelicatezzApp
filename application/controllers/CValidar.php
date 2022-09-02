<?php
/**************************************************************************
* Nombre de la Clase: CValidar
* Descripcion: Es el controlador para validar autenticidad de productos
* Autor: jasanchezr
* Fecha Creacion: 19/11/2020, Ultima modificacion: 
**************************************************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

class CValidar extends CI_Controller {

    function __construct() {
        
        parent::__construct(); /*por defecto*/
        $this->load->helper('url'); /*Carga la url base por defecto*/
        date_default_timezone_set('America/Bogota'); /*Zona horaria*/

        //lineas para eliminar el historico de navegacion./
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
        
        $this->load->model('MPrincipal'); /*Carga el Modelo*/
    }
    
    /**************************************************************************
     * Nombre del Metodo: index (por defecto CodeIgniter)
     * Descripcion: Carga la vista home cuando se da click en la opcion Validar.
     * Autor: jasanchezr
     * Fecha Creacion: 19/11/2020, Ultima modificacion: 
     **************************************************************************/
    public function index() {
        
        $this->load->view('web/validar');     
        
    }
    
    /**************************************************************************
     * Nombre del Metodo: datacode
     * Descripcion: permite consultar los datos de un producto con codigo de verificacion
     * Autor: jasanchezr
     * Fecha Creacion: 19/11/2020, Ultima modificacion: 
     **************************************************************************/
    public function datacode(){

        /*valida que la peticion http sea POST*/
        if (!$this->input->post()){
            
            show_404();
            
        } else {
            
            /*valida que los datos no esten vacios*/
            if ($this->input->post('code') == NULL) { 

                $info['message'] = 'Hacen falta datos obligatorios.';
                $info['stateMessage'] = 1;
                $this->load->view('web/validar',$info);

            } else {

                /*Captura Variables*/
                $data['code'] = strtoupper($this->input->post('code'));

                /*Consulta el Modelo Principal validacion de codigo*/
                $validateCode = $this->MPrincipal->getCodeProduct($data['code']);
                                
                if ($validateCode !== FALSE){
                    
                    $info['data'] = $validateCode;
                    $info['message'] = 'Codigo encontrado';
                    $info['stateMessage'] = 2;
                    $this->load->view('web/validar',$info);

                } else {

                    $info['message'] = 'El código de verificación no existe. Posiblemente la prenda que posees no corresponde a un autentico diseño de Carrusel';
                    $info['stateMessage'] = 1;
                    $this->load->view('web/validar',$info);

                }

            }
            
        }
        
    }
    
}