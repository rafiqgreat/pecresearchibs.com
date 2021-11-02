  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Itemwriter </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/itemwriters'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Itemwriters List</a>
          </div>
        </div>
        <div class="card-body">   
			
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/itemwriters/edit/'.$itemwriters['ci_iw_id']), 'class="form-horizontal" name="frm_itmewriter_add" id="frm_itmewriters_add" method="POST" enctype="multipart/form-data" ');  ?> 
			<input type="hidden" id="ci_iw_adminid" name="ci_iw_adminid" value="<?= $itemwriters['ci_iw_adminid']; ?>" />
            	<?php // echo '<PRE>'; print_r($itemwriters);?>
              <div class="row">                                        
                <div class="col-lg-3 col-sm-12">
                <label for="firstname" class="col-sm-12 control-label">First Name</label>
                  <input type="text" name="firstname" class="form-control form-group" id="firstname" value="<?= $itemwriters['ci_iw_fname']; ?>" placeholder="" required="required">
                </div>                  
                <div class="col-lg-3 col-sm-12">
                <label for="lastname" class="col-sm-12 control-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control form-group" id="lastname" value="<?= $itemwriters['ci_iw_lname']; ?>" placeholder="" required="required">
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
                  <input type="text" name="username" class="form-control form-group" id="username" value="<?= $itemwriters['ci_iw_username']; ?>" placeholder="" readonly="readonly">
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="password" class="col-sm-12 control-label">Password</label> 
                  <input type="hidden" name="old_password" class="form-control form-group" id="old_password" value="<?= $itemwriters['ci_iw_password']; ?>"  placeholder="" >                
                  <input type="password" name="password" class="form-control form-group" id="password" value="" placeholder="" >                
              </div>
              </div>
              <div class="row"> 
                 <div class="col-lg-3 col-sm-12">
                <label for="fathername" class="col-sm-12 control-label">Father's Name</label>
                  <input type="text" name="fathername" class="form-control form-group" id="fathername" placeholder="" value="<?= $itemwriters['ci_iw_fathername']; ?>" required="required">
                </div>                                          
                 <div class="col-lg-3 col-sm-12">
                	<label for="gender" class="col-sm-12 control-label">Gender</label>
                     <select name="gender" class="form-control" id="gender" placeholder="" required="required">
                        <option value="Male"  <?= ($itemwriters['ci_iw_gender'] == "Male")?'selected': '' ?>>Male</option>
                        <option value="Female" <?= ($itemwriters['ci_iw_gender'] == "Female")?'selected': '' ?>>Female</option>
                        <option value="Others" <?= ($itemwriters['ci_iw_gender'] == "Others")?'selected': '' ?>>Others</option>
                    </select>
                </div>
               <div class="col-lg-3 col-sm-12">
                <label for="mobilenumber" class="col-sm-12 control-label">Mobile Number</label>
                  <input type="number" name="mobilenumber" class="form-control form-group" id="mobilenumber" value="<?= $itemwriters['ci_iw_mobile']; ?>" placeholder="" required="required">
                </div> 
               <div class="col-lg-3 col-sm-12">
                <label for="email" class="col-sm-12 control-label">Email</label>
                  <input type="email" name="email" class="form-control form-group" id="email" value="<?= $itemwriters['ci_iw_email']; ?>" placeholder="" required="required">
                </div>
            </div>
              <div class="row">
                <div class="col-lg-3 col-sm-12">
                <label for="dob" class="col-sm-12 control-label">Date of Birth</label>
                  <input type="date" name="dob" class="form-control form-group" id="dob" value="<?= $itemwriters['ci_iw_dob']; ?>" placeholder="" required="required">
                </div>               
                <div class="col-lg-3 col-sm-12">
                <label for="cnic" class="col-sm-12 control-label">CNIC</label>
                  <input type="number" name="cnic" class="form-control form-group" id="cnic" value="<?= $itemwriters['ci_iw_cnic']; ?>" placeholder="" required="required" readonly="readonly">
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="designation" class="col-sm-12 control-label">Designation</label>                
                	<input type="text" name="designation" class="form-control form-group" id="designation" value="<?= $itemwriters['ci_iw_designation']; ?>"  placeholder="" required="required">                
              	</div>
                <div class="col-lg-3 col-sm-12">
                <label for="placeofposting" class="col-sm-12 control-label">Place of Posting</label>
                  <input type="text" name="placeofposting" class="form-control form-group" id="placeofposting" value="<?= $itemwriters['ci_iw_posting']; ?>" placeholder="" required="required">
                </div>
              </div>
              <div class="row">                
                <div class="col-lg-3 col-sm-12">
                <label for="subject" class="col-sm-12 control-label">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject" value="<?= $itemwriters['ci_iw_subject']; ?>" placeholder="" readonly="readonly">
                   <?php /*?>
                    <select name="subject" class="form-control" id="subject" placeholder="" required="required" >
                        <option value="0">----Select Subject----</option>
                        <option value="English" <?= ($itemwriters['ci_iw_subject']=="English")? 'selected' : '' ?>>English-انگریزی</option>
                        <option value="Urdu" <?= ($itemwriters['ci_iw_subject']=="Urdu")? 'selected' : '' ?>>Urdu-اردو</option>
                        <option value="Math" <?= ($itemwriters['ci_iw_subject']=="Math")? 'selected' : '' ?>>Math-ریاضی</option>
                        <option value="General Knowledge" <?= ($itemwriters['ci_iw_subject']=="General Knowledge")? 'selected' : '' ?>>General Knowledge-جنرل نالج</option>
                        <option value="Religious Education" <?= ($itemwriters['ci_iw_subject']=="Religious Education")? 'selected' : '' ?>>Religious Education-دینی تعلیم</option>
                        <option value="Islamiat" <?= ($itemwriters['ci_iw_subject']=="Islamiat")? 'selected' : '' ?>>Islamiat-اسلامیات</option>
                        <option value="Social Studies" <?= ($itemwriters['ci_iw_subject']=="Social Studies")? 'selected' : '' ?>>Social Studies-شوشل سٹڈی</option>
                        <option value="Science" <?= ($itemwriters['ci_iw_subject']=="Science")? 'selected' : '' ?>>Science-سائینس</option>
                        <option value="Computer Education" <?= ($itemwriters['ci_iw_subject']=="Computer Education")? 'selected' : '' ?>>Computer Education-کمپوٹر تعلیم</option>
                        <option value="Ethics" <?= ($itemwriters['ci_iw_subject']=="Ethics")? 'selected' : '' ?>>Ethics-اخلاقیات</option>
                    </select>
                    <?php */?>
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="department" class="col-sm-12 control-label">Department</label>                
                	<select name="department" class="form-control" id="department" placeholder="" required="required">
                        <option value="0">-----Select Department----</option>
                        <option value="Public" <?= ($itemwriters['ci_iw_deptttype'] == "Public")?'selected': '' ?>>Public</option>
                        <option value="Private" <?= ($itemwriters['ci_iw_deptttype'] == "Private")?'selected': '' ?>>Private</option>
                    </select>                
              	</div>
                <div class="col-lg-3 col-sm-12">
                	<label for="publictype" class="col-sm-12 control-label">Public School Type</label>
                     <select name="publictype" class="form-control" id="publictype" placeholder="" required="required">
                        <option value="0">----Select School Type----</option>
                        <option value="SED" <?= ($itemwriters['ci_iw_publictype'] == "SED")?'selected': '' ?>>SED</option>
                        <option value="FEDERAL" <?= ($itemwriters['ci_iw_publictype'] == "FEDERAL")?'selected': '' ?>>FEDERAL</option>
                        <option value="PEF" <?= ($itemwriters['ci_iw_publictype'] == "PEF")?'selected': '' ?>>PEF</option>
                        <option value="COMMUNITY" <?= ($itemwriters['ci_iw_publictype'] == "COMMUNITY")?'selected': '' ?>>COMMUNITY</option>
                        <option value="LITERACY" <?= ($itemwriters['ci_iw_publictype'] == "LITERACY")?'selected': '' ?>>LITERACY</option>
                        <option value="PSSP" <?= ($itemwriters['ci_iw_publictype'] == "PSSP")?'selected': '' ?>>PSSP</option>
                        <option value="DANISH" <?= ($itemwriters['ci_iw_publictype'] == "DANISH")?'selected': '' ?>>DANISH</option>
                        <option value="INSAFAFTERNOON" <?= ($itemwriters['ci_iw_publictype'] == "INSAFAFTERNOON")?'selected': '' ?>>INSAFAFTERNOON</option>
                        <option value="OTHERS" <?= ($itemwriters['ci_iw_publictype'] == "OTHERS")?'selected': '' ?>>OTHERS</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="area" class="col-sm-12 control-label">Area</label>
                   <select name="area" class="form-control" id="area" placeholder="" required="required">
                        <option value="Urban" <?= ($itemwriters['ci_iw_area'] == "Urban")?'selected': '' ?>>Urban</option>
                        <option value="Rural" <?= ($itemwriters['ci_iw_area'] == "Rural")?'selected': '' ?>>Rural</option>
                    </select>
                </div>
              </div>
              <div class="row" style="padding-top:15px">                
                <div class="col-lg-3 col-sm-12">
                <label for="district" class="col-sm-12 control-label">District</label>
                <select name="district" class="form-control" id="district" placeholder="" required="required" value="<?= $school['school_district_id'] ?>">
                    <option value="">---Select District---</option>
                    <?php 
                    foreach($districts as $row)
                    {
                    $selectedText = '';
                    if($itemwriters['ci_iw_district']==$row['district_id'])
                    $selectedText = ' selected="selected" ';
                    echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>'; 
                    }
                    ?>
                </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="tehsil" class="col-sm-12 control-label">Tehsil</label>
                  <select name="tehsil" class="form-control form-group" id="tehsil" placeholder="" required="required">
                    	<option value="">---Select Tehsil---</option>
                    	<?php
						   foreach($tehsils as $tehsil)
							  {
								$selectedText = '';
								  if($tehsil['tehsil_id']==$itemwriters['ci_iw_tehsil'])
								  $selectedText = ' selected="selected" ';
								echo '<option value="'.$tehsil['tehsil_id'].'" '.$selectedText.'>'.$tehsil['tehsil_name_en'].'</option>';
							  }
						  ?>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="cniccopy" class="col-sm-12 control-label">CNIC Copy</label>
                  <input type="file" name="cniccopy" id="cniccopy" class="form-control form-group" value=""  placeholder="" >
                </div>                  
                <div class="col-lg-3 col-sm-12">
                <label for="picture" class="col-sm-12 control-label">Picture</label>
                  <input type="file" name="picture" id="picture" class="form-control form-group" value=""  placeholder="" >
                </div>
              </div>
              <div class="row">                
                <div class="col-lg-3 col-sm-12">
                <label for="status" class="col-sm-12 control-label">Status</label>
                  <select name="status" class="form-control" id="status" placeholder="" required="required">
                        <option value="0" <?= ($itemwriters['ci_iw_status'] == 0)?'selected': '' ?> >In-Active</option>
                        <option value="1" <?= ($itemwriters['ci_iw_status'] == 1)?'selected': '' ?> >Active</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12"></div>
                <div class="col-lg-3 col-sm-12">
					<?php if ($itemwriters['ci_iw_cniccopy'] != ""){?><img src="<?php echo base_url().$itemwriters['ci_iw_cniccopy'];?>" style="max-height:100px; max-width:100px;"/><a class="delete btn btn-sm btn-danger" href='<?php echo base_url("admin/itemwriters/delete_cniccopy/". $itemwriters['ci_iw_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?>
                </div>
                <div class="col-lg-3 col-sm-12">
					<?php if ($itemwriters['ci_iw_picture'] != ""){?><img src="<?php echo base_url().$itemwriters['ci_iw_picture'];?>" style="max-height:100px; max-width:100px;"/><a class="delete btn btn-sm btn-danger" href='<?php echo base_url("admin/itemwriters/delete_picture/". $itemwriters['ci_iw_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>  
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 
<script language="javascript" type="text/javascript">
$('#district').on('change', function() {
		  $.post('<?=base_url("admin/itemwriter/tehsil_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  district_id : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#tehsil option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#tehsil')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});
	/*
  $('#username').on('blur', function() {
      $.post('< ?=base_url("admin/itemwriters/username_exist")?>',
    {
      '< ?php echo $this->security->get_csrf_token_name(); ?>' : '< ?php echo $this->security->get_csrf_hash(); ?>',
      username : this.value
    },
    function(data){
		  if(data==1){
			alert('Username already exist!');  	
			 $('#username').select();
		  }			  
		})  
    });
	*/
</script>