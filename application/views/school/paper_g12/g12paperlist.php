  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Download Papers for Grade-I and Grade-II</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">School Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php 
//echo '<pre>';
//print_r($all_subjects);
//die();
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">  	
		<div class="row">
          <div class="col-12">
          <div class="info-box" style="min-height: 20px;">  
              <div class="info-box-content" style="font-size:16px; ">				  
              Welcome <?= $this->session->userdata('school_name'); ?>, <?= $this->session->userdata('school_address'); ?> ( EMIS Code/Login : <?= $this->session->userdata('username'); ?> )
              </div>
              <!-- /.info-box-content -->
            </div>           
          </div>        
        </div>  
        <div class="row">
          <div class="col-12">
          <div class="info-box" style="min-height: 20px;">  
              <div class="info-box-content" style="font-size:20px; font-weight:bold; vertical-align:central; ">				  
              Grade-I 
              </div>
              <!-- /.info-box-content -->
            </div>           
          </div>        
        </div>
        <div class="row">
          
           <?php
	 foreach($all_subjects as $file)
	 {
		 if($file['dn_grade_id'] == 3)
		 {
	 ?>
         <div class="col-sm-6 col-md-3">
            <div class="info-box">
             <span class="info-box-icon bg-info elevation-1"><a href="<?= base_url($file['dn_pdflink']); ?>"><i class="fa fa-download" aria-hidden="true"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">Download <?php echo $file['dn_title']?></span>
                 <a target="_blank" href="<?= base_url($file['dn_pdflink']); ?>">&laquo; Click to Download</a>
                </span>
              </div>
            </div>
          </div>
       
         <?php
		 }
	 }
	 ?>
          
          
        </div>
        
        <div class="row">
          <div class="col-12">
          <div class="info-box" style="min-height: 20px;">  
              <div class="info-box-content" style="font-size:20px; font-weight:bold; vertical-align:central;">				  
              Grade-II
              </div>
              <!-- /.info-box-content -->
            </div>           
          </div>        
        </div>
        <div class="row">
		 <?php
         foreach($all_subjects as $file)
         {
              if($file['dn_grade_id'] == 4)
             {
         ?>
              <div class="col-sm-6 col-md-3">
                <div class="info-box">
                 <span class="info-box-icon bg-info elevation-1"><a href="<?= base_url('school/g12papers/download_paper/'.$file['dn_id']); ?>"><i class="fa fa-download" aria-hidden="true"></i></a></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Download <?php echo $file['dn_title']?></span>
                    <a target="_blank" href="<?= base_url('school/g12papers/download_paper/'.$file['dn_id']); ?>">&laquo; Click to Download</a>
                  </div>
                </div>
              </div>
           
             <?php
             }
         }
         ?>
        </div>
        
        <div class="row">
          <div class="col-12">
          <div class="info-box" style="min-height: 20px;">  
              <div class="info-box-content" style="font-size:20px; font-weight:bold; vertical-align:central">				  
              Grade III to VIII (Islamiat - Nazra Paper)
              </div>
              <!-- /.info-box-content -->
            </div>           
          </div>        
        </div>
                
        <div class="row">
		 <?php
         foreach($sub_isl as $file)
         {
         ?>
              <div class="col-sm-6 col-md-3">
                <div class="info-box">
                 <span class="info-box-icon bg-info elevation-1"><a href="<?= base_url('school/g12papers/download_paper/'.$file['dn_id']); ?>"><i class="fa fa-download" aria-hidden="true"></i></a></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Nazra <?php echo $file['dn_title']?></span>
                    <a target="_blank" href="<?= base_url('school/g12papers/download_paper/'.$file['dn_id']); ?>">&laquo; Click to Download</a>
                  </div>
                </div>
              </div>
             <?php
             }
         ?>
        </div>

 <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= base_url() ?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
