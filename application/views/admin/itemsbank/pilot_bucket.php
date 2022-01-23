  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate Pilotbank </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/pilotbank'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Pilotbank List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/pilotbank/add'), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return onSubmitFunc();" ');  ?>  
			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
			<div class="row form-group">
              	
				<div class="col-lg-3 col-sm-12">                         
                    <label for="pb_created" class="col-sm-12 control-label">Date *</label>
                    <input type="date" name="pb_created" class="form-control" id="pb_created" placeholder="" required="required" value="<?php echo date("d/m/Y"); ?>" >
                </div>
				<div class="col-lg-3 col-sm-12">                         
                    <label for="year_id" class="col-sm-12 control-label">Year *</label>
                    <select name="year_id" class="form-control form-group" id="year_id"  required>
						<option value="">--Select Year--</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                  	</select>  
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="pb_grade_id" class="control-label">Grade *</label>
					<select name="pb_grade_id" class="form-control form-group" id="pb_grade_id"  required>
						<option value="">--Select Grades--</option>
						  <?php
                           foreach($grades as $grade)
                          {
                              echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
                          }
                          ?>
                  	</select>                    
                </div>
                <script language="javascript" type="text/javascript"> var addedsubjects = [];  
				<?php
					if(isset($added_subjects[0]))  {
						$i=0;
						foreach($added_subjects[0] as $keysub=>$valsub)
						{
							echo " addedsubjects[".$i++."] = '".$valsub."'; ";
						}
					}  ?>
				</script>
				<div class="col-lg-3 col-sm-12">                         
                   <label for="pb_subject_id" class="control-label">Subject *</label>
                    <select name="pb_subject_id" class="form-control form-group" id="pb_subject_id"  required>
                      <option value="">--Select Subjects--</option>
                    </select>
                </div>
             </div>
			<div class="row">
              	
				
              </div>
            
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
            <div class="row">
             <div class="col-md-7">
                 <div class="row">
                     <div class="col-md-4 col-sm-12"><strong>Pilot Bucket 1</strong></div>
                     <div class="col-md-4 col-sm-12"><strong>Pilot Bucket 2</strong></div>
                     <div class="col-md-4 col-sm-12"><strong>Pilot Bucket 3</strong></div>
                 </div>
             </div>
             <div class="col-md-5">
                    <div class="row">
                            <div class="col-md-6 col-sm-12"><strong>Pilot Bucket 4</strong></div>
                            <div class="col-md-6 col-sm-12"><strong>Pilot Bucket 5</strong></div>
                        </div>
             </div>
         </div>
     <?php
	 for($i=1; $i<=50; $i++){
    //echo $i.' value of I<br>';
   // for($d=1; $d<=5; $d++){
        //echo $d.' value of D<br>';
       // echo '<label>'.$d.'-'.$i.'<select name="'.$d.'-'.$i.'"><option value="'.$d.'">Option</option></select></label>';
	   $requird = ' required="required"';
	   if($i > 47){
		  $requird = '';
	   }
	   ?>
       <div class="row">
             <div class="col-md-7">
                 <div class="row">
                     <div class="col-md-4 col-sm-12">
                     	<label for="item_id" class="control-label">Question 1.<?=$i?> *</label>
                        <select name="v1_item_id_<?=$i?>" class="form-control form-group item" id="v1_item_id_<?=$i?>"   <?php print $requird;?>>
                          <option value="">--Select Item/Question--</option>
                        </select>
                     </div>
                     <div class="col-md-4 col-sm-12">
                     	<label for="pb_subject_id" class="control-label">Question 2.<?=$i?> *</label>
                        <select name="v2_item_id_<?=$i?>" class="form-control form-group item" id="v2_item_id_<?=$i?>"   <?php print $requird;?>>
                          <option value="">--Select Item/Question--</option>
                        </select>
                     </div>
                     <div class="col-md-4 col-sm-12">
                     	<label for="v3_item_id_<?=$i?>" class="control-label">Question 3.<?=$i?> *</label>
                        <select name="v3_item_id_<?=$i?>" class="form-control form-group item" id="v3_item_id_<?=$i?>"   <?php print $requird;?>>
                          <option value="">--Select Item/Question--</option>
                        </select>
                     </div>
                 </div>
             </div>
             <div class="col-md-5">
                    <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="v4_item_id_<?=$i?>" class="control-label">Question 4.<?=$i?> *</label>
                                <select name="v4_item_id_<?=$i?>" class="form-control form-group item" id="v4_item_id_<?=$i?>"   <?php print $requird;?>>
                                  <option value="">--Select Item/Question--</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                            	<label for="v5_item_id_<?=$i?>" class="control-label">Question 5.<?=$i?> *</label>
                                <select name="v5_item_id_<?=$i?>" class="form-control form-group item" id="v5_item_id_<?=$i?>"   <?php print $requird;?>>
                                  <option value="">--Select Item/Question--</option>
                                </select>
                            </div>
                        </div>
             </div>
         </div>
       <?php
    //}
   // echo '<br />';
}
	 ?>
			
			

          
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Save" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">
$('#pb_grade_id').on('change', function() {
    $('.item').prop('selectedIndex',0);
      $.post('<?=base_url("admin/pilotbank/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#pb_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#pb_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
	
});

$('#pb_subject_id').on('change', function() {	
	
	if(jQuery.inArray(this.value, addedsubjects) !== -1)
	{
		alert('This Subject (ID: '+this.value+') ItemBank already Generated! First Delete and then Add this! or Try other subject!');	
		$('#pb_subject_id').val("");
		return false;
	}
	
      $.post('<?=base_url("admin/pilotbank/all_items_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('.item').prop('selectedIndex',0);
	  $.each(arr, function(key, value) {           
      $('.item')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_id+' SLO-'+value.slo_number+ ' '+value.item_code+'-('+value.item_id+')')
                  ); 
       });
   });
});

function getCurrentValue(currentSelectbox, selctedvalue){
		/*alert(selctedvalue);
		alert(currentSelectbox);*/
		
		for ( let ii = 1; ii <= 5; ii++ ) {
			for ( let jj = 1; jj <= 50; jj++ ) {
				if(selctedvalue != ''){
					if(currentSelectbox !== "v"+ii+"_item_id_"+jj){
						if(selctedvalue == $("#v"+ii+"_item_id_"+jj).val() ){
							//alert($("#ibm_b"+ii+"_item"+jj).val());
							alert('Item already selected');
							$("#"+currentSelectbox).val('');
						}
					}
				}
			}
		}
	}

</script>
<script language="javascript" type="text/javascript">
			document.getElementById('pb_created').valueAsDate = new Date();			
		</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>