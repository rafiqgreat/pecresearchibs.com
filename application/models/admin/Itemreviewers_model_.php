<?php
	class Itemreviewers_model extends CI_Model{
		//---------------------------------------------------
		public function get_all_itemreviewers(){
			$wh =array();
			$SQL = "SELECT ci_itemreviewer.*,ci_admin.admin_id AS loginid FROM ci_itemreviewer LEFT JOIN `ci_admin` ON ci_admin.username = ci_itemreviewer.ci_ir_username";
			//$SQL ='SELECT * FROM ci_itemreviewer';			
			//$wh[] = " deleted != 1";
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}
		//-----------------------------------------------------
		public function change_status(){		
			$this->db->set('ci_ir_status', $this->input->post('status'));
			$this->db->where('ci_ir_id', $this->input->post('ci_ir_id'));
			$this->db->update('ci_itemreviewers');
		}
		//-----------------------------------------------------
		
		
		public function get_all_ss_ir($loggedid,$subjectList)
		{			
			$wh =array();
			$SQL = "SELECT ci_itemreviewers.*,ci_admin.admin_id AS loginid, ci_subjects.subject_id, ci_subjects.subject_name_en, ci_admin.is_active AS irstatus  FROM ci_itemreviewers LEFT JOIN `ci_admin` ON ci_admin.username = ci_itemreviewers.ci_ir_username LEFT JOIN ci_subjects ON subject_name_en LIKE ci_ir_subject";
			//$SQL ='SELECT * FROM ci_itemreviewers';			
			$wh[] = "ci_subjects.subject_id IN (".$subjectList.")";
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE," group by ci_itemreviewers.ci_ir_id");
				//die($this->db->last_query());
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//die($this->db->last_query());
			}
		} 
		//-----------------------------------------------------
		public function username_exist( $username ) {
			$this->db->select( '*' );
			$this->db->from( 'ci_itemreviewers' );
			$this->db->where( 'ci_ir_username', $username );
			$query = $this->db->get();
			$result = $query->result_array();	
			return $result;
		}
		//-----------------------------------------------------
		public function email_exist( $email ) {
			$this->db->select( '*' );
			$this->db->from( 'ci_itemreviewers' );
			$this->db->where( 'ci_ir_email', $email );
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		//-----------------------------------------------------
		public function get_itemswriter_by_id($id){
			$this->db->select('*')
				 ->from('ci_itemreviewers')
				 ->where('ci_ir_id ', $id);
			$query = $this->db->get();
			return $result = $query->result();			
		}
		//-----------------------------------------------------
		function get_ae_subjects($admin_id)
		{
			$this->db->select('*')
					 ->from('ci_admin')
					 ->where('admin_id', $admin_id);
			$query = $this->db->get();			
			$result = $query->result_array();
			$result = $result[0];
			
			//SELECT * FROM `ci_subjects` WHERE subject_id IN (34,42,50,7,11,15,24,30,36,46,54)
			$SQL ='SELECT * FROM `ci_subjects` WHERE subject_id IN ('.$result['subjects_ids'].' )';
			//echo $SQL;
			$query = $this->db->query($SQL);
    		$result = $query->result_array();
			//echo '<PRE>';
			//print_r($result);
			//die();
			return $result = $query->result_array();
		}
		//-----------------------------------------------------
		public function add_itemreviewers($data){
			$this->db->insert('ci_itemreviewers', $data);
			return true;
		}
		//-----------------------------------------------------
		public function add_itemreviewers_approve($data){
			$this->db->insert('ci_admin', $data);
			return true;
		}	
		//-----------------------------------------------------
		public function add_approved_itemreviewers($data){
			$this->db->insert('ci_itemreviewers', $data);
			return true;
		}			
		//-----------------------------------------------------
		public function get_itemreviewers_by_id($id){
			$query = $this->db->get_where('ci_itemreviewers', array('ci_ir_id' => $id));
			return $result = $query->row_array();
		}
		//-----------------------------------------------------
		public function get_revadmininfo_by_id($id){
			$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
			return $result = $query->row_array();
		}
		//-----------------------------------------------------
		public function itemreviewers_edit($data, $id){
			$this->db->where('ci_ir_id', $id);
			$this->db->update('ci_itemreviewers', $data);
			return true;
		}
		//---------------------------------------------------
		public function add_itemreviewers_adminid($id, $data_adminid){
			$this->db->where('ci_ir_id', $id);
			$this->db->update('ci_itemreviewers', $data_adminid);
			return true;
		}
		//---------------------------------------------------
		public function edit_iw_tbladmin($ci_ir_adminid, $data_admin){
			$this->db->where('admin_id', $ci_ir_adminid);
			$this->db->update('ci_admin', $data_admin);
			return true;
		}
		//---------------------------------------------------
		public function get_all_subjects_with_grades(){
			$this->db->select('*')
					->from('ci_subjects')
					->join('ci_grades', 'grade_id= subject_gradeid')
					->where('subject_status', '1')
					->order_by("subject_name_en", "asc")
					->order_by("grade_id", "asc");					
			$query = $this->db->get();
			return $result = $query->result_array();
		}	
		//-----------------------------------------------------
		public function get_all_aeusers(){
			$this->db->select('*')
					->from('ci_admin')
					->where('deleted !=', '1')
					->where('admin_role_id', '2')
					->where('is_active', '1');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_all_ss(){
			$this->db->select('*')
					->from('ci_admin')
					->where('deleted !=', '1')
					->where('admin_role_id', '2')
					->where('is_active', '1');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_all_roles(){				
		$res= [];
		$query = $this->db->get('ci_admin_roles');
		foreach ($query->result() as $row)
		{
			$res[] = $row;
		}
			return $res;
		}
		//---------------------------------------------------
		public function get_all_districts()
		{	
			$this->db->select('district_id, district_name_en')
					 ->from('ci_districts')					 
					 ->where('district_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		function get_tehsil_by_district($district_id)
		{
			$this->db->select('tehsil_id, tehsil_name_en, tehsil_name_ur')
					 ->from('ci_tehsil')
					 ->where('tehsil_district_id', $district_id)
					 ->where('tehsil_status', 1);					 
			$query = $this->db->get();			
			return $query->result_array();
		}
		//-----------------------------------------------------
		public function get_all_tehsils()
		{	
			$this->db->select('tehsil_id, tehsil_name_en')
					 ->from('ci_tehsil')					 
					 ->where('tehsil_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//-----------------------------------------------------
		public function get_users_for_export(){			
			$this->db->select('admin_id, username, firstname, lastname, email, mobile_no, created_at');
			$this->db->from('ci_admin');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_ir_for_export_pdf(){			
			$this->db->select('admin_id, username, firstname, lastname, ci_ir_cnic, ci_ir_mobile, ci_ir_email, ci_ir_subject, ci_ir_designation, ci_ir_posting, ci_ir_deptttype, ci_ir_publictype, is_login, is_active')
					 ->from('ci_admin')
					 ->join('ci_itemreviewers', 'ci_ir_adminid= admin_id')
					 ->where('parent_admin_id', $this->session->userdata('admin_id'))
					 ->where('admin_role_id', '6');
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
			//echo '<pre>';
			//print_r($result);
			//die();
		}
	}
?>