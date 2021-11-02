<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin'); ?>" class="brand-link">
    <img src="<?= base_url($this->general_settings['favicon']); ?>" alt="Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $this->general_settings['application_name']; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">           
        <a href="#" class="d-block"><?php echo ucwords($this->session->userdata('username')); ?>(<?php echo strtoupper($this->session->userdata('role_short')); ?>)</a>       
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
		<li id="dashboard" class="nav-item has-treeview">
          <a href="<?= base_url('admin') ?>" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Dashboard
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>         
        </li>
        <li id="profile" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Profile
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/profile/profile_edit/'.$this->session->userdata('admin_id')); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Profile Edit</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
          </ul>
        </li>
<?php if(in_array('role_users',$this->session->userdata('role_permissions'))): ?>		
        <li id="users" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Users
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/users'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Users List</p>
              </a>
          </li>           
          <li class="nav-item">
              <a href="<?= base_url('admin/users/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add New User</p>
              </a>
            </li>
          </ul>
        </li>
<?php endif; ?>
<?php if($this->session->userdata('role_id')==2 && $this->session->userdata('role_id')!=6):?>	
<li id="items" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
    <li class="nav-item">
              <a href="<?php echo base_url('admin/items/ss_pitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending Items</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/items/ss_accepted_items'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Acepted Items</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/items/ss_rejected_items'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Rejected Items</p>
              </a>
          </li> 
        </ul>
</li>             
<?php endif; ?> 
<?php if($this->session->userdata('role_id')==4):?>	
<li id="items" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
    <li class="nav-item">
              <a href="<?php echo base_url('admin/items/ae_pitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending Items</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/items/ae_accepted_items'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Acepted Items</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/items/ae_rejected_items'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Rejected Items</p>
              </a>
          </li> 
        </ul>
</li>             
<?php endif; ?> 
<?php if($this->session->userdata('role_id')==2):?>	
    <li id="add_question" class="nav-item">
        <a href="<?= base_url('admin/itemwriters'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
                Itemwriters
            </p>
        </a>
    </li>  
<?php endif; ?> 
<?php if($this->session->userdata('role_id')==2):?>	
    <li id="add_question" class="nav-item">
        <a href="<?= base_url('admin/itemreviewers'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
                Itemreviewers
            </p>
        </a>
    </li>  
<?php endif; ?>
<?php if(in_array('role_grades',$this->session->userdata('role_permissions'))): ?>	
<li id="add_question" class="nav-item">
   <a href="<?= base_url('admin/grades'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Grades
            </p>
          </a>
</li>  
<?php endif; ?> 
<?php if(in_array('role_subjects',$this->session->userdata('role_permissions'))): ?>	
<li id="add_question" class="nav-item">
   <a href="<?= base_url('admin/subjects'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Subjects
            </p>
          </a>
</li>  
<?php endif; ?>  
<?php if(in_array('role_cstands',$this->session->userdata('role_permissions'))): ?>	
<li id="add_question" class="nav-item">
   <a href="<?= base_url('admin/contentstand'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Content Stands
            </p>
          </a>
</li>  
<?php endif; ?> 
<?php if(in_array('role_subcstands',$this->session->userdata('role_permissions'))): ?>	
<li id="subcstands" class="nav-item">
   <a href="<?= base_url('admin/subcontentstand'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Sub-Content Stands
            </p>
          </a>
</li>  
<?php endif; ?> 
<?php if(in_array('role_slos',$this->session->userdata('role_permissions'))): ?>	
<li id="slos" class="nav-item">
   <a href="<?= base_url('admin/slos'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              SLOs
            </p>
          </a>
</li>  
<?php endif; ?>  
<?php if(in_array('role_iblocks',$this->session->userdata('role_permissions'))): ?>	
<li id="blocks" class="nav-item">
   <a href="<?= base_url('admin/blocks'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Blocks
            </p>
          </a>
</li>  
<?php endif; ?> 
<?php /* if(in_array('role_iblocks',$this->session->userdata('role_permissions'))): */?>	
<li id="media" class="nav-item">
   <a href="<?= base_url('admin/media'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Media
            </p>
          </a>
</li>  
<?php /*endif;*/ ?>
<?php if($this->session->userdata('role_id')==5):?>		
<li id="blocks" class="nav-item">
   <a href="<?php echo base_url('admin/items/psy_items'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          Pending Items
        </p>
      </a>
</li>  
<?php endif; ?> 
<?php if($this->session->userdata('role_id')==5):?>		
<li id="blocks" class="nav-item">
   <a href="<?php echo base_url('admin/items/psy_items_rev'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          Reviewed Items
        </p>
      </a>
</li>  
<?php endif; ?> 
<?php if(in_array('role_items',$this->session->userdata('role_permissions'))): ?>	
<li id="items" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/items/ditems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Items</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/items/sitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Submitted Items</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/items/ritems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Rejected Items</p>
              </a>
          </li>
          <?php /*?><li class="nav-item">
              <a href="<?php echo base_url('admin/items/aitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Accepted Items</p>
              </a>
          </li>  <?php */?>          
          <li class="nav-item">
              <a href="<?= base_url('admin/items/add'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add MCQs Item</p>
              </a>
            </li>
        <li class="nav-item">
              <a href="<?= base_url('admin/items/add_erq_crq'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Add ERQ/CRQ Item</p>
              </a>
            </li>
          </ul>
        </li>
