<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Itemsbank extends MY_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Itemsbank_model', 'Itemsbank_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){
		$data['title'] = 'Itemsbank List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itemsbank_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){

		if($this->session->userdata('role_id')==1)
		{		
			$records = $this->Itemsbank_model->get_all_itemsbank();
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ib_verified'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['ib_title'],
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ib_year'],
				$row['ib_verified_dt'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['ib_id'].'" 
				id="cb_'.$row['ib_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['ib_id'].'"></label>',		

				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view/'.$row['ib_id']).'"> <i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
		}
		elseif($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsbank_model->get_all_itemsbank_IE($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ib_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['ib_title'],
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ib_year'],
				$row['username'],
				$row['ib_created'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['ib_id'].'" 
				id="cb_'.$row['ib_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['ib_id'].'"></label>',		

				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view/'.$row['ib_id']).'"> <i class="fa fa-eye"></i></a>			
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemsbank/delete/".$row['ib_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
		}
		else
		{		
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsbank_model->get_all_itemsbank_IW($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ib_verified'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['ib_title'],
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ib_year'],
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view/'.$row['ib_id']).'"> <i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
		}	
							   
	}
	
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Items_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function add()
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('------------------add------------------');
				$this->form_validation->set_rules('ib_title', 'Title', 'trim|required');				
				$this->form_validation->set_rules('ib_created', 'Date', 'trim|required');				
				$this->form_validation->set_rules('ib_year', 'Year', 'trim|required');				
				$this->form_validation->set_rules('ib_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('ib_subject_id', 'Subject', 'trim|required');
				
				$this->form_validation->set_rules('ib_b1_item1', 'Item Code 1', 'trim|required');
/*				$this->form_validation->set_rules('ib_b1_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b1_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b1_item4', 'Item Code', 'trim|required');
*/								
				$this->form_validation->set_rules('ib_b2_item1', 'Item Code 2', 'trim|required');
/*
				$this->form_validation->set_rules('ib_b2_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b2_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b2_item4', 'Item Code', 'trim|required');
*/				
				$this->form_validation->set_rules('ib_b3_item1', 'Item Code 3', 'trim|required');
/*				
				$this->form_validation->set_rules('ib_b3_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b3_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b3_item4', 'Item Code', 'trim|required');
*/				

				$this->form_validation->set_rules('ib_b4_item1', 'Item Code 4', 'trim|required');
/*				$this->form_validation->set_rules('ib_b4_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b4_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b4_item4', 'Item Code', 'trim|required');
*/				
				$this->form_validation->set_rules('ib_b5_item1', 'Item Code 5', 'trim|required');
/*				$this->form_validation->set_rules('ib_b5_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b5_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b5_item4', 'Item Code', 'trim|required');
*/				
				$this->form_validation->set_rules('ib_b6_item1', 'Item Code 6', 'trim|required');
				
				$this->form_validation->set_rules('ib_b7_item1', 'Item Code 7', 'trim|required');
				
				$this->form_validation->set_rules('ib_b8_item1', 'Item Code 8', 'trim|required');
				
				$this->form_validation->set_rules('ib_b9_item1', 'Item Code 9', 'trim|required');
				
				$this->form_validation->set_rules('ib_b10_item1', 'Item Code 10', 'trim|required');
				
				$this->form_validation->set_rules('ib_b11_item1', 'Item Code 11', 'trim|required');
				
				$this->form_validation->set_rules('ib_b12_item1', 'Item Code 12', 'trim|required');
				
				$this->form_validation->set_rules('ib_b13_item1', 'Item Code 13', 'trim|required');
				
				$this->form_validation->set_rules('ib_b14_item1', 'Item Code 14', 'trim|required');
				
				$this->form_validation->set_rules('ib_b15_item1', 'Item Code 15', 'trim|required');
				
				/* $this->form_validation->set_rules('ib_b16_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b16_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b16_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b16_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b17_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b17_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b17_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b17_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b18_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b18_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b18_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b18_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b19_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b19_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b19_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b19_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b20_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b20_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b20_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b20_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b21_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b21_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b21_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b21_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b22_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b22_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b22_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b22_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b23_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b23_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b23_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b23_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b24_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b24_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b24_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b24_item4', 'Item Code', 'trim|required');
				
				$this->form_validation->set_rules('ib_b25_item1', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b25_item2', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b25_item3', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('ib_b25_item4', 'Item Code', 'trim|required');
 */			
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/itemsbank/add'),'refresh');
			}
			else{
				$data = array(
					'ib_title' => $this->input->post('ib_title'),
					'ib_created' => $this->input->post('ib_created'),
					'ib_year' => $this->input->post('ib_year'),
					'ib_grade_id' => $this->input->post('ib_grade_id'),
					'ib_subject_id' =>$this->input->post('ib_subject_id'),
					'ib_createdby' => $this->session->userdata('admin_id'),							
					
					'ib_b1_item1' => $this->input->post('ib_b1_item1'),
					'ib_b1_item2' => $this->input->post('ib_b1_item2'),
					'ib_b1_item3' => $this->input->post('ib_b1_item3'),
					'ib_b1_item4' => $this->input->post('ib_b1_item4'),
					
					'ib_b2_item1' => $this->input->post('ib_b2_item1'),
					'ib_b2_item2' => $this->input->post('ib_b2_item2'),
					'ib_b2_item3' => $this->input->post('ib_b2_item3'),
					'ib_b2_item4' => $this->input->post('ib_b2_item4'),
					
					'ib_b3_item1' => $this->input->post('ib_b3_item1'),
					'ib_b3_item2' => $this->input->post('ib_b3_item2'),
					'ib_b3_item3' => $this->input->post('ib_b3_item3'),
					'ib_b3_item4' => $this->input->post('ib_b3_item4'),
					
					'ib_b4_item1' => $this->input->post('ib_b4_item1'),
					'ib_b4_item2' => $this->input->post('ib_b4_item2'),
					'ib_b4_item3' => $this->input->post('ib_b4_item3'),
					'ib_b4_item4' => $this->input->post('ib_b4_item4'),
					
					'ib_b5_item1' => $this->input->post('ib_b5_item1'),
					'ib_b5_item2' => $this->input->post('ib_b5_item2'),
					'ib_b5_item3' => $this->input->post('ib_b5_item3'),
					'ib_b5_item4' => $this->input->post('ib_b5_item4'),
					
					'ib_b6_item1' => $this->input->post('ib_b6_item1'),
					'ib_b6_item2' => $this->input->post('ib_b6_item2'),
					'ib_b6_item3' => $this->input->post('ib_b6_item3'),
					'ib_b6_item4' => $this->input->post('ib_b6_item4'),
					
					'ib_b7_item1' => $this->input->post('ib_b7_item1'),
					'ib_b7_item2' => $this->input->post('ib_b7_item2'),
					'ib_b7_item3' => $this->input->post('ib_b7_item3'),
					'ib_b7_item4' => $this->input->post('ib_b7_item4'),
					
					'ib_b8_item1' => $this->input->post('ib_b8_item1'),
					'ib_b8_item2' => $this->input->post('ib_b8_item2'),
					'ib_b8_item3' => $this->input->post('ib_b8_item3'),
					'ib_b8_item4' => $this->input->post('ib_b8_item4'),
					
					'ib_b9_item1' => $this->input->post('ib_b9_item1'),
					'ib_b9_item2' => $this->input->post('ib_b9_item2'),
					'ib_b9_item3' => $this->input->post('ib_b9_item3'),
					'ib_b9_item4' => $this->input->post('ib_b9_item4'),
					
					'ib_b10_item1' => $this->input->post('ib_b10_item1'),
					'ib_b10_item2' => $this->input->post('ib_b10_item2'),
					'ib_b10_item3' => $this->input->post('ib_b10_item3'),
					'ib_b10_item4' => $this->input->post('ib_b10_item4'),
					
					'ib_b11_item1' => $this->input->post('ib_b11_item1'),
					'ib_b11_item2' => $this->input->post('ib_b11_item2'),
					'ib_b11_item3' => $this->input->post('ib_b11_item3'),
					'ib_b11_item4' => $this->input->post('ib_b11_item4'),
					
					'ib_b12_item1' => $this->input->post('ib_b12_item1'),
					'ib_b12_item2' => $this->input->post('ib_b12_item2'),
					'ib_b12_item3' => $this->input->post('ib_b12_item3'),
					'ib_b12_item4' => $this->input->post('ib_b12_item4'),
					
					'ib_b13_item1' => $this->input->post('ib_b13_item1'),
					'ib_b13_item2' => $this->input->post('ib_b13_item2'),
					'ib_b13_item3' => $this->input->post('ib_b13_item3'),
					'ib_b13_item4' => $this->input->post('ib_b13_item4'),
					
					'ib_b14_item1' => $this->input->post('ib_b14_item1'),
					'ib_b14_item2' => $this->input->post('ib_b14_item2'),
					'ib_b14_item3' => $this->input->post('ib_b14_item3'),
					'ib_b14_item4' => $this->input->post('ib_b14_item4'),
					
					'ib_b15_item1' => $this->input->post('ib_b15_item1'),
					'ib_b15_item2' => $this->input->post('ib_b15_item2'),
					'ib_b15_item3' => $this->input->post('ib_b15_item3'),
					'ib_b15_item4' => $this->input->post('ib_b15_item4'),
					
					'ib_b16_item1' => $this->input->post('ib_b16_item1'),
					'ib_b16_item2' => $this->input->post('ib_b16_item2'),
					'ib_b16_item3' => $this->input->post('ib_b16_item3'),
					'ib_b16_item4' => $this->input->post('ib_b16_item4'),
					
					'ib_b17_item1' => $this->input->post('ib_b17_item1'),
					'ib_b17_item2' => $this->input->post('ib_b17_item2'),
					'ib_b17_item3' => $this->input->post('ib_b17_item3'),
					'ib_b17_item4' => $this->input->post('ib_b17_item4'),
					
					'ib_b18_item1' => $this->input->post('ib_b18_item1'),
					'ib_b18_item2' => $this->input->post('ib_b18_item2'),
					'ib_b18_item3' => $this->input->post('ib_b18_item3'),
					'ib_b18_item4' => $this->input->post('ib_b18_item4'),
					
					'ib_b19_item1' => $this->input->post('ib_b19_item1'),
					'ib_b19_item2' => $this->input->post('ib_b19_item2'),
					'ib_b19_item3' => $this->input->post('ib_b19_item3'),
					'ib_b19_item4' => $this->input->post('ib_b19_item4'),
					
					'ib_b20_item1' => $this->input->post('ib_b20_item1'),
					'ib_b20_item2' => $this->input->post('ib_b20_item2'),
					'ib_b20_item3' => $this->input->post('ib_b20_item3'),
					'ib_b20_item4' => $this->input->post('ib_b20_item4'),
					
					'ib_b21_item1' => $this->input->post('ib_b21_item1'),
					'ib_b21_item2' => $this->input->post('ib_b21_item2'),
					'ib_b21_item3' => $this->input->post('ib_b21_item3'),
					'ib_b21_item4' => $this->input->post('ib_b21_item4'),
					
					'ib_b22_item1' => $this->input->post('ib_b22_item1'),
					'ib_b22_item2' => $this->input->post('ib_b22_item2'),
					'ib_b22_item3' => $this->input->post('ib_b22_item3'),
					'ib_b22_item4' => $this->input->post('ib_b22_item4'),
					
					'ib_b23_item1' => $this->input->post('ib_b23_item1'),
					'ib_b23_item2' => $this->input->post('ib_b23_item2'),
					'ib_b23_item3' => $this->input->post('ib_b23_item3'),
					'ib_b23_item4' => $this->input->post('ib_b23_item4'),
					
					'ib_b24_item1' => $this->input->post('ib_b24_item1'),
					'ib_b24_item2' => $this->input->post('ib_b24_item2'),
					'ib_b24_item3' => $this->input->post('ib_b24_item3'),
					'ib_b24_item4' => $this->input->post('ib_b24_item4'),
					
					'ib_b25_item1' => $this->input->post('ib_b25_item1'),
					'ib_b25_item2' => $this->input->post('ib_b25_item2'),
					'ib_b25_item3' => $this->input->post('ib_b25_item3'),
					'ib_b25_item4' => $this->input->post('ib_b25_item4'),
				);
				
				//print_r($data);
				//die();
				
				$data = $this->security->xss_clean($data);
				$result = $this->Itemsbank_model->add_itemsbank($data);
				//die($this->db->last_query());
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been added successfully!');
					redirect(base_url('admin/itemsbank'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Generate Items Bank';
			$data['grades'] = $this->Itemsbank_model->get_all_grades();
				
			$data['added_subjects'] = $this->Itemsbank_model->get_all_added_subjects();				
			
			
			//echo '<PRE>';
			//print_r($records[0]);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/itemsbank_add');
			$this->load->view('admin/includes/_footer');
		}
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function edit($id = 0)
	{
		if($this->input->post('submit')){
			//echo "Under Development";
			//die();
			$this->form_validation->set_rules('ib_title', 'Title', 'trim|required');				
			$this->form_validation->set_rules('ib_created', 'Date', 'trim|required');				
			$this->form_validation->set_rules('ib_year', 'Year', 'trim|required');				
			$this->form_validation->set_rules('ib_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('ib_subject_id', 'Subject', 'trim|required');
			
			$this->form_validation->set_rules('ib_b1_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b1_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b1_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b1_item4', 'Item Code', 'trim|required');
							
			$this->form_validation->set_rules('ib_b2_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b2_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b2_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b2_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b3_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b3_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b3_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b3_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b4_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b4_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b4_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b4_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b5_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b5_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b5_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b5_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b6_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b6_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b6_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b6_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b7_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b7_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b7_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b7_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b8_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b8_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b8_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b8_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b9_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b9_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b9_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b9_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b10_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b10_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b10_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b10_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b11_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b11_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b11_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b11_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b12_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b12_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b12_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b12_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b13_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b13_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b13_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b13_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b14_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b14_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b14_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b14_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b15_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b15_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b15_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b15_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b16_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b16_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b16_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b16_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b17_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b17_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b17_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b17_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b18_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b18_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b18_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b18_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b19_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b19_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b19_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b19_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b20_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b20_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b20_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b20_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b21_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b21_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b21_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b21_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b22_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b22_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b22_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b22_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b23_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b23_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b23_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b23_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b24_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b24_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b24_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b24_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b25_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b25_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b25_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b25_item4', 'Item Code', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['itemsbank'] = $this->Itemsbank_model->get_itemsbank_by_id($id);
				$data['view'] = 'admin/itemsbank/itemsbank_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'ib_title' => $this->input->post('ib_title'),
					'ib_created' => $this->input->post('ib_created'),
					'ib_year' => $this->input->post('ib_year'),
					'ib_grade_id' => $this->input->post('ib_grade_id'),
					'ib_subject_id' =>$this->input->post('ib_subject_id'),
					'ib_createdby' => $this->session->userdata('admin_id'),							
					
					'ib_b1_item1' => $this->input->post('ib_b1_item1'),
					'ib_b1_item2' => $this->input->post('ib_b1_item2'),
					'ib_b1_item3' => $this->input->post('ib_b1_item3'),
					'ib_b1_item4' => $this->input->post('ib_b1_item4'),
					
					'ib_b2_item1' => $this->input->post('ib_b2_item1'),
					'ib_b2_item2' => $this->input->post('ib_b2_item2'),
					'ib_b2_item3' => $this->input->post('ib_b2_item3'),
					'ib_b2_item4' => $this->input->post('ib_b2_item4'),
					
					'ib_b3_item1' => $this->input->post('ib_b3_item1'),
					'ib_b3_item2' => $this->input->post('ib_b3_item2'),
					'ib_b3_item3' => $this->input->post('ib_b3_item3'),
					'ib_b3_item4' => $this->input->post('ib_b3_item4'),
					
					'ib_b4_item1' => $this->input->post('ib_b4_item1'),
					'ib_b4_item2' => $this->input->post('ib_b4_item2'),
					'ib_b4_item3' => $this->input->post('ib_b4_item3'),
					'ib_b4_item4' => $this->input->post('ib_b4_item4'),
					
					'ib_b5_item1' => $this->input->post('ib_b5_item1'),
					'ib_b5_item2' => $this->input->post('ib_b5_item2'),
					'ib_b5_item3' => $this->input->post('ib_b5_item3'),
					'ib_b5_item4' => $this->input->post('ib_b5_item4'),
					
					'ib_b6_item1' => $this->input->post('ib_b6_item1'),
					'ib_b6_item2' => $this->input->post('ib_b6_item2'),
					'ib_b6_item3' => $this->input->post('ib_b6_item3'),
					'ib_b6_item4' => $this->input->post('ib_b6_item4'),
					
					'ib_b7_item1' => $this->input->post('ib_b7_item1'),
					'ib_b7_item2' => $this->input->post('ib_b7_item2'),
					'ib_b7_item3' => $this->input->post('ib_b7_item3'),
					'ib_b7_item4' => $this->input->post('ib_b7_item4'),
					
					'ib_b8_item1' => $this->input->post('ib_b8_item1'),
					'ib_b8_item2' => $this->input->post('ib_b8_item2'),
					'ib_b8_item3' => $this->input->post('ib_b8_item3'),
					'ib_b8_item4' => $this->input->post('ib_b8_item4'),
					
					'ib_b9_item1' => $this->input->post('ib_b9_item1'),
					'ib_b9_item2' => $this->input->post('ib_b9_item2'),
					'ib_b9_item3' => $this->input->post('ib_b9_item3'),
					'ib_b9_item4' => $this->input->post('ib_b9_item4'),
					
					'ib_b10_item1' => $this->input->post('ib_b10_item1'),
					'ib_b10_item2' => $this->input->post('ib_b10_item2'),
					'ib_b10_item3' => $this->input->post('ib_b10_item3'),
					'ib_b10_item4' => $this->input->post('ib_b10_item4'),
					
					'ib_b11_item1' => $this->input->post('ib_b11_item1'),
					'ib_b11_item2' => $this->input->post('ib_b11_item2'),
					'ib_b11_item3' => $this->input->post('ib_b11_item3'),
					'ib_b11_item4' => $this->input->post('ib_b11_item4'),
					
					'ib_b12_item1' => $this->input->post('ib_b12_item1'),
					'ib_b12_item2' => $this->input->post('ib_b12_item2'),
					'ib_b12_item3' => $this->input->post('ib_b12_item3'),
					'ib_b12_item4' => $this->input->post('ib_b12_item4'),
					
					'ib_b13_item1' => $this->input->post('ib_b13_item1'),
					'ib_b13_item2' => $this->input->post('ib_b13_item2'),
					'ib_b13_item3' => $this->input->post('ib_b13_item3'),
					'ib_b13_item4' => $this->input->post('ib_b13_item4'),
					
					'ib_b14_item1' => $this->input->post('ib_b14_item1'),
					'ib_b14_item2' => $this->input->post('ib_b14_item2'),
					'ib_b14_item3' => $this->input->post('ib_b14_item3'),
					'ib_b14_item4' => $this->input->post('ib_b14_item4'),
					
					'ib_b15_item1' => $this->input->post('ib_b15_item1'),
					'ib_b15_item2' => $this->input->post('ib_b15_item2'),
					'ib_b15_item3' => $this->input->post('ib_b15_item3'),
					'ib_b15_item4' => $this->input->post('ib_b15_item4'),
					
					'ib_b16_item1' => $this->input->post('ib_b16_item1'),
					'ib_b16_item2' => $this->input->post('ib_b16_item2'),
					'ib_b16_item3' => $this->input->post('ib_b16_item3'),
					'ib_b16_item4' => $this->input->post('ib_b16_item4'),
					
					'ib_b17_item1' => $this->input->post('ib_b17_item1'),
					'ib_b17_item2' => $this->input->post('ib_b17_item2'),
					'ib_b17_item3' => $this->input->post('ib_b17_item3'),
					'ib_b17_item4' => $this->input->post('ib_b17_item4'),
					
					'ib_b18_item1' => $this->input->post('ib_b18_item1'),
					'ib_b18_item2' => $this->input->post('ib_b18_item2'),
					'ib_b18_item3' => $this->input->post('ib_b18_item3'),
					'ib_b18_item4' => $this->input->post('ib_b18_item4'),
					
					'ib_b19_item1' => $this->input->post('ib_b19_item1'),
					'ib_b19_item2' => $this->input->post('ib_b19_item2'),
					'ib_b19_item3' => $this->input->post('ib_b19_item3'),
					'ib_b19_item4' => $this->input->post('ib_b19_item4'),
					
					'ib_b20_item1' => $this->input->post('ib_b20_item1'),
					'ib_b20_item2' => $this->input->post('ib_b20_item2'),
					'ib_b20_item3' => $this->input->post('ib_b20_item3'),
					'ib_b20_item4' => $this->input->post('ib_b20_item4'),
					
					'ib_b21_item1' => $this->input->post('ib_b21_item1'),
					'ib_b21_item2' => $this->input->post('ib_b21_item2'),
					'ib_b21_item3' => $this->input->post('ib_b21_item3'),
					'ib_b21_item4' => $this->input->post('ib_b21_item4'),
					
					'ib_b22_item1' => $this->input->post('ib_b22_item1'),
					'ib_b22_item2' => $this->input->post('ib_b22_item2'),
					'ib_b22_item3' => $this->input->post('ib_b22_item3'),
					'ib_b22_item4' => $this->input->post('ib_b22_item4'),
					
					'ib_b23_item1' => $this->input->post('ib_b23_item1'),
					'ib_b23_item2' => $this->input->post('ib_b23_item2'),
					'ib_b23_item3' => $this->input->post('ib_b23_item3'),
					'ib_b23_item4' => $this->input->post('ib_b23_item4'),
					
					'ib_b24_item1' => $this->input->post('ib_b24_item1'),
					'ib_b24_item2' => $this->input->post('ib_b24_item2'),
					'ib_b24_item3' => $this->input->post('ib_b24_item3'),
					'ib_b24_item4' => $this->input->post('ib_b24_item4'),
					
					'ib_b25_item1' => $this->input->post('ib_b25_item1'),
					'ib_b25_item2' => $this->input->post('ib_b25_item2'),
					'ib_b25_item3' => $this->input->post('ib_b25_item3'),
					'ib_b25_item4' => $this->input->post('ib_b25_item4'),				
				);
				//echo '<hr />';
				//print_r($data);
				//die();
				
				$data = $this->security->xss_clean($data);
				$result = $this->Itemsbank_model->edit_itemsbank($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been updated successfully!');
					redirect(base_url('admin/itemsbank'));
				}
			}
		}
		else{
			$data['title'] = 'Edit ItemsBank';
			$data['grades'] = $this->Itemsbank_model->get_all_grades();
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Itemsbank_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Itemsbank_model->get_all_subjects();
			}
			$data['cstands'] = $this->Itemsbank_model->get_all_cstands();
			$data['subcstands'] = $this->Itemsbank_model->get_all_subcstands();
			$data['slos'] = $this->Itemsbank_model->get_all_slos();
			$data['itemsbank'] = $this->Itemsbank_model->get_itemsbank_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/itemsbank_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function change_status()
	{   
		$this->Itemsbank_model->change_status();
	}
	public function change_status_approve()
	{
		$this->Itemsbank_model->change_status_approve();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemsbank_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==3)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemsbank_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Itemsbank_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function cstands_by_subject()
	{
		echo json_encode($this->Itemsbank_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	public function all_items_by_subject()
	{
		echo json_encode($this->Itemsbank_model->all_items_by_subject($this->input->post('subject_id')));		
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Itemsbank_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function slos_by_subcstands()
	{
		echo json_encode($this->Itemsbank_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function item_by_slo()
	{
		echo json_encode($this->Itemsbank_model->get_item_by_slo($this->input->post('slo_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function view($id = 0)
	{
			//$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Itemsbank_model->get_all_grades();
			$data['itemsbank'] = $this->Itemsbank_model->get_itemsbank_by_id($id);
			
			$data['ib_b1_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item1);
			$data['ib_b1_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item2);
			$data['ib_b1_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item3);
			$data['ib_b1_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item4);
			
			$data['ib_b2_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item1);
			$data['ib_b2_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item2);
			$data['ib_b2_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item3);
			$data['ib_b2_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item4);

			$data['ib_b3_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item1);
			$data['ib_b3_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item2);
			$data['ib_b3_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item3);
			$data['ib_b3_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item4);

			$data['ib_b4_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item1);
			$data['ib_b4_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item2);
			$data['ib_b4_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item3);
			$data['ib_b4_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item4);

			$data['ib_b5_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item1);
			$data['ib_b5_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item2);
			$data['ib_b5_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item3);
			$data['ib_b5_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item4);

			$data['ib_b6_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item1);
			$data['ib_b6_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item2);
			$data['ib_b6_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item3);
			$data['ib_b6_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item4);

			$data['ib_b7_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item1);
			$data['ib_b7_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item2);
			$data['ib_b7_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item3);
			$data['ib_b7_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item4);

			$data['ib_b8_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item1);
			$data['ib_b8_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item2);
			$data['ib_b8_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item3);
			$data['ib_b8_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item4);

			$data['ib_b9_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item1);
			$data['ib_b9_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item2);
			$data['ib_b9_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item3);
			$data['ib_b9_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item4);

			$data['ib_b10_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item1);
			$data['ib_b10_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item2);
			$data['ib_b10_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item3);
			$data['ib_b10_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item4);

			$data['ib_b11_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item1);
			$data['ib_b11_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item2);
			$data['ib_b11_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item3);
			$data['ib_b11_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item4);

			$data['ib_b12_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item1);
			$data['ib_b12_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item2);
			$data['ib_b12_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item3);
			$data['ib_b12_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item4);

			$data['ib_b13_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item1);
			$data['ib_b13_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item2);
			$data['ib_b13_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item3);
			$data['ib_b13_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item4);

			$data['ib_b14_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item1);
			$data['ib_b14_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item2);
			$data['ib_b14_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item3);
			$data['ib_b14_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item4);

			$data['ib_b15_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item1);
			$data['ib_b15_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item2);
			$data['ib_b15_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item3);
			$data['ib_b15_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item4);

			$data['ib_b16_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item1);
			$data['ib_b16_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item2);
			$data['ib_b16_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item3);
			$data['ib_b16_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item4);

			$data['ib_b17_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item1);
			$data['ib_b17_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item2);
			$data['ib_b17_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item3);
			$data['ib_b17_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item4);

			$data['ib_b18_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item1);
			$data['ib_b18_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item2);
			$data['ib_b18_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item3);
			$data['ib_b18_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item4);

			$data['ib_b19_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item1);
			$data['ib_b19_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item2);
			$data['ib_b19_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item3);
			$data['ib_b19_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item4);

			$data['ib_b20_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item1);
			$data['ib_b20_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item2);
			$data['ib_b20_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item3);
			$data['ib_b20_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item4);

			$data['ib_b21_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item1);
			$data['ib_b21_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item2);
			$data['ib_b21_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item3);
			$data['ib_b21_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item4);

			$data['ib_b22_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item1);
			$data['ib_b22_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item2);
			$data['ib_b22_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item3);
			$data['ib_b22_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item4);

			$data['ib_b23_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item1);
			$data['ib_b23_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item2);
			$data['ib_b23_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item3);
			$data['ib_b23_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item4);

			$data['ib_b24_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item1);
			$data['ib_b24_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item2);
			$data['ib_b24_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item3);
			$data['ib_b24_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item4);

			$data['ib_b25_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item1);
			$data['ib_b25_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item2);
			$data['ib_b25_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item3);
			$data['ib_b25_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item4);
			
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/itemsbank_view', $data);
			$this->load->view('admin/includes/_footer');
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function delete($id = 0)
	{
		if($this->session->userdata('role_id')==1)
		{		
			$this->session->set_flashdata('error', 'You cannot delete Itembank!');
			redirect(base_url('admin/itemsbank'));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			$this->db->delete('ci_itemsbank', array('ib_id' => $id));
			$this->session->set_flashdata('success', 'ItemBank has been deleted successfully!');
			redirect(base_url('admin/itemsbank'));						
		}
		else
		{
			$this->session->set_flashdata('error', 'You cannot delete Itembank!');
			redirect(base_url('admin/itemsbank'));
		}
		
		
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_items_pdf(){

		//$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_items'] = $this->Items_model->get_items_for_export();
		$this->load->view('admin/items/items_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_items_csv(){ 
	   // file name 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$grades_data = $this->Items_model->get_items_csv_export();

	   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("ItemID", "ItemCode", "ItemName(Eng)", "ItemName(Urdu)", "ItemSort", "Grade", "ItemStatus"); 

		fputcsv($file, $header);
		foreach ($grades_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
?>