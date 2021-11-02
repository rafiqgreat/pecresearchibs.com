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
		$arr_ur_en_subjects = [12,18,25,31,39,47,13,19,26,32,40,48];
		$data = array();
		//echo '<PRE>';
		//print_r($records);
		//die();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			
			$paper_status = ($row['paper_status']==0)?'Incomplete <img src="'.base_url('assets/img/layouts/icon_progrss_new.png').'" width="30" />':'Completed <img src="'.base_url('assets/img/layouts/icon_completed_new.png').'" width="30" />';
			
			if( in_array($row['paper_subject_id'],$arr_ur_en_subjects))
			{
				$status = ($row['paper_status'] == 0)? '<a title="Add Questions" class="update btn btn-sm btn-warning" href="'.base_url('school/paper/add_questionsp/'.$row['paper_id']).'"> <i class="fa fa-pencil-square-o"></i></a>': '<a title="View & Print" class="view btn btn-sm btn-info" href="'.base_url('school/paper/viewp/'.$row['paper_id']).'"> <i class="fa fa-eye"></i></a>'.'<a title="Key" class="view btn btn-sm btn-info" style="margin-left:3px" href="'.base_url('school/paper/key/'.$row['paper_id']).'"> <i class="fa fa-key"></i></a>';
			}
			else
			{
				$status = ($row['paper_status'] == 0)? '<a title="Add Questions" class="update btn btn-sm btn-warning" href="'.base_url('school/paper/add_questions/'.$row['paper_id']).'"> <i class="fa fa-pencil-square-o"></i></a>': '<a title="View & Print" class="view btn btn-sm btn-info" href="'.base_url('school/paper/view/'.$row['paper_id']).'"> <i class="fa fa-eye"></i></a>'.'<a title="Key" class="view btn btn-sm btn-info" style="margin-left:3px" href="'.base_url('school/paper/key/'.$row['paper_id']).'"> <i class="fa fa-key"></i></a>';
			}
			
			
			$data[]= array(
				++$i,
				$row['paper_title_en'],
				$row['paper_number'],
				$row['grade_code'],
				$row['subject_name_en'],
				$row['paper_date'],
				$paper_status,
				$status
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
			$data['papers'] = $this->Paper_model->get_paper_by_id($id);
			$data['tehsil'] = $this->Paper_model->get_tehsil_by_id($data['papers'][0]->school_tehsil_id);
			$data['district'] = $this->Paper_model->get_district_by_id($data['papers'][0]->school_district_id);
			//echo '<PRE>';
			//print_r($data['papers']);
			//die();
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
			
			//print_r($data['item1']);
			//die();
			
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_view', $data);
			$this->load->view('school/includes/_footer');
	}

	public function viewp($id = 0){
			$data['title'] = 'View Paper';
			$data['papers'] = $this->Paper_model->get_paper_by_id($id);
			$data['tehsil'] = $this->Paper_model->get_tehsil_by_id($data['papers'][0]->school_tehsil_id);
			$data['district'] = $this->Paper_model->get_district_by_id($data['papers'][0]->school_district_id);
			if($data['papers'][0]->paper_para16!=0){$data['paragraph16'] = $this->Paper_model->get_para_by_id($data['papers'][0]->paper_para16);}
			if($data['papers'][0]->paper_para21!=0){$data['paragraph21'] = $this->Paper_model->get_para_by_id($data['papers'][0]->paper_para21);}
			if($data['papers'][0]->paper_para22!=0){$data['paragraph22'] = $this->Paper_model->get_para_by_id($data['papers'][0]->paper_para22);}
			
			//echo '<PRE>';
			//print_r($data['paragraph16']);
			//die();

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
			
			//echo "<PRE>";
			//print_r($data['papers']);
			//die();
			
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_viewp', $data);
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
				/*echo '<PRE>';
				print_r($_REQUEST);	
				die('------------------add------------------');*/
				$this->form_validation->set_rules('paper_title_en', 'Paper Title', 'trim|required');				
				$this->form_validation->set_rules('paper_date', 'Paper Date', 'trim|required');				
				$this->form_validation->set_rules('paper_number', 'PAPER ID', 'trim|required');				
				$this->form_validation->set_rules('paper_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('paper_subject_id', 'Subject', 'trim|required');
				
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('school/paper/add'),'refresh');
			}
			else{
				$data = array(
					'paper_title_en' => $this->input->post('paper_title_en'),
					'paper_date' => $this->input->post('paper_date'),
					'paper_number' => $this->input->post('paper_number'),
					'paper_grade_id' => $this->input->post('paper_grade_id'),
					'paper_subject_id' =>$this->input->post('paper_subject_id'),
					'paper_school_id' => $this->session->userdata('school_id'),
					'paper_createdby' => $this->session->userdata('school_id'),
					'paper_status' => 0
				);
				
				//print_r($data);
				//die();				
				$data = $this->security->xss_clean($data);
				$result = $this->Paper_model->add_paper($data);
				//die($this->db->last_query());
				$arr_ur_en_subjects = [12,18,25,31,39,47,13,19,26,32,40,48];
				if($result){
					if( in_array($this->input->post('paper_subject_id'),$arr_ur_en_subjects))
					   {
						   $this->session->set_flashdata('success', 'Paper Generated Started, Now Select Questions for your paper!');
							redirect(base_url('school/paper/add_questionsp/').$result);
					   }
					 else
					 {
						$this->session->set_flashdata('success', 'Paper Generated Started, Now Select Questions for your paper!');
						redirect(base_url('school/paper/add_questions/').$result); 
					 }
					
				}
			}
		}
		else
		{
			$data['title'] = 'Generate Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks();				
			$data['added_subjects'] = $this->Paper_model->get_all_added_subjects();				
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_add');
			$this->load->view('school/includes/_footer');
		}		
	}
	public function add_questions($id = 0)	
	{	
		/*echo '<PRE>';
			print_r($_REQUEST);	
			die('------------------add questions------------------');
			*/
		if($this->input->post('paper_id'))
		{
			/*echo '<PRE>';
			print_r($_REQUEST);	
			die('------------------add questions------------------'); */
			
			
			$paper_subject_id = $this->input->post('paper_subject_id');
			$header 	= $this->Paper_model->get_header_by_id($paper_subject_id);			
			$data = array(
				'paper_general_inst' => $header[0]->pi_general_instruction,
				'paper_instructions_en' => $header[0]->pi_paper_instruction_en,
				'paper_instructions_ur' => $header[0]->pi_paper_instruction_ur,
				'paper_total_marks' => $header[0]->pi_paper_marks,
				'paper_type' => $header[0]->pi_paper_type,
				'paper_time' => $header[0]->pi_paper_time,
				'paper_item_b1' => $this->input->post('paper_item_b1'),
				'paper_item_b2' => $this->input->post('paper_item_b2'),
				'paper_item_b3' => $this->input->post('paper_item_b3'),
				'paper_item_b4' => $this->input->post('paper_item_b4'),
				'paper_item_b5' => $this->input->post('paper_item_b5'),
				'paper_item_b6' => $this->input->post('paper_item_b6'),
				'paper_item_b7' => $this->input->post('paper_item_b7'),
				'paper_item_b8' => $this->input->post('paper_item_b8'),
				'paper_item_b9' => $this->input->post('paper_item_b9'),
				'paper_item_b10' => $this->input->post('paper_item_b10'),
				'paper_item_b11' => $this->input->post('paper_item_b11'),
				'paper_item_b12' => $this->input->post('paper_item_b12'),
				'paper_item_b13' => $this->input->post('paper_item_b13'),
				'paper_item_b14' => $this->input->post('paper_item_b14'),
				'paper_item_b15' => $this->input->post('paper_item_b15'),
				'paper_item_b16' => ($this->input->post('paper_item_b16')!="")?$this->input->post('paper_item_b16'):0,
				'paper_item_b17' => ($this->input->post('paper_item_b17')!="")?$this->input->post('paper_item_b17'):0,
				'paper_item_b18' => ($this->input->post('paper_item_b18')!="")?$this->input->post('paper_item_b18'):0,
				'paper_item_b19' => ($this->input->post('paper_item_b19')!="")?$this->input->post('paper_item_b19'):0,
				'paper_item_b20' => ($this->input->post('paper_item_b20')!="")?$this->input->post('paper_item_b20'):0,
				'paper_item_b21' => ($this->input->post('paper_item_b21')!="")?$this->input->post('paper_item_b21'):0,
				'paper_item_b22' => ($this->input->post('paper_item_b22')!="")?$this->input->post('paper_item_b22'):0,
				'paper_item_b23' => ($this->input->post('paper_item_b23')!="")?$this->input->post('paper_item_b23'):0,
				'paper_item_b24' => ($this->input->post('paper_item_b24')!="")?$this->input->post('paper_item_b24'):0,
				'paper_item_b25' => ($this->input->post('paper_item_b25')!="")?$this->input->post('paper_item_b25'):0,
				'paper_school_id' => $this->session->userdata('school_id'),
				'paper_createdby' => $this->session->userdata('school_id'),		
				'paper_status' => 1
			);

			/*print_r($data);
			die();				*/
			//$data = $this->security->xss_clean($data);
			$result = $this->Paper_model->edit_paper($data, $id);
			//die($this->db->last_query());
			if($result){
				$this->session->set_flashdata('success', 'Paper Generated Successfully, Now you can view your paper and Print!');
				redirect(base_url('school/paper/'));
			}
		
	}
		else
		{
			$data['title'] = 'Select Questions for Paper';
			$data['paper'] = $this->Paper_model->get_paper_by_id($id);
			if(!isset($data['paper'][0]->paper_subject_id)){ $this->session->set_flashdata('error', 'Issue with Paper! You can create New Paper');
				redirect(base_url('school/paper/add')); }
			$data['itemsbank'] = $this->Paper_model->get_itemsbank_by_id($data['paper'][0]->paper_subject_id);
			
			$data['ib_b1_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item1']);
			$data['ib_b1_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item2']);
			$data['ib_b1_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item3']);
			$data['ib_b1_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item4']);

			$data['ib_b2_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item1']);
			$data['ib_b2_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item2']);
			$data['ib_b2_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item3']);
			$data['ib_b2_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item4']);

			$data['ib_b3_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item1']);
			$data['ib_b3_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item2']);
			$data['ib_b3_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item3']);
			$data['ib_b3_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item4']);

			$data['ib_b4_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item1']);
			$data['ib_b4_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item2']);
			$data['ib_b4_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item3']);
			$data['ib_b4_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item4']);

			$data['ib_b5_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item1']);
			$data['ib_b5_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item2']);
			$data['ib_b5_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item3']);
			$data['ib_b5_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item4']);

			$data['ib_b6_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item1']);
			$data['ib_b6_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item2']);
			$data['ib_b6_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item3']);
			$data['ib_b6_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item4']);

			$data['ib_b7_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item1']);
			$data['ib_b7_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item2']);
			$data['ib_b7_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item3']);
			$data['ib_b7_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item4']);

			$data['ib_b8_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item1']);
			$data['ib_b8_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item2']);
			$data['ib_b8_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item3']);
			$data['ib_b8_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item4']);

			$data['ib_b9_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item1']);
			$data['ib_b9_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item2']);
			$data['ib_b9_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item3']);
			$data['ib_b9_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item4']);

			$data['ib_b10_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item1']);
			$data['ib_b10_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item2']);
			$data['ib_b10_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item3']);
			$data['ib_b10_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item4']);

			$data['ib_b11_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item1']);
			$data['ib_b11_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item2']);
			$data['ib_b11_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item3']);
			$data['ib_b11_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item4']);

			$data['ib_b12_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item1']);
			$data['ib_b12_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item2']);
			$data['ib_b12_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item3']);
			$data['ib_b12_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item4']);

			$data['ib_b13_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item1']);
			$data['ib_b13_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item2']);
			$data['ib_b13_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item3']);
			$data['ib_b13_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item4']);

			$data['ib_b14_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item1']);
			$data['ib_b14_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item2']);
			$data['ib_b14_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item3']);
			$data['ib_b14_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item4']);

			$data['ib_b15_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item1']);
			$data['ib_b15_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item2']);
			$data['ib_b15_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item3']);
			$data['ib_b15_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item4']);

		$data['ib_b16_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item1']);
		$data['ib_b16_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item2']);
		$data['ib_b16_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item3']);
		$data['ib_b16_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item4']);

		$data['ib_b17_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item1']);
		$data['ib_b17_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item2']);
		$data['ib_b17_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item3']);
		$data['ib_b17_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item4']);

		$data['ib_b18_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item1']);
		$data['ib_b18_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item2']);
		$data['ib_b18_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item3']);
		$data['ib_b18_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item4']);

		$data['ib_b19_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item1']);
		$data['ib_b19_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item2']);
		$data['ib_b19_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item3']);
		$data['ib_b19_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item4']);

		$data['ib_b20_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item1']);
		$data['ib_b20_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item2']);
		$data['ib_b20_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item3']);
		$data['ib_b20_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item4']);

		$data['ib_b21_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item1']);
		$data['ib_b21_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item2']);
		$data['ib_b21_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item3']);
		$data['ib_b21_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item4']);

		$data['ib_b22_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item1']);
		$data['ib_b22_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item2']);
		$data['ib_b22_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item3']);
		$data['ib_b22_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item4']);

		$data['ib_b23_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item1']);
		$data['ib_b23_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item2']);
		$data['ib_b23_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item3']);
		$data['ib_b23_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item4']);

		$data['ib_b24_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item1']);
		$data['ib_b24_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item2']);
		$data['ib_b24_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item3']);
		$data['ib_b24_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item4']);

		$data['ib_b25_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item1']);
		$data['ib_b25_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item2']);
		$data['ib_b25_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item3']);
		$data['ib_b25_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item4']);
			
			/* 
			echo '<pre>';
			print_r($data['paper']);
			print_r($data['itembank']);
			die();
			*/
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_questions_add');
			$this->load->view('school/includes/_footer');
		}		
	}
	public function add_questionsp($id = 0)	
	{	
		/*echo '<PRE>';
			print_r($_REQUEST);	
			die('------------------add questionsp------------------');
			*/
		if($this->input->post('paper_id'))
		{
			/*echo '<PRE>';
			print_r($_REQUEST);	
			die('------------------add questions------------------'); */
			
			$paper_subject_id = $this->input->post('paper_subject_id');
			$header 	= $this->Paper_model->get_header_by_id($paper_subject_id);			
			$data = array(
				'paper_general_inst' => $header[0]->pi_general_instruction,
				'paper_instructions_en' => $header[0]->pi_paper_instruction_en,
				'paper_instructions_ur' => $header[0]->pi_paper_instruction_ur,
				'paper_total_marks' => $header[0]->pi_paper_marks,
				'paper_type' => $header[0]->pi_paper_type,
				'paper_time' => $header[0]->pi_paper_time,
				'paper_item_b1' => $this->input->post('paper_item_b1'),
				'paper_item_b2' => $this->input->post('paper_item_b2'),
				'paper_item_b3' => $this->input->post('paper_item_b3'),
				'paper_item_b4' => $this->input->post('paper_item_b4'),
				'paper_item_b5' => $this->input->post('paper_item_b5'),
				'paper_item_b6' => $this->input->post('paper_item_b6'),
				'paper_item_b7' => $this->input->post('paper_item_b7'),
				'paper_item_b8' => $this->input->post('paper_item_b8'),
				'paper_item_b9' => $this->input->post('paper_item_b9'),
				'paper_item_b10' => $this->input->post('paper_item_b10'),
				'paper_item_b11' => $this->input->post('paper_item_b11'),
				'paper_item_b12' => $this->input->post('paper_item_b12'),
				'paper_item_b13' => $this->input->post('paper_item_b13'),
				'paper_item_b14' => $this->input->post('paper_item_b14'),
				'paper_item_b15' => $this->input->post('paper_item_b15'),				
				'paper_item_b16' => ($this->input->post('paper_item_b16')!="")?$this->input->post('paper_item_b16'):0,
				'paper_item_b17' => ($this->input->post('paper_item_b17')!="")?$this->input->post('paper_item_b17'):0,
				'paper_item_b18' => ($this->input->post('paper_item_b18')!="")?$this->input->post('paper_item_b18'):0,
				'paper_item_b19' => ($this->input->post('paper_item_b19')!="")?$this->input->post('paper_item_b18'):0,
				'paper_item_b20' => ($this->input->post('paper_item_b20')!="")?$this->input->post('paper_item_b20'):0,				
				'paper_item_b21' => ($this->input->post('paper_item_b21')!="")?$this->input->post('paper_item_b21'):0,
				'paper_item_b22' => ($this->input->post('paper_item_b22')!="")?$this->input->post('paper_item_b22'):0,
				'paper_item_b23' => ($this->input->post('paper_item_b23')!="")?$this->input->post('paper_item_b23'):0,
				'paper_item_b24' => ($this->input->post('paper_item_b24')!="")?$this->input->post('paper_item_b24'):0,
				'paper_para16' => ($this->input->post('paper_para16')!="")?$this->input->post('paper_para16'):0,				
				'paper_para21' => ($this->input->post('paper_para21')!="")?$this->input->post('paper_para21'):0,
				'paper_para22' => ($this->input->post('paper_para22')!="")?$this->input->post('paper_para22'):0,
				'paper_school_id' => $this->session->userdata('school_id'),
				'paper_createdby' => $this->session->userdata('school_id'),		
				'paper_status' => 1
			);

			/*print_r($data);
			die();				*/
			//$data = $this->security->xss_clean($data);
			$result = $this->Paper_model->edit_paper($data, $id);
			//die($this->db->last_query());
			if($result){
				$this->session->set_flashdata('success', 'Paper Generated Successfully, Now you can view your paper and Print!');
				redirect(base_url('school/paper/'));
			}
		
	}
		else
		{
			$data['title'] = 'Select Questions for Paper';
			$data['paper'] = $this->Paper_model->get_paper_by_id($id);
			if(!isset($data['paper'][0]->paper_subject_id)){ $this->session->set_flashdata('error', 'Issue with Paper! You can create New Paper');
				redirect(base_url('school/paper/add')); }
			$data['itemsbank'] = $this->Paper_model->get_itemsbank_by_id($data['paper'][0]->paper_subject_id);
			
			
			$data['paras16'] = $this->Paper_model->get_paras_by_subject_id($data['paper'][0]->paper_subject_id,16);			
			$data['paras21'] = $this->Paper_model->get_paras_by_subject_id($data['paper'][0]->paper_subject_id,21);
			$data['paras22'] = $this->Paper_model->get_paras_by_subject_id($data['paper'][0]->paper_subject_id,22);
			
			
			
			$data['ib_b1_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item1']);
			$data['ib_b1_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item2']);
			$data['ib_b1_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item3']);
			$data['ib_b1_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item4']);

			$data['ib_b2_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item1']);
			$data['ib_b2_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item2']);
			$data['ib_b2_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item3']);
			$data['ib_b2_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item4']);

			$data['ib_b3_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item1']);
			$data['ib_b3_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item2']);
			$data['ib_b3_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item3']);
			$data['ib_b3_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item4']);

			$data['ib_b4_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item1']);
			$data['ib_b4_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item2']);
			$data['ib_b4_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item3']);
			$data['ib_b4_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item4']);

			$data['ib_b5_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item1']);
			$data['ib_b5_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item2']);
			$data['ib_b5_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item3']);
			$data['ib_b5_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item4']);

			$data['ib_b6_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item1']);
			$data['ib_b6_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item2']);
			$data['ib_b6_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item3']);
			$data['ib_b6_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item4']);

			$data['ib_b7_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item1']);
			$data['ib_b7_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item2']);
			$data['ib_b7_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item3']);
			$data['ib_b7_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item4']);

			$data['ib_b8_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item1']);
			$data['ib_b8_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item2']);
			$data['ib_b8_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item3']);
			$data['ib_b8_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item4']);

			$data['ib_b9_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item1']);
			$data['ib_b9_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item2']);
			$data['ib_b9_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item3']);
			$data['ib_b9_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item4']);

			$data['ib_b10_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item1']);
			$data['ib_b10_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item2']);
			$data['ib_b10_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item3']);
			$data['ib_b10_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item4']);

			$data['ib_b11_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item1']);
			$data['ib_b11_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item2']);
			$data['ib_b11_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item3']);
			$data['ib_b11_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item4']);

			$data['ib_b12_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item1']);
			$data['ib_b12_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item2']);
			$data['ib_b12_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item3']);
			$data['ib_b12_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item4']);

			$data['ib_b13_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item1']);
			$data['ib_b13_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item2']);
			$data['ib_b13_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item3']);
			$data['ib_b13_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item4']);

			$data['ib_b14_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item1']);
			$data['ib_b14_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item2']);
			$data['ib_b14_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item3']);
			$data['ib_b14_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item4']);

			$data['ib_b15_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item1']);
			$data['ib_b15_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item2']);
			$data['ib_b15_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item3']);
			$data['ib_b15_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item4']);

		$data['ib_b16_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item1']);
		$data['ib_b16_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item2']);
		$data['ib_b16_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item3']);
		$data['ib_b16_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item4']);

		$data['ib_b17_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item1']);
		$data['ib_b17_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item2']);
		$data['ib_b17_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item3']);
		$data['ib_b17_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item4']);

		$data['ib_b18_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item1']);
		$data['ib_b18_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item2']);
		$data['ib_b18_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item3']);
		$data['ib_b18_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item4']);

		$data['ib_b19_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item1']);
		$data['ib_b19_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item2']);
		$data['ib_b19_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item3']);
		$data['ib_b19_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item4']);

		$data['ib_b20_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item1']);
		$data['ib_b20_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item2']);
		$data['ib_b20_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item3']);
		$data['ib_b20_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item4']);
	
		$data['ib_b21_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item1']);
		$data['ib_b21_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item2']);
		$data['ib_b21_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item3']);
		$data['ib_b21_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item4']);

			/* 
			echo '<pre>';
			print_r($data['paper']);
			print_r($data['itembank']);
			die();
			*/
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_questions_addp');
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
public function key($id = 0){
			$data['title'] = 'Key Paper';
			$data['papers'] = $this->Paper_model->get_paper_by_id($id);
			$data['tehsil'] = $this->Paper_model->get_tehsil_by_id($data['papers'][0]->school_tehsil_id);
			$data['district'] = $this->Paper_model->get_district_by_id($data['papers'][0]->school_district_id);
			$data['key16'] = $this->Paper_model->get_paras16_by_subject($data['papers'][0]->paper_para16);
			$paperparagraph = $data['papers'][0]->paper_para21?$data['papers'][0]->paper_para21:$data['papers'][0]->paper_para22;
			$data['key2para'] = $this->Paper_model->get_para_by_id($paperparagraph);
							//echo '<PRE>';
							//echo $paperparagraph;
							//print_r($data['key16']);
							//echo '<hr />';
							//die();
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
			
			$this->load->view('school/includes/_header', $data);
			$this->load->view('school/paper/paper_key', $data);
			$this->load->view('school/includes/_footer');
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