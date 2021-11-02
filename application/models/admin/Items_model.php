<?php
	class Items_model extends CI_Model{

		public function add_item($data){
			$this->db->insert('ci_items', $data);
			return true;
		}
		public function add_item_rev($data){
			$this->db->insert('ci_items_rev', $data);
			return true;
		}
		public function update_item_exported($status,$id){
			$this->db->set('item_exported', $status);
			$this->db->where('item_id', $id);
			$this->db->update('ci_items');
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_items($id=0)
		{		
			$wh =array();
			if($id != 0) 
			$wh =array('item_subject_id='.$id);
			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_slos ON item_slo_id = slo_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('else');
			}
		}
		//---------------------------------------------------
		public function get_all_items_psy($id=0)
		{		
			
			$wh =array('item_status_ae=1','item_status_psy=0');
			
			$SQL = 'SELECT ci_items.*, ci_grades.grade_id, ci_grades.grade_code, ci_grades.grade_name_en, ci_grades.grade_name_ur, ci_subjects.subject_id, ci_subjects.subject_code, ci_subjects.subject_name_en, ci_subjects.subject_name_ur, iw.admin_id AS subid, iw.username AS subusername, ss.admin_id AS appid, ss.username AS appusername, ae.admin_id AS rewid, ae.username AS rewusername, py.admin_id AS pid, py.username AS pusername FROM ci_items  LEFT JOIN ci_grades ON grade_id = item_grade_id  LEFT JOIN ci_subjects ON subject_id = item_subject_id  LEFT JOIN ci_admin iw ON iw.admin_id = ci_items.item_submittedby  LEFT JOIN ci_admin ss ON ss.admin_id = ci_items.item_approvedby  LEFT JOIN ci_admin ae ON ae.admin_id = ci_items.item_reviewedby LEFT JOIN ci_admin py ON py.admin_id = ci_items.item_commentby_psy'; 
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('---------------------');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('-----------------else');
			}
		}
		
		public function get_all_rev_pitems_psy($id=0)
		{		
			
			$wh =array('item_rev_ae_status=2','item_rev_psy_status=0');
			
			$SQL = 'SELECT ci_items_rev.*, ci_grades.grade_id, ci_grades.grade_code, ci_grades.grade_name_en, ci_grades.grade_name_ur, ci_subjects.subject_id, ci_subjects.subject_code, ci_subjects.subject_name_en, ci_subjects.subject_name_ur, iw.admin_id AS subid, iw.username AS subusername, ss.admin_id AS appid, ss.username AS appusername, ae.admin_id AS rewid, ae.username AS rewusername, py.admin_id AS pid, py.username AS pusername FROM ci_items_rev  LEFT JOIN ci_grades ON grade_id = item_grade_id  LEFT JOIN ci_subjects ON subject_id = item_subject_id  LEFT JOIN ci_admin iw ON iw.admin_id = ci_items_rev.item_submittedby  LEFT JOIN ci_admin ss ON ss.admin_id = ci_items_rev.item_approvedby  LEFT JOIN ci_admin ae ON ae.admin_id = ci_items_rev.item_reviewedby LEFT JOIN ci_admin py ON py.admin_id = ci_items_rev.item_commentby_psy'; 
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('---------------------');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('-----------------else');
			}
		}
		
		public function get_all_rev_eitems_psy($id=0)
		{		
			
			$wh =array('item_rev_ae_status=2','item_rev_psy_status=1');
			
			$SQL = 'SELECT ci_items_rev.*, ci_grades.grade_id, ci_grades.grade_code, ci_grades.grade_name_en, ci_grades.grade_name_ur, ci_subjects.subject_id, ci_subjects.subject_code, ci_subjects.subject_name_en, ci_subjects.subject_name_ur, iw.admin_id AS subid, iw.username AS subusername, ss.admin_id AS appid, ss.username AS appusername, ae.admin_id AS rewid, ae.username AS rewusername, py.admin_id AS pid, py.username AS pusername FROM ci_items_rev  LEFT JOIN ci_grades ON grade_id = item_grade_id  LEFT JOIN ci_subjects ON subject_id = item_subject_id  LEFT JOIN ci_admin iw ON iw.admin_id = ci_items_rev.item_submittedby  LEFT JOIN ci_admin ss ON ss.admin_id = ci_items_rev.item_approvedby  LEFT JOIN ci_admin ae ON ae.admin_id = ci_items_rev.item_reviewedby LEFT JOIN ci_admin py ON py.admin_id = ci_items_rev.item_commentby_psy'; 
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('---------------------');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('-----------------else');
			}
		}
		
		public function get_all_rev_aitems_psy($id=0)
		{		
			
			$wh =array('item_rev_ae_status=2','item_rev_psy_status=2');
			
			$SQL = 'SELECT ci_items_rev.*, ci_grades.grade_id, ci_grades.grade_code, ci_grades.grade_name_en, ci_grades.grade_name_ur, ci_subjects.subject_id, ci_subjects.subject_code, ci_subjects.subject_name_en, ci_subjects.subject_name_ur, iw.admin_id AS subid, iw.username AS subusername, ss.admin_id AS appid, ss.username AS appusername, ae.admin_id AS rewid, ae.username AS rewusername, py.admin_id AS pid, py.username AS pusername FROM ci_items_rev  LEFT JOIN ci_grades ON grade_id = item_grade_id  LEFT JOIN ci_subjects ON subject_id = item_subject_id  LEFT JOIN ci_admin iw ON iw.admin_id = ci_items_rev.item_submittedby  LEFT JOIN ci_admin ss ON ss.admin_id = ci_items_rev.item_approvedby  LEFT JOIN ci_admin ae ON ae.admin_id = ci_items_rev.item_reviewedby LEFT JOIN ci_admin py ON py.admin_id = ci_items_rev.item_commentby_psy'; 
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('---------------------');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('-----------------else');
			}
		}
		
		/*public function get_all_items_psy_rev($id=0)
		{		
			
			$wh =array('item_status_ae=1','item_status_psy=1');
			
			$SQL = 'SELECT ci_items.*, ci_grades.grade_id, ci_grades.grade_code, ci_grades.grade_name_en, ci_grades.grade_name_ur, ci_subjects.subject_id, ci_subjects.subject_code, ci_subjects.subject_name_en, ci_subjects.subject_name_ur, iw.admin_id AS subid, iw.username AS subusername, ss.admin_id AS appid, ss.username AS appusername, ae.admin_id AS rewid, ae.username AS rewusername, py.admin_id AS pid, py.username AS pusername FROM ci_items  LEFT JOIN ci_grades ON grade_id = item_grade_id  LEFT JOIN ci_subjects ON subject_id = item_subject_id  LEFT JOIN ci_admin iw ON iw.admin_id = ci_items.item_submittedby  LEFT JOIN ci_admin ss ON ss.admin_id = ci_items.item_approvedby  LEFT JOIN ci_admin ae ON ae.admin_id = ci_items.item_reviewedby LEFT JOIN ci_admin py ON py.admin_id = ci_items.item_commentby_psy'; 
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('---------------------');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('-----------------else');
			}
		}*/
		//---------------------------------------------------
		public function get_all_items_AE($admin_id, $subjectList, $item_status=0, $submitted_by=0)
		{
			
			if($item_status != 0)
				$wh =array('item_status=4','item_status_ss IN(2,3)','item_subject_id IN ('.$subjectList.')','item_status_ae=0');
			if($submitted_by != 0)
				$wh[] ='item_submittedby='.$submitted_by;
			/*
				SELECT ci_items.item_id,ci_items.item_code,ci_grades.grade_id,ci_grades.grade_code,ci_grades.grade_name_en,s.admin_id AS subid, s.username AS subusername, a.admin_id AS appid, a.username AS appusername FROM ci_items 
				LEFT JOIN ci_grades ON grade_id = item_grade_id 
				LEFT JOIN ci_subjects ON subject_id = item_subject_id 
				LEFT JOIN ci_admin s ON s.admin_id = ci_items.item_submittedby 
				LEFT JOIN ci_admin a ON a.admin_id = ci_items.item_approvedby 
				WHERE ( item_status=4 AND item_status_ss IN(2,3) AND item_subject_id IN (7,11,15,24,30,34,36,42,46,50,54) )
			*/
			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		//---------------------------------------------------
		public function get_all_items_AE_searched_r($admin_id,$subjectList,$item_status=0,$id=0)
		{
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			$itemwriter_id = $temp[2];
			
			
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss IN (2,3)','item_subject_id IN ('.$subjectList.')');
			if($itemwriter_id != 0)
				$wh[] ='item_submittedby='.$itemwriter_id;
			if($subject_id != 0)
				$wh[] ='item_subject_id='.$subject_id;
			if($grade_id != 0)
				{$wh[] ='item_grade_id='.$grade_id;}
			$wh[] ='item_status_ae=2';	

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('if');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('else');
			}	
			//die($this->db->last_query());			
		}
		//---------------------------------------------------
		public function get_all_items_AE_searched_a($admin_id,$subjectList,$item_status=0,$id=0)
		{
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			$itemwriter_id = $temp[2];
			
			
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss IN (2,3)','item_subject_id IN ('.$subjectList.')');
			if($itemwriter_id != 0)
				$wh[] ='item_submittedby='.$itemwriter_id;
			if($subject_id != 0)
				$wh[] ='item_subject_id='.$subject_id;
			if($grade_id != 0)
				{$wh[] ='item_grade_id='.$grade_id;}
			$wh[] ='item_status_ae=1';	

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('if');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('else');
			}	
			//die($this->db->last_query());			
		}
		//---------------------------------------------------
		public function get_all_items_AE_searched_p($admin_id,$subjectList,$item_status=0,$id=0)
		{
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			$itemwriter_id = $temp[2];
			
			
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss IN (2,3)','item_subject_id IN ('.$subjectList.')');
			if($itemwriter_id != 0)
				$wh[] ='item_submittedby='.$itemwriter_id;
			if($subject_id != 0)
				$wh[] ='item_subject_id='.$subject_id;
			if($grade_id != 0)
				{$wh[] ='item_grade_id='.$grade_id;}
			$wh[] ='item_status_ae=0';	

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('if');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('else');
			}	
			//die($this->db->last_query());			
		}
		//---------------------------------------------------
		public function get_all_items_AE_accepted($admin_id, $subjectList, $item_status=0, $submitted_by=0)
		{
			if($item_status != 0)
				//$wh =array('item_status='.$item_status,'item_status_ss IN (2,3)','item_subject_id IN ('.$subjectList.')');
				$wh =array('item_status_ae =1','item_subject_id IN ('.$subjectList.')');
			if($submitted_by != 0)
				$wh[] ='item_submittedby='.$submitted_by;

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		//---------------------------------------------------
		public function get_all_items_AE_rejected($admin_id, $subjectList, $item_status=0, $submitted_by=0)
		{
			if($item_status != 0)
				//$wh =array('item_status='.$item_status,'item_status_ae=2','item_subject_id IN ('.$subjectList.')');
				$wh =array('item_status_ae=2','item_subject_id IN ('.$subjectList.')');
			if($submitted_by != 0)
				$wh[] ='item_submittedby='.$submitted_by;

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		//---------------------------------------------------
		public function get_all_items_SS($admin_id,$subjectList,$item_status=0, $submitted_by=0)
		{
			/* SELECT * FROM `ci_items` WHERE item_status = 2 AND item_status_ss = 0 AND item_subject_id IN (6,10,14,20,27,33,41,49) */
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss=0','item_subject_id IN ('.$subjectList.')');
			if($submitted_by != 0)
				$wh[] ='item_submittedby='.$submitted_by;

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				 return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		//---------------------------------------------------
		public function get_all_items_SS_accepted($admin_id, $subjectList, $item_status=0, $submitted_by=0)
		{
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss IN (2,3)','item_subject_id IN ('.$subjectList.')');
			if($submitted_by != 0)
				$wh[] ='item_submittedby='.$submitted_by;

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby ';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		//---------------------------------------------------
		public function get_all_items_SS_rejected($admin_id, $subjectList, $item_status=0, $submitted_by=0)
		{
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss=1','item_subject_id IN ('.$subjectList.')');
			if($submitted_by != 0)
				$wh[] ='item_submittedby='.$submitted_by;

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_items_IW($admin_id,$id=0,$item_status=0)
		{
			//print_r($records);
		//die($id.'=='.$this->session->userdata('role_id'));
			if($item_status != 0)
				$wh =array('item_submittedby='.$admin_id, 'item_status='.$item_status);
			else
				$wh =array('item_submittedby='.$admin_id);
			
			if($id != 0) $wh =array('item_subject_id='.$id);
			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_slos ON item_slo_id = slo_id ';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}
///////////////////////////////////////////////////
		public function get_search_grade()
		{
			$this->db->select('grade_id, grade_name_en, grade_name_ur, grade_code')
					 ->from('ci_grades')
					 //->where('subject_gradeid', $grade_id)
					 //->where('subject_id IN ('.$subjectList.')')
					 ->where('grade_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();	
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
///////////////////////////////////////////////////Get Subjects by Grade using ajax call	
		public function get_ae_subjects_by_grade($grade_id,$subjectList)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
/////////////////////////////////////////////////////////////////////
		public function get_rev_subjects_by_grade($grade_id,$subjectList)
		{
		$this->db->select('*')
				 ->from('ci_subjects')
				 ->join('ci_grades', 'grade_id = subject_gradeid')
				 ->where('subject_gradeid', $grade_id)
				 ->where('subject_id IN ('.$subjectList.')')
				 ->where('subject_status', 1);					 
		$query = $this->db->get();			
		return $result = $query->result_array();			
	}
		public function get_rev_subjects($subjectList)
		{
		$this->db->select('*')
				 ->from('ci_subjects')
				 ->join('ci_grades', 'grade_id = subject_gradeid')
				 ->where('subject_id IN ('.$subjectList.')')
				 ->where('subject_status', 1);					 
		$query = $this->db->get();			
		return $result = $query->result_array();			
	}
///////////////////////////////////////////////////////////////////
		function get_subjects_by_grade($grade_id)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
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
		public function get_all_subjects()
		{	
			$this->db->select('subject_id, subject_code, subject_name_en')
					 ->from('ci_subjects')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
//////////////////////////////////////////////////
		
		function change_status()
		{		
			$this->db->set('item_status', $this->input->post('status'));
			$this->db->where('item_id', $this->input->post('item_id'));
			$this->db->update('ci_items');
		} 
		
		public function get_items_by_id($id){
			$query = $this->db->get_where('ci_items', array('item_id' => $id));
			return $result = $query->row_array();
		}
		/*
		public function get_rev_items_by_id($id){
			$query = $this->db->get_where('ci_items_rev', array('item_id' => $id));
			return $result = $query->result_array();
		}*/
		public function edit_items($data, $id){
			$this->db->where('item_id', $id);
			$this->db->update('ci_items', $data);
			return true;
		}
		public function rev_edit_items($data, $id){
			$this->db->where('item_id', $id);
			$this->db->update('ci_items_rev', $data);
			return true;
		}
		public function find_rev_item_by_id($id)
		{	
			$this->db->select('item_id,item_rev_revid')
					 ->from('ci_items_rev')	
					 ->where('item_id', $id);				 
			$query = $this->db->get();
			return $result = $query->result();
		}
		public function submit_for_approval($id){
			$this->db->where('item_id', $id);
			$this->db->update('ci_items', array('item_status'=> '2','item_submitted'=> date('Y-m-d H:i:s')));
			return true;
		}
		
		/*
		$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			$itemwriter_id = $temp[2];
		*/
		public function get_all_items_SS_searched($admin_id,$subjectList,$item_status=0,$id=0)
		{
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			$itemwriter_id = $temp[2];
			$item_type = $temp[3];
			
			/* SELECT * FROM `ci_items` WHERE item_status = 2 AND item_status_ss = 0 AND item_subject_id IN (6,10,14,20,27,33,41,49) */
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss=0','item_subject_id IN ('.$subjectList.')');
			if($itemwriter_id != 0)
				$wh[] ='item_submittedby='.$itemwriter_id;
			if($subject_id != 0)
				$wh[] ='item_subject_id='.$subject_id;
			if($grade_id != 0)
				$wh[] ='item_grade_id='.$grade_id;
			if($item_type != "")
				$wh[] ='item_type="'.$item_type.'"';

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		
		public function get_all_items_SS_a_searched($admin_id,$subjectList,$item_status=0,$id=0)
		{
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			$itemwriter_id = $temp[2];
			$item_type = $temp[3];
			
			/* SELECT * FROM `ci_items` WHERE item_status = 2 AND item_status_ss = 0 AND item_subject_id IN (6,10,14,20,27,33,41,49) */
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss IN (2,3)','item_subject_id IN ('.$subjectList.')');
			if($itemwriter_id != 0)
				$wh[] ='item_submittedby='.$itemwriter_id;
			if($subject_id != 0)
				$wh[] ='item_subject_id='.$subject_id;
			if($grade_id != 0)
				$wh[] ='item_grade_id='.$grade_id;
			if($item_type != "")
				$wh[] ='item_type="'.$item_type.'"';

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die();
			}	
			//die($this->db->last_query());			
		}
		
		public function get_all_items_SS_r_searched($admin_id,$subjectList,$item_status=0,$id=0)
		{
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			$itemwriter_id = $temp[2];
			$item_type = $temp[3];
			
			if($item_status != 0)
				$wh =array('item_status='.$item_status,'item_status_ss=1','item_subject_id IN ('.$subjectList.')');
			if($itemwriter_id != 0)
				$wh[] ='item_submittedby='.$itemwriter_id;
			if($subject_id != 0)
				$wh[] ='item_subject_id='.$subject_id;
			if($grade_id != 0)
				$wh[] ='item_grade_id='.$grade_id;
			if($item_type != "")
				$wh[] ='item_type="'.$item_type.'"';

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die();
			}	
			//die($this->db->last_query());			
		}
			
		public function ss_submit_for_approval($data, $id)
		{
			$this->db->where('item_id', $id);
			$this->db->update('ci_items', $data);
			return true;
		}
		
		public function get_ss_itemwriters($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')	
					 ->where('admin_role_id', '3')				 
					 ->where('parent_admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		// $this->db->where_in('id', $chunkIds);
		public function get_iw_by_subject($id)
		{	
			$this->db->select('admin_id, username, firstname, lastname')
					 ->from('ci_admin')
					 ->where('admin_role_id', '3')
					 ->where("find_in_set($id, subjects_ids)");	
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
				
		public function get_item_by_id($item_id)
		{
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
		
		public function get_rev_items_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items_rev')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();			
		}
		
		public function get_rev_item_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();			
		}
		
		public function get_accp_rev_item_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items_rev')
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
		/*
		INSERT INTO table2
		SELECT * FROM table1
		WHERE condition
		*/
		/*public function copy_rev_item_by_id($item_id){
			$sql ='INSERT INTO ci_items_rev SELECT "item_id", "item_code" , "item_difficulty" , "item_discr" , "item_dif_code", "item_registration", "item_date_received" , "item_submitted" , "item_submittedby", "item_updated" , "item_updatedby" , "item_grade_id" , "item_subject_id" , "item_cstand_id" , "item_subcstand_id" , "item_slo_id" , "item_cognitive_bloom", "item_curriculum" , "item_pctb_chapter", "item_pctb_page" , "item_other_title" , "item_other_year", "item_other_page" , "item_relation", "item_type", "item_stem_number" , "item_stem_en", "item_stem_ur", "item_image_en" , "item_image_ur" , "item_image_position", "item_option_layout" , "item_option_a_en" , "item_option_a_ur" , "item_option_a_image" , "item_option_b_en" , "item_option_b_ur" , "item_option_b_image", "item_option_c_en" , "item_option_c_ur" , "item_option_c_image" , "item_option_d_en", "item_option_d_ur", "item_option_d_image" , "item_option_correct", "item_sort" , "item_status" , "item_approved" , "item_approvedby" , "item_reviewed" , "item_reviewedby", "item_rubric_english" , "item_rubric_urdu" , "item_rubric_image_position" , "item_rubric_image" , "item_status_ss" , "item_comment_ss" , "item_status_ae" , "item_comment_ae" , "item_status_psy" , "item_comment_psy" , "item_date_psy" , "item_commentby_psy" , "item_batch" , "item_exported" FROM ci_items WHERE item_id ="'.$item_id.'"';
			die($sql);
			if ($mysqli->query($sql)){}
			return $result = $query->result_array();			
		}*/
		public function get_ae_subjects($subjectList)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en,grade_code')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1);
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
		
		public function get_rev_subjects_grade($subjectList,$grade_id)
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
		
		public function get_all_subcstands_iw($cs_id)
		{	
			$this->db->select('subcs_id,subcs_topic_en,subcs_topic_ur,subcs_number')
					 ->from('ci_subcontent_stands')					 
					 ->where('subcs_status', 1)
					->where('subcs_cstand_id', $cs_id);
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
		
		public function get_all_slos_iw($subc_id)
		{	
			$this->db->select('slo_id,slo_statement_en,slo_statement_ur,slo_number')
					 ->from('ci_slos')					 
					 ->where('slo_status', 1)
					 ->where('slo_subcstand_id', $subc_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function item_search()
		{	
			$this->db->select('*')
					 ->from('ci_items')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function ae_submit_for_approval($data, $id)
		{
			$this->db->where('item_id', $id);
			$this->db->update('ci_items', $data);
			return true;
		}
		
		public function psy_submit_for_approval($data, $id)
		{
			$this->db->where('item_id', $id);
			$this->db->update('ci_items', $data);
			return true;
		}
		
		function update_rejected_item($data, $id)
		{
			$this->db->where('item_id', $id);
			$this->db->update('ci_items', $data);
			return true;			
		}
		public function log_entry($datalog)
		{
			$this->db->insert('ci_itemslog', $datalog);
			return true;
		}
		
		public function get_iwinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ssinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_aeinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_psyinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_irinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function rev_ss_info_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_items_for_export()
		{			
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, grade_code, username, item_status')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby')
					 ->where('item_status', '1')
					 ->where('item_submittedby', $this->session->userdata('admin_id'));
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_sitems_for_export()
		{			
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, grade_code, username, item_status')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby')
					 ->where('item_status', '2')
					 ->where('item_submittedby', $this->session->userdata('admin_id'));
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_aitems_for_export()
		{			
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, grade_code, username, item_status')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby')
					 ->where('item_status', '4')
					 ->where('item_submittedby', $this->session->userdata('admin_id'));
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ritems_for_export()
		{			
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, grade_code, username, item_status')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby')
					 ->where('item_status', '3')
					 ->where('item_submittedby', $this->session->userdata('admin_id'));
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ss_pitems_for_export($subjectList)
		{			
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, grade_code, username, item_status')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby')
					 ->where('item_status_ss', '0')
					 ->where('item_status', '2')
					 ->where('item_subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ss_aitems_for_export($subjectList)
		{			
			$item_status_ss = "2,3";
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, grade_code, username, item_status_ss')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby')
					 ->where('item_status_ss IN ('.$item_status_ss.')')
					 ->where('item_subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ss_ritems_for_export($subjectList)
		{			
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, grade_code, username, item_status_ss')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby')
					 ->where('item_status_ss', '1')
					 ->where('item_subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
			//echo '<pre>';
			//print_r($result);
			//die();
		}
		
		public function get_items_csv_export()
		{			
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, item_sort, grade_code, IF(item_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_gradeid');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ss_pitems_csv_export()
		{			
			$this->db->select('item_id, item_code, item_stem_en, item_stem_ur, grade_code, username, item_status')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby')
					 ->where('item_status_ss', '0')
					 ->where('item_status', '2')
					 ->where('item_subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ss_subjects($subjectList)
		{	
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function find_exported($id)
		{
			$this->db->select('item_exported')
					 ->from('ci_items')					 
					 ->where('item_id', $id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		
		public function ss_pitems_search($isb='', $s_grade='', $s_subject='')
		{			
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_grade_id')
					 ->join('ci_admin', 'admin_id= item_submittedby');
			if($isb!=""){$this->db->where('item_submittedby', $isb);}
			if($s_grade!=""){$this->db->where('item_grade_id', $s_grade);}
			if($s_subject!=""){$this->db->where('item_subject_id',$s_subject);}
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
		
		public function count_in_groups($item_id)
		{
			$sql="SELECT COUNT(group_id) AS founded FROM `ci_items_group` WHERE group_item_1 = '".$item_id."' OR group_item_2 = '".$item_id."' OR group_item_3 = '".$item_id."' OR group_item_4 = '".$item_id."' OR group_item_5 = '".$item_id."' OR group_item_6 = '".$item_id."' OR group_item_7 = '".$item_id."' OR group_item_8 = '".$item_id."' OR group_item_9 = '".$item_id."' OR group_item_10 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;	
		}
		
		public function count_in_paragraphs($item_id)
		{
			$sql="SELECT COUNT(para_id) AS founded FROM `ci_items_paragraphs` WHERE para_item_21 = '".$item_id."' OR para_item_22 = '".$item_id."' OR para_item_23 = '".$item_id."' OR para_item_24 = '".$item_id."' OR para_item_25 = '".$item_id."' OR para_item_26 = '".$item_id."' OR para_item_27 = '".$item_id."' OR para_item_28 = '".$item_id."' OR para_item_29 = '".$item_id."' OR para_item_30 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;		
		}
		
		public function count_in_groups_rev($item_id)
		{
			$sql="SELECT COUNT(group_id) AS founded FROM `ci_items_group_rev` WHERE group_item_1 = '".$item_id."' OR group_item_2 = '".$item_id."' OR group_item_3 = '".$item_id."' OR group_item_4 = '".$item_id."' OR group_item_5 = '".$item_id."' OR group_item_6 = '".$item_id."' OR group_item_7 = '".$item_id."' OR group_item_8 = '".$item_id."' OR group_item_9 = '".$item_id."' OR group_item_10 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;	
		}
		
		public function count_in_paragraphs_rev($item_id)
		{
			$sql="SELECT COUNT(para_id) AS founded FROM `ci_items_paragraphs_rev` WHERE para_item_21 = '".$item_id."' OR para_item_22 = '".$item_id."' OR para_item_23 = '".$item_id."' OR para_item_24 = '".$item_id."' OR para_item_25 = '".$item_id."' OR para_item_26 = '".$item_id."' OR para_item_27 = '".$item_id."' OR para_item_28 = '".$item_id."' OR para_item_29 = '".$item_id."' OR para_item_30 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;		
		}
		
		public function get_all_items_REV_pending($subjectList)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items')
					 ->where('item_status_ae', 1)
					 ->where('item_exported', 0)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			
			/*SELECT COUNT(group_id) AS founded FROM `ci_items_group` WHERE group_item_1 = 10274 OR group_item_2 = 10274 OR group_item_3 = 10274 OR group_item_4 = 10274 OR group_item_5 = 10274 OR group_item_6 = 10274 OR group_item_7 = 10274 OR group_item_8 = 10274 OR group_item_9 = 10274 OR group_item_10 = 10274 

SELECT COUNT(para_id) AS founded FROM `ci_items_paragraphs` WHERE para_item_21 = 10274 OR para_item_22 = 10274  OR para_item_23 = 10274 OR para_item_24 = 10274 OR para_item_25 = 2079 OR para_item_26 = 10274 OR para_item_27 = 10274 OR para_item_28 = 10274 OR para_item_29 = 10274 OR para_item_30 = 10274*/
			
			
			$wh =array('item_status_ae =1','item_exported=0','item_subject_id IN ('.$subjectList.')','item_id NOT IN ('.$excluded_items.')');
			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_REV_searched($subjectList,$id=0)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items')
					 ->where('item_status_ae', 1)
					 ->where('item_exported', 0)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			
			if($subject_id != 0)
				{$wh[] ='item_subject_id='.$subject_id;}
			if($grade_id != 0)
				{$wh[] ='item_grade_id='.$grade_id;}
			
			$wh[] ='item_status_ae=1';
			$wh[] ='item_exported=0';
			$wh[] = 'item_subject_id IN ('.$subjectList.')';
			$wh[] = 'item_id NOT IN ('.$excluded_items.')';	

			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		
		public function get_all_items_REV_edited($subjectList)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items_rev')
					 ->where('item_rev_status', 1)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			$wh =array('item_rev_status=1','item_rev_revid='.$this->session->userdata('admin_id'),'item_subject_id IN ('.$subjectList.')','item_id NOT IN ('.$excluded_items.')');
			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_REV_accepted($subjectList,$id=0)
		{
			$wh =array('item_rev_status=2','item_subject_id IN ('.$subjectList.')','item_rev_revid='.$id);
			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_rev_ss_pending($subjectList)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items_rev')
					 ->where('item_rev_status', 2)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups_rev($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs_rev($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			$wh =array('item_rev_status =2','item_rev_ss_status =0','item_subject_id IN ('.$subjectList.')','item_id NOT IN ('.$excluded_items.')');
			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_rev_ss_searched($subjectList,$id=0)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items_rev')
					 ->where('item_rev_status', 2)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups_rev($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs_rev($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			
			if($subject_id != 0)
				{$wh[] ='item_subject_id='.$subject_id;}
			if($grade_id != 0)
				{$wh[] ='item_grade_id='.$grade_id;}
			
			$wh[] ='item_rev_status=2';
			$wh[] ='item_rev_ss_status=0';
			$wh[] = 'item_subject_id IN ('.$subjectList.')';
			$wh[] = 'item_id NOT IN ('.$excluded_items.')';		

			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		
		public function get_all_items_rev_ss_edited($subjectList)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items_rev')
					 ->where('item_rev_status', 2)
					 ->where('item_rev_ss_status', 1)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups_rev($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs_rev($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			$wh =array('item_rev_ss_status=1','item_subject_id IN ('.$subjectList.')','item_id NOT IN ('.$excluded_items.')');
			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_rev_ss_accepted($subjectList)
		{
			$wh =array('item_rev_ss_status=2','item_rev_status =2','item_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_rev_ae_pending($subjectList)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items_rev')
					 ->where('item_rev_ss_status', 2)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups_rev($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs_rev($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			$wh =array('item_rev_status =2','item_rev_ss_status =2','item_rev_ae_status =0','item_subject_id IN ('.$subjectList.')');//,'item_id NOT IN ('.$excluded_items.')'
			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_rev_ae_edited($subjectList)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items_rev')
					 ->where('item_rev_ss_status', 2)
					 ->where('item_rev_ae_status', 1)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups_rev($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs_rev($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			$wh =array('item_rev_status =2','item_rev_ss_status =2','item_rev_ae_status =1','item_subject_id IN ('.$subjectList.')','item_id NOT IN ('.$excluded_items.')');
			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_rev_ae_accepted($subjectList)
		{
			$wh =array('item_rev_status =2','item_rev_ss_status =2','item_rev_ae_status =2','item_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		
		public function get_all_items_rev_ae_searched($subjectList,$id=0)
		{
			$excluded_items = "";
			$subjectList_arr = explode(',',$subjectList);
			$this->db->select('item_id')
					 ->from('ci_items_rev')
					 ->where('item_rev_ss_status', 2)
					 ->where_in('item_subject_id', $subjectList_arr);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row)
			{
					if($this->count_in_groups_rev($row->item_id) > 0)
					$excluded_items .= $row->item_id.",";
			}
			foreach($result as $row2)
			{
					if($this->count_in_paragraphs_rev($row2->item_id) > 0)
					$excluded_items .= $row2->item_id.",";
			}
			$excluded_items = rtrim($excluded_items, ",");
			
			$temp = explode('_',$id);
			$grade_id = $temp[0];
			$subject_id = $temp[1];
			
			if($subject_id != 0)
				{$wh[] ='item_subject_id='.$subject_id;}
			if($grade_id != 0)
				{$wh[] ='item_grade_id='.$grade_id;}
			
			$wh[] ='item_rev_status=2';
			$wh[] ='item_rev_ss_status=2';
			$wh[] ='item_rev_ae_status=0';	
			$wh[] = 'item_subject_id IN ('.$subjectList.')';
			$wh[] = 'item_id NOT IN ('.$excluded_items.')';	

			$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		//---------------------------------------------------
	}
?>