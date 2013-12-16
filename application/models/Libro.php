<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Libro
 *
 * @author Cristian
 */
class Libro extends DataMapper {

    var $table = 'libro';

    public function __construct($id = NULL) {
        parent::__construct($id);
    }

    public function size() {
        return $this->db->count_all_results('libro');
    }

    public function get_Libros_($url) {
        return $this->get_Libros($url, NULL, "Todo");
    }

    public function size_search($busqueda = NULL, $categoria) {

        $sql = 'select l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre from libro as l inner join categoria as c '
                . ' on c.id=l.categoriaID';


//        $this->db->select('l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre');
//        $this->db->from('libro as l');
//        $this->db->join('categoria as c', 'c.id=l.categoriaID ');

        if (strcmp($categoria, "Todo")!=0) {
            $sql .= " where c.Nombre = '" . $categoria . "' ";
        }
//        $this->db->where('c.Nombre', $categoria);

        if ($busqueda != NULL) {
            if(strcmp($categoria, "Todo")!= 0){
                $sql.= " where " ;
            }else{
                $sql.= " and ";
            }
            $sql .= " (l.Titulo like '%" . $busqueda . "%' or l.Autor like '%" . $busqueda . "%')";
//            $this->db->like('l.Titulo', $busqueda);
//            $this->db->or_like('l.Autor', $busqueda);
        }
        $sql.= ' order by l.Titulo asc';
        $query = $this->db->query($sql);
//        $this->db->order_by("titulo", "asc");
//        echo $sql;
//        $this->db->query($sql);
//        echo $query->num_rows();
        return $query->num_rows();
    }

    public function get_Libros($url, $busqueda = NULL, $categoria = NULL) {
        $total = $this->size_search($busqueda, $categoria);

        $sql = 'select l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre from libro as l inner join categoria as c '
                . ' on c.id=l.categoriaID';


//        $this->db->select('l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre');
//        $this->db->from('libro as l');
//        $this->db->join('categoria as c', 'c.id=l.categoriaID ');

        if (strcmp($categoria, "Todo")!= 0) {
            $sql .= " where c.Nombre = '" . $categoria . "' ";
        }
//        $this->db->where('c.Nombre', $categoria);

        if ($busqueda != NULL) {
            if(strcmp($categoria, "Todo")!=0){
                $sql.= " where " ;
            }else{
                $sql.= " and ";
            }
            $sql .= " (l.Titulo like '%" . $busqueda . "%' or l.Autor like '%" . $busqueda . "%')";
//            $this->db->like('l.Titulo', $busqueda);
//            $this->db->or_like('l.Autor', $busqueda);
        }
        if ($url == NULL) {
            $url = 0;
        }
        $sql.= ' order by l.Titulo asc limit ' . $url . ',' . POR_PAGINA;


//        $this->db->select('l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre');
//        $this->db->from('libro as l');
//        $this->db->join('categoria as c', 'c.id=l.categoriaID ');
//
//        if ($categoria != NULL && $categoria != 'Todo') {
//            $this->db->where('c.Nombre', $categoria);
//        }
//
//
//
//        if ($busqueda != NULL) {
//            $this->db->like('l.Titulo', $busqueda);
//            $this->db->or_like('l.Autor', $busqueda);
//        }
//        $this->db->order_by("titulo", "asc");
//        echo $sql;
        $query = $this->db->query($sql);
//        foreach ($query->result() as $r) {
//            $r->Titulo;
//        }
//        echo $sql;
        return array('result' => $query->result(),
            'size_result' => $total);
    }

}
