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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Schools List</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/school/create_school_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>admin/school/export_school_csv" class="btn btn-secondary">Export as CSV</a>
          </div>
          <a href="<?= base_url('admin/school/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New School</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>UserName</th>
              <th>School Deptt.</th>
              <th>Type</th>
              <th>Name</th>
              <th>Address</th>
              <th>District</th>
              <th>Tehsil</th>
              <th>Level</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Status</th>
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
    "ajax": "<?=base_url('admin/school/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "school_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "username", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "school_department", 'searchable':true, 'orderable':true},
	{ "targets": 3, "name": "school_type", 'searchable':true, 'orderable':true},
	{ "targets": 4, "name": "school_name", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "school_address", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "school_district_id", 'searchable':true, 'orderable':true},
	{ "targets": 7, "name": "school_tehsil_id", 'searchable':true, 'orderable':true},
	{ "targets": 8, "name": "school_level", 'searchable':true, 'orderable':true},
	{ "targets": 9, "name": "school_gender", 'searchable':true, 'orderable':true},
	{ "targets": 10, "name": "school_email", 'searchable':true, 'orderable':true},
	{ "targets": 11, "name": "school_phone", 'searchable':true, 'orderable':true},
	{ "targets": 12, "name": "school_status", 'searchable':true, 'orderable':true},
    { "targets": 13, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/school/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      school_id : $(this).data('id'),
      school_status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("School Status Changed Successfully", "success");
    });
  });

</script>


