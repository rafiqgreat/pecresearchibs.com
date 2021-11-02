<?php
	class Dashboard_model extends CI_Model{
		
		public function get_all_items(){
			$sql="SELECT * FROM `ci_items` order by item_submittedby asc, item_grade_id asc, item_subject_id asc, item_cstand_id asc, item_subcstand_id asc, item_slo_id asc";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_all_users(){
			return $this->db->count_all('ci_admin');
		}
		//--------------------------------------------------------------
		public function get_admin_users(){

			$this->db->where('admin_role_id', 1);
			return $this->db->count_all_results('ci_admin');
		}
		
		public function get_all_users_counters()
		{
			$sql="SELECT SUM(IF(admin_role_id=1, 1, 0)) AS Admin_Users, SUM(IF(admin_role_id=2, 1, 0)) AS SS_Users, SUM(IF(admin_role_id=3, 1, 0)) AS IW_Users, SUM(IF(admin_role_id=4, 1, 0)) AS AE_Users, SUM(IF(admin_role_id=5, 1, 0)) AS PS_Users, SUM(IF(admin_role_id=6, 1, 0)) AS IR_Users FROM `ci_admin`";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_ss_items_reviewed_daily($dt='')
		{
			$sql="SELECT item_approvedby, item_approved, username, COUNT(*) AS total FROM `ci_items` LEFT JOIN `ci_admin` ON admin_id = item_approvedby  WHERE item_approved LIKE '".$dt."%'  AND item_approvedby != 0 AND admin_role_id = 2 GROUP BY item_approvedby ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_ae_items_reviewed_daily($dt='')
		{
			$sql="SELECT item_reviewedby, item_reviewed, username, COUNT(*) AS total FROM `ci_items` LEFT JOIN `ci_admin` ON admin_id = item_reviewedby  WHERE item_reviewed LIKE '".$dt."%'  AND item_reviewedby != 0 AND admin_role_id = 4 GROUP BY item_reviewedby ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_stats_items($subject_name='',$item_batch=1)
		{
			
			if($subject_name == 'General')
			{
				$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1 AND item_status=3, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id  WHERE item_batch = ".$item_batch." AND (subject_name_en LIKE 'General%' OR subject_name_en LIKE 'Science%') GROUP BY item_subject_id  ORDER BY subject_gradeid ASC,  SS_Pending DESC";    
			}
			else
			{
				$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1 AND item_status=3, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id  WHERE subject_name_en LIKE '".$subject_name."%' AND item_batch = ".$item_batch." GROUP BY item_subject_id  ORDER BY subject_gradeid ASC,  SS_Pending DESC";    	
			}
			$query = $this->db->query($sql);
			return $query->result_array();
		}	
		
		public function get_items_stats()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, SUM(IF(item_status=1, 1, 0)) AS Draft_Items,SUM(IF(item_status=2, 1, 0)) AS Submitted_Items, SUM(IF(item_status=3, 1, 0)) AS Rejected_Items, SUM(IF(item_status=4, 1, 0)) AS Accepted_Items FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id  GROUP BY item_subject_id ORDER BY subject_gradeid ASC,  Draft_Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_iss()
		{
			$sql='SELECT CONCAT(firstname," ",lastname,"(",username,")") AS itemwriter, COUNT(item_id) AS Total_Items, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1 AND item_status=3, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending FROM `ci_items` LEFT JOIN `ci_subjects` ON subject_id = item_subject_id LEFT JOIN `ci_admin` ON admin_id = item_submittedby WHERE parent_admin_id = '.$this->session->userdata('admin_id').' GROUP BY item_submittedby ORDER BY Total_Items DESC';    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_english()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'English' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_math()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Math' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_urdu()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Urdu' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_science()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Science' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_computer()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Computer%' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_gk()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE '%Knowledge' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_aklaqiat()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE '%Ethics' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_islamiat()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Islamiat' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_ss()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Social%' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		//--------------------------------------------------------------
		public function get_schools_generted_papers()
		{
			$sql="SELECT COUNT(paper_school_id) AS schoolspapers FROM ci_final_papers GROUP BY paper_school_id";    
			$query = $this->db->query($sql);
			return $query->result_array();			
		}
		public function get_ae_users(){

			$this->db->where('admin_role_id', 2);
			return $this->db->count_all_results('ci_admin');
		}
		public function get_iw_users(){

			$this->db->where('admin_role_id', 3);
			return $this->db->count_all_results('ci_admin');
		}		
		public function get_all_grades(){
			return $this->db->count_all('ci_grades');
		}
		public function get_all_subjects(){
			return $this->db->count_all('ci_subjects');
		}
		public function get_all_cstands(){
			return $this->db->count_all('ci_content_stands');
		}
		public function get_all_subcstands(){
			return $this->db->count_all('ci_subcontent_stands');
		}
		public function get_all_schools_count(){
			return $this->db->count_all_results('ci_schools');
		}
		public function get_all_paper_count(){
			return $this->db->count_all_results('ci_final_papers');
		}
		public function get_paper_completed_count(){
			$this->db->where('paper_status', 1);
			return $this->db->count_all_results('ci_final_papers');
		}
		public function get_paper_incompleted_count(){
			$this->db->where('paper_status', 0);
			return $this->db->count_all_results('ci_final_papers');
		}
		public function update_item_code_new($code,$id){

			$this->db->set('item_code_new', $code);
			$this->db->where('item_id', $id);
			$this->db->update('ci_items');
			return true;

		}
	}

?>
