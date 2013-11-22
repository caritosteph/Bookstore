<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author Carito
 */
class Categoria extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/categoria_model');
    }
    
    public function index($cad="") {
        $menu['activo']='categoria';
        $datos['categorias']=  $this->categoria_model->get_categorias(isset($_GET['categoria'])?$_GET['categoria']:"");
     
        $this->load->view('plantilla_admin/header',$menu);
        $this->load->view('admin/categoria',$datos);
        $this->load->view('plantilla_admin/footer');
    }
    
    public function eliminar($id) {
        $this->categoria_model->eliminar($id);
        $this->index(); 
    }
}

?>
