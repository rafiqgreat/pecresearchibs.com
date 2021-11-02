<?php
	class G12_papers_model extends CI_Model{

		public function get_all_subjects(){
			$this->db->select('*')
				 ->from('ci_downloads')	
				 ->join('ci_subjects', 'subject_id = dn_subject_id', 'left')
				 ->where('dn_status', 1);		 
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_sub_isl(){
			$this->db->select('*')
				 ->from('ci_downloads')	
				 ->join('ci_subjects', 'subject_id = dn_subject_id', 'left')
				 ->like('dn_title', 'Islamiat');		 
			$query = $this->db->get();
			$result = $query->result_array();
			return $result = $query->result_array();
		}
		
		public function get_paper_for_download($id){
			$this->db->select('*')
				 ->from('ci_downloads')	
				 ->where('dn_id', $id);
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		public function add_log($data){
			$this->db->insert('ci_school_logs', $data);
			return true;
		}
	}

?>
