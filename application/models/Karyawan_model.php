<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_karyawan';
        $detail = '';
        parent::__construct($table,$detail);
    }

    public function getRiwayat($where){
        return  $this->db->get_where('log_gaji_karyawan',$where)->result_array();
    }

    public function getKaryawan($where){
        return  $this->db->get_where('tbl_karyawan',$where)->result_array();
    }
}
