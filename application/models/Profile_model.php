<?php 

/**
 * 
 */
class Profile_model extends CI_Model
{
	public function get_data($query){
        
        return $this->db->query($query);

	}
    public function getDetail($query){

        return $this->db->query($query)->result_array();
    }

	public function input_data($data)
    {
        $this->db->insert('tbl_absensi',$data);
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

    public function get_absen($query){
        return $this->db->query($query);
    }
}
