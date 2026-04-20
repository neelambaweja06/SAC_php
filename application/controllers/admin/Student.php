<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Student extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/Student_model', 'student_model');
		}
		
		public function index(){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['all_students'] =  $this->student_model->get_all_students();
			$data['view'] = 'admin/student/student_list';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		
		public function add(){
			
			if($this->session->has_userdata('is_admin_login'))
			{
				$currentDate = new DateTime();
				$fiscalYearStartMonth = 4;
				$fiscalYearStartDay = 1; 
				$currentYear = $currentDate->format('Y');
				if ($currentDate->format('n') < $fiscalYearStartMonth || ($currentDate->format('n') == $fiscalYearStartMonth && $currentDate->format('j') < $fiscalYearStartDay)) {
					$fiscalYear = ($currentYear - 1) . '-' . $currentYear;
				} else {
					$fiscalYear = $currentYear . '-' . ($currentYear + 1);
				}
			if($this->input->post('submit')){

				// Student Basic Info
$this->form_validation->set_rules('student_name_first', 'Student First Name', 'trim|required');
$this->form_validation->set_rules('student_name_last', 'Student Last Name', 'trim|required');
$this->form_validation->set_rules('student_dob', 'Date of Birth', 'trim|required');
$this->form_validation->set_rules('student_gender', 'Gender', 'trim|required');

// Parent Info
$this->form_validation->set_rules('student_father_name', 'Father Name', 'trim|required');
$this->form_validation->set_rules('student_mother_name', 'Mother Name', 'trim|required');

// Address Info
$this->form_validation->set_rules('student_state', 'State', 'trim|required');
$this->form_validation->set_rules('student_dist', 'District', 'trim|required');
$this->form_validation->set_rules('student_city', 'City/Town', 'trim|required');
$this->form_validation->set_rules('student_pincode', 'Pincode', 'trim|required|numeric');
$this->form_validation->set_rules('student_address', 'Full Address', 'trim|required');

// Class & Academic
$this->form_validation->set_rules('student_class', 'Class', 'trim|required');
$this->form_validation->set_rules('obtained_per', '% Obtained', 'trim|required');
$this->form_validation->set_rules('fav_subject', 'Favourite Subject', 'trim');
$this->form_validation->set_rules('obtained_per_in_subject', '% Obtained in Subject', 'trim|required');
$this->form_validation->set_rules('intrest', 'Interest', 'trim');
$this->form_validation->set_rules('any_achiv', 'Achievement', 'trim');
$this->form_validation->set_rules('what_does_child', 'Child Goal', 'trim');

// School (only if role = 1)
$this->form_validation->set_rules('school_id', 'School', 'trim|required');

				
				if ($this->form_validation->run() == FALSE) {
					
					$data['view'] = 'admin/student/student_add';
					$this->load->view('admin/layout', $data);
				
			}

				else{
					
					$school=$this->input->post('school_id');
					$school_code = $this->student_model->get_school_code($school);
					$last_id = $this->student_model->get_last_id($school);
					$new_id=$last_id+1;
					$three_digit_num = str_pad($new_id, 3, '0', STR_PAD_LEFT);
					$new_code=$school_code.$three_digit_num;
					$config['upload_path'] = 'student_img';
					$config['allowed_types'] = 'png|jpg|jpeg|webp';
					$config['encrypt_name'] = FALSE;
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('student_profile'))
					{
						$uploadData = $this->upload->data();
						$student_profile = $uploadData['file_name'];
					}
					else
					{
						$error = array('error' => $this->upload->display_errors());
						
					}
					///marksheet//////////////////
					$config['upload_path'] = 'marksheet';
					$config['allowed_types'] = 'png|jpg|jpeg|webp|pdf|doc';
					$config['encrypt_name'] = FALSE;
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('student_marksheet'))
					{
						
						$uploadData = $this->upload->data();
						$student_marksheet = $uploadData['file_name'];
					}
					else
					{
						$error = array('error' => $this->upload->display_errors());
						print_r($error );
						die;
						
					}
					
					$data = array(
						'student_name_first' => $this->input->post('student_name_first'),
						'student_name_last' => $this->input->post('student_name_last'),
						'fn_year' => $fiscalYear,
						'student_code' => $new_code,
						'student_dob' => $this->input->post('student_dob'),
						'student_gender' => $this->input->post('student_gender'),
						'student_father_name' => $this->input->post('student_father_name'),
						'student_mother_name' => $this->input->post('student_mother_name'),
						'student_state' => $this->input->post('student_state'),
						'student_dist' => $this->input->post('student_dist'),
						'student_city' => $this->input->post('student_city'),
						'student_pincode' => $this->input->post('student_pincode'),
						'student_address' => $this->input->post('student_address'),
						'student_class' => $this->input->post('student_class'),
						'obtained_per' => $this->input->post('obtained_per'),
						'fav_subject' => $this->input->post('fav_subject'),
						'obtained_per_in_subject' => $this->input->post('obtained_per_in_subject'),
						'intrest' => $this->input->post('intrest'),
						'any_achiv' => $this->input->post('any_achiv'),
						'what_does_child' => $this->input->post('what_does_child'),
						'school_id' => $this->input->post('school_id'),
                         
						
						'student_img' =>$student_profile,
						'student_marksheet' =>$student_marksheet,
					
					);
									
					$data = $this->security->xss_clean($data);
					$result = $this->student_model->add_student($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/student'));
					}
				}
			}
			else{
				
					$data['view'] = 'admin/student/student_add';
					$this->load->view('admin/layout', $data);
				
			}
			
		}
		else{
			redirect('admin/auth/login');
		}
		}

		public function edit($id = 0) {
			if ($this->session->has_userdata('is_admin_login')) {
				if ($this->input->post('submit')) {
					// Student Basic Info
$this->form_validation->set_rules('student_name_first', 'Student First Name', 'trim|required');
$this->form_validation->set_rules('student_name_last', 'Student Last Name', 'trim|required');
$this->form_validation->set_rules('student_dob', 'Date of Birth', 'trim|required');
$this->form_validation->set_rules('student_gender', 'Gender', 'trim|required');

// Parent Info
$this->form_validation->set_rules('student_father_name', 'Father Name', 'trim|required');
$this->form_validation->set_rules('student_mother_name', 'Mother Name', 'trim|required');

// Address Info
$this->form_validation->set_rules('student_state', 'State', 'trim|required');
$this->form_validation->set_rules('student_dist', 'District', 'trim|required');
$this->form_validation->set_rules('student_city', 'City/Town', 'trim|required');
$this->form_validation->set_rules('student_pincode', 'Pincode', 'trim|required|numeric');
$this->form_validation->set_rules('student_address', 'Full Address', 'trim|required');

// Class & Academic
$this->form_validation->set_rules('student_class', 'Class', 'trim|required');
$this->form_validation->set_rules('obtained_per', '% Obtained', 'trim|required');
$this->form_validation->set_rules('fav_subject', 'Favourite Subject', 'trim');
$this->form_validation->set_rules('obtained_per_in_subject', '% Obtained in Subject', 'trim|required');
$this->form_validation->set_rules('intrest', 'Interest', 'trim');
$this->form_validation->set_rules('any_achiv', 'Achievement', 'trim');
$this->form_validation->set_rules('what_does_child', 'Child Goal', 'trim');

// School (only if role = 1)
$this->form_validation->set_rules('school_id', 'School', 'trim|required');

		
					if ($this->form_validation->run() == FALSE) {
						$data['user'] = $this->student_model->get_student_by_id($id);
						if($this->session->userdata('role')==='1'){
							$page='student_edit';
						}else{
						$page='student_edit_school';	
						}
						$data['view'] = 'admin/student/'.$page;
						$this->load->view('admin/layout', $data);
					} else {
						$config['upload_path'] = 'student_img';
						$config['allowed_types'] = 'png|jpg|jpeg|webp';
						$config['encrypt_name'] = FALSE;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$current_student = $this->student_model->get_student_by_id($id);
						$student_profile = $current_student['student_img']; 
						if ($_FILES['student_profile']['name']) {
							
							if ($this->upload->do_upload('student_profile')) {
								$uploadData = $this->upload->data();
								$student_profile = $uploadData['file_name'];
							} else {
								$error = array('error' => $this->upload->display_errors());
								$this->session->set_flashdata('error', $error['error']);
							}
						}
		///////////////////////////marksheet///////////////////////////////////////////

							$config['upload_path'] = 'marksheet';
							$config['allowed_types'] = 'png|jpg|jpeg|webp';
							$config['encrypt_name'] = FALSE;
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							$current_marksheet = $this->student_model->get_student_by_id($id);
							$student_marksheet = $current_marksheet['student_marksheet']; 
							if ($_FILES['student_marksheet']['name']) {
								
								if ($this->upload->do_upload('student_marksheet')) {
									$uploadData = $this->upload->data();
									$student_marksheet = $uploadData['file_name'];
								} else {
									$error = array('error' => $this->upload->display_errors());
									echo ($error['error']);
									die;
								}
							}

						// Prepare data for update
						$data = array(
							'student_name_first' => $this->input->post('student_name_first'),
							'student_name_last' => $this->input->post('student_name_last'),
							'fn_year' => $this->input->post('fn_year'),
							'student_code' => $this->input->post('student_code'),
							'student_dob' => $this->input->post('student_dob'),
							'student_gender' => $this->input->post('student_gender'),
							'student_father_name' => $this->input->post('student_father_name'),
							'student_mother_name' => $this->input->post('student_mother_name'),
							'student_state' => $this->input->post('student_state'),
							'student_dist' => $this->input->post('student_dist'),
							'student_city' => $this->input->post('student_city'),
							'student_pincode' => $this->input->post('student_pincode'),
							'student_address' => $this->input->post('student_address'),
							'student_class' => $this->input->post('student_class'),
							'obtained_per' => $this->input->post('obtained_per'),
							'fav_subject' => $this->input->post('fav_subject'),
							'obtained_per_in_subject' => $this->input->post('obtained_per_in_subject'),
							'intrest' => $this->input->post('intrest'),
							'any_achiv' => $this->input->post('any_achiv'),
							'what_does_child' => $this->input->post('what_does_child'),
							'school_id' => $this->input->post('school_id'),
							'student_img' => $student_profile, 
							'student_marksheet' =>$student_marksheet,
                          'student_status' => $this->input->post('student_status'),
						);
		
						$data = $this->security->xss_clean($data);
						$result = $this->student_model->edit_student($data, $id);
						
						if ($result) {
							$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
							redirect(base_url('admin/student'));
						}
					}
				} else {
					$data['user'] = $this->student_model->get_student_by_id($id);
					if($this->session->userdata('role')==='1'){
							$page='student_edit';
						}else{
						$page='student_edit_school';	
						}
						$data['view'] = 'admin/student/'.$page;
					$this->load->view('admin/layout', $data);
				}
			} else {
				redirect('admin/auth/login');
			}
		}
		
		
		

		public function del($id = 0){
			if($this->session->has_userdata('is_admin_login'))
			{
			$this->db->delete('students', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/student'));
		}
		else{
			redirect('admin/auth/login');
		}
		}

		public function viewid($id = 0){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['user'] = $this->student_model->get_student_by_id_signl($id);
			
			$data['view'] = 'admin/student/student_view_sigal';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}

		public function approved(){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['all_students'] =  $this->student_model->get_all_students_approved();
			$data['view'] = 'admin/student/approved';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		public function passout(){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['all_students'] =  $this->student_model->get_all_students_passout();
			$data['view'] = 'admin/student/pending';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		public function transfer(){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['all_students'] =  $this->student_model->get_all_students_transfer();
			$data['view'] = 'admin/student/rejected';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		
		
		public function current(){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['all_students'] =  $this->student_model->get_all_students_current();
			$data['view'] = 'admin/student/current';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		public function school(){
			if($this->session->has_userdata('is_admin_login'))
			{
				if($this->input->post('submit')){
					
					$fin_year= $this->input->post('fin_year');
					$school_id= $this->input->post('school_code');
					$status= $this->input->post('status');
					$data['all_students'] =  $this->student_model->get_all_students_school_fil($fin_year,$school_id,$status);
				}else{
					$data['all_students'] =  $this->student_model->get_all_students_school();
				}
		
			$data['view'] = 'admin/student/school';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		public function year(){
			if($this->session->has_userdata('is_admin_login'))
			{
			$data['all_students'] =  $this->student_model->get_all_students_year();
			$data['view'] = 'admin/student/year';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		
		public function action(){
			if($this->session->has_userdata('is_admin_login'))
			{
				if($this->input->post('submit')){
					$fin_year= $this->input->post('fin_year');
					$school_id= $this->input->post('school_code');
					$data['all_students'] =  $this->student_model->get_all_students_school_fil($fin_year,$school_id);
				}
		
			$data['view'] = 'admin/student/action';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}

		function report_card($id){

			$id=$this->uri->segment(4);
		  
			$data['report_card_data'] = $this->student_model->report_card_data($id);
			
			$scode = $data['report_card_data'][0]['student_code'];
			$sname = $data['report_card_data'][0]['student_name_first'];
			$pfdname=$scode.'-'.$sname;
		//$this->load->view('admin/student/report_card',$data);
			$this->load->library('pdf');
			$this->pdf->load_view('admin/student/report_card',$data);
			$this->pdf->setPaper('A4', 'landscape');
		  
		   $this->pdf->set_option('isRemoteEnabled', true);
		   $this->pdf->render();
		   $this->pdf->stream("$pfdname.pdf");
		   }
	
	


		   public function action_submit(){
			if($this->session->has_userdata('is_admin_login'))
			{
				$currentDate = new DateTime();
				$fiscalYearStartMonth = 4;
				$fiscalYearStartDay = 1; 
				$currentYear = $currentDate->format('Y');
				if ($currentDate->format('n') < $fiscalYearStartMonth || ($currentDate->format('n') == $fiscalYearStartMonth && $currentDate->format('j') < $fiscalYearStartDay)) {
					$fiscalYear = ($currentYear - 1) . '-' . $currentYear;
				} else {
					$fiscalYear = $currentYear . '-' . ($currentYear + 1);
				}
				if($this->input->post('submit')){
					$status_id=$this->input->post('status_id');
					$sid=$this->input->post('sid');
					
					if($status_id =='2'){
						for ($i = 0; $i < count($sid); $i++) {
							$stid = $sid[$i];
							
							$st_data=$this->student_model->get_student_by_id($stid);
							if (!empty($st_data)) {
								$st_data['fn_year'] = $fiscalYear;
								$st_data['student_status'] = 2;
								
								$this->student_model->insert_student_data($st_data);
								$this->student_model->update_student_status($stid, $status_id);
							}
						    }
						$this->session->set_flashdata('message', 'Students updated successfully!');
						redirect('admin/student/school');
					}else{
						
                        for ($i = 0; $i < count($sid); $i++) {
							$stid = $sid[$i];
							$this->student_model->update_student_status($stid, $status_id);
						}
						$this->session->set_flashdata('message', 'Students updated successfully!');
						redirect('admin/student/school');
					}
					
					
				}else{
					$this->session->set_flashdata('message', 'Students updated successfully!');
					redirect('admin/student/school');
				}
		
				$this->session->set_flashdata('message', 'Students updated successfully!');
				redirect('admin/student/school');
		}
		else{
			redirect('admin/auth/login');
		}
		}



		
		public function school_filter(){
			if($this->session->has_userdata('is_admin_login'))
			{
				if($this->input->post('submit')){
					
					$fin_year= $this->input->post('fin_year');
					
					$status= $this->input->post('status');
					$data['all_students'] =  $this->student_model->get_all_students_school_fil($fin_year,$status);
				}else{
					$data['all_students'] =  $this->student_model->get_all_students_school();
				}
		
			$data['view'] = 'admin/student/school';
			$this->load->view('admin/layout', $data);
		}
		else{
			redirect('admin/auth/login');
		}
		}
		public function activity_submit_data()
		{
			$data = array(); 
        $errorUploadType = $statusMsg = ''; 
        if($this->input->post('submit')){ 
             $uid=$this->input->post('uid');
            if(!empty($_FILES['activity_pic']['name']) && count(array_filter($_FILES['activity_pic']['name'])) > 0){ 
                $filesCount = count($_FILES['activity_pic']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['activity_pic']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['activity_pic']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['activity_pic']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['activity_pic']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['activity_pic']['size'][$i]; 
                    $uploadPath = 'action_img'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                    if($this->upload->do_upload('file')){ 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['file_name'] = $fileData['file_name']; 
                        $uploadData[$i]['uid'] = $uid; 
                      
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                       
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    if ($this->student_model->activity_submit_data($uploadData) == true) {
                        redirect("admin/student/viewid/$uid");
                    }else{
										echo('not insert');
										die;
                    }
                    $statusMsg = $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                    echo($statusMsg);
                    die;
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                    echo($statusMsg );
                    die;
                } 
            }else{ 
                $statusMsg = 'Please select image files to upload.'; 
                echo($statusMsg );
                die;
            } 
        } 
		}
		
		public function active_del($id = 0){
			if($this->session->has_userdata('is_admin_login'))
			{
			$this->db->delete('activity_img', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/student/'));
		}
		else{
			redirect('admin/auth/login');
		}
		}
	}


?>