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
        $query = "select count(tbl_diagnosa.kd_dokter) AS jumlah from tbl_diagnosa JOIN tbl_dokter
        on tbl_diagnosa.kd_dokter=tbl_dokter.kd_dokter
        WHERE tbl_diagnosa.kd_dokter=$kd";
        // $this->db->select_count("tbl_diagnosa.kd_dokter");
        // $this->db->from("tbl_diagnosa");
        // $this->db->join("tbl_dokter","tbl_dokter.kd_dokter=tbl_diagnosa.kd_dokter");
        // $this->db->where("tbl_diagnosa",$kd);
        return $this->db->query($query)->row();
    }

    public function getTotalPasien($kd){
        $query = "SELECT COUNT(DISTINCT tbl_pendaftaran.kd_pasien) AS total 
        FROM tbl_pendaftaran JOIN
        tbl_jadwal 
        ON tbl_pendaftaran.kd_jadwal=tbl_jadwal.kd_jadwal 
        join tbl_dokter 
        on tbl_jadwal.kd_dokter=tbl_dokter.kd_dokter
        WHERE tbl_dokter.kd_dokter=$kd";
        return $this->db->query($query)->row();
    }

    public function getRiwayat($where){
        return  $this->db->get_where('log_gaji',$where)->result_array();
    }

    public function getPasien($where){
        $this->db->select('pasien.kd_pasien,pasien.nama,pasien.jenis_kelamin,pasien.tempat_lahir,pasien.tgl_lahir,pasien.nohp,pasien.nama_ibu');
        $this->db->from('pasien');
        $this->db->join('tbl_pendaftaran','tbl_pendaftaran.kd_pasien=pasien.kd_pasien');
        $this->db->join('tbl_jadwal','tbl_jadwal.kd_jadwal=tbl_pendaftaran.kd_jadwal');
        $this->db->join('tbl_dokter','tbl_dokter.kd_dokter=tbl_jadwal.kd_dokter');
        $this->db->where('tbl_dokter.kd_dokter',$where);
        $this->db->group_by("pasien.kd_pasien");
        // return $this->db->get_compiled_select();
        return $this->db->get()->result_array();
    }
}