<?php endif; ?> 

<?php if($this->session->userdata('role_id')==6):?>	
<li id="items" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/items/rev_pitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/items/rev_eitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/items/rev_aitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif;  ?> 

<?php if($this->session->userdata('role_id')==2):?>	<!---------SS Item Group--------->	
<li id="itemsgroup" class="nav-item">
   <a href="<?= base_url('admin/Itemsgroup/ssindex'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          Items Group
        </p>
      </a>
</li>  
<?php endif; ?> 
<?php if($this->session->userdata('role_id')==3):?>	<!---------IW Item Group--------->	
<li id="itemsgroup" class="nav-item">
   <a href="<?= base_url('admin/Itemsgroup/index'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          Items Group
        </p>
      </a>
</li>  
<?php endif; ?> 
<?php if($this->session->userdata('role_id')==4):?>	<!---------AE Item Group--------->	
<li id="itemsgroup" class="nav-item">
   <a href="<?= base_url('admin/Itemsgroup/aeindex'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          Items Group
        </p>
      </a>
</li>  
<?php endif; ?> 
<?php if($this->session->userdata('role_id')==6):?>	
<li id="itemsgroup" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items Group
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_pitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_eitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_aitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif;  ?>
<?php /*if($this->session->userdata('role_id')==6):?>	<!---------AE Item Group--------->	
<li id="itemsgroup" class="nav-item">
   <a href="<?= base_url('admin/Itemsgroup/rev_pindex'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          Items Group
        </p>
      </a>
</li>  
<?php endif; */?> 
<?php /*?><?php if($this->session->userdata('role_id')==5):?>	<!---------Psycho Item Group--------->	
<li id="itemsgroup" class="nav-item">
   <a href="<?= base_url('admin/Itemsgroup/psyindex'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          Items Group
        </p>
      </a>
</li>  
<?php endif; ?><?php */?>
<?php if($this->session->userdata('role_id')==2):?>		
<li id="itemspara" class="nav-item">
   <a href="<?= base_url('admin/itemspara/ss_pindex'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Items Paragraphs
            </p>
          </a>
</li>  
<?php endif; ?> 
<?php if($this->session->userdata('role_id')==3):?>		
<li id="itemspara" class="nav-item">
   <a href="<?= base_url('admin/itemspara'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Items Paragraphs
            </p>
          </a>
</li>  
<?php endif; ?>
<?php if($this->session->userdata('role_id')==4):?>		
<li id="itemspara" class="nav-item">
   <a href="<?= base_url('admin/itemspara/ae_pindex'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Items Paragraphs
            </p>
          </a>
</li>  
<?php endif; ?>
<?php if($this->session->userdata('role_id')==6):?>	
<li id="itemspara" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items Paragraph
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/itemspara/rev_pindex'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/itemspara/rev_eitemspara'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/itemspara/rev_aitemspara'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif;  ?>
<?php if($this->session->userdata('role_id')==2):?>
<span style="font-size:20px; color:#CCC">2nd Phase/Circle</span>	
<li id="items2nd" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item" id="pitems2nd">
              <a href="<?php echo base_url('admin/items/rev_ss_pitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item" id="eitems2nd">
              <a href="<?php echo base_url('admin/items/rev_ss_eitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item" id="aitems2nd">
              <a href="<?php echo base_url('admin/items/rev_ss_aitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif;  ?> 
<?php if($this->session->userdata('role_id')==2):?>	
<li id="itemsgroup2nd" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items Group
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_ss_pitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_ss_eitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_ss_aitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif;  ?>
<?php if($this->session->userdata('role_id')==2):?>	
<li id="itemspara2nd" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items Paragraphs
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemspara/rev_ss_pitemspara'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemspara/rev_ss_eitemspara'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemspara/rev_ss_aitemspara'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif;  ?>

<?php if($this->session->userdata('role_id')==4):?>
<span style="font-size:20px; color:#CCC">2nd Phase/Circle</span>	
<li id="items2nd" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item" id="pitems2nd">
              <a href="<?php echo base_url('admin/items/rev_ae_pitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item" id="eitems2nd">
              <a href="<?php echo base_url('admin/items/rev_ae_eitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item" id="aitems2nd">
              <a href="<?php echo base_url('admin/items/rev_ae_aitems'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif;  ?> 
