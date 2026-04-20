<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class School extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/School_model', 'school_model');
		}
		
		public function index(){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['all_schools'] =  $this->school_model->get_all_schools();
			$data['view'] = 'admin/school/school_list';
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

				$this->form_validation->set_rules('school_name', 'school Name', 'trim|required');
				$this->form_validation->set_rules('doner_id', 'Doner Name', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/school/school_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'school_name' =>  $this->input->post('school_name'),
						'school_code' =>  $this->input->post('school_code'),
						'school_state' =>  $this->input->post('school_state'),
						'school_dist' =>  $this->input->post('school_dist'),
						'school_pincode' =>  $this->input->post('school_pincode'),
						'school_address' =>  $this->input->post('school_address'),
						'estab_year' =>  $this->input->post('estab_year'),
						'no_of_student' =>  $this->input->post('no_of_student'),
						'doner_id' =>  $this->input->post('doner_id'),
						'contact_person_name' =>  $this->input->post('contact_person_name'),
						'contact_person_email' =>  $this->input->post('contact_person_email'),
						'contact_person_mobile' =>  $this->input->post('contact_person_mobile'),
                        'hostel_medium_Of_Instruction' =>  $this->input->post('hostel_medium_Of_Instruction'),
                        'no_of_staff_teaching' =>  $this->input->post('no_of_staff_teaching'),
                        'no_of_non_staff_teaching' =>  $this->input->post('no_of_non_staff_teaching'),
                        'password' =>  $this->input->post('password'),
					
					);
					
					$data = $this->security->xss_clean($data);
					$result = $this->school_model->add_school($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/school'));
					}
				}
			}
			else{
				$data['view'] = 'admin/school/school_add';
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
				$this->form_validation->set_rules('school_name', 'school Name', 'trim|required');
				$this->form_validation->set_rules('doner_id', 'Doner Name', 'trim|required');
				

				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->school_model->get_school_by_id($id);
					$data['view'] = 'admin/school/school_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'school_name' =>  $this->input->post('school_name'),
						'school_code' =>  $this->input->post('school_code'),
						'school_state' =>  $this->input->post('school_state'),
						'school_dist' =>  $this->input->post('school_dist'),
						'school_pincode' =>  $this->input->post('school_pincode'),
						'school_address' =>  $this->input->post('school_address'),
						'estab_year' =>  $this->input->post('estab_year'),
						'no_of_student' =>  $this->input->post('no_of_student'),
						'doner_id' =>  $this->input->post('doner_id'),
						'contact_person_name' =>  $this->input->post('contact_person_name'),
						'contact_person_email' =>  $this->input->post('contact_person_email'),
						'contact_person_mobile' =>  $this->input->post('contact_person_mobile'),
                        'hostel_medium_Of_Instruction' =>  $this->input->post('hostel_medium_Of_Instruction'),
                        'no_of_staff_teaching' =>  $this->input->post('no_of_staff_teaching'),
                        'no_of_non_staff_teaching' =>  $this->input->post('no_of_non_staff_teaching'),
                        'password' =>  $this->input->post('password'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->school_model->edit_school($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						if($this->session->userdata('role')==='1'){
							redirect(base_url('admin/school'));
						}else{
							redirect(base_url('admin/school/profile'));	
						}
						
					}
				}
			}
			else{
				$data['user'] = $this->school_model->get_school_by_id($id);
				$data['view'] = 'admin/school/school_edit';
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
			$this->db->delete('schools', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/school'));
		}
		else{
			redirect('admin/auth/login');
		}
		}

		public function viewid($id = 0){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['user'] = $this->school_model->get_doner_by_sigl_id($id);
			
			$data['view'] = 'admin/school/school_view_sigal';
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
			$data['user'] = $this->school_model->get_doner_by_sigl_id($id);
			
			$data['view'] = 'admin/school/school_view_sigal';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}	

	}


?>