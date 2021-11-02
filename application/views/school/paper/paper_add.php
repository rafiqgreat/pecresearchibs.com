  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate Paper </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('school/paper'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Papers List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>           
			   <?php echo form_open(base_url('school/paper/add'), 'class="form-horizontal" method="post"');  ?>
			
				<div class="row">
              	<div class="col-lg-3 col-sm-12">  					
					<label for="paper_grade_id" class="control-label">Select Paper Grade *</label>
					<select name="paper_grade_id" class="form-control form-group" id="paper_grade_id"  required>
						<option value="">--Select Paper Grade--</option>
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
				<div class="col-lg-4 col-sm-12">                         
                   <label for="paper_subject_id" class="control-label">Select Paper Subject *</label>
                <select name="paper_subject_id" class="form-control form-group" id="paper_subject_id"  required>
                  <option value="">--Select Paper Subject--</option>
                </select>
                </div>
				<div class="col-lg-5 col-sm-12" id="message_bar">  
					 <br />
                   <div class="alert alert-info">
					  <strong>Hint!</strong> Please select grade to generate paper for available subjects.
					</div>               
                </div>
              </div>
			<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
			<div class="row form-group">
              	<div class="col-lg-4 col-sm-12">                         
                   <label for="paper_title_en" class="col-sm-12 control-label">Paper  Title for School Reference * </label>
                   <input type="text" name="paper_title_en" class="form-control" id="paper_title_en" placeholder="" required="required" value=""  >
                </div>				
				<div class="col-lg-4 col-sm-12">                         
                    <label for="paper_date" class="col-sm-12 control-label">Creation Date *</label>
                    <input type="datetime" name="paper_date" class="form-control" id="paper_date" placeholder="" required="required" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly >
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="paper_number" class="col-sm-12 control-label">Paper Number</label>
                    <input type="text" name="paper_number" class="form-control" id="paper_number" placeholder="" required="required"  value="01" readonly >
                </div>
             </div>
		
        
			
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------Start Block-1------------------------------------------------------------>             
            

        <div class="content" id="paper_selection_block" style="visibility: hidden; display: none;">
           
			<input class="btn btn-info" type="submit" id="submit" name="submit" value="Start Paper Generation &raquo; " >

          
            
			   
			   </div>

			<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-1------------------------------------------------------------> 
		 <?php echo form_close( ); ?>
		  </div>
		</div>	  
   		  
<script language="javascript" type="text/javascript">  
	$('#paper_grade_id').on('change', function() {
      $.post('<?=base_url("school/paper/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr.length);     
	  if(arr.length==0){
		  $('#message_bar').html('<br /><div class="alert alert-danger"><strong>Sorry!</strong> No Paper Generation is available for this Subject.</div>');
		  $('#paper_selection_block').css('visibility','hidden');
		$('#paper_selection_block').css('display','none');
	  }
	  else{
			   $('#message_bar').html('<br /><div class="alert alert-success"><strong>Success!</strong> Now Select Subject for Paper Generation.</div>');
		  $('#paper_selection_block').css('visibility','hidden');
		$('#paper_selection_block').css('display','none');
		  }
      $('#paper_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#paper_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en+' - '+value.subject_name_ur)
                  ); 
        });   
    });	
	
});
	$('#paper_subject_id').on('change', function() {
   /////////////////// auto generate code script //////////////////////
		var selected_subject_id = this.value;
	if(selected_subject_id!=""){
		$.post('<?=base_url("school/paper/get_itemcode_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr[0]['maxitems']);
	 var maxnum = "0" + arr[0]['maxitems'];
     maxnum = maxnum.substr(maxnum.length-2);
	
	var schoolid = <?php echo $this->session->userdata('school_id') ?>;
	 var fullschoolid = "0000" + schoolid;
     fullschoolid = fullschoolid.substr(fullschoolid.length-5);
	
	 switch(arr[0]['grade'])
		{
			case "1":
				$('#paper_number').val(arr[0]['subject_code']+'-I-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "2":
				$('#paper_number').val(arr[0]['subject_code']+'-II-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "3":
				$('#paper_number').val(arr[0]['subject_code']+'-III-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "4":
				$('#paper_number').val(arr[0]['subject_code']+'-IV-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "5":
				$('#paper_number').val(arr[0]['subject_code']+'-V-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "6":
				$('#paper_number').val(arr[0]['subject_code']+'-VI-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "7":
				$('#paper_number').val(arr[0]['subject_code']+'-VII-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "8":
				$('#paper_number').val(arr[0]['subject_code']+'-VIII-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			
		}
     
    });		
	
	///////////////////// get all items from itembank selected added or not ///////////////////
	$.post('<?=base_url("school/paper/get_itemsbank_for_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);	
     	if(arr.length>0){
		$('#paper_selection_block').css('visibility','visible');
		$('#paper_selection_block').css('display','block');			
		}
    });
		
	
	}	
	else{
		$('#paper_selection_block').css('visibility','hidden');
		$('#paper_selection_block').css('display','none');
	}
});
	
	var convert = function(convert){
    return $("<span />", { html: convert }).text();
    //return document.createElement("span").innerText;
};

</script>
<script language="javascript" type="text/javascript">
	
function funSubmitPaper(){
		
		alert($("input[name='paper_item_b25']:checked").val());		
		if($("#paper_title_en").val()==''){ alert('Please select any title of paper!'); return false; }
		alert('Your Paper has been successfully generated! Note: This is Test Drive / Pilot Testing, ....');
		//window.location = "https://www.pecsba.educationservices.pk/school/paper";
		
	}
  
</script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

	  </section>

</div>