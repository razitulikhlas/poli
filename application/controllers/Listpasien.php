<?php 

class ListPasien extends CI_Controller
{
	public function index(){
		$data = [
			"pasien" => $this->pendaftaran_model->detailPendaftaran()
		];
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('waiting/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function tambah($kodepasien,$kd_dokter){
		$data = [
			"kodepasien" => $kodepasien,
			"detail"  	 => $this->pendaftaran_model->getItemTambah($kodepasien),
			"diagnosa"   => $this->diagnosa_model->getAll(),
		];
 		$this->load->model('pendaftaran_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('waiting/v_add',$data);
		$this->load->view('templates/footer');
	}


	public function simpanRekamMedis(){
		$nofaktur  = $this->input->post('nofaktur');
		$kd_dokter = $this->input->post('kddokter');
		$kd_pasien = $this->input->post('kdpasien');
		$keluhan   = $this->input->post('keluhan');
		$diagnosa  = $this->input->post('diagnosa');

		$rekam_medik = array(
			"no_faktur" => $nofaktur,
			"kd_pasien" => $kd_pasien,
			"kd_dokter" => $kd_dokter,
			"keluhan"   => $keluhan
		);

		$this->rekammedis_model->inputData($rekam_medik,$diagnosa,$nofaktur);
		redirect('listpasien/rincianData/'.$nofaktur);

	}

	public function saveRincian(){
		$kd_rincian = $this->input->post('kd_rincian');

		if($kd_rincian == 1){ //kd rincian 1 untuk menyimpan detail_obat 
			$kode_obat = $this->input->post('kd_obat');
			$subharga  = $this->input->post('subharga');
			$jumlah    = $this->input->post('jumlah');
			$faktur    = $this->input->post('faktur');
	
			$data = array( 
				'no_faktur' => $faktur,
				'kd_obat'   => $kode_obat,
				'jumlah'    => $jumlah,
				'sub_total' => $subharga,
			);	

			$result  = $this->save('detail_obat',$data);
		}else if($kd_rincian == 2){ //kd rincian 2 untuk menyimpan detail_tindakan
			$faktur = $this->input->post('faktur');
			$kd_tindakan = $this->input->post('kd_tindakan');
			$kd_karyawan = $this->input->post('kd_karyawan');

			$data = array(
				"no_faktur"   => $faktur,
				"kd_tindakan" => $kd_tindakan,
				"kd_karyawan" => $kd_karyawan,
			);

			$this->save('detail_tindakan',$data);

		}else if($kd_rincian == 3){ //kd rincian 3 untuk menyimpan detail_lab
			$faktur = $this->input->post('faktur');
			$kd_labor = $this->input->post('kd_labor');
			$kd_karyawan = $this->input->post('kd_karyawan');

			$data = array(
				"no_faktur"   => $faktur,
				"kd_labor"    => $kd_labor,
				"kd_karyawan" => $kd_karyawan,
			);

			$this->save('detail_lab',$data);
		}
		
	}

	public function save($table,$data){
		$data = $this->obat_model->saveRincian($table,$data);
		if($data > 0){
			echo json_encode('succes');
		}else{
			echo json_encode('gagal');
		}
	}

	public function getRincian(){
		$kd_rincian = $this->input->post('kd_rincian');
		$faktur     = $this->input->post('faktur');
		$result[]  = '';
		
		if($kd_rincian == 1){ //kd rincian 1 untuk mengambil detail_obat sesuai nofaktur 
			$select    = "tbl_obat.nama_obat,detail_obat.sub_total";
			$join      = 'detail_obat.kd_obat=tbl_obat.kd_obat';
			$where     = '191115PJ-001';
			$sum       = 'sub_total';
			$result    = [
				'rincian' => $this->obat_model->getRincian($select,$join,$faktur),
				'subharga'=> $this->obat_model->subHarga($sum,$join,$faktur)
			];
			
		}else if($kd_rincian == 2){ //kd rincian 2 untuk mengambil detail_tindakan sesuai nofaktur
			$select    = "tindakan,harga";
			$join      = 'detail_tindakan.kd_tindakan=tbl_tindakan.no';
			$where     = '191115PJ-001';
			$sum       = 'harga';
			$result    = [
				'rincian' => $this->tindakan_model->getRincian($select,$join,$faktur),
				'subharga'=> $this->tindakan_model->subHarga($sum,$join,$faktur)
			];
			
		}else{ //kd rincian 3 untuk mengambil detail_lab sesuai nofaktur
			$select    = "tindakan,harga";
			$join      = 'detail_lab.kd_labor=laboratorium.no';
			$where     = '191115PJ-001';
			$sum       = 'harga';
			$result    = [
				'rincian' => $this->labor_model->getRincian($select,$join,$faktur),
				'subharga'=> $this->labor_model->subHarga($sum,$join,$faktur)
			];
			
		}
		echo json_encode($result);
	}

	public function rincianData($nofaktur){
		$detail_medik 	 = array('no_faktur' => $nofaktur);
		$detail_diagnosa = array('no_faktur' => $nofaktur);
		$data = [
		"rekam_medik" => $this->rekammedis_model->detailMedik($detail_medik,'rekam_medik')->row(),
		"diagnosa"   => $this->diagnosa_model->getAll(),
		"obat"		 => $this->obat_model->getAll(),
		"tindakan"   => $this->tindakan_model->getAll(),
		"karyawan"   => $this->karyawan_model->getAll(),
		"lab"		 => $this->labor_model->getAll()
		];

		$this->load->model('pendaftaran_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('waiting/v_rincian',$data);
		$this->load->view('templates/footer');
		
	}

	public function getDetailDiagnosa(){
		$nofaktur = $this->input->post('faktur');

		$where = array('no_faktur' => $nofaktur );
		$data  = $this->diagnosa_model->getAllWhere($where); 
		echo json_encode($data);
	}

	public function getNama(){
		$kd_dokter = $this->input->post('kd_dokter');
		$kd_pasien = $this->input->post('kd_pasien');

		

		$nama = $this->pendaftaran_model->getNama($kd_dokter,$kd_pasien);
		echo json_encode($nama);
	}
}


 ?>