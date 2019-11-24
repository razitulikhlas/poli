<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends MY_Model {
    public function __construct(){
        $table = 'tbl_obat';
        parent::__construct($table);
    }
}

// <?php 

// /**
//  * 
//  */
// class Obat_model extends CI_Model
// {
// 	public function get_data(){

// 		return $this->db->get('tbl_obat')->result_array();
// 	}

// 	public function input_data($data)
//     {
//         $this->db->insert('tbl_obat',$data);
//     }

//     public function hapus_data($where,$table){
//     	$this->db->where($where);
//     	$this->db->delete($table);
//     }

//     public function edit_data($where,$table){
//     	return $this->db->get_where($table,$where);
//     }

//     public function update_data($where,$data,$table){
//     	$this->db->where($where);
//     	$this->db->update($table,$data);
//     }

//     public function getRincianObat($query){
//         return $this->db->query($query);
//     }

//     public function saveRincianObat($data){
//         $this->db->insert('detail_obat',$data);
//         return $this->db->affected_rows();
//     }

//     public function subHarga($nofaktur){
//         $this->db->select_sum('sub_total');
//         $this->db->from('detail_obat');
//         $this->db->where('no_faktur',$nofaktur);
//         return $this->db->get();
        
//     }
// }