<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep_model extends MY_Model
{
    public function __construct()
    {
        $table = 'tbl_transaksi';
        $detail = 'tbl_obat';
        parent::__construct($table, $detail);
    }

    public function getCount()
    {
        $data = $this->db->count_all_results('tbl_transaksi');
        return $data;
    }

    public function getThisDay()
    {
        $query = "SELECT * FROM `tbl_transaksi` WHERE date(created_at) = CURRENT_DATE";
        $data = $this->db->query($query)->result_array();
        return $data;
    }
}

// <?php

// class Resep_model extends CI_Model{

//     public function get_data($query){
//         return $this->db->query($query);
//     }

//     public function get_detail($where,$table){
//     	return $this->db->get_where($table,$where);
//     }

//     public function get_faktur($query){
//     	return $this->db->query($query);
//     }
//     public function get_detailResep($query){
//         $this->db->select('*');
//         $this->db->from('detail_resep');
//         $this->db->join('tbl_obat','tbl_obat.kd_obat = detail_resep.kd_obat');
//         $this->db->where($query);
//         return $this->db->get();
//         // return $this->db->query($query);
//     }

//     public function input_data($data)
//     {
//         $this->db->insert('detail_resep',$data);
//     }

//     public function input_resep($data)
//     {
//         $this->db->insert('tbl_resep',$data);
//     }

//     public function get_Total($nofaktur){
//        $this->db->select('detail_resep.sub_total,SUM(sub_total) AS sub_total');
//        $this->db->from('detail_resep');
//        $this->db->where('no_faktur',$nofaktur);
//        return $query = $this->db->get(); 
//     }

//     public function hapus_data($where,$table){
//         $this->db->where($where);
//         $this->db->delete($table);
//     }
// }
