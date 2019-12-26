<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{



	public function index()
	{
		$data['spesialis'] = $this->spesialis_model->getAll();
		$this->load->model('pendaftaran_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pendaftaran/v_views', $data);
		$this->load->view('templates/footer');
	}

	public function tambah($no)
	{
		$today = date('ymd');
		$query = "SELECT tbl_dokter.nama as 'namadokter',kd_jadwal,waktu,tanggal,status,photo
				  FROM tbl_dokter,tbl_jadwal
				  WHERE tbl_dokter.kd_dokter = tbl_jadwal.kd_dokter && kd_poli= '$no' && tanggal like concat('%',DAYNAME(CURRENT_DATE),'%')";

		$data = [
			'jadwal'  => $this->jadwal_model->get_data($query),
			'kd_poli' => $no
		];
		$this->load->model('dokter_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pendaftaran/v_view', $data);
		$this->load->view('templates/footer');
	}

	public function getAll($kd_poli)
	{
		$data["all"] = $this->pendaftaran_model->getAllNopen($kd_poli);
		// print_r($data["all"]);
		// die();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pendaftaran/v_all', $data);
		$this->load->view('templates/footer');
	}

	public function getFaktur()
	{

		$kd_poli   = $this->input->post('kd_poli');
		$today     = date('ymd');
		$kd_jadwal = $this->input->post('kd_jadwal');
		$kd_dokter = $this->input->post('kd_dokter');
		$nopendaf  = $today . '' . $kd_poli . '' . $kd_dokter;

		$query   = "select max(no_pendaftaran) as last from tbl_pendaftaran where no_pendaftaran like '$today%' && kd_jadwal='$kd_jadwal'";

		$data = $this->pendaftaran_model->get_faktur($query)->result_array();

		$faktur = '';

		foreach ($data as $row) {
			if ($row['last']) {
				$nomor = explode("-", $row['last'], 2);
				$faktur = $nopendaf . '-' . str_pad(($nomor[1] + 1), 3, '0', STR_PAD_LEFT);
			} else {
				$faktur = $nopendaf . '-' . '001';
			}
		}

		echo json_encode($faktur);
	}

	public function simpanData()
	{

		$kd_jadwal 		= $this->input->post('kdjadwal');
		$nopendaftaran 	= $this->input->post('nopendaftaran');
		$kd_pasien		= $this->input->post('kd_pasien');
		$kd_poli 		= $this->input->post('kd_poli');
		// $keterangan  	= $this->input->post('keterangan');
		$pelayan	 	= '';

		$data = array(
			'no_pendaftaran' => $nopendaftaran,
			'kd_pasien'	    => $kd_pasien,
			'kd_poli'	    => $kd_poli,
			'kd_jadwal'	    => $kd_jadwal,
			// 'keterangan'    => $keterangan,
			// 'nama_pelayan'  => $pelayan
		);

		$this->pendaftaran_model->insert($data);
		$this->session->set_flashdata('flash', 'Di tambahkan');
		redirect('pendaftaran/index');
	}

	public function getDataPasien()
	{
		$kd_poli = $this->input->post('kd_poli');

		$query   = "
		SELECT pasien.nama AS 'namapasien', tbl_dokter.nama AS 'namadokter',
		no_pendaftaran,tbl_jadwal.waktu AS 'waktu'
		FROM tbl_dokter,pasien,tbl_jadwal,tbl_pendaftaran
		WHERE tbl_dokter.kd_dokter = tbl_jadwal.kd_dokter && 
		tbl_jadwal.kd_jadwal = tbl_pendaftaran.kd_jadwal && 
		tbl_pendaftaran.kd_pasien = pasien.kd_pasien &&
		tbl_pendaftaran.kd_poli = '$kd_poli' && date(tbl_pendaftaran.created_at)=CURRENT_DATE
					";

		$querypasien = "
		SELECT count(no_pendaftaran) AS 'jumlah' FROM 	tbl_pendaftaran 
		WHERE kd_poli = '$kd_poli' && date(created_at)=CURRENT_DATE
					";


		$querydokter = "
						SELECT count(kd_poli) AS 'jumlah' FROM 	tbl_jadwal 
						WHERE kd_poli = '$kd_poli' && date(created_at)=CURRENT_DATE

					";
		$data  = [
			"pasien" => $this->pendaftaran_model->getDataPasien($query),
			"total"  => $this->pendaftaran_model->getDataPasien($querypasien),
			"dokter" => $this->pendaftaran_model->getDataPasien($querydokter),
			"riwayat" => $this->pendaftaran_model->countPasien()
		];



		echo json_encode($data);
	}

	public function hapus($no)
	{
		$where = array('no_pendaftaran' => $no);
		$this->pendaftaran_model->delete($where);
		redirect('pendaftaran/index');
	}

	public function getKodeDokter()
	{
		$kd_jadwal = $this->input->post('kd_jadwal');
		$data = $this->pendaftaran_model->getkdDokter($kd_jadwal);

		echo json_encode($data);
	}


	// public function getTotal(){
	// 	$kd_poli = $this->input->post('kd_poli');


	// 	$data = [

	// 			'pasien' => $this->pendaftaran_model->getDataPasien($query);
	// 	];

	// 	echo json_encode($data);


	// }

	// public function hapus($kd_jadwal){
	// 	$where = array('kd_jadwal' => $kd_jadwal);
	// 	$this->jadwal_model->hapus_data($where,'tbl_jadwal');
	// 	$this->session->set_flashdata('flash','Di hapus');
	// 	redirect('jadwal/index');

	// }




}
