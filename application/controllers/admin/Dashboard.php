<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('admin/School_model', 'school_model');
			$this->load->model('admin/Doner_model', 'doner_model');
			$this->load->model('admin/Student_model', 'student_model');
		}

		public function index(){
			$data['view'] = 'admin/dashboard/index';
			$this->load->view('admin/layout', $data);
		}

		public function index2(){
			$data['view'] = 'admin/dashboard/index2';
			$this->load->view('admin/layout', $data);
		}
	}

?>	