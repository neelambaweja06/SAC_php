<?php
	class Proposal_model extends CI_Model{
		
		
		public function proposal_data_submit($data,$dep,$exp_type,$ac_fee,$qu_fee){
			$data = [
                'lead_id' => $data['lead_id'],
				'proposal_type' => $data['proposal_type'],
                'area' => $data['area'],
				'proposal_service'=>$data['proposal_service'],
				'proposal_for'=>$data['proposal_for'],
				'department'=>$dep,
				'exp_type'=>$exp_type,
				'ac_fee'=>$ac_fee,
				'qu_fee'=>$qu_fee,
				

				
		];
				if ($this->db->insert('crm_proposals', $data)) {
					$data_log =[
						'lead_status' => '2',	
						];
						$this->db->where('prospect_id', $data['lead_id']);
						$this->db->update('lead', $data_log);
					return $data;
				
				} else {
					return false;
				}
			}

	  public function proposal_view()
		{
		// $result = $this->db->queryt("SELECT a.*,b.`id`,c.prospect_id,c.`prospect_name`, c.`prospect_contact_number`, c.`prospect_email`, (SELECT pro_name FROM `crm_proposal_type` WHERE id=a.proposal_for) as pro_for,(SELECT area_name FROM `crm_area` WHERE id=a.area)as ar_nm FROM `crm_proposals` a ,lead_dtl b,prospects c WHERE a.lead_id=b.id and b.id=c.prospect_id;");

		$result = $this->db->get("`crm_proposals`");
		if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return 0;
			}
		}


		public function proposal_delete($id)
		{
			$this->db->where('proposal_id', $id);
			return $this->db->delete('`crm_proposals`');
		}


		public function proposal_update_data($data,$dep,$exp_type,$ac_fee,$qu_fee){
			
			$newdata = [
				'lead_id' => $data['lead_id'],
				'area' => $data['area'],
				'proposal_for' => $data['proposal_for'],
				'proposal_type' => $data['proposal_type'],
				'department' => $dep,
				'exp_type' => $exp_type,
				'ac_fee' => $ac_fee,
				'qu_fee' => $qu_fee,
				
		];
		
		$this->db->where('proposal_id', $data['proposal_id']);
			if ($this->db->update('crm_proposals', $newdata)) {
			
				return $newdata;
			} else {
				return false;
			}
		}


		public function proposal_edit($id)
		{
			
		$result = $this->db->query("SELECT * FROM `crm_proposals` where proposal_id=$id");
		if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return 0;
			}
		}

		
		public function lead_name_fetch()
		{
			
			$lead_name_data = $this->db->query("SELECT * FROM `lead_dtl`");
	
			$fetch = $lead_name_data->num_rows();
			if ($fetch > 0) {
				return $fetch = $lead_name_data->result_array();
				
			} else {
				return false;
			}
		}
		public function type_of_propsal_fetch()
		{
			
			$lead_name_data = $this->db->query("SELECT * FROM `type_of_propsal`");
	
			$fetch = $lead_name_data->num_rows();
			if ($fetch > 0) {
				return $fetch = $lead_name_data->result_array();
				
			} else {
				return false;
			}
		}
        public function area_fetch()
		{
			
			$area_data = $this->db->query("SELECT * FROM `crm_area`");
	
			$fetch = $area_data->num_rows();
			if ($fetch > 0) {
				return $fetch = $area_data->result_array();
				
			} else {
				return false;
			}
		}

        public function pro_name_fetch()
		{
			
			$pro_name_data = $this->db->query("SELECT * FROM `crm_proposal_type`");
	
			$fetch = $pro_name_data->num_rows();
			if ($fetch > 0) {
				return $fetch = $pro_name_data->result_array();
				
			} else {
				return false;
			}
		}
		
		public function dep_name_fetch()
		{
			
			$pro_name_data = $this->db->query("SELECT * FROM `department`");
	
			$fetch = $pro_name_data->num_rows();
			if ($fetch > 0) {
				return $fetch = $pro_name_data->result_array();
				
			} else {
				return false;
			}
		}
		public function lead_view()
		{
		$result = $this->db->query("SELECT *,(SELECT source_name FROM `lead_source` where id=lead_source)as lead_source_nm,(SELECT username FROM `users` where id=assign_to_lead) as assign_to_lead_name,(SELECT username FROM `users` where id=created_by_maeketing) as created_by_maeketing_name,(SELECT name FROM `status` WHERE id=lead_status) as lead_status_name FROM `lead` where lead_status=2;");
		if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return 0;
			}
		}


		public function quotation_view()
		{
		$result = $this->db->query("SELECT *,(SELECT source_name FROM `lead_source` where id=lead_source)as lead_source_nm,(SELECT username FROM `users` where id=assign_to_lead) as assign_to_lead_name,(SELECT username FROM `users` where id=created_by_maeketing) as created_by_maeketing_name,(SELECT name FROM `status` WHERE id=lead_status) as lead_status_name FROM `lead` where lead_status=4;");
		if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return 0;
			}
		}


		public function quotation_view_final()
		{
		$result = $this->db->query("SELECT *,(SELECT source_name FROM `lead_source` where id=lead_source)as lead_source_nm,(SELECT username FROM `users` where id=assign_to_lead) as assign_to_lead_name,(SELECT username FROM `users` where id=created_by_maeketing) as created_by_maeketing_name,(SELECT name FROM `status` WHERE id=lead_status) as lead_status_name FROM `lead` where lead_status=5;");
		if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return 0;
			}
		}


		public function sign_quotion()
		{
		$result = $this->db->query("SELECT *,(SELECT source_name FROM `lead_source` where id=lead_source)as lead_source_nm,(SELECT username FROM `users` where id=assign_to_lead) as assign_to_lead_name,(SELECT username FROM `users` where id=created_by_maeketing) as created_by_maeketing_name,(SELECT name FROM `status` WHERE id=lead_status) as lead_status_name FROM `lead` where lead_status=7;");
		if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return 0;
			}
		}
	}

?>