<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function index()
	{
		$data['obat'] = $this->obat_model->getAll();
		$this->load->model('obat_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('obat/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function getData(){
		$data = $this->obat_model->getAll();
		echo json_encode($data);
	}

	public function tambah(){
		$data['dokter'] = $this->dokter_model->getAll();
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('obat/v_add',$data);
		$this->load->view('templates/footer');
	}

	public function add_data(){
		$kode_obat 	 = $this->input->post('kode_obat');
		$namaobat 	 = $this->input->post('namaobat');
		$miligram 	 = $this->input->post('miligram');
		$jenisobat	 = $this->input->post('jenisobat');
		$unit 	     = $this->input->post('unit');
		$jumlahunit  = $this->input->post('jumlahunit');
		$obatperunit = $this->input->post('obatperunit');
		$totalobat 	 = $this->input->post('totalobat');
		$hargabeli 	 = $this->input->post('hargabeli');
		$hargamodal  = $this->input->post('hargamodal');
		$hargajual 	 = $this->input->post('hargajual');
		$tglmasuk	 = $this->input->post('tgl_masuk');
		$expired	 = $this->input->post('expired');
	
		$data = array(
			'nama_obat'		  => $namaobat,
			'miligram'		  => $miligram,
			'jenis_obat'	  => $jenisobat,
			'unit'		      => $unit,
			'jumlah_unit'	  => $jumlahunit,
			'jumla_obat_unit' => $obatperunit,
			'total_obat'	  => $totalobat,
			'harga_beli'	  => $hargabeli,
			'harga_modal'	  => $hargamodal,
			'harga_jual'	  => $hargajual,
			'tgl_masuk'		  => $tglmasuk,
			'expired'		  => $expired,
		);

		$where = array(
			'kd_obat' => $kode_obat
		);

		if($kode_obat == ''){
		 $this->obat_model->insert($data);
		 $this->session->set_flashdata('flash','Ditambahkan');
		}else{
		  $this->obat_model->update($data,$where);
		  $this->session->set_flashdata('flash','Diupdate');
		}
		redirect('obat/index');
	}

	public function hapus($kd_obat){
		$where = array('kd_obat' => $kd_obat);
		$this->obat_model->delete($where);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('obat/index');
	}

	public function edit(){
		$kd_obat = $this->input->post('kd_obat');
		$where = array('kd_obat' => $kd_obat);
		$data  = $this->obat_model->getAllWhere($where);
		echo json_encode($data);	
	}
}
