<div class="pcoded-main-container">
    <div class="pcoded-content">
       
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
              <div class="card-header">
                        <h5>View  Trust Information</h5></div>
                    <div class="card-body">
                    <!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
          <img class="profile_img" src="<?= base_url() ?>public/assets/images/project.png" alt="">
            <h3><?= $doner['doner_name']; ?></h3>
          </div>
          
          <div class="card-body">
            
          <div class="three-columns-grid">
    <div><a href="<?= base_url('admin/doner/edit/'.$doner['id']); ?>" class="btn btn-info btn-flat">Edit Deatils</a></div>
   <?php
  if($this->session->userdata('role')==='1'){
    ?>
    <div><a href="<?= base_url('admin/doner/del/'.$doner['id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure want to delete ?');">Delete</a></div>
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
            <h3 class="mb-0"></i><?= $doner['doner_name']; ?></h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Trust ID:</th>
                <td width="2%">:</td>
                <td><?= $doner['doner_id']; ?></td>
              </tr>
              <tr>
                <th width="30%">Trust Email</th>
                <td width="2%">:</td>
                <td><?= $doner['doner_email']; ?></td>
              </tr>
              <tr>
                <th width="30%">Trust Mobile</th>
                <td width="2%">:</td>
                <td><?= $doner['doner_mobile']; ?></td>
              </tr>
              <tr>
                <th width="30%">Trust State</th>
                <td width="2%">:</td>
                <td><?= $doner['state_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Trust Distic</th>
                <td width="2%">:</td>
                <td><?= $doner['dist_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Full Address</th>
                <td width="2%">:</td>
                <td><?= $doner['doner_address']; ?></td>
              </tr>
              <tr>
                <th width="30%">Trust Pincode</th>
                <td width="2%">:</td>
                <td><?= $doner['doner_pincode']; ?></td>
              </tr>
              <tr>
                <th width="30%">Year Of Establishment</th>
                <td width="2%">:</td>
                <td><?= $doner['doner_establishment']; ?></td>
              </tr>
              <tr>
                <th width="30%">Govt Aid Received/Due (Amount)</th>
                <td width="2%">:</td>
                <td><?= $doner['doner_govt_aid']; ?></td>
              </tr>
              
             
              <tr>
                <th width="30%">President Name</th>
                <td width="2%">:</td>
                <td><?= $doner['president_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">President Email</th>
                <td width="2%">:</td>
                <td><?= $doner['president_email']; ?></td>
              </tr>
              <tr>
                <th width="30%">President Mobile</th>
                <td width="2%">:</td>
                <td><?= $doner['president_mobile']; ?></td>
              </tr>
              <tr>
                <th width="30%">Secretary Name</th>
                <td width="2%">:</td>
                <td><?= $doner['secretary_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Secretary Email</th>
                <td width="2%">:</td>
                <td><?= $doner['secretary_email']; ?></td>
              </tr>
              <tr>
                <th width="30%">Secretary mobile</th>
                <td width="2%">:</td>
                <td><?= $doner['secretary_mobile']; ?></td>
              </tr>
              <tr>
                <th width="30%">Treasurer Name</th>
                <td width="2%">:</td>
                <td><?= $doner['treasurer_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Treasurer Email</th>
                <td width="2%">:</td>
                <td><?= $doner['treasurer_email']; ?></td>
              </tr>
              <tr>
                <th width="30%">Treasurer Mobile</th>
                <td width="2%">:</td>
                <td><?= $doner['treasurer_mobile']; ?></td>
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
    .student-profile .card {
  border-radius: 10px;
}

.student-profile .card .card-header .profile_img {
  width: 250px;
  height: 250px;
  object-fit: cover;
  margin: 10px auto;
  border: 10px solid #ccc;
  border-radius: 50%;
}

.student-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
}

.student-profile .card p {
  font-size: 16px;
  color: #000;
}

.student-profile .table th,
.student-profile .table td {
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