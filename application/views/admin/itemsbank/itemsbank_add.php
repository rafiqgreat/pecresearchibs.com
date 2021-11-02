  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate ItemsBank </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/itemsbank'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  ItemsBank List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/itemsbank/add'), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return onSubmitFunc();" ');  ?>  
			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
			<div class="row form-group">
              	<div class="col-lg-4 col-sm-12">                         
                   <label for="ib_title" class="col-sm-12 control-label">ItemBank Title *</label>
                   <input type="text" name="ib_title" class="form-control" id="ib_title" placeholder="" required="required" value="" >
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="ib_created" class="col-sm-12 control-label">Date *</label>
                    <input type="date" name="ib_created" class="form-control" id="ib_created" placeholder="" required="required" value="<?php echo date("d/m/Y"); ?>" >
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="ib_year" class="col-sm-12 control-label">Year *</label>
                    <input type="number" name="ib_year" class="form-control" id="ib_year" placeholder="2021" required="required"  value="2021" >
                </div>
             </div>
			<div class="row">
              	<div class="col-lg-4 col-sm-12">  					
					<label for="ib_grade_id" class="control-label">Grade *</label>
					<select name="ib_grade_id" class="form-control form-group" id="ib_grade_id"  required>
						<option value="">--Select Grades--</option>
						  <?php
                           foreach($grades as $grade)
                          {
                              echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
                          }
                          ?>
                  	</select>                    
                </div>
				<script language="javascript" type="text/javascript"> var addedsubjects = [];  
				<?php
					if(isset($added_subjects[0]))  {
						$i=0;
						foreach($added_subjects[0] as $keysub=>$valsub)
						{
							echo " addedsubjects[".$i++."] = '".$valsub."'; ";
						}
					}  ?>
				</script>
				<div class="col-lg-4 col-sm-12">                         
                   <label for="ib_subject_id" class="control-label">Subject *</label>
                <select name="ib_subject_id" class="form-control form-group" id="ib_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                </select>
                </div>
              </div>
            
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------Start Block-1------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-1/Question-1 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #1.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #1.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #1.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #1.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b1_item1" class="form-control form-group" id="ib_b1_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b1_item2" class="form-control form-group" id="ib_b1_item2" <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b1_item3" class="form-control form-group" id="ib_b1_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b1_item4" class="form-control form-group" id="ib_b1_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
			 

<!-------------------------------------Start Block-2------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-2/Question-2 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #2.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #2.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #2.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #2.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b2_item1" class="form-control form-group" id="ib_b2_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b2_item2" class="form-control form-group" id="ib_b2_item2" <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b2_item3" class="form-control form-group" id="ib_b2_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b2_item4" class="form-control form-group" id="ib_b2_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
	
			
			
<!-------------------------------------Start Block-2------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-3/Question-3 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #3.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #3.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #3.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #3.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b3_item1" class="form-control form-group" id="ib_b3_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b3_item2" class="form-control form-group" id="ib_b3_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b3_item3" class="form-control form-group" id="ib_b3_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b3_item4" class="form-control form-group" id="ib_b3_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-2------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-4/Question-4 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #4.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #4.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #4.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #4.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b4_item1" class="form-control form-group" id="ib_b4_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b4_item2" class="form-control form-group" id="ib_b4_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b4_item3" class="form-control form-group" id="ib_b4_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b4_item4" class="form-control form-group" id="ib_b4_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>

<!-------------------------------------Start Block-5------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-5/Question-5 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #5.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #5.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #5.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #5.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b5_item1" class="form-control form-group" id="ib_b5_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b5_item2" class="form-control form-group" id="ib_b5_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b5_item3" class="form-control form-group" id="ib_b5_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b5_item4" class="form-control form-group" id="ib_b5_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
			
