<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Items extends MY_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index()
	{
		$data['title'] = 'Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ditems()
	{
		$data['title'] = 'Draft Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ditems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function sitems()
	{
		$data['title'] = 'Submitted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/sitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ritems()
	{
		$data['title'] = 'Rejected Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ritems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function aitems()
	{
		die('You are not authorized here');
		$data['title'] = 'Accepted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function submit_for_approval($id=0)
	{ 
		$result = $this->Items_model->submit_for_approval( $id);
		if($result)
		{
			$data = array(
				'log_itemid' => $id,
				'log_title' => 'Item submitted by Item Writer',
				'log_message' => 'Item {{log_itemid}} submitted by Item Writer {{log_admin_id}} on {{log_date}}',
				'log_messagetype' =>'submitted',
				'log_admin_id' => $this->session->userdata('admin_id')
			);
			$log = $this->Items_model->log_entry($data);
			$this->session->set_flashdata('success', 'Item has been updated successfully!');
			redirect(base_url('admin/items/ditems'));
		}
		else
		{
			$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
			redirect(base_url('admin/items/ditems'),'refresh');
		}
	}
	
	public function ae_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		//$data['itemwriters'] = $this->Items_model->get_ae_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$data['title'] = 'Pending Items List for Assessment Expert';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ae_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function create_flimzy_pdf($id = 0)
	{
		ini_set("pcre.backtrack_limit", "15000000");

		$data['all_items'] = $this->Items_model->get_all_items_SS_a_searched_export($this->session->userdata('admin_id'),$this->session->userdata('subjects_ids'),4,$id);
		
		//$data['all_items'] = $this->Downloads_model->get_flimzy_items_for_export($grade_id, $subject_id, $cstand_id, $subcstand_id, $phase_id);
		$mpdf = new \Mpdf\Mpdf();
		
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];
		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];
		$mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
		 'fontDir' => array_merge($fontDirs, [ base_url('admin\assets\fonts')]),
		'fontdata' => $fontData + [
			'urdufont' => [
				'R' => 'Jameel Noori Nastaleeq.ttf',
				'I' => 'Jameel Noori Nastaleeq.ttf',
			]
		],
		'default_font' => 'verdana']);
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		$mpdf->SetAuthor("PEC IT TEAM");
		$mpdf->SetTitle("Flimzy List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$mpdf->WriteHTML($this->load->view('admin/items/downloads_flimzy_pdf',$data,true));
		//$mpdf->Output(); 
		$filename = 'Flimzy_list';
		$mpdf->Output($filename . '.pdf', 'D');
		
		//$mpdf->Output('Flimzy_list.pdf', 'D');
		//$this->load->view('admin/downloads/downloads_flimzy_pdf', $data);
	}
	
	
	public function ae_accepted_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['title'] = 'Accepted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_accepted_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ae_rejected_items()
	{

		$data['title'] = 'Rejected Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_rejected_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsons_ae_accepted($id = 0)
	{
		if($id!="")
		{
			$records =[];
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_searched_a($this->session->userdata('admin_id'),$subjectList,4,$id);
				/*$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_accepted($this->session->userdata('admin_id'),$subjectList,1);*/
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				//$status = ($row['item_status'] == 1)? 'checked': '';
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		else
		{
			$records =[];
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_accepted($this->session->userdata('admin_id'),$subjectList,1);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				//$status = ($row['item_status'] == 1)? 'checked': '';
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);						   
	}
	
	public function datatable_json_ae_rejected($id = 0)
	{
		if($id!="")
		{
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_searched_r($this->session->userdata('admin_id'),$subjectList,3,$id);
				/*
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_rejected($this->session->userdata('admin_id'),$subjectList,2);
				*/
			}
			else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			
			$data = array();
	
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		else
		{
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_rejected($this->session->userdata('admin_id'),$subjectList,2);
			}
			else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			
			$data = array();
	
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);	
	}
	public function ae_submit_for_approval($id=0)
	{ 
		if($this->input->post('item_comment_ae')=="")
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->session->set_flashdata('error', 'Item comments required!');
			redirect(base_url('admin/items/ae_view/'.$id));
		}
		else
		{
			if($this->input->post('submit_ae'))
			{
				$data = array(
					'item_comment_ae' => $this->input->post('item_comment_ae'),
					'item_status_ae' => '1',
					'item_status' => '4',
					'item_reviewed' => date('Y-m-d H:i:s'),					
					'item_reviewedby' => $this->session->userdata('admin_id')
				);
			}
			elseif($this->input->post('reject_ae'))
			{
				$data = array(
					'item_comment_ae' => $this->input->post('item_comment_ae'),
					'item_status_ae' => '2',
					'item_status' => '3',
					'item_reviewed' => date('Y-m-d H:i:s'),
					'item_reviewedby' => $this->session->userdata('admin_id')
				);
			}
			else
			{
				die('Contact PEC IT TEAM......');
			}
			$result = $this->Items_model->ae_submit_for_approval($data, $id);
			$log_message ='';
			$log_messagetype='';
			if($item_status_ae ='1')
			{
				$log_message ='ae_approved';
				$log_messagetype='Item {{log_itemid}} approved by AE {{itemwriter_id}} on {{log_date}}';
			}
			else
			{
				$log_message ='ae_rejected';
				$log_messagetype='Item {{log_itemid}} rejected by AE {{itemwriter_id}} on {{log_date}}';
			}
			if($result){
				$data = array(
					'log_itemid' => $id,
					'log_title' => 'Item approved by AE',
					'log_message' => $log_message,
					'log_messagetype' =>$log_messagetype,
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', 'Item has been updated successfully!');
				redirect(base_url('admin/items/ae_pitems'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/items/ae_pitems'),'refresh');
			}
		}
	} 
	
	public function ae_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function ss_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('item_submittedby') == '' && $this->input->post('search_grade') == '' && $this->input->post('search_subject') == '' && $this->input->post('item_type') == '')
			{
				redirect(base_url('admin/items/ss_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['item_type'] = $this->input->post('item_type');
				$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ss_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	public function ss_aitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('item_submittedby') == '' && $this->input->post('search_grade') == '' && $this->input->post('search_subject') == '' && $this->input->post('item_type') == '')
			{
				redirect(base_url('admin/items/ss_accepted_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['item_type'] = $this->input->post('item_type');
				$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ss_aitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	public function ss_ritems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('item_submittedby') == '' && $this->input->post('search_grade') == '' && $this->input->post('search_subject') == '' && $this->input->post('item_type') == '')
			{
				redirect(base_url('admin/items/ss_rejected_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['item_type'] = $this->input->post('item_type');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ss_ritems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function ae_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' /*&&$this->input->post('item_submittedby') == ''*/)
			{
				redirect(base_url('admin/items/ae_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ae_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	public function ae_aitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' /*$this->input->post('item_submittedby') == ''*/)
			{
				redirect(base_url('admin/items/ae_accepted_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ae_aitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	public function ae_ritems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' /*&& $this->input->post('item_submittedby') == '' */)
			{
				redirect(base_url('admin/items/ae_rejected_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ae_ritems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function ss_submit_for_approval($id=0)
	{ 
		if($this->input->post('item_comment_ss')=="" && $this->input->post('reject_ss'))
		{
				$this->form_validation->set_rules('item_comment_ss', 'Item Comment SS', 'trim|required');
				$this->session->set_flashdata('error', 'Item comments required!');
				redirect(base_url('admin/items/ss_view/'.$id));
		}
		else
		{
			$item_status ='';
			$item_status_ss ='';
			$log_messagetype='';
			$log_message ='';
			if($this->input->post('submit_awc'))
			{
				$item_status ='4';
				$item_status_ss ='2';
			}
			elseif($this->input->post('submit_awoc'))
			{
				$item_status ='4';
				$item_status_ss ='3';
			}
			else{
				$item_status ='3';
				$item_status_ss ='1';
			}
			$data = array(
					'item_approvedby' => $this->session->userdata('admin_id'),
					'item_approved' => date('Y-m-d H:i:s'),
					'item_comment_ss' => $this->input->post('item_comment_ss'),
					'item_status_ss' => $item_status_ss,
					'item_status'=> $item_status
				);
			if($item_status_ss =='2')
			{
				$log_messagetype = 'ss_accept_w_c';
				$log_message ='Item {{log_itemid}} accepted with change by {{log_admin_id}} on {{log_date}}';
			}
			elseif($item_status_ss =='3')
			{
				$log_messagetype = 'ss_accept_wo_c';
				$log_message ='Item {{log_itemid}} accepted without change by {{log_admin_id}} on {{log_date}}';
			}
			elseif($item_status_ss =='1')
			{
				$log_messagetype = 'ss_rejected';
				$log_message ='Item {{log_itemid}} rejected by {{log_admin_id}} on {{log_date}}';
			}
			
			$result = $this->Items_model->ss_submit_for_approval($data, $id);
			if($result){
				$datalog = array(
					'log_itemid' => $id,
					'log_title' => 'Item accepted by SS',
					'log_message' => $log_message,
					'log_messagetype' =>$log_messagetype,
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$log = $this->Items_model->log_entry($datalog);
				$this->session->set_flashdata('success', 'Item has been updated successfully!');
				redirect(base_url('admin/items/ss_pitems'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/items/ss_pitems'),'refresh');
			}
		}
	} 
	
	public function ss_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_accepted_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['title'] = 'Accepted Items List';
		$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_accepted_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_withchange_items()
	{
		$data['title'] = 'Accepted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_withchange_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_withoutchange_items()
	{
		$data['title'] = 'Accepted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_withoutchange_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_rejected_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['title'] = 'Rejected Items List';
		$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_rejected_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id);
		}
		else
		{
			$records = $this->Items_model->get_all_items($id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_erq_crq/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'].'-'.$row['subject_code'],
				$row['slo_number'],
				$editoption
				/*
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['item_id'].'" 
				id="cb_'.$row['item_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['item_id'].'"></label>',
				*/
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsond($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,1);
		}
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_erq_crq/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$row['slo_number'],
				$editoption
				/*
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['item_id'].'" 
				id="cb_'.$row['item_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['item_id'].'"></label>',
				*/
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsons($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,2);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$row['slo_number'],
				$editoption
				/*
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['item_id'].'" 
				id="cb_'.$row['item_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['item_id'].'"></label>',
				*/
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonr($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,3);
		}
		else
		{
			$records = $this->Items_model->get_all_items($id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
					';
					
					/*$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_erq_crq/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				*/
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
					';
					/*
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				*/
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$row['slo_number'],
				$editoption
				/*
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['item_id'].'" 
				id="cb_'.$row['item_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['item_id'].'"></label>',
				*/
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,4);
		}
		else
		{
			$records = $this->Items_model->get_all_items($id);
		}
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'].'-'.$row['subject_code'],
				$row['slo_number'],
				$editoption
				/*
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['item_id'].'" 
				id="cb_'.$row['item_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['item_id'].'"></label>',
				*/
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_aep($id = 0)
	{	
		if($id!="")
		{
			$records =[];
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_searched_p($this->session->userdata('admin_id'),$subjectList,4,$id);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		else{
			$records =[];
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE($this->session->userdata('admin_id'),$subjectList,34);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
					/*
					'<input class="tgl_checkbox tgl-ios" 
					data-id="'.$row['item_id'].'" 
					id="cb_'.$row['item_id'].'"
					type="checkbox"  
					'.$status.'><label for="cb_'.$row['item_id'].'"></label>',
					*/
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);						   
	}
	
	public function datatable_jsonssp($id = 0)
	{
		if($id!="")
		{	
			$records =[];			
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_searched($this->session->userdata('admin_id'),$subjectList,2,$id);
			}		
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_erq_crq/'.$row['item_id']).'" target="_blank"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view/'.$row['item_id']).'" target="_blank"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
			echo json_encode($records);	
		
		}
		else
		{
			$records =[];			
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS($this->session->userdata('admin_id'),$subjectList,2);
			}		
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				//$status = ($row['item_status'] == 1)? 'checked': '';
				
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
			echo json_encode($records);	
		}		
	}
	
	public function datatable_json_search($id = 0)
	{	
	$records =[];
			
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_SS($this->session->userdata('admin_id'),$subjectList,2,$id);
		}
		
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_erq_crq/'.$row['item_id']).'" target="_new"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view/'.$row['item_id']).'" target="_new"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'].'-'.$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		//print_r($data);
		//die();
		echo json_encode($records);						   
	}
	
	public function datatable_jsons_ss_accepted($id = 0)
	{
		if($id!="")
		{
			$records =[];
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_a_searched($this->session->userdata('admin_id'),$subjectList,4,$id);
			}
			/*else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			*/
			$data = array();
	
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				//$status = ($row['item_status'] == 1)? 'checked': '';
				
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					//$row['item_updated'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		else
		{
			$records =[];
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_accepted($this->session->userdata('admin_id'),$subjectList,4);
			}
			/*else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			*/
			$data = array();
	
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				//$status = ($row['item_status'] == 1)? 'checked': '';
				
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$row['item_updated'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);						   
	}
	
	public function datatable_jsonssawo($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,4);
		}
		else
		{
			$records = $this->Items_model->get_all_items($id);
		}
		
		//print_r($records);
		//die($id.'='.$this->session->userdata('role_id'));
		
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'].'-'.$row['subject_code'],
				$row['slo_number'],
				$editoption
			);
		}
		$records['data']=$data;
		//print_r($data);
		//die();
		echo json_encode($records);						   
	}
	
	public function datatable_json_ss_rejected($id = 0)
	{
		if($id!="")
		{
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_r_searched($this->session->userdata('admin_id'),$subjectList,3,$id);
			}
			else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
								   
		}
		else
		{
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_rejected($this->session->userdata('admin_id'),$subjectList,3);
			}
			else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			
			$data = array();
	
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				//$status = ($row['item_status'] == 1)? 'checked': '';
				
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
						//<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_erq_crq/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
						//<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					}
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					$row['item_batch'],
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);		
	}
					
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Items_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
	
	public function change_status()
	{   
		$this->Items_model->change_status();
	}
	
	public function add()
	{
		if($this->session->userdata('role_id')==3)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
				$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
				$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/items/add'),'refresh');
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_registration' =>$this->input->post('item_registration'),
					
					'item_date_received' => $this->input->post('item_date_received'),					
					'item_submittedby' => $this->session->userdata('admin_id'),							
					
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_en' => $this->input->post('item_image_en'),
					'item_image_ur' => $this->input->post('item_image_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_a_image' => $this->input->post('item_option_a_image'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_b_image' => $this->input->post('item_option_b_image'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_c_image' => $this->input->post('item_option_c_image'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_d_image' => $this->input->post('item_option_d_image'),
					'item_type' => 'MCQ',
					'item_option_correct' => $this->input->post('item_option_correct'),
					'item_batch' => $this->input->post('item_batch')
				);/*
				$keyword ='Ginger';	
				function array_search_partial($data, $keyword) {
					foreach($data as $index => $string) {
						if (strpos($string, $keyword) !== FALSE)
						die('Oy lab gyaaaaaaaaaaaaa');
					}
				}*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					//print_r($result);
					//die();
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Items_model->add_item($data);
				$insert_id = $this->db->insert_id();
				//die($this->db->last_query());
				if($result){
					$data = array(
						'log_itemid' => $insert_id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'New item created',
						'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_itemwriter_id}} on {{log_date}}',
						'log_messagetype' =>'created',
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
					redirect(base_url('admin/items/ditems'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Add Item';
			$data['grades'] = $this->Items_model->get_all_grades();
			//echo '<PRE>';
			//print_r($this->session->userdata('subjects_ids'));
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/items_add');
			$this->load->view('admin/includes/_footer');
		}	
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	
	public function add_erq_crq()
	{
		if($this->session->userdata('role_id')==3)
		{
			if($this->input->post('submit'))
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('erq_crq_add');
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
							
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/items/add'),'refresh');
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_image_en' => $this->input->post('item_image_en'),
					'item_image_ur' => $this->input->post('item_image_ur'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_rubric_image' => $this->input->post('item_rubric_image'),
					'item_type' => 'ERQ',
					'item_registration' =>$this->input->post('item_registration'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_batch' => $this->input->post('item_batch')
				);
				
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				$data = $this->security->xss_clean($data);
				$result = $this->Items_model->add_item($data);
				//die($this->db->last_query());
				$insert_id = $this->db->insert_id();
				if($result){
					$data = array(
						'log_itemid' => $insert_id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'New item created',
						'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_itemwriter_id}} on {{log_date}}',
						'log_messagetype' =>'created',
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
					redirect(base_url('admin/items/ditems'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Add ERQ/CRQ Item';
			$data['grades'] = $this->Items_model->get_all_grades();
			//echo '<PRE>';
			//print_r($this->session->userdata('subjects_ids'));
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/erq_crq_items_add');
			$this->load->view('admin/includes/_footer');
		}	
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	
	public function edit_erq_crq($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_rubric_image' => $this->input->post('item_rubric_image'),
					'item_type' => 'ERQ',
					'item_registration' =>$this->input->post('item_registration'),
					'item_comment_ss' =>$this->input->post('item_comment_ss')
				);
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				//print_r($data);
				//die();
				$result = $this->Items_model->edit_items($data, $id);
				
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Item Updated',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by IW/SS {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						/*if($this->session->userdata('role_id')==2)
						{
							redirect(base_url('admin/items/ss_view_erq_crq/'.$id));
						}
						else
						{
							redirect(base_url('admin/items/ditems'));
						}*/
						if($this->session->userdata('role_id')==2)
						{
							redirect(base_url('admin/items/ss_view_erq_crq/'.$id));
						}
						elseif($this->session->userdata('role_id')==3)
						{
							redirect(base_url('admin/items/view_erq_crq/'.$id));
							//redirect(base_url('admin/items/ditems'));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							redirect(base_url('admin/items/ae_view_erq_crq/'.$id));
							//redirect(base_url('admin/items/ditems'));
						}
						else
						{
							die('You are not authorized');
						}
					}
				}
			}
		}
		elseif($this->input->post('submit2'))
		{
			//ss
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{	
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}		
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => 'ERQ',
					'item_registration' =>$this->input->post('item_registration'),
					'item_status' => '4',
					'item_status_ss' => '2',
					'item_comment_ss' => $this->input->post('item_comment_ss')
				);
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";

				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				
				$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Item Updated',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by IW/SS {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						//redirect(base_url('admin/items/ditems'));
						if($this->session->userdata('role_id')==2)
						{
							redirect(base_url('admin/items/ss_view_erq_crq/'.$id));
						}
						elseif($this->session->userdata('role_id')==3)
						{
							redirect(base_url('admin/items/view_erq_crq/'.$id));
							//redirect(base_url('admin/items/ditems'));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							redirect(base_url('admin/items/ae_view_erq_crq/'.$id));
							//redirect(base_url('admin/items/ditems'));
						}
						else
						{
							die('You are not authorized');
						}
					}
				}
			}
		}
		elseif($this->input->post('submit3'))
		{
			//ae
			//echo "<PRE>";
			//print_r($_REQUEST);
			//die();
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			
			if ($this->form_validation->run() == FALSE) {
				/*
				$data['items'] = $this->Items_model->get_items_by_id($id);				
				$data['view'] = 'admin/items/items_edit';
				$this->load->view('layout', $data);
				*/
				$this->session->set_flashdata('error', 'Item Comments AE Required!');
				redirect(base_url('admin/items/edit_erq_crq/'.$id));
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_comment_ae' => $this->input->post('item_comment_ae')
				);
				//print_r($data);
				//die();
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";

				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS/AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'ae_updated',
					);
					$log = $this->Items_model->log_entry($data);
					
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					/*if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/Items/ae_view_erq_crq/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/ditems'));
					}*/
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_view_erq_crq/'.$id));
					}
					elseif($this->session->userdata('role_id')==3)
					{
						redirect(base_url('admin/items/view_erq_crq/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					elseif($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/ae_view_erq_crq/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					else
					{
						die('You are not authorized');
					}
				}
			}
		}
		else{
			$data['title'] = 'Edit ERQ/CRQ Item';
			$data['item'] = $this->Items_model->get_items_by_id($id);
			
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_ae_subjects_grade($subjectList,$data['item']['item_grade_id']);
			}		
			else
			{
				$data['subjects'] = $this->Items_model->get_all_subjects();
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);
			
			
			if($data['item']['item_status']==3 && $this->session->userdata('role_id')==3 && $data['item']['item_submittedby']==$this->session->userdata('admin_id'))
			{
				$data = array(
					'item_status' => '1',
					'item_approvedby' => '0',
					'item_status_ss' => '0',
					'item_reviewedby' => '0',					
					'item_status_ae' => '0',
				);
				$result = $this->Items_model->update_rejected_item($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Item status has been changed from rejected to draft successfully!');
					redirect(base_url('admin/items/edit_erq_crq/'.$id));
				}
			}
			
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/erq_crq_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==3)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Items_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	
	public function cstands_by_subject()
	{
		echo json_encode($this->Items_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Items_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
	
	public function slos_by_subcstands()
	{
		echo json_encode($this->Items_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
	
	public function edit($id = 0)
	{
		$redirect_iw='';
		$redirect_ss='';
		$redirect_ae='';
		if($this->input->post('submit'))
		{			
			////////////////iw
			//echo "Under Development";
			//die();
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//echo '<hr />';
				//print_r($data);
				//die();
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_view/'.$id));
					}
					elseif($this->session->userdata('role_id')==3)
					{
						redirect(base_url('admin/items/view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					elseif($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/ae_view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					else
					{
						die('You are not authorized');
					}
				}
			}
		}
		elseif($this->input->post('submit2'))
		{
			//ss
			//echo "Under Development";
			//die();
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			$this->form_validation->set_rules('item_comment_ss', 'Item Comment SS', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				/*
				$data['items'] = $this->Items_model->get_items_by_id($id);				
				$data['view'] = 'admin/items/items_edit';
				$this->load->view('layout', $data);
				*/
				$this->session->set_flashdata('error', 'Item Comments SS Required!');
				redirect(base_url('admin/items/edit/'.$id));
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct'),
					'item_status' => '4',
					'item_status_ss' => '2',
					'item_comment_ss' => $this->input->post('item_comment_ss')					
				);
				//print_r($data);
				//die();
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					/*if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_pitems'));
					}
					else
					{
						redirect(base_url('admin/items/ditems'));
					}*/
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_view/'.$id));
					}
					elseif($this->session->userdata('role_id')==3)
					{
						redirect(base_url('admin/items/view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					elseif($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/ae_view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					else
					{
						die('You are not authorized');
					}
				}
			}
		}
		elseif($this->input->post('submit3'))
		{
			//echo "<PRE>";
			//print_r($_REQUEST);
			//die();
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				/*
				$data['items'] = $this->Items_model->get_items_by_id($id);				
				$data['view'] = 'admin/items/items_edit';
				$this->load->view('layout', $data);
				*/
				$this->session->set_flashdata('error', 'Item Comments SS Required!');
				redirect(base_url('admin/items/edit/'.$id));
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct'),
				);
				//print_r($data);
				//die();
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='ae_updated';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS/AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					/*if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/Items/ae_view/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/ditems'));
					}*/
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_view/'.$id));
					}
					elseif($this->session->userdata('role_id')==3)
					{
						redirect(base_url('admin/items/view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					elseif($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/ae_view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					else
					{
						die('You are not authorized');
					}
				}
			}
		}
		else
		{
			//if($this->session->userdata('admin_id'))
						
			$data['title'] = 'Edit Item';
			$data['item'] = $this->Items_model->get_items_by_id($id);
			$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==3)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_ae_subjects_grade($subjectList,$data['item']['item_grade_id']);
				}		
				else
				{
					$data['subjects'] = $this->Items_model->get_all_subjects();
				}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);
			
			if($data['item']['item_status']==3 && $this->session->userdata('role_id')==3 && $data['item']['item_submittedby']==$this->session->userdata('admin_id'))
			{
				$data = array(
					'item_status' => '1',
					'item_approvedby' => '0',
					'item_status_ss' => '0',
					'item_reviewedby' => '0',					
					'item_status_ae' => '0',
				);
				$result = $this->Items_model->update_rejected_item($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Item status has been changed from rejected to draft successfully!');
					redirect(base_url('admin/items/edit/'.$id));
				}
			}
			//echo '<PRE>';
			//print_r($id);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/items_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function view_erq_crq($id = 0)
	{
		$data['title'] = 'View ERQ/CRQ Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/erq_crq_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function delete($id = 0)
	{
		$this->db->delete('ci_items', array('item_id' => $id));
		$data = array(
					'log_itemid' => $id,
					'log_title' => 'Item deleted by IW',
					'log_message' => 'Item {{log_itemid}} deleted by itemwriter {{itemwriter_id}} on {{log_date}}',
					'log_messagetype' =>'deleted',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
		$log = $this->Items_model->log_entry($data);
		$this->session->set_flashdata('success', 'Item has been deleted successfully!');
		redirect(base_url('admin/items'));
	}
	
	public function delete_item_rubric_image($id = 0)
	{
		$data = array('item_rubric_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit_erq_crq/'.$id));
	}
	
	public function delete_rubimage_en($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit_erq_crq/'.$id));
	}
	
	public function delete_rubimage_ur($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit_erq_crq/'.$id));
	}
	
	public function delete_image_en($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_image_ur($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_item_option_a_image($id = 0)
	{
		$data = array('item_option_a_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_item_option_b_image($id = 0)
	{
		$data = array('item_option_b_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_item_option_c_image($id = 0)
	{
		$data = array('item_option_c_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_item_option_d_image($id = 0)
	{
		$data = array('item_option_d_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	/////////////////////////////////////////////////////////////////////////////
	public function rev_delete_image_en($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ae_edit/'.$id));}
	}
	
	public function rev_delete_image_ur($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ae_edit/'.$id));}
	}
	
	public function rev_delete_item_option_a_image($id = 0)
	{
		$data = array('item_option_a_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ae_edit/'.$id));}
	}
	
	public function rev_delete_item_option_b_image($id = 0)
	{
		$data = array('item_option_b_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ae_edit/'.$id));}
		
	}
	
	public function rev_delete_item_option_c_image($id = 0)
	{
		$data = array('item_option_c_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ae_edit/'.$id));}
	}
	
	public function rev_delete_item_option_d_image($id = 0)
	{
		$data = array('item_option_d_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ae_edit/'.$id));}
	}
	
	public function rev_delete_item_rubric_image($id = 0)
	{
		$data = array('item_rubric_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit_erq_crq/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ss_edit_erq_crq/'.$id));}
	}
	
	public function rev_delete_rubimage_en($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit_erq_crq/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ss_edit_erq_crq/'.$id));}
	}
	
	public function rev_delete_rubimage_ur($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('admin_id')==6)
		{redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));}
		elseif($this->session->userdata('admin_id')==2)
		{redirect(base_url('admin/items/rev_ss_edit_erq_crq/'.$id));}
		elseif($this->session->userdata('admin_id')==4)
		{redirect(base_url('admin/items/rev_ae_edit_erq_crq/'.$id));}
	}
	/////////////////////////////////////////////////////////////////////////////
	public function search()
	{
			if($this->input->post('submit'))
			{		
				if($this->input->post('item_grade_id') == '' && $this->input->post('item_subject_id') == '')
				{
					redirect(base_url('admin/items'));
				}
				else
				{
					$data['item_grade_id'] = $this->input->post('item_grade_id');
					$data['item_subject_id'] = $this->input->post('item_subject_id');
					$data['title'] = 'Items Searched List ';
					$data['grades'] = $this->Items_model->get_all_grades();	
					$this->load->view('admin/includes/_header', $data);
					$this->load->view('admin/items/items_list', $data);
					$this->load->view('admin/includes/_footer');
				}
			}
	}
	
	public function psy_items()
	{
 		$data['title'] = 'Items List for psychometrician';
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/psy_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function psy_items_rev()
	{
 		$data['title'] = 'Items List for psychometrician';
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/psy_ritems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_psy($id = 0)
	{	
		$records = $this->Items_model->get_all_items_psy($id);
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$editoption ='';
			$stem='';
			
			
			if($row['item_stem_en']!="")
				{$stem = html_entity_decode($row['item_stem_en']);}
			elseif($row['item_stem_ur']!="")
				{$stem = html_entity_decode($row['item_stem_ur']);}
			else{$stem = html_entity_decode($row['item_stem_en']).'<br />( '.html_entity_decode($row['item_stem_ur']).' )';}
			if($row['item_type']=='ERQ')
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['item_code'].'<br />( '.$row['item_type'].' )',
				$stem,
				$row['subject_name_en'].'('.$row['subject_code'].')',
				$row['grade_name_en'].'('.$row['grade_code'].')',
				$row['subusername'],
				$row['appusername'],
				$row['rewusername'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_psy_rev($id = 0)
	{	
		$records = $this->Items_model->get_all_items_psy_rev($id);
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$editoption ='';
			$stem='';
			
			
			if($row['item_stem_en']!="")
				{$stem = html_entity_decode($row['item_stem_en']);}
			elseif($row['item_stem_ur']!="")
				{$stem = html_entity_decode($row['item_stem_ur']);}
			else{$stem = html_entity_decode($row['item_stem_en']).'<br />( '.html_entity_decode($row['item_stem_ur']).' )';}
			if($row['item_type']=='ERQ')
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_code'].'<br />( '.$row['item_type'].' )',
				$stem,
				$row['subject_name_en'].'('.$row['subject_code'].')',
				$row['grade_name_en'].'('.$row['grade_code'].')',
				$row['subusername'],
				$row['appusername'],
				$row['rewusername'],
				$row['pusername'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function psy_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/psy_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function psy_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/psy_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function psy_submit_for_approval($id=0)
	{ 
		if($this->input->post('item_comment_psy')=="")
		{
			$this->form_validation->set_rules('item_comment_psy', 'Item Psychometrician Comment Required', 'trim|required');
			$this->session->set_flashdata('error', 'Item comments required!');
			redirect(base_url('admin/items/psy_view/'.$id));
		}
		else
		{
			$item_status_psy ='';
			if($this->input->post('submit_psy'))
			{
				$data = array(
					'item_comment_psy' => $this->input->post('item_comment_psy'),
					'item_commentby_psy' => $this->session->userdata('admin_id'),
					'item_status_psy' => '1',
					'item_date_psy' => date('Y-m-d H:i:s')
					);
			}
			else{
				die('Contact PEC IT Team.....');
			}
			
			//print_r($data);
			//die();
			$result = $this->Items_model->psy_submit_for_approval($data, $id);
			if($result){
				if($result){
				//die($this->db->last_query());
				$data = array(
					'log_itemid' => $id,
					'log_title' => 'Item reviewed by Psychometrician',
					'log_message' => 'Item {{log_itemid}} reviewed by Psychometrician {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'psy_reviewed',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', 'Item has been updated successfully!');
				redirect(base_url('admin/items/psy_items'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/items/psy_items'),'refresh');
				}
			}
		}
	}
	public function export_items_csv()
	{ 
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
	public function export_ss_pitems_csv()
	{ 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

	   // get data 
		$grades_data = $this->Items_model->get_ss_pitems_csv_export();

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
	
	public function create_items_pdf()
	{
		$data['all_items'] = $this->Items_model->get_items_for_export();
		$this->load->view('admin/items/items_pdf', $data);
	}
	public function create_sitems_pdf()
	{
		$data['all_items'] = $this->Items_model->get_sitems_for_export();
		$this->load->view('admin/items/sitems_pdf', $data);
	}
	public function create_aitems_pdf()
	{
		$data['all_items'] = $this->Items_model->get_aitems_for_export();
		$this->load->view('admin/items/aitems_pdf', $data);
	}
	public function create_ritems_pdf()
	{
		$data['all_items'] = $this->Items_model->get_ritems_for_export();
		$this->load->view('admin/items/ritems_pdf', $data);
	}
	public function create_ss_pitems_pdf()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['all_items'] = $this->Items_model->get_ss_pitems_for_export($subjectList);
		$this->load->view('admin/items/ss_pitems_pdf', $data);
	}
	public function create_ss_aitems_pdf()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['all_items'] = $this->Items_model->get_ss_aitems_for_export($subjectList);
		$this->load->view('admin/items/ss_aitems_pdf', $data);
	}
	public function create_ss_ritems_pdf()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['all_items'] = $this->Items_model->get_ss_ritems_for_export($subjectList);
		$this->load->view('admin/items/ss_ritems_pdf', $data);
	}

	public function itemwriters_by_subjects()
	{
		echo json_encode($this->Items_model->get_iw_by_subject($this->input->post('subject_id')));
	}
	
	public function rev_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_eitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_eitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_aitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsonp_rev($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_REV_pending($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				$row['item_stem_en'],
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//get_all_items_REV_edited
	public function datatable_jsona_rev($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_REV_accepted($subjectList,$this->session->userdata('admin_id'));
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				$status='';
				if($row['item_status'] == 4)
				{
					$status='Reviewed';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsone_rev($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_REV_edited($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_ss_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_eitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_eitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsonp_rev_ss($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_pending($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_ss_status']==0)?'Pending':'Under Review',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsone_rev_ss($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_edited($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona_rev_ss($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_accepted($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				$status='';
				if($row['item_rev_ss_status'] == 2)
				{
					$status='Reviewed';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ss_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_ae_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_eitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_eitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsonp_rev_ae($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_pending($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				$status ='';
				if($row['item_rev_ae_status'] == 0)
				{
					$status='Pending';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsone_rev_ae($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_edited($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				$status ='';
				if($row['item_rev_ae_status'] == 1)
				{
					$status='Under Review';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona_rev_ae($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_accepted($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				$status='';
				if($row['item_rev_ss_status'] == 2)
				{
					$status='Reviewed';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_psy_pitems()
	{
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_all_subjects();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_eitems()
	{
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_all_subjects();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_eitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_aitems()
	{
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_all_subjects();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsonp_rev_psy($id = 0)
	{
		$records =[];
		$records = $this->Items_model->get_all_rev_pitems_psy();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
				$editoption ='';
				$status ='';
				if($row['item_rev_psy_status'] == 0)
				{
					$status='Pending';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_psy_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_psy_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['appusername'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsone_rev_psy($id = 0)
	{
		$records =[];
		$records = $this->Items_model->get_all_rev_eitems_psy();
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
				$editoption ='';
				$status ='';
				if($row['item_rev_psy_status'] == 1)
				{
					$status='Under Review';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_psy_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_psy_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['appusername'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona_rev_psy($id = 0)
	{
		$records =[];
		$records = $this->Items_model->get_all_rev_aitems_psy();
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
				$editoption ='';
				$status='';
				if($row['item_rev_ss_status'] == 2)
				{
					$status='Reviewed';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_psy_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_psy_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['appusername'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
			$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_status)&&$data['items'][0]->item_rev_status==2)
		{$this->load->view('admin/items/rev_aitems_view', $data);}
		else
		{$this->load->view('admin/items/rev_items_view', $data);}
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
			$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		//$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_status)&&$data['items'][0]->item_rev_status==2)
		{$this->load->view('admin/items/rev_aitems_view_erq_crq', $data);}
		else
		{$this->load->view('admin/items/rev_items_view_erq_crq', $data);}
		//$this->load->view('admin/items/rev_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_aview($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_aitems_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_aview_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_aitems_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		/*
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{$data['items'] = $this->Items_model->get_rev_items_by_id($id);}
		else
		{$data['items'] = $this->Items_model->get_item_by_id($id);}*/
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_status)&&$data['items'][0]->item_rev_ss_status==2)
		{$this->load->view('admin/items/rev_ss_aitems_view', $data);}
		else
		{$this->load->view('admin/items/rev_ss_items_view', $data);}
		//$this->load->view('admin/items/rev_ss_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_ss_status)&&$data['items'][0]->item_rev_ss_status==2)
		{$this->load->view('admin/items/rev_ss_aitems_view_erq_crq', $data);}
		else
		{$this->load->view('admin/items/rev_ss_items_view_erq_crq', $data);}
		//$this->load->view('admin/items/rev_ss_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aview($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_aitems_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aview_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_aitems_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_ae_status)&&$data['items'][0]->item_rev_ae_status==2)
		{$this->load->view('admin/items/rev_ae_aitems_view', $data);}
		else
		{$this->load->view('admin/items/rev_ae_items_view', $data);}
		//$this->load->view('admin/items/rev_ae_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_ae_status)&&$data['items'][0]->item_rev_ae_status==2)
		{$this->load->view('admin/items/rev_ae_aitems_view_erq_crq', $data);}
		else
		{$this->load->view('admin/items/rev_ae_items_view_erq_crq', $data);}
		//$this->load->view('admin/items/rev_ae_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aview($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_aitems_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aview_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_aitems_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==6)
		{
			if($this->input->post('submit'))
			{
				$result_rev = $this->Items_model->find_rev_item_by_id($id);
				if(empty($result_rev))
				{
					//die('Direct Submit');
					$data['items'] = $this->Items_model->get_rev_item_by_id($id);
					$data = array(
								'item_id' => $data['items'][0]->item_id,
								'item_code' => $data['items'][0]->item_code,
								'item_difficulty' => $data['items'][0]->item_difficulty,
								'item_discr' => $data['items'][0]->item_discr,
								'item_dif_code' => $data['items'][0]->item_dif_code,
								'item_registration' => $data['items'][0]->item_registration,
								'item_date_received' => $data['items'][0]->item_date_received,
								'item_submitted' => $data['items'][0]->item_submitted,
								'item_submittedby' => $data['items'][0]->item_submittedby,
								'item_updated' => $data['items'][0]->item_updated,
								'item_updatedby' => $data['items'][0]->item_updatedby,
								'item_grade_id' => $data['items'][0]->item_grade_id,
								'item_subject_id' => $data['items'][0]->item_subject_id,
								'item_cstand_id' => $data['items'][0]->item_cstand_id,
								'item_subcstand_id' => $data['items'][0]->item_subcstand_id,
								'item_slo_id' => $data['items'][0]->item_slo_id,
								'item_cognitive_bloom' => $data['items'][0]->item_cognitive_bloom,
								'item_curriculum' => $data['items'][0]->item_curriculum,
								'item_pctb_chapter' => $data['items'][0]->item_pctb_chapter,
								'item_pctb_page' => $data['items'][0]->item_pctb_page,
								'item_other_title' => $data['items'][0]->item_other_title,
								'item_other_year' => $data['items'][0]->item_other_year,
								'item_other_page' => $data['items'][0]->item_other_page,
								'item_relation' => $data['items'][0]->item_relation,
								'item_type' => $data['items'][0]->item_type,
								'item_stem_number' => $data['items'][0]->item_stem_number,
								'item_stem_en' => $data['items'][0]->item_stem_en,
								'item_stem_ur' => $data['items'][0]->item_stem_ur,
								'item_image_en' => $data['items'][0]->item_image_en,
								'item_image_ur' => $data['items'][0]->item_image_ur,
								'item_image_position' => $data['items'][0]->item_image_position,
								'item_option_layout' => $data['items'][0]->item_option_layout,
								'item_option_a_en' => $data['items'][0]->item_option_a_en,
								'item_option_a_ur' => $data['items'][0]->item_option_a_ur,
								'item_option_a_image' => $data['items'][0]->item_option_a_image,
								'item_option_b_en' => $data['items'][0]->item_option_b_en,
								'item_option_b_ur' => $data['items'][0]->item_option_b_ur,
								'item_option_b_image' => $data['items'][0]->item_option_b_image,
								'item_option_c_en' => $data['items'][0]->item_option_c_en,
								'item_option_c_ur' => $data['items'][0]->item_option_c_ur,
								'item_option_c_image' => $data['items'][0]->item_option_c_image,
								'item_option_d_en' => $data['items'][0]->item_option_d_en,
								'item_option_d_ur' => $data['items'][0]->item_option_d_ur,
								'item_option_d_image' => $data['items'][0]->item_option_d_image,
								'item_option_correct' => $data['items'][0]->item_option_correct,
								'item_sort' => $data['items'][0]->item_sort,
								'item_status' => $data['items'][0]->item_status,
								'item_approved' => $data['items'][0]->item_approved,
								'item_approvedby' => $data['items'][0]->item_approvedby,
								'item_reviewed' => $data['items'][0]->item_reviewed,
								'item_reviewedby' => $data['items'][0]->item_reviewedby,
								'item_rubric_english' => $data['items'][0]->item_rubric_english,
								'item_rubric_urdu' => $data['items'][0]->item_rubric_urdu,
								'item_rubric_image_position' => $data['items'][0]->item_rubric_image_position,
								'item_rubric_image' => $data['items'][0]->item_rubric_image,
								'item_status_ss' => $data['items'][0]->item_status_ss,
								'item_comment_ss' => $data['items'][0]->item_comment_ss,
								'item_status_ae' => $data['items'][0]->item_status_ae,
								'item_comment_ae' => $data['items'][0]->item_comment_ae,
								'item_status_psy' => $data['items'][0]->item_status_psy,
								'item_comment_psy' => $data['items'][0]->item_comment_psy,
								'item_date_psy' => $data['items'][0]->item_date_psy,
								'item_commentby_psy' => $data['items'][0]->item_commentby_psy,
								'item_batch' => $data['items'][0]->item_batch,
								);
					$data['item_rev_status'] = '2';
					$data['item_rev_revid'] = $this->session->userdata('admin_id');
					$data['item_rev_date_acc'] = date("Y-m-d H:i:s");
					$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
					$data['item_rev_comment'] = $this->input->post('item_rev_comment');
					$result = $this->Items_model->add_item_rev($data);
					if($result)
						{
							$result = $this->Items_model->update_item_exported('1', $id);
							$data = array(
								'log_itemid' => $id,
								'log_title' => 'Item reviewed by Item Reviewer',
								'log_message' => 'Item {{log_itemid}} reviewed by Item Reviewer {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>'rev_submitted',
								'log_admin_id' => $this->session->userdata('admin_id')
							);
							$log = $this->Items_model->log_entry($data);
							$this->session->set_flashdata('success', 'Item has been aceepted for piloting successfully!');
							redirect(base_url('admin/items/rev_pitems'));
						}
					else
					{
						$this->session->set_flashdata('errors', 'Error in Revision of Items!!! Please contact PEC IT Team');
						redirect(base_url('admin/items/rev_pitems'),'refresh');
					}	
				}
				else
				{
					if($result_rev[0]->item_rev_revid==$this->session->userdata('admin_id'))
					{
						//echo '<pre>';
						//print_r($_REQUEST);
						//echo '<hr />';
						//die('check for (My Item && then Edit and submit directly)  else not authorized');
					
						$data['item_rev_status'] = '2';
						$data['item_rev_date_acc'] = date("Y-m-d H:i:s");
						$data['item_rev_comment'] = $this->input->post('item_rev_comment');
						
						//print_r($data);
						//die();
						$result = $this->Items_model->rev_edit_items($data, $id);
						$log_messagetype='';
						if($this->session->userdata('role_id')==6)
						{$log_messagetype='rev_updated';}
						else
						{$log_messagetype='updated';}
						
						if($result){
							$data = array(
								'log_itemid' => $id,
								'log_admin_id' => $this->session->userdata('admin_id'),
								'log_title' => 'Item Updated',
								'log_message' => 'Item updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>$log_messagetype,
							);
							$log = $this->Items_model->log_entry($data);
							$this->session->set_flashdata('success', 'Item has been updated successfully!');
							if($this->session->userdata('role_id')==6)
							{
								redirect(base_url('admin/items/rev_pitems'));
							}
							else
							{
								redirect(base_url('admin/items/rev_pitems'));
							}
						}
					
					}
					else
					{
						die('Alert! This item already assigned to other iten reviewer');
					}
					
				}				
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	//rev_ss_submit_for_approval
	public function rev_ss_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$data['item_rev_ss_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ss_status'] = '2';
				$data['item_rev_ss_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ss_comment'] = $this->input->post('item_rev_ss_comment');
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/rev_ss_pitems'));
					}
					else
					{
						redirect(base_url('admin/items/rev_pitems'));
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_ae_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==4)
		{
			if($this->input->post('submit'))
			{
				$data['item_rev_ae_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ae_status'] = '2';
				$data['item_rev_ae_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ae_comment'] = $this->input->post('item_rev_ae_comment');
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/rev_ae_pitems'));
					}
					else
					{
						redirect(base_url('admin/items/rev_pitems'));
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_eitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('item_submittedby') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_ss_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_ss_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_ss_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_ae_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_ae_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_ae_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function datatable_json_revp_searched($id = 0)
	{	
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_REV_searched($subjectList,$id);
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_revp_ss_searched($id = 0)
	{	
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_searched($subjectList,$id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Alert! You are not authorized to do this action.');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_ss_status']=='0')?'Pending':'Under Review',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_revp_ae_searched($id = 0)
	{		
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_searched($subjectList,$id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Alert! You are not authorized to do this action.');
			}
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_ss_status']=='0')?'Pending':'Under Review',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_edit($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==6)
					{
						redirect(base_url('admin/items/rev_view/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/rev_pitems'));
					}
				}
			}
		}
		else
		{
			$result_rev = $this->Items_model->find_rev_item_by_id($id);
			if(empty($result_rev))
			{
				$data['items'] = $this->Items_model->get_rev_item_by_id($id);
				$data = array(
						'item_id' => $data['items'][0]->item_id,
						'item_code' => $data['items'][0]->item_code,
						'item_difficulty' => $data['items'][0]->item_difficulty,
						'item_discr' => $data['items'][0]->item_discr,
						'item_dif_code' => $data['items'][0]->item_dif_code,
						'item_registration' => $data['items'][0]->item_registration,
						'item_date_received' => $data['items'][0]->item_date_received,
						'item_submitted' => $data['items'][0]->item_submitted,
						'item_submittedby' => $data['items'][0]->item_submittedby,
						'item_updated' => $data['items'][0]->item_updated,
						'item_updatedby' => $data['items'][0]->item_updatedby,
						'item_grade_id' => $data['items'][0]->item_grade_id,
						'item_subject_id' => $data['items'][0]->item_subject_id,
						'item_cstand_id' => $data['items'][0]->item_cstand_id,
						'item_subcstand_id' => $data['items'][0]->item_subcstand_id,
						'item_slo_id' => $data['items'][0]->item_slo_id,
						'item_cognitive_bloom' => $data['items'][0]->item_cognitive_bloom,
						'item_curriculum' => $data['items'][0]->item_curriculum,
						'item_pctb_chapter' => $data['items'][0]->item_pctb_chapter,
						'item_pctb_page' => $data['items'][0]->item_pctb_page,
						'item_other_title' => $data['items'][0]->item_other_title,
						'item_other_year' => $data['items'][0]->item_other_year,
						'item_other_page' => $data['items'][0]->item_other_page,
						'item_relation' => $data['items'][0]->item_relation,
						'item_type' => $data['items'][0]->item_type,
						'item_stem_number' => $data['items'][0]->item_stem_number,
						'item_stem_en' => $data['items'][0]->item_stem_en,
						'item_stem_ur' => $data['items'][0]->item_stem_ur,
						'item_image_en' => $data['items'][0]->item_image_en,
						'item_image_ur' => $data['items'][0]->item_image_ur,
						'item_image_position' => $data['items'][0]->item_image_position,
						'item_option_layout' => $data['items'][0]->item_option_layout,
						'item_option_a_en' => $data['items'][0]->item_option_a_en,
						'item_option_a_ur' => $data['items'][0]->item_option_a_ur,
						'item_option_a_image' => $data['items'][0]->item_option_a_image,
						'item_option_b_en' => $data['items'][0]->item_option_b_en,
						'item_option_b_ur' => $data['items'][0]->item_option_b_ur,
						'item_option_b_image' => $data['items'][0]->item_option_b_image,
						'item_option_c_en' => $data['items'][0]->item_option_c_en,
						'item_option_c_ur' => $data['items'][0]->item_option_c_ur,
						'item_option_c_image' => $data['items'][0]->item_option_c_image,
						'item_option_d_en' => $data['items'][0]->item_option_d_en,
						'item_option_d_ur' => $data['items'][0]->item_option_d_ur,
						'item_option_d_image' => $data['items'][0]->item_option_d_image,
						'item_option_correct' => $data['items'][0]->item_option_correct,
						'item_sort' => $data['items'][0]->item_sort,
						'item_status' => $data['items'][0]->item_status,
						'item_approved' => $data['items'][0]->item_approved,
						'item_approvedby' => $data['items'][0]->item_approvedby,
						'item_reviewed' => $data['items'][0]->item_reviewed,
						'item_reviewedby' => $data['items'][0]->item_reviewedby,
						'item_rubric_english' => $data['items'][0]->item_rubric_english,
						'item_rubric_urdu' => $data['items'][0]->item_rubric_urdu,
						'item_rubric_image_position' => $data['items'][0]->item_rubric_image_position,
						'item_rubric_image' => $data['items'][0]->item_rubric_image,
						'item_status_ss' => $data['items'][0]->item_status_ss,
						'item_comment_ss' => $data['items'][0]->item_comment_ss,
						'item_status_ae' => $data['items'][0]->item_status_ae,
						'item_comment_ae' => $data['items'][0]->item_comment_ae,
						'item_status_psy' => $data['items'][0]->item_status_psy,
						'item_comment_psy' => $data['items'][0]->item_comment_psy,
						'item_date_psy' => $data['items'][0]->item_date_psy,
						'item_commentby_psy' => $data['items'][0]->item_commentby_psy,
						'item_batch' => $data['items'][0]->item_batch
						);
				$data['item_rev_status'] = '1';
				$data['item_rev_revid'] = $this->session->userdata('admin_id');
				$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				
				$result = $this->Items_model->add_item_rev($data);
				if($result)
				{
					$result = $this->Items_model->update_item_exported('1',$id);
					/*
					log entry karain on esported but not submitted
					*/
				}
				$data['title'] = 'Edit Item (Reviewer)';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['item'][0] = (array) $data['item'][0];
				//echo '<pre>';				
				//print_r($data['item']);
				//die();
				
				
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
				}		
				else
				{
					die('You are not authorized');
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else
			{
				$data['title'] = 'Edit Item (Reviewer)';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['item'][0] = (array) $data['item'][0];
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6 && $this->session->userdata('admin_id') == $data['item'][0]['item_rev_revid'])
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
				}		
				else
				{
					die('You are not authorized! This item is assigned to other reviewer!');
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}
	
	public function rev_edit_erq_crq($id = 0)
	{
		//die('Under development');
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					//'item_rubric_image' => $this->input->post('item_rubric_image'),
					'item_type' => 'ERQ',
					'item_registration' =>$this->input->post('item_registration'),
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Item Updated',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by IW/SS/REV {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==6)
						{
							redirect(base_url('admin/items/rev_view_erq_crq/'.$id));
						}
						else
						{
							redirect(base_url('admin/items/rev_pitems'));
						}
					}
				}
			}
		}
		else{
			$result_rev = $this->Items_model->find_rev_item_by_id($id);
			if(empty($result_rev))
			{
				$data['items'] = $this->Items_model->get_rev_item_by_id($id);
				$data = array(
						'item_id' => $data['items'][0]->item_id,
						'item_code' => $data['items'][0]->item_code,
						'item_difficulty' => $data['items'][0]->item_difficulty,
						'item_discr' => $data['items'][0]->item_discr,
						'item_dif_code' => $data['items'][0]->item_dif_code,
						'item_registration' => $data['items'][0]->item_registration,
						'item_date_received' => $data['items'][0]->item_date_received,
						'item_submitted' => $data['items'][0]->item_submitted,
						'item_submittedby' => $data['items'][0]->item_submittedby,
						'item_updated' => $data['items'][0]->item_updated,
						'item_updatedby' => $data['items'][0]->item_updatedby,
						'item_grade_id' => $data['items'][0]->item_grade_id,
						'item_subject_id' => $data['items'][0]->item_subject_id,
						'item_cstand_id' => $data['items'][0]->item_cstand_id,
						'item_subcstand_id' => $data['items'][0]->item_subcstand_id,
						'item_slo_id' => $data['items'][0]->item_slo_id,
						'item_cognitive_bloom' => $data['items'][0]->item_cognitive_bloom,
						'item_curriculum' => $data['items'][0]->item_curriculum,
						'item_pctb_chapter' => $data['items'][0]->item_pctb_chapter,
						'item_pctb_page' => $data['items'][0]->item_pctb_page,
						'item_other_title' => $data['items'][0]->item_other_title,
						'item_other_year' => $data['items'][0]->item_other_year,
						'item_other_page' => $data['items'][0]->item_other_page,
						'item_relation' => $data['items'][0]->item_relation,
						'item_type' => $data['items'][0]->item_type,
						'item_stem_number' => $data['items'][0]->item_stem_number,
						'item_stem_en' => $data['items'][0]->item_stem_en,
						'item_stem_ur' => $data['items'][0]->item_stem_ur,
						'item_image_en' => $data['items'][0]->item_image_en,
						'item_image_ur' => $data['items'][0]->item_image_ur,
						'item_image_position' => $data['items'][0]->item_image_position,
						'item_option_layout' => $data['items'][0]->item_option_layout,
						'item_option_a_en' => $data['items'][0]->item_option_a_en,
						'item_option_a_ur' => $data['items'][0]->item_option_a_ur,
						'item_option_a_image' => $data['items'][0]->item_option_a_image,
						'item_option_b_en' => $data['items'][0]->item_option_b_en,
						'item_option_b_ur' => $data['items'][0]->item_option_b_ur,
						'item_option_b_image' => $data['items'][0]->item_option_b_image,
						'item_option_c_en' => $data['items'][0]->item_option_c_en,
						'item_option_c_ur' => $data['items'][0]->item_option_c_ur,
						'item_option_c_image' => $data['items'][0]->item_option_c_image,
						'item_option_d_en' => $data['items'][0]->item_option_d_en,
						'item_option_d_ur' => $data['items'][0]->item_option_d_ur,
						'item_option_d_image' => $data['items'][0]->item_option_d_image,
						'item_option_correct' => $data['items'][0]->item_option_correct,
						'item_sort' => $data['items'][0]->item_sort,
						'item_status' => $data['items'][0]->item_status,
						'item_approved' => $data['items'][0]->item_approved,
						'item_approvedby' => $data['items'][0]->item_approvedby,
						'item_reviewed' => $data['items'][0]->item_reviewed,
						'item_reviewedby' => $data['items'][0]->item_reviewedby,
						'item_rubric_english' => $data['items'][0]->item_rubric_english,
						'item_rubric_urdu' => $data['items'][0]->item_rubric_urdu,
						'item_rubric_image_position' => $data['items'][0]->item_rubric_image_position,
						'item_rubric_image' => $data['items'][0]->item_rubric_image,
						'item_status_ss' => $data['items'][0]->item_status_ss,
						'item_comment_ss' => $data['items'][0]->item_comment_ss,
						'item_status_ae' => $data['items'][0]->item_status_ae,
						'item_comment_ae' => $data['items'][0]->item_comment_ae,
						'item_status_psy' => $data['items'][0]->item_status_psy,
						'item_comment_psy' => $data['items'][0]->item_comment_psy,
						'item_date_psy' => $data['items'][0]->item_date_psy,
						'item_commentby_psy' => $data['items'][0]->item_commentby_psy,
						'item_batch' => $data['items'][0]->item_batch,
						);
				$data['item_rev_status'] = '1';
				$data['item_rev_revid'] = $this->session->userdata('admin_id');
				$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				
				$result = $this->Items_model->add_item_rev($data);
				if($result)
				{
					$result = $this->Items_model->update_item_exported('1',$id);
				}
				/////////////////////////////////////////////////
				$data['title'] = 'Edit ERQ/CRQ Item';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['item'][0] = (array) $data['item'][0];
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
				}		
				else
				{
					die('You are not authorized');
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_erq_crq_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else
			{
				$data['title'] = 'Edit ERQ/CRQ Item (Item Reviewer)';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['item'][0] = (array) $data['item'][0];
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
				}		
				else
				{
					die('You are not authorized');
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_erq_crq_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}
	
	public function rev_ss_edit($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ss_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/rev_ss_view/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/rev_ss_pitems'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item (SS)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized! This item is assigned to other reviewer!');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ss_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ss_edit_erq_crq($id = 0)
	{
		//die('Under development');
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					//'item_rubric_image' => $this->input->post('item_rubric_image'),
					'item_type' => 'ERQ',
					'item_registration' =>$this->input->post('item_registration'),
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Item Updated',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by IW/SS/REV {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==2)
						{
							redirect(base_url('admin/items/rev_ss_view_erq_crq/'.$id));
						}
						else
						{
							redirect(base_url('admin/items/rev_pitems'));
						}
					}
				}
			}
		}
		else{
			$data['title'] = 'Edit ERQ/CRQ Item (SS)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ss_erq_crq_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		
		}
	}
	
	public function rev_ae_edit($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ae_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/rev_ae_view/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/rev_ae_pitems'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item (AE)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized! This item is assigned to other reviewer!');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ae_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ae_edit_erq_crq($id = 0)
	{
		//die('Under development');
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ae_erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_other_title' => $this->input->post('item_other_title'),
					'item_other_year' => $this->input->post('item_other_year'),
					'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					//'item_rubric_image' => $this->input->post('item_rubric_image'),
					'item_type' => 'ERQ',
					'item_registration' =>$this->input->post('item_registration'),
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Item Updated',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by IW/SS/REV {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==4)
						{
							redirect(base_url('admin/items/rev_ae_view_erq_crq/'.$id));
						}
						else
						{
							die('You are not authorized');
						}
					}
				}
			}
		}
		else{
			$data['title'] = 'Edit ERQ/CRQ Item (AE)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ae_erq_crq_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		
		}
	}
}
?>

<?php 
 /*public function rev_edit($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					'item_difficulty' => $this->input->post('item_difficulty'),
					'item_discr' => $this->input->post('item_discr'),
					'item_dif_code' => $this->input->post('item_dif_code'),
					'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					'item_pctb_page' => $this->input->post('item_pctb_page'),
					'item_relation' => $this->input->post('item_relation'),
					'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//echo '<hr />';
				//print_r($data);
				//die();
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated',
						'log_message' => 'Item updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==6)
					{
						redirect(base_url('admin/items/rev_view/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/rev_pitems'));
					}
				}
			}
		}
		else
		{
			$result_rev = $this->Items_model->find_rev_item_by_id($id);
			if(empty($result_rev))
			{
				$data['items'] = $this->Items_model->get_rev_item_by_id($id);
				$data = array(
						'item_id' => $data['items'][0]->item_id,
						'item_code' => $data['items'][0]->item_code,
						'item_difficulty' => $data['items'][0]->item_difficulty,
						'item_discr' => $data['items'][0]->item_discr,
						'item_dif_code' => $data['items'][0]->item_dif_code,
						'item_registration' => $data['items'][0]->item_registration,
						'item_date_received' => $data['items'][0]->item_date_received,
						'item_submitted' => $data['items'][0]->item_submitted,
						'item_submittedby' => $data['items'][0]->item_submittedby,
						'item_updated' => $data['items'][0]->item_updated,
						'item_updatedby' => $data['items'][0]->item_updatedby,
						'item_grade_id' => $data['items'][0]->item_grade_id,
						'item_subject_id' => $data['items'][0]->item_subject_id,
						'item_cstand_id' => $data['items'][0]->item_cstand_id,
						'item_subcstand_id' => $data['items'][0]->item_subcstand_id,
						'item_slo_id' => $data['items'][0]->item_slo_id,
						'item_cognitive_bloom' => $data['items'][0]->item_cognitive_bloom,
						'item_curriculum' => $data['items'][0]->item_curriculum,
						'item_pctb_chapter' => $data['items'][0]->item_pctb_chapter,
						'item_pctb_page' => $data['items'][0]->item_pctb_page,
						'item_other_title' => $data['items'][0]->item_other_title,
						'item_other_year' => $data['items'][0]->item_other_year,
						'item_other_page' => $data['items'][0]->item_other_page,
						'item_relation' => $data['items'][0]->item_relation,
						'item_type' => $data['items'][0]->item_type,
						'item_stem_number' => $data['items'][0]->item_stem_number,
						'item_stem_en' => $data['items'][0]->item_stem_en,
						'item_stem_ur' => $data['items'][0]->item_stem_ur,
						'item_image_en' => $data['items'][0]->item_image_en,
						'item_image_ur' => $data['items'][0]->item_image_ur,
						'item_image_position' => $data['items'][0]->item_image_position,
						'item_option_layout' => $data['items'][0]->item_option_layout,
						'item_option_a_en' => $data['items'][0]->item_option_a_en,
						'item_option_a_ur' => $data['items'][0]->item_option_a_ur,
						'item_option_a_image' => $data['items'][0]->item_option_a_image,
						'item_option_b_en' => $data['items'][0]->item_option_b_en,
						'item_option_b_ur' => $data['items'][0]->item_option_b_ur,
						'item_option_b_image' => $data['items'][0]->item_option_b_image,
						'item_option_c_en' => $data['items'][0]->item_option_c_en,
						'item_option_c_ur' => $data['items'][0]->item_option_c_ur,
						'item_option_c_image' => $data['items'][0]->item_option_c_image,
						'item_option_d_en' => $data['items'][0]->item_option_d_en,
						'item_option_d_ur' => $data['items'][0]->item_option_d_ur,
						'item_option_d_image' => $data['items'][0]->item_option_d_image,
						'item_option_correct' => $data['items'][0]->item_option_correct,
						'item_sort' => $data['items'][0]->item_sort,
						'item_status' => $data['items'][0]->item_status,
						'item_approved' => $data['items'][0]->item_approved,
						'item_approvedby' => $data['items'][0]->item_approvedby,
						'item_reviewed' => $data['items'][0]->item_reviewed,
						'item_reviewedby' => $data['items'][0]->item_reviewedby,
						'item_rubric_english' => $data['items'][0]->item_rubric_english,
						'item_rubric_urdu' => $data['items'][0]->item_rubric_urdu,
						'item_rubric_image_position' => $data['items'][0]->item_rubric_image_position,
						'item_rubric_image' => $data['items'][0]->item_rubric_image,
						'item_status_ss' => $data['items'][0]->item_status_ss,
						'item_comment_ss' => $data['items'][0]->item_comment_ss,
						'item_status_ae' => $data['items'][0]->item_status_ae,
						'item_comment_ae' => $data['items'][0]->item_comment_ae,
						'item_status_psy' => $data['items'][0]->item_status_psy,
						'item_comment_psy' => $data['items'][0]->item_comment_psy,
						'item_date_psy' => $data['items'][0]->item_date_psy,
						'item_commentby_psy' => $data['items'][0]->item_commentby_psy,
						'item_batch' => $data['items'][0]->item_batch,
						);
				$result = $this->Items_model->add_item_rev($data);
				if($result)
				{
					$data = array('item_exported' => 1);
					$result = $this->Items_model->add_item_exported($data);
				}
				$data['title'] = 'Edit Item (Reviewer)';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item']['item_grade_id']);
				}		
				else
				{
					$data['subjects'] = $this->Items_model->get_all_subjects();
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else
			{
				$data['title'] = 'Edit Item (Reviewer)';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item']['item_grade_id']);
				}		
				else
				{
					$data['subjects'] = $this->Items_model->get_all_subjects();
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}*/
?>