<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}table#table_id {
    border: 1.5px solid black;
}
    </style>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Add Trust</h5>
                        <?php if(isset($msg) || validation_errors() !== ''): ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
              <?php endif; ?>
                    </div>
                    <div class="card-body">
                    <?php echo form_open(base_url('admin/doner/add'));  ?> 
                    <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="doner_name" >  Trust ID</label>
                                <input type="text" name="doner_id" class="form-control" id="doner_id" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="doner_name" >Name Of The Trust</label>
                                <input type="text" name="doner_name" class="form-control" id="doner_name" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                               
                                <div class="form-group col-md-6">
                                <label for="email" >Trust Email</label>
                            <input type="email" name="doner_email" class="form-control" id="doner_email" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                            <label for="mobile_no" > Trust Mobile No</label>

                            <input type="number" name="doner_mobile" class="form-control" id="doner_mobile" placeholder="">

                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Trust State</label>

                            <select name="doner_state" class="form-control select2">
                    <option value="">Select State</option>
                    <?php
                    
                    $state_fetch_data = $this->doner_model->state_fetch();
                    foreach ($state_fetch_data as $data) {?>
                     <option value="<?php echo $data['state_id']; ?>"><?php echo $data['state_title']; ?></option>
                      <?php } ?>

                    
                  </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile_no" >Trust Distic</label>

<select name="doner_dist" class="form-control select2">
<option value="">Select District</option>
<?php

$state_fetch_data = $this->doner_model->distic_fetch();
foreach ($state_fetch_data as $data) {?>
<option value="<?php echo $data['districtid']; ?>"><?php echo $data['district_title']; ?></option>
<?php } ?>


</select>
                                </div>
                        </div>
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                <label for="mobile_no" >Full Address</label>
                             <textarea  name="doner_address" class="form-control" id="doner_address" placeholder=""></textarea>
                                </div>
                                <div class="form-group col-md-6">
                            <label for="mobile_no" > Trust Pincode</label>

                            <input type="number" name="doner_pincode" class="form-control" id="doner_pincode" placeholder="">

                            </div>
                            </div>
                            <div class="form-row">
                           
                            <div class="form-group col-md-6">
                            <label for="mobile_no" > Year Of Establishment</label>

                            <input type="number" name="doner_establishment" class="form-control" id="doner_establishment" placeholder="">

                            </div>
                            <div class="form-group col-md-6">
                            <label for="mobile_no" > Govt Aid Received/Due (Amount)</label>

                            <input type="number" name="doner_govt_aid" class="form-control" id="doner_govt_aid" placeholder="">

                            </div>
                            </div>
                       
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="mobile_no" >Password</label>

                            <input type="text" name="password" class="form-control" id="password" placeholder="">
                           </div>
                           </div>
                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <h3>Office Bearers Details</h3>

                            <table id="table_id" class="table"  style="width: 100%; overflow: scroll">
                            <tr>
                                        
                                        <th>Post</th>
                                        <th>Name</th>
                                        <th>Mobile No</th>
                                        <th>Email</th>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td>President</td>
                                        <td><input type="text" name="president_name" class="form-control" id="president_name" placeholder=""></td>
                                        <td><input type="text" name="president_mobile" class="form-control" id="president_mobile" placeholder=""></td>
                                        <td><input type="text" name="president_email" class="form-control" id="president_email" placeholder=""></td>
                                        
                                    </tr>
                                    <tr>
                                    <td>Secretary</td>
                                        <td><input type="text" name="secretary_name" class="form-control" id="secretary_name" placeholder=""></td>
                                        <td><input type="text" name="secretary_mobile" class="form-control" id="secretary_mobile" placeholder=""></td>
                                        <td><input type="text" name="secretary_email" class="form-control" id="secretary_email" placeholder=""></td>
                                    </tr>
                                    <tr>
                                    <td>Treasurer</td>
                                        <td><input type="text" name="treasurer_name" class="form-control" id="treasurer_name" placeholder=""></td>
                                        <td><input type="text" name="treasurer_mobile" class="form-control" id="treasurer_mobile" placeholder=""></td>
                                        <td><input type="text" name="treasurer_email" class="form-control" id="treasurer_email" placeholder=""></td>
                                    </tr>
                                    </table>

                            </div>
                           
                            </div>
                            <input type="submit" class="btn  btn-primary" name="submit" value="Add Trust">
                           
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