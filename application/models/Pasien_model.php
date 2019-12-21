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

    public function getCountRekam($kd){
        $query = "SELECT count(tbl_transaksi.no_faktur)AS total FROM tbl_transaksi,pasien,tbl_pendaftaran
        WHERE tbl_transaksi.no_faktur=tbl_pendaftaran.no_pendaftaran && tbl_pendaftaran.kd_pasien=pasien.kd_pasien
        && pasien.kd_pasien=$kd";
        return $this->db->query($query)->row();
    }

    public function getDetailRiwayat($kd){
        $query = "SELECT tbl_transaksi.no_faktur,tbl_dokter.nama,tbl_transaksi.created_at FROM tbl_transaksi,pasien,tbl_pendaftaran,tbl_dokter,tbl_jadwal
        WHERE tbl_transaksi.no_faktur=tbl_pendaftaran.no_pendaftaran && tbl_pendaftaran.kd_pasien=pasien.kd_pasien && tbl_pendaftaran.kd_jadwal=tbl_jadwal.kd_jadwal && tbl_jadwal.kd_dokter=tbl_dokter.kd_dokter
        && pasien.kd_pasien=$kd";
        return $this->db->query($query)->result_array();
    }

    public function getCountDokter($kd){
        $query = "SELECT COUNT(DISTINCT tbl_dokter.nama)AS total FROM tbl_dokter,tbl_pendaftaran,tbl_jadwal,pasien,tbl_transaksi
        where tbl_dokter.kd_dokter=tbl_jadwal.kd_dokter && tbl_jadwal.kd_jadwal=tbl_pendaftaran.kd_jadwal && tbl_pendaftaran.kd_pasien=pasien.kd_pasien && tbl_transaksi.no_faktur=tbl_pendaftaran.no_pendaftaran && pasien.kd_pasien=$kd";
        return $this->db->query($query)->row();
    }

    public function getDetailDokter($kd){
        $query = "SELECT DISTINCT(tbl_dokter.nama),tbl_dokter.noizin,tbl_dokter.nohp,tbl_dokter.kd_dokter FROM tbl_dokter,tbl_pendaftaran,tbl_jadwal,pasien,tbl_transaksi
        where tbl_dokter.kd_dokter=tbl_jadwal.kd_dokter && tbl_jadwal.kd_jadwal=tbl_pendaftaran.kd_jadwal && tbl_pendaftaran.kd_pasien=pasien.kd_pasien && tbl_transaksi.no_faktur=tbl_pendaftaran.no_pendaftaran && pasien.kd_pasien=$kd";
        return $this->db->query($query)->result_array();
    }
}