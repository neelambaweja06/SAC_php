<div class="pcoded-main-container">
    <div class="pcoded-content">
       
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
              <div class="card-header">
                        <h5>View User</h5></div>
                    <div class="card-body">
                    <table id="table_id" class="table"  style="width: 100%; overflow: scroll">
        <thead>
        <tr> 
          <th>Sr No</th>
          <th>Session</th>
          <th>Student First  Nmae</th>
          <th>Student Last  Nmae</th>
          <th>Student Code</th>
          <th>Father Name</th>
          <th>Mother Name</th>
          <th>State</th>
          <th>Class</th>
          <th>Report Card</th>
       
         
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $c=1;
          
          foreach($all_students as $row): ?>
          <tr>
          <td><?= $c++; ?></td>
          <td><?=  $row['fn_year']; ?></td>
            <td><?= $row['student_name_first']; ?></td>
            <td><?= $row['student_name_last']; ?></td>
            <td><?= $row['student_code']; ?></td>
            <td><?= $row['student_father_name']; ?></td>
            <td><?= $row['student_mother_name']; ?></td>
            <td><?= $row['state_name']; ?></td>

            <td><?= $row['student_class']; ?></td>
            <td> <a href="<?= base_url('admin/student/report_card/'.$row['id']); ?>" class="btn btn-primary btn-flat">Download</a></td>
           
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
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<style>
 .button-select {
            background-color: #536dfe; 
            color: white;
            padding: 7px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            width: 130px;
            border-radius: 2px;
        }

        .button-select option {
            background-color: white;
            color: black;
            padding: 16px;
        }
  </style>
  
<!-- <script>

jQuery(document).ready(function ($) {
  $('#table_id').DataTable();
});

  </script> -->