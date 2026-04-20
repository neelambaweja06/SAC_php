<nav class="pcoded-navbar  ">
<?php 
   $cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
   ?>  
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?= base_url() ?>public/assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
						<div class="user-details">
						<span><?= ucwords($this->session->userdata('name')); ?></span>
							<div id="more-details"><?= ucwords($this->session->userdata('role_name')); ?><i class="fa fa-chevron-down m-l-5"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							
							<li class="list-group-item"><a href="<?= site_url('admin/auth/logout'); ?>"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
			
				<ul class="nav pcoded-inner-navbar ">
			
					<li class="nav-item">
					    <a href="<?= site_url('admin/dashboard'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<?php if($this->session->userdata('role')==='1'):?>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Admin</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="<?= base_url('admin/users/add'); ?>">Add Admin</a></li>
					        <li><a href="<?= base_url('admin/users'); ?>">View Admin</a></li>
					    </ul>
					</li>
					
					
					<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Trust</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="<?= base_url('admin/doner/add'); ?>">Add Trust</a></li>
					        <li><a href="<?= base_url('admin/doner'); ?>">View Trust</a></li>
					    </ul>
					</li>
					
					<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Hostel</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="<?= base_url('admin/school/add'); ?>">Add Hostel</a></li>
					        <li><a href="<?= base_url('admin/school'); ?>">View Hostel</a></li>
					    </ul>
					</li>
					

					<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Student</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="<?= base_url('admin/student/add'); ?>">Add Student</a></li>
							<li><a href="<?= base_url('admin/student/current'); ?>">Current Year Student</a></li>
					        <li><a href="<?= base_url('admin/student'); ?>">All Student</a></li>
							<li><a href="<?= base_url('admin/student/school'); ?>"> Student Filter</a></li>
							<li><a href="<?= base_url('admin/student/action'); ?>">Bulk Action</a></li>
							
					    </ul>
					</li>
					
					<?php endif;?>
					
					<?php if($this->session->userdata('role')==='3'):?>
						<li class="nav-item">
					    <a href="<?= site_url('admin/school/profile'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Porfile</span></a>
					</li>
						<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Student</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="<?= base_url('admin/student/add'); ?>">Add Student</a></li>
					        <li><a href="<?= base_url('admin/student'); ?>">View Student</a></li>
							<!-- <li><a href="<?= base_url('admin/student/school'); ?>"> Student Filter</a></li> -->
							<!-- <li><a href="<?= base_url('admin/student/action'); ?>">Bulk Action</a></li> -->
							
					    </ul>
					</li>
						<?php endif;?>
						<?php if($this->session->userdata('role')==='4'):?>
							<li class="nav-item">
					    <a href="<?= site_url('admin/doner/profile'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Porfile</span></a>
					</li>
							<li><a href="<?= base_url('admin/student/approved'); ?>">Approved Student</a></li>
							<li><a href="<?= base_url('admin/student/school'); ?>"> Student Filter</a></li>
							
							<?php endif;?>
							
							
				</ul>
				

			</div>
		</div>
	</nav>