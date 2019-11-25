<?php 

/**
 * 
 */
class Pendaftaran_model extends CI_Model
{
	public function get_data($query){

		return $this->db->query($query);
	}

	public function input_data($data)
    {
        $this->db->insert('tbl_pendaftaran',$data);
    }

     public function hapus_data($where,$table){
    	$this->db->where($where);
    	$this->db->delete($table);
    }

    public function edit_data($where,$table){
    	return $this->db->get_where($table,$where);
    }
    public function getDataPasien($query){

        return $this->db->query($query)->result();
    }

    public function update_data($where,$data,$table){
    	$this->db->where($where);
    	$this->db->update($table,$data);
    }

     public function get_faktur($query){
        return $this->db->query($query);
    }
}

// <?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Pendaftaran_model extends MY_Model {
//     public function __construct(){
//         $table = 'tbl_karyawan';
//         $detail = '';
//         parent::__construct($table,$detail);
//     }

//     public function detailPendaftaran(){
//         $today =date('ymd');
//         $query = "SELECT pasien.nama AS 'namapasien',pasien.nohp AS 'no_hp',pasien.alamat AS 'Alamat',
//                 pasien.tgl_lahir,pasien.jenis_kelamin, tbl_dokter.nama AS 'namadokter',no_pendaftaran,
//                 tbl_jadwal.waktu AS 'waktu',
// 				tbl_jadwal.kd_dokter
// 				FROM 
//                 tbl_dokter,pasien,tbl_jadwal,tbl_pendaftaran
// 				WHERE 
//                 tbl_dokter.kd_dokter = tbl_jadwal.kd_dokter && 
// 				tbl_jadwal.kd_jadwal = tbl_pendaftaran.kd_jadwal && 
// 				tbl_pendaftaran.kd_pasien = pasien.kd_pasien && 
// 				tbl_jadwal.kd_dokter = 30 &&
//                 tbl_pendaftaran.no_pendaftaran like '191115%'";
//         return $this->db->query($query);
//     }

//     public function getItemTambah($kodepasien){
//         $query = "
// 			SELECT tbl_pendaftaran.kd_pasien,tbl_jadwal.kd_dokter,pasien.nama AS 'namapasien',
// 			tbl_dokter.nama AS 'namadokter'
// 			FROM tbl_jadwal,tbl_pendaftaran,pasien,tbl_dokter
// 			WHERE 
// 			tbl_pendaftaran.kd_pasien=pasien.kd_pasien &&
// 			tbl_pendaftaran.kd_jadwal=tbl_jadwal.kd_jadwal &&
// 			tbl_jadwal.kd_dokter = tbl_dokter.kd_dokter &&
// 			tbl_pendaftaran.no_pendaftaran = '$kodepasien'
//         ";
        
//         return $this->db->query($query)->row();
//     }

//     public function getNama(){
//         $query = "
// 			SELECT tbl_dokter.nama AS 'namadokter',pasien.nama AS 'namapasien'
// 			FROM tbl_dokter,pasien
// 			where kd_dokter='$kd_dokter' && kd_pasien='$kd_pasien'
// 		";
//         return $this->db->query($query)->row();
//     }

    
// }