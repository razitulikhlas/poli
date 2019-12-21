<?php

class Dasboard extends CI_Controller 
{
    public function index(){
		$data = [
			"pasien"   =>$this->pasien_model->getCount(),
			"dokter"   =>$this->dokter_model->getCount(),
			"karyawan" =>$this->karyawan_model->getCount(),
			"diagnosa" =>$this->dasboard_model->getDiagnosa()
		];

      
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dasboard/v_view',$data);
		$this->load->view('templates/footer');
    }
    
}
