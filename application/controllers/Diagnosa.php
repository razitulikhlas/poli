<?php 

/**
 * 
 */
class Diagnosa extends CI_Controller{

	public function index(){

		$data['diagnosa'] = $this->diagnosa_model->getAll();
		$this->load->model('diagnosa_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('diagnosa/v_view',$data);
		$this->load->view('templates/footer');

	}

	public function tambah(){

		$this->load->model('diagnosa_model');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('diagnosa/v_add');
		$this->load->view('templates/footer');

	}

	public function simpanData(){
		$no        = $this->input->post('no');
		$diagnosa  = $this->input->post('diagnosa',TRUE);
		$deskripsi = $this->input->post('deskripsi',TRUE);
		$valid = array('succes' => false, 'messages' => array());

		$this->load->library('form_validation');
		$this->form_validation->set_rules('diagnosa','Diagnosa','required');
		

		$where = array( 'no' => $no );

		$data = array(
				'nama_diagnosa' => $diagnosa,
				'deskripsi' 	=> $deskripsi
			);

		if($no == ''){
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('diagnosa/v_add');
				$this->load->view('templates/footer');	
			}else{
				$this->diagnosa_model->insert($data);
			    $this->session->set_flashdata('flash','di tambah');
			    redirect('diagnosa/index');
			}	
			
		}else{
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('diagnosa/v_add');
				$this->load->view('templates/footer');	
			}else{
				$this->diagnosa_model->insert($data);
			    $this->session->set_flashdata('flash','di tambah');
			    redirect('diagnosa/index');
			} 
			$this->diagnosa_model->update($data,$where);
			$this->session->set_flashdata('flash','di update');
			redirect('diagnosa/index');
		}

	}

	public function hapus($no){
		$where = array( 'no' => $no );
		$this->diagnosa_model->delete($where);
		$this->session->set_flashdata('flash','dihapus');
		redirect('diagnosa/index');
	}

	public function edit(){
		$no    = $this->input->post('no');
		$where = array( 'no' => $no );
		$data  = $this->diagnosa_model->getAllWhere($where);
		echo json_encode($data);
	}

}
