<?php

/**
 * 
 */
class Labor extends CI_Controller
{
	
	public function index(){

		$data = [
			'lab' => $this->labor_model->getAll()
		];
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('labor/v_views',$data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('labor/v_add');
		$this->load->view('templates/footer');
	}

	public function simpanData(){
		$no			 = $this->input->post('no');
		$tindakan    = $this->input->post('tindakan');
		$feedokter   = $this->input->post('feedokter');
		$feekaryawan = $this->input->post('feekaryawan');
		$harga 		 = $this->input->post('harga');
		$deskripsi   = $this->input->post('deskripsi');

		$data = array(
			'tindakan' 	   => $tindakan,
			'fee_dokter'   => $feedokter,
			'fee_karyawan' => $feekaryawan,
			'harga' 	   => $harga,
			'deskripsi'    => $deskripsi
		);

		$where = array( 'no' => $no);

		if($no == ''){
		  $this->labor_model->insert($data);
		  $this->session->set_flashdata('flash','di tambahkan');
		}else{
		  $this->labor_model->update($data,$where);
		  $this->session->set_flashdata('flash','di update');
		}
		redirect('labor/index');
	}

	public function hapusData($no){
		$where = array( 'no' => $no);
		$this->labor_model->delete($where);
		$this->session->set_flashdata('flash','di hapus');
		redirect('labor/index');
	}

	public function edit(){
		$no    = $this->input->post('no');
		$where = array( 'no' => $no);
		$data  = $this->labor_model->getAllWhere($where);
		echo json_encode($data);
	}
}