<?php
	class Itemsbank_model extends CI_Model{

		public function add_itemsbank($data){
			$this->db->insert('ci_itemsbank', $data);
			return true;
		}

	public function get_all_added_subjects()
	{
		$this->db->select('ib_subject_id')->from('ci_itemsbank');
		$query = $this->db->get();			
		return $result = $query->result_array();	
	}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemsbank(){		
			$wh =array('ib_status=1');
			$SQL ='SELECT * FROM ci_itemsbank LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id';
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
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemsbank_IE($admin_id, $subjectList){		
			$wh =array('ib_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_itemsbank LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id ';		
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
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemsbank_IW($admin_id, $subjectList){		
			$wh =array('ib_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_itemsbank LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id ';		
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
///////////////////////////////////////////////////
	public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en')
					 ->from('ci_grades')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	public function get_all_subjects()
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
///////////////////////////////////////////////////Get Subjects by Grade using ajax call	
function get_ae_subjects_by_grade($grade_id,$subjectList)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
function get_subjects_by_grade($grade_id)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
///////////////////////////////////////////////////Get Contenstand by subject using ajax call	
function get_cstands_by_subject($subject_id)
		{
			$this->db->select('cs_id,cs_number,cs_statement_en,cs_statement_ur')
					 ->from('ci_content_stands')
					 ->where('cs_subject_id', $subject_id)
					 ->where('cs_status', 1);					 
			$query = $this->db->get();
			//die($query);			
			return $result = $query->result_array();			
		}
///////////////////////////////////////////////////Get Contenstand by subject using ajax call	
function get_itemcode_by_subject($subject_id)
		{
			$this->db->select('COUNT(item_id)+1 AS maxitems, subject_code, (subject_gradeid-2) AS grade')
					 ->from('ci_subjects')
					 ->join('ci_items', 'item_subject_id = subject_id', 'left')
					 ->where('subject_id', $subject_id)
					 ->where('subject_status', 1)
					 ->group_by('subject_id'); 
			$query = $this->db->get();
			//die($query);			
			return $result = $query->result_array();			
		}
///////////////////////////////////////////////////Get SubContentStand by Content Stand using ajax call
function get_subcstands_by_cstand($cs_id)
		{
			$this->db->select('subcs_id,subcs_number,subcs_topic_en,subcs_topic_ur')
					 ->from('ci_subcontent_stands')
					 ->where('subcs_cstand_id', $cs_id)
					 ->where('subcs_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
///////////////////////////////////////////////////Get SLOs by SubContentStand Using Ajax Call
function get_slos_by_subcstands($subcs_id)
		{
			$this->db->select('slo_id, slo_number, slo_statement_en, slo_statement_ur')
					 ->from('ci_slos')
					 ->where('slo_subcstand_id', $subcs_id)
					 ->where('slo_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
//////////////////////////////////////////////////
function get_item_by_slo($slo_id)
		{
			$this->db->select('item_id, item_stem_en, item_stem_ur, item_code')
					 ->from('ci_items')
					 ->where('item_slo_id', $slo_id)
					 ->where('item_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
//////////////////////////////////////////////////
		
		function change_status()
		{		
			$this->db->set('ib_status', $this->input->post('status'));
			$this->db->where('ib_id', $this->input->post('ib_id'));
			$this->db->update('ci_itemsbank');
		} 
		function change_status_approve()
		{
			$this->db->set('ib_verified', $this->input->post('status'));
			$this->db->where('ib_id', $this->input->post('ib_id'));
			$this->db->update('ci_itemsbank');
		}
		
		/*public function get_items_by_id($id){
			$query = $this->db->get_where('ci_items', array('item_id' => $id));
			//$result = $query->row_array();
			//echo '<PRE>';
			//print_r($result);
			//die();
			return $result = $query->row_array();
		}*/
		
		
		public function get_items_for_export(){			
			$this->db->select('*')
					 ->from('ci_itemsbank');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_items_csv_export(){			
			$this->db->select('*')
					 ->from('ci_itemsbank');
					 
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_item_detail_by_id($id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		public function all_items_by_subject($id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_subject_id', $id)
			         ->order_by("item_code", "asc");
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function get_itemsbank_by_id($id){
			$this->db->select('*')
					 ->from('ci_itemsbank')
					 ->join('ci_grades', 'grade_id = ib_grade_id')
					 ->join('ci_subjects', 'subject_id = ib_subject_id')
					 ->join('ci_admin', 'admin_id = ib_createdby')
					 ->where('ib_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		public function get_ae_subjects($subjectList)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_cstands()
		{	
			$this->db->select('cs_id,cs_statement_en')
					 ->from('ci_content_stands')					 
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_subcstands()
		{	
			$this->db->select('subcs_id,subcs_topic_en')
					 ->from('ci_subcontent_stands')					 
					 ->where('subcs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_slos()
		{	
			$this->db->select('slo_id,slo_statement_en')
					 ->from('ci_slos')					 
					 ->where('slo_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
?>