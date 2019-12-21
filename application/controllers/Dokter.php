 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return print_r($str);
}


	public function index()
	{
		$data =[
			'dokter' 	=> $this->dokter_model->getDetail(),
			'spesialis' => $this->spesialis_model->getAll()
		];

		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dokter/v_view',$data);
		$this->load->view('templates/footer');

	}

	public function diagnosaDokter($kd_dokter){
		$where = array("kd_dokter" => $kd_dokter);
		$data =[
			"diagnosa" => $this->diagnosa_model->getAllWhere($where),
			'dokter'   => $this->dokter_model->getWhere($where),
		];
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dokter/v_diagnosa',$data);
		$this->load->view('templates/footer');
	}

	public function pasienDokter($kd_dokter){
		$where = array("kd_dokter" => $kd_dokter);
		$data =[
			"pasien"   => $this->dokter_model->getPasien($kd_dokter),
			'dokter'   => $this->dokter_model->getWhere($where),
		];

		// print_r($data['pasien']);
		// die();
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dokter/v_pasien',$data);
		$this->load->view('templates/footer');
	}

	public function riwayatGaji($kd_dokter){

		$where = array("kd_dokter" => $kd_dokter);

		$data =[
			"riwayatgaji" => $this->dokter_model->getRiwayat($where),
			'dokter'   => $this->dokter_model->getWhere($where),
		];

		// print_r($data['riwayatgaji']);
		// die();
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dokter/v_riwayat',$data);
		$this->load->view('templates/footer');
	}

	public function detail($kd_dokter){
		$where = array('kd_dokter' => $kd_dokter);

		$data = [
			'dokter'   => $this->dokter_model->getWhere($where),
			'diagnosa' => $this->dokter_model->getTotalDiagnosa($kd_dokter),
			'pasien'   => $this->dokter_model->getTotalPasien($kd_dokter),
			'kddokter'   => $kd_dokter
		];

		// print_r($data['pasien']);
		// die();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dokter/v_detail',$data);
		$this->load->view('templates/footer');
	}

	public function tambah(){
		$data =[ 
			'spesialis' => $this->spesialis_model->getAll(),
			'dokter'	=> '',
		];
		
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dokter/v_add',$data);
		$this->load->view('templates/footer');
	}

	public function add_data(){
		$kode_dokter 	= $this->input->post('kode_dokter');
		$namadokter 	= $this->input->post('namadokter');	
		$jeniskelamin	= $this->input->post('jeniskelamin');
		$nohp 			= $this->input->post('nohp');
		$noizin			= $this->input->post('noizin');
		$alamat 		= $this->input->post('alamat');
		$provinsi		= $this->input->post('provinsi');
		$kota 			= $this->input->post('kota');
		$kecamatan 		= $this->input->post('kecamatan');
		$kelurahan		= $this->input->post('kelurahan');
		$kotalahir		= $this->input->post('kotalahir');
		$tanggal_lahir 	= $this->input->post('tgllahir');
		$spesialis 		= $this->input->post('spesialis');
		$email 			= $this->input->post('email');
		$password 		= $this->input->post('password');
		$foto 			=$_FILES['foto']['name'];
   
		if($foto==''){}else{
		  $config['upload_path']   = './assets/foto/';
		  $config['allowed_types'] = 'jpg|png|gif';
		  $this->load->library('upload',$config);	
			
			if(!$this->upload->do_upload('foto')){
				echo "Upload Gagal";
			} else {
				$poto = $this->upload->data('file_name');
			}
		}

		
		$data = array(
			'nama'			=> $namadokter,
			'jenis_kelamin'	=> $jeniskelamin,
			'nohp'			=> $nohp,
			'noizin'		=> $noizin,
			'alamat'		=> $alamat,
			'provinsi'		=> $provinsi,
			'kota'			=> $kota,
			'kecamatan'		=> $kecamatan,
			'kelurahan'		=> $kelurahan,
			'tampat_lahir'	=> $kotalahir,
			'tanggal_lahir' => $tanggal_lahir,
			'spesialis'		=> $spesialis,
			'email'			=> $email,
			'password'  	=> $password,
			'photo'			=> $foto
		);

		$where = array(
			'kd_dokter'		=> $kode_dokter
		);

		if($kode_dokter == ''){
		  $this->dokter_model->insert($data);
		  $this->session->set_flashdata('flash','Di tambahkan');
		}else{
		  $this->dokter_model->update($data,$where);
		  $this->session->set_flashdata('flash','Diubah');
		  redirect('dokter/index');
		}
		
	}

	public function hapus($kd_dokter){
		$where = array('kd_dokter' => $kd_dokter);
		$this->dokter_model->delete($where);
		$this->session->set_flashdata('flash','Di hapus');
		redirect('dokter/index');

	}

	public function edit(){
		
		$kd_dokter = $this->input->post('kd_dokter');
		$where = array('kd_dokter' => $kd_dokter);
		$data  = $this->dokter_model->getAllWhere($where);
		echo json_encode($data);
		
	}

	public function get_tarif(){
		$kd_spesialis = $this->input->post('kd_spesialis');
		$where = array('kd_spesialis' => $kd_spesialis);
		$data  = $this->spesialis_model->getAllWhere($where);

		echo json_encode($data);
	}
}
