<?php
	class Paper_model extends CI_Model{

		public function add_paper($data){
			$this->db->insert('ci_paper', $data);
			return true;
		}
		public function get_item_by_id($item_id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		public function get_items_by_subject_id($subject_id){
			$this->db->select('i1.item_id AS item_id_b1i1,i1.item_option_layout AS item_option_layout_b1i1, i1.item_stem_en AS item_stem_en_b1i1, i1.item_stem_ur AS item_stem_ur_b1i1, i1.item_option_a_en AS item_option_a_en_b1i1, i1.item_option_a_ur AS item_option_a_ur_b1i1, i1.item_option_b_en AS item_option_b_en_b1i1, i1.item_option_b_ur AS item_option_b_ur_b1i1, i1.item_option_c_en AS item_option_c_en_b1i1, i1.item_option_c_ur AS item_option_c_ur_b1i1, i1.item_option_d_en AS item_option_d_en_b1i1, i1.item_option_d_ur AS item_option_d_ur_b1i1,i2.item_id AS item_id_b1i2,i2.item_option_layout AS item_option_layout_b1i2, i2.item_stem_en AS item_stem_en_b1i2, i2.item_stem_ur AS item_stem_ur_b1i2, i2.item_option_a_en AS item_option_a_en_b1i2, i2.item_option_a_ur AS item_option_a_ur_b1i2, i2.item_option_b_en AS item_option_b_en_b1i2, i2.item_option_b_ur AS item_option_b_ur_b1i2, i2.item_option_c_en AS item_option_c_en_b1i2, i2.item_option_c_ur AS item_option_c_ur_b1i2, i2.item_option_d_en AS item_option_d_en_b1i2, i2.item_option_d_ur AS item_option_d_ur_b1i2,i3.item_id AS item_id_b1i3,i3.item_option_layout AS item_option_layout_b1i3, i3.item_stem_en AS item_stem_en_b1i3, i3.item_stem_ur AS item_stem_ur_b1i3, i3.item_option_a_en AS item_option_a_en_b1i3, i3.item_option_a_ur AS item_option_a_ur_b1i3, i3.item_option_b_en AS item_option_b_en_b1i3, i3.item_option_b_ur AS item_option_b_ur_b1i3, i3.item_option_c_en AS item_option_c_en_b1i3, i3.item_option_c_ur AS item_option_c_ur_b1i3, i3.item_option_d_en AS item_option_d_en_b1i3, i3.item_option_d_ur AS item_option_d_ur_b1i3,i4.item_id AS item_id_b1i4,i4.item_option_layout AS item_option_layout_b1i4, i4.item_stem_en AS item_stem_en_b1i4, i4.item_stem_ur AS item_stem_ur_b1i4, i4.item_option_a_en AS item_option_a_en_b1i4, i4.item_option_a_ur AS item_option_a_ur_b1i4, i4.item_option_b_en AS item_option_b_en_b1i4, i4.item_option_b_ur AS item_option_b_ur_b1i4, i4.item_option_c_en AS item_option_c_en_b1i4, i4.item_option_c_ur AS item_option_c_ur_b1i4, i4.item_option_d_en AS item_option_d_en_b1i4, i4.item_option_d_ur AS item_option_d_ur_b1i4,ii1.item_id AS item_id_b2i1,ii1.item_option_layout AS item_option_layout_b2i1, ii1.item_stem_en AS item_stem_en_b2i1, ii1.item_stem_ur AS item_stem_ur_b2i1, ii1.item_option_a_en AS item_option_a_en_b2i1, ii1.item_option_a_ur AS item_option_a_ur_b2i1, ii1.item_option_b_en AS item_option_b_en_b2i1, ii1.item_option_b_ur AS item_option_b_ur_b2i1, ii1.item_option_c_en AS item_option_c_en_b2i1, ii1.item_option_c_ur AS item_option_c_ur_b2i1, ii1.item_option_d_en AS item_option_d_en_b2i1, ii1.item_option_d_ur AS item_option_d_ur_b2i1,ii2.item_id AS item_id_b2i2,ii2.item_option_layout AS item_option_layout_b2i2, ii2.item_stem_en AS item_stem_en_b2i2, ii2.item_stem_ur AS item_stem_ur_b2i2, ii2.item_option_a_en AS item_option_a_en_b2i2, ii2.item_option_a_ur AS item_option_a_ur_b2i2, ii2.item_option_b_en AS item_option_b_en_b2i2, ii2.item_option_b_ur AS item_option_b_ur_b2i2, ii2.item_option_c_en AS item_option_c_en_b2i2, ii2.item_option_c_ur AS item_option_c_ur_b2i2, ii2.item_option_d_en AS item_option_d_en_b2i2, ii2.item_option_d_ur AS item_option_d_ur_b2i2,ii3.item_id AS item_id_b2i3,ii3.item_option_layout AS item_option_layout_b2i3, ii3.item_stem_en AS item_stem_en_b2i3, ii3.item_stem_ur AS item_stem_ur_b2i3, ii3.item_option_a_en AS item_option_a_en_b2i3, ii3.item_option_a_ur AS item_option_a_ur_b2i3, ii3.item_option_b_en AS item_option_b_en_b2i3, ii3.item_option_b_ur AS item_option_b_ur_b2i3, ii3.item_option_c_en AS item_option_c_en_b2i3, ii3.item_option_c_ur AS item_option_c_ur_b2i3, ii3.item_option_d_en AS item_option_d_en_b2i3, ii3.item_option_d_ur AS item_option_d_ur_b2i3,ii4.item_id AS item_id_b2i4,ii4.item_option_layout AS item_option_layout_b2i4, ii4.item_stem_en AS item_stem_en_b2i4, ii4.item_stem_ur AS item_stem_ur_b2i4, ii4.item_option_a_en AS item_option_a_en_b2i4, ii4.item_option_a_ur AS item_option_a_ur_b2i4, ii4.item_option_b_en AS item_option_b_en_b2i4, ii4.item_option_b_ur AS item_option_b_ur_b2i4, ii4.item_option_c_en AS item_option_c_en_b2i4, ii4.item_option_c_ur AS item_option_c_ur_b2i4, ii4.item_option_d_en AS item_option_d_en_b2i4, ii4.item_option_d_ur AS item_option_d_ur_b2i4')
					 ->from('ci_itemsbank AS ib')
					 ->join('ci_items AS i1', 'ib.ib_b1_item1=i1.item_id', 'left')
					 ->join('ci_items AS i2', 'ib.ib_b1_item2=i2.item_id', 'left')
					 ->join('ci_items AS i3', 'ib.ib_b1_item3=i3.item_id', 'left')
					 ->join('ci_items AS i4', 'ib.ib_b1_item4=i4.item_id', 'left')
					 ->join('ci_items AS ii1', 'ib.ib_b2_item1=ii1.item_id', 'left')
					 ->join('ci_items AS ii2', 'ib.ib_b2_item2=ii2.item_id', 'left')
					 ->join('ci_items AS ii3', 'ib.ib_b2_item3=ii3.item_id', 'left')
					 ->join('ci_items AS ii4', 'ib.ib_b2_item4=ii4.item_id', 'left')
					 ->where('ib.ib_subject_id', $subject_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		/*
		SELECT i1.item_id AS item_id_b1i1,i1.item_option_layout AS item_option_layout_b1i1, i1.item_stem_en AS item_stem_en_b1i1, i1.item_stem_ur AS item_stem_ur_b1i1, i1.item_option_a_en AS item_option_a_en_b1i1, i1.item_option_a_ur AS item_option_a_ur_b1i1, i1.item_option_b_en AS item_option_b_en_b1i1, i1.item_option_b_ur AS item_option_b_ur_b1i1, i1.item_option_c_en AS item_option_c_en_b1i1, i1.item_option_c_ur AS item_option_c_ur_b1i1, i1.item_option_d_en AS item_option_d_en_b1i1, i1.item_option_d_ur AS item_option_d_ur_b1i1,
i2.item_id AS item_id_b1i2,i2.item_option_layout AS item_option_layout_b1i2, i2.item_stem_en AS item_stem_en_b1i2, i2.item_stem_ur AS item_stem_ur_b1i2, i2.item_option_a_en AS item_option_a_en_b1i2, i2.item_option_a_ur AS item_option_a_ur_b1i2, i2.item_option_b_en AS item_option_b_en_b1i2, i2.item_option_b_ur AS item_option_b_ur_b1i2, i2.item_option_c_en AS item_option_c_en_b1i2, i2.item_option_c_ur AS item_option_c_ur_b1i2, i2.item_option_d_en AS item_option_d_en_b1i2, i2.item_option_d_ur AS item_option_d_ur_b1i2,
i3.item_id AS item_id_b1i3,i3.item_option_layout AS item_option_layout_b1i3, i3.item_stem_en AS item_stem_en_b1i3, i3.item_stem_ur AS item_stem_ur_b1i3, i3.item_option_a_en AS item_option_a_en_b1i3, i3.item_option_a_ur AS item_option_a_ur_b1i3, i3.item_option_b_en AS item_option_b_en_b1i3, i3.item_option_b_ur AS item_option_b_ur_b1i3, i3.item_option_c_en AS item_option_c_en_b1i3, i3.item_option_c_ur AS item_option_c_ur_b1i3, i3.item_option_d_en AS item_option_d_en_b1i3, i3.item_option_d_ur AS item_option_d_ur_b1i3,
i4.item_id AS item_id_b1i4,i4.item_option_layout AS item_option_layout_b1i4, i4.item_stem_en AS item_stem_en_b1i4, i4.item_stem_ur AS item_stem_ur_b1i4, i4.item_option_a_en AS item_option_a_en_b1i4, i4.item_option_a_ur AS item_option_a_ur_b1i4, i4.item_option_b_en AS item_option_b_en_b1i4, i4.item_option_b_ur AS item_option_b_ur_b1i4, i4.item_option_c_en AS item_option_c_en_b1i4, i4.item_option_c_ur AS item_option_c_ur_b1i4, i4.item_option_d_en AS item_option_d_en_b1i4, i4.item_option_d_ur AS item_option_d_ur_b1i4
FROM ci_itemsbank AS ib
LEFT JOIN ci_items AS i1 ON ib.ib_b1_item1=i1.item_id
LEFT JOIN ci_items AS i2 ON ib.ib_b1_item2=i2.item_id
LEFT JOIN ci_items AS i3 ON ib.ib_b1_item3=i3.item_id
LEFT JOIN ci_items AS i4 ON ib.ib_b1_item4=i4.item_id
WHERE ib.ib_subject_id = 30
*/

	public function get_all_added_subjects()
	{
		$this->db->select('paper_subject_id')->from('ci_final_papers');
		$query = $this->db->get();			
		return $result = $query->result_array();	
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_paper(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_paper LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id';
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}			
			/*
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			*/
		}
		//---------------------------------------------------
		
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

function get_subjects_by_grade($grade_id)
		{
			$this->db->select('subject_id,subject_name_en,subject_name_ur')
					 ->from('ci_subjects')
					 ->join('ci_itemsbank', 'ib_subject_id = subject_id', 'inner')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}

///////////////////////////////////////////////////Get Contenstand by subject using ajax call	
function get_itemcode_by_subject($subject_id)
		{
			$this->db->select('COUNT(paper_id)+1 AS maxitems, subject_code, (subject_gradeid-2) AS grade')
					 ->from('ci_subjects')
					 ->join('ci_final_papers', 'paper_subject_id = subject_id', 'left')
					 ->where('subject_id', $subject_id)
					 ->where('subject_status', 1)
					 ->group_by('subject_id'); 
			$query = $this->db->get();
			//die($query);			
			return $result = $query->result_array();			
		}

///////////////////////////////////////////////////Get Contenstand by subject using ajax call	
function get_itemsbank_for_subject($subject_id)
		{
	//SELECT * FROM ci_itemsbank LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id
			$this->db->select('*')
					 ->from('ci_itemsbank')
					 ->where('ib_subject_id', $subject_id)
					 ->where('ib_verified', 1);
					 
			$query = $this->db->get();
			//die($query);			
			return $result = $query->result_array();
		}

//////////////////////////////////////////////////
		
		function change_status()
		{		
			$this->db->set('item_status', $this->input->post('status'));
			$this->db->where('item_id', $this->input->post('item_id'));
			$this->db->update('ci_items');
		} 
		
		/*public function get_items_by_id($id){
			$query = $this->db->get_where('ci_items', array('item_id' => $id));
			//$result = $query->row_array();
			//echo '<PRE>';
			//print_r($result);
			//die();
			return $result = $query->row_array();
		}*/
		
		public function edit_items($data, $id){
			$this->db->where('item_id', $id);
			$this->db->update('ci_items', $data);
			return true;
		}
		
		public function get_items_for_export(){			
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_gradeid')
					 ->join('ci_admin', 'admin_id= item_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		
		public function get_paper_by_id($id){
			$this->db->select('*')
					 ->from('ci_paper')
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