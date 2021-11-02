  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate Paper </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('school/paper'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Papers List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/itemsbank/add'), 'id="frmPaper" name="frmPaper" class="form-horizontal" enctype="multipart/form-data" ');  ?>  
			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
			
				<div class="row">
              	<div class="col-lg-3 col-sm-12">  					
					<label for="paper_grade_id" class="control-label">Slect Paper Grade *</label>
					<select name="paper_grade_id" class="form-control form-group" id="paper_grade_id"  required>
						<option value="">--Select Paper Grade--</option>
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
                   <label for="paper_subject_id" class="control-label">Select Paper Subject *</label>
                <select name="paper_subject_id" class="form-control form-group" id="paper_subject_id"  required>
                  <option value="">--Select Paper Subject--</option>
                </select>
                </div>
				<div class="col-lg-5 col-sm-12" id="message_bar">  
					 <br />
                   <div class="alert alert-info">
					  <strong>Hint!</strong> Please select grade to generate paper for available subjects.
					</div>               
                </div>
              </div>
			<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
			<div class="row form-group">
              	<div class="col-lg-3 col-sm-12">                         
                   <label for="paper_title_en" class="col-sm-12 control-label">Paper  Title (In English)</label>
                   <input type="text" name="paper_title_en" class="form-control" id="paper_title_en" placeholder="" required="required" value=""  >
                </div>
				<div class="col-lg-3 col-sm-12">                         
                   <label for="paper_title_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;" >عنوان پرچہ (اردو میں) </label>
                   <input type="text" name="paper_title_ur" class="form-control" id="paper_title_ur" placeholder="" required="required" value="" lang="ar" dir="rtl" >
                </div>
				<div class="col-lg-3 col-sm-12">                         
                    <label for="paper_date" class="col-sm-12 control-label">Creation Date *</label>
                    <input type="datetime" name="paper_date" class="form-control" id="paper_date" placeholder="" required="required" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly >
                </div>
				<div class="col-lg-3 col-sm-12">                         
                    <label for="paper_number" class="col-sm-12 control-label">Paper Number</label>
                    <input type="text" name="paper_number" class="form-control" id="paper_number" placeholder="" required="required"  value="01" readonly >
                </div>
             </div>
		
        
			
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------Start Block-1------------------------------------------------------------>             
            

        <div class="content" id="paper_selection_block" style="visibility: hidden; display: none;">
            <h1>Select Questions for Paper</h1>

            <script>
                $(function ()
                {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft"
                    });
                });
            </script>
            <div id="wizard">
                <h2>Q</h2>
                <section>
                      <p>
<p><strong>Select Question # 1  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 1</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b1i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b1" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 1</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b1i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b1" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 1</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b1i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b1" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 1</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b1i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b1" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                    <p>
<p><strong>Select Question # 2  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 2</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b2i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b2" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 2</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b2i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b2" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 2</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b2i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b2" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 2</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b2i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b2" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                      <p>
<p><strong>Select Question # 3  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 3</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b3i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b3" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 3</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b3i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b3" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 3</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b3i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b3" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 3</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b3i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b3" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                    <p>
<p><strong>Select Question # 4  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 4</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b4i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b4" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 4</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b4i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b4" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 4</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b4i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b4" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 4</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b4i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b4" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
		
		
                <section>
                      <p>
<p><strong>Select Question # 5  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 5</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b5i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b5" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 5</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b5i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b5" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 5</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b5i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b5" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 5</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b5i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b5" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                    <p>
<p><strong>Select Question # 6  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 6</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b6i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b6" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 6</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b6i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b6" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 6</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b6i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b6" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 6</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b6i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b6" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                      <p>
<p><strong>Select Question # 7  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 7</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b7i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b7" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 7</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b7i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b7" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 7</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b7i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b7" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 7</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b7i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b7" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                    <p>
<p><strong>Select Question # 8  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 8</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b8i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b8" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 8</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b8i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b8" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 8</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b8i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b8" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 8</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b8i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b8" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                      <p>
<p><strong>Select Question # 9  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 9</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b9i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b9" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 9</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b9i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b9" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 9</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b9i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b9" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 9</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b9i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b9" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                    <p>
<p><strong>Select Question # 10  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 10</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b10i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b10" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 10</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b10i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b10" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 10</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b10i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b10" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 10</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b10i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b10" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                      <p>
<p><strong>Select Question # 11  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 11</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b11i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b11" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 11</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b11i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b11" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 11</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b11i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b11" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 11</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b11i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b11" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                    <p>
<p><strong>Select Question # 12  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 12</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b12i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b12" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 12</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b12i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b12" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 12</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b12i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b12" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 12</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b12i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b12" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                      <p>
<p><strong>Select Question # 13  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 13</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b13i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b13" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 13</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b13i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b13" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 13</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b13i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b13" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 13</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b13i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b13" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                    <p>
<p><strong>Select Question # 14  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 14</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b14i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b14" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 14</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b14i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b14" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 14</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b14i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b14" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 14</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b14i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b14" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                      <p>
<p><strong>Select Question # 15  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 15</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b15i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b15" style="margin:auto;" value=""  checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 15</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b15i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b15" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 15</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b15i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b15" style="margin:auto;" value=""></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 15</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b15i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b15" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>
                <section>
                    <p>
<p><strong>Select Question # 16  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 16</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b16i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b16" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 16</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b16i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b16" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 16</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b16i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b16" style="margin:auto;" value=""></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 16</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b16i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b16" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 17  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 17</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b17i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b17" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 17</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b17i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b17" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 17</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b17i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b17" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 17</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b17i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b17" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 18  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 18</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b18i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b18" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 18</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b18i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b18" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 18</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b18i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b18" style="margin:auto;" value=""  ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 18</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b18i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b18" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 19  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 19</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b19i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b19" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 19</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b19i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b19" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 19</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b19i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b19" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 19</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b19i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b19" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 20  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 20</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b20i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b20" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 20</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b20i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b20" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 20</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b20i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b20" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 20</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b20i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b20" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 21  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 21</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b21i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b21" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 21</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b21i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b21" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 21</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b21i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b21" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 21</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b21i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b21" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 22  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 22</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b22i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b22" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 22</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b22i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b22" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 22</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b22i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b22" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 22</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b22i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b22" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 23  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 23</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b23i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b23" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 23</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b23i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b23" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 23</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b23i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b23" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 23</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b23i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b23" style="margin:auto;" value=""  ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 24  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 24</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b24i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b24" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 24</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b24i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b24" style="margin:auto;" value="" ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 24</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b24i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b24" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 24</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b24i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b24" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>
                <h2>Q</h2>

                <section>
                    <p>
