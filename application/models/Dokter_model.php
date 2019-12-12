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

    public function getTotalDiagnosa($kd){
        $query = "select count(tbl_diagnosa.kd_dokter) from tbl_diagnosa JOIN tbl_dokter
        on tbl_diagnosa.kd_dokter=tbl_dokter.kd_dokter
        WHERE tbl_diagnosa.kd_dokter=$kd";
        // $this->db->select_count("tbl_diagnosa.kd_dokter");
        // $this->db->from("tbl_diagnosa");
        // $this->db->join("tbl_dokter","tbl_dokter.kd_dokter=tbl_diagnosa.kd_dokter");
        // $this->db->where("tbl_diagnosa",$kd);
        return $this->db->query($query)->row();
    }
}

