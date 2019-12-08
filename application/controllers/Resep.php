<?php

class Resep extends CI_Controller{

    public function index(){
        
		$this->load->model('resep_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('resep/v_view');
		$this->load->view('templates/footer');
	}

	public function update(){
		$faktur   = $this->input->post('no_faktur');
		$karyawan  = $this->input->post('karyawan');
		$dibayar   = $this->input->post('dibayar');
		$kembalian = $this->input->post('kembalian');

		$where = array('no_faktur' => $faktur);
		$data  = array(
			"pelayan"   => $karyawan,
			"dibayar"   => $dibayar,
			"kembalian" => $kembalian
		);

		$this->resep_model->update($data,$where);
		$this->session->set_flashdata('flash','di bayar');
		redirect('resep/index');


	}

	public function getDatas(){
		$data['resep'] = $this->resep_model->getAll();
		echo json_encode($data);

	}
	public function edit(){
		$nofaktur = $this->input->post('no_faktur');
		$where = array('no_faktur' => $nofaktur);
		$data  = $this->resep_model->getAllWhere($where);
		echo json_encode($data);
		
	}
	public function tambah(){
			
		$data = [
			'kd_dokter' => $this->input->post('kd_dokter'),
			'kd_pasien' => $this->input->post('kd_pasien'),
			'kd_obat'   => $this->obat_model->get_data()
		];

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('resep/v_add',$data);
		$this->load->view('templates/footer');
		
	}

	public function getData(){
		$kd_dokter = $this->input->post('kd_dokter');
		$kd_pasien = $this->input->post('kd_pasien');
		$where	   = array('kd_dokter' => $kd_dokter );
		$wheres	   = array('kd_pasien' => $kd_pasien );

		$dok = $this->resep_model->get_detail($where,'tbl_dokter')->result();
		$pas = $this->resep_model->get_detail($wheres,'pasien')->result();
		$data 	   = [
				'datadokter' => $dok,
				'datapasien' => $pas
		];
		echo json_encode($data);
	}

	public function detailObat(){
		$kd_obat = $this->input->post('kd_obat');
		$where   = array('kd_obat' => $kd_obat);
		$data 	 = $this->resep_model->getDetailWhere($where);
		echo json_encode($data);
	}

	public function hapusData(){
		$no = $this->input->post('no');
		$where = array('no' => $no);
		$data = $this->resep_model->hapus_data($where,'detail_resep');
		$result['pesan'] = 'berhasil';
		echo json_encode($result);
	}

	public function getFaktur(){
		
		$today = date('ymd');
		$query = "select max(no_faktur) as last from detail_resep where no_faktur like '$today%'";

		$data =$this->resep_model->get_faktur($query)->result_array();

		$faktur = '';
		
		foreach($data as $row){
			
			if($row['last']){
			    $nomor = explode("-",$row['last'],2);
			    $faktur = $today.'-'.str_pad(($nomor[1]+1),3,'0',STR_PAD_LEFT);
			}else{
			    $faktur = $today.'-'.'001';
			}

		}

		echo json_encode($faktur);

	
		
	}

	public function getDataTable(){

		$faktur = $this->input->post('faktur');
		$query = array('detail_resep.no_faktur' => $faktur);
		$data = $this->resep_model->get_detailResep($query)->result();
		echo json_encode($data);
	}

	public function save(){
		$faktur   = $this->input->post('faktur');
		$kd_obat  = $this->input->post('kd_obat');
		$harga    = $this->input->post('harga');
		$jumlah   = $this->input->post('jumlah');
		$subharga = $this->input->post('subharga');

		$result['pesan'] = '';

		$data = array(
			'no'		=> '',
			'no_faktur' => $faktur,
			'kd_obat'   => $kd_obat,
			'harga'     => $harga,
			'jumlah'    => $jumlah,
			'sub_total' => $subharga	

		);

		$this->resep_model->input_data($data,'detail_resep');
		echo json_encode($result);

	}

	public function totalHarga(){
		$faktur = $this->input->post('faktur');
		$data = $this->resep_model->get_Total($faktur)->result();
		echo json_encode($data);
	}

	public function savePembayaran(){
		$faktur 	 = $this->input->post('nofaktur');
		$kd_pasien 	 = $this->input->post('kd_pasien');
		$kd_dokter 	 = $this->input->post('kd_dokter');
		$totalharga  = $this->input->post('totalHarga');
		$dibayar  	 = $this->input->post('dibayar');
		$kembalian   = $this->input->post('kembalian');
		$pelayan	 = $this->input->post('pelayan');

		$data  = array(

			'no_faktur'   => $faktur,
			'kd_pasien'   => $kd_pasien,
			'kd_dokter'   => $kd_dokter,
			'total_harga' => $totalharga,
			'dibayar'     => $dibayar,
			'kembalian'   => $kembalian,
			'pelayan'     => $pelayan

		);

		$data = $this->resep_model->input_resep($data,'tbl_resep');
		$result['pesan']= "sukses";

		redirect('dokter/index');

	}

	public function detail($nofaktur){
		$data ['faktur'] = $nofaktur;
		$this->load->model('resep_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('resep/v_detail',$data);
		$this->load->view('templates/footer');
	}

	public function hapus(){
		$no = $this->input->post('no');
		$where = array('no' => $no);
		$this->resep_model->hapus_data($where,'detail_resep');
	}

		

	

	
}