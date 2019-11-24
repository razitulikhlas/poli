<?php

/**
 * 
 */
class Tindakan extends CI_Controller
{
	public function index(){

		$data = [
			'tindakan' => $this->tindakan_model->getAll()
		];
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tindakan/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tindakan/v_add');
		$this->load->view('templates/footer');
	}

	public function simpanData(){
		$no          = $this->input->post('no');
		$tindakan    = $this->input->post('tindakan',TRUE);
		$feedokter   = $this->input->post('feedokter',TRUE);
		$feekaryawan = $this->input->post('feekaryawan',TRUE);
		$harga 		 = $this->input->post('harga',TRUE);
		$deskripsi   = $this->input->post('deskripsi',TRUE);
		$valid = array('succes' => false, 'messages' => array());

		$this->load->library('form_validation');
		$this->form_validation->set_rules('tindakan','Diagnosa','required');
		$this->form_validation->set_rules('feedokter','Fee Dokter','required');
		$this->form_validation->set_rules('feekaryawan','Fee Karyawan','required');
		$this->form_validation->set_rules('harga','Harga','required');
		

		$data = array(
			'tindakan' 	   => $tindakan,
			'fee_dokter'   => $feedokter,
			'fee_karyawan' => $feekaryawan,
			'harga' 	   => $harga,
			'deskripsi'    => $deskripsi
		);

		$where = array( 'no' => $no);

		if($no == ''){
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('tindakan/v_add');
				$this->load->view('templates/footer');	
			}else{
				$this->tindakan_model->insert($data);
			    $this->session->set_flashdata('flash','di tambah');
			    redirect('tindakan/index');
			}
		}else{ 
			$this->tindakan_model->update($data,$where);
			$this->session->set_flashdata('flash','di update');
			redirect('tindakan/index');
		}

		
	}

	public function hapusData($no){
		$where = array( 'no' => $no);
		$this->tindakan_model->delete($where);
		$this->session->set_flashdata('flash','di hapus');
		redirect('tindakan/index');
	}

	public function edit(){
		$no    = $this->input->post('no');
		$where = array( 'no' => $no);
		$data  = $this->tindakan_model->getAllWhere($where);
		echo json_encode($data);
	}

	
}