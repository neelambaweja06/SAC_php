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
                    <table id="table_id" class="table table-striped"  style="width: 100%; overflow: scroll">
        <thead>
        <tr> 
          <th>Sr No</th>
          <th>Hostel Name</th>
          <th>Hostel Code</th>
          <th>Hostel State</th>
          <th>Contact Person name</th>
          <th>No Of Student</th>
          
          
         
         
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $c=1;
          foreach($all_schools as $row): ?>
          <tr>
          <td><?= $c++; ?></td>
            <td><?= $row['school_name']; ?></td>
            <td><?= $row['school_code']; ?></td>
            <td><?= $row['state_name']; ?></td>
            <td><?= $row['contact_person_name']; ?></td>
            <td><?= $row['no_of_student']; ?></td>
          
         
            <td class="text-right">
            <a href="<?= base_url('admin/school/viewid/'.$row['id']); ?>" class="btn btn-warning btn-flat">View</a>
              <a href="<?= base_url('admin/school/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Edit</a>
              <a href="<?= base_url('admin/school/del/'.$row['id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure want to delete ?');">Delete</a></td>
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
