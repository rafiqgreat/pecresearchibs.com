<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model{

	public function get_user_detail(){

		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
		return $result = $query->row_array();
	}

	//--------------------------------------------------------------------
	public function update_user($data){

		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd($data, $id){

		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd_school($data, $username){
		$this->db->where('username', $username);
		$this->db->update('ci_schools', $data);
		//die($this->db->last_query());
		return true;
	}
	//--------------------------------------------------------------------
	public function get_itemswriter_by_id($id){
			$this->db->select('*')
				 ->from('ci_admin')
				 ->join('ci_itemwriter', 'ci_iw_adminid = admin_id', 'left')
				 ->where('admin_id ', $id);
			$query = $this->db->get();
			return $result = $query->result_array();			
			//echo '<PRE>';
			//print_r($result);
			//die();
		}
	//--------------------------------------------------------------------
	public function get_iw_by_id($id){
			$this->db->select('*')
				 ->from('ci_itemwriter')
				 ->where('ci_iw_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();			
			//echo '<PRE>';
			//print_r($result);
			//die();
		}
	//--------------------------------------------------------------------
	public function get_all_tehsils()
		{	
			$this->db->select('tehsil_id, tehsil_name_en')
					 ->from('ci_tehsil')					 
					 ->where('tehsil_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	//--------------------------------------------------------------------
	public function get_all_districts()
		{	
			$this->db->select('district_id, district_name_en')
					 ->from('ci_districts')					 
					 ->where('district_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	//--------------------------------------------------------------------
	public function edit_iw_tbladmin($ci_ir_adminid, $data_admin){
			$this->db->where('admin_id', $ci_ir_adminid);
			$this->db->update('ci_admin', $data_admin);
			return true;
		}
	//--------------------------------------------------------------------
	public function itemwriters_edit($data, $id){
			$this->db->where('ci_iw_id', $id);
			$this->db->update('ci_itemwriter', $data);
			return true;
		}
}

?>