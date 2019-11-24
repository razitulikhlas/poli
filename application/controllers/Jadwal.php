 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {



	public function index()
	{
		$data = [
			'jadwal'  	=> $this->jadwal_model->getDetail(),
			'dokter'  	=> $this->dokter_model->getAll()
		];
		$this->load->model('jadwal_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jadwal/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
		$data = [
			'dokter' => $this->dokter_model->getAll(),
			'spesialis' => $this->spesialis_model->getAll()
		];
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jadwal/v_add',$data);
		$this->load->view('templates/footer');

		
	}

	public function simpanJadwal(){
		$kd_dokter 	= $this->input->post('kd_dokter');
		$kd_poli	= $this->input->post('kd_poli');	
		$waktu	    = $this->input->post('waktu');
		$jadwal 	= $this->input->post('jadwal');
		$status  	= $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$kd_jadwal 	= $this->input->post('kd_jadwal');

		$data = array(
			'kd_dokter'	 => $kd_dokter,
			'waktu'		 => $waktu,
			'tanggal'	 => $jadwal,
			'status'	 => $status,
			'keterangan' => $keterangan,
			'kd_poli'	 => $kd_poli
		);

		$where = array(
			'kd_jadwal'	=> $kd_jadwal
		);

		if($kd_jadwal == ''){
		  $this->jadwal_model->insert($data);
		  $this->session->set_flashdata('flash','Di tambahkan');
		}else{
		  $this->jadwal_model->update($data,$where);
		  $this->session->set_flashdata('flash','Diubah');
		}
		redirect('jadwal/index');
	}

	public function hapus($kd_jadwal){
		$where = array('kd_jadwal' => $kd_jadwal);
		$this->jadwal_model->delete($where);
		$this->session->set_flashdata('flash','Di hapus');
		redirect('jadwal/index');

	}

	public function edit(){
		$kd_jadwal = $this->input->post('kd_jadwal');
		$where = array('kd_jadwal' => $kd_jadwal);
		$data  = $this->jadwal_model->getName($kd_jadwal);
		echo json_encode($data);	
	}

	public function getDokter(){
		$kd_poli = $this->input->post('kd_poli');
		$where = array('spesialis' => $kd_poli);
		$data  = $this->dokter_model->getAllWhere($where);
		echo json_encode($data);
	}
}
