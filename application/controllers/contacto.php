<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contactanos
 *
 * @author Carito
 */
class contacto extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if (isset($_POST['email'])) {
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

            $this->email->from($_POST['email'], $_POST['nombre']);
            $this->email->to('unmsm.fondo.editorial@gmail.com');

            $this->email->subject('Contacto del Fondo Editorial');
            $this->email->message($_POST['nombre'] . ", se ha puesto en contacto contigo y te ha dicho: " . $_POST['comentario']);

            if ($this->email->send()) {
                $data['contenido'] = 'visitante/contacto';
                $data['activo'] = 'contacto';
                $this->load->view('plantilla/plantilla', $data);
            }
        } else {

            $data['contenido'] = 'visitante/contacto';
            $data['activo'] = 'contacto';
            $data['email'] = '';
            $data['nombre'] = '';
            $array = $this->session->userdata('cliente');
            if ($array) {

                $cliente = new Cliente($array['id']);
                $data['email'] = $cliente->EMail;
                $data['nombre'] = $cliente->Nombre;
            }

            $this->load->view('plantilla/plantilla', $data);
        }
    }

}

?>
