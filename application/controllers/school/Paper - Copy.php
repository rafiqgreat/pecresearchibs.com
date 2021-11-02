<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Paper extends MY_Controller {

	public function __construct(){
		parent::__construct();
		auth_check_school(); // check login auth
		$this->load->model('school/Paper_model', 'Paper_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){
		$data['title'] = 'Paper List';
		$this->load->view('school/includes/_header', $data);
		$this->load->view('school/paper/paper_list');
		$this->load->view('school/includes/_footer');
	}
	
	public function datatable_json(){
		
		$records = $this->Paper_model->get_all_paper($this->session->userdata('school_id'));
		
		$data = array();
		//echo '<PRE>';
		//print_r($records);
		//die();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['paper_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['paper_number'],
				$row['paper_title_en'],
				$row['paper_title_ur'],
				$row['paper_date'],
				$row['paper_total_marks'],
				$row['paper_type'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['paper_id'].'" 
				id="cb_'.$row['paper_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['paper_id'].'"></label>',		

				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('school/paper/view/'.$row['paper_id']).'"> <i class="fa fa-eye"></i></a>'
				/*<a title="Edit" class="update btn btn-sm btn-warning" href="javascript:alert(\'Sorry! Cannot edit! contact administrator!\');"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("school/paper/delete/".$row['paper_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>*/
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);						   
	}
	
		public function view($id = 0){
			$data['title'] = 'View Paper';
			$data['grades'] = $this->Paper_model->get_all_grades();
			$data['papers'] = $this->Paper_model->get_paper_by_id($id);
			
			$data['item1'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b1);
			$data['item2'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b2);
			$data['item3'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b3);
			$data['item4'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b4);
			$data['item5'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b5);
			$data['item6'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b6);
			$data['item7'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b7);
			$data['item8'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b8);
			$data['item9'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b9);
			$data['item10'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b10);
			$data['item11'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b11);
			$data['item12'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b12);
			$data['item13'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b13);
			$data['item14'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b14);
			$data['item15'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b15);
			$data['item16'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b16);
			$data['item17'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b17);
			$data['item18'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b18);
			$data['item19'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b19);
			$data['item20'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b20);
			$data['item21'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b21);
			$data['item22'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b22);
			$data['item23'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b23);
			$data['item24'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b24);
			$data['item25'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b25);
			
			//echo '<PRE>';
		//print_r($data['paper']);
		//die('-------------------');
			
			
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_view', $data);
			$this->load->view('school/includes/_footer');
	}


	
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Paper_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
	
	
	
	public function get_itemsbank_for_subject()
	{
		echo json_encode($this->Paper_model->get_itemsbank_for_subject($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id2()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id2($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id3()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id3($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id4()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id4($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id5()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id5($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id6()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id6($this->input->post('subject_id')));
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function add()
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
				redirect(base_url('school/paper/add'),'refresh');
			}
			else{
				$data = array(
					'ib_title' => $this->input->post('ib_title'),
					'ib_created' => $this->input->post('ib_created'),
					'ib_year' => $this->input->post('ib_year'),
					'ib_grade_id' => $this->input->post('ib_grade_id'),
					'ib_subject_id' =>$this->input->post('ib_subject_id'),
					'ib_createdby' => $this->session->userdata('school_id'),							
					
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
				$result = $this->Paper_model->add_paper($data);
				//die($this->db->last_query());
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been added successfully!');
					redirect(base_url('school/paper'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Generate Paper';
			$data['grades'] = $this->Paper_model->get_all_grades();				
			$data['added_subjects'] = $this->Paper_model->get_all_added_subjects();				
			//echo '<PRE>';
			//print_r($records[0]);
			//die();
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_add');
			$this->load->view('school/includes/_footer');
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
				$data['paper'] = $this->Paper_model->get_paper_by_id($id);
				$data['view'] = 'school/paper/paper_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'ib_title' => $this->input->post('ib_title'),
					'ib_created' => $this->input->post('ib_created'),
					'ib_year' => $this->input->post('ib_year'),
					'ib_grade_id' => $this->input->post('ib_grade_id'),
					'ib_subject_id' =>$this->input->post('ib_subject_id'),
					'ib_createdby' => $this->session->userdata('school_id'),							
					
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
				$result = $this->Paper_model->edit_paper($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been updated successfully!');
					redirect(base_url('school/paper'));
				}
			}
		}
		else{
			$data['title'] = 'Edit ItemsBank';
			$data['grades'] = $this->Paper_model->get_all_grades();
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Paper_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Paper_model->get_all_subjects();
			}
			$data['cstands'] = $this->Paper_model->get_all_cstands();
			$data['subcstands'] = $this->Paper_model->get_all_subcstands();
			$data['slos'] = $this->Paper_model->get_all_slos();
			$data['paper'] = $this->Paper_model->get_paper_by_id($id);
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_edit', $data);
			$this->load->view('school/includes/_footer');
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function change_status()
	{   
		$this->Paper_model->change_status();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subjects_by_grade()
	{
		echo json_encode($this->Paper_model->get_subjects_by_grade($this->input->post('grade_id')));			
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function cstands_by_subject()
	{
		echo json_encode($this->Paper_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Paper_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function slos_by_subcstands()
	{
		echo json_encode($this->Paper_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function item_by_slo()
	{
		echo json_encode($this->Paper_model->get_item_by_slo($this->input->post('slo_id')));
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function create_paper_pdf()
	{
 			$data['papers'] = $this->Paper_model->get_paper_by_id($id);			
			$data['item1'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b1);
			$data['item2'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b2);
			$data['item3'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b3);
			$data['item4'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b4);
			$data['item5'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b5);
			$data['item6'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b6);
			$data['item7'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b7);
			$data['item8'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b8);
			$data['item9'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b9);
			$data['item10'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b10);
			$data['item11'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b11);
			$data['item12'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b12);
			$data['item13'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b13);
			$data['item14'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b14);
			$data['item15'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b15);
			$data['item16'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b16);
			$data['item17'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b17);
			$data['item18'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b18);
			$data['item19'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b19);
			$data['item20'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b20);
			$data['item21'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b21);
			$data['item22'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b22);
			$data['item23'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b23);
			$data['item24'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b24);
			$data['item25'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b25);

		$this->load->view('school/paper/paper_pdf', $data);
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function delete($id = 0)
	{
		$this->db->delete('ci_paper', array('ib_id' => $id));
		$this->session->set_flashdata('success', 'ItemBank has been deleted successfully!');
		redirect(base_url('school/paper'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_items_pdf(){

		//$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['paper'] = $this->Paper_model->get_paper_for_export();
		$this->load->view('school/paper/paper_pdf', $data);
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