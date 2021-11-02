<?php
	class Paper_model extends CI_Model{
		public function add_paper($data){
			$this->db->insert('ci_final_papers', $data);
			return $this->db->insert_id();
		}
		public function get_paper_by_id($id){
			$this->db->select('*')
					 ->from('ci_final_papers')
					 //->order_by('paper_id', 'desc')
					 ->join('ci_grades', 'grade_id = paper_grade_id')
					 ->join('ci_subjects', 'subject_id = paper_subject_id')
					 ->join('ci_schools', 'school_id = paper_school_id')
					 ->where('paper_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}	
		function get_itemsbank_by_id($subject_id)
		{	
			$this->db->select('*')
					 ->from('ci_itemsbank')
					 ->where('ib_subject_id', $subject_id)
					 ->where('ib_verified', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
		public function get_item_detail_by_id($id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_id', $id);
			$query = $this->db->get();
			return $result = $query->result();			
		}
		function get_itemsbank_for_subject($subject_id)
		{
			$this->db->select('*')
					 ->from('ci_itemsbank')
					 ->where('ib_subject_id', $subject_id)
					 ->where('ib_verified', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}

		public function edit_paper($data, $id){
			$this->db->where('paper_id', $id);
			$this->db->update('ci_final_papers', $data);
			return true;
		}
		public function get_item_by_id($item_id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		public function get_header_by_id($id){
			$this->db->select('*')
					 ->from('ci_paperinstructions')
					 ->where('pi_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		public function get_tehsil_by_id($id){
			$this->db->select('*')
					 ->from('ci_tehsil')
					 ->where('tehsil_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		public function get_district_by_id($id){
			$this->db->select('*')
					 ->from('ci_districts')
					 ->where('district_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		public function get_paras_by_subject_id($id,$startfrom){
			$this->db->select('*')
					 ->from('ci_items_paragraphs')
					 ->where('para_subject_id', $id)
					->where('para_start_from', $startfrom);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		////////////////////////////////////
				

	public function get_all_added_subjects()
	{
		$this->db->select('paper_subject_id')->from('ci_final_papers');
		$query = $this->db->get();			
		return $result = $query->result_array();	
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_paper($school_id){		
			$wh =array();
			$SQL ='SELECT * FROM ci_final_papers LEFT JOIN ci_grades ON ( paper_grade_id = grade_id) LEFT JOIN ci_subjects ON ( paper_subject_id = subject_id)';
			//echo $SQL;
			//die();
			//die($this->db->last_query());
			
			$wh[] ="paper_school_id = ".$school_id;
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
		
///////////////////////////////////////////////////
	public function get_all_grades_have_itembanks()
		{	
			$sql="SELECT grade_id,grade_code,grade_name_en FROM ci_grades, ci_itemsbank WHERE grade_id = ib_grade_id AND grade_status = 1 AND ib_status = 1 AND ib_verified = 1 GROUP BY grade_id ORDER BY grade_id ASC";    
			$query = $this->db->query($sql);
			return $query->result_array();		
		}
public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en')
					 ->from('ci_grades')		
					 ->join('ci_itemsbank', 'ib_grade_id = grade_id', 'inner')
					 ->where('grade_status', 1)
					 ->where('ib_status', 1)
				 	->where('ib_verified', 1);
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
					 ->where('subject_status', 1)
					 ->where('ib_verified', 1);
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


/////////////////////////////////////////////////////////////////////////////////////////////////
		
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		public function get_paper_for_export()
		{			
			$this->db->select('*')
					 ->from('ci_final_papers')
					 ->join('ci_grades', 'grade_id = paper_grade_id')
					 ->join('ci_subjects', 'subject_id = paper_subject_id')
					 ->join('ci_schools', 'school_id = paper_school_id')
					 ->where('paper_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();
		}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
			
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
		public function get_paras16_by_subject($id){
			$this->db->select('ci_items_paragraphs.*, i21.item_id AS i21id, i21.item_stem_en AS i21stem_en, i21.item_stem_ur AS i21stem_ur, i21.item_image_en AS i21image_en, i21.item_image_ur AS i21image_ur, i21.item_image_position AS i21image_position, i21.item_option_layout AS i21option_layout, i21.item_option_a_en AS i21option_a_en, i21.item_option_a_ur AS i21option_a_ur, i21.item_option_a_image AS i21option_a_image, i21.item_option_b_en AS i21option_b_en, i21.item_option_b_ur AS i21option_b_ur, i21.item_option_b_image AS i21option_b_image, i21.item_option_c_en AS i21option_c_en, i21.item_option_c_ur AS i21option_c_ur, i21.item_option_c_image AS i21option_c_image, i21.item_option_d_en AS i21option_d_en, i21.item_option_d_ur AS i21option_d_ur, i21.item_option_d_image AS i21option_d_image, i21.item_option_correct AS i21option_correct, i21.item_sort AS i21sort, i22.item_id AS i22id,i22.item_stem_en AS i22stem_en, i22.item_stem_ur AS i22stem_ur, i22.item_image_en AS i22image_en, i22.item_image_ur AS i22image_ur, i22.item_image_position AS i22image_position,  i22.item_option_layout AS i22option_layout, i22.item_option_a_en AS i22option_a_en, i22.item_option_a_ur AS i22option_a_ur, i22.item_option_a_image AS i22option_a_image, i22.item_option_b_en AS i22option_b_en, i22.item_option_b_ur AS i22option_b_ur, i22.item_option_b_image AS i22option_b_image, i22.item_option_c_en AS i22option_c_en, i22.item_option_c_ur AS i22option_c_ur, i22.item_option_c_image AS i22option_c_image, i22.item_option_d_en AS i22option_d_en, i22.item_option_d_ur AS i22option_d_ur, i22.item_option_d_image AS i22option_d_image, i22.item_option_correct AS i22option_correct, i22.item_sort AS i22sort, i23.item_id AS i23id,i23.item_stem_en AS i23stem_en, i23.item_stem_ur AS i23stem_ur, i23.item_image_en AS i23image_en, i23.item_image_ur AS i23image_ur, i23.item_image_position AS i23image_position,  i23.item_option_layout AS i23option_layout, i23.item_option_a_en AS i23option_a_en, i23.item_option_a_ur AS i23option_a_ur, i23.item_option_a_image AS i23option_a_image, i23.item_option_b_en AS i23option_b_en, i23.item_option_b_ur AS i23option_b_ur, i23.item_option_b_image AS i23option_b_image, i23.item_option_c_en AS i23option_c_en, i23.item_option_c_ur AS i23option_c_ur, i23.item_option_c_image AS i23option_c_image, i23.item_option_d_en AS i23option_d_en, i23.item_option_d_ur AS i23option_d_ur, i23.item_option_d_image AS i23option_d_image, i23.item_option_correct AS i23option_correct, i23.item_sort AS i23sort, i24.item_id AS i24id,i24.item_stem_en AS i24stem_en, i24.item_stem_ur AS i24stem_ur, i24.item_image_en AS i24image_en, i24.item_image_ur AS i24image_ur, i24.item_image_position AS i24image_position,  i24.item_option_layout AS i24option_layout, i24.item_option_a_en AS i24option_a_en, i24.item_option_a_ur AS i24option_a_ur, i24.item_option_a_image AS i24option_a_image, i24.item_option_b_en AS i24option_b_en, i24.item_option_b_ur AS i24option_b_ur, i24.item_option_b_image AS i24option_b_image, i24.item_option_c_en AS i24option_c_en, i24.item_option_c_ur AS i24option_c_ur, i24.item_option_c_image AS i24option_c_image, i24.item_option_d_en AS i24option_d_en, i24.item_option_d_ur AS i24option_d_ur, i24.item_option_d_image AS i24option_d_image, i24.item_option_correct AS i24option_correct, i24.item_sort AS i24sort, i25.item_id AS i25id,i25.item_stem_en AS i25stem_en, i25.item_stem_ur AS i25stem_ur, i25.item_image_en AS i25image_en, i25.item_image_ur AS i25image_ur, i25.item_image_position AS i25image_position,  i25.item_option_layout AS i25option_layout, i25.item_option_a_en AS i25option_a_en, i25.item_option_a_ur AS i25option_a_ur, i25.item_option_a_image AS i25option_a_image, i25.item_option_b_en AS i25option_b_en, i25.item_option_b_ur AS i25option_b_ur, i25.item_option_b_image AS i25option_b_image, i25.item_option_c_en AS i25option_c_en, i25.item_option_c_ur AS i25option_c_ur, i25.item_option_c_image AS i25option_c_image, i25.item_option_d_en AS i25option_d_en, i25.item_option_d_ur AS i25option_d_ur, i25.item_option_d_image AS i25option_d_image, i25.item_option_correct AS i25option_correct, i25.item_sort AS i25sort')
			->from('ci_items_paragraphs')
			->join('ci_items i21', 'para_item_21 = i21.item_id', 'left')
			->join('ci_items i22', 'para_item_22 = i22.item_id', 'left')
			->join('ci_items i23', 'para_item_23 = i23.item_id', 'left')
			->join('ci_items i24', 'para_item_24 = i24.item_id', 'left')
			->join('ci_items i25', 'para_item_25 = i25.item_id', 'left')
			->where('para_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function get_para_by_id($id){
			$this->db->select('ci_items_paragraphs.*, i21.item_id AS i21id, i21.item_stem_en AS i21stem_en, i21.item_stem_ur AS i21stem_ur, i21.item_image_en AS i21image_en, i21.item_image_ur AS i21image_ur, i21.item_image_position AS i21image_position, i21.item_option_layout AS i21option_layout, i21.item_option_a_en AS i21option_a_en, i21.item_option_a_ur AS i21option_a_ur, i21.item_option_a_image AS i21option_a_image, i21.item_option_b_en AS i21option_b_en, i21.item_option_b_ur AS i21option_b_ur, i21.item_option_b_image AS i21option_b_image, i21.item_option_c_en AS i21option_c_en, i21.item_option_c_ur AS i21option_c_ur, i21.item_option_c_image AS i21option_c_image, i21.item_option_d_en AS i21option_d_en, i21.item_option_d_ur AS i21option_d_ur, i21.item_option_d_image AS i21option_d_image, i21.item_option_correct AS i21option_correct, i21.item_sort AS i21sort, i22.item_id AS i22id,i22.item_stem_en AS i22stem_en, i22.item_stem_ur AS i22stem_ur, i22.item_image_en AS i22image_en, i22.item_image_ur AS i22image_ur, i22.item_image_position AS i22image_position,  i22.item_option_layout AS i22option_layout, i22.item_option_a_en AS i22option_a_en, i22.item_option_a_ur AS i22option_a_ur, i22.item_option_a_image AS i22option_a_image, i22.item_option_b_en AS i22option_b_en, i22.item_option_b_ur AS i22option_b_ur, i22.item_option_b_image AS i22option_b_image, i22.item_option_c_en AS i22option_c_en, i22.item_option_c_ur AS i22option_c_ur, i22.item_option_c_image AS i22option_c_image, i22.item_option_d_en AS i22option_d_en, i22.item_option_d_ur AS i22option_d_ur, i22.item_option_d_image AS i22option_d_image, i22.item_option_correct AS i22option_correct, i22.item_sort AS i22sort, i23.item_id AS i23id,i23.item_stem_en AS i23stem_en, i23.item_stem_ur AS i23stem_ur, i23.item_image_en AS i23image_en, i23.item_image_ur AS i23image_ur, i23.item_image_position AS i23image_position,  i23.item_option_layout AS i23option_layout, i23.item_option_a_en AS i23option_a_en, i23.item_option_a_ur AS i23option_a_ur, i23.item_option_a_image AS i23option_a_image, i23.item_option_b_en AS i23option_b_en, i23.item_option_b_ur AS i23option_b_ur, i23.item_option_b_image AS i23option_b_image, i23.item_option_c_en AS i23option_c_en, i23.item_option_c_ur AS i23option_c_ur, i23.item_option_c_image AS i23option_c_image, i23.item_option_d_en AS i23option_d_en, i23.item_option_d_ur AS i23option_d_ur, i23.item_option_d_image AS i23option_d_image, i23.item_option_correct AS i23option_correct, i23.item_sort AS i23sort, i24.item_id AS i24id,i24.item_stem_en AS i24stem_en, i24.item_stem_ur AS i24stem_ur, i24.item_image_en AS i24image_en, i24.item_image_ur AS i24image_ur, i24.item_image_position AS i24image_position,  i24.item_option_layout AS i24option_layout, i24.item_option_a_en AS i24option_a_en, i24.item_option_a_ur AS i24option_a_ur, i24.item_option_a_image AS i24option_a_image, i24.item_option_b_en AS i24option_b_en, i24.item_option_b_ur AS i24option_b_ur, i24.item_option_b_image AS i24option_b_image, i24.item_option_c_en AS i24option_c_en, i24.item_option_c_ur AS i24option_c_ur, i24.item_option_c_image AS i24option_c_image, i24.item_option_d_en AS i24option_d_en, i24.item_option_d_ur AS i24option_d_ur, i24.item_option_d_image AS i24option_d_image, i24.item_option_correct AS i24option_correct, i24.item_sort AS i24sort, i25.item_id AS i25id,i25.item_stem_en AS i25stem_en, i25.item_stem_ur AS i25stem_ur, i25.item_image_en AS i25image_en, i25.item_image_ur AS i25image_ur, i25.item_image_position AS i25image_position,  i25.item_option_layout AS i25option_layout, i25.item_option_a_en AS i25option_a_en, i25.item_option_a_ur AS i25option_a_ur, i25.item_option_a_image AS i25option_a_image, i25.item_option_b_en AS i25option_b_en, i25.item_option_b_ur AS i25option_b_ur, i25.item_option_b_image AS i25option_b_image, i25.item_option_c_en AS i25option_c_en, i25.item_option_c_ur AS i25option_c_ur, i25.item_option_c_image AS i25option_c_image, i25.item_option_d_en AS i25option_d_en, i25.item_option_d_ur AS i25option_d_ur, i25.item_option_d_image AS i25option_d_image, i25.item_option_correct AS i25option_correct, i25.item_sort AS i25sort')
			->from('ci_items_paragraphs')
			->join('ci_items i21', 'para_item_21 = i21.item_id', 'left')
			->join('ci_items i22', 'para_item_22 = i22.item_id', 'left')
			->join('ci_items i23', 'para_item_23 = i23.item_id', 'left')
			->join('ci_items i24', 'para_item_24 = i24.item_id', 'left')
			->join('ci_items i25', 'para_item_25 = i25.item_id', 'left')
			->where('para_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
}
?>