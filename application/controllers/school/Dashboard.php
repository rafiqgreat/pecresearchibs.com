<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends My_Controller {
	public function __construct(){
		parent::__construct();
		auth_check_school(); // check login auth
		$this->load->model('school/dashboard_model', 'dashboard_model');
	}
	//--------------------------------------------------------------------------
	public function index(){
		
		$data['all_papers'] = $this->dashboard_model->get_all_paper_count($_SESSION['school_id']);
		$data['papers_comp'] = $this->dashboard_model->get_paper_completed_count($_SESSION['school_id']);
		$data['papers_incomp'] = $this->dashboard_model->get_paper_incompleted_count($_SESSION['school_id']);

		$data['title'] = 'School Dashboard - Paper Generation';
		$this->load->view('school/includes/_header');
    	$this->load->view('school/dashboard/index', $data);
    	$this->load->view('school/includes/_footer');
	}
}
?>	