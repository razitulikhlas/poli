<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenispoli extends CI_Controller {

	public function index()
	{
		$data['jenispoli'] = $this->jenispoli_model->get_data();
		$this->load->model('jenispoli_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jenispoli/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function add_data(){
		$kode_poli 	= $this->input->post('kd_poli');
		$nama 		= $this->input->post('namapoli');	
		$keterangan	= $this->input->post('keterangan');
		
		
		$data = array(
			'kd_poli'			=> $kode_poli,
			'nama_poli'			=> $nama,
			'keterangan'		=> $keterangan
		);

		$this->jenispoli_model->input_data($data,'jenis_poli');
		redirect('jenispoli/index');
	}

	public function hapus($kd_poli){
		$where = array('kd_poli' => $kd_poli);
		$this->poli_model->hapus_data($where,'jenis_poli');
		redirect('jenispoli/index');

	}

	public function edit($kd_poli){
		$where = array('kd_poli' => $kd_poli);
		$data['jenispoli'] = $this->jenispoli_model->edit_data($where,'jenis_poli')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jenispoli/v_edit',$data);
		$this->load->view('templates/footer');
		
	}

	public function update(){
		$kode_poli 	= $this->input->post('kd_poli');
		$nama 		= $this->input->post('namapoli');	
		$keterangan	= $this->input->post('keterangan');
		
		$data = array(
			
			'nama_poli'			=> $nama,
			'keterangan'	=> $keterangan
		);

		$where = array(
			'kd_poli'		=> $kode_poli
			);

		$this->jenispoli_model->update_data($where,$data,'jenis_poli');
		redirect('jenispoli/index');

	}
}