<?php  if($this->session->userdata('role_id')==4):?>	
<li id="itemsgroup2nd" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items Group
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_ae_pitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_ae_eitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemsgroup/rev_ae_aitemsgroup'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif; ?>
<?php  if($this->session->userdata('role_id')==4):?>	
<li id="itemspara2nd" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Items Paragraphs
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">      
        <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemspara/rev_ae_pitemspara'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Pending</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemspara/rev_ae_eitemspara'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Under Review</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url('admin/Itemspara/rev_ae_aitemspara'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Reviewed/Accepted</p>
              </a>
          </li>
          </ul>
        </li>
<?php endif;  ?>
<?php /* if($this->session->userdata('role_id')==6):?>		
<li id="itemspara" class="nav-item">
   <a href="<?= base_url('admin/itemspara/rev_pindex'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Items Paragraphs
            </p>
          </a>
</li>  
<?php endif; ?>
<?php /*if(in_array('role_itemsbank',$this->session->userdata('role_permissions'))): ?>	
<li id="itemsbanks" class="nav-item">
   <a href="<?= base_url('admin/itemsbank'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Items Bank
            </p>
          </a>
</li>  
<?php endif; ?> 
<?php if(in_array('role_itemsbank',$this->session->userdata('role_permissions'))): ?>	
<li id="paperinstructions" class="nav-item">
   <a href="<?= base_url('admin/paperinstructions'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Final Papers Headers
            </p>
          </a>
</li>  
<?php endif;*/ ?> 
<?php if(in_array('role_users',$this->session->userdata('role_permissions'))): ?>	
<li id="schools" class="nav-item">
    <a href="<?= base_url('admin/district'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          District
        </p>
    </a>
</li>  
<?php endif; ?>
<!--------------------Tehsil Starts----------------------------------------------->
<?php if(in_array('role_users',$this->session->userdata('role_permissions'))): ?>	
<li id="schools" class="nav-item">
    <a href="<?= base_url('admin/tehsil'); ?>" class="nav-link">
        <i class="nav-icon fa fa-edit"></i>
        <p>
          Tehsil
        </p>
    </a>
</li>  
<?php endif; ?> 
<!--------------------Tehsil Ends----------------------------------------------->     
<?php if(in_array('role_schools',$this->session->userdata('role_permissions'))): ?>	
<li id="schools" class="nav-item">
   <a href="<?= base_url('admin/school'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Schools
            </p>
          </a>
</li>  
<?php endif; ?> 
<?php if(in_array('role_schools',$this->session->userdata('role_permissions'))): ?>	
<li id="schools" class="nav-item">
   <a href="<?= base_url('admin/approveitembank'); ?>" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Approve ItemBank Papers
            </p>
          </a>
</li>  
<?php endif; ?> 
<?php if(in_array('role_backup',$this->session->userdata('role_permissions'))): ?>			
        <li id="export" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-life-ring"></i>
            <p>
              Backup & Export
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/export'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Database Backup</p>
              </a>
            </li>
          </ul>
        </li>
<?php endif; ?> 
<?php if(in_array('role_settings',$this->session->userdata('role_permissions'))): ?>     
        <li id="general_settings" class="nav-item">
          <a href="<?= base_url('admin/general_settings'); ?>" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              General Settings
            </p>
          </a>
        </li>
<?php endif; ?>
<?php if(in_array('role_settings',$this->session->userdata('role_permissions'))): ?>     
        <li id="formulas" class="nav-item">
          <a href="<?= base_url('admin/formulas'); ?>" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              Math & Scientific Formulas
            </p>
          </a>
        </li>
<?php endif; ?>
<?php /*

        <li id="widgets" class="nav-item">
          <a href="<?= base_url('admin/widgets'); ?>" class="nav-link">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>

        <li id="charts" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-pie-chart"></i>
            <p>
              Charts
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/charts/chartjs'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>ChartJS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/charts/flot'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Flot</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/charts/inline'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Inline</p>
              </a>
            </li>
          </ul>
        </li>

        <li id="ui" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-tree"></i>
            <p>
              UI Elements
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/ui/general'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>General</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/ui/icons'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Icons</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/ui/buttons'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Buttons</p>
              </a>
            </li>
          </ul>
        </li>

        <li id="forms" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Forms
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/forms/general'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>General Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/forms/advanced'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Advanced Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/forms/editors'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Editors</p>
              </a>
            </li>
          </ul>
        </li>

        <li id="tables" class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Tables
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/tables/simple'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tables/data'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Data Tables</p>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-header">EXAMPLES</li>
        <li id="calender" class="nav-item">
          <a href="<?= base_url('admin/calendar'); ?>" class="nav-link">
            <i class="nav-icon fa fa-calendar"></i>
            <p>
              Calendar
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>

        <li id="mailbox" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-envelope-o"></i>
            <p>
              Mailbox
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/mailbox/inbox'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Inbox</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/mailbox/compose'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Compose</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/mailbox/read_mail'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Read</p>
              </a>
            </li>
          </ul>
        </li>

        <li id="pages" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Pages
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/pages/invoice'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/pages/profile'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/pages/login'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Login</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/pages/register'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Register</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/pages/lockscreen'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Lockscreen</p>
              </a>
            </li>
          </ul>
        </li>

        <li id="extras" class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-plus-square-o"></i>
            <p>
              Extras
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/extras/error404'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Error 404</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/extras/errro500'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Error 500</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/extras/blank'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Blank Page</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/extras/starter'); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Starter Page</p>
              </a>
            </li>
          </ul>
        </li>
*/ ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $("#<?= $cur_tab ?>").addClass('menu-open');
  $("#<?= $cur_tab ?> > a").addClass('active');
</script>