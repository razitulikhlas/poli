<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends MY_Model {
    public function __construct(){
        $table = 'pasien';
        $detail = '';
        parent::__construct($table,$detail);
    }

    public function getDetail($kd_jadwal){
        $query = "SELECT * from pasien RIGHT JOIN tbl_pendaftaran
        ON pasien.kd_pasien = tbl_pendaftaran.kd_pasien where tbl_pendaftaran.no_pendaftaran=$kd_jadwal";

        return $this->db->query($query)->row();
    }
}