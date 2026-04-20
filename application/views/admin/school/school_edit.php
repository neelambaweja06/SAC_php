<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Add User</h5>
                        <?php if(isset($msg) || validation_errors() !== ''): ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
              <?php endif; ?>
                    </div>
                    <div class="card-body">
                    <?php echo form_open(base_url('admin/school/edit/'.$user['id']) )?> 
                    <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="school_name" >Hostel Name</label>
                                <input type="text" name="school_name"  value="<?= $user['school_name']; ?>" class="form-control" id="school_name" placeholder="">
                                </div>
                            
                           
                            <div class="form-group col-md-6">
                            <label for="school_name" >Hostel Code</label>
                                <input type="text" name="school_code" class="form-control" value="<?= $user['school_code']; ?>"id="school_code" placeholder="">
                            </div>
                        </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >school State</label>

                            <select name="school_state" class="form-control select2">
                    <option value="">Select State</option>
                    <?php
                    
                    $state_fetch_data = $this->school_model->state_fetch();
                    foreach ($state_fetch_data as $data) {?>
                     <option value="<?php echo $data['state_id']; ?>"<?php if ($data['state_id'] === $user['school_state']) echo 'selected="selected"'?>><?php echo $data['state_title']; ?></option>
                      <?php } ?>

                    
                  </select>
                            </div>
                                <div class="form-group col-md-6">
                                <label for="mobile_no" >school Distic</label>

<select name="school_dist" class="form-control select2">
<option value="">Select District</option>
<?php

$state_fetch_data = $this->school_model->distic_fetch();
foreach ($state_fetch_data as $data) {?>
<option value="<?php echo $data['districtid']; ?>"<?php if ($data['districtid'] === $user['school_dist']) echo 'selected="selected"'?>><?php echo $data['district_title']; ?></option>
<?php } ?>


</select>
                                </div>
                                
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="school_name" >school Pincode</label>
                                <input type="text" name="school_pincode"  value="<?= $user['school_pincode']; ?>"class="form-control" id="school_pincode" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="email" >Establishment Year</label>
                            <input type="year" name="estab_year" value="<?= $user['estab_year']; ?>" class="form-control" id="estab_year" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="email" >Total No Of Student</label>
                            <input type="number" name="no_of_student" value="<?= $user['no_of_student']; ?>" class="form-control" id="no_of_student" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="school_name" >Contact Person Name</label>
                                <input type="text" name="contact_person_name" class="form-control" value="<?= $user['contact_person_name']; ?>" id="contact_person_name" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="email" >Contact Person eamil</label>
                            <input type="year" name="contact_person_email" class="form-control" value="<?= $user['contact_person_email']; ?>" id="contact_person_eamil" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="email" >Contact Person Number</label>
                            <input type="number" name="contact_person_mobile" class="form-control" value="<?= $user['contact_person_mobile']; ?>" id="contact_person_mobile" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Full Address</label>

                            <textarea  name="school_address" class="form-control" id="school_address" placeholder=""><?= $user['school_address']; ?></textarea>

                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Doner</label>

                            <select name="doner_id" class="form-control select2">
<option value="">Select Doner</option>
<?php

$state_fetch_data = $this->school_model->doner_fetch();
foreach ($state_fetch_data as $data) {?>
<option value="<?php echo $data['id']; ?>"<?php if ($data['id'] === $user['doner_id']) echo 'selected="selected"'?>><?php echo $data['doner_name']; ?></option>
<?php } ?>


</select>

                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Hostel medium Of Instruction</label>
                            <input type="text" name="hostel_medium_Of_Instruction" class="form-control" id="hostel_medium_Of_Instruction" value="<?= $user['hostel_medium_Of_Instruction']; ?>"placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >No of staff teaching</label>
                            <input type="text" name="no_of_staff_teaching" class="form-control" id="no_of_staff_teaching" value="<?= $user['no_of_staff_teaching']; ?>" placeholder="">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >No of  non staff teaching</label>
                            <input type="text" name="no_of_non_staff_teaching" class="form-control" id="no_of_non_staff_teaching" value="<?= $user['no_of_non_staff_teaching']; ?>" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Password</label>
                            <input type="text" name="password" class="form-control" id="password" value="<?= $user['password']; ?>" placeholder="">
                            </div>
                            </div>
                                      <input type="submit" class="btn  btn-primary" name="submit" value="Update">
                           
                            <?php echo form_close( ); ?>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
        
