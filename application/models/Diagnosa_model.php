<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_diagnosa';
        $detail = '';
        parent::__construct($table,$detail);
    }
}
