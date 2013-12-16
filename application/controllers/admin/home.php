<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Sadhu
 */
class Home extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('/admin/usuario_model');
    }
    
    public function index(){
        if(isset($_SESSION['nombre']))
            redirect(base_url() . 'admin/catalogo/');
        $datos['correo']="";
        $mensajes['mensaje']="";
        $this->load->view('plantilla_admin/header_login',$mensajes);
        $this->load->view('admin/login',$datos);
        $this->load->view('plantilla_admin/footer');
    }
    
    public function login() {
        $correo=$_POST['email'];
        $contrasena=$_POST['password'];
        
        $cuentas=$this->usuario_model->buscar($correo);
        $mensajes['mensaje']="";
        foreach ($cuentas as $c) {
            if($c->Contrasena==crypt($contrasena,$c->Contrasena)){
                session_start ();
                $_SESSION['nombre']=$c->Nombre;
                 redirect(base_url() . 'admin/catalogo/');
                 
                 $mensajes['mensaje']="<script type='text/javascript'>onBienvenido()</script>";
            }
        }
        if(count($cuentas)>0){
            
            $mensajes['mensaje']="<script type='text/javascript'>onDanger()</script>";
            $datos['correo']=$correo;
        }
        else{
            
            $mensajes['mensaje']="<script type='text/javascript'>onCorreo2()</script>";
            $datos['correo']="";
        }
        
        $this->load->view('plantilla_admin/header_login',$mensajes);
        $this->load->view('admin/login',$datos);
        $this->load->view('plantilla_admin/footer');
    }
    
    public function salir() {
        session_destroy(); 
        redirect(base_url() . 'admin/');
    }
}

?>
