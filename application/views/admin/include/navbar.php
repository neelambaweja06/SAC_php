
<style>
  .gradient-text {
    background: linear-gradient(90deg, 
    #cd6202 30%,
    #d39d29  30%,
    #ca6701 40% 
    );
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 3em;
    font-weight: bold;
    text-align: center;
   
  }
</style>
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
		
			
    <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="#!" class="b-brand">
        <!-- ========   change your logo hear   ============ -->
        <img src="<?= base_url() ?>public/assets/images/vhp.jpg" alt="" class="logo">
        <img src="<?= base_url() ?>public/assets/images/vhp.jpg" alt="" class="logo-thumb">
      </a>
      <a href="#!" class="mob-toggler">
        <i class="feather icon-more-vertical"></i>
      </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
          <div class="search-bar">
            <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </li>
        
        
      </ul>
      <div class="gradient-text">
      Vishva Hindu Parishad (VHP)
  </div>
    
      <ul class="navbar-nav ml-auto">
       
        <li>
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="feather icon-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head">
                <img src="<?= base_url() ?>public/assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                <span><?= ucwords($this->session->userdata('name')); ?></span>
                <a href="<?= site_url('admin/auth/logout'); ?>" class="dud-logout" title="Logout">
                  <i class="feather icon-log-out"></i>
                </a>
              </div>
             
            </div>
          </div>
        </li>
      </ul>
    </div>
    <style>
      img.logo {
    height: 52px;
    width: 100px;
}
      </style>
  
</header>