<!-------------------------------------Start Block-6------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-6/Question-6 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #6.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #6.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #6.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #6.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b6_item1" class="form-control form-group" id="ib_b6_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b6_item2" class="form-control form-group" id="ib_b6_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b6_item3" class="form-control form-group" id="ib_b6_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b6_item4" class="form-control form-group" id="ib_b6_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
			
			
<!-------------------------------------Start Block-7------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-7/Question-7 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #7.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #7.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #7.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #7.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b7_item1" class="form-control form-group" id="ib_b7_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b7_item2" class="form-control form-group" id="ib_b7_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b7_item3" class="form-control form-group" id="ib_b7_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b7_item4" class="form-control form-group" id="ib_b7_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
			<!-------------------------------------Start Block-8------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-8/Question-8 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #8.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #8.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #8.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #8.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b8_item1" class="form-control form-group" id="ib_b8_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b8_item2" class="form-control form-group" id="ib_b8_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b8_item3" class="form-control form-group" id="ib_b8_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b8_item4" class="form-control form-group" id="ib_b8_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-9------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-9/Question-9 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #9.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #9.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #9.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #9.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b9_item1" class="form-control form-group" id="ib_b9_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b9_item2" class="form-control form-group" id="ib_b9_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b9_item3" class="form-control form-group" id="ib_b9_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b9_item4" class="form-control form-group" id="ib_b9_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-10------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-10/Question-10 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #10.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #10.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #10.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #10.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b10_item1" class="form-control form-group" id="ib_b10_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b10_item2" class="form-control form-group" id="ib_b10_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b10_item3" class="form-control form-group" id="ib_b10_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b10_item4" class="form-control form-group" id="ib_b10_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-11------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-11/Question-11 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #11.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #11.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #11.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #11.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b11_item1" class="form-control form-group" id="ib_b11_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b11_item2" class="form-control form-group" id="ib_b11_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b11_item3" class="form-control form-group" id="ib_b11_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b11_item4" class="form-control form-group" id="ib_b11_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-12------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-12/Question-12 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #12.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #12.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #12.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #12.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b12_item1" class="form-control form-group" id="ib_b12_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b12_item2" class="form-control form-group" id="ib_b12_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b12_item3" class="form-control form-group" id="ib_b12_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b12_item4" class="form-control form-group" id="ib_b12_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-13------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-13/Question-13 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #13.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #13.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #13.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #13.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b13_item1" class="form-control form-group" id="ib_b13_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b13_item2" class="form-control form-group" id="ib_b13_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b13_item3" class="form-control form-group" id="ib_b13_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b13_item4" class="form-control form-group" id="ib_b13_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-14------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-14/Question-14 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #14.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #14.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #14.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #14.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b14_item1" class="form-control form-group" id="ib_b14_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b14_item2" class="form-control form-group" id="ib_b14_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b14_item3" class="form-control form-group" id="ib_b14_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b14_item4" class="form-control form-group" id="ib_b14_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-15------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-15/Question-15 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #15.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #15.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #15.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #15.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b15_item1" class="form-control form-group" id="ib_b15_item1"  required>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b15_item2" class="form-control form-group" id="ib_b15_item2"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b15_item3" class="form-control form-group" id="ib_b15_item3"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b15_item4" class="form-control form-group" id="ib_b15_item4"  <?php if($this->session->userdata('admin_id')!=7){ ?> required<?php } ?>>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-16------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-16/Question-16 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #16.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #16.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #16.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #16.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b16_item1" class="form-control form-group" id="ib_b16_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b16_item2" class="form-control form-group" id="ib_b16_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b16_item3" class="form-control form-group" id="ib_b16_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b16_item4" class="form-control form-group" id="ib_b16_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-17------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-17/Question-17 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #17.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #17.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #17.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #17.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b17_item1" class="form-control form-group" id="ib_b17_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b17_item2" class="form-control form-group" id="ib_b17_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b17_item3" class="form-control form-group" id="ib_b17_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b17_item4" class="form-control form-group" id="ib_b17_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-18------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-18/Question-18 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #18.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #18.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #18.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #18.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b18_item1" class="form-control form-group" id="ib_b18_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b18_item2" class="form-control form-group" id="ib_b18_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b18_item3" class="form-control form-group" id="ib_b18_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b18_item4" class="form-control form-group" id="ib_b18_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-19------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-19/Question-19 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #19.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #19.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #19.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #19.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b19_item1" class="form-control form-group" id="ib_b19_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b19_item2" class="form-control form-group" id="ib_b19_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b19_item3" class="form-control form-group" id="ib_b19_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b19_item4" class="form-control form-group" id="ib_b19_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-20------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-20/Question-20 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #20.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #20.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #20.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #20.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b20_item1" class="form-control form-group" id="ib_b20_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b20_item2" class="form-control form-group" id="ib_b20_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b20_item3" class="form-control form-group" id="ib_b20_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b20_item4" class="form-control form-group" id="ib_b20_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-21------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-21/Question-21 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #21.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #21.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #21.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #21.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b21_item1" class="form-control form-group" id="ib_b21_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b21_item2" class="form-control form-group" id="ib_b21_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b21_item3" class="form-control form-group" id="ib_b21_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b21_item4" class="form-control form-group" id="ib_b21_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<!-------------------------------------Start Block-22------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-22/Question-22 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #22.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #22.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #22.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #22.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b22_item1" class="form-control form-group" id="ib_b22_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b22_item2" class="form-control form-group" id="ib_b22_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b22_item3" class="form-control form-group" id="ib_b22_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b22_item4" class="form-control form-group" id="ib_b22_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>	
			
