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
class Libro_Model extends DataMapper{
    var $table = 'libro';
    public function __construct($id = NULL) {
        parent::__construct($id);
    }
}
