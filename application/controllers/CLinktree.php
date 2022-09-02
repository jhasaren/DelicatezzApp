<?php
/**************************************************************************
* Nombre de la Clase: CLinktree
* Descripcion: Es el controlador linktree como directorio de enlaces
* Autor: @jhasaren
* Fecha Creacion: 22/09/2020, Ultima modificacion: 
**************************************************************************/

defined('BASEPATH') OR exit('No direct script access allowed');

class CLinktree extends CI_Controller {

    function __construct() {
        
        parent::__construct(); /*por defecto*/
        $this->load->helper('url'); /*Carga la url base por defecto*/
        date_default_timezone_set('America/Bogota'); /*Zona horaria*/

        //lineas para eliminar el historico de navegacion./
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
        
    }
     
    /**************************************************************************
     * Nombre del Metodo: index (por defecto CodeIgniter)
     * Descripcion: Carga la vista linktree cuando se carga el controlador
     * Autor: @jhasaren
     * Fecha Creacion: 22/09/2020, Ultima modificacion: 
     **************************************************************************/
    public function index() {
        
        $this->load->view('web/linktree');     
        
    }
    
}
