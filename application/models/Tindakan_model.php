<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_tindakan';
        $detail = 'detail_tindakan';
        parent::__construct($table,$detail);
    }

    public function delete_log($id){
        $query ="delete from log_gaji_karyawan where keterangan like '%detail_tindakan$id'";
        $this->db->query($query);
    }
}
