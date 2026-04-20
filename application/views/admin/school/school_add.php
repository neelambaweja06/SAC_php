<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
    </style>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Add school</h5>
                        <?php if(isset($msg) || validation_errors() !== ''): ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
              <?php endif; ?>
                    </div>
                    <div class="card-body">
                    <?php echo form_open(base_url('admin/school/add'));  ?> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="school_name">Hostel Name</label>
                                <input type="text" name="school_name" class="form-control" id="school_name" placeholder="">
                                </div>
                                
                            
                            <div class="form-group col-md-6">
                            <label for="school_name" >Hostel Code</label>
                                <input type="text" name="school_code" class="form-control" id="school_code" placeholder="">
                            </div>
                        </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="mobile_no" >Hostel State</label>

<select name="school_state" class="form-control select2">
<option value="">Select State</option>
<?php

$state_fetch_data = $this->school_model->state_fetch();
foreach ($state_fetch_data as $data) {?>
<option value="<?php echo $data['state_id']; ?>"><?php echo $data['state_title']; ?></option>
<?php } ?>


</select>
                                </div>
                                <div class="form-group col-md-6">
                           
                                <label for="mobile_no" >Hostel Distic</label>

<select name="school_dist" class="form-control select2">
<option value="">Select District</option>
<?php

$state_fetch_data = $this->school_model->distic_fetch();
foreach ($state_fetch_data as $data) {?>
<option value="<?php echo $data['districtid']; ?>"><?php echo $data['district_title']; ?></option>
<?php } ?>


</select>
                                </div>
                               
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="school_name" >Hostel Pincode</label>
                                <input type="text" name="school_pincode" class="form-control" id="school_pincode" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="email" >Establishment Year</label>
                            <input type="year" name="estab_year" class="form-control" id="estab_year" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="email" >Total No Of Student</label>
                            <input type="number" name="no_of_student" class="form-control" id="no_of_student" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Full Address</label>

                            <textarea  name="school_address" class="form-control" id="school_address" placeholder=""></textarea>

                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Doner</label>

                            <select name="doner_id" class="form-control select2">
<option value="">Select Doner</option>
<?php

$state_fetch_data = $this->school_model->doner_fetch();
foreach ($state_fetch_data as $data) {?>
<option value="<?php echo $data['id']; ?>"><?php echo $data['doner_name']; ?></option>
<?php } ?>


</select>

                            </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="school_name" >Contact Person Name</label>
                                <input type="text" name="contact_person_name" class="form-control" id="contact_person_name" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="email" >Contact Person eamil</label>
                            <input type="year" name="contact_person_email" class="form-control" id="contact_person_eamil" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="email" >Contact Person Number</label>
                            <input type="number" name="contact_person_mobile" class="form-control" id="contact_person_mobile" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Hostel medium Of Instruction</label>
                            <input type="text" name="hostel_medium_Of_Instruction" class="form-control" id="hostel_medium_Of_Instruction" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >No of staff teaching</label>
                            <input type="text" name="no_of_staff_teaching" class="form-control" id="no_of_staff_teaching" placeholder="">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >No of  non staff teaching</label>
                            <input type="text" name="no_of_non_staff_teaching" class="form-control" id="no_of_non_staff_teaching" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Password</label>
                            <input type="text" name="password" class="form-control" id="password" placeholder="">
                            </div>
                            </div>
                            <input type="submit" class="btn  btn-primary" name="submit" value="Add">
                           
                            <?php echo form_close( ); ?>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
        <script>
    $('.select2').select2();
</script>