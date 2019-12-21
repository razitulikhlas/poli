<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard_model extends CI_Model{
    public function getDiagnosa(){
        $query= "SELECT tbl_diagnosa.nama_diagnosa,COUNT( tbl_diagnosa.nama_diagnosa) as total FROM tbl_diagnosa,detail_diagnosa
        WHERE tbl_diagnosa.no=detail_diagnosa.kd_diagnosa && MONTH(detail_diagnosa.created_at) in (11,12) && YEAR(detail_diagnosa.created_at) in(2019,2020)
        GROUP BY tbl_diagnosa.nama_diagnosa
        ORDER BY total DESC";
        return $this->db->query($query)->result();
    }
}
