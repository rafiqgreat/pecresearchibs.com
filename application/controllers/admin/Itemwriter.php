<?php
//For Registration of Itemwriter without login 
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Itemwriter extends MY_Controller {
	
	public
	function __construct() {
		parent::__construct();
		//auth_check(); // check login auth
		$this->load->model( 'admin/Itemwriter_model', 'Itemwriter_model' );
		$this->load->library( 'datatable' ); // loaded my custom serverside datatable library
	}

	public
	function add() {
		if ( $this->input->post( 'submit' ) ) {
			//echo '<PRE>';
			//print_r($_REQUEST);
			//die();
			$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'fathername', 'Fathers Name', 'trim|required' );
			$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'dob', 'Date of Birth', 'trim|required' );
			$this->form_validation->set_rules( 'gender', 'Gender', 'trim|required' );
			$this->form_validation->set_rules( 'mobilenumber', 'Mobile Number', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );
			$this->form_validation->set_rules( 'cnic', 'CNIC Number', 'trim|required' );
			$this->form_validation->set_rules( 'designation', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'placeofposting', 'Place of Posting', 'trim|required' );
			$this->form_validation->set_rules( 'subject', 'Subject', 'trim|required' );
			$this->form_validation->set_rules( 'department', 'Department', 'trim|required' );
			$this->form_validation->set_rules( 'publictype', 'Public School Type', 'trim|required' );
			$this->form_validation->set_rules( 'area', 'Area', 'trim|required' );
			$this->form_validation->set_rules( 'tehsil', 'Tehsil', 'trim|required' );
			$this->form_validation->set_rules( 'district', 'District', 'trim|required' );
			
			if ( $this->form_validation->run() == FALSE ) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata( 'errors', $data[ 'errors' ] );
				redirect( base_url( 'admin/itemwriter/add' ), 'refresh' );
			} else {
				$data = [
					'ci_iw_username' => $this->input->post( 'username' ),
					'ci_iw_password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
					'ci_iw_fname' => $this->input->post( 'firstname' ),
					'ci_iw_lname' => $this->input->post( 'lastname' ),
					'ci_iw_dob' => $this->input->post( 'dob' ),
					'ci_iw_gender' => $this->input->post( 'gender' ),
					'ci_iw_mobile' => $this->input->post( 'mobilenumber' ),
					'ci_iw_email' => $this->input->post( 'email' ),
					'ci_iw_cnic' => $this->input->post( 'cnic' ),
					'ci_iw_designation' => $this->input->post( 'designation' ),
					'ci_iw_posting' => $this->input->post( 'placeofposting' ),
					'ci_iw_subject' => $this->input->post( 'subject' ),
					'ci_iw_deptttype' => $this->input->post( 'department' ),
					'ci_iw_publictype' => $this->input->post( 'publictype' ),
					'ci_iw_area' => $this->input->post( 'area' ),
					'ci_iw_tehsil' => $this->input->post( 'tehsil' ),
					'ci_iw_district' => $this->input->post( 'district' ),
					'ci_iw_picture' => $this->input->post( 'picture' ),
					'ci_iw_cniccopy' => $this->input->post( 'cniccopy' ),
					'ci_iw_fathername' => $this->input->post( 'fathername' ),
					'ci_iw_status' => '0',
					'ci_iw_created' => date( 'Y-m-d h:i:s' ),
					'ci_iw_updated' => date( 'Y-m-d h:i:s' ),
				];
				/////////////////////////////////////////////////////
				$path="assets/img/itemwriter/";
				if(!empty($_FILES['cniccopy']['name']))
				{
					$result = $this->functions->file_insert($path, 'cniccopy', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_iw_cniccopy'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemwriter/add'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				$path="assets/img/itemwriter/";
				if(!empty($_FILES['picture']['name']))
				{
					$result = $this->functions->file_insert($path, 'picture', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_iw_picture'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemwriter/add'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				$data = $this->security->xss_clean( $data );
				//echo '<PRE>';
				//print_r($data);
				//die('ye data hai');				
				$result = $this->Itemwriter_model->add_itemwriter( $data );
				if ( $result ) {
					//die($this->db->last_query());
					$this->session->set_flashdata( 'success', 'Registered successfully!' );
					redirect( base_url('admin/auth/login'));
					//redirect( base_url( 'admin/itemwriter/add' ) );
				}
			}
		} else {
			$data[ 'title' ] = 'Add Itemwriter';
			$data['districts'] = $this->Itemwriter_model->get_all_districts();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/itemwriter/itemwriter_add' );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-------------------------------------------------------------------------------------------------
	public function tehsil_by_district()
			{
				echo json_encode($this->Itemwriter_model->get_tehsil_by_district($this->input->post('district_id')));
			}
	//-------------------------------------------------------------------------------------------------
	public
	function username_exist() {
		$username = $this->input->post( 'username' );
		$exists = $this->Itemwriter_model->username_exist( $username );
		echo count( $exists );
	}
	public
	function cnic_exist() {
		$cnic = $this->input->post( 'cnic' );
		$exists = $this->Itemwriter_model->cnic_exist( $cnic );
		echo count( $exists );
	}
}
?>