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

  <!-- <script>
        $(document).ready(function() {
            new DataTable('#table_id', {
                dom: 'Bfrtip', // Specifies the buttons position
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                pagingType: 'full_numbers', // This enables number-based pagination
                pageLength: 10,  // Set how many rows per page by default (optional)
                lengthMenu: [  // This enables the "Show Entries" dropdown
                    [5, 10, 25, 50, 100], // Options for how many rows per page
                    [5, 10, 25, 50, 100]  // Displayed values in the dropdown
                ]
            });
        });
    </script> -->
    
      