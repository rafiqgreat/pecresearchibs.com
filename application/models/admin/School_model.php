<?php

	class School_model extends CI_Model{



		public function add_school($data){

			$this->db->insert('ci_schools', $data);

			return true;

		}



		//---------------------------------------------------

		// get all users for server-side datatable processing (ajax based)

		public function get_all_schools(){		

			$wh =array();

			//$SQL ='SELECT * FROM ci_schools LEFT JOIN ci_districts ON district_id = school_district_id LEFT JOIN ci_admin ON admin_id = school_createdby';

			$SQL ='SELECT ci_schools.*, ci_admin.username AS aname, ci_districts.district_name_en, ci_tehsil.tehsil_name_en  FROM ci_schools LEFT JOIN ci_districts ON district_id = school_district_id LEFT JOIN ci_tehsil ON tehsil_id = school_tehsil_id LEFT JOIN ci_admin ON admin_id = school_createdby';				

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

		

		public function get_all_districts()

		{	

			$this->db->select('district_id, district_name_en')

					 ->from('ci_districts')					 

					 ->where('district_status', 1);

			$query = $this->db->get();

			return $result = $query->result_array();

		}

		

		public function get_all_tehsils()

		{	

			$this->db->select('tehsil_id, tehsil_name_en')

					 ->from('ci_tehsil')					 

					 ->where('tehsil_status', 1);

			$query = $this->db->get();

			return $result = $query->result_array();

			//$result = $query->result_array();

			//print_r($result);

			//die();

		}

		

		public function get_school_by_id($id){

			$query = $this->db->get_where('ci_schools', array('school_id' => $id));

			return $result = $query->row_array();

		}

				

		function change_status()

		{		

			$this->db->set('school_status', $this->input->post('school_status'));

			$this->db->where('school_id', $this->input->post('school_id'));

			$this->db->update('ci_schools');

		} 

		

		

		

		public function edit_school($data, $id){

			$this->db->where('school_id', $id);

			$this->db->update('ci_schools', $data);

			return true;

		}

		

		public function get_school_for_export(){			

			$this->db->select('*')

					 ->from('ci_schools')

					 ->join('ci_districts', 'district_id= school_district_id')

					 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id');

			$query = $this->db->get();

			return $result = $query->result_array();

		}

		

		public function get_school_csv_export(){

						//array("ID", "UserName", "School Deptt.", "Type", "Name", "Address", "District", "Tehsil", "Level", "Gender", "Email", "Phone", "Location", "Status")			

			$this->db->select('school_id, username, school_department, school_type, school_name, school_address, school_district_id, school_tehsil_id, school_level, school_gender, school_email, school_phone, school_location,IF(school_status=1,\'Active\',\'Inactive\')')

					 ->from('ci_schools')

					 ->join('ci_districts', 'district_id= school_district_id');

			$query = $this->db->get();

			return $result = $query->result_array();

		}

		

		function get_tehsil_by_district($district_id)

		{

			$this->db->select('tehsil_id, tehsil_name_en, tehsil_name_ur')

					 ->from('ci_tehsil')

					 ->where('tehsil_district_id', $district_id)

					 ->where('tehsil_status', 1);					 

			$query = $this->db->get();			

			return $query->result_array();

		}

		

	}

?>