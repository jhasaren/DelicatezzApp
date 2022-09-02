<?php
/*******************************************************************************
* Clase: Widgets
* Autor: jasanchezr
* Fecha de Creación: 07/08/2020
* Descripcion: Controlador del API donde se atienden las solicitudes externas.
*******************************************************************************/

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php'; /*Incluye la libreria Rest_Controller*/


class Widgets extends REST_Controller {
    
    function __construct() {
        
        parent::__construct();
        $this->load->helper('url'); /*Carga la url base por defecto*/
        $this->load->model('MPrincipal'); /*Carga el Modelo*/
        
    }
    
    /***************************************************************************
     * Metodo: registerClient (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 07/08/2020
     * Response: JSON
     * Descripcion: Registrar cliente
     **************************************************************************/
    public function registerClient_post() {
        
        /*Variables*/
        $dataRequest['name'] = strtoupper($this->post('name'));
        $dataRequest['email'] = strtoupper($this->post('email'));
        $dataRequest['movil'] = $this->post('movilphone');
        $dataRequest['gender'] = $this->post('gender');
        $dataRequest['source'] = 'APP';
        
        if ($dataRequest['name'] !== NULL && $dataRequest['email'] !== NULL && $dataRequest['movil'] !== NULL) {
        
            if (strlen($dataRequest['name']) > 3) {
                
                if ($this->validaTipoString($dataRequest['movil'],6)){
                    
                    if ($this->validaTipoString($dataRequest['email'],7)){
                        
                        /*Consulta el Modelo - verifica si usuario no esta registrado*/
                        $verifyClient = $this->MPrincipal->verifyphone($dataRequest['movil']);

                        if ($verifyClient == FALSE){
						
							/**********************************************/
                            /*Codigo Cupon - 5 caracteres*/
                            $key = '';
                            $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                            $max = strlen($pattern)-1;
                            for($i=0; $i < 5 ; $i++) {
                                $key .= $pattern{mt_rand(0,$max)};
                            }
                            $dataRequest['cupon'] = strtoupper($key);
                            /**********************************************/

                            /*Consulta el Modelo - registra cliente*/
                            $setData = $this->MPrincipal->setClient($dataRequest);

                            if ($setData){
                                
                                /************************************************/
                                /* Enviar SMS - Bienvenida*/
                                /************************************************/
                                /*$textSMS = "Carrusel: Te damos la bienvenida! Mira nuestro catálogo: ropa infantil, accesorios y artículos. Descarga nuestra App o visita la Página Web https://rb.gy/bzjlzl";
                                $numberPhone = $dataRequest['movil'];
                                $this->MPrincipal->sendSMS($numberPhone,$textSMS);*/
                                /************************************************/
								
				/************************************************/
                                /* Enviar SMS - Cupon*/
                                /************************************************/
                                $textSMS = "Carrusel: bienvenido(a), te regalamos cupon del 10% de descuento para redimirlo en tu proxima compra. Valido en este mes. CODIGO: ".$dataRequest['cupon'];
                                $numberPhone = $dataRequest['movil'];
                                $this->MPrincipal->sendSMS($numberPhone,$textSMS);
                                /************************************************/
                                
                                $datosCliente = $this->MPrincipal->verifyphone($dataRequest['movil']);

                                // Set the response and exit
                                $this->response([
                                    'status' => 1,
                                    'message' => 'La cuenta fue creada exitosamente',
                                    'information' => $datosCliente
                                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                            } else {

                                // Set the response and exit
                                $this->response([
                                    'status' => 0,
                                    'message' => 'No fue posible crear la cuenta',
                                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                            }

                        } else {

                            // Set the response and exit
                            $this->response([
                                'status' => 0,
                                'message' => 'El número de teléfono ya se encuentra registrado',
                            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                        }
                    
                    } else {
                        
                        // Set the response and exit
                        $this->response([
                            'status' => 0,
                            'message' => 'El Email es invalido',
                        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                        
                    }
                
                } else {
                    
                    // Set the response and exit
                    $this->response([
                        'status' => 0,
                        'message' => 'El numero de telefono no es valido, 10 digitos sin espacios.',
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                    
                }
        
            } else {
                
                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'Los datos suministrados no son validos (nombres y apellidos)',
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                
            }
                
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }   
        
    }
    
    /***************************************************************************
     * Metodo: addProduct (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 11/08/2020
     * Response: JSON
     * Descripcion: Crear un nuevo producto (categoria Accesorios y Articulos)
     **************************************************************************/
    public function addProduct_post() {
        
        /*Variables*/
        $dataRequest['ref'] = strtoupper($this->post('ref'));
        $dataRequest['name'] = $this->post('name');
        $dataRequest['desc'] = $this->post('desc');
        $dataRequest['tags'] = $this->post('tags');
        $dataRequest['valueApp'] = $this->post('valueApp');
        $dataRequest['valueSite'] = $this->post('valueWeb');
        $frag = explode("|", $this->post('category'));
        $dataRequest['category'] = $frag[0];
        $dataRequest['tendence'] = $this->post('star');
        
        if ($dataRequest['ref'] !== NULL && $dataRequest['name'] !== NULL && $dataRequest['desc'] !== NULL && $dataRequest['tags'] !== NULL) {
        
            if (strlen($dataRequest['name']) > 3) {
                
                if (strlen($dataRequest['ref']) > 3) {
                                            
                    /*Consulta el Modelo*/
                    $dataSetPrd = $this->MPrincipal->setProduct($dataRequest);

                    if ($dataSetPrd !== FALSE){

                        // Set the response and exit
                        $this->response([
                            'status' => 1,
                            'message' => 'Producto creado exitosamente',
                            'information' => $dataSetPrd
                        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                    } else {

                        // Set the response and exit
                        $this->response([
                            'status' => 0,
                            'message' => 'No fue posible crear el producto',
                        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                    }
                
                } else {
                    
                    // Set the response and exit
                    $this->response([
                        'status' => 0,
                        'message' => 'Referencia invalida.',
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                    
                }
        
            } else {
                
                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'Los datos suministrados no son validos (nombres)',
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                
            }
                
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }   
        
    }
    
    /***************************************************************************
     * Metodo: updProduct (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 22/08/2020
     * Response: JSON
     * Descripcion: Actualizar los datos de un producto (datos generales, precios, imagenes)
     **************************************************************************/
    public function updProduct_post() {
        
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
         
        if ($request[0]->general[0]->referencia !== NULL && $request[0]->general[0]->nombreProducto !== NULL && $request[0]->general[0]->descProducto !== NULL && $request[0]->general[0]->tags !== NULL) {
        
            if (strlen($request[0]->general[0]->nombreProducto) > 3) {
                
                if (strlen($request[0]->general[0]->referencia) > 3) {
                                            
                    /*Consulta el Modelo*/
                    $dataUpdPrd = $this->MPrincipal->updateProduct($request);

                    if ($dataUpdPrd !== FALSE){

                        // Set the response and exit
                        $this->response([
                            'status' => 1,
                            'message' => 'Producto actualizado exitosamente',
                            'information' => $request
                        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                    } else {

                        // Set the response and exit
                        $this->response([
                            'status' => 0,
                            'message' => 'No fue posible actualizar el producto',
                        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                    }
                
                } else {
                    
                    // Set the response and exit
                    $this->response([
                        'status' => 0,
                        'message' => 'Referencia invalida.',
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                    
                }
        
            } else {
                
                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'Los datos suministrados no son validos (nombres)',
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                
            }
                
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }
        
    }
    
    /***************************************************************************
     * Metodo: statProduct (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 21/08/2020
     * Response: JSON
     * Descripcion: Registra HITs sobre producto desde la APP
     **************************************************************************/
    public function statProduct_post() {
        
        /*Variables*/
        $dataRequest['idProduct'] = $this->post('idProduct');
        $dataRequest['idUser'] = $this->post('idUser');
        $dataRequest['typeHit'] = $this->post('type');
        
        if ($dataRequest['idProduct'] !== NULL && $dataRequest['idUser'] !== NULL && $dataRequest['typeHit'] !== NULL) {
        
            /*Consulta el Modelo*/
            $dataStat = $this->MPrincipal->setStatProduct($dataRequest);

            if ($dataStat !== FALSE){

                // Set the response and exit
                $this->response([
                    'status' => 1,
                    'message' => 'Hit registrado exitosamente',
                    'information' => $dataStat
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            } else {

                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'No fue posible registrar el Hit',
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            }
                
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }   
        
    }
    
    /***************************************************************************
     * Metodo: getBotIA (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 31/08/2020
     * Response: JSON
     * Descripcion: Servicio exclusivo para interaccion de BOT (Dialogflow)
     **************************************************************************/
    public function getBotIA_post() {
        
        /*Variables*/
        $dataRequest['item'] = json_decode($this->input->raw_input_stream, true);
        $dataBot['tipo'] = $dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['modulo'];
        $dataBot['genero'] = $dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['genero'];
        $dataBot['edad'] = $dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['edad'];
        $dataBot['pecho'] = $dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['pecho'];
        $dataBot['cintura'] = $dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['cintura'];
        $dataBot['cadera'] = $dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['cadera'];
        $dataBot['pantalon'] = $dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['pantalon'];
        $dataBot['estatura'] = $dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['estatura'];
        
        log_message("DEBUG", "********************");
        log_message("DEBUG", "===inBOT===");
        log_message("DEBUG", "Modulo: ".$dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['modulo']);
        log_message("DEBUG", "Genero: ".$dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['genero']);
        log_message("DEBUG", "Edad: ".$dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['edad']);
        log_message("DEBUG", "Cintura: ".$dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['cintura']);
        log_message("DEBUG", "Cadera: ".$dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['cadera']);
        log_message("DEBUG", "Pecho: ".$dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['pecho']);
        log_message("DEBUG", "Pantalon: ".$dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['pantalon']);
        log_message("DEBUG", "Estatura: ".$dataRequest['item']['queryResult']['outputContexts'][0]['parameters']['estatura']);
                
        if ($dataBot['tipo'] == "talla"){
            
            /*Consulta el Modelo*/
            $dataStat = $this->MPrincipal->talesBot($dataBot);
                                    
            if ($dataStat !== FALSE){
                
                /*Respuesta de Texto - Basica*/
                $str='{
                    "fulfillmentMessages": [
                      {
                        "text": {
                          "text": [
                            "'.$dataStat['superior'].' '.$dataStat['inferior'].'.\n\nDeseas hablar con nuestra diseñadora?"
                          ]
                        }
                      }
                    ]
                  }';

                $data = json_decode($str,true);

                // Set the response and exit
                $this->response($data, REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            } else {

                // Set the response and exit
                $this->response([
                    'fulfillmentText' => "En este momento no puedo calcular la talla, por favor intenta más tarde"
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

            }
            
        }
        
    }
    
    /***************************************************************************
     * Metodo: setLastVisit (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 21/08/2020
     * Response: JSON
     * Descripcion: Registra ultima visita del usuario desde APP
     **************************************************************************/
    public function setLastVisit_post() {
        
        /*Variables*/
        $dataRequest['idUser'] = $this->post('idUser');
        
        if ($dataRequest['idUser'] !== NULL) {
        
            /*Consulta el Modelo*/
            $dataStat = $this->MPrincipal->setVisitApp($dataRequest);

            if ($dataStat !== FALSE){
                
                // Set the response and exit
                $this->response([
                    'status' => 1,
                    'message' => 'Visita registrada exitosamente',
                    'information' => $dataStat
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            } else {

                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'No fue posible registrar la visita',
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            }
                
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }   
        
    }
    
    /***************************************************************************
     * Metodo: addProductPrenda (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 16/08/2020
     * Response: JSON
     * Descripcion: Crear un nuevo producto (categoria Ropa Infantil)
     **************************************************************************/
    public function addProductPrenda_post() {
        
        /*Variables*/
        $dataRequest['ref'] = strtoupper($this->post('ref'));
        $dataRequest['name'] = $this->post('name');
        $dataRequest['desc'] = $this->post('desc');
        $dataRequest['tags'] = $this->post('tags');
        $dataRequest['valueApp'] = $this->post('valueApp');
        $dataRequest['valueSite'] = $this->post('valueWeb');
        $frag = explode("|", $this->post('category'));
        $dataRequest['category'] = $frag[0];
        $dataRequest['tendence'] = $this->post('star');
        $dataRequest['valapp_1'] = $this->post('valueapp-1');
        $dataRequest['valweb_1'] = $this->post('valueweb-1');
        $dataRequest['valapp_2'] = $this->post('valueapp-2');
        $dataRequest['valweb_2'] = $this->post('valueweb-2');
        $dataRequest['valapp_3'] = $this->post('valueapp-3');
        $dataRequest['valweb_3'] = $this->post('valueweb-3');
        $dataRequest['valapp_4'] = $this->post('valueapp-4');
        $dataRequest['valweb_4'] = $this->post('valueweb-4');
        
        if ($dataRequest['ref'] !== NULL && $dataRequest['name'] !== NULL && $dataRequest['desc'] !== NULL && $dataRequest['tags'] !== NULL) {
        
            if ($dataRequest['valapp_1'] !== NULL && $dataRequest['valweb_1'] !== NULL && $dataRequest['valapp_2'] !== NULL && $dataRequest['valweb_2'] !== NULL) {
                
                if ($dataRequest['valapp_3'] !== NULL && $dataRequest['valweb_3'] !== NULL && $dataRequest['valapp_4'] !== NULL && $dataRequest['valweb_4'] !== NULL) {
                
                    if (strlen($dataRequest['name']) > 3) {
                
                        if (strlen($dataRequest['ref']) > 3) {

                            /*Consulta el Modelo*/
                            $dataSetPrd = $this->MPrincipal->setProductPrenda($dataRequest);

                            if ($dataSetPrd !== FALSE){

                                // Set the response and exit
                                $this->response([
                                    'status' => 1,
                                    'message' => 'Producto creado exitosamente',
                                    'information' => $dataSetPrd
                                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                            } else {

                                // Set the response and exit
                                $this->response([
                                    'status' => 0,
                                    'message' => 'No fue posible crear el producto',
                                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                            }

                        } else {

                            // Set the response and exit
                            $this->response([
                                'status' => 0,
                                'message' => 'Referencia invalida.',
                            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                        }

                    } else {

                        // Set the response and exit
                        $this->response([
                            'status' => 0,
                            'message' => 'Los datos suministrados no son validos (nombre)',
                        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                    }
                
                } else {

                    // Set the response and exit
                    $this->response([
                        'status' => 0,
                        'message' => 'Faltan valores del producto'
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                }
                
            } else {
                
                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'Faltan valores del producto'
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                
            }
                
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }   
        
    }
    
    /***************************************************************************
     * Metodo: loginUser (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 10/08/2020
     * Response: JSON
     * Descripcion: Inicio sesion usuario App (administrador)
     **************************************************************************/
    public function loginUser_post() {
        
        /*Variables*/
        $dataRequest['username'] = $this->post('username');
        $dataRequest['password'] = sha1($this->post('password'));
        
        if ($dataRequest['username'] !== NULL && $dataRequest['password'] !== NULL) {
         
            /*Consulta el Modelo - verifica si usuario no esta registrado*/
            $dataLogin = $this->MPrincipal->verifylogin($dataRequest);

            if ($dataLogin !== FALSE){
                
                if ($dataLogin->activo == 'Y'){
                    
                    // Set the response and exit
                    $this->response([
                        'status' => 1,
                        'message' => 'Login Exitoso',
                        'information' => $dataLogin
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                    
                } else {
                    
                    // Set the response and exit
                    $this->response([
                        'status' => 0,
                        'message' => 'Usuario inactivo',
                        'information' => 0
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                    
                }
                
            } else {

                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'Credenciales de inicio de sesion incorrectas',
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            }
                
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }   
        
    }
    
    /***************************************************************************
     * Metodo: addImage (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 15/08/2020
     * Response: JSON
     * Descripcion: Cargar Imagen al Producto
     **************************************************************************/
    public function addImage_post() {
        
        /*Variables*/
        $data['idProducto'] = ($this->input->post("id-prod"));
        $data['image'] = $this->input->post("img-prod");
        $data['tagsImage'] = ($this->input->post("tag-prod"));
        $data['portada'] = ($this->input->post("front-prod"));
        $data['category'] = ($this->input->post("cat-prod"));
                        
        if ($data['idProducto'] !== NULL && $data['category'] !== NULL && $data['portada'] !== NULL) {
            
            $nameUnique = md5(uniqid(rand(), true));
            $data['nameLoad'] = $nameUnique . '.' . 'jpg';
                        
            /**********************************************************/
            /*Carga Imagen*/
            $path = APPPATH.'../public/web/images/'.$data['category'];
            mkdir($path, 0777, TRUE);
            
            /*Parametros de Imagen*/
            $config['upload_path']          = $path;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5120; /*kb -> 5 mb*/
            $config['min_width']            = 800;
            $config['min_height']           = 1200;
            $config['file_name']            = $data['nameLoad'];
            
            /*Libreria CI de Subida*/
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( !$this->upload->do_upload('img-prod')){

                $error = array('error' => $this->upload->display_errors());
                log_message("ERROR", "******************************");
                log_message("ERROR", "Error al subir imagen");
                log_message("ERROR", "******************************");
                
                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'Error al subir imagen',
                    'information' => $error
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            } else {

                /*Informacion de la imagen subida*/
                $dataLoad = array('upload_data' => $this->upload->data());
                
                $imgRegister = $this->MPrincipal->setImgFile($data);
                
                if ($imgRegister !== FALSE){
                    
                    /*******Resize Image*******/
                    $this->load->library('image_lib');
                    
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = $path."/".$data['nameLoad'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = TRUE;
                    $config['overwrite']        = TRUE;
                    $config['width']            = 800;
                    $config['height']           = 1200;
                    
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    
                    if ( !$this->image_lib->resize() ){
                        
                        $errorResize = array('error' => $this->image_lib->display_errors());
                        log_message("ERROR", "***********************");
                        log_message("ERROR", $config['source_image']);
                        log_message("ERROR", $errorResize);
                        log_message("ERROR", "***********************");
                        
                    } else {
                        
                        log_message("INFO", "***********************");
                        log_message("INFO", $config['source_image']);
                        log_message("INFO", "OK RESIZE");
                        log_message("INFO", "***********************"); 
                        
                    }
                    /************/
                    
                    // Set the response and exit
                    $this->response([
                        'status' => 1,
                        'message' => 'Imagen subida corectamente',
                        'information' => $dataLoad
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                    
                } else {
                    
                    // Set the response and exit
                    $this->response([
                        'status' => 0,
                        'message' => 'No fue posible registrar la Imagen subida',
                        'information' => $dataLoad
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                    
                }
                
            }
            /**********************************************************/
                
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }   
        
    }
       
    /***************************************************************************
     * Metodo: getProducts (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 07/08/2020
     * Response: JSON
     * Descripcion: Recupera lista de productos en una categoria
     **************************************************************************/
    public function getProducts_post() {
        
        $idCategory = $this->post('idCategory');
        
        if ($idCategory !== NULL){
        
            /*Consulta Modelo*/
            $dataRequest = $this->MPrincipal->getproducts($idCategory);

            if ($dataRequest !== FALSE){ /*encuentra datos*/

                // Set the response and exit
                $this->response([
                    'status' => 1,
                    'message' => 'Productos Activos',
                    'information' => $dataRequest
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            } else {

                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'No se encontraron productos activos.',
                    'information' => 0
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            }
        
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Hacen falta datos obligatorios.',
                'information' => 0
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }

    }
        
    /***************************************************************************
     * Metodo: getDataUser (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 07/08/2020
     * Response: JSON
     * Descripcion: recupera informacion de un cliente consultando con nro de telefono
     **************************************************************************/
    public function getDataUser_post() {
        
        $phone = $this->post('phone');
        
        if ($phone !== NULL){
            
            if ($this->validaTipoString($phone,6)) {
                
                /*Consulta Modelo*/
                $dataRequest = $this->MPrincipal->verifyphone($phone);
                
                if ($dataRequest !== FALSE){ /*encuentra datos*/

                    // Set the response and exit
                    $this->response([
                        'status' => 2,
                        'message' => 'El telefono ya se encuentra registrado',
                        'information' => $dataRequest
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                } else {

                    // Set the response and exit
                    $this->response([
                        'status' => 1,
                        'message' => 'No se encuentra registrado',
                        'information' => 0
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

                }
                
            } else {
                
                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'El numero de telefono no es válido',
                    'information' => 0
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                
            }
            
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Hacen falta datos obligatorios',
                'information' => 0
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }
        
    }
    
    /***************************************************************************
     * Metodo: getDetailProduct (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 07/08/2020
     * Response: JSON
     * Descripcion: Recupera el detalle de un producto (datos generales, imagenes, rangos)
     **************************************************************************/
    public function getDetailProduct_post() {
        
        $idProduct = $this->post('idProduct');
        
        if ($idProduct !== NULL){
                
            /*Consulta Modelo*/
            $datos['dataProduct'] = $this->MPrincipal->getdetailproduct($idProduct);
            $datos['imagesProduct'] = $this->MPrincipal->getimageproduct($idProduct);
            $datos['rangesProduct'] = $this->MPrincipal->getrangesproduct($idProduct);

            // Set the response and exit
            $this->response([
                'status' => 1,
                'message' => 'Informacion del Producto',
                'information' => $datos
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Hacen falta datos obligatorios',
                'information' => 0
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }
        
    } 
    
    /***************************************************************************
     * Metodo: getDetailProduct (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 10/08/2020
     * Response: JSON
     * Descripcion: Recupera listas tipo del sistema (app administracion)
     **************************************************************************/
    public function getListType_post() {
        
        /*Consulta Modelo*/
        $datos['dataCategories'] = $this->MPrincipal->getListType();

        // Set the response and exit
        $this->response([
            'status' => 1,
            'message' => 'Detalle Listas',
            'information' => $datos
        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        
    }   
    
    /***************************************************************************
     * Metodo: getTalesRange (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 07/08/2020
     * Response: JSON
     * Descripcion: Recupera las tallas de un rango determinado
     **************************************************************************/
    public function getTalesRange_post() {
        
        $idRange = $this->post('idRange');
        
        if ($idRange !== NULL){
                
            /*Consulta Modelo*/
            $datos['dataTales'] = $this->MPrincipal->gettalesrange($idRange);

            // Set the response and exit
            $this->response([
                'status' => 1,
                'message' => 'Tallas del Rango',
                'information' => $datos
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Hacen falta datos obligatorios',
                'information' => 0
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }
        
    }   
    
    /***************************************************************************
     * Metodo: setOrderPayment (POST)
     * Autor: jasanchezr
     * Fecha de Creación: 03/09/2020
     * Response: JSON
     * Descripcion: Generar Orden de Pago - PDF
     **************************************************************************/
    public function setOrderPayment_post() {
        
        $stream_clean = utf8_encode(($this->input->raw_input_stream));
        $request = json_decode($stream_clean,true);
                
        if ($request['usuario']['nombre'] !== NULL && $request['usuario']['id'] !== NULL && $request['usuario']['tipoid'] !== NULL && $request['usuario']['movil'] !== NULL){
            
            if ($request['items'][0] !== NULL){
                
                /*Registra Orden*/
                $dataSet = $this->MPrincipal->setOrderPay($request);
                
                if ($dataSet !== FALSE){
                    
                    /*Genera PDF*/
                    $documentPDF = $this->MPrincipal->createOrderPDF($request, $dataSet);
                    
                    if ($documentPDF !== FALSE){
                        
                        // Set the response and exit
                        $this->response([
                            'status' => 1,
                            'message' => 'Se registro la orden correctamente.',
                            'information' => $dataSet
                        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                        
                    } else {
                        
                        // Set the response and exit
                        $this->response([
                            'status' => 1,
                            'message' => 'Se registro la orden correctamente, pero no fue posible generar el documento.',
                            'information' => $dataSet
                        ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code 
                        
                    }
                    
                } else {
                    
                   // Set the response and exit
                    $this->response([
                        'status' => 0,
                        'message' => 'No fue posible registrar la orden de pago',
                        'information' => 0
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code 
                    
                }
                
            } else {
                
                // Set the response and exit
                $this->response([
                    'status' => 0,
                    'message' => 'Faltan items de la venta',
                    'information' => 0
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                
            }
            
        } else {
            
            // Set the response and exit
            $this->response([
                'status' => 0,
                'message' => 'Faltan datos obligatorios del usuario',
                'information' => 0
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            
        }
                
    }
    
    /***************************************************************************
     * Metodo: validaTipoString
     * Autor: jasanchezr
     * Fecha de Creación: 15/02/2020
     * Response: JSON
     * Descripcion: Aplica validacion de formatos
     **************************************************************************/
    public function validaTipoString($dato,$type) {

        if ($type == 1){
            /* Alfanumerico */
            $reg = "/^[A-Za-z0-9]+$/";
            return preg_match($reg, $dato);

        }
        
        if ($type == 2){
            /* Numero de 1 a 2 digitos */
            $reg = "/^[0-9]{1,2}+$/";
            return preg_match($reg, $dato);

        }
        
        if ($type == 3){
            /* Contraseña Alfanumerica minimo 8 digitos */
            $reg = "/^[A-Za-z0-9]{8,15}+$/";
            return preg_match($reg, $dato);

        }
        
        if ($type == 4){
            /* Valida Placa minimo 6 digitos */
            $reg = "/^[A-Za-z0-9]{6,6}+$/";
            return preg_match($reg, $dato);

        }
        
        if ($type == 5){
            /* Numero de 6 a 7 digitos */
            $reg = "/^[0-9]{6,7}+$/";
            return preg_match($reg, $dato);

        }
        
        if ($type == 6){
            /* Numero de 10 digitos - telefono movil inicia por 3 */
            $reg = "/^3([0-9]{9,9})+$/";
            return preg_match($reg, $dato);

        }
        
        if ($type == 7){
            /*  Email */
            $reg = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
            return preg_match($reg, $dato);

        }

    }  
    
        
}
