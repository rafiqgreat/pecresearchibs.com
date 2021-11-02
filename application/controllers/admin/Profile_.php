<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
	
	public function __construct(){
		
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Profile_model', 'Profile_model');
	}

	//-------------------------------------------------------------------------
	public function index(){

		if($this->input->post('submit')){
			$data = array(
				'username' => $this->input->post('username'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no'),
				'updated_at' => date('Y-m-d h:i:s'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->profile_model->update_user($data);
			if($result){
				$this->session->set_flashdata('success', 'Profile has been Updated Successfully!');
				redirect(base_url('admin/profile'), 'refresh');
			}
		}
		else{

			$data['title'] = 'Admin Profile';
			$data['admin'] = $this->Profile_model->get_user_detail();
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/profile/index', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	//-------------------------------------------------------------------------
	public function change_pwd(){

		$id = $this->session->userdata('admin_id');

		if($this->input->post('submit')){

			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/profile/change_pwd'),'refresh');
			}
			else{

				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->change_pwd($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Password has been changed successfully!');
					redirect(base_url('admin/profile/change_pwd'));
				}
			}
		}
		else{
			
			$data['title'] = 'Change Password';
			$data['user'] = $this->Profile_model->get_user_detail();
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/profile/change_pwd', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function change_pwd_school(){

		$id = $this->session->userdata('admin_id');

		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username/EMIS required', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/profile/change_pwd'),'refresh');
			}
			else{
				$userid = $this->input->post('username');
				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->change_pwd_school($data, $userid);
				if($result){
					$this->session->set_flashdata('success', 'School Password has been changed successfully!');
					redirect(base_url('admin/profile/change_pwd_school'));
				}
			}
		}
		else{
			
			$data['title'] = 'Change School Password';
			$data['user'] = $this->profile_model->get_user_detail();
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/profile/change_pwd_school', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	public function profile_edit( $id = 0 ) 
	{
		if($this->session->userdata('role_id')==3)
		{
			if ( $this->input->post( 'submit' ) ) 
			{
				//echo '<PRE>';
				//print_r($_REQUEST);
				//die();
				$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
				$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
				$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_fathername', 'Fathername', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_dob', 'Date of Birth', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_gender', 'Gender', 'trim|required' );
				$this->form_validation->set_rules( 'mobile_no', 'Mobile Number', 'trim|required' );
				$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_cnic', 'CNIC Number', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_designation', 'Username', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_posting', 'Place of Posting', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_subject', 'Subject', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_deptttype', 'Department', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_publictype', 'Public School Type', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_area', 'Area', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_tehsil', 'Tehsil', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_district', 'District', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_iw_picture', 'Picture', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_iw_cniccopy', 'CNIC Copy', 'trim|required' );
				
				if ( $this->form_validation->run() == FALSE ) {
					$data[ 'itemwriters' ] = $this->Profile_model->get_itemswriter_by_id( $id );
					$data[ 'view' ] = 'admin/profile/profile_edit';
					$this->load->view( 'layout', $data );
				} else {
					$passwords = ($this->input->post( 'password' )!="")?password_hash($this->input->post( 'password' ), PASSWORD_BCRYPT):$this->input->post( 'old_password' );
					$data = array(
						'ci_iw_password' => $passwords,
						'ci_iw_fname' => $this->input->post( 'firstname' ),
						'ci_iw_lname' => $this->input->post( 'lastname' ),
						'ci_iw_dob' => $this->input->post( 'ci_iw_dob' ),
						'ci_iw_mobile' => $this->input->post( 'mobile_no' ),
						'ci_iw_email' => $this->input->post( 'email' ),
						'ci_iw_subject' => $this->input->post( 'ci_iw_subject' ),
						'ci_iw_posting' => $this->input->post( 'ci_iw_posting' ),
						'ci_iw_district' => $this->input->post( 'ci_iw_district' ),
						'ci_iw_tehsil' => $this->input->post( 'ci_iw_tehsil' ),
						'ci_iw_designation' => $this->input->post( 'ci_iw_designation' ),
						'ci_iw_gender' => $this->input->post( 'ci_iw_gender' ),
						'ci_iw_area' => $this->input->post( 'ci_iw_area' ),
						'ci_iw_deptttype' => $this->input->post( 'ci_iw_deptttype' ),
						'ci_iw_publictype' => $this->input->post( 'ci_iw_publictype' ),
						'ci_iw_status' => $this->input->post( 'ci_iw_status' ),
						'ci_iw_fathername' => $this->input->post( 'ci_iw_fathername' ),
						'ci_iw_updated' => date( 'Y-m-d h:i:s' )
					);
					
					$admin_id = $this->input->post( 'admin_id' );
					$ci_iw_id =  $this->input->post( 'ci_iw_id' );
					if($admin_id == "")
					{
						$this->session->set_flashdata( 'error', 'Restricted Area!' );
						redirect(base_url('admin/auth/login'));
					}
	
					$data_admin = array(
						//'admin_role_id' => '3',
						'firstname' => $this->input->post( 'firstname' ),
						'lastname' => $this->input->post( 'lastname' ),
						'email' => $this->input->post( 'email' ),
						'address' => $this->input->post( 'ci_iw_posting' ),
						'mobile_no' => $this->input->post( 'mobile_no' ),
						'password' => $passwords,
						'updated_at' => date( 'Y-m-d h:i:s' ),
					);
					////////////////////////////////////////////////////////////////////////////
					$ci_iw_picture = $this->input->post('ci_iw_picture');
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['ci_iw_picture']['name']))
					{
						$result = $this->functions->file_insert($path, 'ci_iw_picture', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_iw_picture'] = $path.$result['msg'];
							$data_admin['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}
					/////////////////////////////////////////////////////////////////////////////
					$ci_iw_cniccopy = $this->input->post('ci_iw_cniccopy');
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['ci_iw_cniccopy']['name']))
					{
						$result = $this->functions->file_insert($path, 'ci_iw_cniccopy', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_iw_cniccopy'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}
					/////////////////////////////////////////////////////////////////////////////
					//$data_admin = $this->security->xss_clean( $data_admin );
					//echo '<PRE>';
					//print_r($data_admin);
					//echo '<hr>';
					//print_r($data);
					//die();
					$result_admin = $this->Profile_model->edit_iw_tbladmin($admin_id, $data_admin);
					//$data = $this->security->xss_clean( $data );
					if($this->session->userdata('role_id')==3)
					{
						$result = $this->Profile_model->itemwriters_edit( $data, $ci_iw_id );
					}
					if ( $result ) {
						$this->session->set_flashdata( 'success', 'Profile has been updated successfully!' );
						redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
					}
				}
			} 
			else {
				$data['title'] = 'Edit Profile';
				$data['profileinfo'] = $this->Profile_model->get_itemswriter_by_id( $id );
				$data['districts'] = $this->Profile_model->get_all_districts();
				$data['tehsils'] = $this->Profile_model->get_all_tehsils();
				$this->load->view( 'admin/includes/_header', $data );
				$this->load->view( 'admin/profile/profile_edit', $data );
				$this->load->view( 'admin/includes/_footer' );
			}
		}
		else
		{
			die('Under Development');
		}
	}
	//---------------------------------------------------------------
	public function delete_cniccopy($id = 0){
		$data = array('ci_iw_cniccopy' => '');
		$this->db->where('ci_iw_id', $id);        
		$this->db->update('ci_itemwriter', $data);
		$data['info'] = $this->Profile_model->get_iw_by_id( $id );
		$id_iw =$data['info'][0]['ci_iw_adminid'];
		$this->session->set_flashdata('success', 'CNIC has been deleted successfully!');
		redirect(base_url('admin/profile/profile_edit/'.$id_iw));
	}
	//------------------------------------------------------------
	public function delete_picture($id = 0){
		$data = array('ci_iw_picture' => '');
		$this->db->where('ci_iw_id', $id);        
		$this->db->update('ci_itemwriter', $data);
		$data['info'] = $this->Profile_model->get_iw_by_id( $id );
		$id_iw =$data['info'][0]['ci_iw_adminid'];
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/profile/profile_edit/'.$id_iw));
	}
}

?>	