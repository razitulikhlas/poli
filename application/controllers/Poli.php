<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {

	public function index()
	{
		$data['poli'] = $this->poli_model->get_data();
		$this->load->model('poli_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('poli/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function getdetail(){
		$data = $this->poli_model->get_detail();
		echo json_encode($data);
	}

	public function tambahdata(){
		$kode['kode'] = $this->input->post('kd_poli');
		$this->load->model('poli_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('poli/v_add',$kode);
		$this->load->view('templates/footer');
	}

	public function add_detail(){
		$no 		= $this->input->post('no');
		$kode_poli 	= $this->input->post('kdd_poli');	
		$kd_dokter	= $this->input->post('kdd_dokter');
		
		$result['pesan']='';

		$data = array(
			'no'		=> $no,
			'kd_poli'	=> $kode_poli,
			'kd_dokter'	=> $kd_dokter
		);

		$this->poli_model->input_detail($data,'detail_poli');
		echo json_encode($result);
	}

	public function add_data(){
		$kode_poli 	= $this->input->post('kd_poli');
		$nama 		= $this->input->post('namapoli');	
		$kd_dokter	= $this->input->post('kd_dokter');
		
		
		$data = array(
			'kd_poli'		=> $kode_poli,
			'nama'			=> $nama,
			'kd_dokter'		=> $kd_dokter
		);

		$this->poli_model->input_data($data,'tbl_poli');
		redirect('poli/index');
	}

	public function hapus($kd_poli){
		$where = array('kd_poli' => $kd_poli);
		$this->poli_model->hapus_data($where,'tbl_poli');
		redirect('poli/index');

	}

	public function hapusdetail(){
		$no = $this->input->post('no');
		$where = array('no' => $no);
		$this->poli_model->hapus_detail($where,'detail_poli');
		

	}

	public function edit($kd_poli){
		$where = array('kd_poli' => $kd_poli);
		$data['poli'] = $this->poli_model->edit_data($where,'tbl_poli')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('poli/v_edit',$data);
		$this->load->view('templates/footer');
		
	}

	public function update(){
		$kode_poli 	= $this->input->post('kd_poli');
		$nama 		= $this->input->post('namapoli');	
		$kd_dokter	= $this->input->post('kd_dokter');
		
		
		$data = array(
			
			'nama'			=> $nama,
			'kd_dokter'		=> $kd_dokter
		);

		$where = array(
			'kd_poli'		=> $kode_poli
			);

		$this->poli_model->update_data($where,$data,'tbl_poli');
		redirect('poli/index');

	}
}
