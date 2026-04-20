<?php
	class School_model extends CI_Model{

		
       
            public function add_school($data){
                $this->db->insert('schools', $data);
                return true;
            }
    
           
        
    

		public function get_all_schools(){
			$query = $this->db->query("SELECT *,(SELECT district_title FROM `district` where districtid=school_dist) as dist_name,(SELECT state_title FROM `state` where state_id=school_state) as state_name,(SELECT doner_name FROM `doners` where id=doner_id) as doner_name  FROM `schools`;");
			return $result = $query->result_array();
		}

		public function get_school_by_id($id){
			$query = $this->db->get_where('schools', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_school($data, $id){
			$this->db->where('id', $id);
			$this->db->update('schools', $data);
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
    public function get_doner_by_sigl_id($id){
       
        $query =$this->db->query("SELECT *,(SELECT district_title FROM `district` where districtid=school_dist) as dist_name,(SELECT state_title FROM `state` where state_id=school_state) as state_name,(SELECT doner_name FROM `doners` where id=schools.doner_id) as doner_name   FROM `schools` where id=$id;");
       return $result = $query->row_array();
   }
   public function hostel_count(){
       
    $query =$this->db->query("SELECT COUNT(id) as hostel_cnt FROM `schools` WHERE school_status=1;");
   return $result = $query->row_array();
}


	}

?>