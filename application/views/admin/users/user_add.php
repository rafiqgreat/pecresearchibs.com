  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New User </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Users List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/users/add'), 'class="form-horizontal" name="frm_user_add" onsubmit="return checkRoles()"');  ?> 
              <div class="row">                                         
                <div class="col-lg-6 col-sm-12">
                <label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
                  <input type="text" name="username" class="form-control form-group" id="username" placeholder="" required="required">
                </div>
                <div class="col-lg-6 col-sm-12">
                <label for="password" class="col-sm-12 control-label">Password</label>                
                  <input type="password" name="password" class="form-control form-group" id="password" placeholder="" required="required">                
              </div>
            </div>
              <div class="row">                
                <div class="col-lg-6 col-sm-12">
                <label for="firstname" class="col-sm-12 control-label">First Name</label>
                  <input type="text" name="firstname" class="form-control form-group" id="firstname" placeholder="" required="required">
                </div>                  
                <div class="col-lg-6 col-sm-12">
                <label for="lastname" class="col-sm-12 control-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control form-group" id="lastname" placeholder="" required="required">
                </div>
              </div>
              <div class="row">                
              <div class="col-lg-6 col-sm-12">
                <label for="email" class="col-sm-12 control-label">Email</label>
                  <input type="email" name="email" class="form-control form-group" id="email" placeholder="" required="required">
                </div>                
                <div class="col-lg-6 col-sm-12">
                <label for="mobile_no" class="col-sm-12 control-label">Mobile No</label>
                  <input type="number" name="mobile_no" class="form-control form-group" id="mobile_no" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-lg-6 col-sm-12">
                    <label for="address" class="col-sm-12 control-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="" required="required">
                  </div>
 				  <div class="col-lg-6 col-sm-12">  
                    <label for="is_active" class="col-sm-12 control-label">User Status</label>
                    <select name="is_active" class="form-control" id="is_active" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                  </div>
              </div>
               <div class="form-group control-label row">
                <label for="admin_role_id" class="col-sm-12 control-label">Role</label>
                  <select name="admin_role_id" class="form-control form-group" id="admin_role_id"  required>
                  <option value="">--Select Role--</option>
                  <?php
                   foreach($roles as $role)
                  {
                    echo '<option value="'.$role->role_id.'">'.$role->role_name.'</option>';
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
                    echo '<option value="'.$ae['admin_id'].'">'.$ae['username'].'</option>';
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
                    ?> <div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="<?= $subject['subject_id']; ?>" /><label for="subjects" style="padding:0px 10px;" ><?= $subject['subject_name_en']; ?>(G-<?= $subject['grade_code']; ?>)</label></div><?php
                  }
                  ?>
                  </div>
                </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add User" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>
<script language="javascript">
  $('#div_sel_roles').hide();
  $('#div_sel_subjects').hide();
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
	
	
	
	function checkRoles()
	{
		if($('#admin_role_id').val() == 3)
		{
			if($('#parent_admin_id').val()=="")
			{
				alert('select preent');
				return false;
			}
			else
			{
				return true;
			}
			
			return false;
		}
		else if($('#admin_role_id').val() == 2)
		{
		  var boxes = $('.subs:checked');
		  if(boxes.length>0)
			{
			  return true;
			}
		  else
			{
			  alert('Please select atleast one subject!');
			  return false;
			}
		}
		
	}
</script>
	 