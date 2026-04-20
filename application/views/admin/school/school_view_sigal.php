<div class="pcoded-main-container">
    <div class="pcoded-content">
       
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
              <div class="card-header">
                        <h5>View  School Information</h5></div>
                    <div class="card-body">
                    <!-- School Profile -->
<div class="School-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="<?= base_url() ?>public/assets/images/Hostel.png" alt="">
            
            <h3><?= $user['school_name']; ?></h3>
          </div>
          
          <div class="card-body">
            
          <div class="three-columns-grid">
    <div><a href="<?= base_url('admin/school/edit/'.$user['id']); ?>" class="btn btn-info btn-flat">Edit Deatils</a></div>
    <?php
  if($this->session->userdata('role')==='1'){
    ?>
    <div><a href="<?= base_url('admin/school/del/'.$user['id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure want to delete ?');">Delete</a></div>
    <?php
  }
?>
</div>
            
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"></i><?= $user['school_name']; ?></h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Hostel Code:</th>
                <td width="2%">:</td>
                <td><?= $user['school_code']; ?></td>
              </tr>
             
              
              
              <tr>
                <th width="30%">Hostel State</th>
                <td width="2%">:</td>
                <td><?= $user['state_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Hostel Distic</th>
                <td width="2%">:</td>
                <td><?= $user['school_dist']; ?></td>
              </tr>
             
              <tr>
                <th width="30%">Hostel Pincode</th>
                <td width="2%">:</td>
                <td><?= $user['school_pincode']; ?></td>
              </tr>
              <tr>
                <th width="30%">Full Address</th>
                <td width="2%">:</td>
                <td><?= $user['school_address']; ?></td>
              </tr>
              <tr>
                <th width="30%">Establishment Year</th>
                <td width="2%">:</td>
                <td><?= $user['estab_year']; ?></td>
              </tr>
              <tr>
                <th width="30%">Total No Of Student</th>
                <td width="2%">:</td>
                <td><?= $user['no_of_student']; ?></td>
              </tr>
             
              <tr>
                <th width="30%">Contact Person Name</th>
                <td width="2%">:</td>
                <td><?= $user['contact_person_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Contact Person Email</th>
                <td width="2%">:</td>
                <td><?= $user['contact_person_email']; ?></td>
              </tr>
              <tr>
                <th width="30%">Contact Person Mobile</th>
                <td width="2%">:</td>
                <td><?= $user['contact_person_mobile']; ?></td>
              </tr>
              <tr>
                <th width="30%">Hostel medium Of Instruction</th>
                <td width="2%">:</td>
                <td><?= $user['hostel_medium_Of_Instruction']; ?></td>
              </tr>
              <tr>
                <th width="30%">No of staff teaching</th>
                <td width="2%">:</td>
                <td><?= $user['no_of_staff_teaching']; ?></td>
              </tr>
              <tr>
                <th width="30%">No of staff  non teaching</th>
                <td width="2%">:</td>
                <td><?= $user['no_of_non_staff_teaching']; ?></td>
              </tr>
              <tr>
                <th width="30%">Trust Name:</th>
                <td width="2%">:</td>
                <td><?= $user['doner_name']; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<style>
    .School-profile .card {
  border-radius: 10px;
}

.School-profile .card .card-header .profile_img {
  width: 250px;
    height: 250px;
  object-fit: cover;
  margin: 10px auto;
  border: 10px solid #cb6801;
  border-radius: 50%;
}

.School-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
}

.School-profile .card p {
  font-size: 16px;
  color: #000;
}

.School-profile .table th,
.School-profile .table td {
  font-size: 14px;
  padding: 5px 10px;
  color: #000;
}
.three-columns-grid {
    display: grid;
    grid-auto-rows: 1fr;
    grid-template-columns: 1fr 1fr 1fr;
}

/* columns */
.three-columns-grid > * {
    padding:1rem;
}a.btn.btn-info.btn-flat {
    width: 115px;
}
    </style>
<script>

jQuery(document).ready(function ($) {
  $('#table_id').DataTable();
});

  </script>