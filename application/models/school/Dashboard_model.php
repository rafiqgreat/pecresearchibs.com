<?php
	class Dashboard_model extends CI_Model{

		public function get_all_users(){
			return $this->db->count_all('ci_admin');
		}
		//--------------------------------------------------------------
		public function get_admin_users(){

			$this->db->where('admin_role_id', 1);
			return $this->db->count_all_results('ci_admin');
		}

		//--------------------------------------------------------------
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
		public function get_all_paper_count($id){
			$this->db->where('paper_school_id', $id);
			return $this->db->count_all_results('ci_final_papers');
		}
		public function get_paper_completed_count($id){
			$this->db->where('paper_school_id', $id);
			$this->db->where('paper_status', 1);
			return $this->db->count_all_results('ci_final_papers');
		}
		public function get_paper_incompleted_count($id){
			$this->db->where('paper_school_id', $id);
			$this->db->where('paper_status', 0);
			return $this->db->count_all_results('ci_final_papers');
		}
	}

?>
