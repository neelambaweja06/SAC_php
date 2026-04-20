<?php
	class Doner_model extends CI_Model{

		public function add_doner($data){
			$this->db->insert('doners', $data);
			return true;
		}

		public function get_all_doners(){
			$query = $this->db->query("SELECT *,(SELECT district_title FROM `district` where districtid=doner_dist) as dist_name,(SELECT state_title FROM `state` where state_id=doner_state) as state_name  FROM `doners`;");
			return $result = $query->result_array();
		}

		public function get_doner_by_id($id){
			$query = $this->db->get_where('doners', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_doner($data, $id){
			$this->db->where('id', $id);
			$this->db->update('doners', $data);
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
    
   
    
    public function get_doner_by_sigl_id($id){
       
         $query =$this->db->query("SELECT *,(SELECT district_title FROM `district` where districtid=doner_dist) as dist_name,(SELECT state_title FROM `state` where state_id=doner_state) as state_name  FROM `doners` where id=$id;");
        return $result = $query->row_array();
    }
    public function trust_count(){
       
        $query =$this->db->query("SELECT COUNT(id)as trust_cnt FROM `doners` WHERE doner_status=1");
       return $result = $query->row_array();
   }

    
	}

?>