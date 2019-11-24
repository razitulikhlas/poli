<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spesialis_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_spesialis';
        parent::__construct($table);
    }
}


