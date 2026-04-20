<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="pcoded-main-container">
    <div class="pcoded-content">
       
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
              <div class="card-header">
                        <h5>View  Student Information</h5></div>
                    <div class="card-body">
                    <!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <?php
            if($user['student_img']!=''){
              $img_path='student_img/'.$user['student_img'];
            }else{
              $img_path="public/assets/images/sac_logo.jpg"; 
            }
            ?>
            <img class="profile_img" src="<?= base_url().$img_path ?>" alt="student_img">
            
            <h3><?= $user['student_name_first']; ?></h3>
          </div>
          
          <div class="card-body">
            
          <div class="three-columns-grid">
    <div><a href="<?= base_url('admin/student/edit/'.$user['id']); ?>" class="btn btn-info btn-flat">Edit Deatils</a></div>
      <?php  if($this->session->userdata('role')==='1'){?>
    <div><a href="<?= base_url('admin/student/del/'.$user['id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure want to delete ?');">Delete</a></div>
<?php 
            }?>
</div>
            
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"></i><?= $user['student_name_first'] .$user['student_name_last']; ?></h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">SAC Code:</th>
                <td width="2%">:</td>
                <td><?= $user['student_code']; ?></td>
              </tr>
             
              <tr>
                <th width="30%">Student DOB</th>
                <td width="2%">:</td>
                <td><?= $user['student_dob']; ?></td>
              </tr>
              <tr>
                <th width="30%">Student Gender</th>
                <td width="2%">:</td>
                <td><?= $user['student_gender']; ?></td>
              </tr>
              <tr>
                <th width="30%">Student Father Name</th>
                <td width="2%">:</td>
                <td><?= $user['student_father_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Mother Name</th>
                <td width="2%">:</td>
                <td><?= $user['student_mother_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Student State</th>
                <td width="2%">:</td>
                <td><?= $user['state_name']; ?></td>
              </tr>
              <tr>
                <th width="30%">Student Distic</th>
                <td width="2%">:</td>
                <td><?= $user['student_dist']; ?></td>
              </tr>
              <tr>
                <th width="30%">Student Distic</th>
                <td width="2%">:</td>
                <td><?= $user['student_city']; ?></td>
              </tr>
              <tr>
                <th width="30%">Student Pincode</th>
                <td width="2%">:</td>
                <td><?= $user['student_pincode']; ?></td>
              </tr>
              <tr>
                <th width="30%">Full Address</th>
                <td width="2%">:</td>
                <td><?= $user['student_address']; ?></td>
              </tr>
              <tr>
                <th width="30%">Class</th>
                <td width="2%">:</td>
                <td><?= $user['student_class']; ?></td>
              </tr>
              <tr>
                <th width="30%"> % Obtained</th>
                <td width="2%">:</td>
                <td><?= $user['obtained_per']; ?></td>
              </tr>
              <tr>
                <th width="30%">Favourite Subject</th>
                <td width="2%">:</td>
                <td><?= $user['fav_subject']; ?></td>
              </tr>
              <tr>
                <th width="30%"> % Obtained</th>
                <td width="2%">:</td>
                <td><?= $user['obtained_per_in_subject']; ?></td>
              </tr>
              <tr>
                <th width="30%">Special Talent /Intrest</th>
                <td width="2%">:</td>
                <td><?= $user['intrest']; ?></td>
              </tr>
              <tr>
                <th width="30%">Any Achievement</th>
                <td width="2%">:</td>
                <td><?= $user['any_achiv']; ?></td>
              </tr>
              <tr>
                <th width="30%">What Does The Child want to be</th>
                <td width="2%">:</td>
                <td><?= $user['what_does_child']; ?></td>
              </tr>
              <tr>
                <th width="30%">School Name</th>
                <td width="2%">:</td>
                <td><?= $user['school_name']; ?></td>
              </tr>
              
            </table>
            <div class="card-header">
            <h4>Student Marksheet</h4>
            <img class="marksheet_img" src="<?= base_url('marksheet/').$user['student_marksheet'] ?>" alt="student_img">
            <a href="<?= base_url('marksheet/').$user['student_marksheet'] ?>" target="new" class="btn btn-success btn-flat"><i class="feather icon-eye"></i></a>
    <a href="<?= base_url('marksheet/').$user['student_marksheet'] ?>" download  class="btn btn-info btn-flat"><i class="feather icon-download"></i></a>
          </div>
          <div class="card-header">
            <h4>Student Action & Activity Photos  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Add Images
  </button></h4> 
                                      <div class="row">
                                        <?php
                                        $id=$this->uri->segment(4);
                                        $active=$this->student_model->get_active_by_id_signl($id);
                                        foreach ($active as $row) {
                                        ?>
                                     
                                     <div class="container_img">
                                        <img src="<?= base_url('action_img/').$row->file_name ?>" alt="<?=$row->file_name?>" class="image">
                                        <div class="overlay"><a href="<?= base_url('admin/student/active_del/'.$row->id); ?>" ><i class="feather icon-trash"></i></a></div>
                                      </div>
                                    
                                     
                                   <?php }?>
                                      
                                    </div>

                                
           
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
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Action & Activity Photos</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form class="form-horizontal" action="<?= base_url('admin/student/activity_submit_data') ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <input type="hidden" name="uid" value="<?=$this->uri->segment(4);?>">
      <div class="form-row">
      <div class="form-group col-md-12">
      
      <input type="file" name="activity_pic[]" class="form-control" id="activity_pic"  accept="image/*"  multiple="" placeholder="">
       </div>
          </div>
                            
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="submit" class="btn btn-primary" name="submit" value="Add">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
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
}img.marksheet_img {
    width: 300px;
    height: 300px;
}.container_img {
  position: relative;
  width: 50%;
  max-width: 300px;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
}

.container_img:hover .overlay {
  opacity: 1;
}
    </style>
<script>

jQuery(document).ready(function ($) {
  $('#table_id').DataTable();
});

  </script>