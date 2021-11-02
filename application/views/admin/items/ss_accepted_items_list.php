<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Accepted Items List (Submitted by Item Writers )</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/items/create_ss_aitems_pdf" class="btn btn-secondary" style="margin:05px">Export as PDF</a>
            <?php /*?><a href="<?= base_url() ?>admin/items/export_ss_aitems_csv" class="btn btn-secondary" style="margin:05px">Export as CSV</a><?php */?>
          </div>         
        </div>
      </div>
    </div>
    <?php /*?><div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <div class="btn-group margin-bottom-10"> 
            <?php echo form_open(base_url('admin/items/ss_pitems_search'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
            <div class="row">
            	<div class="col-3" style="text-align:right">Search : </div>
                <div class="col-7">
                	<select name="item_submittedby" class="form-control form-group" id="item_submittedby"  style="width:200px">						
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
                <div class="col-2"><input type="submit" id="submit_search" name="submit_search" class="btn btn-success" value="Search" /></div>
            </div>
            <?php echo form_close( ); ?>
          </div>         
        </div>
      </div>
    </div><?php */?>
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
                                //if(isset($item_submittedby) && $item_submittedby == $itemwriter['admin_id']) { $sel = 'selected="selected"'; }
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
                              //if(isset($item_submittedby) && $item_submittedby == $itemwriter['admin_id']) { $sel = 'selected="selected"'; }
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
                          <option value="MCQ">MCQ</option>
                          <option value="ERQ">ERQ</option>  
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
              <th>Items </th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Updated at</th>
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
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/items/datatable_jsons_ss_accepted'.((isset($item_subject_id)&&$item_subject_id!="")?'/'.$item_subject_id:''));?>",
    "order": [[6,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "item_batch", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "firstname", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "item_type", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "item_code", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "item_stem_en", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "grade_code", 'searchable':true, 'orderable':true},
    { "targets": 7, "name": "subject_code", 'searchable':true, 'orderable':true},
    { "targets": 8, "name": "item_updated", 'searchable':true, 'orderable':true},
    { "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
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
	
$('#search_grade').on('change', function() {
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
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
      $('#item_submittedby option:not(:first)').remove();
      $.each(arr, function(key, value) {           
      $('#item_submittedby')
         .append($("<option></option>")
                    .attr("value", value.admin_id)
					.text(value.firstname+'-'+value.lastname+' ('+value.username+')')
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


