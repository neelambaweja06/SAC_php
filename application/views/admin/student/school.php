<div class="pcoded-main-container">
    <div class="pcoded-content">
       
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
              <div class="card-header">
              <form  action="<?= base_url('admin/student/school') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="form-row">
                            <div class="form-group col-md-4">
                           <select name="fin_year" class="form-control select2">
                            <option value="">Select Year</option>
                            <?php
                            $year_fetch_data = $this->student_model->year_fetch();
                            foreach ($year_fetch_data as $data) {?>
                            <option value="<?php echo $data['year']; ?>"><?php echo $data['year']; ?></option>
                            <?php } ?>
                            </select>
                            </div>
                            <?php
                            if($this->session->userdata('role')==='1'){?>
                            <div class="form-group col-md-4">
                           <select name="school_code" class="form-control select2">
                            <option value="">Select School</option>
                            <?php
                            $school_fetch_data = $this->student_model->school_fetch();
                            foreach ($school_fetch_data as $data) {?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['school_name']; ?></option>
                            <?php } ?>
                            </select>
                            </div>
                            <?php }?>
                            <div class="form-group col-md-4">
                           <select name="status" class="form-control select2">
                            <option value="">Select Status</option>
                            <?php
                            $status_fetch_data = $this->student_model->status_fetch();
                            foreach ($status_fetch_data as $data) {?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['st_name']; ?></option>
                            <?php } ?>
                              </select>
                            </select>
                            </div>
                            </div>
                            <input type="submit" class="btn  btn-primary" name="submit" value="search">
</form>
                       </div>
                    <div class="card-body">
                    <table id="table_id" class="table"  style="width: 100%; overflow: scroll">
        <thead>
        <tr> 
          <th>Sr No</th>
          <th>Session</th>
          <th>Student Code</th>
          <th>Student First Name</th>
          <th>Student Last Name</th>
          <th>Father Name</th>
          <th>Mother Name</th>
          <th>State</th>
          <th>School</th>
          <th>Class</th>
         
         
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $c=1;
          foreach($all_students as $row): ?>
          <tr>
          <td><?= $c++; ?></td>
          <td><?= $row['fn_year']; ?></td>
            <td><?= $row['student_code']; ?></td>
            <td><?= $row['student_name_first']; ?></td>
            <td><?= $row['student_name_last']; ?></td>
            <td><?= $row['student_father_name']; ?></td>
            <td><?= $row['student_mother_name']; ?></td>
            <td><?= $row['state_name']; ?></td>
            <td><?= $row['school_name']; ?></td>
            <td><?= $row['student_class']; ?></td>
           
            <td class="text-right">
           <a href="<?= base_url('admin/student/report_card/'.$row['id']); ?>" class="btn btn-primary btn-flat">Report Card</a>
            <a href="<?= base_url('admin/student/viewid/'.$row['id']); ?>" class="btn btn-warning btn-flat">View</a>
              <a href="<?= base_url('admin/student/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <a href="<?= base_url('admin/student/del/'.$row['id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure want to delete ?');">Delete</a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
