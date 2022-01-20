<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php 
	$this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Accepted Items List (Submitted by Item Writers )</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20">
			  <?php
				$param1 = (isset($search_grade)&&$search_grade!="")?$search_grade:0;
				$param2 = (isset($search_subject)&&$search_subject!="")?$search_subject:0;
				$param3 = (isset($item_submittedby)&&$item_submittedby!="")?$item_submittedby:0;
				$param4 = (isset($item_type)&&$item_type!="")?$item_type:"";
				//die($param1.'_'.$param2.'_'.$param3);
				?>
			  <a href="<?= base_url() ?>admin/items/create_flimzy_pdf/<?php print $param1.'_'.$param2.'_'.$param3.'_'.$param4;?>" class="btn btn-secondary" style="margin:05px">Export Flimzy as PDF</a>
            <a href="<?= base_url() ?>admin/items/create_ss_pitems_pdf" class="btn btn-secondary" style="margin:05px">Export as PDF</a>
            <?php /*?><a href="<?= base_url() ?>admin/items/export_ss_pitems_csv" class="btn btn-secondary" style="margin:05px">Export as CSV</a><?php */?>
          </div>         
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
            <?php echo form_open(base_url('admin/items/ss_aitems_search'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
              <div class="row" style="width:100%">
              <div class ="col-1">Search :</div>
              <div class ="col-10">
              	<div class ="row">
                	<div class ="col-3">
                    	<select name="search_grade" class="form-control form-group" id="search_grade"  style="width:100%">						
                          <option value="">---All Grades---</option>
                            <?php							
                              foreach($grades as $grade)
                              {
                                $sel = "";								
                                if(isset($search_grade) && $search_grade == $grade['grade_id']) { $sel = 'selected="selected"'; }
                                echo '<option value="'.$grade['grade_id'].'"  '.$sel.' >'.$grade['grade_name_en'].' ('.$grade['grade_name_ur'].')</option>';
                              }
                            ?>
                         </select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_subject" class="form-control form-group" id="search_subject"  style="width:100%">						
                          <option value="">---All Subjects---</option>
                          <?php							
                            foreach($subjects as $subject)
                            {
                              $sel = "";								
                              if(isset($search_subject) && $search_subject == $subject['subject_id']) { $sel = 'selected="selected"'; }
                              echo '<option value="'.$subject['subject_id'].'"  '.$sel.' >'.$subject['subject_name_en'].' (Grade-'.$subject['grade_code'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class ="col-3">
                    	<select name="item_submittedby" class="form-control form-group" id="item_submittedby"  style="width:100%">						
                          <option value="">-All Itemwriters-</option>
                            <?php							
                            foreach($itemwriters as $itemwriter)
                            {
                              $sel = "";								
                              if(isset($item_submittedby) && $item_submittedby == $itemwriter['admin_id']) { $sel = 'selected="selected"'; }
                              echo '<option value="'.$itemwriter['admin_id'].'"  '.$sel.' >'.$itemwriter['firstname'].' '.$itemwriter['lastname'].' ('.$itemwriter['username'].')</option>';
                            }
                            ?>
                         </select>
                    </div>
                     <div class ="col-3">
                    	<select name="item_type" class="form-control form-group" id="item_type"  style="width:100%">						
                          <option value="">-Select Item Type-</option>
                          <option value="MCQ" <?php if($item_type=="MCQ"){?> selected="selected"<?php }?>>MCQ</option>
                          <option value="ERQ" <?php if($item_type=="ERQ"){?> selected="selected"<?php }?>>ERQ</option>  
                         </select>
                    </div>
                </div>
              </div>
              <div class ="col-1"> <input type="submit" id="submit_search" name="submit_search" class="btn btn-success" value="Search" /></div> 
              </div>
            <?php echo form_close( ); ?>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
			  <th>Batch</th>
              <th>Submitted By</th>
              <th>Type</th>
              <th>Items Code</th>
              <th style="width:40%">Items </th>
              <th>Grade</th>
              <th>Subject</th>
              <th width="100" class="text-right">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>  
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script>
 <?php
$param1 = (isset($search_grade)&&$search_grade!="")?$search_grade:0;
$param2 = (isset($search_subject)&&$search_subject!="")?$search_subject:0;
$param3 = (isset($item_submittedby)&&$item_submittedby!="")?$item_submittedby:0;
$param4 = (isset($item_type)&&$item_type!="")?$item_type:"";
//die($param1.'_'.$param2.'_'.$param3);
?>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/items/datatable_jsons_ss_accepted/'.$param1.'_'.$param2.'_'.$param3.'_'.$param4);?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "item_batch", 'searchable':false, 'orderable':true},
    { "targets": 2, "name": "firstname", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "item_type", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "item_code", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "item_stem_en", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "grade_code", 'searchable':true, 'orderable':true},
    { "targets": 7, "name": "subject_code", 'searchable':true, 'orderable':true},
    { "targets": 8, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
	"lengthMenu": [[50,75,100,150, -1], [50,75,100,150, "All"]]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/items/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      item_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Item Status Changed Successfully", "success");
    });
  });
	
	$('#item_grade_id').on('change', function() {
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
	/*	  
	  if(this.value!= ""){ 
		  $("#item_subject_id").prop('required',true);
	  }
	 else {
		$("#item_subject_id").prop('required',false);	  
	  }
	  */
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

$('#search_grade').on('change', function() {
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
	/*	  
	  if(this.value!= ""){ 
		  $("#search_subject").prop('required',true);
	  }
	 else {
		$("#search_subject").prop('required',false);	  
	  }
	  */
      $('#search_subject option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#search_subject')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en+'( Grade-'+value.grade_code+')')
                  ); 
        });   
    });	
});

$('#search_subject').on('change', function() {
      $.post('<?=base_url("admin/items/itemwriters_by_subjects")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
	/*	  
	if(this.value!= ""){ 
		  $("#item_submittedby").prop('required',true);
	  }
	 else {
		$("#item_submittedby").prop('required',false);	  
	  }
	  */
      $('#item_submittedby option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_submittedby')
         .append($("<option></option>")
                    .attr("value", value.admin_id)
					.text(value.firstname+'-'+value.lastname+' ('+value.username+')')
                    //.text(value.firstname)
                  ); 
        });   
    });	
});

function checkFields()
{
	if($('#item_grade_id')=="" && $('#item_subject_id')=="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')!="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')=="" ) { alert('Please select Subject!'); return false; }
}
</script>


