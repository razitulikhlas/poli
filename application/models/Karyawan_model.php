<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_karyawan';
        parent::__construct($table);
    }
}