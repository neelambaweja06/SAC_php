<?php
	class Student_model extends CI_Model{

		public function add_student($data){
			$this->db->insert('students', $data);
			return true;
		}

		public function get_all_students(){
            $query2 = "SELECT year FROM `fin_year` WHERE fin_st=1";
        $query2_result = $this->db->query($query2)->row(); 
        if ($query2_result) {
            $fny = $query2_result->year;
            if($this->session->userdata('role')==='1'){
			$query = $this->db->query("SELECT *,(SELECT state_title FROM `state` where state_id=student_state) as state_name,(SELECT school_name FROM `schools` where id=school_id) as school_name  FROM `students` where fn_year = '$fny';");
            }else{
                $scid=$this->session->userdata('admin_id');
                $query = $this->db->query("SELECT *,(SELECT state_title FROM `state` where state_id=student_state) as state_name,(SELECT school_name FROM `schools` where id=school_id) as school_name  FROM `students` WHERE school_id=$scid and fn_year = '$fny';");
            }}
			return $result = $query->result_array();
		}

		public function get_student_by_id($id){
			$query = $this->db->get_where('students', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_student($data, $id){
			$this->db->where('id', $id);
			$this->db->update('students', $data);
			return true;
		}


		public function state_fetch()
    {
        
        $role_data = $this->db->query("SELECT * FROM `state`");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }
	
	public function distic_fetch()
    {
        
        $role_data = $this->db->query("SELECT * FROM `district`");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }

    public function status_fetch()
    {
        
        $role_data = $this->db->query("SELECT * FROM `student_status`");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }
    
	public function city_fetch()
    {
        
        $role_data = $this->db->query("SELECT * FROM `city`");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }
	
	public function doner_fetch()
    {
        
        $role_data = $this->db->query("SELECT * FROM `doners` where doner_status=1");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }

	public function school_fetch()
    {
        
        $role_data = $this->db->query("SELECT * FROM `schools` where school_status=1");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }
    
    public function year_fetch()
    {
        
        $role_data = $this->db->query("SELECT * FROM `fin_year` ");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }
public function year_fetch_current()
    {
        
        $role_data = $this->db->query("SELECT * FROM `fin_year` where fin_st=1 ");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }
	public function get_all_students_approved(){
		$query = $this->db->query("SELECT *,(SELECT state_title FROM `state` where state_id=student_state) as state_name,(SELECT school_name FROM `schools` where school_code=SUBSTRING(student_code, 1, 3) LIMIT 1) as school_name  FROM `students`;");
		return $result = $query->result_array();
	}
    public function get_state_code($state) {
        $query = $this->db->query("SELECT short_code FROM state WHERE state_id=$state");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->short_code;
        } else {
            return null;
        }
    }
    

    public function get_school_code($school) {
        
        $query = $this->db->query("SELECT school_code FROM schools WHERE id=$school");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->school_code;
        } else {
            return null;
        }
    }
    public function get_last_id($school) {
        
        $query = $this->db->query("SELECT  REGEXP_REPLACE(student_code, '[^0-9]', '')as last_no FROM `students` WHERE school_id=$school ORDER BY `students`.`student_code` DESC limit 1");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->last_no;
        } else {
            return null;
        }
    }
     
    public function get_student_by_id_signl($id){
        $query = $this->db->query("SELECT *,(SELECT state_title FROM `state` where state_id=student_state) as state_name,(SELECT school_name FROM `schools` where id=school_id) as school_name  FROM `students` where id=$id;");
        return $result = $query->row_array();
    }
    
	public function get_all_students_school(){
        if($this->session->userdata('role')==='1'){
		$query = $this->db->query("SELECT s.*, 
       st.state_title AS state_name, 
       sc.school_name AS school_name
FROM `students` s
LEFT JOIN `state` st ON st.state_id = s.student_state
LEFT JOIN `schools` sc ON sc.school_code = SUBSTRING(s.student_code, 1, 3);
 ");
        }else{
           
            $scid=$this->session->userdata('admin_id'); 
            $query = $this->db->query("SELECT *,(SELECT state_title FROM `state` where state_id=student_state) as state_name,(SELECT school_name FROM `schools` where school_code=SUBSTRING(student_code, 1, 3)LIMIT 1) as school_name  FROM `students` WHERE school_id=$scid; ");
           
        }
        return $result = $query->result_array();
	}
    public function get_all_students_current(){
        $query2 = "SELECT year FROM `fin_year` WHERE fin_st=1";
        $query2_result = $this->db->query($query2)->row(); 
        if ($query2_result) {
            $fny = $query2_result->year;
            $query = "SELECT *, 
                        
                        (SELECT state_title FROM `state` WHERE state_id=student_state) AS state_name,
                        (SELECT school_name FROM `schools` WHERE school_code=SUBSTRING(student_code, 1, 3)LIMIT 1) AS school_name 
                      FROM `students`
                      WHERE fn_year = '$fny' and student_status in(1,2)";
    
            $result = $this->db->query($query)->result_array();
            return $result;
        } else {
            return [];
        }
    }
    
    public function get_all_students_passout(){
		$query = $this->db->query("SELECT *,(SELECT state_title FROM `state` where state_id=student_state) as state_name,(SELECT school_name FROM `schools` where school_code=SUBSTRING(student_code, 1, 3)LIMIT 1) as school_name  FROM `students`;");
		return $result = $query->result_array();
	}
    public function get_all_students_transfer(){
		$query = $this->db->query("SELECT *,(SELECT state_title FROM `state` where state_id=student_state) as state_name,(SELECT school_name FROM `schools` where school_code=SUBSTRING(student_code, 1, 3)LIMIT 1) as school_name  FROM `students`;");
		return $result = $query->result_array();
	}

    public function get_all_students_year(){
		$query = $this->db->query("SELECT *,(SELECT state_title FROM `state` where state_id=student_state) as state_name,(SELECT school_name FROM `schools` where school_code=SUBSTRING(student_code, 1, 3)LIMIT 1) as school_name  FROM `students`;");
		return $result = $query->result_array();
	}
    public function get_all_students_school_fil($fin_year = null, $school_id = null,$status = null) {
        if($this->session->userdata('role')==='1'){
        $this->db->select("*,  (SELECT state_title FROM `state` WHERE state_id=student_state) as state_name, (SELECT school_name FROM `schools` WHERE school_code=SUBSTRING(student_code, 1, 3)LIMIT 1) as school_name");
        $this->db->from('students');
        if ($fin_year) {
            $this->db->where('fn_year', $fin_year);
        }
        if ($school_id) {
            $this->db->where('school_id', $school_id);
        }
        if ($status) {
            $this->db->where('student_status', $status);
        }
    }else{
         $scid=$this->session->userdata('admin_id');
        $this->db->select("*,  (SELECT state_title FROM `state` WHERE state_id=student_state) as state_name, (SELECT school_name FROM `schools` WHERE school_code=SUBSTRING(student_code, 1, 3)LIMIT 1) as school_name");
        $this->db->from('students');
        $this->db->where('school_id', $scid);
        if ($fin_year) {
            $this->db->where('fn_year', $fin_year);
            
        }
        if ($status) {
            $this->db->where('student_status', $status);
        } 
    }
        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result_array() : [];
    }
    
    
    public function report_card_data($id){
		$query = $this->db->query("SELECT 
    s.*, 
    st.state_title AS student_state_name,
    ct.class_name as class_name,
    sch.*
FROM 
    `students` s
JOIN 
    `state` st ON s.student_state = st.state_id  
JOIN 
    `schools` sch ON SUBSTRING(s.student_code, 1, 3) = sch.school_code  
    JOIN
`class_dtl` as ct on s.student_class=ct.id
WHERE 
    s.id =$id;");
		return $result = $query->result_array();
	}
    public function student_count(){
		$query = $this->db->query("SELECT COUNT(id) as student_cnt FROM `students`  WHERE student_status=1;");
		return $result = $query->result_array();
	}
    public function student_state_count(){
		$query = $this->db->query(" SELECT COUNT(DISTINCT `student_state`) AS state_count FROM `students`;");
		return $result = $query->result_array();
	}
   
    public function student_last_year_count(){
        $currentDate = new DateTime();
$fiscalYearStartMonth = 4; 
$fiscalYearStartDay = 1;   
$currentYear = $currentDate->format('Y');
if ($currentDate->format('n') < $fiscalYearStartMonth || ($currentDate->format('n') == $fiscalYearStartMonth && $currentDate->format('j') < $fiscalYearStartDay)) {
    $lastFiscalYear = ($currentYear - 2) . '-' . ($currentYear - 1);
} else {
    $lastFiscalYear = ($currentYear - 1) . '-' . $currentYear;
}
		$query = $this->db->query(" SELECT COUNT(`id`) AS student_last_year_count FROM `students` where fn_year='$lastFiscalYear' ");
		return $result = $query->result_array();
	}
   
    public function student_current_year_count(){
        $currentDate = new DateTime();
$fiscalYearStartMonth = 4;
$fiscalYearStartDay = 1; 
$currentYear = $currentDate->format('Y');
if ($currentDate->format('n') < $fiscalYearStartMonth || ($currentDate->format('n') == $fiscalYearStartMonth && $currentDate->format('j') < $fiscalYearStartDay)) {
    $fiscalYear = ($currentYear - 1) . '-' . $currentYear;
} else {
    $fiscalYear = $currentYear . '-' . ($currentYear + 1);
}
		$query = $this->db->query(" SELECT COUNT(`id`) AS student_current_year_count FROM `students`where  fn_year='$fiscalYear';");
		return $result = $query->result_array();
	}
    public function insert_student_data($data) {
        unset($data['id']);
        $this->db->insert('students', $data); 
    }
    public function update_student_status($student_id, $status_id) {
        $this->db->where('id', $student_id);
        $this->db->update('students', array('student_status' => $status_id)); 
       
    }

    
    public function class_fetch()
    {
        
        $role_data = $this->db->query("SELECT * FROM `class_dtl` ");

        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
			
        } else {
            return false;
        }
    }

    public function activity_submit_data($data = array()){ 
     
        $insert = $this->db->insert_batch('activity_img',$data); 
        return $insert?true:false; 
    }
    
    
    
    public function get_active_by_id_signl($id) {
        $this->db->where('uid', $id);
        $query = $this->db->get('activity_img');
        return $query->result(); // Returns a single row as an object
    }

      
      
    
	}

?>