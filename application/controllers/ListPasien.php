<?php 

/**
 * 
 */
class ListPasien extends CI_Controller
{
	public function index(){
		$today =date('ymd');
			$query = "SELECT pasien.nama AS 'namapasien',pasien.nohp AS 'no_hp',pasien.alamat AS 'Alamat',pasien.tgl_lahir,pasien.jenis_kelamin, tbl_dokter.nama AS 'namadokter',no_pendaftaran,tbl_jadwal.waktu AS 'waktu',
				tbl_jadwal.kd_dokter
					FROM tbl_dokter,pasien,tbl_jadwal,tbl_pendaftaran
					WHERE tbl_dokter.kd_dokter = tbl_jadwal.kd_dokter && 
					tbl_jadwal.kd_jadwal = tbl_pendaftaran.kd_jadwal && 
					tbl_pendaftaran.kd_pasien = pasien.kd_pasien && 
					tbl_jadwal.kd_dokter = 30 &&
					tbl_pendaftaran.no_pendaftaran like '191115%'";
		$data = [
			"pasien" => $this->pendaftaran_model->get_data($query),
		];
		$this->load->model('pendaftaran_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('waiting/v_view',$data);
		$this->load->view('templates/footer');
	}

	public function tambah($kodepasien,$kd_dokter){

		$query = "
			SELECT tbl_pendaftaran.kd_pasien,tbl_jadwal.kd_dokter,pasien.nama AS 'namapasien',
			tbl_dokter.nama AS 'namadokter'
			FROM tbl_jadwal,tbl_pendaftaran,pasien,tbl_dokter
			WHERE 
			tbl_pendaftaran.kd_pasien=pasien.kd_pasien &&
			tbl_pendaftaran.kd_jadwal=tbl_jadwal.kd_jadwal &&
			tbl_jadwal.kd_dokter = tbl_dokter.kd_dokter &&
			tbl_pendaftaran.no_pendaftaran = '$kodepasien'
		";

		$data = [
			"kodepasien" => $kodepasien,
			"detail"  	 => $this->pendaftaran_model->get_data($query)->row(),
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

	public function rincianData($nofaktur){

		$detail_medik 	 = array('no_faktur' => $nofaktur);
		$detail_diagnosa = array('no_faktur' => $nofaktur);


		$data = [
		"rekam_medik" => $this->rekammedis_model->detailMedik($detail_medik,'rekam_medik')->row(),
		"diagnosa"   => $this->diagnosa_model->getDiagnosa(),
		"obat"		 => $this->obat_model->get_data(),
		"tindakan"   => $this->tindakan_model->getData(),
		"karyawan"   => $this->karyawan_model->getData()->result(),
		"lab"		 => $this->labor_model->getData()
		];

		$this->load->model('pendaftaran_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('waiting/v_rincian',$data);
		$this->load->view('templates/footer');
		
	}

	public function getRincianObat(){
		$faktur = $this->input->post('faktur');
		$query = "SELECT tbl_obat.nama_obat,detail_obat.sub_total
				  FROM tbl_obat,detail_obat
				  WHERE detail_obat.kd_obat=tbl_obat.kd_obat &&
				  detail_obat.no_faktur = '$faktur'
		";

		$data =[ 
			"obat" 	=> $this->obat_model->getRincianObat($query)->result_array(),
			"subharga" => $this->obat_model->subHarga($faktur)->row()
		];
		echo json_encode($data);
   }

   public function getRincianTindakan(){
   		$faktur = $this->input->post('faktur');
   		$data   = [
   			'tindakan' => $this->tindakan_model->getDetailTindakan($faktur)->result(),
   			'subharga' => $this->tindakan_model->subHarga($faktur)->row()
   		];
   		echo json_encode($data);		
   }

   public function getRincianLab(){
   		$faktur    = $this->input->post('faktur');
   		$sum	   = 'harga';
   		$join      = 'detail_lab.kd_labor=laboratorium.no';
   		$tableJoin = 'detail_lab';
   		$where     = '191115PJ-001';
   		$data      = [
   			// 'lab' => $this->labor_model->getDetailLabor($faktur)->result(),
   			'subharga' => $this->labor_model->subHarga($sum,$join,$where,$tableJoin)
   			// 'subharga' => $this->labor_model->subHarga($faktur)

   		];
   		print_r($data['subharga']);
   		die();
   		echo json_encode($data);

   }

   public function saveTindakan(){
   		$faktur = $this->input->post('faktur');
   		$kd_tindakan = $this->input->post('kd_tindakan');
   		$kd_karyawan = $this->input->post('kd_karyawan');

   		$data = array(
   			"no_faktur"   => $faktur,
   			"kd_tindakan" => $kd_tindakan,
   			"kd_karyawan" => $kd_karyawan,
   		);

   		$data = $this->tindakan_model->saveDetailTindakan($data,'detail_tindakan');

   		if($data > 0){
   			echo json_encode("success");
   		}else{
   			echo json_encode('failed');
   		}
   }



	public function saveObat(){
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
		
		 $data = $this->obat_model->saveRincianObat($data,'detail_obat');
		if($data > 0){
			echo json_encode('succes');
		}else{
			echo json_encode('gagal');
		}
	}

	public function getDetailDiagnosa(){
		$nofaktur = $this->input->post('faktur');

		$where = array('no_faktur' => $nofaktur );
		$data  = $this->diagnosa_model->editData($where,'detail_diagnosa');

		echo json_encode($data);
	}

	public function getNama(){
		$kd_dokter = $this->input->post('kd_dokter');
		$kd_pasien = $this->input->post('kd_pasien');

		$query = "
			SELECT tbl_dokter.nama AS 'namadokter',pasien.nama AS 'namapasien'
			FROM tbl_dokter,pasien
			where kd_dokter='$kd_dokter' && kd_pasien='$kd_pasien'
		";

		$nama = $this->pendaftaran_model->get_data($query)->row();
		echo json_encode($nama);
	}
}


 ?>