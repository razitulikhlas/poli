<?php 

/**
 * 
 */
class Jenispoli_model extends CI_Model
{
	public function get_data(){

		return $this->db->get('jenis_poli')->result_array();
	}

	public function input_data($data)
    {
        $this->db->insert('jenis_poli',$data);
    }

    public function hapus_data($where,$table){
    	$this->db->where($where);
    	$this->db->delete($table);
    }

    public function edit_data($where,$table){
    	return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){
    	$this->db->where($where);
    	$this->db->update($table,$data);
    }
}