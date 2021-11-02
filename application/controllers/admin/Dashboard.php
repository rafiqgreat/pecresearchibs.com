<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/dashboard_model', 'dashboard_model');
	}

	//--------------------------------------------------------------------------
	public function index(){
		
	//echo '<pre>';
	$items = $this->dashboard_model->get_all_items();
		$sub_computer = [34,42,50];
		$sub_sci_gk = [7,11,15,24,30,36,46,54];
		$sub_social = [23,29,38,44,52];
		$sub_ethics = [37,45,53,60,61,62,63,64];		
		$sub_religious = [57,59,17,22,55];
		$sub_islamiat = [56,58,16,21,28,35,43,51];
		$sub_math = [6,10,14,20,27,33,41,49];
		$sub_urdu = [5,9,13,19,26,32,40,48];
		$sub_english = [4,8,12,18,25,31,39,47];		
		$ctr = 1;		
		foreach($items as $item)
		{
			/*if(in_array($item['item_subject_id'],$sub_computer))
			{
				
				if($item['item_grade_id']==8)
				{$grade='VI'; $subject='CSE';}
				elseif($item['item_grade_id']==9)
				{$grade='VII'; $subject='CSE';}					
				elseif($item['item_grade_id']==10)
				{$grade='VIII'; $subject='CSE';}	
				else 
				die('not in list subject');
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);				
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}*/
			/*
			if(in_array($item['item_subject_id'],$sub_sci_gk))
			{
				
				if($item['item_grade_id']==3)
				{$grade='I'; $subject='GKN';}
				elseif($item['item_grade_id']==4)
				{$grade='II'; $subject='GKN';}
				elseif($item['item_grade_id']==5)
				{$grade='III'; $subject='GKN';}
				elseif($item['item_grade_id']==6)
				{$grade='IV'; $subject='SCI';}
				elseif($item['item_grade_id']==7)
				{$grade='V'; $subject='SCI';}
				elseif($item['item_grade_id']==8)
				{$grade='VI'; $subject='SCI';}
				elseif($item['item_grade_id']==9)
				{$grade='VII'; $subject='SCI';}					
				elseif($item['item_grade_id']==10)
				{$grade='VIII'; $subject='SCI';}
				
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}*/
			/*
			if(in_array($item['item_subject_id'],$sub_social))
			{
				
				if($item['item_grade_id']==4)
				{$grade='II'; $subject='SSY';}
				elseif($item['item_grade_id']==5)
				{$grade='III'; $subject='SSY';}
				elseif($item['item_grade_id']==6)
				{$grade='IV'; $subject='SSY';}
				elseif($item['item_grade_id']==7)
				{$grade='V'; $subject='SSY';}
				elseif($item['item_grade_id']==8)
				{$grade='VI'; $subject='SSY';}
				elseif($item['item_grade_id']==9)
				{$grade='VII'; $subject='SSY';}					
				elseif($item['item_grade_id']==10)
				{$grade='VIII'; $subject='SSY';}
				
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}*/
			/*
			if(in_array($item['item_subject_id'],$sub_ethics))
			{
				
				if($item['item_grade_id']==3)
				{$grade='I'; $subject='AKL';}
				elseif($item['item_grade_id']==4)
				{$grade='II'; $subject='AKL';}				
				elseif($item['item_grade_id']==5)
				{$grade='III'; $subject='AKL';}
				elseif($item['item_grade_id']==6)
				{$grade='IV'; $subject='AKL';}
				elseif($item['item_grade_id']==7)
				{$grade='V'; $subject='AKL';}
				elseif($item['item_grade_id']==8)
				{$grade='VI'; $subject='AKL';}
				elseif($item['item_grade_id']==9)
				{$grade='VII'; $subject='AKL';}					
				elseif($item['item_grade_id']==10)
				{$grade='VIII'; $subject='AKL';}
				
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}*/
			/*if(in_array($item['item_subject_id'],$sub_religious))
			{
				
				if($item['item_grade_id']==3)
				{$grade='I'; $subject='REN';}
				elseif($item['item_grade_id']==4)
				{$grade='II'; $subject='REN';}				
				elseif($item['item_grade_id']==5)
				{$grade='III'; $subject='REN';}
				elseif($item['item_grade_id']==6)
				{$grade='IV'; $subject='REN';}
				elseif($item['item_grade_id']==7)
				{$grade='V'; $subject='REN';}
				
				
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}*/
			/*
			if(in_array($item['item_subject_id'],$sub_islamiat))
			{
				
				if($item['item_grade_id']==3)
				{$grade='I'; $subject='ISL';}
				elseif($item['item_grade_id']==4)
				{$grade='II'; $subject='ISL';}				
				elseif($item['item_grade_id']==5)
				{$grade='III'; $subject='ISL';}
				elseif($item['item_grade_id']==6)
				{$grade='IV'; $subject='ISL';}
				elseif($item['item_grade_id']==7)
				{$grade='V'; $subject='ISL';}
				elseif($item['item_grade_id']==8)
				{$grade='VI'; $subject='ISL';}
				elseif($item['item_grade_id']==9)
				{$grade='VII'; $subject='ISL';}					
				elseif($item['item_grade_id']==10)
				{$grade='VIII'; $subject='ISL';}
				
				
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}
		*/
			/*
		if(in_array($item['item_subject_id'],$sub_math))
			{
				
				if($item['item_grade_id']==3)
				{$grade='I'; $subject='MTH';}
				elseif($item['item_grade_id']==4)
				{$grade='II'; $subject='MTH';}				
				elseif($item['item_grade_id']==5)
				{$grade='III'; $subject='MTH';}
				elseif($item['item_grade_id']==6)
				{$grade='IV'; $subject='MTH';}
				elseif($item['item_grade_id']==7)
				{$grade='V'; $subject='MTH';}
				elseif($item['item_grade_id']==8)
				{$grade='VI'; $subject='MTH';}
				elseif($item['item_grade_id']==9)
				{$grade='VII'; $subject='MTH';}					
				elseif($item['item_grade_id']==10)
				{$grade='VIII'; $subject='MTH';}
				
				
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}
		
		*/
			/*
			if(in_array($item['item_subject_id'],$sub_urdu))
			{
				
				if($item['item_grade_id']==3)
				{$grade='I'; $subject='URD';}
				elseif($item['item_grade_id']==4)
				{$grade='II'; $subject='URD';}				
				elseif($item['item_grade_id']==5)
				{$grade='III'; $subject='URD';}
				elseif($item['item_grade_id']==6)
				{$grade='IV'; $subject='URD';}
				elseif($item['item_grade_id']==7)
				{$grade='V'; $subject='URD';}
				elseif($item['item_grade_id']==8)
				{$grade='VI'; $subject='URD';}
				elseif($item['item_grade_id']==9)
				{$grade='VII'; $subject='URD';}					
				elseif($item['item_grade_id']==10)
				{$grade='VIII'; $subject='URD';}
				
				
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}
		
		*/
			/*
			if(in_array($item['item_subject_id'],$sub_english))
			{
				
				if($item['item_grade_id']==3)
				{$grade='I'; $subject='ENG';}
				elseif($item['item_grade_id']==4)
				{$grade='II'; $subject='ENG';}				
				elseif($item['item_grade_id']==5)
				{$grade='III'; $subject='ENG';}
				elseif($item['item_grade_id']==6)
				{$grade='IV'; $subject='ENG';}
				elseif($item['item_grade_id']==7)
				{$grade='V'; $subject='ENG';}
				elseif($item['item_grade_id']==8)
				{$grade='VI'; $subject='ENG';}
				elseif($item['item_grade_id']==9)
				{$grade='VII'; $subject='ENG';}					
				elseif($item['item_grade_id']==10)
				{$grade='VIII'; $subject='ENG';}
				
				
				$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
				
				$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
				echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
				$ctr++;
			}
			*/
		}
		
	//die('checkout');
		
		$data['all_schools'] = 0;//$this->dashboard_model->get_all_schools_count();
		$data['all_papers'] = 0;//$this->dashboard_model->get_all_paper_count();
		$data['papers_comp'] = 0;//$this->dashboard_model->get_paper_completed_count();
		$data['papers_incomp'] = 0;//$this->dashboard_model->get_paper_incompleted_count();
		$data['schoolspapers'] = [];//$this->dashboard_model->get_schools_generted_papers();
		$data['admin_users'] = $this->dashboard_model->get_admin_users();
		$data['ae_users'] = $this->dashboard_model->get_ae_users();
		$data['iw_users'] = $this->dashboard_model->get_iw_users();
		$data['all_grades'] = $this->dashboard_model->get_all_grades();
		$data['all_subjects'] = $this->dashboard_model->get_all_subjects();
		$data['all_cstands'] = $this->dashboard_model->get_all_cstands();
		$data['all_subcstands'] = $this->dashboard_model->get_all_subcstands();

		$data['items_stats_ss'] = $this->dashboard_model->get_items_stats_iss();
		
		if($this->session->userdata('role_id')==2){
			$data['english'] = $this->dashboard_model->get_stats_items('English');
		$data['urdu'] = $this->dashboard_model->get_stats_items('Urdu');
		$data['math'] = $this->dashboard_model->get_stats_items('Math');
		$data['islamiat'] = $this->dashboard_model->get_stats_items('Islamiat');
		$data['social'] = $this->dashboard_model->get_stats_items('Social');
		$data['ethics'] = $this->dashboard_model->get_stats_items('Ethics');
		$data['religious'] = $this->dashboard_model->get_stats_items('Religous');
		$data['gk_science'] = $this->dashboard_model->get_stats_items('General');
		$data['computer'] = $this->dashboard_model->get_stats_items('Computer');
		
		$data['english2'] = $this->dashboard_model->get_stats_items('English',2);
		$data['urdu2'] = $this->dashboard_model->get_stats_items('Urdu',2);
		$data['math2'] = $this->dashboard_model->get_stats_items('Math',2);
		$data['islamiat2'] = $this->dashboard_model->get_stats_items('Islamiat',2);
		$data['social2'] = $this->dashboard_model->get_stats_items('Social',2);
		$data['ethics2'] = $this->dashboard_model->get_stats_items('Ethics',2);
		$data['religious2'] = $this->dashboard_model->get_stats_items('Religious',2);
		$data['gk_science2'] = $this->dashboard_model->get_stats_items('General',2);
		$data['computer2'] = $this->dashboard_model->get_stats_items('Computer',2);
		}
		elseif($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==4){
		
		$data['english'] = $this->dashboard_model->get_stats_items('English');
		$data['urdu'] = $this->dashboard_model->get_stats_items('Urdu');
		$data['math'] = $this->dashboard_model->get_stats_items('Math');
		$data['islamiat'] = $this->dashboard_model->get_stats_items('Islamiat');
		$data['social'] = $this->dashboard_model->get_stats_items('Social');
		$data['ethics'] = $this->dashboard_model->get_stats_items('Ethics');
		$data['religious'] = $this->dashboard_model->get_stats_items('Religous');
		$data['gk_science'] = $this->dashboard_model->get_stats_items('General');
		$data['computer'] = $this->dashboard_model->get_stats_items('Computer');
		
		$data['english2'] = $this->dashboard_model->get_stats_items('English',2);
		$data['urdu2'] = $this->dashboard_model->get_stats_items('Urdu',2);
		$data['math2'] = $this->dashboard_model->get_stats_items('Math',2);
		$data['islamiat2'] = $this->dashboard_model->get_stats_items('Islamiat',2);
		$data['social2'] = $this->dashboard_model->get_stats_items('Social',2);
		$data['ethics2'] = $this->dashboard_model->get_stats_items('Ethics',2);
		$data['religious2'] = $this->dashboard_model->get_stats_items('Religious',2);
		$data['gk_science2'] = $this->dashboard_model->get_stats_items('General',2);
		$data['computer2'] = $this->dashboard_model->get_stats_items('Computer',2);
		
		/*
		echo '<pre>';
		print_r($data['gk_science']);
		echo '<hr>';
		print_r($data['gk_science']);
		die();
		*/
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['english'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['english']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['urdu'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['urdu']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['math'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['math']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['islamiat'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['islamiat']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['social'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['social']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['ethics'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['ethics']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		
				$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['religious'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['religious']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];

		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['gk_science'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['gk_science']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['computer'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['computer']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		/*****************************/
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['english2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['english2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['urdu2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['urdu2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['math2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['math2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['islamiat2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['islamiat2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['social2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['social2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['ethics2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['ethics2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];

		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['religious2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['religious2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];

		
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['gk_science2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['gk_science2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['computer2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['computer2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		
		//echo '<hr />';
		//print_r($overall_summary);		
		//die();
		$data['summary_items'] = $overall_summary;
		$data['summary_items2'] = $overall_summary2;
		

		}
		
		
		
		$data['all_users'] = $this->dashboard_model->get_all_users();
		$data['items_stats'] = $this->dashboard_model->get_items_stats();
	/*	
		$data['stats_english'] = $this->dashboard_model->get_items_stats_english();
		$data['stats_urdu'] = $this->dashboard_model->get_items_stats_urdu();
		$data['stats_gk'] = $this->dashboard_model->get_items_stats_gk();
		$data['stats_computer'] = $this->dashboard_model->get_items_stats_computer();
		$data['stats_ss'] = $this->dashboard_model->get_items_stats_ss();
		$data['stats_aklaqiat'] = $this->dashboard_model->get_items_stats_aklaqiat();
		$data['stats_science'] = $this->dashboard_model->get_items_stats_science();
		$data['stats_math'] = $this->dashboard_model->get_items_stats_math();
		$data['stats_islamiat'] = $this->dashboard_model->get_items_stats_islamiat();
		
		*/
		//get_items_stats_islamiat
		
		$data['title'] = 'Dashboard';

		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/index', $data);
    	$this->load->view('admin/includes/_footer');
	}
	
	public function dailydata(){	
		
		if($this->session->userdata('role_id')==1) 
		{ 
			
		$data['title'] = 'Dashboard for Daily Statistics Data';
		$data['all_users'] = $this->dashboard_model->get_all_users_counters();
		
		
		$todayb = date("Y-m-d");
		$todayb1 = date("Y-m-d",strtotime("-1 days"));
		$todayb2 = date("Y-m-d",strtotime("-2 days"));
		$todayb3 = date("Y-m-d",strtotime("-3 days"));
		$todayb4 = date("Y-m-d",strtotime("-4 days"));	
		
		$data['ss_b'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb);
		$data['ss_b1'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb1);
		$data['ss_b2'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb2);
		$data['ss_b3'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb3);
		$data['ss_b4'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb4);
		
		$data['ae_b'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb);
		$data['ae_b1'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb1);
		$data['ae_b2'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb2);
		$data['ae_b3'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb3);
		$data['ae_b4'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb4);		
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}

		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/view_daily_ss_ae', $data);
    	$this->load->view('admin/includes/_footer');
		
	}
	public function dailydatass($id){	
		
		if($this->session->userdata('role_id')==1) 
		{ 
			
		$data['title'] = 'Dashboard for Daily Statistics Data';
				$data['english'] = $this->dashboard_model->get_stats_items('English');
		$data['urdu'] = $this->dashboard_model->get_stats_items('Urdu');
		$data['math'] = $this->dashboard_model->get_stats_items('Math');
		$data['islamiat'] = $this->dashboard_model->get_stats_items('Islamiat');
		$data['social'] = $this->dashboard_model->get_stats_items('Social');
		$data['ethics'] = $this->dashboard_model->get_stats_items('Ethics');
		$data['gk_science'] = $this->dashboard_model->get_stats_items('General');
		$data['computer'] = $this->dashboard_model->get_stats_items('Computer');
		
		$data['english2'] = $this->dashboard_model->get_stats_items('English',2);
		$data['urdu2'] = $this->dashboard_model->get_stats_items('Urdu',2);
		$data['math2'] = $this->dashboard_model->get_stats_items('Math',2);
		$data['islamiat2'] = $this->dashboard_model->get_stats_items('Islamiat',2);
		$data['social2'] = $this->dashboard_model->get_stats_items('Social',2);
		$data['ethics2'] = $this->dashboard_model->get_stats_items('Ethics',2);
		$data['gk_science2'] = $this->dashboard_model->get_stats_items('General',2);
		$data['computer2'] = $this->dashboard_model->get_stats_items('Computer',2);
		
		/*
		echo '<pre>';
		print_r($data['gk_science']);
		echo '<hr>';
		print_r($data['gk_science']);
		die();
		*/
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['english'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['english']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['urdu'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['urdu']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['math'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['math']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['islamiat'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['islamiat']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['social'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['social']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['ethics'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['ethics']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['gk_science'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['gk_science']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['computer'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['computer']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		/*****************************/
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['english2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['english2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['urdu2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['urdu2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['math2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['math2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['islamiat2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['islamiat2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['social2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['social2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['ethics2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['ethics2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['gk_science2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['gk_science2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['computer2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['computer2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		
		//echo '<hr />';
		//print_r($overall_summary);		
		//die();
		$data['id'] = $id;
		$data['summary_items'] = $overall_summary;
		$data['summary_items2'] = $overall_summary2;
		$data['items_stats_ss'] = $this->dashboard_model->get_items_stats_iss();
		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/view_daily_ss_ae2', $data);
    	$this->load->view('admin/includes/_footer');
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}

		
		
	}

	//--------------------------------------------------------------------------
	public function index_2(){
		/*$data['all_users'] = $this->dashboard_model->get_all_users();
		$data['active_users'] = $this->dashboard_model->get_active_users();
		$data['deactive_users'] = $this->dashboard_model->get_deactive_users();*/

		$data['title'] = 'Dashboard';

		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/index2');
    	$this->load->view('admin/includes/_footer');
	}

	//--------------------------------------------------------------------------
	public function index_3(){
		/*$data['all_users'] = $this->dashboard_model->get_all_users();
		$data['active_users'] = $this->dashboard_model->get_active_users();
		$data['deactive_users'] = $this->dashboard_model->get_deactive_users();*/

		$data['title'] = 'Dashboard';

		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/index3');
    	$this->load->view('admin/includes/_footer');
	}
	
}

?>	