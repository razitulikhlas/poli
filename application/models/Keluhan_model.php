<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluhan_model extends MY_Model {
    public function __construct(){
        $table     = 'detail_keluhan';
        $tablejoin = '';
        parent::__construct($table,$tablejoin);
    }

  
}