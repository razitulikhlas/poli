<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard_model extends CI_Model{
    public function getDiagnosa(){
        $query= "SELECT tbl_diagnosa.nama_diagnosa,COUNT( tbl_diagnosa.nama_diagnosa) as total FROM tbl_diagnosa,detail_diagnosa
        WHERE tbl_diagnosa.no=detail_diagnosa.kd_diagnosa && MONTH(detail_diagnosa.created_at)= MONTH(CURRENT_DATE) && YEAR(detail_diagnosa.created_at) = YEAR(CURRENT_DATE)
        GROUP BY tbl_diagnosa.nama_diagnosa
        ORDER BY total DESC";
        return $this->db->query($query)->result();
    }

    public  function getDiagnosaWhere($start,$end){
        $query = "SELECT tbl_diagnosa.nama_diagnosa,COUNT( tbl_diagnosa.nama_diagnosa) as total FROM tbl_diagnosa,detail_diagnosa
        WHERE tbl_diagnosa.no=detail_diagnosa.kd_diagnosa && DATE(detail_diagnosa.created_at) BETWEEN '$start' AND '$end'
        GROUP BY tbl_diagnosa.nama_diagnosa
        ORDER BY total DESC";
        return $this->db->query($query)->result();
    }

    public function getTindakan(){
        $query= "SELECT tbl_tindakan.tindakan,COUNT( tbl_tindakan.tindakan) as total FROM tbl_tindakan,detail_tindakan
        WHERE tbl_tindakan.no=detail_tindakan.kd_tindakan && MONTH(detail_tindakan.created_at)= MONTH(CURRENT_DATE) && YEAR(detail_tindakan.created_at) = YEAR(CURRENT_DATE)
        GROUP BY tbl_tindakan.tindakan
        ORDER BY total DESC";
        return $this->db->query($query)->result();
    }

    public  function getTindakanWhere($start,$end){
        $query = "SELECT tbl_tindakan.tindakan,COUNT( tbl_tindakan.tindakan) as total FROM tbl_tindakan,detail_tindakan
        WHERE tbl_tindakan.no=detail_tindakan.kd_tindakan && DATE(detail_tindakan.created_at) BETWEEN '$start' AND '$end'
        GROUP BY tbl_tindakan.tindakan
        ORDER BY total DESC";
        return $this->db->query($query)->result();
    }

}
