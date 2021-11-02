<div class="form-background">
  <div class="login-box">
    <div class="login-logo" style="1% auto !important">
    <div><img src="../../assets/img/pec-logo.png" width="125" alt="PEC ItemBankSystem" /></div>
      <h2 style="font-size: 0.7em;"><a href="<?= base_url('school'); ?>"><?= $this->general_settings['application_name']; ?></a><br /><span style="font-size: 16px;"> Helpline only Messages: +92 333-4045115 <br /> (All Messages Queries will resolved in 24 Hours)</span></h2>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your school session</p>

        <?php $this->load->view('school/includes/_messages.php') ?>
        
        <?php echo form_open(base_url('school/auth/login'), 'class="login-form" '); ?>
          <div class="form-group has-feedback">
            <input type="text" name="username" id="name" class="form-control" placeholder="School EMIS / Login" >
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
          </div>
		  <div class="row" style="padding-top: 15px;">
		  	<div class="col-12"><a href="https://drive.google.com/drive/folders/1REeHrElNX_a9XxF84vLTtyFULwLBJEax" target="_blank">Click here to Download Grade 1 & 2 and Grade 3 to 8 all Islamiat Nazra Papers</a></div>
		  </div>
        <?php echo form_close(); ?>

       <?php /*?> <p class="mb-1">
          <a href="<?= base_url('school/auth/forgot_password'); ?>">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="<?= base_url('school/auth/register'); ?>" class="text-center">Register a new membership</a>
        </p><?php */?>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</div>
          