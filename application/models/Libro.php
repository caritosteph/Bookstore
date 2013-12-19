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

        if ($busqueda != NULL) {
            $sql .= " where l.Titulo like '%" . $busqueda . "%' or l.Autor like '%" . $busqueda . "%' or "
                    . "c.Nombre like '%".$busqueda."%' and l.Existencias > 0 ";
        }else{
            $sql.= ' where l.Existencias > 0 ';
        }
        $sql.= ' order by l.Titulo asc';
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function get_Libros($url, $busqueda = NULL, $categoria = NULL) {
        $total = $this->size_search($busqueda, $categoria);

        $sql = 'select l.Titulo ,l.Autor,l.Precio,l.id,l.Imagen,c.Nombre from libro as l inner join categoria as c '
                . ' on c.id=l.categoriaID';
        if ($busqueda != NULL) {
            $sql .= " where l.Titulo like '%" . $busqueda . "%' or l.Autor like '%" . $busqueda . "%' or "
                    . "c.Nombre like '%".$busqueda."%' and l.Existencias > 0 ";
        }else{
            $sql.= ' where l.Existencias > 0 ';
        }
        if ($url == NULL) {
            $url = 0;
        }
        $sql.= ' order by l.Titulo asc limit ' . $url . ',' . POR_PAGINA;

        $query = $this->db->query($sql);
        return array('result' => $query->result(),
            'size_result' => $total);
    }

}
