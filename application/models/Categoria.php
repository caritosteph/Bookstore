<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author Cristian
 */
class Categoria extends DataMapper{
    var $table = 'categoria';
    
    public function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
}
