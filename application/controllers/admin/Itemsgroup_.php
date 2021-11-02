<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Itemsgroup extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Itemsgroup_model', 'Itemsgroup_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/itemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
		
	public function datatable_jsoniw_grouplist($id = 0){	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup_IW($this->session->userdata('admin_id'),$id);
		}
		else
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup($id);
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_status'] == 1)
			{
				$status='Draft/Pending';
			}
			elseif($row['group_status'] == 2)
			{
				$status='Submitted';
			}
			elseif($row['group_status'] == 3)
			{
				$status='Rejected';
			}
			else
			{
				$status='Accepted';
			}
			
			if($this->session->userdata('role_id')==3)
			{
				if($row['group_status'] == 1)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemsgroup/edit/'.$row['group_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='#' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="#"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['group_id'].'" 
				id="cb_'.$row['group_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['group_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
	//---------------------------------------------SS Functions Starts----------
	public function ss_pindex(){

		$data['title'] = 'Paragraph List (Submitted by Itemwriters)';
		//get_all_grades
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/ss_pitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_ss_itempara($id = 0){	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_itemspara_SS($this->session->userdata('admin_id'),$subjectList,234);
		}
		else
		{
			$records = $this->Itemspara_model->get_all_itemspara($id);
		}
		
		//print_r($records);
		//die($id.'='.$this->session->userdata('role_id'));
		
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_status_ss'] == 0)
			{
				$status='Pending';
			}
			elseif($row['para_status_ss'] == 1)
			{
				$status='Rejected';
			}
			elseif($row['para_status_ss'] == 2)
			{
				$status='Accepted with change';
			}
			else
			{
				$status='Accepted without change';
			}
			//$status = ($row['para_status'] == 1)? 'checked': '';
			
			
			if($this->session->userdata('role_id')==2)
			{
				if($row['para_status_ss'] == 0)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemspara/edit/'.$row['para_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemspara/delete/".$row['para_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
		
			
			$data[]= array(
				++$i,
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['para_id'].'" 
				id="cb_'.$row['para_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['para_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		//print_r($data);
		//die();
		echo json_encode($records);						   
	}
	public function ss_submit_for_approval($id=0){
		//print_r($_REQUEST);
		//die();
		if($this->input->post('para_comment_ss')=="")
		{
			$this->form_validation->set_rules('para_comment_ss', 'Itempara Comments SS', 'trim|required');
			$this->session->set_flashdata('error', 'Itempara comments required!');
			redirect(base_url('admin/itemspara/ss_view/'.$id));
		}
		else
		{
			$para_status_ss ='';
			$para_status = '';
			if($this->input->post('submit_awc'))
			{
				$para_status_ss ='2';
				$para_status = '4';
			}
			elseif($this->input->post('submit_awoc'))
			{
				$para_status_ss ='3';
				$para_status = '4';
			}
			else{
				$para_status_ss ='1';
				$para_status = '1';
			}
			
			
			$data = array(
					'para_comment_ss' => $this->input->post('para_comment_ss'),
					'para_status_ss' => $para_status_ss,
					'para_status' => $para_status,
				);
			//print_r($data);
			//die();
			$result = $this->Itemspara_model->ss_submit_for_approval($data, $id);
			if($result){
				$this->session->set_flashdata('success', 'Itempara has been updated successfully!');
				redirect(base_url('admin/itemspara/ss_pindex'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/itemspara/ss_pindex'),'refresh');
			}
		}
	} 
	//---------------------------------------------SS Functions Ends----------
	
	//---------------------------------------------AE Functions Starts-------------
	public function ae_pindex(){
		$data['title'] = 'Paragraph List (Approved by SS)';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/ae_pitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_ae_itempara($id = 0){
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_itemspara_AE($this->session->userdata('admin_id'),$subjectList,23);
		}
		else
		{
			$records = $this->Itemspara_model->get_all_itemspara($id);
		}
		
		//print_r($records);
		//die($id.'='.$this->session->userdata('role_id'));
		
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status_ss='';
			$status_ae='';
			$editoption='';
			
			if($row['para_status_ss'] == 0)
			{$status_ss='Pending';}
			elseif($row['para_status_ss'] == 1)
			{$status_ss='Rejected';}
			elseif($row['para_status_ss'] == 2)
			{$status_ss='Accepted with change';}
			else
			{$status_ss='Accepted without change';}
			
			if($row['para_status_ae'] == 0)
			{$status_ae='Pending';}
			elseif($row['para_status_ae'] == 1)
			{$status_ae='Rejected';}
			else
			{$status_ae='Accepted';}
			
			if($this->session->userdata('role_id')==4)
			{
				if($row['para_status_ae'] == 0)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ae_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ae_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			
			$data[]= array(
				++$i,
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status_ss,
				$status_ae,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['para_id'].'" 
				id="cb_'.$row['para_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['para_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
	public function ae_submit_for_approval($id=0){
		//print_r($_REQUEST);
		//die(); 
		if($this->input->post('para_comment_ae')=="")
		{
			$this->form_validation->set_rules('para_comment_ae', 'Itempara Comments SS', 'trim|required');
			$this->session->set_flashdata('error', 'Itempara comments required!');
			redirect(base_url('admin/itemspara/ae_view/'.$id));
		}
		else
		{
			$para_status_ae ='';
			if($this->input->post('approve'))
			{
				$para_status_ae ='2';
			}
			else{
				$para_status_ae ='1';
				$para_status_ss ='0';
			}
			
			
			$data = array(
					'para_comment_ae' => $this->input->post('para_comment_ae'),
					'para_status_ae' => $para_status_ae,
				);
			//print_r($data);
			//die();
			$result = $this->Itemspara_model->ae_submit_for_approval($data, $id);
			if($result){
				$this->session->set_flashdata('success', 'Itempara has been updated successfully!');
				redirect(base_url('admin/itemspara/ae_pindex'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/itemspara/ae_pindex'),'refresh');
			}
		}
	} 
	//---------------------------------------------AE Functions Ends-------------
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
	public function get_paras_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_paras_by_subject($this->input->post('subject_id')));
	}
	//-----------------------------------------------------------
	public function change_status(){   

		$this->Itemspara_model->change_status();
	}

	//-----------------------------------------------------------
	public function add(){
		if($this->session->userdata('role_id')==3)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
				$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/itemsgroup/add'),'refresh');
			}
			else{
				$data = array(
					'group_title_en' => $this->input->post('group_title_en'),
					'group_title_ur' => $this->input->post('group_title_ur'),
					'group_grade_id' => $this->input->post('group_grade_id'),
					'group_subject_id' => $this->input->post('group_subject_id'),
					'group_item_1' => $this->input->post('group_item_1'),
					'group_item_2' => $this->input->post('group_item_2'),					
					'group_item_3' => $this->input->post('group_item_3'),
					'group_item_4' => $this->input->post('group_item_4'),
					'group_item_5' => $this->input->post('group_item_5'),
					'group_item_6' => $this->input->post('group_item_6'),
					'group_item_7' => $this->input->post('group_item_7'),
					'group_item_8' => $this->input->post('group_item_8'),
					'group_item_9' => $this->input->post('group_item_9'),
					'group_item_10' => $this->input->post('group_item_10'),
					'group_ordering' => $this->input->post('group_ordering'),
					'group_status' => '1',
					'group_createdby' => $this->session->userdata('admin_id'),
				);
				$data = $this->security->xss_clean($data);
				//echo '<pre>';
				//print_r($data);
				//die();
				$result = $this->Itemsgroup_model->add_itemsgroup($data);
				$id=$this->db->insert_id();
				//die($this->db->last_query());
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_title' => 'Item Group submitted by Item Writer',
						'log_message' => 'Item {{log_itemid}} submitted by Item Writer {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'submitted',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemsgroup_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item Group has been added successfully!');
					redirect(base_url('admin/itemsgroup'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Add Item Group';
			$data['grades'] = $this->Itemsgroup_model->get_all_grades();
	
			//print_r($this->session->userdata('subjects_ids'));
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemsgroup/itemsgroup_add');
			$this->load->view('admin/includes/_footer');
		}	
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemsgroup_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==3)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemsgroup_model->get_iw_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Itemspara_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function cstands_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Itemspara_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function all_items_by_subject()
	{
		if($this->session->userdata('role_id')==3)
		{			
			echo json_encode($this->Itemsgroup_model->all_items_by_subject($this->input->post('subject_id'),$this->session->userdata('admin_id')));		
		}
		else
		echo json_encode($this->Itemsgroup_model->all_items_by_subject($this->input->post('subject_id')));		
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function slos_by_subcstands()
	{
		echo json_encode($this->Itemspara_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
				$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
				$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Itemspara_model->get_itemspara_by_id($id);
				$data['view'] = 'admin/Itemsgroup/itemsgroup_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'group_title_en' => $this->input->post('group_title_en'),
					'group_title_ur' => $this->input->post('group_title_ur'),
					'group_grade_id' => $this->input->post('group_grade_id'),
					'group_subject_id' => $this->input->post('group_subject_id'),
					'group_item_1' => $this->input->post('group_item_1'),
					'group_item_2' => $this->input->post('group_item_2'),
					'group_item_3' => $this->input->post('group_item_3'),
					'group_item_4' => $this->input->post('group_item_4'),
					'group_item_5' => $this->input->post('group_item_5'),
					'group_item_6' => $this->input->post('group_item_6'),
					'group_item_7' => $this->input->post('group_item_7'),
					'group_item_8' => $this->input->post('group_item_8'),
					'group_item_9' => $this->input->post('group_item_9'),
					'group_item_10' => $this->input->post('group_item_10'),
					'group_ordering' => $this->input->post('group_ordering'),
					'group_status' => '1',
					'group_createdby' => $this->session->userdata('admin_id'),
				);
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//$data = $this->security->xss_clean($data);
				$result = $this->Itemsgroup_model->edit_itemsgroup($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/itemsgroup'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Group';
			$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
			$data['grades'] = $this->Itemsgroup_model->get_all_grades();
				if($this->session->userdata('role_id')==3)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Itemsgroup_model->get_ae_subjects_grade($subjectList,$data['group'][0]->group_grade_id);
				}		
				else
				{
					$data['subjects'] = $this->Itemsgroup_model->get_all_subjects();
				}
			$data['groupitems'] = $this->Itemsgroup_model->all_item_by_subject($data['subjects'][0]['subject_id']);
			//echo '<PRE>';
			//print_r($data['groupitems']);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemsgroup/itemsgroup_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function view($id = 0)
	{
		$data['title'] = 'View Group';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);

		$data['group_item_1'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_10);
		
		//echo '<PRE>';
		//print_r($data);
		//die();

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/group_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function ss_view($id = 0){
			$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Itemspara_model->get_all_grades();
			$data['itemspara'] = $this->Itemspara_model->get_itemspara_by_id($id);
			
			if($data['itemspara'][0]->para_item_21!=0) {
			$data['para_item_21'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);
			}
			$data['para_item_22'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);
			$data['para_item_23'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);
			$data['para_item_24'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);
			$data['para_item_25'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemspara/ss_itemspara_view', $data);
			$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function ae_view($id = 0){
			$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Itemspara_model->get_all_grades();
			$data['itemspara'] = $this->Itemspara_model->get_itemspara_by_id($id);
			
			if($data['itemspara'][0]->para_item_21!=0) {
			$data['para_item_21'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);
			}
			$data['para_item_22'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);
			$data['para_item_23'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);
			$data['para_item_24'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);
			$data['para_item_25'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemspara/ae_itemspara_view', $data);
			$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		$this->db->delete('ci_items_paragraphs', array('para_id' => $id));
		$this->session->set_flashdata('success', 'Paragraph has been deleted successfully!');
		redirect(base_url('admin/itemspara'));
	}

public function delete_image($id = 0)
	{
		$data = array('para_image' => '');
		$this->db->where('para_id', $id);        
		$this->db->update('ci_items_paragraphs', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/itemspara/edit/'.$id));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_itemspara_pdf(){

		//$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_items'] = $this->Itemspara_model->get_itemspara_for_export();
		$this->load->view('admin/itemspara/itemspara_pdf', $data);
	}

	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_itemspara_csv(){ 

	   // file name 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

	   // get data 
		$grades_data = $this->Itemspara_model->get_itemspara_csv_export();

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

	public function search(){
		if($this->input->post('submit'))
		{		
			if($this->input->post('para_grade_id') == '' && $this->input->post('para_subject_id') == '')
			{
				redirect(base_url('admin/itemspara'));
			}
			else
			{
				$data['para_grade_id'] = $this->input->post('para_grade_id');
				$data['para_subject_id'] = $this->input->post('para_subject_id');
				$data['title'] = 'Paragraph Searched List ';
				$data['grades'] = $this->Itemspara_model->get_all_grades();	
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/itemspara/itemspara_list', $data);
				$this->load->view('admin/includes/_footer');
			}
			
										
		}
	}
	public function submitpara_for_approval($id){ 
		$result = $this->Itemspara_model->submitpara_for_approval($id);
		if($result){
			$this->session->set_flashdata('success', 'Item has been updated successfully!');
			redirect(base_url('admin/Itemspara'));
		}
		else{
			$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
			redirect(base_url('admin/Itemspara'),'refresh');
		}
	} 
	public function psyitems(){

		$data['title'] = 'Paragraph List';
		//get_all_grades
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/psy_itemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_psy_itemspara($id = 0){	
		$records = $this->Itemspara_model->get_all_itemspara();
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_status_ss'] == 0)
			{
				$status='Pending';
			}
			elseif($row['para_status_ss'] == 1)
			{
				$status='Rejected';
			}
			elseif($row['para_status_ss'] == 2)
			{
				$status='Accepted with change';
			}
			else
			{
				$status='Accepted without change';
			}
			//$status = ($row['para_status'] == 1)? 'checked': '';
			
			
			if($this->session->userdata('role_id')==2)
			{
				if($row['para_status_ss'] == 0)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemspara/edit/'.$row['para_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemspara/delete/".$row['para_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
		
			
			$data[]= array(
				++$i,
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['para_id'].'" 
				id="cb_'.$row['para_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['para_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
}
	?>