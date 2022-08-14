<?php $this->extend('template') ?>

<?php $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url() ?>/css/style.css" />
<div class="row">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Welcome
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class=" alert-dismissible">
                    <h5 class="h3 mb-2 text-gray-10 error" data-text="Hai">Hai</h5>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Perhatian
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Semoga Sukses!</h5>
                    <strong> " Semangat dan berjuang untuk sebuah harapan dan masa depan !! " </strong>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="mt-2">
    <a href="#" class="btn btn-info btn-icon-split btn-sm">
        <span class="icon text-white-50">
            <i class="fas fa-flag"></i>
        </span>
        <span class="text">Welcome to Landing Page</span>
    </a>
</div>

<div class="body">
    <div class="slider">
        <div class="slide-track">
            <div class="slide">
                <img src="<?= base_url() ?>/img/img1.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img2.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img3.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img4.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img5.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img6.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img7.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img8.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img9.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img1.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img2.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img3.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img4.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img5.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img6.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img7.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img8.jpg" alt="">
            </div>
            <div class="slide">
                <img src="<?= base_url() ?>/img/img9.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- <div class="card-body">
    
    <div class="row"> -->

<!-- Earnings (Monthly) Card Example -->
<!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<!-- Earnings (Annual) Card Example -->
<!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<!-- Tasks Card Example -->
<!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<!-- Pending Requests Card Example -->
<!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<!-- </div>
</div> -->
<?php $this->endSection() ?>