<style>
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
</style>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->


        <div class="row">
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-home"></i>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $no_hostel= $this->school_model->hostel_count();
                          ?>

                            <h4><?=$no_hostel['hostel_cnt']?></h4>
                            <h6>Total Hostel</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-clipboard"></i>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $no_trust= $this->doner_model->trust_count();
                          ?>
                            <h4><?=$no_trust['trust_cnt']?></h4>
                            <h6>Total Trust</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-user"></i>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $no_student= $this->student_model->student_count();
                           
                           
                          ?>
                            <h4><?=$no_student[0]['student_cnt']?></h4>
                            <h6>Total Student</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-globe"></i>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $no_student_state= $this->student_model->student_state_count();
                          ?>
                            <h4><?=$no_student_state[0]['state_count']?></h4>
                            <h6>Total State</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-calendar"></i>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $no_student_last_year= $this->student_model->student_last_year_count();
                            $currentDate = new DateTime();
$fiscalYearStartMonth = 4; 
$fiscalYearStartDay = 1;   
$currentYear = $currentDate->format('Y');
if ($currentDate->format('n') < $fiscalYearStartMonth || ($currentDate->format('n') == $fiscalYearStartMonth && $currentDate->format('j') < $fiscalYearStartDay)) {
    $lastFiscalYear = ($currentYear - 2) . '-' . ($currentYear - 1);
} else {
    $lastFiscalYear = ($currentYear - 1) . '-' . $currentYear;
}
                          ?>
                            <h4><?=$no_student_last_year[0]['student_last_year_count']?></h4>
                            <h6>Student Last Year (<?= $lastFiscalYear?>)</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-calendar"></i>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $no_student_current_year= $this->student_model->student_current_year_count();
                            $currentDate = new DateTime();
                            $fiscalYearStartMonth = 4;
                            $fiscalYearStartDay = 1; 
                            $currentYear = $currentDate->format('Y');
                            if ($currentDate->format('n') < $fiscalYearStartMonth || ($currentDate->format('n') == $fiscalYearStartMonth && $currentDate->format('j') < $fiscalYearStartDay)) {
                                $fiscalYear = ($currentYear - 1) . '-' . $currentYear;
                            } else {
                                $fiscalYear = $currentYear . '-' . ($currentYear + 1);
                            }
                          ?>
                            <h4><?=$no_student_current_year[0]['student_current_year_count']?></h4>
                            <h6>Student Current Year(<?= $fiscalYear?>)</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url() ?>public/assets/images/vhp.jpg" class="center">
            </div>
            <div class="col-md-6">
                <img src="<?= base_url() ?>public/assets/images/sac_logo.jpg" class="center">
            </div>
        </div>
    </div>
</div>