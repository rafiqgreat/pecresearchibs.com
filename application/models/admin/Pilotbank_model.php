<?php
	class Pilotbank_model extends CI_Model{

		public function add_pilotbank($data){
            $this->db->select('*')
                 ->from('ci_pilotbank')
                 ->where('pb_grade_id', $data['pb_grade_id'])
                 ->where('pb_subject_id', $data['pb_subject_id']);
            $query = $this->db->get();
            $result =  $query->result_array();
           
            
             if( count($result)>0){
                  //echo $result[0]['pb_id'];
                 //exit;
                 $this->db->query("DELETE FROM ci_pilotbank_dtl WHERE pbd_pb_id=".$result[0]['pb_id']);
                 $this->db->query("DELETE FROM ci_pilotbank WHERE pb_id=".$result[0]['pb_id']);
                 
             }
            
            
          $this->db->trans_start();
    
           $ary_ci_pilotbank = array(
                            'pb_grade_id' => $data['pb_grade_id'],
                            'pb_subject_id' => $data['pb_subject_id'],
                            'pb_year_id' => $data['year_id'],
                            'pb_createdby' => $data['pb_createdby'],
                            'pb_created' => $data['pb_created']    
                ); 
            $this->db->set($ary_ci_pilotbank);
            $this->db->insert('ci_pilotbank');
            $pb_id = $this->db->insert_id();
            //$ary_ci_pilotbank_dtl = array();
            for($i=0,$j=1;$i<=49;$i++,$j++){
               
            $ary_ci_pilotbank_dtl = array(
                            'pbd_pb_id' => $pb_id,
                            'pbd_version_id' => 1,
                            'pbd_item_id' => $data['version_1_ids'][$i],
                            'pbd_order' => $j
                             
                ); 
                $this->db->set($ary_ci_pilotbank_dtl);
                $this->db->insert('ci_pilotbank_dtl');
               
            }
            for($i=0,$j=1;$i<=49;$i++,$j++){
                 
                 $ary_ci_pilotbank_dtl = array(
                            'pbd_pb_id' => $pb_id,
                            'pbd_version_id' => 2,
                            'pbd_item_id' => $data['version_2_ids'][$i],
                            'pbd_order' => $j
                             
                ); 
                 $this->db->set($ary_ci_pilotbank_dtl);
                 $this->db->insert('ci_pilotbank_dtl');
              
             }
            for($i=0,$j=1;$i<=49;$i++,$j++){
                 
                 $ary_ci_pilotbank_dtl = array(
                            'pbd_pb_id' => $pb_id,
                            'pbd_version_id' => 3,
                            'pbd_item_id' => $data['version_3_ids'][$i],
                            'pbd_order' => $j
                             
                ); 
                 $this->db->set($ary_ci_pilotbank_dtl);
                 $this->db->insert('ci_pilotbank_dtl');
                 
             }
            for($i=0,$j=1;$i<=49;$i++,$j++){
               
                 $ary_ci_pilotbank_dtl = array(
                            'pbd_pb_id' => $pb_id,
                            'pbd_version_id' => 4,
                            'pbd_item_id' => $data['version_4_ids'][$i],
                            'pbd_order' => $j
                             
                ); 
                $this->db->set($ary_ci_pilotbank_dtl);
                $this->db->insert('ci_pilotbank_dtl');
               
            }
            for($i=0,$j=1;$i<=49;$i++,$j++){
               
                 $ary_ci_pilotbank_dtl = array(
                            'pbd_pb_id' => $pb_id,
                            'pbd_version_id' => 5,
                            'pbd_item_id' => $data['version_5_ids'][$i],
                            'pbd_order' => $j
                             
                ); 
                $this->db->set($ary_ci_pilotbank_dtl);
                $this->db->insert('ci_pilotbank_dtl');
               
            }
            
             $this->db->trans_complete();
            
            //echo $this->db->last_query();
            if($this->db->trans_status() == true){
                return true;
            }else{
                return false ;
            }
            exit;
			
		}

	public function get_all_added_subjects()
	{
		$this->db->select('pb_subject_id')->from('ci_pilotbank');
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
					 ->from('ci_items_rev')
                     ->join('ci_slos', 'item_slo_id = slo_id')
                     ->where('item_type', 'MCQ') //item_rev_ae_status
					 ->where('item_rev_ae_status IN (2,4)')
					 ->where('item_subject_id', $id)
                     ->order_by("slo_number", "asc");
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
        //////////////////////////////////////////////////////////////////////////////////////
        public function get_all_pilotbank($subjectList){		
			$wh =array('pb_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_pilotbank LEFT JOIN ci_grades ON grade_id = pb_grade_id LEFT JOIN ci_subjects ON subject_id = pb_subject_id LEFT JOIN ci_admin ON pb_createdby = admin_id';		
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
		public function get_ver_detail($pd_id, $ver_id)
		{	
			$this->db->select('*')
					 ->from('ci_pilotbank_dtl')	
					 ->join('ci_items_rev', 'pbd_item_id = item_id')	
					 ->join('ci_subjects', 'subject_id = item_subject_id')			 
					 ->where('pbd_pb_id', $pd_id)
					 ->where('pbd_version_id', $ver_id);
			$query = $this->db->get();
			return $result = $query->result();
		}
		public function get_pilotheader_by_suject($subject)
		{
			if($subject != 0 || $subject != '')
				$wh[] ='ph_paper_subject_en LIKE '."'%".$subject."%'";
				$wh[] ='ph_status = 1';
			
			$WHERE = implode(' and ',$wh);
			
			$this->db->select('*')
				 ->from('ci_pilotheaders')
				 ->where($WHERE);			
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function get_pilot_item_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items_rev')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();			
		}
		
		public function get_userinfo_by_id($id)
		{	
			$this->db->select('admin_id, username, firstname, lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_ae_subjects_grade($subjectList,$grade_id)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1)
					 ->where('subject_gradeid', $grade_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_cstands_iw($subject_id)
		{	
			$this->db->select('cs_id,cs_statement_en,cs_statement_ur,cs_number')
					 ->from('ci_content_stands')					 
					 ->where('cs_status', 1)
					->where('cs_subject_id', $subject_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_subcstands_iw($cs_id)
		{	
			$this->db->select('subcs_id,subcs_topic_en,subcs_topic_ur,subcs_number')
					 ->from('ci_subcontent_stands')					 
					 ->where('subcs_status', 1)
					->where('subcs_cstand_id', $cs_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_slos_iw($subc_id)
		{	
			$this->db->select('slo_id,slo_statement_en,slo_statement_ur,slo_number')
					 ->from('ci_slos')					 
					 ->where('slo_status', 1)
					 ->where('slo_subcstand_id', $subc_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function pilot_edit_items($data, $id)
		{
			$this->db->where('item_id', $id);
			$this->db->update('ci_items_rev', $data);
			return true;
		}
		public function erq_items_by_subject($id){
			$this->db->select('*')
					 ->from('ci_items_rev')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 //->join('ci_content_stands', 'cs_id = item_cstand_id')
					 //->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
                     ->where('item_type', 'ERQ') //item_rev_ae_status
					 ->where('item_rev_ae_status IN (2,4)')
					 ->where('item_subject_id', $id)
                     ->order_by("slo_number", "asc");
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function left_erq_items_by_subject($id){
			$this->db->select('*')
					 ->from('ci_items_rev')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 //->join('ci_content_stands', 'cs_id = item_cstand_id')
					 //->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
                     ->where('item_type', 'ERQ') //item_rev_ae_status
					 ->where('item_rev_ae_status IN (2,4)')
					 ->where('item_subject_id', $id)
                     ->order_by("slo_number", "asc");
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function run_update_query_custom($sql)
		{	
			
			return $this->db->query($sql)->result();
		}
	}
?>