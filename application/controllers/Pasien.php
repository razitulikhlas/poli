<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function index()
	{
		$data['pasien'] = $this->pasien_model->getAll();
		$this->load->model('pasien_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pasien/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->load->model('pasien_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pasien/v_add');
		$this->load->view('templates/footer');

	}

	public function add_data(){
		$kode_pasien 	= $this->input->post('kode_pasien');
		$namapasien 	= $this->input->post('namapasien');	
		$jeniskelamin	= $this->input->post('jeniskelamin');
		$tempatlahir	= $this->input->post('kotalahir');
		$tgllahir		= $this->input->post('tgllahir');
		$alamat 		= $this->input->post('alamat');
		$provinsi		= $this->input->post('provinsi');
		$kota			= $this->input->post('kota');
		$kecamatan		= $this->input->post('kecamatan');
		$kelurahan		= $this->input->post('kelurahan');
		$namaibu		= $this->input->post('ibukandung');
		$nohp			= $this->input->post('nohp');
		
		$data = array(
			'nama'				=> $namapasien,
			'jenis_kelamin'		=> $jeniskelamin,
			'tempat_lahir'		=> $tempatlahir,
			'tgl_lahir'			=> $tgllahir,
			'alamat'			=> $alamat,
			'provinsi'			=> $provinsi,
			'kota'				=> $kota,
			'kecamatan'			=> $kecamatan,
			'kelurahan'			=> $kelurahan,
			'nama_ibu'			=> $namaibu,
			'nohp'				=> $nohp
		);

		$where = array(
			'kd_pasien'			=> $kode_pasien
		);

		if($kode_pasien == ''){
		  $this->pasien_model->insert($data);
		  $this->session->set_flashdata('flash','Ditambah');
		}else{
		  $this->pasien_model->update($data,$where);
		  $this->session->set_flashdata('flash','Diubah');
		}
		redirect('pasien/index');
	}

	public function hapus($kd_pasien){
		$where = array('kd_pasien' => $kd_pasien);
		$this->pasien_model->delete($where);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('pasien/index');
	}

	public function edit(){
		$kd_pasien = $this->input->post('kd_pasien');
		$where = array('kd_pasien' => $kd_pasien);
		$data  = $this->pasien_model->getAllWhere($where);
		echo json_encode($data);
	}
}
