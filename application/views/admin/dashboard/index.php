  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $all_users; ?></h3>
                <p>All Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $admin_users; ?></h3>
                <p>Admin Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $ae_users; ?></h3>
                <p>Assessment Expert Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?= $iw_users; ?></h3>
                <p>Item Writer Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Grades</span>
                <span class="info-box-number">
                <?= $all_grades; ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Subjects</span>
                <span class="info-box-number"> <?= $all_subjects; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Content Stands</span>
                <span class="info-box-number"> <?= $all_cstands; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Sub Content Stands</span>
                <span class="info-box-number"> <?= $all_subcstands; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Schools/Generated</span>
                <span class="info-box-number">
                <?= $all_schools; ?> / <?= count($schoolspapers); ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Papers Generated</span>
                <span class="info-box-number"> <?= $all_papers; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Completed Papers</span>
                <span class="info-box-number"> <?= $papers_comp; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total In-Completed Papers</span>
                <span class="info-box-number"> <?= $papers_incomp; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
		  
		   <!-- Small boxes (Stat box) -->      
		  <!-- /.row -->
		  
 <!-- Small boxes (Stat box) -->
<?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==4): ?>		    				  
        <div class="row">
       <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;">BATCH-1  Total Items Submission Details Subjects Wise </span> 
				 
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject</th>
      <th scope="col">Draft Items by IW </th>
	  <th scope="col">Submitted by IW</th>	 
	  <th scope="col">Pending by SS</th>
	  <th scope="col">Rejected by SS</th>
	  <th scope="col">Accepted by SS</th>
	  <th scope="col">Pending by AE</th>
	  <th scope="col">Accepted by AE</th>
	   <th scope="col">Rejected by AE</th>
    </tr>
  </thead>
  <tbody>
	  <pre>
	  <?php
	 if(isset($summary_items)){
		 $Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		 $ix = 0;
		 foreach($summary_items as $key=>$ro){			 
			 
			// die($key);
		
	  ?>
    <tr >
      <th scope="row"><?php echo ++$ix; ?></th>
      <td><?php echo ucfirst(($key=='gk_science')?'GK/Science':$key); ?></td>
      <td><?php echo $ro['d']; $Draft_Items+=$ro['d']; ?></td>
      <td><?php echo $ro['s']; $Submitted_Items+=$ro['s']; ?></td>	  
	  <td><?php echo $ro['sp']; $SS_Pending+=$ro['sp']; ?></td>
		<td><?php echo $ro['sr']; $SS_Rejected+=$ro['sr']; ?></td>
		<td><?php echo $ro['sa']; $SS_Accepted+=$ro['sa']; ?></td>
		<td><?php echo $ro['a']; $AE_Pending+=$ro['a']; ?></td>
		<td><?php echo $ro['aa']; $AE_Accepted+=$ro['aa']; ?></td>
		<td><?php echo $ro['aer']; $AE_Rejected+=$ro['aer']; ?></td>
		
    </tr>
   <?php

		 }
		 ?>
		 <tr style="font-weight: bold;">
      <th scope="row">Total</th>
      <td>&nbsp;</td>
      <td><?php echo $Draft_Items; ?></td>
      <td><?php echo $Submitted_Items; ?></td>	  
	  <td><?php echo $SS_Pending; ?></td>
		<td><?php echo $SS_Rejected; ?></td>
		<td><?php echo $SS_Accepted; ?></td>
		<td><?php echo $AE_Pending; ?></td>
		<td><?php echo $AE_Accepted; ?></td>
		<td><?php echo $AE_Rejected; ?></td>
		
    </tr>
		 <?php
	  }
	 ?>
  </tbody>
