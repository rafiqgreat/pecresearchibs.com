<?php defined('BASEPATH') OR exit('No direct script access allowed');
class School extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check_school(); // check login auth
		$this->load->model('school/School_model', 'School_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Schools List';
		$this->load->view('school/includes/_header', $data);
		$this->load->view('school/school/school_listp');
		$this->load->view('school/includes/_footer');
	}
	
	
	public function datatable_json(){				   					   
		$records = $this->School_model->get_all_schools();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['school_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['school_type'],
				$row['school_body'],
				$row['school_emis'],
				$row['school_name'],
				$row['school_address'],
				$row['district_code'],
				$row['school_tehsil'],
				
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['school_id'].'" 
				id="cb_'.$row['school_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['school_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/school/edit/'.$row['school_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/school/edit/'.$row['school_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/school/delete/".$row['school_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	}
?>