<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('school/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Papers</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
<!--            <a href="< ?= base_url() ?>school/paper/create_items_pdf" class="btn btn-secondary">Export as PDF</a> -->
<!--            <a href="< ?= base_url() ?>school/paper/export_items_csv" class="btn btn-secondary">Export as CSV</a> -->
          </div>
          <a href="<?= base_url('school/paper/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Generate New Paper</a>
        </div>
      </div>		
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Paper Title</th>
              <th>Code</th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Date</th>
			  <th>Status</th>
              <th>Action</th>
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
    "ajax": "<?=base_url('school/paper/datatable_json')?>",
    "order": [[0,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "paper_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "paper_title_en", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "paper_number", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "grade_code", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "subject_name_en", 'searchable':true, 'orderable':true},
	{ "targets": 5, "name": "paper_date", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "paper_status", 'searchable':true, 'orderable':true},
    { "targets": 7, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>

<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("school/paper/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      item_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("ItemsBank Status Changed Successfully", "success");
    });
  });
</script>