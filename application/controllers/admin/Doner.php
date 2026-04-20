<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Doner extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/Doner_model', 'doner_model');
		}
		
		public function index(){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['all_doners'] =  $this->doner_model->get_all_doners();
			$data['view'] = 'admin/doner/doner_list';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		
		public function add(){
			if($this->session->has_userdata('is_admin_login'))
			{
			if($this->input->post('submit')){

				$this->form_validation->set_rules('doner_name', 'Doner Name', 'trim|required');
				
				$this->form_validation->set_rules('doner_email', 'Email', 'trim|required');
				$this->form_validation->set_rules('doner_mobile', 'Number', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/doner/doner_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'doner_id' => $this->input->post('doner_id'),
						'doner_name' => $this->input->post('doner_name'),
						'doner_email' => $this->input->post('doner_email'),
						'doner_mobile' => $this->input->post('doner_mobile'),
						'doner_state' => $this->input->post('doner_state'),
						'doner_dist' => $this->input->post('doner_dist'),
						'doner_address' => $this->input->post('doner_address'),
						'doner_pincode' => $this->input->post('doner_pincode'),
						'doner_establishment' => $this->input->post('doner_establishment'),
						'doner_govt_aid' => $this->input->post('doner_govt_aid'),
						'president_name' => $this->input->post('president_name'),
						'president_mobile' => $this->input->post('president_mobile'),
						'president_email' => $this->input->post('president_email'),
						'secretary_name' => $this->input->post('secretary_name'),
						'secretary_mobile' => $this->input->post('secretary_mobile'),
						'secretary_email' => $this->input->post('secretary_email'),
						'treasurer_name' => $this->input->post('treasurer_name'),
						'treasurer_mobile' => $this->input->post('treasurer_mobile'),
						'treasurer_email' => $this->input->post('treasurer_email'),
						'password' => $this->input->post('password'),
						
					);
					$data = $this->security->xss_clean($data);
					$result = $this->doner_model->add_doner($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/doner'));
					}
				}
			}
			else{
				$data['view'] = 'admin/doner/doner_add';
				$this->load->view('admin/layout', $data);
			}
			
		}
		else{
			redirect('admin/auth/login');
		}
		}

		public function edit($id = 0){
			if($this->session->has_userdata('is_admin_login'))
			{
			if($this->input->post('submit')){
				$this->form_validation->set_rules('doner_name', 'Doner Name', 'trim|required');
				
				$this->form_validation->set_rules('doner_email', 'Email', 'trim|required');
				$this->form_validation->set_rules('doner_mobile', 'Number', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->doner_model->get_doner_by_id($id);
					$data['view'] = 'admin/doner/doner_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'doner_id' => $this->input->post('doner_id'),
						'doner_name' => $this->input->post('doner_name'),
						'doner_email' => $this->input->post('doner_email'),
						'doner_mobile' => $this->input->post('doner_mobile'),
						'doner_state' => $this->input->post('doner_state'),
						'doner_dist' => $this->input->post('doner_dist'),
						'doner_address' => $this->input->post('doner_address'),
						'doner_pincode' => $this->input->post('doner_pincode'),
						'doner_establishment' => $this->input->post('doner_establishment'),
						'doner_govt_aid' => $this->input->post('doner_govt_aid'),
						'president_name' => $this->input->post('president_name'),
						'president_mobile' => $this->input->post('president_mobile'),
						'president_email' => $this->input->post('president_email'),
						'secretary_name' => $this->input->post('secretary_name'),
						'secretary_mobile' => $this->input->post('secretary_mobile'),
						'secretary_email' => $this->input->post('secretary_email'),
						'treasurer_name' => $this->input->post('treasurer_name'),
						'treasurer_mobile' => $this->input->post('treasurer_mobile'),
						'treasurer_email' => $this->input->post('treasurer_email'),
						'password' => $this->input->post('password'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->doner_model->edit_doner($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						if($this->session->userdata('role')==='1'){
						redirect(base_url('admin/doner'));
					}else{
						redirect(base_url('admin/doner/profile'));	
					}
					}
				}
			}
			else{
				$data['user'] = $this->doner_model->get_doner_by_id($id);
				$data['view'] = 'admin/doner/doner_edit';
				$this->load->view('admin/layout', $data);
			}
		}
		else{
			redirect('admin/auth/login');
		}
		}

		public function del($id = 0){
			if($this->session->has_userdata('is_admin_login'))
			{
			$this->db->delete('doners', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/doner'));
		}
		else{
			redirect('admin/auth/login');
		}
		}


		public function viewid($id = 0){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['doner'] = $this->doner_model->get_doner_by_sigl_id($id);
			
			$data['view'] = 'admin/doner/doner_view_sigal';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}

		public function profile(){
			if($this->session->has_userdata('is_admin_login'))
			{
				$id=$this->session->userdata('admin_id');
			$data['doner'] = $this->doner_model->get_doner_by_sigl_id($id);
			$data['view'] = 'admin/doner/doner_view_sigal';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}

	}


?>