<!-------------------------------------Start Block-23------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-23/Question-23 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #23.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #23.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #23.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #23.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b23_item1" class="form-control form-group" id="ib_b23_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b23_item2" class="form-control form-group" id="ib_b23_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b23_item3" class="form-control form-group" id="ib_b23_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b23_item4" class="form-control form-group" id="ib_b23_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>

<!-------------------------------------Start Block-24------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-24/Question-24 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #24.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #24.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #24.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #24.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b24_item1" class="form-control form-group" id="ib_b24_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b24_item2" class="form-control form-group" id="ib_b24_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b24_item3" class="form-control form-group" id="ib_b24_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b24_item4" class="form-control form-group" id="ib_b24_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>

<!-------------------------------------Start Block-25------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-25/Question-25 Items</div>  

            <div class="row">
				<div class="col-lg-12 col-sm-12" style=" font-size:18px; font-weight:bold"> 
					<div class="row">
						<div class="col-lg-3 col-sm-12">                         
							Question #25.1
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #25.2
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #25.3
						</div>
						<div class="col-lg-3 col-sm-12">                         
							Question #25.4
						</div>
					</div>
                </div>				
				<div class="col-lg-12 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b25_item1" class="form-control form-group" id="ib_b25_item1"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b25_item2" class="form-control form-group" id="ib_b25_item2"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b25_item3" class="form-control form-group" id="ib_b25_item3"  >
                            <option value="">--Select Item/Question--</option>
                            </select>
                        </div>				
                        <div class="col-lg-3 col-sm-12">                         
                        <select name="ib_b25_item4" class="form-control form-group" id="ib_b25_item4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
			
<!---------------------------------------------==============================--------------------------------------------------------->            
          
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Save" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">
$('#ib_grade_id').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#ib_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
	
});

