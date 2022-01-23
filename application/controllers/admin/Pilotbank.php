<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pilotbank extends MY_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Pilotbank_model', 'Pilotbank_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	/*public function index(){
		$data['title'] = 'Itemsbank List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itemsbank_list');
		$this->load->view('admin/includes/_footer');
	}*/
	
	public function datatable_json(){

		if($this->session->userdata('role_id')==1)
		{		
			$records = $this->Pilotbank_model->get_all_itemsbank();
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
			$records = $this->Pilotbank_model->get_all_itemsbank_IE($this->session->userdata('admin_id'),$subjectList);		
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
			$records = $this->Pilotbank_model->get_all_itemsbank_IW($this->session->userdata('admin_id'),$subjectList);		
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
				$this->form_validation->set_rules('pb_created', 'Date', 'trim|required');				
				$this->form_validation->set_rules('year_id', 'Year', 'trim|required');				
				$this->form_validation->set_rules('pb_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('pb_subject_id', 'Subject', 'trim|required');
				for($i=1; $i<=47; $i++){
					 $this->form_validation->set_rules('v1_item_id_'.$i, 'version 1 Item Code '.$i, 'trim|required');
					 $this->form_validation->set_rules('v2_item_id_'.$i, 'version 2 Item Code '.$i, 'trim|required');
					 $this->form_validation->set_rules('v3_item_id_'.$i, 'version 3 Item Code '.$i, 'trim|required');
					 $this->form_validation->set_rules('v4_item_id_'.$i, 'version 4 Item Code '.$i, 'trim|required');
					 $this->form_validation->set_rules('v5_item_id_'.$i, 'version 5 Item Code '.$i, 'trim|required');
				 }
				
				
				
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/pilotbank/add'),'refresh');
			}
			else{
				$data = array(
					
					'pb_created' => $this->input->post('pb_created'),
					'year_id' => $this->input->post('year_id'),
					'pb_grade_id' => $this->input->post('pb_grade_id'),
					'pb_subject_id' =>$this->input->post('pb_subject_id'),
					'pb_createdby' => $this->session->userdata('admin_id')
					);							
					$version_1_ids = array();
					$version_2_ids = array();
					$version_3_ids = array();
					$version_4_ids = array();
					$version_5_ids = array();
					for($i=1; $i<=50; $i++){
						$version_1_ids[] = $this->input->post('v1_item_id_'.$i);
						$version_2_ids[] = $this->input->post('v2_item_id_'.$i);
						$version_3_ids[] = $this->input->post('v3_item_id_'.$i);
						$version_4_ids[] = $this->input->post('v4_item_id_'.$i);
						$version_5_ids[] = $this->input->post('v5_item_id_'.$i);
					}
					//print_r($version_1_ids);
					$data['version_1_ids'] = $version_1_ids;
					$data['version_2_ids'] = $version_2_ids;
					$data['version_3_ids'] = $version_3_ids;
					$data['version_4_ids'] = $version_4_ids;
					$data['version_5_ids'] = $version_5_ids;
					//print_r($data);
					//exit;
					
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Pilotbank_model->add_pilotbank($data);
				//die($this->db->last_query());
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been added successfully!');
					redirect(base_url('admin/pilotbank/add'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Generate Items Bank';
			$data['grades'] = $this->Pilotbank_model->get_all_grades();
				
			$data['added_subjects'] = $this->Pilotbank_model->get_all_added_subjects();				
			
			
			//echo '<PRE>';
			//print_r($records[0]);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/pilot_bucket');
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
				$data['itemsbank'] = $this->Pilotbank_model->get_itemsbank_by_id($id);
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
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Pilotbank_model->edit_itemsbank($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been updated successfully!');
					redirect(base_url('admin/itemsbank'));
				}
			}
		}
		else{
			$data['title'] = 'Edit ItemsBank';
			$data['grades'] = $this->Pilotbank_model->get_all_grades();
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Pilotbank_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Pilotbank_model->get_all_subjects();
			}
			$data['cstands'] = $this->Pilotbank_model->get_all_cstands();
			$data['subcstands'] = $this->Pilotbank_model->get_all_subcstands();
			$data['slos'] = $this->Pilotbank_model->get_all_slos();
			$data['itemsbank'] = $this->Pilotbank_model->get_itemsbank_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/itemsbank_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function change_status()
	{   
		$this->Pilotbank_model->change_status();
	}
	public function change_status_approve()
	{
		$this->Pilotbank_model->change_status_approve();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Pilotbank_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==3)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Pilotbank_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Pilotbank_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function cstands_by_subject()
	{
		echo json_encode($this->Pilotbank_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	public function all_items_by_subject()
	{
		echo json_encode($this->Pilotbank_model->all_items_by_subject($this->input->post('subject_id')));		
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Pilotbank_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function slos_by_subcstands()
	{
		echo json_encode($this->Pilotbank_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function item_by_slo()
	{
		echo json_encode($this->Pilotbank_model->get_item_by_slo($this->input->post('slo_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function view($id = 0)
	{
			//$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Pilotbank_model->get_all_grades();
			$data['itemsbank'] = $this->Pilotbank_model->get_itemsbank_by_id($id);
			
			$data['ib_b1_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item1);
			$data['ib_b1_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item2);
			$data['ib_b1_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item3);
			$data['ib_b1_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item4);
			
			$data['ib_b2_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item1);
			$data['ib_b2_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item2);
			$data['ib_b2_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item3);
			$data['ib_b2_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item4);

			$data['ib_b3_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item1);
			$data['ib_b3_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item2);
			$data['ib_b3_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item3);
			$data['ib_b3_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item4);

			$data['ib_b4_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item1);
			$data['ib_b4_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item2);
			$data['ib_b4_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item3);
			$data['ib_b4_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item4);

			$data['ib_b5_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item1);
			$data['ib_b5_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item2);
			$data['ib_b5_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item3);
			$data['ib_b5_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item4);

			$data['ib_b6_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item1);
			$data['ib_b6_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item2);
			$data['ib_b6_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item3);
			$data['ib_b6_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item4);

			$data['ib_b7_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item1);
			$data['ib_b7_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item2);
			$data['ib_b7_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item3);
			$data['ib_b7_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item4);

			$data['ib_b8_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item1);
			$data['ib_b8_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item2);
			$data['ib_b8_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item3);
			$data['ib_b8_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item4);

			$data['ib_b9_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item1);
			$data['ib_b9_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item2);
			$data['ib_b9_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item3);
			$data['ib_b9_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item4);

			$data['ib_b10_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item1);
			$data['ib_b10_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item2);
			$data['ib_b10_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item3);
			$data['ib_b10_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item4);

			$data['ib_b11_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item1);
			$data['ib_b11_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item2);
			$data['ib_b11_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item3);
			$data['ib_b11_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item4);

			$data['ib_b12_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item1);
			$data['ib_b12_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item2);
			$data['ib_b12_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item3);
			$data['ib_b12_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item4);

			$data['ib_b13_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item1);
			$data['ib_b13_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item2);
			$data['ib_b13_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item3);
			$data['ib_b13_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item4);

			$data['ib_b14_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item1);
			$data['ib_b14_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item2);
			$data['ib_b14_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item3);
			$data['ib_b14_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item4);

			$data['ib_b15_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item1);
			$data['ib_b15_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item2);
			$data['ib_b15_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item3);
			$data['ib_b15_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item4);

			$data['ib_b16_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item1);
			$data['ib_b16_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item2);
			$data['ib_b16_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item3);
			$data['ib_b16_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item4);

			$data['ib_b17_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item1);
			$data['ib_b17_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item2);
			$data['ib_b17_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item3);
			$data['ib_b17_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item4);

			$data['ib_b18_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item1);
			$data['ib_b18_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item2);
			$data['ib_b18_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item3);
			$data['ib_b18_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item4);

			$data['ib_b19_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item1);
			$data['ib_b19_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item2);
			$data['ib_b19_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item3);
			$data['ib_b19_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item4);

			$data['ib_b20_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item1);
			$data['ib_b20_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item2);
			$data['ib_b20_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item3);
			$data['ib_b20_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item4);

			$data['ib_b21_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item1);
			$data['ib_b21_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item2);
			$data['ib_b21_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item3);
			$data['ib_b21_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item4);

			$data['ib_b22_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item1);
			$data['ib_b22_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item2);
			$data['ib_b22_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item3);
			$data['ib_b22_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item4);

			$data['ib_b23_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item1);
			$data['ib_b23_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item2);
			$data['ib_b23_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item3);
			$data['ib_b23_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item4);

			$data['ib_b24_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item1);
			$data['ib_b24_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item2);
			$data['ib_b24_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item3);
			$data['ib_b24_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item4);

			$data['ib_b25_item1'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item1);
			$data['ib_b25_item2'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item2);
			$data['ib_b25_item3'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item3);
			$data['ib_b25_item4'] = $this->Pilotbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item4);
			
			
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
    ////////////////////////////////////////////////////////////////////////////////
    public function index(){
		$data['title'] = 'Pilotsbank List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/pilotbank_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_pilot(){

		if($this->session->userdata('role_id')==1)
		{		
			$records = $this->Pilotbank_model->get_all_itemsbank();
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
			$records = $this->Pilotbank_model->get_all_pilotbank($subjectList);	//get_all_itemsbank_IE	
			
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['pb_year_id'],
				$row['pb_createdby'],
				$row['pb_created'],
				'<a title="View" class="view btn btn-sm btn-info" target="_blank" href="'.base_url('admin/pilotbank/ver_view/'.$row['pb_id']).'/1"> V-1</a>
				<a title="View" class="view btn btn-sm btn-info" target="_blank" href="'.base_url('admin/pilotbank/ver_view/'.$row['pb_id']).'/2"> V-2</a>
				<a title="View" class="view btn btn-sm btn-info" target="_blank" href="'.base_url('admin/pilotbank/ver_view/'.$row['pb_id']).'/3"> V-3</a>
				<a title="View" class="view btn btn-sm btn-info" target="_blank" href="'.base_url('admin/pilotbank/ver_view/'.$row['pb_id']).'/4"> V-4</a>
				<a title="View" class="view btn btn-sm btn-info" target="_blank" href="'.base_url('admin/pilotbank/ver_view/'.$row['pb_id']).'/5"> V-5</a>
				<a title="View" class="view btn btn-sm btn-info" target="_blank" href="'.base_url('admin/pilotbank/erqs_view/'.$row['pb_subject_id']).'"> ERQs Paper</a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
		}
		else
		{		
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Pilotbank_model->get_all_itemsbank_IW($this->session->userdata('admin_id'),$subjectList);		
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
	public function ver_view($pd_id=0, $ver_id = 0)
	{
		$data['paper_mcqs'] = $this->Pilotbank_model->get_ver_detail($pd_id, $ver_id);
		$data['ver_id'] =  $ver_id;
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/pilotbank_view', $data);
		$this->load->view('admin/includes/_footer');
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function pilot_view_combine($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Pilotbank_model->get_all_grades();
		$data['items'] = $this->Pilotbank_model->get_pilot_item_by_id($id);
		
		$data['iwinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['items'][0]->item_submittedby);
		
		if(isset($data['items'][0]->item_approvedby)&&$data['items'][0]->item_approvedby!=0)
		{
			$data['ssinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['items'][0]->item_approvedby);
		}
		if(isset($data['items'][0]->item_reviewedby)&&$data['items'][0]->item_reviewedby!=0)
		{
			$data['aeinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['items'][0]->item_reviewedby);
		}
		if(isset($data['items'][0]->item_commentby_psy)&&$data['items'][0]->item_commentby_psy!=0)
		{
			$data['psyinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['items'][0]->item_commentby_psy);
		}
		if(isset($data['items'][0]->item_rev_revid)&&$data['items'][0]->item_rev_revid!=0)
		{
			$data['rev_irinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['items'][0]->item_rev_revid);
		}
		if(isset($data['items'][0]->item_rev_ss_id)&&$data['items'][0]->item_rev_ss_id!=0)
		{
			$data['rev_ssinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['items'][0]->item_rev_ss_id);
		}
		if(isset($data['items'][0]->item_rev_ae_id)&&$data['items'][0]->item_rev_ae_id!=0)
		{
			$data['rev_aeinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['items'][0]->item_rev_ae_id);
		}
		if(isset($data['items'][0]->item_rev_psy_id)&&$data['items'][0]->item_rev_psy_id!=0)
		{
			$data['rev_psyinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['items'][0]->item_rev_psy_id);
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/pilot_items_view_combine', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function pilot_edit_combine($id=0)
	{
		if($this->input->post('submit'))
		{
			$item_type = $this->input->post('item_type');
			if($item_type=='ERQ')
			{
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
							
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
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
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					'item_registration' =>$this->input->post('item_registration'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_batch' => $this->input->post('item_batch')
				);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$result = $this->Pilotbank_model->pilot_edit_items($data, $id);
					
					if($result)
					{
						$this->session->set_flashdata('success', 'Pilot Item/Question has been updated successfully!');						
						redirect(base_url('admin/Pilotbank/pilot_view_combine/'.$id), 'refresh');
					}
					else
					{
						$this->session->set_flashdata('error', 'Pilot item could not be updated');
						redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
					}
				}
			}
			elseif($item_type=='MCQ')
			{
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
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
				}
				else
				{
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
						'item_type' => $this->input->post('item_type'),
						'item_option_correct' => $this->input->post('item_option_correct'),
						'item_batch' => $this->input->post('item_batch')
					);
						$data['item_updated'] = date('Y-m-d H:i:s');
						$data['item_updatedby'] = $this->session->userdata('admin_id');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							rredirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
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
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					$result = $this->Pilotbank_model->pilot_edit_items($data, $id);
					
					if($result)
					{
						$this->session->set_flashdata('success', 'Pilot Item/Question has been updated successfully!');						
						redirect(base_url('admin/Pilotbank/pilot_view_combine/'.$id), 'refresh');
					}
					else
					{
						$this->session->set_flashdata('error', 'Pilot item could not be updated');
						redirect(base_url('admin/Pilotbank/pilot_edit_combine/'.$id), 'refresh');
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item';
			$data['item'] = $this->Pilotbank_model->get_pilot_item_by_id($id);
			//$data['item'] = $this->Pilot_Items_model->get_pilot_item_by_id($id);
			$data['item'] = (array)$data['item'][0];
			$data['grades'] = $this->Pilotbank_model->get_all_grades();
			$subjectList = $this->session->userdata('subjects_ids');						
			$data['subjects'] = $this->Pilotbank_model->get_ae_subjects_grade($subjectList,$data['item']['item_grade_id']);//this function is functioning for users
			$data['cstands'] = $this->Pilotbank_model->get_all_cstands_iw($data['item']['item_subject_id']);
			$data['subcstands'] = $this->Pilotbank_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
			$data['slos'] = $this->Pilotbank_model->get_all_slos_iw($data['item']['item_subcstand_id']);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/pilot_items_edit_combine');
			$this->load->view('admin/includes/_footer');
		}	
	}
	
	public function erqs_view($id=0)
	{
		//echo '<pre>';
		//print_r($_SESSION);
		die('Alert! Go Back');
		$data['title'] = 'Individual ERQ';
		$data['paper_erqs'] = $this->Pilotbank_model->erq_items_by_subject($id);
		$data['iwinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['paper_erqs'][0]->item_submittedby);
		if(empty($data['paper_erqs']))
		{
			$this->session->set_flashdata('error', 'No ERQ item found!');
			redirect(base_url('admin/pilotbank/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/itemsbank/pilotpaper_view_erq_indiv', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	public function left_erqs_view($id)
	{
		$data['title'] = 'Individual ERQ';
		$data['paper_erqs'] = $this->Pilotbank_model->left_erq_items_by_subject($id);
		$data['iwinfo'] = $this->Pilotbank_model->get_userinfo_by_id($data['paper_erqs'][0]->item_submittedby);
		if(empty($data['paper_erqs']))
		{
			$this->session->set_flashdata('error', 'No ERQ item found!');
			redirect(base_url('admin/pilotbank/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/itemsbank/pilotpaper_view_erq_indiv', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
}
?>