<p><strong>Select Question # 25  from Following Questions for final Paper</strong></p>					
<table width="100%" border="1" cellspacing="1" cellpadding="1">
	<thead>
		 <tr>
			<th style="text-align: center; vertical-align: middle;" >Question No</th>
			 <th style="text-align: center; vertical-align: middle;">Question Stem</th>
			 <th style="text-align: center; vertical-align: middle;">Choose One </th>
		</tr>
	</thead>
  <tbody>  
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 25</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b25i1_area" >	
		  <!-- qustion 1 item 1 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b25" style="margin:auto;" value="" checked ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 25</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b25i2_area" >	
		  <!-- qustion 1 item 2 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b25" style="margin:auto;" value=""  ></td>
    </tr>
	   <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 25</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b25i3_area" >	
		  <!-- qustion 1 item 3 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b25" style="margin:auto;" value="" ></td>
    </tr>
	  <tr>
      <td style="text-align: center; vertical-align: middle;">Question # 25</td>
      <td>  <div class="row col-lg-12" style="padding-top:02px;" id="question_b25i4_area" >	
		  <!-- qustion 1 item 4 here -->
       </div></td>
      <td style="text-align: center; vertical-align: middle;"><input type="radio" name="paper_item_b25" style="margin:auto;" value="" ></td>
    </tr>
  </tbody>
</table>
					
					</p>
                </section>



       

			</div>
        </div>

			<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-1------------------------------------------------------------> 
		  </div>
		</div>	  
   		  
