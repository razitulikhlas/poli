<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_jadwal';
        $detail = '';
        parent::__construct($table,$detail);
    }

    public function getDetail(){
        $this->db->select("tbl_dokter.nama AS 'namadokter',tbl_spesialis.nama AS 'namapoli',tbl_jadwal.*,tbl_dokter.photo,tbl_jadwal.keterangan");
        $this->db->from('tbl_dokter');
        $this->db->join('tbl_jadwal','tbl_jadwal.kd_dokter=tbl_dokter.kd_dokter');
        $this->db->join('tbl_spesialis','tbl_spesialis.kd_spesialis=tbl_jadwal.kd_poli');
        return $this->db->get()->result_array();
    }

    public function getName($kd_jadwal){
        $this->db->select("tbl_dokter.nama AS 'nama',tbl_jadwal.*");
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_dokter','tbl_dokter.kd_dokter=tbl_jadwal.kd_dokter');
        $this->db->where('kd_jadwal',$kd_jadwal);
        return $this->db->get()->row();

    }
}