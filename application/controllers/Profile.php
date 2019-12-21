 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {



	public function index()
	{
		$query = "
			SELECT tbl_dokter.*,tbl_spesialis.tarif 
			FROM tbl_dokter,tbl_spesialis
			WHERE tbl_spesialis.kd_spesialis = tbl_dokter.spesialis &&
			tbl_dokter.kd_dokter = '28'
		";
		$where = array('kd_dokter' => '28');

		$jadwal = array('kd_dokter');
		$data =[
				'dokter' => $this->profile_model->get_data($query)->result(),
				'pasien'   => $this->dokter_model->getTotalPasien(28),
			]; 
		$this->load->model('profile_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('profile/v_view',$data);
		$this->load->view('templates/footer');

	}

	

	public function absen(){
		$today = date('ymd');
		$kd_dokter = $this->input->post('kd_dokter');
		$tarif 	   = $this->input->post('tarif');

		$data = array(
				'kd_absensi' => $today,
				'kd_dokter' => $kd_dokter,
				'tarif' => $tarif
		);
		
		$data = $this->profile_model->input_data($data,'tbl_absensi');

		echo json_encode($data);
	}

	public function checkData(){
		$today = date('ymd');
		$query = "select max(kd_absensi) as last from tbl_absensi where kd_absensi like '$today%' && kd_dokter= 28";

		$data =$this->profile_model->get_absen($query)->result_array();

		$hasil = true;
		
		foreach($data as $row){
			if($row['last']){
			    $hasil = true;
			    echo json_encode($hasil);
			}else{
				$hasil = false;
			    echo json_encode($hasil);
			}
		}


	}


	
}
