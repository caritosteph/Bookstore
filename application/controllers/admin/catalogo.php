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
    }
    
    public function index($pag=0) {
        
        if(!isset($_GET['titulo'])){
            
            $datos['libros']= $this->catalogo_model->get_libros(NULL,$pag);
            $config['total_rows'] = $this->catalogo_model->get_total();
        }
        else{
            $datos['libros']= $this->catalogo_model->get_libros($_GET['titulo']);
            $config['total_rows'] = $this->catalogo_model->get_total($_GET['titulo']);
        }
       
        /************ Configuracion de la paginacion *************************/
        
        $config['base_url'] = base_url() . 'admin/catalogo';
        
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
            $s="{$_SERVER['DOCUMENT_ROOT']}/{$this->config->item('dirPrincipal')}/photo/".$_FILES['imagen']['name'];
            
            move_uploaded_file($_FILES['imagen']['tmp_name'],$s);
            if($id==  NULL){
                $this->catalogo_model->insertar();
            }
            else{
                $this->catalogo_model->actualizar($id);
            }
            $this->index();
         
         
        }
        
    }


}

?>
