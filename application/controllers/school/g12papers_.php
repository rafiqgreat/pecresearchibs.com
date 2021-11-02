<?php defined('BASEPATH') OR exit('No direct script access allowed');

class G12papers extends My_Controller {

	public function __construct(){
		parent::__construct();
		auth_check_school(); // check login auth
		$this->load->model('school/G12_papers_model', 'G12_papers_model');
	}

	//--------------------------------------------------------------------------
	public function index(){
		die('im here');
		$data['all_subjects'] = $this->G12_papers_model->get_all_subjects();
		$data['sub_isl'] = $this->G12_papers_model->get_sub_isl();
		$data['title'] = 'Grade I & II generated papers';
		$this->load->view('school/includes/_header');
    	$this->load->view('school/paper_g12/g12paperlist', $data);
    	$this->load->view('school/includes/_footer');
	}
	
	public function download_paper($id){
		$paper = $this->G12_papers_model->get_paper_for_download($id);		
		$data = array(
					'log_school_id' =>$this->session->userdata('school_id'),
					'log_dn_id' => $paper[0]->dn_id
				);
		$log = $this->G12_papers_model->add_log($data);
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename(base_url($paper[0]->dn_pdflink)) . "\""); 
		readfile(base_url($paper[0]->dn_pdflink)); 		    	
	}
}
?>	