</table>
					</div> 
              </div>
				
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>		  		  
<?php endif; ?>	 
		  <?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==4): ?>		    				  
        <div class="row">
       <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;">BATCH - 2  Total Items Submission Details Subjects Wise </span> 
				
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject</th>
      <th scope="col">Draft Items by IW </th>
	  <th scope="col">Submitted by IW</th>	 
	  <th scope="col">Pending by SS</th>
	  <th scope="col">Rejected by SS</th>
	  <th scope="col">Accepted by SS</th>
	  <th scope="col">Pending by AE</th>
	  <th scope="col">Accepted by AE</th>
	  <th scope="col">Rejected by AE</th>
    </tr>
  </thead>
  <tbody>
	  <pre>
	  <?php
	 if(isset($summary_items2)){
		 $Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		 $ix = 0;
		 foreach($summary_items2 as $key=>$ro){			 
			 
			// die($key);
		
	  ?>
    <tr >
      <th scope="row"><?php echo ++$ix; ?></th>
      <td><?php echo ucfirst(($key=='gk_science')?'GK/Science':$key); ?></td>
      <td><?php echo $ro['d']; $Draft_Items+=$ro['d']; ?></td>
      <td><?php echo $ro['s']; $Submitted_Items+=$ro['s']; ?></td>	  
	  <td><?php echo $ro['sp']; $SS_Pending+=$ro['sp']; ?></td>
		<td><?php echo $ro['sr']; $SS_Rejected+=$ro['sr']; ?></td>
		<td><?php echo $ro['sa']; $SS_Accepted+=$ro['sa']; ?></td>
		<td><?php echo $ro['a']; $AE_Pending+=$ro['a']; ?></td>
		<td><?php echo $ro['aa']; $AE_Accepted+=$ro['aa']; ?></td>
		<td><?php echo $ro['aer']; $AE_Rejected+=$ro['aer']; ?></td>
		
    </tr>
   <?php

		 }
		 ?>
		 <tr style="font-weight: bold;">
      <th scope="row">Total</th>
      <td>&nbsp;</td>
      <td><?php echo $Draft_Items; ?></td>
      <td><?php echo $Submitted_Items; ?></td>	  
	  <td><?php echo $SS_Pending; ?></td>
		<td><?php echo $SS_Rejected; ?></td>
		<td><?php echo $SS_Accepted; ?></td>
		<td><?php echo $AE_Pending; ?></td>
		<td><?php echo $AE_Accepted; ?></td>
		<td><?php echo $AE_Rejected; ?></td>
		
    </tr>
		 <?php
	  }
	 ?>
  </tbody>
</table>
					</div> 
              </div>
				
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>		  		  
<?php endif; ?>
  <!-- Small boxes (Stat box) -->
<?php if($this->session->userdata('role_id')==2): ?>		    				  
        <div class="row">
       <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;">Batch 1 - Total Items Submission Details Grade Wise</span> 
				 <br /><br />
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Subject</th>
      <th scope="col">Draft Items by IW </th>
	  <th scope="col">Submitted by IW</th>	 
	  <th scope="col">Pending by SS</th>
	  <th scope="col">Rejected by SS</th>
	  <th scope="col">Accepted by SS</th>
	  <th scope="col">Pending by AE</th>
	<th scope="col">Accepted by AE</th>
	<th scope="col">Rejected by AE</th>
    </tr>
  </thead>
  <tbody>
	  <pre>
	  <?php
$str_subject = '';
switch($this->session->userdata('admin_id')){
	case 11:
		$str_subject = 'english';
		break;
	case 8:
		$str_subject = 'urdu';
		break;
	case 12:
		$str_subject = 'math';
		break;
	case 14:
		$str_subject = 'islamiat';
		break;
	case 15:
		$str_subject = 'social';
		break;
	case 9:
		$str_subject = 'ethics';
		break;
	case 6:
		$str_subject = 'gk_science';
		break;
	case 5:
		$str_subject = 'computer';
		break;
	
}

	 if($str_subject!= ''){
		 $Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		 
		// print_r($english);
		 //die('-----');
		 $ix = 0;
		 foreach($$str_subject as $ro){			 
			 
			// die($key);
		
	  ?>
    <tr >
      <th scope="row"><?php echo $ro['Grade']; ?></th>
      <td><?php echo ucfirst(($str_subject=='gk_science')?'GK/Science':$str_subject); ?></td>
      <td><?php echo $ro['Draft_Items']; $Draft_Items+=$ro['Draft_Items']; ?></td>
      <td><?php echo $ro['Submitted_Items']; $Submitted_Items+=$ro['Submitted_Items']; ?></td>	  
	  <td><?php echo $ro['SS_Pending']; $SS_Pending+=$ro['SS_Pending']; ?></td>
		<td><?php echo $ro['SS_Rejected']; $SS_Rejected+=$ro['SS_Rejected']; ?></td>
		<td><?php echo $ro['SS_Accepted']; $SS_Accepted+=$ro['SS_Accepted']; ?></td>
		<td><?php echo $ro['AE_Pending']; $AE_Pending+=$ro['AE_Pending']; ?></td>
		<td><?php echo $ro['AE_Accepted']; $AE_Accepted+=$ro['AE_Accepted']; ?></td>
		<td><?php echo $ro['AE_Rejected']; $AE_Rejected+=$ro['AE_Rejected']; ?></td>
		
    </tr>
   <?php

		 }
		 ?>
		 <tr style="font-weight: bold;">
      <th scope="row">Total</th>
      <td>&nbsp;</td>
      <td><?php echo $Draft_Items; ?></td>
      <td><?php echo $Submitted_Items; ?></td>	  
	  <td><?php echo $SS_Pending; ?></td>
		<td><?php echo $SS_Rejected; ?></td>
		<td><?php echo $SS_Accepted; ?></td>
		<td><?php echo $AE_Pending; ?></td>
		<td><?php echo $AE_Accepted; ?></td>
		<td><?php echo $AE_Rejected; ?></td>
		
    </tr>
		 <?php
	  }
	 ?>
  </tbody>
