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
          <th>Trust Name</th>
          
          <th>Email</th>
          <th>Mobile No.</th>
          <th>State</th>
         
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $c=1;
          foreach($all_doners as $row): ?>
          <tr>
          <td><?= $c++; ?></td>
            <td><?= $row['doner_name']; ?></td>
            <td><?= $row['doner_email']; ?></td>
            <td><?= $row['doner_mobile']; ?></td>
            <td><?= $row['state_name']; ?></td>
          
          
            <td class="text-right">
            <a href="<?= base_url('admin/doner/viewid/'.$row['id']); ?>" class="btn btn-warning btn-flat">View</a>
            <a href="<?= base_url('admin/doner/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Edit</a>
            <a href="<?= base_url('admin/doner/del/'.$row['id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure want to delete ?');">Delete</a></td>
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
