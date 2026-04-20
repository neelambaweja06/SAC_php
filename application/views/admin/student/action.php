<div class="pcoded-main-container">
    <div class="pcoded-content">
       
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
              <div class="card-header">
              <form  action="<?= base_url('admin/student/action') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="form-row">
                            <div class="form-group col-md-6">
                          <select name="fin_year" class="form-control select2">
    <option value="">Select Year</option>
    <?php
    if ($this->session->userdata('role') === '1') {
        // Admin role → fetch all years
        $year_fetch_data = $this->student_model->year_fetch();
        foreach ($year_fetch_data as $data) { ?>
            <option value="<?php echo $data['year']; ?>">
                <?php echo $data['year']; ?>
            </option>
        <?php }
    } else {
        // Other role → fetch only current year
        $year_c_fetch_data = $this->student_model->year_fetch_current();
        foreach ($year_c_fetch_data as $data) { ?>
            <option value="<?php echo $data['year']; ?>">
                <?php echo $data['year']; ?>
            </option>
        <?php }
    } ?>
</select>

                            </div>
                            <?php
                            if($this->session->userdata('role')==='1'){?>
                            <div class="form-group col-md-6">
                           <select name="school_code" class="form-control select2">
                            <option value="">Select School</option>
                            <?php
                            $school_fetch_data = $this->student_model->school_fetch();
                            foreach ($school_fetch_data as $data) {?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['school_name']; ?></option>
                            <?php } ?>
                            </select>
                            </div>
                            <?php } ?>
                            </div>
                            <input type="submit" class="btn  btn-primary" name="submit" value="search">
</form>
<form  action="<?= base_url('admin/student/action_submit') ?>" method="post" enctype="multipart/form-data">
                       </div>
                    <div class="card-body">
                    <table  class="table"  style="width: 100%; overflow: scroll">
        <thead>
        <tr> 
          
          <th><input type="checkbox" name="checkAll" class="checkAll"> Check All</th>
          <th>Sr No</th>
          <th>Session</th>
          <th>Student Code</th>
          <th>Student First & Last Name</th>
       
          <th>Father Name</th>
          <th>Mother Name</th>
          <th>School</th>
         
         
          <th>Option</th>
        </tr>
        </thead>
        <tbody>
          <?php 
        $c=1;
          foreach($all_students as $row): ?>
          <tr>
          
          <td><input type="checkbox" class="checkboxes" name="sid[]" value="<?= $row['id']; ?>"></label></td>
          <td><?= $c++; ?></td>
          <td><?= $row['fn_year']; ?></td>
            <td><?= $row['student_code']; ?></td>
            <td><?= $row['student_name_first']; ?> <?= $row['student_name_last']; ?></td>
 
            <td><?= $row['student_father_name']; ?></td>
            <td><?= $row['student_mother_name']; ?></td>

            <td><?= $row['school_name']; ?></td>
           
            <td class="text-right">
            <a href="<?= base_url('admin/student/viewid/'.$row['id']); ?>" class="btn btn-warning btn-flat">View</a>
              <a href="<?= base_url('admin/student/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Edit</a>
             <?php  if($this->session->userdata('role')==='1'){?>
              <a href="<?= base_url('admin/student/del/'.$row['id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure want to delete ?');">Delete</a></td>
              <?php 
            }?>
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
                    
               
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email" >ACtion</label>
                           <select name="status_id" class="form-control select2">
                            <option value="">Select Action</option>
                            <?php
            $status_fetch_data = $this->student_model->status_fetch();
foreach ($status_fetch_data as $data) {?>
<option value="<?php echo $data['id']; ?>"><?php echo $data['st_name']; ?></option>
<?php } ?>
    </select>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="email" >Remarks</label>
                            <textarea name="student_remark" class="form-control" id="student_remark" placeholder=""></textarea>
                            </select>
                            </div>
                            </div>
                           
                            <input type="submit" class="btn  btn-primary" name="submit" value="Submit">
</form>
</div>
                   
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<script>
  $(function(){
   $('.checkAll').click(function(){
      if (this.checked) {
         $(".checkboxes").prop("checked", true);
      } else {
         $(".checkboxes").prop("checked", false);
      }	
   });
 
   $(".checkboxes").click(function(){
      var numberOfCheckboxes = $(".checkboxes").length;
      var numberOfCheckboxesChecked = $('.checkboxes:checked').length;
      if(numberOfCheckboxes == numberOfCheckboxesChecked) {
         $(".checkAll").prop("checked", true);
      } else {
         $(".checkAll").prop("checked", false);
      }
   });
});
  </script>