$('#ib_subject_id').on('change', function() {	
	
	if(jQuery.inArray(this.value, addedsubjects) !== -1)
	{
		alert('This Subject (ID: '+this.value+') ItemBank already Generated! First Delete and then Add this! or Try other subject!');	
		$('#ib_subject_id').val("");
		return false;
	}
	
      $.post('<?=base_url("admin/itemsbank/all_items_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
//<!-----------------------------------Start Blocks b1-------------------------------------------------------->
 $('#ib_b1_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b1_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b1_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b1_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b1_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b1_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b1_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b1_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b1 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b2-------------------------------------------------------->
 $('#ib_b2_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b2_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b2_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b2_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b2_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b2_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b2_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b2_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b2 Blocks------------------------------------------------------------>	
//<!-----------------------------------Start Blocks b3-------------------------------------------------------->
 $('#ib_b3_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b3_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b3_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b3_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b3_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b3_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b3_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b3_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b3 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b4-------------------------------------------------------->
 $('#ib_b4_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b4_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b4_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b4_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b4_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b4_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b4_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b4_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b4 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b5-------------------------------------------------------->
 $('#ib_b5_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b5_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b5_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b5_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b5_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b5_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b5_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b5_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b5 Blocks------------------------------------------------------------>
		  //<!-----------------------------------Start Blocks b6-------------------------------------------------------->
 $('#ib_b6_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b6_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b6_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b6_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b6_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b6_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b6_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b6_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b6 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b7-------------------------------------------------------->
 $('#ib_b7_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b7_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b7_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b7_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b7_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b7_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b7_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b7_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b7 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b8-------------------------------------------------------->
 $('#ib_b8_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b8_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b8_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b8_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b8_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b8_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b8_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b8_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b8 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b9-------------------------------------------------------->
 $('#ib_b9_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b9_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b9_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b9_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b9_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b9_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b9_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b9_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b9 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b10-------------------------------------------------------->
 $('#ib_b10_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b10_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b10_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b10_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b10_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b10_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b10_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b10_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b10 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b11-------------------------------------------------------->
 $('#ib_b11_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b11_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b11_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b11_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b11_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b11_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b11_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b11_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b11 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b12-------------------------------------------------------->
 $('#ib_b12_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b12_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b12_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b12_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b12_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b12_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b12_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b12_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b12 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b13-------------------------------------------------------->
 $('#ib_b13_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b13_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b13_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b13_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b13_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b13_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b13_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b13_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b13 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b14-------------------------------------------------------->
 $('#ib_b14_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b14_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b14_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b14_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b14_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b14_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b14_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b14_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b14 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b15-------------------------------------------------------->
 $('#ib_b15_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b15_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b15_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b15_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b15_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b15_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b15_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b15_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b15 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b16-------------------------------------------------------->
 $('#ib_b16_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b16_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b16_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b16_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b16_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b16_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b16_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b16_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b16 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b17-------------------------------------------------------->
 $('#ib_b17_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b17_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b17_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b17_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b17_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b17_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b17_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b17_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b18 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b18-------------------------------------------------------->
 $('#ib_b18_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b18_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b18_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b18_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b18_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b18_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b18_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b18_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b18 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b19-------------------------------------------------------->
 $('#ib_b19_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b19_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b19_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b19_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b19_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b19_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b19_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b19_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b20 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b20-------------------------------------------------------->
 $('#ib_b20_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b20_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b20_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b20_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b20_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b20_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b20_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b20_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b20 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b21-------------------------------------------------------->
 $('#ib_b21_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b21_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b21_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b21_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b21_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b21_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b21_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b21_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b21 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b22-------------------------------------------------------->
 $('#ib_b22_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b22_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b22_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b22_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b22_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b22_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b22_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b22_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b22 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b23-------------------------------------------------------->
 $('#ib_b23_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b23_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b23_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b23_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b23_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b23_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b23_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b23_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b23 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b24-------------------------------------------------------->
 $('#ib_b24_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b24_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b24_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b24_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b24_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b24_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b24_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b24_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b24 Blocks------------------------------------------------------------>
//<!-----------------------------------Start Blocks b25-------------------------------------------------------->
 $('#ib_b25_item1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b25_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b25_item2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b25_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b25_item3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b25_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#ib_b25_item4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b25_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End b25 Blocks------------------------------------------------------------>
		  
    });
});

</script>
<script language="javascript" type="text/javascript">
			document.getElementById('ib_created').valueAsDate = new Date();			
		</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>