<?php 
class ListPasien extends CI_Controller
{
	public function index(){
		
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('waiting/v_view');
		$this->load->view('templates/footer');
	}
	public function Detail($faktur){
		$data = [
			"keluhan"   	=> $this->keluhan_model->getAll(),
			"diagnosa"  	=> $this->diagnosa_model->getRincian("tbl_diagnosa.nama_diagnosa,detail_diagnosa.no",'detail_diagnosa.kd_diagnosa=tbl_diagnosa.no',$faktur),
			"obat"      	=> $this->obat_model->getRincian("tbl_obat.nama_obat,detail_obat.sub_total,detail_obat.no",'detail_obat.kd_obat=tbl_obat.kd_obat',$faktur),
			"hargaobat" 	=> $this->obat_model->subHarga('sub_total','detail_obat.kd_obat=tbl_obat.kd_obat',$faktur),
			"tindakan"      => $this->tindakan_model->getRincian("tindakan,detail_tindakan.harga,detail_tindakan.no",'detail_tindakan.kd_tindakan=tbl_tindakan.no',$faktur),
			"hargatindakan" => $this->tindakan_model->subHarga("detail_tindakan.harga",'detail_tindakan.kd_tindakan=tbl_tindakan.no',$faktur),
			"labor"			=> $this->labor_model->getRincian("tindakan,detail_lab.harga,detail_lab.no",'detail_lab.kd_labor=laboratorium.no',$faktur),
			"hargalabor"    => $this->labor_model->subHarga('detail_lab.harga','detail_lab.kd_labor=laboratorium.no',$faktur),
			"no_faktur"     => $faktur
		];
		
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('waiting/v_rincian',$data);
		$this->load->view('templates/footer');
	}
	public function getData(){
		$data = [
			"pasien" => $this->pendaftaran_model->detailPendaftaran()->result()
		];
		echo json_encode($data);
	}
	public function tambah($kodejadwal,$kd_dokter,$kd_pasien){
		// $detail_medik 	 = array('no_faktur' => $nofaktur);
		// $detail_diagnosa = array('no_faktur' => $nofaktur);
		// $data = [
		// "rekam_medik" => $this->rekammedis_model->detailMedik($detail_medik,'rekam_medik')->row(),
		
		// ];
		$where = array( 'kd_pasien' => $kd_pasien);
		$data = [
			"pasien"     => $this->pasien_model->getWhere($where),
			"kodepasien" => $kodejadwal,
			"detail"  	 => $this->pendaftaran_model->getItemTambah($kodejadwal),
			"diagnosa"   => $this->diagnosa_model->getAll(),
			"obat"		 => $this->obat_model->getAll(),
			"tindakan"   => $this->tindakan_model->getAll(),
			"karyawan"   => $this->karyawan_model->getAll(),
			"lab"		 => $this->labor_model->getAll(),
			"dokter"     => $kd_dokter
		];
 		$this->load->model('pendaftaran_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('waiting/v_diagnosa',$data);
		$this->load->view('templates/footer');
	}
	public function simpanData(){
		$faktur    = $this->input->post('faktur');
		$total     = $this->input->post('total');
		$kd_dokter = $this->input->post('kd_dokter');
		$data = array( 
				'no_faktur'   => $faktur,
				'total_harga' => $total
		);	
	
		$where   = array(
			"no_pendaftaran" => $faktur
		);
		$dataupdate = array(
			"status" => 1
		);

		$result  = $this->save('tbl_transaksi',$data);//save data
		$this->pendaftaran_model->update($dataupdate,$where);//update status transaksi
		// $this->insertRiwayat($kd_dokter,$faktur);
		echo json_encode($result);
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
			$faktur      = $this->input->post('faktur');
			$kd_tindakan = $this->input->post('kd_tindakan');
			$kd_karyawan = $this->input->post('kd_karyawan');
			$harga       = $this->input->post('harga');
			$feedokter   = $this->input->post('feedokter');
			$feekaryawan = $this->input->post('feekaryawan');
			
			$data = array(
				"no_faktur"   => $faktur,
				"kd_tindakan" => $kd_tindakan,
				"kd_karyawan" => $kd_karyawan,
				"harga"       => $harga,
				"fee_dokter"  => $feedokter,
				"fee_karywan"=> $feekaryawan,

			);
			$result  = $this->save('detail_tindakan',$data);
		}else if($kd_rincian == 3){ //kd rincian 3 untuk menyimpan detail_lab
			$faktur = $this->input->post('faktur');
			$kd_labor = $this->input->post('kd_labor');
			$kd_karyawan = $this->input->post('kd_karyawan');
			$harga = $this->input->post('harga');
			$feedokter   = $this->input->post('feedokter');
			$feekaryawan = $this->input->post('feekaryawan');
			$data = array(
				"no_faktur"   => $faktur,
				"kd_labor"    => $kd_labor,
				"kd_karyawan" => $kd_karyawan,
				"harga"       => $harga,
				"fee_dokter"  => $feedokter,
				"fee_karywan" => $feekaryawan,
			);
			$result  = $this->save('detail_lab',$data);
		}else if($kd_rincian == 4){ //kd rincian 4 untuk menyimpan keluhan
			$faktur = $this->input->post('faktur');
			$keluhan   = $this->input->post('keluhan');
			$data = array(
				"no_faktur" => $faktur,
				"keluhan"   => $keluhan,
			);
			$result  = $this->save('detail_keluhan',$data);
		}else if($kd_rincian == 5){ //kd rincian 5 untuk menyimpan diagnosa
			$faktur   = $this->input->post('faktur');
			$diagnosa = $this->input->post('diagnosa');
			$data = array(
				"no_faktur" => $faktur,
				"kd_diagnosa"   => $diagnosa,
			);
			$result  = $this->save('detail_diagnosa',$data);
		}
		echo json_encode($result);
		
	}
	public function pembayaran(){
			$faktur = $this->input->post('faktur');
			$total = $this->input->post('total');
			$dibayar = $this->input->post('dibayar');
			$kembalian = $this->input->post('kembalian');
			$data = array(
				"no_faktur"   => $faktur,
				"total_harga" => $total,
				"dibayar"     => $dibayar,
				"kembalian"   => $kembalian
			);
			$result = $this->resep_model->insert($data);
			if($result > 0){
				echo json_encode('succes');
			}else{
				echo json_encode('failed');
			}
		
	}
	public function save($table,$data){
		$data = $this->obat_model->saveRincian($table,$data);
		if($data > 0){
			return 'succes';
			// echo json_encode('succes');
		}else{
			return 'gagal';
			// echo json_encode('gagal');
		}
	}
	public function getRincian(){
		$kd_rincian = $this->input->post('kd_rincian');
		$faktur     = $this->input->post('faktur');
		$result[]  = '';
		
		if($kd_rincian == 1){ //kd rincian 1 untuk mengambil detail_obat sesuai nofaktur 
			$select    = "tbl_obat.nama_obat,detail_obat.sub_total,detail_obat.no";
			$join      = 'detail_obat.kd_obat=tbl_obat.kd_obat';
			$where     = '191115PJ-001';
			$sum       = 'sub_total';
			$result    = [
				'rincian' => $this->obat_model->getRincian($select,$join,$faktur),
				'subharga'=> $this->obat_model->subHarga($sum,$join,$faktur)
			];
			
		}else if($kd_rincian == 2){ //kd rincian 2 untuk mengambil detail_tindakan sesuai nofaktur
			$select    = "tindakan,detail_tindakan.harga,detail_tindakan.no";
			$join      = 'detail_tindakan.kd_tindakan=tbl_tindakan.no';
			$where     = '191115PJ-001';
			$sum       = 'detail_tindakan.harga';
			$result    = [
				'rincian' => $this->tindakan_model->getRincian($select,$join,$faktur),
				'subharga'=> $this->tindakan_model->subHarga($sum,$join,$faktur)
			];
			
		}else if($kd_rincian == 4){ //kd rincian 2 untuk mengambil detail_tindakan sesuai nofaktur
			$where = array( 'no_faktur' => $faktur);
			$result    = [
				'keluhan' => $this->keluhan_model->getAllWhere($where)
			];
			
		}else if($kd_rincian == 5){ //kd rincian 2 untuk mengambil detail_tindakan sesuai nofaktur
			$select    = "tbl_diagnosa.nama_diagnosa,detail_diagnosa.no";
			$join      = 'detail_diagnosa.kd_diagnosa=tbl_diagnosa.no';
			$result    = [
				'diagnosa' => $this->diagnosa_model->getRincian($select,$join,$faktur),
			];
			
		}else{ //kd rincian 3 untuk mengambil detail_lab sesuai nofaktur
			$select    = "tindakan,detail_lab.harga,detail_lab.no";
			$join      = 'detail_lab.kd_labor=laboratorium.no';
			$where     = '191115PJ-001';
			$sum       = 'detail_lab.harga';
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
		$data  = $this->diagnosa_model->getDetailWhere($where); 
		echo json_encode($data);
	}
	public function getNama(){
		$kd_dokter = $this->input->post('kd_dokter');
		$kd_pasien = $this->input->post('kd_pasien');
		$nama = $this->pendaftaran_model->getNama($kd_dokter,$kd_pasien);
		echo json_encode($nama);
	}
	public function hapusRincian(){
		$jenis = $this->input->post('jenis');
		$id    = $this->input->post('id');
		if($jenis == 1){
			$where  = array('no' => $id);
			$result = $this->obat_model->deleteDetail($where);
			if($result > 0){
				echo json_encode('success');
			}else{
				echo json_encode('failed');
			}
		}else if($jenis == 2){
			$where  = array('no' => $id);
			$result = $this->tindakan_model->deleteDetail($where);
			if($result > 0){
				echo json_encode('success');
			}else{
				echo json_encode('failed');
			}
		}else if($jenis == 4){
			$where  = array('no' => $id);
			$result = $this->keluhan_model->delete($where);
			if($result > 0){
				echo json_encode('success');
			}else{
				echo json_encode('failed');
			}
		}else if($jenis == 5){
			$where  = array('no' => $id);
			$result = $this->diagnosa_model->deleteDetail($where);
			if($result > 0){
				echo json_encode('success');
			}else{
				echo json_encode('failed');
			}
		}else{
			$where  = array('no' => $id);
			$result = $this->labor_model->deleteDetail($where);
			if($result > 0){
				echo json_encode('success');
			}else{
				echo json_encode('failed');
			}
		}
	}
	public function checkStatus(){
		$data = $this->pendaftaran_model->checkStatus();
		echo json_encode($data);
	}


}