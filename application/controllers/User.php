<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->user_model->get_data();
		$this->load->model('user_model');
		$this->load->view('templates/header');
		$this->load->view('user/v_viewuser',$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
	}

	public function add_data(){
		$kduser 		 	= $this->input->post('kduser');
		$nama 	 			= $this->input->post('nama');
		$level  			= $this->input->post('level');
		$foto				= $_FILES['foto']['name'];
		$password	 	 	= $this->input->post('password');
		

		if ($foto==''){

		}else{
			$config['upload_path'] 		='./assets/foto/';
			$config['allowed_types'] 	='jpg|png|gif';

			$this->load->library('upload',$config);


			if(!$this->upload->do_upload('foto')){
				echo "Upload gagal";
				
			}else{
				$foto=$this->upload->data('file_name');
			}
		}

		$data = array( 
				'kd_user'  			=>$kduser,
				'nama'				=>$nama,
				'photo'				=>$foto,
				'level' 			=>$level,
				'password' 			=>$password
			);

		$this->user_model->input_data($data,'tbl_user');
		redirect('user/index');
	}

	public function hapus($kduser){
		$where = array('kd_user' => $kduser);
		$this->user_model->hapus_data($where,'tbl_user');
		redirect('user/index');

	}

	public function edit($kduser){
		$where = array('kd_user' => $kduser);
		$data['user'] = $this->user_model->edit_data($where,'tbl_user')->result();
		$this->load->view('templates/header');
		$this->load->view('user/v_edit',$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/sidebar');
		// redirect('dokter/index');
	}

	public function update(){
		$kduser 		 	= $this->input->post('kduser');
		$nama 	 			= $this->input->post('nama');
		$level  			= $this->input->post('level');
		$foto				= $_FILES['foto']['name'];
		$password	 	 	= $this->input->post('password');
		

		

		$data = array( 
				
				'nama'				=>$nama,
				'photo'				=>$foto,
				'level' 			=>$level,
				'password' 			=>$password
			);
		$where = array(
			'kd_user'  			=>$kduser
		);

		$this->user_model->update_data($where,$data,'tbl_user');
		redirect('user/index');

	}
}


