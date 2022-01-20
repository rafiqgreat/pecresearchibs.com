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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Reviewed / Accepted Items List by Item Reviewer </h3>
        </div>
        <div class="d-inline-block float-right">
          <?php /*?><div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/items/create_items_pdf" class="btn btn-secondary">Export as PDF</a>
          </div>
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/items/export_items_csv" class="btn btn-secondary">Export as CSV</a>
          </div><?php */?>
           <?php /*?><a href="<?= base_url('admin/items/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New MCQ Item</a>
           <a href="<?= base_url('admin/items/add_erq_crq'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New ERQ/CRQ Item</a><?php */?>
        </div>
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
              <th>Status</th>
              <th class="text-right">Action</th>
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
	<?php /*base_url('admin/items/datatable_jsonp_rev'.((isset($item_subject_id)&&$item_subject_id!="")?'/'.$item_subject_id:''));*/?>
    "ajax": "<?=base_url('admin/items/datatable_jsona_rev_ss');?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    	{ "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    	{ "targets": 1, "name": "item_batch", 'searchable':true, 'orderable':true},
    	{ "targets": 2, "name": "item_type", 'searchable':true, 'orderable':true},
    	{ "targets": 3, "name": "item_code", 'searchable':true, 'orderable':true},
    	{ "targets": 4, "name": "item_stem_en", 'searchable':true, 'orderable':true},
    	{ "targets": 5, "name": "grade_code", 'searchable':true, 'orderable':true},
		{ "targets": 6, "name": "subject_code", 'searchable':true, 'orderable':true},
    	{ "targets": 7, "name": "slo_number", 'searchable':true, 'orderable':true},
		{ "targets": 8, "name": "item_status", 'searchable':true, 'orderable':true},
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
	
	$('#item_grade_id').on('change', function() {
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
		  
		  
	  if(this.value!= ""){ 
		  $("#item_subject_id").prop('required',true);
	  }
	 else {
		$("#item_subject_id").prop('required',false);	  
	  }
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

function checkFields()
{
	if($('#item_grade_id')=="" && $('#item_subject_id')=="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')!="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')=="" ) { alert('Please select Subject!'); return false; }
}
</script>


