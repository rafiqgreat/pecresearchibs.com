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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Pilotbank</h3>
        </div>
        <div class="d-inline-block float-right">
         <?php /*?> <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/pilotbank/create_items_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>admin/pilotbank/export_items_csv" class="btn btn-secondary">Export as CSV</a>
          </div><?php */?>
          <?php
		  $subjects_ids=explode(',',$_SESSION['subjects_ids']);
		  ?>
          <a href="<?= base_url() ?>admin/pilotbank/left_erqs_view/<?php echo $subjects_ids[0];?>" class="btn btn-secondary">Class-IV ERQs</a>
          <a href="<?= base_url() ?>admin/pilotbank/left_erqs_view/<?php echo $subjects_ids[1];?>" class="btn btn-secondary">Class-V ERQs</a>
          <?php
		  if($this->session->userdata('role_id')==2)
		  {
			?>
         	<a href="<?= base_url('admin/pilotbank/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Generate Pilotbank</a>
          <?php
		  }
		  ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
		  <thead>
            <tr>
              <th>#ID</th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Year</th>
              <th>Created By</th>
              <th>Created Date</th>
              <th style="width:180px">Action</th>
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
<script type="text/javascript" language="javascript">
  //---------------------------------------------------
	
	var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/pilotbank/datatable_json_pilot')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
		{ "targets": 0, "name": "pb_id", 'searchable':true, 'orderable':true},
		{ "targets": 1, "name": "grade_name_en", 'searchable':true, 'orderable':true},
		{ "targets": 2, "name": "subject_name_en", 'searchable':true, 'orderable':true},
		{ "targets": 3, "name": "pb_year_id", 'searchable':true, 'orderable':true},
		{ "targets": 4, "name": "pb_createdby", 'searchable':true, 'orderable':true},
		{ "targets": 5, "name": "pb_created", 'searchable':true, 'orderable':true},
		{ "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'290px'}
		]
	  });
	 $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/pilotbank/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      ib_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("pilotbank Status Changed Successfully", "success");
    });
  });
</script>




