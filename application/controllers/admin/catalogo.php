<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of catalogo
 *
 * @author Sadhu
 */
class Catalogo extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/catalogo_model');
        $this->load->library('pagination');
    }
    
    public function index($pag=1) {
        
        if(!isset($_GET['titulo'])){
            
            $datos['libros']= $this->catalogo_model->get_libros(NULL,$pag);
            $config['total_rows'] = $this->catalogo_model->get_total();
        }
        else{
            $datos['libros']= $this->catalogo_model->get_libros($_GET['titulo']);
            $config['total_rows'] = $this->catalogo_model->get_total($_GET['titulo']);
        }
       
        /************ Configuracion de la paginacion *************************/
        
        $config['base_url'] = base_url() . 'admin/catalogo/';
        
        $config['per_page'] = POR_PAGINA;
        
        
        $this->pagination->initialize($config);

        /********************************************************************/
        
        
        $menu['activo']='catalogo';
        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/catalogo', $datos);
        $this->load->view('plantilla_admin/footer');
        
    }
    
    public function eliminar($id) {
        $this->catalogo_model->eliminar($id);
        
        $this->index();
        
    }
    
    public function agregar() {
        $menu['activo']='catalogo';
        if(!isset($_POST['titulo'])){
            $datos['categorias']=$this->catalogo_model->get_categorias();
            $datos['titulo']='NUEVO LIBRO';
            $this->load->view('plantilla_admin/header',$menu);
            $this->load->view('admin/modificar_libro',$datos);
            $this->load->view('plantilla_admin/footer');
        }
        else{
            $this->catalogo_model->insertar();
            $this->index();
        }
    }
    
    public function modificar($id=NULL) {
        $menu['activo']='catalogo';
     
        if(!isset($_POST['titulo'])){
            if($id===  NULL){
                $datos['titulo']='NUEVO LIBRO';
            }
            else{
                $datos['titulo']='MODIFICAR LIBRO';
                $datos['libro']=  $this->catalogo_model->get($id);
            }
            
            $datos['categorias']=$this->catalogo_model->get_categorias();
            
            $this->load->view('plantilla_admin/header',$menu);
            $this->load->view('admin/modificar_libro',$datos);
            $this->load->view('plantilla_admin/footer');
        }
        else{
            $this->catalogo_model->insertar();
            $this->index();
        }
        
    }


}

?>
