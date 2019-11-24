<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_dokter';
        $detail = '';
        parent::__construct($table,$detail);
    }

    public function getDetail(){
        $this->db->select("tbl_spesialis.nama AS 'namaspesialis',tbl_dokter.nama AS 'namadokter',noizin,nohp,tarif,kd_dokter");
        $this->db->from('tbl_spesialis');
        $this->db->join('tbl_dokter','tbl_dokter.spesialis=tbl_spesialis.kd_spesialis');
        return $this->db->get()->result_array();
    }
}

