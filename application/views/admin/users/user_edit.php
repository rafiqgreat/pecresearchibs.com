  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit User </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Users List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/users/edit/'.$user['admin_id']), 'class="form-horizontal"' )?> 
              
              <div class="row">                                         
                <div class="col-lg-6 col-sm-12">
                <label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
                  <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" id="username" placeholder="">
                </div>
                <div class="col-lg-6 col-sm-12">
                <label for="password" class="col-sm-12 control-label">Password</label>                
                  <input type="password" name="password" class="form-control form-group" id="password" value="<?= $user['username']; ?>"  placeholder="" required="required">                
              </div>
            </div>
            
            <div class="row">                
                <div class="col-lg-6 col-sm-12">
                <label for="firstname" class="col-sm-12 control-label">First Name</label>
                  <input type="text" name="firstname" class="form-control form-group" id="firstname" value="<?= $user['firstname']; ?>" placeholder="" required="required">
                </div>                  
                <div class="col-lg-6 col-sm-12">
                <label for="lastname" class="col-sm-12 control-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control form-group" id="lastname" value="<?= $user['lastname']; ?>" placeholder="" required="required">
                </div>
              </div>
              <div class="row">                
              <div class="col-lg-6 col-sm-12">
                <label for="email" class="col-sm-12 control-label">Email</label>
                  <input type="email" name="email" class="form-control form-group" id="email"  value="<?= $user['email']; ?>" placeholder="" required="required">
                </div>                
                <div class="col-lg-6 col-sm-12">
                <label for="mobile_no" class="col-sm-12 control-label">Mobile No</label>
                  <input type="number" name="mobile_no" class="form-control form-group" id="mobile_no" value="<?= $user['mobile_no']; ?>" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-lg-6 col-sm-12">
                    <label for="address" class="col-sm-12 control-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" value="<?= $user['address']; ?>" placeholder="" required="required">
                  </div>
 				  <div class="col-lg-6 col-sm-12">  
                    <label for="is_active" class="col-sm-12 control-label">User Status</label>
                    <select name="is_active" class="form-control">
                    <option value="1" <?= ($user['is_active'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($user['is_active'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                  </div>
              </div>
              
              <div class="form-group">
                <label for="admin_role_id" class="col-sm-12 control-label">Role</label>
                  <select name="admin_role_id" class="form-control" id="admin_role_id"  required>
                  <option value="">--Select Role--</option>
                  <?php
                   foreach($roles as $role)
					  {
						  $selected = '';
						  if($role->role_id == $user['admin_role_id'])
						  $selected = ' selected="selected" ';
						  echo '<option value="'.$role->role_id.'" '.$selected.'>'.$role->role_name.'</option>';
					  }
					  ?>
                  </select>
              </div>
       		  <div class="form-group row" id="div_sel_roles">
                <label for="parent_admin_id" class="col-sm-12 ">Select Parent</label>
                  <select name="parent_admin_id" class="form-group form-control" id="parent_admin_id" >
                  <option value="">--Select Assessment Expert--</option>
                  <?php
                  foreach($aes as $ae)
                  {
					   $selected = '';
					  if($ae['admin_id'] == $user['parent_admin_id'])
					   $selected = ' selected="selected" ';
                      echo '<option value="'.$ae['admin_id'].'" '.$selected.'>'.$ae['username'].'</option>';
                  }
                  ?>
                  </select>
               </div>
              <div class="form-group row" id="div_sel_subjects"> 
                <div class="col-lg-12 col-sm-12">
                <label for="lables" class="col-sm-12 control-label">Select Subjects</label>
                  <?php				
					
                   foreach($subjects as $subject)
                  {
					   $arrSubjects = explode(',',$user['subjects_ids']);
                    ?> <div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="<?= $subject['subject_id'];?>" <?php if(in_array($subject['subject_id'],$arrSubjects)){ echo 'checked'; } ?>  /><label for="subjects" style="padding:0px 10px;" ><?= $subject['subject_name_en']; ?>(G-<?= $subject['grade_code']; ?>)</label></div><?php
                  }
                  ?>
                  </div>
                </div>       
              
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update User" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 
<script language="javascript" type="text/javascript">
<?php 
	if($user['admin_role_id']==2){ ?>
		$('#div_sel_roles').hide();
		$('#div_sel_subjects').show();
	<?php } 
	elseif($user['admin_role_id']==3){ ?>
		$('#div_sel_roles').show();
		$('#div_sel_subjects').hide();
	<?php }
	else{ ?>
	$('#div_sel_roles').hide();
	$('#div_sel_subjects').hide();	
<?php	}
?>
	
	 $('#admin_role_id').on('change', function() 
  {
    if(this.value == 2) 
    { 
      $('#div_sel_roles').hide();
      $('#div_sel_subjects').show();
    }
    else if(this.value == 3) 
    { 
      $('#div_sel_roles').show();
      $('#div_sel_subjects').hide();
    }
    else
    {
      $('#div_sel_roles').hide();
      $('#div_sel_subjects').hide();
    }
  });
  $('#username').on('blur', function() {
      $.post('<?=base_url("admin/users/username_exist")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      username : this.value
    },
    function(data){
		  if(data==1){
			alert('Username already exist!');  	
			 $('#username').select();
		  }			  
		})  
    });
</script>