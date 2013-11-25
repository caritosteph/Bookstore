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
class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Categoria_model','c');
    }

    public function index($cad = "") {
        $menu['activo'] = 'categoria';
        $datos['categorias'] = $this->c->get_categorias(isset($_GET['categoria']) ? $_GET['categoria'] : "");

        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/categoria', $datos);
        $this->load->view('plantilla_admin/footer');
    }

    public function eliminar($id) {
        if ($this->c->eliminar($id) == true)
            $this->index();
        else
            echo 'Esta categoria esta siendo utiliazada';
    }

    public function modificar($id = NULL) {
        $menu['activo']='categoria';
     
        if(!isset($_POST['titulo'])){
            if($id===  NULL){
                $datos['titulo']='NUEVA CATEGORIA';
            }
            else{
                $datos['titulo']='MODIFICAR CATEGORIA';
                $datos['categoria']=  $this->c->get($id);
            }
            $this->load->view('plantilla_admin/header',$menu);
            $this->load->view('admin/modificar_categoria',$datos);
            $this->load->view('plantilla_admin/footer');
        }
        else{
            if($id==  NULL){
                $this->c->insertar();
            }
            else{
                $this->c->actualizar($id);
            }
            $this->index();
        }
    }

}

?>
