<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends MY_Model {
    public function __construct(){
        $table  = 'tbl_obat';
        $detail = 'detail_obat';
        parent::__construct($table,$detail);
    }

    public function saveRincian($table,$data){
        $this->db->insert($table,$data);
        return $this->db->affected_rows();
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


// }