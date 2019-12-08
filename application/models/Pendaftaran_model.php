<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_pendaftaran';
        $detail = '';
        parent::__construct($table,$detail);
    }

    public function detailPendaftaran(){
        $today =date('ymd');
        $this->db->select("tbl_pendaftaran.no_pendaftaran,tbl_pendaftaran.kd_pasien,tbl_jadwal.kd_dokter,tbl_dokter.nama AS 'namadokter', pasien.nama,tgl_lahir,pasien.jenis_kelamin,pasien.nohp,tbl_pendaftaran.status");
        $this->db->from('pasien');
        $this->db->join('tbl_pendaftaran','tbl_pendaftaran.kd_pasien=pasien.kd_pasien');
        $this->db->join('tbl_jadwal','tbl_jadwal.kd_jadwal=tbl_pendaftaran.kd_jadwal');
        $this->db->join('tbl_dokter','tbl_dokter.kd_dokter=tbl_jadwal.kd_dokter');
        $this->db->like('tbl_pendaftaran.no_pendaftaran',$today,'after');//change value no pendaftaran
        $this->db->where('tbl_jadwal.kd_dokter','28');//change value dokter
        return $this->db->get();
    }

    public function getItemTambah($kodepasien){
        $query = "
			SELECT tbl_pendaftaran.kd_pasien,tbl_jadwal.kd_dokter,pasien.nama AS 'namapasien',
			tbl_dokter.nama AS 'namadokter'
			FROM tbl_jadwal,tbl_pendaftaran,pasien,tbl_dokter
			WHERE 
			tbl_pendaftaran.kd_pasien=pasien.kd_pasien &&
			tbl_pendaftaran.kd_jadwal=tbl_jadwal.kd_jadwal &&
			tbl_jadwal.kd_dokter = tbl_dokter.kd_dokter &&
			tbl_pendaftaran.no_pendaftaran = '$kodepasien'
        ";
        
        return $this->db->query($query)->row();
    }

    public function getNama(){
        $query = "
			SELECT tbl_dokter.nama AS 'namadokter',pasien.nama AS 'namapasien'
			FROM tbl_dokter,pasien
			where kd_dokter='$kd_dokter' && kd_pasien='$kd_pasien'
		";
        return $this->db->query($query)->row();
    }

    public function get_faktur($query){
        return $this->db->query($query);
    }

    public function getDataPasien($query){
        return $this->db->query($query)->result();
    }

    public function countPasien(){
       return  $this->db->count_all('tbl_pendaftaran');
    }

    // public function getFaktur(){
    //     $this->db->select_max('no_pendaftaran');
    //     $this->db->from('tbl_pendaftaran');
    //     $this->db->where('')
    //     select max(no_pendaftaran) as last from tbl_pendaftaran where no_pendaftaran like '$nopendaf%' & ";
    // }

    public function getkdDokter($where){
        $this->db->select('kd_dokter');
        $this->db->from('tbl_jadwal');
        $this->db->where('kd_jadwal',$where);
        return $this->db->get()->row();
    }

  public function checkStatus(){
        $this->db->select('status,no_pendaftaran');
        $this->db->from('tbl_pendaftaran');
        return $this->db->get()->result_array();
    }

    
}


// <?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Pendaftaran_model extends MY_Model {
//     public function __construct(){
//         $table = 'tbl_pendaftaran';
//         $detail = '';
//         parent::__construct($table,$detail);
//     }

//     public function checkStatus(){
//         $this->db->select('status,no_pendaftaran');
//         $this->db->from('tbl_pendaftaran');
//         return $this->db->get()->result_array();
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
// 	public function get_data($query){

// 		return $this->db->query($query);
// 	}

// 	public function input_data($data)
//     {
//         $this->db->insert('tbl_pendaftaran',$data);
//     }

//      public function hapus_data($where,$table){
//     	$this->db->where($where);
//     	$this->db->delete($table);
//     }

//     public function edit_data($where,$table){
//     	return $this->db->get_where($table,$where);
//     }
//     public function getDataPasien($query){

//         return $this->db->query($query)->result();
//     }

//     public function update_data($where,$data,$table){
//     	$this->db->where($where);
//     	$this->db->update($table,$data);
//     }

//      public function get_faktur($query){
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
// }


