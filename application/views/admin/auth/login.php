<div class="form-background">
  <div class="login-box" style="margin: 0% auto">
    <div class="login-logo">
    <div><img src="../../assets/img/pec-logo.png" width="125" alt="PEC ItemBankSystem" /></div>
      <h2><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a></h2>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $this->load->view('admin/includes/_messages.php') ?>
        
        <?php echo form_open(base_url('admin/auth/login'), 'class="login-form" '); ?>
          <div class="form-group has-feedback">
            <input type="text" name="username" id="name" class="form-control" placeholder="Username" >
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
          </div>
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">
            </div>
            <!-- /.col -->
			 
			  <div class="container" style="padding:20px 10px 10px 10px"><a href="<?= base_url('admin/itemwriter/add'); ?>" style="float:left">Click here for Itemwriter Registration</a></div>
              <div class="container" style="padding: 0px 10px 10px 10px"><a href="<?= base_url('admin/itemreviewer/add'); ?>" style="float:left">Click here for Itemreviewer Registration</a></div>
          </div>
        <?php echo form_close(); ?>

       <?php /*?> <p class="mb-1">
          <a href="<?= base_url('admin/auth/forgot_password'); ?>">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="<?= base_url('admin/auth/register'); ?>" class="text-center">Register a new membership</a>
        </p><?php */?>
      </div>
      <!-- /.login-card-body -->
    </div>
	  
  </div>
  <!-- /.login-box -->
</div>
          