<?php
/**
 * 
 */
class Karyawan extends CI_Controller
{
	
	public function index(){
		$data['karyawan'] = $this->karyawan_model->getAll();

		$this->load->model('karyawan_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('karyawan/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
		$this->load->model('karyawan_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('karyawan/v_add');
		$this->load->view('templates/footer');
	}

	public function simpanData(){
		$no    = $this->input->post('no');
		$nama  = $this->input->post('nama');
		$jk    = $this->input->post('jeniskelamin');
		$tgl   = $this->input->post('tgl');
		$no_hp = $this->input->post('nohp');
		$alamat = $this->input->post('alamat');

		$data = array(
			"nama" 			=> $nama,
			"jenis_kelamin" => $jk,
			"tanggal_lahir" => $tgl,
			"no_hp" 		=> $no_hp,
			"alamat"		=> $alamat,
		);

		$where = array( "no" => $no );

		if($no == ''){
			$this->karyawan_model->insert($data);
		    $this->session->set_flashdata("flash","di tambah");
		}else{
			$this->karyawan_model->update($data,$where);
		    $this->session->set_flashdata("flash","di update");	
		}
		redirect('karyawan/index');
	}

	public function hapusData($no){
		$where = array( "no" => $no);
		$this->karyawan_model->delete($where);
		$this->session->set_flashdata("flash","di hapus");
		redirect('karyawan/index');
	}

	public function editData(){
		$no 	= $this->input->post('no');
		$where  = array( "no" => $no);
		$data   = $this->karyawan_model->getAllWhere($where);
		echo json_encode($data);
	}
}