<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model{

	public function get_user_detail(){

		$id = $this->session->userdata('school_id');
		$query = $this->db->get_where('ci_schools', array('school_id' => $id));
		return $result = $query->row_array();
	}

	//--------------------------------------------------------------------
	public function update_user($data){

		$id = $this->session->userdata('school_id');
		$this->db->where('school_id', $id);
		$this->db->update('ci_schools', $data);
		return true;
	}
	
	//--------------------------------------------------------------------
	public function change_pwd($data, $id){

		$this->db->where('school_id', $id);
		$this->db->update('ci_schools', $data);
		return true;
	}

}

?>