</table>
					</div> 
              </div>
				
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>		  		  
<?php endif; ?>	
<?php if($this->session->userdata('role_id')==2): ?>		    				  
        <div class="row">
       <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;">Batch 2 - Total Items Submission Details Grade Wise</span> 				 
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">Grade</th>
      <th scope="col">Subject</th>
      <th scope="col">Draft Items by IW </th>
	  <th scope="col">Submitted by IW</th>	 
	  <th scope="col">Pending by SS</th>
	  <th scope="col">Rejected by SS</th>
	  <th scope="col">Accepted by SS</th>
	  <th scope="col">Pending by AE</th>
	<th scope="col">Accepted by AE</th>
	<th scope="col">Rejected by AE</th>
    </tr>
  </thead>
  <tbody>
	  <pre>
	  <?php
$str_subject = '';
switch($this->session->userdata('admin_id')){
	case 11:
		$str_subject = 'english2';
		break;
	case 8:
		$str_subject = 'urdu2';
		break;
	case 12:
		$str_subject = 'math2';
		break;
	case 14:
		$str_subject = 'islamiat2';
		break;
	case 15:
		$str_subject = 'social2';
		break;
	case 9:
		$str_subject = 'ethics2';
		break;
	case 6:
		$str_subject = 'gk_science2';
		break;
	case 5:
		$str_subject = 'computer2';
		break;
	
}

	 if($str_subject!= ''){
		 $Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		 
		// print_r($english);
		 //die('-----');
		 $ix = 0;
		 foreach($$str_subject as $ro){			 
			 
			// die($key);
		
	  ?>
    <tr >
      <th scope="row"><?php echo $ro['Grade']; ?></th>
      <td><?php echo ucfirst(($str_subject=='gk_science')?'GK/Science':$str_subject); ?></td>
      <td><?php echo $ro['Draft_Items']; $Draft_Items+=$ro['Draft_Items']; ?></td>
      <td><?php echo $ro['Submitted_Items']; $Submitted_Items+=$ro['Submitted_Items']; ?></td>	  
	  <td><?php echo $ro['SS_Pending']; $SS_Pending+=$ro['SS_Pending']; ?></td>
		<td><?php echo $ro['SS_Rejected']; $SS_Rejected+=$ro['SS_Rejected']; ?></td>
		<td><?php echo $ro['SS_Accepted']; $SS_Accepted+=$ro['SS_Accepted']; ?></td>
		<td><?php echo $ro['AE_Pending']; $AE_Pending+=$ro['AE_Pending']; ?></td>
		<td><?php echo $ro['AE_Accepted']; $AE_Accepted+=$ro['AE_Accepted']; ?></td>
		<td><?php echo $ro['AE_Rejected']; $AE_Rejected+=$ro['AE_Rejected']; ?></td>
		
    </tr>
   <?php

		 }
		 ?>
		 <tr style="font-weight: bold;">
      <th scope="row">Total</th>
      <td>&nbsp;</td>
      <td><?php echo $Draft_Items; ?></td>
      <td><?php echo $Submitted_Items; ?></td>	  
	  <td><?php echo $SS_Pending; ?></td>
		<td><?php echo $SS_Rejected; ?></td>
		<td><?php echo $SS_Accepted; ?></td>
		<td><?php echo $AE_Pending; ?></td>
		<td><?php echo $AE_Accepted; ?></td>
		<td><?php echo $AE_Rejected; ?></td>
		
    </tr>
		 <?php
	  }
	 ?>
  </tbody>
</table>
					</div> 
              </div>
				
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>		  		  
<?php endif; ?>	
		  <?php if($this->session->userdata('role_id')==2): ?>		    				  
        <div class="row">
       <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;">Total Items Submission Details ItemWriter Wise</span> 				 
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Writer</th>
	  <th scope="col">Total Items</th>
      <th scope="col">Draft Items</th>
      <th scope="col">Submitted Items</th>	  
   	  <th scope="col">SS Pending</th>
	  <th scope="col">SS Accepted</th>
	  <th scope="col">SS Rejected</th>
    </tr>
  </thead>
  <tbody>
	  <?php
	 if(isset($items_stats_ss)){
		 
		 $ix = 0;
		 foreach($items_stats_ss as $ro){			 
			 
		
	  ?>
    <tr>
      <th scope="row"><?php echo ++$ix; ?></th>
	<td><?php echo $ro['itemwriter']; ?></td>
      <td><?php echo $ro['Total_Items']; ?></td>
      <td><?php echo $ro['Draft_Items']; ?></td>      
	<td><?php echo $ro['Submitted_Items']; ?></td>
	<td><?php echo $ro['SS_Pending']; ?></td>
	<td><?php echo $ro['SS_Accepted']; ?></td>
	<td><?php echo $ro['SS_Rejected']; ?></td>
    </tr>
   <?php
		 }
	  }
	 ?>
  </tbody>
</table>
					</div> 
              </div>
				
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>		  		  
<?php endif; ?>	  

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
