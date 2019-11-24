<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spesialis extends CI_Controller {

	public function index()
	{
		$data['spesialis'] = $this->spesialis_model->getAll();
		$this->load->model('spesialis_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('spesialis/v_view',$data);
		$this->load->view('templates/footer');

	}

	function getdata(){
		$data = $this->spesialis_model->getAll();
		echo json_encode($data);
	}

	public function add_data(){
		$no 		= $this->input->post('kd_spesialis');
		$nama 		= $this->input->post('namaspesialis');	
		$tarif		= $this->input->post('tarif');
		$keterangan	= $this->input->post('keterangan');
		$valid = array('succes' => false, 'messages' => array());

		$this->load->library('form_validation');
		$this->form_validation->set_rules('namaspesialis','nama','required');
		$this->form_validation->set_rules('tarif','tarif','required|numeric');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		

		$data = array(
			'nama'				=> $nama,
			'tarif'				=> $tarif,
			'keterangan'		=> $keterangan
		);

		$where = array(
			'kd_spesialis'	=> $no
		);

		if($no == ''){
			if($this->form_validation->run()){
				$valid['succes'] = true;
				$datas = $this->spesialis_model->insert($data);	
			}else{
				foreach ($_POST as $key => $value) {
					$valid['messages'][$key] = form_error($key);
			 	}
			}	
		}else{
			if($this->form_validation->run()){
				$valid['succes'] = true;
				$datas = $this->spesialis_model->update($data,$where);	
			}else{
				foreach ($_POST as $key => $value) {
					$valid['messages'][$key] = form_error($key);
			 	}
			}
		}

		echo json_encode($valid);	
		
	}

	public function hapus($kd_spesialis){
		$where = array('kd_spesialis' => $kd_spesialis);
		$this->spesialis_model->delete($where,'tbl_spesialis');
		$this->session->set_flashdata('flash','Dihapus');
		redirect('spesialis/index');
	}

	public function edit(){
		$kd_spesialis = $this->input->post('kd_spesialis');
		$where = array('kd_spesialis' => $kd_spesialis);
		$data  = $this->spesialis_model->getAllWhere($where);

		echo json_encode($data);	
	}
}
