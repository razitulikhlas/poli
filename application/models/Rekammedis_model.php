<?php

class Rekammedis_model extends CI_Model{


    public function inputData($rekam_medik,$diagnosa,$nofaktur){
        
        $this->db->insert('rekam_medik',$rekam_medik);
        $result = array();
        
        foreach($diagnosa AS $key => $val){
            $result[] = array(
              'no_faktur'   => $nofaktur,
              'kd_diagnosa' => $_POST['diagnosa'][$key]
            );
        }      
        
        $this->db->insert_batch('detail_diagnosa', $result);
    }

    public function detailMedik($where,$table){
        return $this->db->get_where($table,$where);

    }



    
}