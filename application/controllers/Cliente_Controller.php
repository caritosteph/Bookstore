<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Cristian
 */
class Cliente_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->_asignarMensajes();
    }

    public function registro() {

        if ($this->session->userdata('cliente') === FALSE) {
            $data['activo'] = 'registro';
            $data['contenido'] = 'visitante/registro';
            $this->load->view('plantilla/plantilla', $data);
        } else {
            redirect('/home');
            
        }
    }//end registro()
    
    
    public function showLogin($error = NULL) {
        if ($this->session->userdata('cliente') == FALSE) {
            $data['activo'] = 'none';
            $data['contenido'] = 'visitante/login';
            if ($error != NULL) {
                $data['error'] = $error;
            }
            $this->load->view('plantilla/plantilla', $data);
        } else {
            redirect('/home');
        }
    }

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        $this->form_validation->set_rules('email', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->showLogin();
        } else {
            $cliente = new Cliente();
            $cliente->where('EMail', $email);
            $cliente->get();
            if ($cliente->exists()) {
                $cliente2 = new Cliente();
                $cliente2->where('EMail', $email);
                $cliente2->where('Contrasena', md5($password));
                $cliente2->get();
                if ($cliente2->exists()) {

                    if ($cliente2->Estado == 1) {
                        $array_sesion = array(
                            'id' => $cliente2->id,
                            'nombre' => $cliente2->Nombre
                        );
                        $this->session->set_userdata('cliente', $array_sesion);

                        $recordar = $this->input->post('recordar');
                        if ($recordar) {
                            if ($recordar == true) {
                                mt_srand(time());
                                $rand = mt_rand(1000000, 9999999);

                                $cliente2->cookie = $rand;
                                $cliente2->save();  // para actualizar utilizar el metodo save
//                            
                                setcookie('id_user', $cliente2->id, time() + (60 * 60 * 24 * 365), '/');
                                setcookie('marca', $rand, time() + (60 * 60 * 24 * 365), '/');
                            }
                        }
                        //redirect_back();
                        redirect(base_url().'catalogo');
                    } else {
                        $this->showLogin('La cuenta todavia no ha sido activada');
                    }
                } else {
                    $this->showLogin('La contraseña ingresada es incorrecta');
                }
            } else {
                $this->showLogin('No existe un cliente con ese correo');
            }
        }
    }

    public function registrar() {
        $nombre = $this->input->post('nombre', true);
        $apellido = $this->input->post('apellido', true);
        $email = $this->input->post('email', true);
        $direccion = $this->input->post('direccion', true);
        $telefono = $this->input->post('telefono', true);
        $clave = $this->input->post('clave', true);
        $confirma_clave = $this->input->post('confirma_clave', true);

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback__unicoCorreo');
        $this->form_validation->set_rules('clave', 'Clave', 'required');
        $this->form_validation->set_rules('confirma_clave', 'Confirma Clave', 'required|matches[clave]');

        if ($this->form_validation->run() == FALSE) {
            $this->registro();
        } else {
            $codigo = $this->_generarCodigo();
            $cliente = new Cliente();
            $cliente->Nombre = $nombre;
            $cliente->Apellidos = $apellido;
            $cliente->EMail = $email;
            $cliente->Direccion = $direccion;
            $cliente->Telefono = $telefono;
            $cliente->Contrasena = md5($clave);
            $cliente->Estado = 0;
            $cliente->Verificacion = $codigo;
            $cliente->save();

            $this->_enviarEmail($email, $codigo);
            $data['activo'] = 'none';
            $data['contenido'] = 'visitante/emailEnviado';
            $this->load->view('plantilla/plantilla', $data);
            //redirect('home/', 'location');
        }
    }

    public function logout() {
        $this->load->helper('cookie');

        $this->session->unset_userdata('cliente');
        $this->cart->destroy();
        delete_cookie('id_user');
        delete_cookie('marca');

        redirect('home/', 'location');
    }

    function _unicoCorreo($correo) {
        $cliente = new Cliente();
        $cliente->get_by_EMail($correo);
        if ($cliente->exists()) {
            $this->form_validation->set_message("_unicoCorreo", "El correo ya se ecnuntra registrado");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _asignarMensajes() {
        $this->form_validation->set_message("matches", "<script type='text/javascript'>onDanger();</script>");
    }

    function _enviarEmail($email, $codigo) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'unmsm.fondo.editorial@gmail.com',
            'smtp_pass' => 'unmsm1234',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('unmsm.fondo.editorial@gmail.com', 'Editorial'); //Poner el remitente
        $this->email->to($email);


        $this->email->subject('Confirmacion de correo');
        $this->email->message("Por favor sigue el siguiente enlace para terminar con tu registro :<br>"
                . " <a href='".base_url()."cliente/confirmar/" . $codigo . "'>Enlace</a>");

        if (!$this->email->send()) {
            echo "error al enviar correo";
        }
    }

    function _generarCodigo() {
        $cadena = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $codigo = '';
        for ($i = 0; $i < 40; $i++) {
            $codigo.=$cadena[rand(0, strlen($cadena) - 1)];
        }
        return $codigo;
    }

    function confirmar($confirmacion) {
        $cliente = new Cliente();
        $cliente->where("Verificacion", $confirmacion);
        $cliente->get();
        if ($cliente->exists()) {
            $cliente->Verificacion = NULL;
            $cliente->Estado = 1;
            if ($cliente->save()) {
                redirect(base_url().'cliente/continuar');
            }
        }else{
            redirect(base_url().'cliente/registro');
        }
    }

    function continuar() {
        $data['activo'] = 'none';
        $data['contenido'] = 'visitante/cuentaConfirmada';
        $this->load->view('plantilla/plantilla', $data);
    }
    function recuperar(){
        
    }

}