<script language="javascript" type="text/javascript">  
	$('#paper_grade_id').on('change', function() {
      $.post('<?=base_url("school/paper/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr.length);     
	  if(arr.length==0){
		  $('#message_bar').html('<br /><div class="alert alert-danger"><strong>Sorry!</strong> No Paper Generation is available for this Subject.</div>');
	  }
	  else{
			   $('#message_bar').html('<br /><div class="alert alert-success"><strong>Success!</strong> Now Select Subject for Paper Generation.</div>');
		  }
      $('#paper_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#paper_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en+' - '+value.subject_name_ur)
                  ); 
        });   
    });	
	
});
	$('#paper_subject_id').on('change', function() {
   /////////////////// auto generate code script //////////////////////
		var selected_subject_id = this.value;
	if(selected_subject_id!=""){
		$.post('<?=base_url("school/paper/get_itemcode_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr[0]['maxitems']);
	 var maxnum = "0" + arr[0]['maxitems'];
     maxnum = maxnum.substr(maxnum.length-2);
	
	var schoolid = <?= $this->session->userdata('school_id') ?>;
	 var fullschoolid = "0000" + schoolid;
     fullschoolid = fullschoolid.substr(fullschoolid.length-5);
	
	 switch(arr[0]['grade'])
		{
			case "1":
				$('#paper_number').val(arr[0]['subject_code']+'-I-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "2":
				$('#paper_number').val(arr[0]['subject_code']+'-II-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "3":
				$('#paper_number').val(arr[0]['subject_code']+'-III-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "4":
				$('#paper_number').val(arr[0]['subject_code']+'-IV-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "5":
				$('#paper_number').val(arr[0]['subject_code']+'-V-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "6":
				$('#paper_number').val(arr[0]['subject_code']+'-VI-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "7":
				$('#paper_number').val(arr[0]['subject_code']+'-VII-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			case "8":
				$('#paper_number').val(arr[0]['subject_code']+'-VIII-M'+new Date().getFullYear().toString().substr(-2)+'-'+fullschoolid+'-'+maxnum);       
			break;
			
		}
     
    });		
	
	///////////////////// get all items from itembank selected added or not ///////////////////
	$.post('<?=base_url("school/paper/get_itemsbank_for_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);	
     	if(arr.length>0){
			
			/////////////////////////////
	$.post('<?=base_url("school/paper/get_items_by_subject_id")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arrdata = $.parseJSON(data);     
      //console.log('result_all_items_=',arr);
		
	
		$('#paper_selection_block').css('visibility','visible');
			$('#paper_selection_block').css('display','block');
			//////////////////// coding for display questions/items from itembank //////////////////////
		var question_b1i1_html = "";
		var question_b1i2_html = "";
		var question_b1i3_html = "";
		var question_b1i4_html = "";

		var question_b2i1_html = "";
		var question_b2i2_html = "";
		var question_b2i3_html = "";
		var question_b2i4_html = "";

		var question_b3i1_html = "";
		var question_b3i2_html = "";
		var question_b3i3_html = "";
		var question_b3i4_html = "";

		var question_b4i1_html = "";
		var question_b4i2_html = "";
		var question_b4i3_html = "";
		var question_b4i4_html = "";
		
		
		if(arrdata[0]['item_option_layout_b1i1']==2){
				question_b1i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b1i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b1i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b1i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b1i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b1i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b1i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b1i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b1i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b1i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b1i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b1i2']==2){
				question_b1i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b1i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b1i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b1i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b1i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b1i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b1i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b1i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b1i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b1i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b1i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b1i3']==2){
				question_b1i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b1i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b1i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b1i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b1i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b1i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b1i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b1i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b1i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b1i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b1i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b1i4']==2){
				question_b1i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b1i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b1i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b1i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b1i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b1i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b1i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b1i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b1i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b1i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b1i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b2i1']==2){
				question_b2i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b2i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b2i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b2i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b2i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b2i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b2i1']+' </span></td>\
 				  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b2i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b2i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b2i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b2i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b2i2']==2){
				question_b2i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b2i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b2i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b2i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b2i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b2i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b2i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b2i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b2i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b2i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b2i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b2i3']==2){
				question_b2i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b2i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b2i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b2i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b2i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b2i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b2i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b2i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b2i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b2i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b2i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b2i4']==2){
				question_b2i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b2i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b2i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b2i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b2i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b2i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b2i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b2i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b2i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b2i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b2i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		if(arrdata[0]['item_option_layout_b3i1']==2){
				question_b3i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b3i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b3i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b3i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b3i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b3i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b3i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b3i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b3i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b3i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b3i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b3i2']==2){
				question_b3i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b3i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b3i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b3i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b3i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b3i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b3i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b3i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b3i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b3i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b3i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b3i3']==2){
				question_b3i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b3i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b3i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b3i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b3i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b3i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b3i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b3i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b3i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b3i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b3i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b3i4']==2){
				question_b3i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b3i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b3i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b3i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b3i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b3i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b3i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b3i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b3i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b3i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b3i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b4i1']==3){
				question_b4i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b4i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b4i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b4i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b4i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b4i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b4i1']+' </span></td>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b4i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b4i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b4i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b4i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b4i2']==2){
				question_b4i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b4i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b4i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b4i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b4i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b4i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b4i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b4i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b4i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b4i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b4i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b4i3']==2){
				question_b4i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b4i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b4i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b4i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b4i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b4i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b4i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b4i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b4i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b4i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b4i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b4i4']==2){
				question_b4i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b4i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b4i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b4i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b4i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b4i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b4i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b4i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b4i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b4i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b4i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		
		$('#question_b1i1_area').html(question_b1i1_html); $('#b1i1').val(arrdata[0]['item_id_b1i1']);
		$('#question_b1i2_area').html(question_b1i2_html); $('#b1i2').val(arrdata[0]['item_id_b1i2']);
		$('#question_b1i3_area').html(question_b1i3_html); $('#b1i3').val(arrdata[0]['item_id_b1i3']);
		$('#question_b1i4_area').html(question_b1i4_html); $('#b1i4').val(arrdata[0]['item_id_b1i4']);

		$('#question_b2i1_area').html(question_b2i1_html); $('#b2i1').val(arrdata[0]['item_id_b2i1']);
		$('#question_b2i2_area').html(question_b2i2_html); $('#b2i2').val(arrdata[0]['item_id_b2i2']);
		$('#question_b2i3_area').html(question_b2i3_html); $('#b2i3').val(arrdata[0]['item_id_b2i3']);
		$('#question_b2i4_area').html(question_b2i4_html); $('#b2i4').val(arrdata[0]['item_id_b2i4']);

		$('#question_b3i1_area').html(question_b3i1_html); $('#b3i1').val(arrdata[0]['item_id_b3i1']);
		$('#question_b3i2_area').html(question_b3i2_html); $('#b3i2').val(arrdata[0]['item_id_b3i2']);
		$('#question_b3i3_area').html(question_b3i3_html); $('#b3i3').val(arrdata[0]['item_id_b3i3']);
		$('#question_b3i4_area').html(question_b3i4_html); $('#b3i4').val(arrdata[0]['item_id_b3i4']);

		$('#question_b4i1_area').html(question_b4i1_html); $('#b4i1').val(arrdata[0]['item_id_b4i1']);
		$('#question_b4i2_area').html(question_b4i2_html); $('#b4i2').val(arrdata[0]['item_id_b4i2']);
		$('#question_b4i3_area').html(question_b4i3_html); $('#b4i3').val(arrdata[0]['item_id_b4i3']);
		$('#question_b4i4_area').html(question_b4i4_html); $('#b4i4').val(arrdata[0]['item_id_b4i4']);
		
    });		
	
			//////////////////////////////
	
			/////////////////////////////
	$.post('<?=base_url("school/paper/get_items_by_subject_id2")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arrdata2 = $.parseJSON(data);     
      //console.log('result_all_items_=',arr);
		
	//if(typeof MathJax !== 'undefined') {MathJax.Hub.Queue(["Typeset",MathJax.Hub]);}
		//MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
		$('#paper_selection_block').css('visibility','visible');
			$('#paper_selection_block').css('display','block');
			//////////////////// coding for display questions/items from itembank //////////////////////
		var question_b5i1_html = "";
		var question_b5i2_html = "";
		var question_b5i3_html = "";
		var question_b5i4_html = "";

		var question_b6i1_html = "";
		var question_b6i2_html = "";
		var question_b6i3_html = "";
		var question_b6i4_html = "";

		var question_b7i1_html = "";
		var question_b7i2_html = "";
		var question_b7i3_html = "";
		var question_b7i4_html = "";

		var question_b8i1_html = "";
		var question_b8i2_html = "";
		var question_b8i3_html = "";
		var question_b8i4_html = "";
		
		
		if(arrdata2[0]['item_option_layout_b5i1']==2){
				question_b5i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b5i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b5i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b5i1']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b5i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b5i1']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b5i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b5i1']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b5i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b5i1']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b5i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b5i2']==2){
				question_b5i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b5i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b5i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b5i2']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b5i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b5i2']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b5i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b5i2']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b5i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b5i2']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b5i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b5i3']==2){
				question_b5i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b5i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b5i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b5i3']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b5i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b5i3']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b5i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b5i3']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b5i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b5i3']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b5i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b5i4']==2){
				question_b5i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b5i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b5i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b5i4']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b5i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b5i4']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b5i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b5i4']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b5i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b5i4']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b5i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata2[0]['item_option_layout_b6i1']==2){
				question_b6i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b6i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b6i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b6i1']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b6i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b6i1']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b6i1']+' </span></td>\
 				  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b6i1']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b6i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b6i1']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b6i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b6i2']==2){
				question_b6i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b6i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b6i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b6i2']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b6i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b6i2']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b6i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b6i2']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b6i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b6i2']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b6i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b6i3']==2){
				question_b6i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b6i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b6i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b6i3']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b6i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b6i3']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b6i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b6i3']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b6i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b6i3']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b6i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b6i4']==3){
				question_b6i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b6i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b6i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b6i4']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b6i4']+'</span>\</td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b6i4']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b6i4']+'</span>\</td>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b6i4']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b6i4']+'</span>\</td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b6i4']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b6i4']+'</span>\</td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';						
			}

		if(arrdata2[0]['item_option_layout_b7i1']==3){
				question_b7i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b7i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b7i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b7i1']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b7i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b7i1']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b7i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b7i1']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b7i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b7i1']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b7i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b7i2']==2){
				question_b7i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b7i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b7i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b7i2']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b7i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b7i2']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b7i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b7i2']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b7i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b7i2']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b7i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b7i3']==2){
				question_b7i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b7i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b7i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b7i3']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b7i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b7i3']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b7i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b7i3']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b7i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b7i3']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b7i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b7i4']==2){
				question_b7i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b7i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b7i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b7i4']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b7i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b7i4']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b7i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b7i4']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b7i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b7i4']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b7i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata2[0]['item_option_layout_b8i1']==2){
				question_b8i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b8i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b8i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b8i1']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b8i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b8i1']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b8i1']+' </span></td>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b8i1']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b8i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b8i1']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b8i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b8i2']==2){
				question_b8i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b8i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b8i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b8i2']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b8i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b8i2']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b8i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b8i2']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b8i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b8i2']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b8i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b8i3']==1){
				question_b8i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b8i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b8i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b8i3']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b8i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b8i3']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b8i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b8i3']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b8i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b8i3']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b8i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata2[0]['item_option_layout_b8i4']==2){
				question_b8i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata2[0]['item_stem_en_b8i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata2[0]['item_stem_ur_b8i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata2[0]['item_option_a_en_b8i4']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_a_ur_b8i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata2[0]['item_option_b_en_b8i4']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_b_ur_b8i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata2[0]['item_option_c_en_b8i4']+'&nbsp; <span class="urdufont-right">'+arrdata2[0]['item_option_c_ur_b8i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata2[0]['item_option_d_en_b8i4']+'&nbsp; <span class="urdufont-right"> '+arrdata2[0]['item_option_d_ur_b8i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		
		$('#question_b5i1_area').html(question_b5i1_html); $('#b5i1').val(arrdata2[0]['item_id_b5i1']);
		$('#question_b5i2_area').html(question_b5i2_html); $('#b5i2').val(arrdata2[0]['item_id_b5i2']);
		$('#question_b5i3_area').html(question_b5i3_html); $('#b5i3').val(arrdata2[0]['item_id_b5i3']);
		$('#question_b5i4_area').html(question_b5i4_html); $('#b5i4').val(arrdata2[0]['item_id_b5i4']);

		$('#question_b6i1_area').html(question_b6i1_html); $('#b6i1').val(arrdata2[0]['item_id_b6i1']);
		$('#question_b6i2_area').html(question_b6i2_html); $('#b6i2').val(arrdata2[0]['item_id_b6i2']);
		$('#question_b6i3_area').html(question_b6i3_html); $('#b6i3').val(arrdata2[0]['item_id_b6i3']);
		$('#question_b6i4_area').html(question_b6i4_html); $('#b6i4').val(arrdata2[0]['item_id_b6i4']);

		$('#question_b7i1_area').html(question_b7i1_html); $('#b7i1').val(arrdata2[0]['item_id_b7i1']);
		$('#question_b7i2_area').html(question_b7i2_html); $('#b7i2').val(arrdata2[0]['item_id_b7i2']);
		$('#question_b7i3_area').html(question_b7i3_html); $('#b7i3').val(arrdata2[0]['item_id_b7i3']);
		$('#question_b7i4_area').html(question_b7i4_html); $('#b7i4').val(arrdata2[0]['item_id_b7i4']);

		$('#question_b8i1_area').html(question_b8i1_html); $('#b8i1').val(arrdata2[0]['item_id_b8i1']);
		$('#question_b8i2_area').html(question_b8i2_html); $('#b8i2').val(arrdata2[0]['item_id_b8i2']);
		$('#question_b8i3_area').html(question_b8i3_html); $('#b8i3').val(arrdata2[0]['item_id_b8i3']);
		$('#question_b8i4_area').html(question_b8i4_html); $('#b8i4').val(arrdata2[0]['item_id_b8i4']);
		
    });		
	
			//////////////////////////////
		
			/////////////////////////////
	$.post('<?=base_url("school/paper/get_items_by_subject_id3")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arrdata = $.parseJSON(data);     
      //console.log('result_all_items_=',arr);
		
	
		$('#paper_selection_block').css('visibility','visible');
			$('#paper_selection_block').css('display','block');
			//////////////////// coding for display questions/items from itembank //////////////////////
		var question_b9i1_html = "";
		var question_b9i2_html = "";
		var question_b9i3_html = "";
		var question_b9i4_html = "";

		var question_b10i1_html = "";
		var question_b10i2_html = "";
		var question_b10i3_html = "";
		var question_b10i4_html = "";

		var question_b11i1_html = "";
		var question_b11i2_html = "";
		var question_b11i3_html = "";
		var question_b11i4_html = "";

		var question_b12i1_html = "";
		var question_b12i2_html = "";
		var question_b12i3_html = "";
		var question_b12i4_html = "";
		
		
		if(arrdata[0]['item_option_layout_b9i1']==2){
				question_b9i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b9i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b9i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b9i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b9i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b9i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b9i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b9i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b9i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b9i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b9i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b9i2']==2){
				question_b9i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b9i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b9i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b9i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b9i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b9i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b9i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b9i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b9i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b9i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b9i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b9i3']==2){
				question_b9i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b9i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b9i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b9i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b9i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b9i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b9i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b9i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b9i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b9i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b9i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b9i4']==2){
				question_b9i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b9i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b9i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b9i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b9i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b9i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b9i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b9i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b9i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b9i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b9i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b10i1']==2){
				question_b10i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b10i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b10i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b10i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b10i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b10i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b10i1']+' </span></td>\
 				  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b10i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b10i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b10i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b10i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b10i2']==2){
				question_b10i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b10i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b10i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b10i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b10i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b10i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b10i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b10i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b10i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b10i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b10i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b10i3']==10){
				question_b10i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b10i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b10i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b10i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b10i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b10i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b10i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b10i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b10i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b10i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b10i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b10i4']==2){
				question_b10i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b10i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b10i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b10i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b10i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b10i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b10i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b10i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b10i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b10i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b10i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		if(arrdata[0]['item_option_layout_b11i1']==2){
				question_b11i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b11i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b11i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b11i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b11i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b11i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b11i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b11i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b11i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b11i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b11i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b11i2']==1){
				question_b11i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b11i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b11i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b11i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b11i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b11i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b11i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b11i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b11i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b11i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b11i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b11i3']==2){
				question_b11i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b11i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b11i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b11i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b11i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b11i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b11i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b11i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b11i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b11i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b11i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b11i4']==2){
				question_b11i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b11i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b11i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b11i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b11i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b11i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b11i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b11i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b11i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b11i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b11i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b12i1']==2){
				question_b12i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b12i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b12i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b12i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b12i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b12i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b12i1']+' </span></td>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b12i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b12i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b12i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b12i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b12i2']==2){
				question_b12i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b12i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b12i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b12i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b12i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b12i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b12i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b12i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b12i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b12i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b12i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b12i3']==1){
				question_b12i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b12i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b12i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b12i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b12i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b12i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b12i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b12i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b12i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b12i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b12i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b12i4']==2){
				question_b12i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b12i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b12i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b12i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b12i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b12i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b12i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b12i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b12i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b12i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b12i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		
		$('#question_b9i1_area').html(question_b9i1_html); $('#b9i1').val(arrdata[0]['item_id_b9i1']);
		$('#question_b9i2_area').html(question_b9i2_html); $('#b9i2').val(arrdata[0]['item_id_b9i2']);
		$('#question_b9i3_area').html(question_b9i3_html); $('#b9i3').val(arrdata[0]['item_id_b9i3']);
		$('#question_b9i4_area').html(question_b9i4_html); $('#b9i4').val(arrdata[0]['item_id_b9i4']);

		$('#question_b10i1_area').html(question_b10i1_html); $('#b10i1').val(arrdata[0]['item_id_b10i1']);
		$('#question_b10i2_area').html(question_b10i2_html); $('#b10i2').val(arrdata[0]['item_id_b10i2']);
		$('#question_b10i3_area').html(question_b10i3_html); $('#b10i3').val(arrdata[0]['item_id_b10i3']);
		$('#question_b10i4_area').html(question_b10i4_html); $('#b10i4').val(arrdata[0]['item_id_b10i4']);

		$('#question_b11i1_area').html(question_b11i1_html); $('#b11i1').val(arrdata[0]['item_id_b11i1']);
		$('#question_b11i2_area').html(question_b11i2_html); $('#b11i2').val(arrdata[0]['item_id_b11i2']);
		$('#question_b11i3_area').html(question_b11i3_html); $('#b11i3').val(arrdata[0]['item_id_b11i3']);
		$('#question_b11i4_area').html(question_b11i4_html); $('#b11i4').val(arrdata[0]['item_id_b11i4']);

		$('#question_b12i1_area').html(question_b12i1_html); $('#b12i1').val(arrdata[0]['item_id_b12i1']);
		$('#question_b12i2_area').html(question_b12i2_html); $('#b12i2').val(arrdata[0]['item_id_b12i2']);
		$('#question_b12i3_area').html(question_b12i3_html); $('#b12i3').val(arrdata[0]['item_id_b12i3']);
		$('#question_b12i4_area').html(question_b12i4_html); $('#b12i4').val(arrdata[0]['item_id_b12i4']);
		
    });		
	
			//////////////////////////////
			/////////////////////////////
	$.post('<?=base_url("school/paper/get_items_by_subject_id4")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arrdata = $.parseJSON(data);     
      //console.log('result_all_items_=',arr);
		
	
		$('#paper_selection_block').css('visibility','visible');
			$('#paper_selection_block').css('display','block');
			//////////////////// coding for display questions/items from itembank //////////////////////
		var question_b13i1_html = "";
		var question_b13i2_html = "";
		var question_b13i3_html = "";
		var question_b13i4_html = "";

		var question_b14i1_html = "";
		var question_b14i2_html = "";
		var question_b14i3_html = "";
		var question_b14i4_html = "";

		var question_b15i1_html = "";
		var question_b15i2_html = "";
		var question_b15i3_html = "";
		var question_b15i4_html = "";

		var question_b16i1_html = "";
		var question_b16i2_html = "";
		var question_b16i3_html = "";
		var question_b16i4_html = "";
		
		
		if(arrdata[0]['item_option_layout_b13i1']==2){
				question_b13i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b13i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b13i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b13i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b13i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b13i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b13i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b13i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b13i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b13i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b13i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b13i2']==2){
				question_b13i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b13i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b13i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b13i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b13i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b13i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b13i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b13i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b13i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b13i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b13i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b13i3']==2){
				question_b13i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b13i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b13i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b13i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b13i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b13i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b13i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b13i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b13i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b13i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b13i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b13i4']==2){
				question_b13i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b13i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b13i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b13i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b13i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b13i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b13i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b13i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b13i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b13i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b13i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b14i1']==2){
				question_b14i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b14i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b14i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b14i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b14i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b14i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b14i1']+' </span></td>\
 				  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b14i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b14i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b14i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b14i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b14i2']==2){
				question_b14i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b14i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b14i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b14i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b14i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b14i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b14i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b14i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b14i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b14i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b14i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b14i3']==2){
				question_b14i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b14i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b14i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b14i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b14i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b14i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b14i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b14i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b14i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b14i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b14i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b14i4']==2){
				question_b14i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b14i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b14i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b14i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b14i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b14i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b14i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b14i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b14i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b14i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b14i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		if(arrdata[0]['item_option_layout_b15i1']==2){
				question_b15i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b15i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b15i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b15i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b15i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b15i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b15i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b15i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b15i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b15i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b15i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b15i2']==2){
				question_b15i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b15i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b15i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b15i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b15i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b15i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b15i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b15i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b15i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b15i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b15i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b15i3']==3){
				question_b15i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b15i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b15i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b15i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b15i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b15i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b15i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b15i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b15i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b15i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b15i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b15i4']==2){
				question_b15i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b15i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b15i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b15i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b15i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b15i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b15i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b15i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b15i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b15i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b15i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b16i1']==1){
				question_b16i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b16i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b16i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b16i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b16i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b16i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b16i1']+' </span></td>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b16i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b16i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b16i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b16i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b16i2']==2){
				question_b16i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b16i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b16i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b16i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b16i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b16i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b16i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b16i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b16i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b16i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b16i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b16i3']==2){
				question_b16i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b16i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b16i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b16i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b16i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b16i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b16i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b16i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b16i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b16i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b16i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b16i4']==2){
				question_b16i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b16i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b16i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b16i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b16i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b16i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b16i4']+' </span></td>\
                  </tr>\
				<tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b16i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b16i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b16i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b16i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		
		$('#question_b13i1_area').html(question_b13i1_html); $('#b13i1').val(arrdata[0]['item_id_b13i1']);
		$('#question_b13i2_area').html(question_b13i2_html); $('#b13i2').val(arrdata[0]['item_id_b13i2']);
		$('#question_b13i3_area').html(question_b13i3_html); $('#b13i3').val(arrdata[0]['item_id_b13i3']);
		$('#question_b13i4_area').html(question_b13i4_html); $('#b13i4').val(arrdata[0]['item_id_b13i4']);

		$('#question_b14i1_area').html(question_b14i1_html); $('#b14i1').val(arrdata[0]['item_id_b14i1']);
		$('#question_b14i2_area').html(question_b14i2_html); $('#b14i2').val(arrdata[0]['item_id_b14i2']);
		$('#question_b14i3_area').html(question_b14i3_html); $('#b14i3').val(arrdata[0]['item_id_b14i3']);
		$('#question_b14i4_area').html(question_b14i4_html); $('#b14i4').val(arrdata[0]['item_id_b14i4']);

		$('#question_b15i1_area').html(question_b15i1_html); $('#b15i1').val(arrdata[0]['item_id_b15i1']);
		$('#question_b15i2_area').html(question_b15i2_html); $('#b15i2').val(arrdata[0]['item_id_b15i2']);
		$('#question_b15i3_area').html(question_b15i3_html); $('#b15i3').val(arrdata[0]['item_id_b15i3']);
		$('#question_b15i4_area').html(question_b15i4_html); $('#b15i4').val(arrdata[0]['item_id_b15i4']);

		$('#question_b16i1_area').html(question_b16i1_html); $('#b16i1').val(arrdata[0]['item_id_b16i1']);
		$('#question_b16i2_area').html(question_b16i2_html); $('#b16i2').val(arrdata[0]['item_id_b16i2']);
		$('#question_b16i3_area').html(question_b16i3_html); $('#b16i3').val(arrdata[0]['item_id_b16i3']);
		$('#question_b16i4_area').html(question_b16i4_html); $('#b16i4').val(arrdata[0]['item_id_b16i4']);
		
    });		
	
			//////////////////////////////
/////////////////////////////
	$.post('<?=base_url("school/paper/get_items_by_subject_id5")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arrdata = $.parseJSON(data);     
      //console.log('result_all_items_=',arr);
		
	
		$('#paper_selection_block').css('visibility','visible');
			$('#paper_selection_block').css('display','block');
			//////////////////// coding for display questions/items from itembank //////////////////////
		var question_b17i1_html = "";
		var question_b17i2_html = "";
		var question_b17i3_html = "";
		var question_b17i4_html = "";

		var question_b18i1_html = "";
		var question_b18i2_html = "";
		var question_b18i3_html = "";
		var question_b18i4_html = "";

		var question_b19i1_html = "";
		var question_b19i2_html = "";
		var question_b19i3_html = "";
		var question_b19i4_html = "";

		var question_b20i1_html = "";
		var question_b20i2_html = "";
		var question_b20i3_html = "";
		var question_b20i4_html = "";
		
		
		if(arrdata[0]['item_option_layout_b17i1']==2){
				question_b17i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b17i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b17i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b17i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b17i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b17i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b17i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b17i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b17i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b17i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b17i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b17i2']==2){
				question_b17i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b17i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b17i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b17i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b17i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b17i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b17i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b17i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b17i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b17i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b17i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b17i3']==2){
				question_b17i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b17i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b17i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b17i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b17i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b17i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b17i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b17i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b17i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b17i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b17i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b17i4']==2){
				question_b17i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b17i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b17i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b17i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b17i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b17i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b17i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b17i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b17i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b17i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b17i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b18i1']==2){
				question_b18i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b18i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b18i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b18i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b18i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b18i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b18i1']+' </span></td>\
 				  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b18i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b18i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b18i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b18i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b18i2']==2){
				question_b18i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b18i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b18i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b18i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b18i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b18i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b18i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b18i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b18i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b18i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b18i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b18i3']==2){
				question_b18i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b18i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b18i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b18i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b18i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b18i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b18i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b18i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b18i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b18i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b18i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b18i4']==2){
				question_b18i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b18i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b18i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b18i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b18i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b18i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b18i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b18i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b18i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b18i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b18i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		if(arrdata[0]['item_option_layout_b19i1']==2){
				question_b19i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b19i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b19i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b19i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b19i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b19i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b19i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b19i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b19i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b19i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b19i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b19i2']==2){
				question_b19i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b19i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b19i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b19i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b19i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b19i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b19i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b19i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b19i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b19i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b19i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b19i3']==2){
				question_b19i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b19i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b19i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b19i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b19i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b19i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b19i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b19i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b19i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b19i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b19i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b19i4']==2){
				question_b19i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b19i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b19i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b19i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b19i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b19i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b19i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b19i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b19i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b19i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b19i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b20i1']==1){
				question_b20i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b20i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b20i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b20i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b20i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b20i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b20i1']+' </span></td>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b20i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b20i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b20i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b20i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b20i2']==2){
				question_b20i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b20i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b20i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b20i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b20i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b20i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b20i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b20i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b20i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b20i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b20i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b20i3']==2){
				question_b20i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b20i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b20i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b20i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b20i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b20i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b20i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b20i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b20i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b20i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b20i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b20i4']==2){
				question_b20i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b20i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b20i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b20i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b20i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b20i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b20i4']+' </span></td>\
                  </tr>\
				<tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b20i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b20i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b20i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b20i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		
		$('#question_b17i1_area').html(question_b17i1_html); $('#b17i1').val(arrdata[0]['item_id_b17i1']);
		$('#question_b17i2_area').html(question_b17i2_html); $('#b17i2').val(arrdata[0]['item_id_b17i2']);
		$('#question_b17i3_area').html(question_b17i3_html); $('#b17i3').val(arrdata[0]['item_id_b17i3']);
		$('#question_b17i4_area').html(question_b17i4_html); $('#b17i4').val(arrdata[0]['item_id_b17i4']);

		$('#question_b18i1_area').html(question_b18i1_html); $('#b18i1').val(arrdata[0]['item_id_b18i1']);
		$('#question_b18i2_area').html(question_b18i2_html); $('#b18i2').val(arrdata[0]['item_id_b18i2']);
		$('#question_b18i3_area').html(question_b18i3_html); $('#b18i3').val(arrdata[0]['item_id_b18i3']);
		$('#question_b18i4_area').html(question_b18i4_html); $('#b18i4').val(arrdata[0]['item_id_b18i4']);

		$('#question_b19i1_area').html(question_b19i1_html); $('#b19i1').val(arrdata[0]['item_id_b19i1']);
		$('#question_b19i2_area').html(question_b19i2_html); $('#b19i2').val(arrdata[0]['item_id_b19i2']);
		$('#question_b19i3_area').html(question_b19i3_html); $('#b19i3').val(arrdata[0]['item_id_b19i3']);
		$('#question_b19i4_area').html(question_b19i4_html); $('#b19i4').val(arrdata[0]['item_id_b19i4']);

		$('#question_b20i1_area').html(question_b20i1_html); $('#b20i1').val(arrdata[0]['item_id_b20i1']);
		$('#question_b20i2_area').html(question_b20i2_html); $('#b20i2').val(arrdata[0]['item_id_b20i2']);
		$('#question_b20i3_area').html(question_b20i3_html); $('#b20i3').val(arrdata[0]['item_id_b20i3']);
		$('#question_b20i4_area').html(question_b20i4_html); $('#b20i4').val(arrdata[0]['item_id_b20i4']);
		
    });		
	
			//////////////////////////////			
/////////////////////////////
	$.post('<?=base_url("school/paper/get_items_by_subject_id6")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : selected_subject_id
    },
    function(data){
      arrdata = $.parseJSON(data);     
      //console.log('result_all_items_=',arr);
		
	
		$('#paper_selection_block').css('visibility','visible');
			$('#paper_selection_block').css('display','block');
			//////////////////// coding for display questions/items from itembank //////////////////////
		var question_b21i1_html = "";
		var question_b21i2_html = "";
		var question_b21i3_html = "";
		var question_b21i4_html = "";

		var question_b22i1_html = "";
		var question_b22i2_html = "";
		var question_b22i3_html = "";
		var question_b22i4_html = "";

		var question_b23i1_html = "";
		var question_b23i2_html = "";
		var question_b23i3_html = "";
		var question_b23i4_html = "";

		var question_b24i1_html = "";
		var question_b24i2_html = "";
		var question_b24i3_html = "";
		var question_b24i4_html = "";
		
		var question_b25i1_html = "";
		var question_b25i2_html = "";
		var question_b25i3_html = "";
		var question_b25i4_html = "";
		
		
		if(arrdata[0]['item_option_layout_b21i1']==2){
				question_b21i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b21i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b21i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b21i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b21i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b21i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b21i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b21i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b21i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b21i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b21i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b21i2']==1){
				question_b21i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b21i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b21i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b21i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b21i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b21i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b21i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b21i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b21i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b21i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b21i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b21i3']==2){
				question_b21i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b21i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b21i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b21i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b21i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b21i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b21i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b21i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b21i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b21i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b21i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b21i4']==2){
				question_b21i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b21i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b21i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b21i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b21i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b21i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b21i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b21i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b21i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b21i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b21i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b22i1']==2){
				question_b22i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b22i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b22i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b22i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b22i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b22i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b22i1']+' </span></td>\
 				  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b22i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b22i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b22i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b22i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b22i2']==2){
				question_b22i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b22i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b22i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b22i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b22i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b22i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b22i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b22i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b22i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b22i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b22i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b22i3']==3){
				question_b22i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b22i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b22i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b22i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b22i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b22i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b22i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b22i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b22i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b22i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b22i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b22i4']==2){
				question_b22i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b22i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b22i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b22i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b22i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b22i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b22i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b22i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b22i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b22i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b22i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		if(arrdata[0]['item_option_layout_b23i1']==1){
				question_b23i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b23i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b23i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b23i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b23i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b23i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b23i1']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b23i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b23i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b23i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b23i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b23i2']==2){
				question_b23i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b23i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b23i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b23i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b23i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b23i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b23i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b23i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b23i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b23i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b23i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b23i3']==2){
				question_b23i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b23i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b23i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b23i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b23i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b23i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b23i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b23i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b23i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b23i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b23i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b23i4']==2){
				question_b23i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b23i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b23i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b23i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b23i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b23i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b23i4']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b23i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b23i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b23i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b23i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b24i1']==2){
				question_b24i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b24i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b24i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b24i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b24i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b24i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b24i1']+' </span></td>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b24i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b24i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b24i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b24i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b24i2']==2){
				question_b24i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b24i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b24i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b24i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b24i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b24i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b24i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b24i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b24i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b24i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b24i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b24i3']==1){
				question_b24i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b24i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b24i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b24i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b24i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b24i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b24i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b24i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b24i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b24i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b24i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b24i4']==3){
				question_b24i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b24i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b24i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b24i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b24i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b24i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b24i4']+' </span></td>\
                  </tr>\
				<tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b24i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b24i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b24i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b24i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		
		if(arrdata[0]['item_option_layout_b25i1']==2){
				question_b25i1_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b25i1']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b25i1']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b25i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b25i1']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b25i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b25i1']+' </span></td>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b25i1']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b25i1']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b25i1']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b25i1']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b25i2']==2){
				question_b25i2_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b25i2']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b25i2']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b25i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b25i2']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b25i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b25i2']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b25i2']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b25i2']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b25i2']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b25i2']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b25i3']==2){
				question_b25i3_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b25i3']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b25i3']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b25i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b25i3']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b25i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b25i3']+' </span></td>\
                  </tr>\
                  <tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b25i3']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b25i3']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b25i3']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b25i3']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}
		if(arrdata[0]['item_option_layout_b25i4']==1){
				question_b25i4_html = '<table width="100%" border="0" cellspacing="10" cellpadding="10">\
                  <tbody><tr>\
          		<td colspan="2">'+arrdata[0]['item_stem_en_b25i4']+'\
</td>\
          </tr>\
			<tr>\
            <td style="text-align:right" class="urdufont-right" colspan="2">'+arrdata[0]['item_stem_ur_b25i4']+'</td>\
          </tr>\
                    <tr>\
            <td colspan="2">\
                <table width="100%" border="0" cellspacing="100" cellpadding="0" style="margin-left:20px">\
                  <tbody><tr>\
                    <td>a.&emsp;'+arrdata[0]['item_option_a_en_b25i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_a_ur_b25i4']+'</span></td>\
                    <td>b.&emsp;'+arrdata[0]['item_option_b_en_b25i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_b_ur_b25i4']+' </span></td>\
                  </tr>\
				<tr>\
                    <td>c.&emsp;'+arrdata[0]['item_option_c_en_b25i4']+'&nbsp; <span class="urdufont-right">'+arrdata[0]['item_option_c_ur_b25i4']+'</span></td>\
                    <td>d.&emsp;'+arrdata[0]['item_option_d_en_b25i4']+'&nbsp; <span class="urdufont-right"> '+arrdata[0]['item_option_d_ur_b25i4']+'</span></td>\
                  </tr>\
                </tbody></table>\
           </td>\
           <td>&nbsp;</td>\
          </tr>\
        </tbody></table>';			
			
			}

		
		$('#question_b21i1_area').html(question_b21i1_html); $('#b21i1').val(arrdata[0]['item_id_b21i1']);
		$('#question_b21i2_area').html(question_b21i2_html); $('#b21i2').val(arrdata[0]['item_id_b21i2']);
		$('#question_b21i3_area').html(question_b21i3_html); $('#b21i3').val(arrdata[0]['item_id_b21i3']);
		$('#question_b21i4_area').html(question_b21i4_html); $('#b21i4').val(arrdata[0]['item_id_b21i4']);

		$('#question_b22i1_area').html(question_b22i1_html); $('#b22i1').val(arrdata[0]['item_id_b22i1']);
		$('#question_b22i2_area').html(question_b22i2_html); $('#b22i2').val(arrdata[0]['item_id_b22i2']);
		$('#question_b22i3_area').html(question_b22i3_html); $('#b22i3').val(arrdata[0]['item_id_b22i3']);
		$('#question_b22i4_area').html(question_b22i4_html); $('#b22i4').val(arrdata[0]['item_id_b22i4']);

		$('#question_b23i1_area').html(question_b23i1_html); $('#b23i1').val(arrdata[0]['item_id_b23i1']);
		$('#question_b23i2_area').html(question_b23i2_html); $('#b23i2').val(arrdata[0]['item_id_b23i2']);
		$('#question_b23i3_area').html(question_b23i3_html); $('#b23i3').val(arrdata[0]['item_id_b23i3']);
		$('#question_b23i4_area').html(question_b23i4_html); $('#b23i4').val(arrdata[0]['item_id_b23i4']);

		$('#question_b24i1_area').html(question_b24i1_html); $('#b24i1').val(arrdata[0]['item_id_b24i1']);
		$('#question_b24i2_area').html(question_b24i2_html); $('#b24i2').val(arrdata[0]['item_id_b24i2']);
		$('#question_b24i3_area').html(question_b24i3_html); $('#b24i3').val(arrdata[0]['item_id_b24i3']);
		$('#question_b24i4_area').html(question_b24i4_html); $('#b24i4').val(arrdata[0]['item_id_b24i4']);
		
		$('#question_b25i1_area').html(question_b25i1_html); $('#b25i1').val(arrdata[0]['item_id_b25i1']);
		$('#question_b25i2_area').html(question_b25i2_html); $('#b25i2').val(arrdata[0]['item_id_b25i2']);
		$('#question_b25i3_area').html(question_b25i3_html); $('#b25i3').val(arrdata[0]['item_id_b25i3']);
		$('#question_b25i4_area').html(question_b25i4_html); $('#b25i4').val(arrdata[0]['item_id_b25i4']);
		
    });		
	
			//////////////////////////////			
		}
    });
	
	}	
	else{
		$('#paper_selection_block').css('visibility','hidden');
		$('#paper_selection_block').css('display','none');
	}
});
	
	var convert = function(convert){
    return $("<span />", { html: convert }).text();
    //return document.createElement("span").innerText;
};

</script>
<script language="javascript" type="text/javascript">
	
function funSubmitPaper(){
		
		alert($("input[name='paper_item_b25']:checked").val());		
		alert('Your Paper has been successfully generated! Note: This is Test Drive / Pilot Testing, ....');
		//window.location = "https://www.pecsba.educationservices.pk/school/paper";
		
	}
  
</script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

	  </section>

</div>