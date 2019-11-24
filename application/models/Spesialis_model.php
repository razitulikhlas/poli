<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spesialis_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_spesialis';
        $detail = '';
        parent::__construct($table,$detail);
    }
}


