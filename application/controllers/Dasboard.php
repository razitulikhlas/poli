<?php

class Dasboard extends CI_Controller 
{
    public function index(){
		$data = [
			"pasien"   =>$this->pasien_model->getCount(),
			"dokter"   =>$this->dokter_model->getCount(),
			"karyawan" =>$this->karyawan_model->getCount(),
		];
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dasboard/v_view',$data);
		$this->load->view('templates/footer');
	}
	
	public function getCountDiagnosaIsMonth(){
		$data = $this->dasboard_model->getDiagnosa();
		echo json_encode($data);
	}
	
	public function getCountDiagnosaWhere(){
		$starttime   = $this->input->post('start');
		$endtime     = $this->input->post('end');
		$data = $this->dasboard_model->getDiagnosaWhere($starttime,$endtime);
		echo json_encode($data);
	}

	public function getCountTindakanIsMonth(){
		$data = $this->dasboard_model->getTindakan();
		echo json_encode($data);
	}

	public function getCountTindakanWhere(){
		$starttime   = $this->input->post('start');
		$endtime     = $this->input->post('end');
		$data = $this->dasboard_model->getTindakanWhere($starttime,$endtime);
		echo json_encode($data);
	}
    
}
