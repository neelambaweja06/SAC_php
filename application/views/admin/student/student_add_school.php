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
                        <h5>Add student</h5>
                        <?php if(isset($msg) || validation_errors() !== ''): ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
              <?php endif; ?>
                    </div>
                    <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url('admin/student/add') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="school_id" class="form-control" id="student_name" value="5">
                    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="student_name" >student Name</label>
                                <input type="text" name="student_name" class="form-control" id="student_name" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="email" >Student DOB</label>
                            <input type="date" name="student_dob" class="form-control" id="student_dob" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Gender</label>
                            <select name="student_gender" class="form-control">
                            <option value="">Select Option</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>

                            </div>
                           
                            <div class="form-group col-md-6">
                            <label for="student_name" >Father Name</label>
                                <input type="text" name="student_father_name" class="form-control" id="student_father_name" placeholder="">
                            
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="email" >Mother Name</label>
                                <input type="text" name="student_mother_name" class="form-control" id="student_mother_name" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                
                            <label for="mobile_no">Student State</label>

                            <select name="student_state" class="form-control select2">
                    <option value="">Select State</option>
                    <?php
                    
                    $state_fetch_data = $this->student_model->state_fetch();
                    foreach ($state_fetch_data as $data) {?>
                     <option value="<?php echo $data['state_id']; ?>"><?php echo $data['state_title']; ?></option>
                      <?php } ?>

                    
                  </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="mobile_no" >Student Distic</label>

                                <input type="text" name="student_dist" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                           
                                <label for="mobile_no" >Student City/Town</label>

                                <input type="text" name="student_city" class="form-control">

                                </div>
                               
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="student_name" >Student Pincode</label>
                                <input type="text" name="student_pincode" class="form-control" id="student_pincode" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="mobile_no" >Full Address</label>

                              <textarea  name="student_address" class="form-control" id="student_address" placeholder=""></textarea>
                                </div>
                                
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email" >Class</label>
                            <input type="text" name="student_class" class="form-control" id="student_class" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Photo</label>
                            <input type="file" name="student_profile" class="form-control" id="student_profile" placeholder="">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email" > % Obtained</label>
                            <input type="text" name="obtained_per" class="form-control" id="obtained_per" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Favourite Subject</label>
                            <input type="text" name="fav_subject" class="form-control" id="fav_subject" placeholder="">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email" > % Obtained</label>
                            <input type="number" name="obtained_per_in_subject" class="form-control" id="obtained_per_in_subject" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="email" >Special Talent /Intrest</label>
                            <input type="text" name="intrest" class="form-control" id="intrest" placeholder="">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email" >Any Achievement</label>
                            <input type="text" name="any_achiv" class="form-control" id="any_achiv" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="email">What Does The Child want to be</label>
                            <textarea name="what_does_child" class="form-control" id="what_does_child" placeholder=""></textarea>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email" >Marksheet</label>
                            <input type="file" name="student_marksheet" class="form-control" id="student_marksheet" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="email">Action & Activity Photos </label>
                            <input type="file" name="activity_pic[]" class="form-control" id="activity_pic"  accept="image/*"  multiple="" placeholder="">
                            </div>
                            </div>
                            <input type="submit" class="btn  btn-primary" name="submit" value="Add User">
                           
                            </form>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
        <script>
    $('.select2').select2();
</script>
