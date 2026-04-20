<?php
	class Auth_model extends CI_Model{

		public function login($data){
    $email = $data['email'];
    $password = $data['password'];

    // ✅ Step 1: simple query (no subquery)
    $query = $this->db->get_where('login_details', ['email' => $email]);

    if (!$query) {
        die($this->db->error()['message']); // shows real DB error
    }

    if ($query->num_rows() == 0){
        return false;
    }

    $result = $query->row_array();

    // ✅ Step 2: password check (fix mismatch)
    if ($result['password'] == $password) {

        // ✅ Step 3: get role separately (SAFE)
        $role = $this->db->get_where('role', ['id' => $result['is_admin']])->row_array();
        $result['role_name'] = $role ? $role['role_name'] : '';

        return $result;
    }

    return false;
}

		public function change_pwd($data, $id){
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			return true;
		}

	}

?>