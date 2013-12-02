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

        if ($this->session->userdata('cliente') == FALSE) {
            $data['activo'] = 'registro';
            $data['contenido'] = 'visitante/registro';
            $this->load->view('plantilla/plantilla', $data);
        }else{
            redirect('/home');
        }
    }

    public function showLogin($error = NULL) {
        if ($this->session->userdata('cliente') == FALSE) {
            $data['activo'] = 'none';
            $data['contenido'] = 'visitante/login';
            if ($error != NULL) {
                $data['error'] = $error;
            }
            $this->load->view('plantilla/plantilla', $data);
        }else{
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
                    redirect_back();
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
            $cliente = new Cliente();
            $cliente->Nombre = $nombre;
            $cliente->Apellidos = $apellido;
            $cliente->EMail = $email;
            $cliente->Direccion = $direccion;
            $cliente->Telefono = $telefono;
            $cliente->Contrasena = md5($clave);

            $cliente->save();

            redirect('home/', 'location');
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
            $this->form_validation->set_message("_unicoCorreo","<script type='text/javascript'>onCorreo();</script>");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _asignarMensajes() {
        $this->form_validation->set_message("required", "El campo %s es requerido");
        $this->form_validation->set_message("valid_email", "El email ingresado no es valido");
        $this->form_validation->set_message("matches","<script type='text/javascript'>onDanger();</script>");
    }

}
