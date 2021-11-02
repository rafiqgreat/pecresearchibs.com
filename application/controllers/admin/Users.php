<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Users extends MY_Controller {

	public
	function __construct() {

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model( 'admin/user_model', 'user_model' );
		$this->load->library( 'datatable' ); // loaded my custom serverside datatable library
	}

	public
	function index() {

		$data[ 'title' ] = 'User List';

		$this->load->view( 'admin/includes/_header', $data );
		$this->load->view( 'admin/users/user_list' );
		$this->load->view( 'admin/includes/_footer' );
	}

	public
	function datatable_json() {
		$records = $this->user_model->get_all_users();
		$data = array();

		$i = 0;
		foreach ( $records[ 'data' ] as $row ) {
			$status = ( $row[ 'is_active' ] == 1 ) ? 'checked' : '';
			$data[] = array(
				++$i,
				$row[ 'username' ] . '(' . $row[ 'role_name' ] . ')',
				$row[ 'email' ],
				$row[ 'mobile_no' ],
				date_time( $row[ 'created_at' ] ),
				'<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row[ 'admin_id' ] . '" 
				id="cb_' . $row[ 'admin_id' ] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row[ 'admin_id' ] . '"></label>',

				'<a title="View" class="view btn btn-sm btn-info" href="' . base_url( 'admin/users/edit/' . $row[ 'admin_id' ] ) . '"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url( 'admin/users/edit/' . $row[ 'admin_id' ] ) . '"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/users/delete/" . $row[ 'admin_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records[ 'data' ] = $data;
		echo json_encode( $records );
	}

	//-----------------------------------------------------------
	public
	function change_status() {
		$this->user_model->change_status();
	}
	//---------------------------------------------------------------
	public
	function username_exist() {
		$username = $this->input->post( 'username' );
		$exists = $this->user_model->username_exist( $username );
		echo count( $exists );
	}
	//-----------------------------------------------------------
	public
	function add() {

		if ( $this->input->post( 'submit' ) ) {
			
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'firstname', 'Firstname', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Lastname', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|valid_email|required' );
			$this->form_validation->set_rules( 'mobile_no', 'Number', 'trim|required' );
			$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
			$this->form_validation->set_rules( 'admin_role_id', 'Admin Role ID', 'trim|required' );
			$this->form_validation->set_rules( 'is_active', 'User Status', 'trim|required' );

			if ( $this->form_validation->run() == FALSE ) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata( 'errors', $data[ 'errors' ] );
				redirect( base_url( 'admin/users/add' ), 'refresh' );
			} else {
				$data = [
					'username' => $this->input->post( 'username' ),
					'password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'mobile_no' => $this->input->post( 'mobile_no' ),
					'address' => $this->input->post( 'address' ),
					'is_active' => $this->input->post( 'is_active' ),
					'admin_role_id' => $this->input->post( 'admin_role_id' ),
					'parent_admin_id' => (($this->input->post('parent_admin_id')!="")?$this->input->post('parent_admin_id'):0),
					'created_at' => date( 'Y-m-d h:i:s' ),
					'updated_at' => date( 'Y-m-d h:i:s' ),
				];
				$subjectlist = NULL;
				if($this->input->post( 'subjects' )!= "")
				{
					foreach( $this->input->post( 'subjects' ) as $sub)
					{
						$subjectlist .= $sub.',';
					}				
					 $data['subjects_ids'] = rtrim($subjectlist, ',');					
				}				
			
				$data = $this->security->xss_clean( $data );				
				$result = $this->user_model->add_user( $data );
				if ( $result ) {
					//die($this->db->last_query());
					$this->session->set_flashdata( 'success', 'User has been added successfully!' );
					redirect( base_url( 'admin/users' ) );
				}
			}
		} else {

			$data[ 'title' ] = 'Add User';
			$data[ 'roles' ] = $this->user_model->get_all_roles();
			$data[ 'aes' ] = $this->user_model->get_all_aeusers();
			$data[ 'subjects' ] = $this->user_model->get_all_subjects_with_grades();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/users/user_add' );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-----------------------------------------------------------
	public
	function edit( $id = 0 ) {

		if ( $this->input->post( 'submit' ) ) 
		{
			$subjectlist=rtrim($subjectlist, ',');
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'firstname', 'Firstname', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Lastname', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|valid_email|required' );
			$this->form_validation->set_rules( 'mobile_no', 'Number', 'trim|required' );
			$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
			$this->form_validation->set_rules( 'admin_role_id', 'Admin Role ID', 'trim|required' );
			$this->form_validation->set_rules( 'is_active', 'User Status', 'trim|required' );

			if ( $this->form_validation->run() == FALSE ) {
				$data[ 'user' ] = $this->user_model->get_user_by_id( $id );
				$data[ 'view' ] = 'admin/users/user_edit';
				$this->load->view( 'layout', $data );
			} else {
				$data = array(
					'username' => $this->input->post( 'username' ),
					'password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'mobile_no' => $this->input->post( 'mobile_no' ),
					'address' => $this->input->post( 'address' ),
					'is_active' => $this->input->post( 'is_active' ),
					'admin_role_id' => $this->input->post( 'admin_role_id' ),
					'parent_admin_id' => (($this->input->post('parent_admin_id')=="")?$this->input->post('parent_admin_id'):0),
					'updated_at' => date( 'Y-m-d h:i:s' )
				);
				
				$subjectlist = NULL;
				if($this->input->post( 'subjects' )!= "")
				{
					foreach( $this->input->post( 'subjects' ) as $sub)
					{
						$subjectlist .= $sub.',';
					}														
					$subjectlist = rtrim($subjectlist, ',');
				}				
				$data['subjects_ids'] = $subjectlist;
				
				$data = $this->security->xss_clean( $data );
				$result = $this->user_model->edit_user( $data, $id );
				if ( $result ) {
					$this->session->set_flashdata( 'success', 'User has been updated successfully!' );
					redirect( base_url( 'admin/users' ) );
				}
			}
		} else {
			$data['title'] = 'Edit User';
			$data['user'] = $this->user_model->get_user_by_id( $id );
			$data['roles'] = $this->user_model->get_all_roles();
			$data[ 'aes' ] = $this->user_model->get_all_aeusers();
			$data[ 'subjects' ] = $this->user_model->get_all_subjects_with_grades();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/users/user_edit', $data );
			$this->load->view( 'admin/includes/_footer' );
		}
	}

	//-----------------------------------------------------------
	public
	function delete( $id = 0 ) {

		$this->db->delete( 'ci_admin', array( 'admin_id' => $id ) );
		$this->session->set_flashdata( 'success', 'Use has been deleted successfully!' );
		redirect( base_url( 'admin/users' ) );
	}

	//---------------------------------------------------------------
	//  Export Users PDF 
	public
	function create_users_pdf() {

		$this->load->helper( 'pdf_helper' ); // loaded pdf helper
		$data[ 'all_users' ] = $this->user_model->get_users_for_export();
		$this->load->view( 'admin/users/users_pdf', $data );
	}

	//---------------------------------------------------------------	
	// Export data in CSV format 
	public
	function export_csv() {

		// file name 
		$filename = 'users_' . date( 'Y-m-d' ) . '.csv';
		header( "Content-Description: File Transfer" );
		header( "Content-Disposition: attachment; filename=$filename" );
		header( "Content-Type: application/csv; " );

		// get data 
		$user_data = $this->user_model->get_users_for_export();

		// file creation 
		$file = fopen( 'php://output', 'w' );

		$header = array( "ID", "Username", "First Name", "Last Name", "Email", "Mobile_no", "Created Date" );

		fputcsv( $file, $header );
		foreach ( $user_data as $key => $line ) {
			fputcsv( $file, $line );
		}
		fclose( $file );
		exit;
	}


}


?>