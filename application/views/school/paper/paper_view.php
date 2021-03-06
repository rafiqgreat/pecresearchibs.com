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
                <td style="width:50%">District :<?php echo $district[0]->district_name_en;?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
            <div class="row">
              <div class="col-xl-4 col-lg-5 col-md-6 col-sm-7" style="font-size:18px; font-weight:bold"> Student Name : </div>
              <div class="col-xl-8 col-lg-7 col-md-6 col-sm-5" style="border-bottom:#000 solid 2px"> </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
            <div class="row">
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4" style="font-size:18px; font-weight:bold"> Section : </div>
              <div class="col-xl-10 col-lg-9 col-md-8 col-sm-8" style="border-bottom:#000 solid 2px"> </div>
            </div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
            <div class="row">
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4" style="font-size:18px; font-weight:bold"> Roll No : </div>
              <div class="col-xl-10 col-lg-9 col-md-8 col-sm-8" style="border-bottom:#000 solid 2px"> </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
            <div class="row">
              <div class=" col-xl-2 col-lg-2 col-md-3 col-sm-4" style="font-size:18px; font-weight:bold"> Date : </div>
              <div class="col-xl-10 col-lg-10 col-md-9 col-sm-8" style="border-bottom:#000 solid 2px"> </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-sm-12" style="border:#000 solid 1px"></div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-sm-12 form-group"><?php echo $papers->paper_general_inst;?></div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-sm-12" style="border:#000 solid 1px"></div>
        </div>
        <div class="row form-group" style="margin-top:10px; font-size:18px">
          <div class="col-lg-3 col-sm-3" style="text-align:center; font-weight:bold; border:#000 solid 4px;">Total Marks : <?php echo $papers->paper_total_marks;?></div>
          <div class="col-lg-5 col-sm-5" style="text-align:center; font-weight:bold; border:#000 solid 4px;">
            <?php if($papers->paper_type	="MCQ"){echo "Multiple Choice Questions";}?>
          </div>
          <div class="col-lg-4 col-sm-4" style="text-align:center; font-weight:bold; border:#000 solid 4px;">Total Time : <?php echo $papers->paper_time;?></div>
        </div>
        <div class="row form-group">
          <div class="col-lg-12 col-sm-12" style="font-size:18px; font-weight:bold"><?php echo $papers->paper_instructions_en;?></div>
        </div>
        <div class="row form-group">
          <div class="col-lg-12 col-sm-12  urdufont-right" style="font-weight:bold; text-align:right"><?php echo $papers->paper_instructions_ur	;?></div>
        </div>
        
        <!-- For Messages -->
        
        <?php //echo '<PRE>';
			 //print_r($itempara);
			 //print_r($item4);
			 //die();
			 //$papers = $papers[0];
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
        
        <div style="margin:0px; padding:0px;"> 
          
          <!--------------------Question No.1 START here------------------------------------->
          <?php
		   if(isset($item1->item_id)&&$item1->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item1->item_image_position=='Top') 
{
 	if($item1->item_image_en!="" && $item1->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item1->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item1->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item1->item_image_en!=""&&$item1->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item1->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item1->item_image_en==""&&$item1->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item1->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item1->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.1 : <?php echo html_entity_decode($item1->item_stem_en);?></td>
            </tr>
            <?php } ?>
            <?php if($item1->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  1 : &nbsp; <?php echo html_entity_decode($item1->item_stem_ur);?></td>
            </tr>
            <?php } ?>
            <?php if ($item1->item_image_position=='Bottom') 
{
 	if($item1->item_image_en!="" && $item1->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item1->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item1->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item1->item_image_en!=""&&$item1->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item1->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item1->item_image_en==""&&$item1->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item1->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item1->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item1->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item1->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item1->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item1->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item1->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item1->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item1->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.1 ends here-------------------------------------> 
          
          <!--------------------Question No.2 START here------------------------------------->
          <?php
		   if(isset($item2->item_id)&&$item2->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item2->item_image_position=='Top') 
{
 	if($item2->item_image_en!="" && $item2->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item2->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item2->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item2->item_image_en!=""&&$item2->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item2->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item2->item_image_en==""&&$item2->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item2->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item2->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.2 :<?php echo html_entity_decode($item2->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item2->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  2 : &nbsp; <?php echo html_entity_decode($item2->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item2->item_image_position=='Bottom') 
{
 	if($item2->item_image_en!="" && $item2->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item2->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item2->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item2->item_image_en!=""&&$item2->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item2->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item2->item_image_en==""&&$item2->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item2->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item2->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item2->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item2->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item2->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item2->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item2->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item2->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item2->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.2 ends here-------------------------------------> 
          
          <!--------------------Question No.3 START here------------------------------------->
          <?php
		   if(isset($item3->item_id)&&$item3->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item3->item_image_position=='Top') 
{
 	if($item3->item_image_en!="" && $item3->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item3->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item3->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item3->item_image_en!=""&&$item3->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item3->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item3->item_image_en==""&&$item3->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item3->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item3->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.3 :<?php echo html_entity_decode($item3->item_stem_en);?>
                <?php if($this->session->userdata('role_id')==3){ ?>
                <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$item3->item_id);?>">Edit Item</a>
                <?php } ?></td>
            </tr>
            <?php }?>
            <?php if($item3->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">???????? ????????  3 : &nbsp; <?php echo html_entity_decode($item3->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item3->item_image_position=='Bottom') 
{
 	if($item3->item_image_en!="" && $item3->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item3->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item3->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item3->item_image_en!=""&&$item3->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item3->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item3->item_image_en==""&&$item3->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item3->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item3->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item3->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item3->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item3->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item3->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item3->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item3->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item3->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.3 ends here-------------------------------------> 
          
          <!--------------------Question No.4 START here------------------------------------->
          <?php
		   if(isset($item4->item_id)&&$item4->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item4->item_image_position=='Top') 
{
 	if($item4->item_image_en!="" && $item4->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item4->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item4->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item4->item_image_en!=""&&$item4->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item4->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item4->item_image_en==""&&$item4->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item4->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item4->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.4 :<?php echo html_entity_decode($item4->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item4->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  4 : &nbsp; <?php echo html_entity_decode($item4->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item4->item_image_position=='Bottom') 
{
 	if($item4->item_image_en!="" && $item4->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item4->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item4->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item4->item_image_en!=""&&$item4->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item4->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item4->item_image_en==""&&$item4->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item4->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item4->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item4->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item4->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item4->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item4->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item4->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item4->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item4->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.4 ends here-------------------------------------> 
          
          <!--------------------Question No.5 START here------------------------------------->
          <?php
		   if(isset($item5->item_id)&&$item5->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item5->item_image_position=='Top') 
{
 	if($item5->item_image_en!="" && $item5->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item5->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item5->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item5->item_image_en!=""&&$item5->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item5->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item5->item_image_en==""&&$item5->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item5->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item5->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.5 :<?php echo html_entity_decode($item5->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item5->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">???????? ????????  5 : &nbsp; <?php echo html_entity_decode($item5->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item5->item_image_position=='Bottom') 
{
 	if($item5->item_image_en!="" && $item5->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item5->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item5->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item5->item_image_en!=""&&$item5->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item5->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item5->item_image_en==""&&$item5->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item5->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item5->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item5->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item5->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item5->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item5->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item5->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item5->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item5->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.5 ends here-------------------------------------> 
          
          <!--------------------Question No.6 START here------------------------------------->
          <?php
		   if(isset($item6->item_id)&&$item6->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item6->item_image_position=='Top') 
{
 	if($item6->item_image_en!="" && $item6->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item6->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item6->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item6->item_image_en!=""&&$item6->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item6->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item6->item_image_en==""&&$item6->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item6->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item6->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.6 :<?php echo html_entity_decode($item6->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item6->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  6 : &nbsp; <?php echo html_entity_decode($item6->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item6->item_image_position=='Bottom') 
{
 	if($item6->item_image_en!="" && $item6->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item6->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item6->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item6->item_image_en!=""&&$item6->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item6->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item6->item_image_en==""&&$item6->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item6->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item6->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item6->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item6->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item6->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item6->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item6->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item6->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item6->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.6 ends here-------------------------------------> 
          
          <!--------------------Question No.7 START here------------------------------------->
          <?php
		   if(isset($item7->item_id)&&$item7->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item7->item_image_position=='Top') 
{
 	if($item7->item_image_en!="" && $item7->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item7->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item7->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item7->item_image_en!=""&&$item7->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item7->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item7->item_image_en==""&&$item7->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item7->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item7->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.7 :<?php echo html_entity_decode($item7->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item7->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  7 : &nbsp; <?php echo html_entity_decode($item7->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item7->item_image_position=='Bottom') 
{
 	if($item7->item_image_en!="" && $item7->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item7->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item7->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item7->item_image_en!=""&&$item7->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item7->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item7->item_image_en==""&&$item7->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item7->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item7->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item7->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item7->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item7->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item7->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item7->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item7->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item7->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.7 ends here-------------------------------------> 
          
          <!--------------------Question No.8 START here------------------------------------->
          <?php
		   if(isset($item8->item_id)&&$item8->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item8->item_image_position=='Top') 
{
 	if($item8->item_image_en!="" && $item8->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item8->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item8->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item8->item_image_en!=""&&$item8->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item8->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item8->item_image_en==""&&$item8->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item8->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item8->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.8 :<?php echo html_entity_decode($item8->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item8->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  8 : &nbsp; <?php echo html_entity_decode($item8->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item8->item_image_position=='Bottom') 
{
 	if($item8->item_image_en!="" && $item8->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item8->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item8->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item8->item_image_en!=""&&$item8->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item8->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item8->item_image_en==""&&$item8->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item8->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item8->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item8->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item8->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item8->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item8->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item8->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item8->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item8->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.8 ends here-------------------------------------> 
          
          <!--------------------Question No.9 START here------------------------------------->
          
          <?php
		   if(isset($item9->item_id)&&$item9->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item9->item_image_position=='Top') 
{
 	if($item9->item_image_en!="" && $item9->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item9->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item9->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item9->item_image_en!=""&&$item9->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item9->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item9->item_image_en==""&&$item9->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item9->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item9->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.9 :<?php echo html_entity_decode($item9->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item9->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  9 : &nbsp; <?php echo html_entity_decode($item9->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item9->item_image_position=='Bottom') 
{
 	if($item9->item_image_en!="" && $item9->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item9->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item9->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item9->item_image_en!=""&&$item9->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item9->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item9->item_image_en==""&&$item9->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item9->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item9->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item9->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item9->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item9->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item9->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item9->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item9->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item9->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.9 ends here-------------------------------------> 
          
          <!--------------------Question No.10 START here------------------------------------->
          <?php
		   if(isset($item10->item_id)&&$item10->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item10->item_image_position=='Top') 
{
 	if($item10->item_image_en!="" && $item10->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item10->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item10->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item10->item_image_en!=""&&$item10->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item10->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item10->item_image_en==""&&$item10->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item10->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item10->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.10 :<?php echo html_entity_decode($item10->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item10->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  10 : &nbsp; <?php echo html_entity_decode($item10->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item10->item_image_position=='Bottom') 
{
 	if($item10->item_image_en!="" && $item10->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item10->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item10->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item10->item_image_en!=""&&$item10->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item10->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item10->item_image_en==""&&$item10->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item10->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item10->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item10->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item10->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item10->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item10->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item10->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item10->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item10->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.10 ends here-------------------------------------> 
          
          <!--------------------Question No.11 START here------------------------------------->
          <?php
		   if(isset($item11->item_id)&&$item11->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item11->item_image_position=='Top') 
{
 	if($item11->item_image_en!="" && $item11->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item11->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item11->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item11->item_image_en!=""&&$item11->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item11->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item11->item_image_en==""&&$item11->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item11->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item11->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.11 : <?php echo html_entity_decode($item11->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item11->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  11 : &nbsp; <?php echo html_entity_decode($item11->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item11->item_image_position=='Bottom') 
{
 	if($item11->item_image_en!="" && $item11->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item11->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item11->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item11->item_image_en!=""&&$item11->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item11->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item11->item_image_en==""&&$item11->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item11->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item11->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item11->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item11->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item11->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item11->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item11->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item11->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item11->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item11->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item11->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item11->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item11->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item11->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item11->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item11->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item11->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item11->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item11->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item11->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item11->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item11->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item11->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item11->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item11->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item11->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item11->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item11->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.11 ends here-------------------------------------> 
          
          <!--------------------Question No.12 START here------------------------------------->
          
          <?php
		   if(isset($item12->item_id)&&$item12->item_id!=0)
		   {
					 ?>
				  <table width="100%" style="margin-top:10px;" >
					<?php if ($item12->item_image_position=='Top') 
				{
				if($item12->item_image_en!="" && $item12->item_image_ur!="") 
				{
				?>
					<tr>
					  <td><img src="<?= base_url().$item12->item_image_en;?>" style="max-height:400px;"/></td>
					  <td style="float:right"><img src="<?= base_url().$item12->item_image_ur;?>" style="max-height:400px;"/></td>
					</tr>
					<?php 
				}
				elseif($item12->item_image_en!=""&&$item12->item_image_ur=="")
				{
				?>
					<tr>
					  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item12->item_image_en;?>" style="max-height:400px;" /></td>
					</tr>
					<?php 	
				}
				elseif($item12->item_image_en==""&&$item12->item_image_ur!="")
				{
				?>
					<tr>
					  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item12->item_image_ur;?>" style="max-height:400px;"/></td>
					</tr>
					<?php 	
				}
				}
				?>
					<?php if($item12->item_stem_en!='') { ?>
					<tr>
					  <td colspan="2" style="font-weight:bold">Question No.12 : <?php echo html_entity_decode($item12->item_stem_en);?></td>
					</tr>
					<?php }?>
					<?php if($item12->item_stem_ur!='') { ?>
					<tr>
					  <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  12 : &nbsp; <?php echo html_entity_decode($item12->item_stem_ur);?></td>
					</tr>
					<?php }?>
					<?php if ($item12->item_image_position=='Bottom') 
				{
				if($item12->item_image_en!="" && $item12->item_image_ur!="") 
				{
				?>
					<tr>
					  <td><img src="<?= base_url().$item12->item_image_en;?>" style="max-height:400px;"/></td>
					  <td style="float:right"><img src="<?= base_url().$item12->item_image_ur;?>" style="max-height:400px;"/></td>
					</tr>
					<?php 
				}
				elseif($item12->item_image_en!=""&&$item12->item_image_ur=="")
				{
				?>
					<tr>
					  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item12->item_image_en;?>" style="max-height:400px;" /></td>
					</tr>
					<?php 	
				}
				elseif($item12->item_image_en==""&&$item12->item_image_ur!="")
				{
				?>
					<tr>
					  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item12->item_image_ur;?>" style="max-height:400px;"/></td>
					</tr>
					<?php 	
				}
				}
				
					if($item12->item_option_layout=='1')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" ><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" ><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" ><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='2')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='3')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								</tr>
							  </table></td>
							<td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								</tr>
							  </table></td>
							<td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								</tr>
							  </table></td>
							<td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='4')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><img src="<?= base_url().$item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><img src="<?= base_url().$item12->item_option_b_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><img src="<?= base_url().$item12->item_option_c_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><img src="<?= base_url().$item12->item_option_d_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='5')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><img src="<?= base_url().$item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><img src="<?= base_url().$item12->item_option_b_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><img src="<?= base_url().$item12->item_option_c_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><img src="<?= base_url().$item12->item_option_d_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='6')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><img src="<?= base_url().$item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><img src="<?= base_url().$item12->item_option_b_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><img src="<?= base_url().$item12->item_option_c_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><img src="<?= base_url().$item12->item_option_d_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='7')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								  <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								  <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item12->item_option_b_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								  <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item12->item_option_c_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								  <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item12->item_option_d_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='8')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								  <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								  <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item12->item_option_b_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								  <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item12->item_option_c_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								  <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item12->item_option_d_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='9')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								</tr>
								<tr>
								  <td colspan="2"><span><img src="<?= base_url().$item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								</tr>
								<tr>
								  <td colspan="2"><span><img src="<?= base_url().$item12->item_option_b_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								</tr>
								<tr>
								  <td colspan="2"><span><img src="<?= base_url().$item12->item_option_c_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								</tr>
								<tr>
								  <td colspan="2"><span><img src="<?= base_url().$item12->item_option_d_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='10')
					{
						?>
					<tr>
					  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					  <td><span><img src="<?= base_url().$item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='11')
					{
						?>
					<tr>
					  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						</table></td>
					  <td><span><img src="<?= base_url().$item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
					</tr>
					<?php
					}
					elseif($item12->item_option_layout=='12')
					{
						?>
					<tr>
					  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(a) <span><?php echo html_entity_decode($item12->item_option_a_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_a_ur);?></div></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(b) <span><?php echo html_entity_decode($item12->item_option_b_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_b_ur);?></div></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(c) <span><?php echo html_entity_decode($item12->item_option_c_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_c_ur);?></div></td>
								</tr>
							  </table></td>
							<td><table border="0" cellspacing="2" cellpadding="2">
								<tr>
								  <td>(d) <span><?php echo html_entity_decode($item12->item_option_d_en);?></span></td>
								  <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item12->item_option_d_ur);?></div></td>
								</tr>
							  </table></td>
						  </tr>
						  <tr>
							<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item12->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						</table></td>
					</tr>
					<?php
					}
				?>
				  </table>
				  <?php  
				   }
		   ?>
          <!--------------------Question No.12 ends here-------------------------------------> 
          
          <!--------------------Question No.13 START here------------------------------------->
          <?php
		   if(isset($item13->item_id)&&$item13->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item13->item_image_position=='Top') 
{
 	if($item13->item_image_en!="" && $item13->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item13->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item13->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item13->item_image_en!=""&&$item13->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item13->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item13->item_image_en==""&&$item13->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item13->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item13->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.13 : <?php echo html_entity_decode($item13->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item13->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  13 : &nbsp;<?php echo html_entity_decode($item13->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item13->item_image_position=='Bottom') 
{
 	if($item13->item_image_en!="" && $item13->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item13->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item13->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item13->item_image_en!=""&&$item13->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item13->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item13->item_image_en==""&&$item13->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item13->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item13->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item13->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item13->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item13->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item13->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item13->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item13->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item13->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item13->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item13->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item13->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item13->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item13->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item13->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item13->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item13->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item13->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item13->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item13->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item13->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item13->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item13->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item13->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item13->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item13->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item13->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item13->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.13 ends here-------------------------------------> 
          
          <!--------------------Question No.14 START here-------------------------------------> 
          <?php
		   if(isset($item14->item_id)&&$item14->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item14->item_image_position=='Top') 
{
 	if($item14->item_image_en!="" && $item14->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item14->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item14->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item14->item_image_en!=""&&$item14->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item14->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item14->item_image_en==""&&$item14->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item14->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item14->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.14 : <?php echo html_entity_decode($item14->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item14->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  14 : &nbsp; <?php echo html_entity_decode($item14->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item14->item_image_position=='Bottom') 
{
 	if($item14->item_image_en!="" && $item14->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item14->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item14->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item14->item_image_en!=""&&$item14->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item14->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item14->item_image_en==""&&$item14->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item14->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item14->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item14->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item14->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item14->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item14->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item14->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item14->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item14->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item14->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item14->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item14->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item14->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item14->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item14->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item14->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item14->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item14->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item14->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item14->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item14->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item14->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item14->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item14->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item14->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item14->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item14->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item14->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.14 ends here-------------------------------------> 
          
          <!--------------------Question No.15 START here------------------------------------->
          <?php
		   if(isset($item15->item_id)&&$item15->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item15->item_image_position=='Top') 
{
 	if($item15->item_image_en!="" && $item15->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item15->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item15->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item15->item_image_en!=""&&$item15->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item15->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item15->item_image_en==""&&$item15->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item15->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item15->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.15 :<?php echo html_entity_decode($item15->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item15->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  15 : &nbsp; <?php echo html_entity_decode($item15->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item15->item_image_position=='Bottom') 
{
 	if($item15->item_image_en!="" && $item15->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item15->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item15->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item15->item_image_en!=""&&$item15->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item15->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item15->item_image_en==""&&$item15->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item15->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item15->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item15->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item15->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item15->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item15->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item15->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item15->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item15->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item15->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item15->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item15->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item15->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item15->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item15->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item15->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item15->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item15->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item15->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item15->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item15->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item15->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item15->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item15->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item15->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item15->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item15->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item15->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.15 ends here-------------------------------------> 
          
          <!--------------------Question No.16 START here------------------------------------->
          <?php
		   if(isset($item16->item_id)&&$item16->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item16->item_image_position=='Top') 
{
 	if($item16->item_image_en!="" && $item16->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item16->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item16->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item16->item_image_en!=""&&$item16->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item16->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item16->item_image_en==""&&$item16->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item16->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item16->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.16 : <?php echo html_entity_decode($item16->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item16->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  16 : &nbsp; <?php echo html_entity_decode($item16->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item16->item_image_position=='Bottom') 
{
 	if($item16->item_image_en!="" && $item16->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item16->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item16->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item16->item_image_en!=""&&$item16->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item16->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item16->item_image_en==""&&$item16->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item16->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item16->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item16->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item16->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item16->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item16->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item16->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item16->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item16->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item16->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item16->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item16->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item16->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item16->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item16->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item16->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item16->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item16->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item16->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item16->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item16->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item16->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item16->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item16->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item16->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item16->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item16->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item16->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.16 ends here-------------------------------------> 
          
          <!--------------------Question No.17 START here------------------------------------->
          <?php
		   if(isset($item17->item_id)&&$item17->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item17->item_image_position=='Top') 
{
 	if($item17->item_image_en!="" && $item17->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item17->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item17->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item17->item_image_en!=""&&$item17->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item17->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item17->item_image_en==""&&$item17->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item17->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item17->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.17 : <?php echo html_entity_decode($item17->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item17->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  17 : &nbsp; <?php echo html_entity_decode($item17->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item17->item_image_position=='Bottom') 
{
 	if($item17->item_image_en!="" && $item17->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item17->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item17->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item17->item_image_en!=""&&$item17->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item17->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item17->item_image_en==""&&$item17->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item17->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item17->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item17->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item17->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item17->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item17->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item17->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item17->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item17->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item17->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item17->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item17->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item17->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item17->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item17->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item17->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item17->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item17->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item17->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item17->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item17->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item17->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item17->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item17->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item17->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item17->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item17->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item17->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.17 ends here-------------------------------------> 
          
          <!--------------------Question No.18 START here------------------------------------->
          <?php
		   if(isset($item18->item_id)&&$item18->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item18->item_image_position=='Top') 
{
 	if($item18->item_image_en!="" && $item18->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item18->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item18->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item18->item_image_en!=""&&$item18->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item18->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item18->item_image_en==""&&$item18->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item18->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item18->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.18 : <?php echo html_entity_decode($item18->item_stem_en);?></td>
            </tr>
            <?php }?>
            <?php if($item18->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  18 : &nbsp; <?php echo html_entity_decode($item18->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item18->item_image_position=='Bottom') 
{
 	if($item18->item_image_en!="" && $item18->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item18->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item18->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item18->item_image_en!=""&&$item18->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item18->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item18->item_image_en==""&&$item18->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item18->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item18->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item18->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item18->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item18->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item18->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item18->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item18->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item18->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item18->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item18->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item18->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item18->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item18->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item18->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item18->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item18->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item18->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item18->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item18->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item18->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item18->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item18->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item18->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item18->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item18->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item18->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item18->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.18 ends here------------------------------------->
           
          <!--------------------Question No.19 START here------------------------------------->
          <?php
		   if(isset($item19->item_id)&&$item19->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item19->item_image_position=='Top') 
{
 	if($item19->item_image_en!="" && $item19->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item19->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item19->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item19->item_image_en!=""&&$item19->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item19->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item19->item_image_en==""&&$item19->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item19->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item19->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.19 : <?php echo html_entity_decode($item19->item_stem_en);?>
                <?php if($this->session->userdata('role_id')==3){ ?>
                <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$item19->item_id);?>">Edit Item</a>
                <?php } ?></td>
            </tr>
            <?php }?>
            <?php if($item19->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  19 : &nbsp; <?php echo html_entity_decode($item19->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item19->item_image_position=='Bottom') 
{
 	if($item19->item_image_en!="" && $item19->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item19->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item19->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item19->item_image_en!=""&&$item19->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item19->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item19->item_image_en==""&&$item19->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item19->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item19->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item19->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item19->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item19->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item19->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item19->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item19->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item19->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item19->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item19->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item19->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item19->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item19->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item19->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item19->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item19->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item19->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item19->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item19->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item19->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item19->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item19->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item19->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item19->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item19->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item19->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item19->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.19 ends here------------------------------------->
           
          <!--------------------Question No.20 START here------------------------------------->
          <?php
		   if(isset($item20->item_id)&&$item20->item_id!=0)
		   {
			 ?>
          <table width="100%" style="margin-top:10px;" >
            <?php if ($item20->item_image_position=='Top') 
{
 	if($item20->item_image_en!="" && $item20->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item20->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item20->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item20->item_image_en!=""&&$item20->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item20->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item20->item_image_en==""&&$item20->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item20->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
?>
            <?php if($item20->item_stem_en!='') { ?>
            <tr>
              <td colspan="2" style="font-weight:bold">Question No.20 : <?php echo html_entity_decode($item20->item_stem_en);?>
                <?php if($this->session->userdata('role_id')==3){ ?>
                <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$item20->item_id);?>">Edit Item</a>
                <?php } ?></td>
            </tr>
            <?php }?>
            <?php if($item20->item_stem_ur!='') { ?>
            <tr>
              <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  20 : &nbsp; <?php echo html_entity_decode($item20->item_stem_ur);?></td>
            </tr>
            <?php }?>
            <?php if ($item20->item_image_position=='Bottom') 
{
 	if($item20->item_image_en!="" && $item20->item_image_ur!="") 
	{
		?>
            <tr>
              <td><img src="<?= base_url().$item20->item_image_en;?>" style="max-height:400px;"/></td>
              <td style="float:right"><img src="<?= base_url().$item20->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 
	}
	elseif($item20->item_image_en!=""&&$item20->item_image_ur=="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item20->item_image_en;?>" style="max-height:400px;" /></td>
            </tr>
            <?php 	
	}
	elseif($item20->item_image_en==""&&$item20->item_image_ur!="")
	{
	?>
            <tr>
              <td colspan="2" style="text-align:center"><img src="<?= base_url().$item20->item_image_ur;?>" style="max-height:400px;"/></td>
            </tr>
            <?php 	
	}
}
    		if($item20->item_option_layout=='1')
            {
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" ><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
            }
			elseif($item20->item_option_layout=='2')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='3')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='4')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item20->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item20->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item20->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='5')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item20->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item20->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item20->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='6')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><img src="<?= base_url().$item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><img src="<?= base_url().$item20->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><img src="<?= base_url().$item20->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><img src="<?= base_url().$item20->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='7')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item20->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item20->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item20->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='8')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item20->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item20->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                          <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item20->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='9')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item20->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item20->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><span><img src="<?= base_url().$item20->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='10')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='11')
			{
				?>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              <td><span><img src="<?= base_url().$item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
            </tr>
            <?php
			}
			elseif($item20->item_option_layout=='12')
			{
				?>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(a) <span><?php echo html_entity_decode($item20->item_option_a_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_a_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(b) <span><?php echo html_entity_decode($item20->item_option_b_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_b_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(c) <span><?php echo html_entity_decode($item20->item_option_c_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_c_ur);?></div></td>
                        </tr>
                      </table></td>
                    <td><table border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td>(d) <span><?php echo html_entity_decode($item20->item_option_d_en);?></span></td>
                          <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item20->item_option_d_ur);?></div></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item20->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                  </tr>
                </table></td>
            </tr>
            <?php
			}
?>
          </table>
          <?php  
		   }
		   ?>
          <!--------------------Question No.20 ends here-------------------------------------> 
          
          <!--------------------Question No.21 START here------------------------------------->
          <?php
		   if(isset($item21->item_id)&&$item21->item_id!=0)
		   {
			 ?>
              <table width="100%" style="margin-top:10px;" >
                <?php if ($item21->item_image_position=='Top') 
{
 	if($item21->item_image_en!="" && $item21->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item21->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item21->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item21->item_image_en!=""&&$item21->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item21->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item21->item_image_en==""&&$item21->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item21->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
?>
                <?php if($item21->item_stem_en!='') { ?>
                <tr>
                  <td colspan="2" style="font-weight:bold">Question No.21 : <?php echo html_entity_decode($item21->item_stem_en);?>
                    <?php if($this->session->userdata('role_id')==3){ ?>
                    <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$item21->item_id);?>">Edit Item</a>
                    <?php } ?></td>
                </tr>
                <?php }?>
                <?php if($item21->item_stem_ur!='') { ?>
                <tr>
                  <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  21 : &nbsp; <?php echo html_entity_decode($item21->item_stem_ur);?></td>
                </tr>
                <?php }?>
                <?php if ($item21->item_image_position=='Bottom') 
{
 	if($item21->item_image_en!="" && $item21->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item21->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item21->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item21->item_image_en!=""&&$item21->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item21->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item21->item_image_en==""&&$item21->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item21->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
    		if($item21->item_option_layout=='1')
            {
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
            }
			elseif($item21->item_option_layout=='2')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='3')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='4')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='5')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='6')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='7')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='8')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='9')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='10')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='11')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item21->item_option_layout=='12')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item21->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item21->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item21->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item21->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item21->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
?>
              </table>
              <?php  
		   }
		   ?>
              <!--------------------Question No.21 ends here-------------------------------------> 
              
              <!--------------------Question No.22 START here------------------------------------->
              <?php
		   if(isset($item22->item_id)&&$item22->item_id!=0)
		   {
			 ?>
              <table width="100%" style="margin-top:10px;" >
                <?php if ($item22->item_image_position=='Top') 
{
 	if($item22->item_image_en!="" && $item22->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item22->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item22->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item22->item_image_en!=""&&$item22->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item22->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item22->item_image_en==""&&$item22->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item22->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
?>
                <?php if($item22->item_stem_en!='') { ?>
                <tr>
                  <td colspan="2" style="font-weight:bold">Question No.22 :<?php echo html_entity_decode($item22->item_stem_en);?>
                    <?php if($this->session->userdata('role_id')==3){ ?>
                    <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$item22->item_id);?>">Edit Item</a>
                    <?php } ?></td>
                </tr>
                <?php }?>
                <?php if($item22->item_stem_ur!='') { ?>
                <tr>
                  <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  22 : &nbsp; <?php echo html_entity_decode($item22->item_stem_ur);?></td>
                </tr>
                <?php }?>
                <?php if ($item22->item_image_position=='Bottom') 
{
 	if($item22->item_image_en!="" && $item22->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item22->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item22->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item22->item_image_en!=""&&$item22->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item22->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item22->item_image_en==""&&$item22->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item22->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
    		if($item22->item_option_layout=='1')
            {
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
            }
			elseif($item22->item_option_layout=='2')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='3')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='4')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='5')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='6')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='7')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='8')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='9')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='10')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='11')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item22->item_option_layout=='12')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item22->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item22->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item22->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item22->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item22->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
?>
              </table>
              <?php  
		   }
		   ?>
              <!--------------------Question No.22 ends here-------------------------------------> 
              
              <!--------------------Question No.23 START here------------------------------------->
              <?php
		   if(isset($item23->item_id)&&$item23->item_id!=0)
		   {
			 ?>
              <table width="100%" style="margin-top:10px;" >
                <?php if ($item23->item_image_position=='Top') 
{
 	if($item23->item_image_en!="" && $item23->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item23->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item23->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item23->item_image_en!=""&&$item23->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item23->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item23->item_image_en==""&&$item23->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item23->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
?>
                <?php if($item23->item_stem_en!='') { ?>
                <tr>
                  <td colspan="2" style="font-weight:bold">Question No.23 : <?php echo html_entity_decode($item23->item_stem_en);?>
                    <?php if($this->session->userdata('role_id')==3){ ?>
                    <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$item23->item_id);?>">Edit Item</a>
                    <?php } ?></td>
                </tr>
                <?php }?>
                <?php if($item23->item_stem_ur!='') { ?>
                <tr>
                  <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  23 : &nbsp; <?php echo html_entity_decode($item23->item_stem_ur);?></td>
                </tr>
                <?php }?>
                <?php if ($item23->item_image_position=='Bottom') 
{
 	if($item23->item_image_en!="" && $item23->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item23->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item23->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item23->item_image_en!=""&&$item23->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item23->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item23->item_image_en==""&&$item23->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item23->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
    		if($item23->item_option_layout=='1')
            {
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
            }
			elseif($item23->item_option_layout=='2')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='3')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='4')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='5')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='6')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='7')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='8')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='9')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='10')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='11')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item23->item_option_layout=='12')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item23->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item23->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item23->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item23->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item23->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
?>
              </table>
              <?php  
		   }
		   ?>
              <!--------------------Question No.23 ends here-------------------------------------> 
              
              <!--------------------Question No.24 START here------------------------------------->
              <?php
		   if(isset($item24->item_id)&&$item24->item_id!=0)
		   {
			 ?>
              <table width="100%" style="margin-top:10px;" >
                <?php if ($item24->item_image_position=='Top') 
{
 	if($item24->item_image_en!="" && $item24->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item24->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item24->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item24->item_image_en!=""&&$item24->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item24->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item24->item_image_en==""&&$item24->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item24->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
?>
                <?php if($item24->item_stem_en!='') { ?>
                <tr>
                  <td colspan="2" style="font-weight:bold">Question No.24 : <?php echo html_entity_decode($item24->item_stem_en);?>
                    <?php if($this->session->userdata('role_id')==3){ ?>
                    <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$item24->item_id);?>">Edit Item</a>
                    <?php } ?></td>
                </tr>
                <?php }?>
                <?php if($item24->item_stem_ur!='') { ?>
                <tr>
                  <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  24 : &nbsp; <?php echo html_entity_decode($item24->item_stem_ur);?></td>
                </tr>
                <?php }?>
                <?php if ($item24->item_image_position=='Bottom') 
{
 	if($item24->item_image_en!="" && $item24->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item24->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item24->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item24->item_image_en!=""&&$item24->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item24->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item24->item_image_en==""&&$item24->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item24->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
    		if($item24->item_option_layout=='1')
            {
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
            }
			elseif($item24->item_option_layout=='2')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='3')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='4')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='5')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='6')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='7')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='8')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='9')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='10')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='11')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item24->item_option_layout=='12')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item24->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item24->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item24->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item24->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item24->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
?>
              </table>
              <?php  
		   }
		   ?>
              <!--------------------Question No.24 ends here-------------------------------------> 
              
              <!--------------------Question No.25 START here------------------------------------->
              <?php
		   if(isset($item25->item_id)&&$item25->item_id!=0)
		   {
			 ?>
              <table width="100%" style="margin-top:10px;" >
                <?php if ($item25->item_image_position=='Top') 
{
 	if($item25->item_image_en!="" && $item25->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item25->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item25->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item25->item_image_en!=""&&$item25->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item25->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item25->item_image_en==""&&$item25->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item25->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
?>
                <?php if($item25->item_stem_en!='') { ?>
                <tr>
                  <td colspan="2" style="font-weight:bold">Question No.25 :<?php echo html_entity_decode($item25->item_stem_en);?>
                    <?php if($this->session->userdata('role_id')==3){ ?>
                    <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$item25->item_id);?>">Edit Item</a>
                    <?php } ?></td>
                </tr>
                <?php }?>
                <?php if($item25->item_stem_ur!='') { ?>
                <tr>
                  <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> ???????? ????????  25 : &nbsp; <?php echo html_entity_decode($item25->item_stem_ur);?></td>
                </tr>
                <?php }?>
                <?php if ($item25->item_image_position=='Bottom') 
{
 	if($item25->item_image_en!="" && $item25->item_image_ur!="") 
	{
		?>
                <tr>
                  <td><img src="<?= base_url().$item25->item_image_en;?>" style="max-height:400px;"/></td>
                  <td style="float:right"><img src="<?= base_url().$item25->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 
	}
	elseif($item25->item_image_en!=""&&$item25->item_image_ur=="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item25->item_image_en;?>" style="max-height:400px;" /></td>
                </tr>
                <?php 	
	}
	elseif($item25->item_image_en==""&&$item25->item_image_ur!="")
	{
	?>
                <tr>
                  <td colspan="2" style="text-align:center"><img src="<?= base_url().$item25->item_image_ur;?>" style="max-height:400px;"/></td>
                </tr>
                <?php 	
	}
}
    		if($item25->item_option_layout=='1')
            {
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" ><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
            }
			elseif($item25->item_option_layout=='2')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='3')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='4')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='5')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='6')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><img src="<?= base_url().$item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><img src="<?= base_url().$item25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><img src="<?= base_url().$item25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><img src="<?= base_url().$item25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='7')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='8')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                              <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='9')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><span><img src="<?= base_url().$item25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='10')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='11')
			{
				?>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  <td><span><img src="<?= base_url().$item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                <?php
			}
			elseif($item25->item_option_layout=='12')
			{
				?>
                <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(a) <span><?php echo html_entity_decode($item25->item_option_a_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_a_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(b) <span><?php echo html_entity_decode($item25->item_option_b_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_b_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(c) <span><?php echo html_entity_decode($item25->item_option_c_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_c_ur);?></div></td>
                            </tr>
                          </table></td>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                              <td>(d) <span><?php echo html_entity_decode($item25->item_option_d_en);?></span></td>
                              <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item25->item_option_d_ur);?></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                </tr>
                <?php
			}
?>
              </table>
              <?php  
		   }
		   ?>
              <?php
	   
	   
		   ?>
              <!--------------------Question No.25 ends here-------------------------------------> 
              
            </div>
            
            <!-- /.box-body -->
            
            <div class="row">
              <div class="col-lg-12 col-sm-12">
                <hr/ >
              </div>
            </div>
          </div>
        </div>
  </section>
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script> 
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>