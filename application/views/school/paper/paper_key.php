<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="font-family:Times New Roman; font-size:20px;"> 
  <!-- Main content -->
  <section class="content">
    <div class="card card-default color-palette-bo">
      <div class="card-body"> 
        <!-- For Messages -->
        <?php 
			//echo '<PRE>';
			$papers = (object)$papers[0];	
			//print_r($papers);
			//echo '<hr >';
			//print_r($item1);
			//die('5555555555555555555555555');
			
			$this->load->view('admin/includes/_messages.php') ?>
        <?php 
	      //print_r($header);
    	  //die();?>
        <div class="row form-group" style="border:#000 solid 4px">
          <div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">SCHOOL BASED ASSESSMENT 2021</div>
          <div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">GRADE <?php echo $papers->grade_code;?> </div>
          <div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold; text-transform:uppercase"><?php echo $papers->subject_name_en;?> </div>
          <div class="col-lg-12 col-sm-12" style="text-align:center; font-size:24px; font-weight:bold; text-transform:uppercase">School Name :<?php echo $papers->school_name;?> </div>
          <div class="col-lg-12 col-sm-12" style="text-align:center; font-size:24px; font-weight:bold; text-transform:uppercase">
            <table width="100%">
              <tr>
                <td style="width:50%">Tehsil : <?php echo $tehsil[0]->tehsil_name_en;?></td>
                <td style="width:50%">District : <?php echo $district[0]->district_name_en;?></td>
              </tr>
            </table>
          </div>
        </div>
       
        <div class="row form-group" style="margin-top:10px; font-size:18px; line-height:40px">
          <div class="col-lg-3 col-sm-3" style="text-align:center; font-weight:bold; border:#000 solid 4px;">Total Marks : <?php echo $papers->paper_total_marks;?></div>
          <div class="col-lg-5 col-sm-5" style="text-align:center; font-weight:bold; border:#000 solid 4px;">
            <?php if($papers->paper_type="MCQ"){echo "Multiple Choice Questions";}?>
          </div>
          <div class="col-lg-4 col-sm-4" style="text-align:center; font-weight:bold; border:#000 solid 4px;">Total Time : <?php echo $papers->paper_time;?></div>
        </div>
        </div>
        <div style="font-size:36px; font-weight:bold; text-align:center">ANSWER KEYS</div>
        <!-- For Messages -->
        
        <?php 
			//echo '<PRE>';
			$key16 = $key16;
			//print_r($key2para);
			//die();
			$item1 = isset($item1[0])?$item1[0]:[];
			$item2 = isset($item2[0])?$item2[0]:[];
			$item3 = isset($item3[0])?$item3[0]:[];
			$item4 = isset($item4[0])?$item4[0]:[];
			$item5 = isset($item5[0])?$item5[0]:[];
			$item6 = isset($item6[0])?$item6[0]:[];
			$item7 = isset($item7[0])?$item7[0]:[];
			$item8 = isset($item8[0])?$item8[0]:[];
			$item9 = isset($item9[0])?$item9[0]:[];
			$item10 = isset($item10[0])?$item10[0]:[];
			$item11 = isset($item11[0])?$item11[0]:[];
			$item12 = isset($item12[0])?$item12[0]:[];
			$item13 = isset($item13[0])?$item13[0]:[];
			$item14 = isset($item14[0])?$item14[0]:[];
			$item15 = isset($item15[0])?$item15[0]:[];
			$item16 = isset($item16[0])?$item16[0]:[];
			$item17 = isset($item17[0])?$item17[0]:[];
			$item18 = isset($item18[0])?$item18[0]:[];
			$item19 = isset($item19[0])?$item19[0]:[];
			$item20 = isset($item20[0])?$item20[0]:[];
			$item21 = isset($item21[0])?$item21[0]:[];
			$item22 = isset($item22[0])?$item22[0]:[];
			$item23 = isset($item23[0])?$item23[0]:[];
			$item24 = isset($item24[0])?$item24[0]:[];
			$item25 = isset($item25[0])?$item25[0]:[];
			//print_r($item1);
			//die();
			
			?>
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <!------------------------------------------Item Bank No.1 Starts Here----------------------------------------->
        	<div style="padding:0px; margin:0px auto"> 
            <table border="3" cellspacing="10" cellpadding="10" style="padding-left:30px">
              <tr>
                <td style="padding-left:20px;">Q. No.1 : <?php echo $item1->item_option_correct;?></td>
                <td style="padding-left:20px;">Q. No.14 : <?php echo $item14->item_option_correct;?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.2 : <?php echo $item2->item_option_correct;?></td>
                <td style="padding-left:20px">Q. No.15 : <?php echo $item15->item_option_correct;?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.3 : <?php echo $item3->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item16->item_option_correct)&&$item16->item_option_correct!=''){echo 'Q. No.16 :'.$item16->item_option_correct;} 
																elseif(isset($key16[0]->i21option_correct)&&$key16[0]->i21option_correct!=''){echo 'Q. No.16 :'.$key16[0]->i21option_correct;}
																else {echo ' ';}?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.4 : <?php echo $item4->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item17->item_option_correct)&&$item17->item_option_correct!='') {echo 'Q. No.17 : '.$item17->item_option_correct;} 
												elseif(isset($key16[0]->i22option_correct)&&$key16[0]->i22option_correct!='') {echo 'Q. No.17 : '.$key16[0]->i22option_correct;} 
												else {echo ' ';} ?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.5 : <?php echo $item5->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item18->item_option_correct)&&$item18->item_option_correct!='') {echo 'Q. No.18 : '.$item18->item_option_correct;} 
												elseif(isset($key16[0]->i23option_correct)&&$key16[0]->i23option_correct!='') {echo 'Q. No.18 : '.$key16[0]->i23option_correct;} 
												else {echo ' ';} ?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.6 : <?php echo $item6->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item19->item_option_correct)&&$item19->item_option_correct!='') {echo 'Q. No.19 : '.$item19->item_option_correct;} 
												elseif(isset($key16[0]->i24option_correct)&&$key16[0]->i24option_correct!='') {echo 'Q. No.19 : '.$key16[0]->i24option_correct;} 
												else {echo ' ';}?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.7 : <?php echo $item7->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item20->item_option_correct)&&$item20->item_option_correct!='') {echo 'Q. No.20 : '.$item20->item_option_correct;} 
												elseif(isset($key16[0]->i25option_correct)&&$key16[0]->i25option_correct!='') {echo 'Q. No.20 : '.$key16[0]->i25option_correct;}
												else {echo ' ';}?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.8 : <?php echo $item8->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item21->item_option_correct)&&$item21->item_option_correct!='') {echo 'Q. No.21 : '.$item21->item_option_correct;} 
												elseif(isset($key2para[0]->i21option_correct)&&$key2para[0]->i21option_correct!='') {echo 'Q. No.21 : '.$key2para[0]->i21option_correct;}
												else {echo ' ';};?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.9 : <?php echo $item9->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item22->item_option_correct)&&$item22->item_option_correct!='') {echo 'Q. No.22 : '.$item22->item_option_correct;} 
												elseif(isset($key2para[0]->i22option_correct)&&$key2para[0]->i22option_correct!='') {echo 'Q. No.22 : '.$key2para[0]->i22option_correct;}
												else {echo ' ';}?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.10 : <?php echo $item10->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item23->item_option_correct)&&$item23->item_option_correct!=''){echo 'Q. No.23 : '.$item23->item_option_correct;}
												elseif(isset($key2para[0]->i23option_correct)&&$key2para[0]->i23option_correct!='') {echo 'Q. No.23 : '.$key2para[0]->i23option_correct;}
												else {echo ' ';}?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.11 : <?php echo $item11->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item24->item_option_correct)&&$item24->item_option_correct!='') {echo 'Q. No.24 : '.$item24->item_option_correct;} 
												elseif(isset($key2para[0]->i24option_correct)&&$key2para[0]->i24option_correct!='') {echo 'Q. No.24 : '.$key2para[0]->i24option_correct;}
												else {echo ' ';}?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.12 : <?php echo $item12->item_option_correct;?></td>
                <td style="padding-left:20px"><?php if(isset($item25->item_option_correct)&&$item25->item_option_correct!='') {echo 'Q. No.25 : '.$item25->item_option_correct;} 
												elseif(isset($key2para[0]->i25option_correct)&&$key2para[0]->i25option_correct!='') {echo 'Q. No.25 : '.$key2para[0]->i25option_correct;}
												else {echo '';}?></td>
              </tr>
              <tr>
                <td style="padding-left:20px">Q. No.13 : <?php echo $item13->item_option_correct;?></td>
                <td style="padding-left:20px">&nbsp;</td>
              </tr>
            </table>
            </div>
            
            <div class="row">
              <div class="col-lg-12 col-sm-12">
                <hr/ >
              </div>
            </div>
          </div>
  </section>
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script> 
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>