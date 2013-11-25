<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Itemcesta
 *
 * @author Cristian
 */
class Itemcesta extends DataMapper{
    var $table = "itemcesta";
    public function __construct($id = NULL) {
        parent::__construct($id);
    }
    
}
