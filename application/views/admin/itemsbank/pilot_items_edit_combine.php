<!-- Content Wrapper. Contains page content -->

<style>
.borders{
	border-width:1px;
	border-style:solid;
	border-color:#666;
	border-radius: 10px;
}
</style>
<div  class="content-wrapper"> 
  <!-- Main content -->
  <section class="content">
    <div class="card card-default color-palette-bo">
      <div class="card-header">
      	<div class="row">
            <div class="col-4"><h4><i class="fa fa-plus"></i> Edit Item </h4></div>                     
        </div>
      </div>
      <?php $this->load->view('admin/includes/_messages.php') ?>
        <?php echo form_open(base_url('admin/pilotbank/pilot_edit_combine/'.$item['item_id']), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>
      <div class="card-body"> 
        <!-- For Messages -->
        
        <input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
        <div class="row">
            <div class="col-2"><label for="item_type" class="col-12 control-label">Select Item Type *</label></div>
            <div class="col-10">
                <select name="item_type" class="form-control form-group" id="item_type"  required="required" >                    
                <?php if($item['item_type']=="MCQ") { ?>  <option value="MCQ" <?php if($item['item_type']=="MCQ"){?> selected="selected" <?php }?>>MCQ</option> <?php } ?>
                 <?php if($item['item_type']=="ERQ") { ?>   <option value="ERQ" <?php if($item['item_type']=="ERQ"){?> selected="selected" <?php }?>>ERQ</option><?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-12">
            <label for="item_date_received" class="col-sm-6 control-label">Date *</label>
            <div class="col-12">
              <input type="text" name="item_date_received" class="form-control" id="item_date_received" placeholder="" required="required" value="<?php echo $item['item_date_received']; ?>" readonly >
            </div>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_code" class="col-sm-6 control-label">Item Code *</label>
            <div class="col-12">
              <input type="text" name="item_code" class="form-control" id="item_code" placeholder="" required="required"  value="<?php echo $item['item_code']; ?>" readonly >
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_difficulty" class="col-sm-12 control-label">Difficulty *</label>
            <div class="col-12">
              <input type="number" name="item_difficulty" class="form-control" id="item_difficulty" placeholder="" required="required" value="<?php echo $item['item_difficulty']; ?>" step="0.01" min="0.01" max="0.99">
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_discr" class="col-sm-6 control-label">Discr</label>
            <div class="col-12">
              <input type="number" name="item_discr" class="form-control" id="item_discr" placeholder="" required="required" value="<?php echo $item['item_discr']; ?>" min="-1" max="+1" step="0.01">
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_dif_code" class="col-sm-12 control-label">DIFF *</label>
            <div class="col-12">
              <select name="item_dif_code" class="form-control form-group" id="item_dif_code"  required="required">
                <option value="All" <?php if($item['item_dif_code']=="All"){?> selected="selected" <?php }?>>All</option>
                <option value="Male" <?php if($item['item_dif_code']=="Male"){?> selected="selected" <?php }?>>Male</option>
                <option value="Female" <?php if($item['item_dif_code']=="Female"){?> selected="selected" <?php }?>>Female</option>
                <option value="Urban" <?php if($item['item_dif_code']=="Urban"){?> selected="selected" <?php }?>>Urban</option>
                <option value="Rural" <?php if($item['item_dif_code']=="Rural"){?> selected="selected" <?php }?>>Rural</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 col-sm-12">
            <label for="item_grade_id" class="control-label">Grade *</label>
            <select name="item_grade_id" class="form-control form-group" id="item_grade_id"  required="required">
              <option value="">--Select Grades--</option>
				  <?php
                  foreach($grades as $grade)
                  {
                      $selectedText = '';
					  if($grade['grade_id']==$item['item_grade_id'])
					  $selectedText = 'selected="selected"';
					  echo '<option value="'.$grade['grade_id'].'"'.$selectedText.'>'.$grade['grade_name_en'].'</option>';
                  }
                  ?>
            </select>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_subject_id" class="control-label">Subject *</label>
            <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  required>
              <option value="">--Select Subjects--</option>
              	<?php
				   foreach($subjects as $subject)
					  {
						$selectedText = '';
						if($subject['subject_id']==$item['item_subject_id'])
						$selectedText = ' selected="selected" ';
						echo '<option value="'.$subject['subject_id'].'" '.$selectedText.'>'.$subject['subject_name_en'].'</option>';
					  }
				  ?> 
            </select>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_cstand_id" class="control-label">Content Strand *</label>
            <select name="item_cstand_id" class="form-control form-group" id="item_cstand_id"  required>
              <option value="">--Select Content Strand--</option>
              	<?php
                   foreach($cstands as $cstand)
					  {
						$selectedText = '';
						if($cstand['cs_id']==$item['item_cstand_id'])
						$selectedText = 'selected="selected"';
						echo '<option value="'.$cstand['cs_id'].'" '.$selectedText.'>'.$cstand['cs_number'].'-'.$cstand['cs_statement_en'].$cstand['cs_statement_ur'].'</option>';
					  }
                  ?> 
            </select>
          </div>
          <div class="col-lg-5 col-sm-12">
            <label for="item_subcstand_id" class="control-label">Sub Content Strand *</label>
            <select name="item_subcstand_id" class="form-control form-group" id="item_subcstand_id"  required>
              <option value="">--Select Content Strand--</option>
              <?php
				   foreach($subcstands as $subcstand)
					  {
						$selectedText = '';
								  if($subcstand['subcs_id']==$item['item_subcstand_id'])
								  $selectedText = ' selected="selected" ';
						echo '<option value="'.$subcstand['subcs_id'].'" '.$selectedText.'>'.$subcstand['subcs_number'].'-'.$subcstand['subcs_topic_en'].$subcstand['subcs_topic_ur'].'</option>';
					  }
				  ?> 
            </select>
          </div>
        </div>
        	<div class="row">
          <div class="col-lg-12 col-sm-12">
            <label for="item_slo_id" class="control-label">Select SLO Statement *</label>
            <select name="item_slo_id" class="form-control form-group" id="item_slo_id"  required>
              <option value="">--Select SLO Statement--</option>
              <?php
			  foreach($slos as $slo)
			  {
				$selectedText = '';
				  if($slo['slo_id']==$item['item_slo_id'])
				  $selectedText = ' selected="selected" ';
					echo '<option value="'.$slo['slo_id'].'" '.$selectedText.'>'.$slo['slo_number'].'-'.$slo['slo_statement_en'].$slo['slo_statement_ur'].'</option>';
			  }
			?>
            </select>
          </div>
        </div>
        	<div class="row">
          <div class="col-lg-2 col-sm-12">
            <label for="item_curriculum" class="control-label">Curriculum *</label>
            <select name="item_curriculum" class="form-control form-group" id="item_curriculum"  required>
                <option value="1" <?=($item['item_curriculum']=='1')?'selected':''?>>2006(ALP)</option>
                <option value="2" <?=($item['item_curriculum']=='2')?'selected':''?>>National Curriculum (2006)</option>
                <option value="3" <?=($item['item_curriculum']=='3')?'selected':''?>>Single National Curriculum(SNC) 2020</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_pctb_chapter" class="control-label">PCTB Chapter *</label>
            <input type="text" name="item_pctb_chapter" class="form-control" id="item_pctb_chapter" placeholder=""  value="<?= $item['item_pctb_chapter']; ?>" required="required">
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_pctb_page" class="control-label">PCTB Page No. *</label>
            <input type="text" name="item_pctb_page" class="form-control" id="item_pctb_page" placeholder=""  value="<?= $item['item_pctb_page']; ?>" required="required">
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_other_title" class="control-label">Other Title *</label>
            <input type="text" name="item_other_title" class="form-control" id="item_other_title" placeholder=""  value="<?= $item['item_other_title']; ?>" required="required">
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_other_year" class="control-label">Other Year *</label>
            <input type="text" name="item_other_year" class="form-control" id="item_other_year" placeholder=""  value="<?= $item['item_other_year']; ?>" required="required">
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_other_page" class="control-label">Other Page No. *</label>
            <input type="text" name="item_other_page" class="form-control" id="item_other_page" placeholder=""  value="<?= $item['item_other_page']; ?>" required="required">
          </div>
        </div>
        	<div class="row">
          <div class="col-lg-3 col-sm-12">
            <label for="item_cognitive_bloom" class="control-label">Bloom/Cognitive *</label>
            <select name="item_cognitive_bloom" class="form-control form-group" id="item_cognitive_bloom"  required="required">
             	<option value="Knowledge" <?= ($item['item_cognitive_bloom'] == "Knowledge")?'selected': '' ?>>Knowledge</option>
				<option value="Comprehension" <?= ($item['item_cognitive_bloom'] == "Comprehension")?'selected': '' ?>>Comprehension</option>
				<option value="Application" <?= ($item['item_cognitive_bloom'] == "Application")?'selected': '' ?>>Application</option>
				<option value="Analysis" <?= ($item['item_cognitive_bloom'] == "Analysis")?'selected': '' ?>>Analysis</option>
				<option value="Synthesis" <?= ($item['item_cognitive_bloom'] == "Synthesis")?'selected': '' ?>>Synthesis</option>
				<option value="Evaluation" <?= ($item['item_cognitive_bloom'] == "Evaluation")?'selected': '' ?>>Evaluation</option>  
            </select>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_relation" class="control-label">Relation *</label>
            <select name="item_relation" class="form-control form-group" id="item_relation"  required>
            	<option value="Direct Quote" <?= ($item['item_relation'] == "Direct Quote")?'selected': '' ?>>Direct Quote</option>
				<option value="Amended" <?= ($item['item_relation'] == "Amended")?'selected': '' ?>>Amended</option>
            </select>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_stem_number" class="control-label">STEM Number *</label>
            <input type="text" name="item_stem_number" class="form-control" id="item_stem_number" placeholder="" value="<?= $item['item_stem_number']; ?>" required>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_batch" class="control-label">Batch Number *</label>
            <select  name="item_batch" class="form-control" id="item_batch" readonly>
              	<option value="1" <?= ($item['item_batch'] == "1")?'selected': '' ?>>Batch - 1</option>
                <option value="2" <?= ($item['item_batch'] == "2")?'selected': '' ?>>Batch - 2</option>
            </select>
          </div>
        </div>
        	<div class="row">
              <div class="col-lg-6 col-sm-12">
                <label for="item_stem_en" class="control-label" style="padding-top:9px">Item / STEM (English) </label>
                <textarea id="item_stem_en" name="item_stem_en"  class="form-control form-group" ><?php echo $item['item_stem_en']; ?></textarea>
              </div>
              <div class="col-lg-6 col-sm-12">
                <label for="item_stem_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> ایٹم / سٹم ( اردو)</label>
                <textarea id="item_stem_ur" name="item_stem_ur"  class="form-control form-group" dir="rtl" lang="ur" ><?php echo $item['item_stem_ur']; ?></textarea>
              </div>
            </div>
        	<div class="row" style="padding-top:10px">
              <div class="col-lg-2 col-sm-12">
                <label for="item_image_position" class="control-label">Stem Images Position</label>
                <select name="item_image_position" class="form-control form-group" id="item_image_position" >
                    <option value="Top" <?= ($item['item_image_position'] == "Top")?'selected': '' ?>>Top</option>
                    <option value="Bottom" <?= ($item['item_image_position'] == "Bottom")?'selected': '' ?>>Bottom</option>
                    <option value="Left" <?= ($item['item_image_position'] == "Left")?'selected': '' ?>>Left</option>
                    <option value="Right" <?= ($item['item_image_position'] == "Right")?'selected': '' ?>>Right</option>
                    <option value="Full_Page" <?= ($item['item_image_position'] == "Full_Page")?'selected': '' ?>>Full Page</option>
                </select>
              </div>
              <div class="col-lg-5 col-sm-12">
                <label for="item_image_en" class="control-label">Item Image (Eng)</label>
                <input type="file" name="item_image_en" class="form-control" id="item_image_en" placeholder="" >
              </div>
              <div class="col-lg-5 col-sm-12">
                <label for="item_image_ur" class="control-label">Item Image (Urdu)</label>
                <input type="file" name="item_image_ur" class="form-control" id="item_image_ur" placeholder="">
              </div>
            </div>
       		<?php if ($item['item_image_en']!= "" || $item['item_image_ur']!= ""){?>
              <div class="row">             
				<div class="col-lg-2 col-sm-12"></div>
                <div class="col-lg-5 col-sm-12"><?php if($item['item_image_en']!=""){?><img src="<?php echo base_url().$item['item_image_en'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href='<?php echo base_url("admin/pilot_items/delete_image_combine/item_image_en-". $item['item_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>
                <div class="col-lg-5 col-sm-12"><?php if($item['item_image_ur']!=""){?><img src="<?php echo base_url().$item['item_image_ur'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href='<?php echo base_url("admin/pilot_items/delete_image_combine/item_image_ur-". $item['item_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a> <?php }?></div>    
              </div>
              <?php }?>
			<div class="row">             
                <div class="col-lg-12 col-sm-12">                         
                   <hr/ >
                </div>
            </div>
            
            <div id="MCQ_block"></div>
            <div id="ERQ_block"></div>
            <?php /*?><div id="FIB_block"></div>
            <div id="TF_block"></div>
            <div id="MC_block"></div><?php */?>
       </div>
       
      <div class="form-group" style="padding:10px; padding-bottom:30px">
          <div class="col-md-12">
            <input type="submit" name="submit" id="submit" value="Update" class="btn btn-info pull-right">
          </div>
        </div>
        <?php echo form_close( ); ?> 
    </div>
  </section>
</div>
<script language="javascript" type="text/javascript">

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
var MCQ_content = 
		'<div class="row">'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_layout" class="control-label">Select Item/Question Options Layout to Display *</label>'+
            '<select name="item_option_layout" class="form-control form-group" id="item_option_layout"  required>'+
              '<option value="1" <?= ($item['item_option_layout'] == "1")?'selected': '' ?> >1-Verticl-Text-Only</option>'+
              '<option value="2" <?= ($item['item_option_layout'] == "2")?'selected': '' ?> >2-Vertical-Horizontal-Text-Only</option>'+
              '<option value="3" <?= ($item['item_option_layout'] == "3")?'selected': '' ?> >3-Horizontal-Text-Only</option>'+
              '<option value="4" <?= ($item['item_option_layout'] == "4")?'selected': '' ?> >4-Vertical-Images-Only</option>'+
              '<option value="5" <?= ($item['item_option_layout'] == "5")?'selected': '' ?> >5-Vertical-Horizontal-Images-Only</option>'+
              '<option value="6" <?= ($item['item_option_layout'] == "6")?'selected': '' ?> >6-Horizontal-Images-Only</option>'+
              '<option value="7" <?= ($item['item_option_layout'] == "7")?'selected': '' ?> >7-Verticl-Text-with-Imges</option>'+
              '<option value="8" <?= ($item['item_option_layout'] == "8")?'selected': '' ?> >8-Vertical-Horizontal-Text-with-Images</option>'+
              '<option value="9" <?= ($item['item_option_layout'] == "9")?'selected': '' ?> >9-Horizontal-Text-with-Images</option>'+
              '<option value="10" <?= ($item['item_option_layout'] == "10")?'selected': '' ?> >10-Verticl-Text-with-Single-Imge</option>'+
              '<option value="11" <?= ($item['item_option_layout'] == "11")?'selected': '' ?> >11-Vertical-Horizontal-Text-with-Single-Image</option>'+
              '<option value="12" <?= ($item['item_option_layout'] == "12")?'selected': '' ?> >12-Horizontal-Text-with-Single-Image</option>'+
           '</select>'+
          '</div>'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="layout_preview" class="control-label">Selected Layout</label>'+
            '<img src="<?= base_url(); ?>assets/img/layouts/<?php echo ($item['item_option_layout']!="")?$item['item_option_layout']:"1";?>.jpg" id="layout_preview" name="layout_preview" >'+
          '</div>'+
      '</div>'+
        '<div class="row">'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_a_en" class="control-label">Option a (English)</label>'+
            '<textarea  name="item_option_a_en" class="form-control" id="item_option_a_en" ><?= str_replace(array("\r", "\n"), '', $item['item_option_a_en']); ?></textarea>'+
          '</div>'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_a_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن اے  اردو</label>'+
            '<textarea  name="item_option_a_ur" class="form-control" id="item_option_a_ur"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_option_a_ur']); ?></textarea>'+
          '</div>'+
        '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_b_en" class="control-label">Option b (English)</label>'+
        '<textarea  name="item_option_b_en" class="form-control" id="item_option_b_en" ><?= str_replace(array("\r", "\n"), '', $item['item_option_b_en']); ?></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_b_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن بی  اردو </label>'+
        '<textarea  name="item_option_b_ur" class="form-control" id="item_option_b_ur"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_option_b_ur']); ?></textarea>'+
      '</div>'+
    '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_c_en" class="control-label">Option c (English)</label>'+
        '<textarea  name="item_option_c_en" class="form-control" id="item_option_c_en" ><?= str_replace(array("\r", "\n"), '', $item['item_option_c_en']); ?></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_c_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن سی  اردو </label>'+
        '<textarea  name="item_option_c_ur" class="form-control" id="item_option_c_ur"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_option_c_ur']); ?></textarea>'+
      '</div>'+
    '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_d_en" class="control-label">Option d (English)</label>'+
        '<textarea  name="item_option_d_en" class="form-control" id="item_option_d_en" ><?= str_replace(array("\r", "\n"), '', $item['item_option_d_en']); ?></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_d_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن ڈی  اردو </label>'+
        '<textarea  name="item_option_d_ur" class="form-control" id="item_option_d_ur"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_option_d_ur']); ?></textarea>'+
      '</div>'+
    '</div>'+
	'<div class="form-group row">'+
      '<div class="col-lg-3 col-sm-12">'+
        '<label for="item_option_a_image" class="control-label urdufont-right">Option a Image</label>'+
        '<input type="file" name="item_option_a_image" class="form-control" id="item_option_a_image" placeholder=""  disabled >'+
      '</div>'+
      '<div class="col-lg-3 col-sm-12">'+
        '<label for="item_option_b_image" class="control-label urdufont-right">Option b Image</label>'+
        '<input type="file" name="item_option_b_image" class="form-control" id="item_option_b_image" placeholder=""  disabled>'+
      '</div>'+
      '<div class="col-lg-3 col-sm-12">'+
        '<label for="item_option_c_image" class="control-label urdufont-right">Option c Image</label>'+
        '<input type="file" name="item_option_c_image" class="form-control" id="item_option_c_image" placeholder=""   disabled>'+
      '</div>'+
      '<div class="col-lg-3 col-sm-12">'+
        '<label for="item_option_d_image" class="control-label urdufont-right">Option d Image</label>'+
        '<input type="file" name="item_option_d_image" class="form-control" id="item_option_d_image" placeholder=""  disabled>'+
      '</div>'+
    '</div>'+
	'<?php if ($item['item_option_a_image']!="" || $item['item_option_b_image']!="" || $item['item_option_c_image']!="" || $item['item_option_d_image']!="") {?>'+
	  '<div class="form-group row">'+
		 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_option_a_image']!=""){?><img src="<?php echo base_url().$item['item_option_a_image'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href="<?php echo base_url("admin/pilot_items/delete_image_combine/item_option_a_image-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>'+
		 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_option_b_image']!=""){?><img src="<?php echo base_url().$item['item_option_b_image'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href="<?php echo base_url("admin/pilot_items/delete_image_combine/item_option_b_image-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>'+
		 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_option_c_image']!=""){?><img src="<?php echo base_url().$item['item_option_c_image'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href="<?php echo base_url("admin/pilot_items/delete_image_combine/item_option_c_image-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>'+
		 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_option_d_image']!=""){?><img src="<?php echo base_url().$item['item_option_d_image'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href="<?php echo base_url("admin/pilot_items/delete_image_combine/item_option_d_image-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>'+
	  '</div>'
	'<?php }?>'+
        '<div class="form-group">'+
          '<label for="item_option_correct" class="col-sm-12 control-label">Correct Answer from Above Options</label>'+
          '<div class="col-12">'+
            '<input type="radio" name="item_option_correct" value="a" <?= ($item['item_option_correct'] == "a")?'checked="checked"': '' ?> />'+
            '<label for="a" class="control-label" style="padding: 0px 30px 0px 5px;">Option a</label>'+
            '<input type="radio" name="item_option_correct" value="b" <?= ($item['item_option_correct'] == "b")?'checked="checked"': '' ?>/>'+
            '<label for="b" class="control-label" style="padding: 0px 30px 0px 5px;">Option b</label>'+
            '<input type="radio" name="item_option_correct" value="c" <?= ($item['item_option_correct'] == "c")?'checked="checked"': '' ?>/>'+
            '<label for="c" class="control-label" style="padding: 0px 30px 0px 5px;">Option c</label>'+
            '<input type="radio" name="item_option_correct" value="d" <?= ($item['item_option_correct'] == "d")?'checked="checked"': '' ?>/>'+
            '<label for="d" class="control-label" style="padding: 0px 30px 0px 5px;">Option d</label>'+
          '</div>'+
        '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var ERQ_content = 
			'<div class="row">'+
			   '<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_rubric_english" class="control-label" style="padding-top:15px">Rubric (English)</label>'+
                '<textarea  name="item_rubric_english" class="form-control" id="item_rubric_english" ><?= str_replace(array("\r", "\n"), '', $item['item_rubric_english']); ?></textarea>'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_rubric_urdu" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> روبرک  اردو</label>'+
                '<textarea  name="item_rubric_urdu" class="form-control" id="item_rubric_urdu"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_rubric_urdu']); ?></textarea>'+
             ' </div>'+
            '</div>'+
            '<div class="form-group row" style="padding-top:10px">'+
              '<div class="col-lg-3 col-sm-12">'+
                '<label for="item_rubric_image_position" class="control-label">Rubric Images Potion</label>'+
                '<select name="item_rubric_image_position" class="form-control form-group" id="item_rubric_image_position">'+
                  '<option value="Top" <?= ($item['item_rubric_image_position'] == "Top")?'selected': '' ?>>Top</option>'+
                  '<option value="Bottom" <?= ($item['item_rubric_image_position'] == "Bottom")?'selected': '' ?>>Bottom</option>'+
                  '<option value="Left" <?= ($item['item_rubric_image_position'] == "Left")?'selected': '' ?>>Left</option>'+
                  '<option value="Right" <?= ($item['item_rubric_image_position'] == "Right")?'selected': '' ?>>Right</option>'+
                '</select>'+
              '</div>'+
              '<div class="col-lg-3 col-sm-12">'+
                '<label for="item_rubric_image" class="control-label">Rubric Image</label>'+
                '<input type="file" name="item_rubric_image" class="form-control" id="item_rubric_image" placeholder="">'+
              '</div>'+
			  '<div class="col-lg-3 col-sm-12"></div>'+ 
			  '<div class="col-lg-3 col-sm-12"></div>'+ 
			'</div>'+
			'<?php if($item['item_rubric_image']!=""){?>'+
              '<div class="form-group row">'+
              	 '<div class="col-lg-3 col-sm-12"></div>'+
                 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_rubric_image']!=""){?><img src="<?php echo base_url().$item['item_rubric_image'];?>" style="max-height:100px; max-width:100px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px" href="<?php echo base_url("admin/pilot_items/delete_image_combine/item_rubric_image-". $item['item_id']);?>" title="Delete" ><i class="fa fa-trash-o"></i></a><?php }?></div>'+
              	 '<div class="col-lg-3 col-sm-12"></div>'+
			  	 '<div class="col-lg-3 col-sm-12"></div>'+ 
			  '</div>'+
            '<?php }?>';
			//onclick="return confirm(\'Do you want to delete ?\')"
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
$('#item_type').on('change', function() {
	if ( this.value == 'MCQ' ) {
		$( '#MCQ_block' ).show();
		$( '#MCQ_block' ).empty();
		$( '#MCQ_block' ).append(MCQ_content);
		$( '#ERQ_block' ).hide();
		
		/*item_option_a_en*/
		(function() {
		var mathElements = [
		'math',
		'maction',
		'maligngroup',
		'malignmark',
		'menclose',
		'merror',
		'mfenced',
		'mfrac',
		'mglyph',
		'mi',
		'mlabeledtr',
		'mlongdiv',
		'mmultiscripts',
		'mn',
		'mo',
		'mover',
		'mpadded',
		'mphantom',
		'mroot',
		'mrow',
		'ms',
		'mscarries',
		'mscarry',
		'msgroup',
		'msline',
		'mspace',
		'msqrt',
		'msrow',
		'mstack',
		'mstyle',
		'msub',
		'msup',
		'msubsup',
		'mtable',
		'mtd',
		'mtext',
		'mtr',
		'munder',
		'munderover',
		'semantics',
		'annotation',
		'annotation-xml'
		];
		CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		CKEDITOR.replace('item_option_a_en', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
		height: 120,
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		
		(function() {
		var mathElements = [
		'math',
		'maction',
		'maligngroup',
		'malignmark',
		'menclose',
		'merror',
		'mfenced',
		'mfrac',
		'mglyph',
		'mi',
		'mlabeledtr',
		'mlongdiv',
		'mmultiscripts',
		'mn',
		'mo',
		'mover',
		'mpadded',
		'mphantom',
		'mroot',
		'mrow',
		'ms',
		'mscarries',
		'mscarry',
		'msgroup',
		'msline',
		'mspace',
		'msqrt',
		'msrow',
		'mstack',
		'mstyle',
		'msub',
		'msup',
		'msubsup',
		'mtable',
		'mtd',
		'mtext',
		'mtr',
		'munder',
		'munderover',
		'semantics',
		'annotation',
		'annotation-xml'
		];
		CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		CKEDITOR.replace('item_option_d_en', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
		height: 120,
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		
		/*item_option_b_en*/
		(function() {
		var mathElements = [
		'math',
		'maction',
		'maligngroup',
		'malignmark',
		'menclose',
		'merror',
		'mfenced',
		'mfrac',
		'mglyph',
		'mi',
		'mlabeledtr',
		'mlongdiv',
		'mmultiscripts',
		'mn',
		'mo',
		'mover',
		'mpadded',
		'mphantom',
		'mroot',
		'mrow',
		'ms',
		'mscarries',
		'mscarry',
		'msgroup',
		'msline',
		'mspace',
		'msqrt',
		'msrow',
		'mstack',
		'mstyle',
		'msub',
		'msup',
		'msubsup',
		'mtable',
		'mtd',
		'mtext',
		'mtr',
		'munder',
		'munderover',
		'semantics',
		'annotation',
		'annotation-xml'
		];
		CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		CKEDITOR.replace('item_option_b_en', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		height: 120,
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		
		/*item_option_c_en*/
		(function() {
		var mathElements = [
		'math',
		'maction',
		'maligngroup',
		'malignmark',
		'menclose',
		'merror',
		'mfenced',
		'mfrac',
		'mglyph',
		'mi',
		'mlabeledtr',
		'mlongdiv',
		'mmultiscripts',
		'mn',
		'mo',
		'mover',
		'mpadded',
		'mphantom',
		'mroot',
		'mrow',
		'ms',
		'mscarries',
		'mscarry',
		'msgroup',
		'msline',
		'mspace',
		'msqrt',
		'msrow',
		'mstack',
		'mstyle',
		'msub',
		'msup',
		'msubsup',
		'mtable',
		'mtd',
		'mtext',
		'mtr',
		'munder',
		'munderover',
		'semantics',
		'annotation',
		'annotation-xml'
		];
		CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		CKEDITOR.replace('item_option_c_en', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		height: 120,
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		
		/*item_option_a_ur*/
		(function() {
		var mathElements = [
		'math',
		'maction',
		'maligngroup',
		'malignmark',
		'menclose',
		'merror',
		'mfenced',
		'mfrac',
		'mglyph',
		'mi',
		'mlabeledtr',
		'mlongdiv',
		'mmultiscripts',
		'mn',
		'mo',
		'mover',
		'mpadded',
		'mphantom',
		'mroot',
		'mrow',
		'ms',
		'mscarries',
		'mscarry',
		'msgroup',
		'msline',
		'mspace',
		'msqrt',
		'msrow',
		'mstack',
		'mstyle',
		'msub',
		'msup',
		'msubsup',
		'mtable',
		'mtd',
		'mtext',
		'mtr',
		'munder',
		'munderover',
		'semantics',
		'annotation',
		'annotation-xml'
		];
		CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		CKEDITOR.replace('item_option_a_ur', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		height: 120,
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		contentsLangDirection: 'rtl',
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		
		/*item_option_b_ur*/
		(function() {
		var mathElements = [
		'math',
		'maction',
		'maligngroup',
		'malignmark',
		'menclose',
		'merror',
		'mfenced',
		'mfrac',
		'mglyph',
		'mi',
		'mlabeledtr',
		'mlongdiv',
		'mmultiscripts',
		'mn',
		'mo',
		'mover',
		'mpadded',
		'mphantom',
		'mroot',
		'mrow',
		'ms',
		'mscarries',
		'mscarry',
		'msgroup',
		'msline',
		'mspace',
		'msqrt',
		'msrow',
		'mstack',
		'mstyle',
		'msub',
		'msup',
		'msubsup',
		'mtable',
		'mtd',
		'mtext',
		'mtr',
		'munder',
		'munderover',
		'semantics',
		'annotation',
		'annotation-xml'
		];
		CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		CKEDITOR.replace('item_option_b_ur', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		height: 120,
		contentsLangDirection: 'rtl',
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		
		/*item_option_c_ur*/
		(function() {
		var mathElements = [
		'math',
		'maction',
		'maligngroup',
		'malignmark',
		'menclose',
		'merror',
		'mfenced',
		'mfrac',
		'mglyph',
		'mi',
		'mlabeledtr',
		'mlongdiv',
		'mmultiscripts',
		'mn',
		'mo',
		'mover',
		'mpadded',
		'mphantom',
		'mroot',
		'mrow',
		'ms',
		'mscarries',
		'mscarry',
		'msgroup',
		'msline',
		'mspace',
		'msqrt',
		'msrow',
		'mstack',
		'mstyle',
		'msub',
		'msup',
		'msubsup',
		'mtable',
		'mtd',
		'mtext',
		'mtr',
		'munder',
		'munderover',
		'semantics',
		'annotation',
		'annotation-xml'
		];
		CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		CKEDITOR.replace('item_option_c_ur', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		height: 120,
		contentsLangDirection: 'rtl',
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		
		/*item_option_d_ur*/
		(function() {
		var mathElements = [
		'math',
		'maction',
		'maligngroup',
		'malignmark',
		'menclose',
		'merror',
		'mfenced',
		'mfrac',
		'mglyph',
		'mi',
		'mlabeledtr',
		'mlongdiv',
		'mmultiscripts',
		'mn',
		'mo',
		'mover',
		'mpadded',
		'mphantom',
		'mroot',
		'mrow',
		'ms',
		'mscarries',
		'mscarry',
		'msgroup',
		'msline',
		'mspace',
		'msqrt',
		'msrow',
		'mstack',
		'mstyle',
		'msub',
		'msup',
		'msubsup',
		'mtable',
		'mtd',
		'mtext',
		'mtr',
		'munder',
		'munderover',
		'semantics',
		'annotation',
		'annotation-xml'
		];
		CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		CKEDITOR.replace('item_option_d_ur', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		height: 120,
		contentsLangDirection: 'rtl',
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		
	} else if ( this.value == 'ERQ' ) {
		$( '#MCQ_block' ).hide();
		$( '#ERQ_block' ).show();
		$( '#ERQ_block' ).empty();
		$( '#ERQ_block' ).append(ERQ_content);
		
		
		/*item_rubric_english*/
		(function() {
		var mathElements = [
			'math',
			'maction',
			'maligngroup',
			'malignmark',
			'menclose',
			'merror',
			'mfenced',
			'mfrac',
			'mglyph',
			'mi',
			'mlabeledtr',
			'mlongdiv',
			'mmultiscripts',
			'mn',
			'mo',
			'mover',
			'mpadded',
			'mphantom',
			'mroot',
			'mrow',
			'ms',
			'mscarries',
			'mscarry',
			'msgroup',
			'msline',
			'mspace',
			'msqrt',
			'msrow',
			'mstack',
			'mstyle',
			'msub',
			'msup',
			'msubsup',
			'mtable',
			'mtd',
			'mtext',
			'mtr',
			'munder',
			'munderover',
			'semantics',
			'annotation',
			'annotation-xml'
		  ];
		  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		  CKEDITOR.replace('item_rubric_english', {
			extraPlugins: 'ckeditor_wiris',
			// For now, MathType is incompatible with CKEditor file upload plugins.
			removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
			height: 120,
			  enterMode : CKEDITOR.ENTER_BR,
			shiftEnterMode: CKEDITOR.ENTER_P,
			// Update the ACF configuration with MathML syntax.
			extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		  });
		}());
		/*item_rubric_urdu*/
		(function() {
		  var mathElements = [
			'math',
			'maction',
			'maligngroup',
			'malignmark',
			'menclose',
			'merror',
			'mfenced',
			'mfrac',
			'mglyph',
			'mi',
			'mlabeledtr',
			'mlongdiv',
			'mmultiscripts',
			'mn',
			'mo',
			'mover',
			'mpadded',
			'mphantom',
			'mroot',
			'mrow',
			'ms',
			'mscarries',
			'mscarry',
			'msgroup',
			'msline',
			'mspace',
			'msqrt',
			'msrow',
			'mstack',
			'mstyle',
			'msub',
			'msup',
			'msubsup',
			'mtable',
			'mtd',
			'mtext',
			'mtr',
			'munder',
			'munderover',
			'semantics',
			'annotation',
			'annotation-xml'
		  ];
		  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
		  CKEDITOR.replace('item_rubric_urdu', {
			extraPlugins: 'ckeditor_wiris',
			// For now, MathType is incompatible with CKEditor file upload plugins.
			removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
			  height: 120,
			  contentsLangDirection: 'rtl',
			  enterMode : CKEDITOR.ENTER_BR,
			shiftEnterMode: CKEDITOR.ENTER_P,
			// Update the ACF configuration with MathML syntax.
			extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		  });
		
		}());
		
	} 
});
/*item_stem_ur*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
	CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
	CKEDITOR.replace('item_stem_ur', {
	extraPlugins: 'ckeditor_wiris',
	// For now, MathType is incompatible with CKEditor file upload plugins.
	removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
	height: 320,
	contentsLangDirection: 'rtl',
	enterMode : CKEDITOR.ENTER_BR,
	shiftEnterMode: CKEDITOR.ENTER_P,
	// Update the ACF configuration with MathML syntax.
	extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
	});
}());
/*item_stem_en*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_stem_en', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
height: 320,	
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
/////////
window.MathJax = {
	tex: {
	inlineMath: [['$', '$'], ['\\(', '\\)']]
	},
	svg: {
	fontCache: 'global'
	}
};
(function () {
	var script = document.createElement('script');
	script.src = 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js';
	script.async = true;
	document.head.appendChild(script);
})();

$('#item_grade_id').on('change', function() {
      $.post('<?=base_url("admin/pilot_items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#item_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
	});
	
$('#item_subject_id').on('change', function() {
      $.post('<?=base_url("admin/pilot_items/cstands_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_cstand_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_cstand_id')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en+value.cs_statement_ur)
                  ); 
        });   
    });
	/////////////////// auto generate code script //////////////////////
	$.post('<?=base_url("admin/pilot_items/get_itemcode_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr[0]['maxitems']);
	 var maxnum = "000" + arr[0]['maxitems'];
     maxnum = maxnum.substr(maxnum.length-4);
		
		
	 switch(arr[0]['grade'])
		{
			case "1":
				$('#item_code').val(arr[0]['subject_code']+'-I-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "2":
				$('#item_code').val(arr[0]['subject_code']+'-II-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "3":
				$('#item_code').val(arr[0]['subject_code']+'-III-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "4":
				$('#item_code').val(arr[0]['subject_code']+'-IV-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "5":
				$('#item_code').val(arr[0]['subject_code']+'-V-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "6":
				$('#item_code').val(arr[0]['subject_code']+'-VI-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "7":
				$('#item_code').val(arr[0]['subject_code']+'-VII-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "8":
				$('#item_code').val(arr[0]['subject_code']+'-VIII-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			
		}
     
    });
	});
	
$('#item_cstand_id').on('change', function() {
      $.post('<?=base_url("admin/pilot_items/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_subcstand_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_subcstand_id')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en+value.subcs_topic_ur)
                  ); 
        });   
    });});
	
$('#item_subcstand_id').on('change', function() {
      $.post('<?=base_url("admin/pilot_items/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_slo_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_slo_id')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });});
	
$(document).on('change','#item_option_layout', function() {
$("#layout_preview").attr("src","<?= base_url(); ?>assets/img/layouts/"+this.value+".jpg");	
		//alert(this.value);
			switch(this.value)
			{
				case "1":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "2":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "3":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "4":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "5":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "6":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "7":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "8":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "9":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "10":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "11":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "12":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
			}});
/*
$(function () {
	$("#MCQ").hide();
	$("#ERQ").hide();
	$("#FIB").hide();
	$("#TF").hide();
	$("#MC").hide();	
	$("#< ?php echo $item['item_type']; ?>").show();
	$('#item_type').on('change', function() {
		$("#MCQ").hide();
		$("#ERQ").hide();
		$("#FIB").hide();
		$("#TF").hide();
		$("#MC").hide();
		$("#"+this.value).show();
	});
});*/
<?php if($item['item_type']=="MCQ"){?>
$( '#MCQ_block' ).show();
$( '#MCQ_block' ).empty();
$( '#MCQ_block' ).append(MCQ_content);
$( '#ERQ_block' ).hide();
$( '#FIB_block' ).hide();
$( '#TF_block' ).hide();
$( '#MC_block' ).hide();
/*item_option_a_en*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_option_a_en', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
height: 120,
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
/*item_option_b_en*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_option_b_en', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
height: 120,
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
/*item_option_c_en*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_option_c_en', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
height: 120,
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());

(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_option_d_en', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
height: 120,
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
/*item_option_a_ur*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_option_a_ur', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
height: 120,
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
contentsLangDirection: 'rtl',
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
/*item_option_b_ur*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_option_b_ur', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
height: 120,
contentsLangDirection: 'rtl',
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
/*item_option_c_ur*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_option_c_ur', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
height: 120,
contentsLangDirection: 'rtl',
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
/*item_option_d_ur*/
(function() {
var mathElements = [
'math',
'maction',
'maligngroup',
'malignmark',
'menclose',
'merror',
'mfenced',
'mfrac',
'mglyph',
'mi',
'mlabeledtr',
'mlongdiv',
'mmultiscripts',
'mn',
'mo',
'mover',
'mpadded',
'mphantom',
'mroot',
'mrow',
'ms',
'mscarries',
'mscarry',
'msgroup',
'msline',
'mspace',
'msqrt',
'msrow',
'mstack',
'mstyle',
'msub',
'msup',
'msubsup',
'mtable',
'mtd',
'mtext',
'mtr',
'munder',
'munderover',
'semantics',
'annotation',
'annotation-xml'
];
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
CKEDITOR.replace('item_option_d_ur', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
height: 120,
contentsLangDirection: 'rtl',
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
<?php }elseif($item['item_type']=="ERQ"){?>
$( '#MCQ_block' ).hide();
$( '#ERQ_block' ).show();
$( '#ERQ_block' ).empty();
$( '#ERQ_block' ).append(ERQ_content);
$( '#FIB_block' ).hide();
$( '#TF_block' ).hide();
$( '#MC_block' ).hide();
/*item_rubric_english*/
(function() {
var mathElements = [
	'math',
	'maction',
	'maligngroup',
	'malignmark',
	'menclose',
	'merror',
	'mfenced',
	'mfrac',
	'mglyph',
	'mi',
	'mlabeledtr',
	'mlongdiv',
	'mmultiscripts',
	'mn',
	'mo',
	'mover',
	'mpadded',
	'mphantom',
	'mroot',
	'mrow',
	'ms',
	'mscarries',
	'mscarry',
	'msgroup',
	'msline',
	'mspace',
	'msqrt',
	'msrow',
	'mstack',
	'mstyle',
	'msub',
	'msup',
	'msubsup',
	'mtable',
	'mtd',
	'mtext',
	'mtr',
	'munder',
	'munderover',
	'semantics',
	'annotation',
	'annotation-xml'
  ];
  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
  CKEDITOR.replace('item_rubric_english', {
	extraPlugins: 'ckeditor_wiris',
	// For now, MathType is incompatible with CKEditor file upload plugins.
	removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
	height: 120,
	  enterMode : CKEDITOR.ENTER_BR,
	shiftEnterMode: CKEDITOR.ENTER_P,
	// Update the ACF configuration with MathML syntax.
	extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
  });
}());
/*item_rubric_urdu*/
(function() {
  var mathElements = [
	'math',
	'maction',
	'maligngroup',
	'malignmark',
	'menclose',
	'merror',
	'mfenced',
	'mfrac',
	'mglyph',
	'mi',
	'mlabeledtr',
	'mlongdiv',
	'mmultiscripts',
	'mn',
	'mo',
	'mover',
	'mpadded',
	'mphantom',
	'mroot',
	'mrow',
	'ms',
	'mscarries',
	'mscarry',
	'msgroup',
	'msline',
	'mspace',
	'msqrt',
	'msrow',
	'mstack',
	'mstyle',
	'msub',
	'msup',
	'msubsup',
	'mtable',
	'mtd',
	'mtext',
	'mtr',
	'munder',
	'munderover',
	'semantics',
	'annotation',
	'annotation-xml'
  ];


  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('item_rubric_urdu', {
	extraPlugins: 'ckeditor_wiris',
	// For now, MathType is incompatible with CKEditor file upload plugins.
	removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
	  height: 120,
	  contentsLangDirection: 'rtl',
	  enterMode : CKEDITOR.ENTER_BR,
	shiftEnterMode: CKEDITOR.ENTER_P,
	// Update the ACF configuration with MathML syntax.
	extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
  });

}());
<?php }elseif($item['item_type']=="FIB"){?>
$( '#MCQ_block' ).hide();
$( '#ERQ_block' ).hide();
$( '#FIB_block' ).show();
$( '#FIB_block' ).empty();
$( '#FIB_block' ).append(FIB_content);
$( '#TF_block' ).hide();
$( '#MC_block' ).hide();
/*item_fib_key_eng*/
(function() {
  var mathElements = [
	'math',
	'maction',
	'maligngroup',
	'malignmark',
	'menclose',
	'merror',
	'mfenced',
	'mfrac',
	'mglyph',
	'mi',
	'mlabeledtr',
	'mlongdiv',
	'mmultiscripts',
	'mn',
	'mo',
	'mover',
	'mpadded',
	'mphantom',
	'mroot',
	'mrow',
	'ms',
	'mscarries',
	'mscarry',
	'msgroup',
	'msline',
	'mspace',
	'msqrt',
	'msrow',
	'mstack',
	'mstyle',
	'msub',
	'msup',
	'msubsup',
	'mtable',
	'mtd',
	'mtext',
	'mtr',
	'munder',
	'munderover',
	'semantics',
	'annotation',
	'annotation-xml'
  ];


  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('item_fib_key_eng', {
	extraPlugins: 'ckeditor_wiris',
	// For now, MathType is incompatible with CKEditor file upload plugins.
	removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
	  height: 120,
	  enterMode : CKEDITOR.ENTER_BR,
	shiftEnterMode: CKEDITOR.ENTER_P,
	// Update the ACF configuration with MathML syntax.
	extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
  });
}());
/*item_fib_key_ur*/
(function() {
  var mathElements = [
	'math',
	'maction',
	'maligngroup',
	'malignmark',
	'menclose',
	'merror',
	'mfenced',
	'mfrac',
	'mglyph',
	'mi',
	'mlabeledtr',
	'mlongdiv',
	'mmultiscripts',
	'mn',
	'mo',
	'mover',
	'mpadded',
	'mphantom',
	'mroot',
	'mrow',
	'ms',
	'mscarries',
	'mscarry',
	'msgroup',
	'msline',
	'mspace',
	'msqrt',
	'msrow',
	'mstack',
	'mstyle',
	'msub',
	'msup',
	'msubsup',
	'mtable',
	'mtd',
	'mtext',
	'mtr',
	'munder',
	'munderover',
	'semantics',
	'annotation',
	'annotation-xml'
  ];


  CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

  CKEDITOR.replace('item_fib_key_ur', {
	extraPlugins: 'ckeditor_wiris',
	// For now, MathType is incompatible with CKEditor file upload plugins.
	removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
	  height: 120,
	  contentsLangDirection: 'rtl',
	  enterMode : CKEDITOR.ENTER_BR,
	shiftEnterMode: CKEDITOR.ENTER_P,
	// Update the ACF configuration with MathML syntax.
	extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
  });
}());
<?php }elseif($item['item_type']=="TF"){?>
$( '#MCQ_block' ).hide();
$( '#ERQ_block' ).hide();
$( '#FIB_block' ).hide();
$( '#TF_block' ).show();
$( '#TF_block' ).empty();
$( '#TF_block' ).append(TF_content);
$( '#MC_block' ).hide();
<?php }elseif($item['item_type']=="MC"){?>
$( '#MCQ_block' ).hide();
$( '#ERQ_block' ).hide();
$( '#FIB_block' ).hide();
$( '#TF_block' ).hide();
$( '#MC_block' ).show();
$( '#MC_block' ).empty();
$( '#MC_block' ).append(MC_content);
<?php }?>
</script> 
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script> 