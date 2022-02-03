<?= $this->extend('templates/dashboard_layout'); ?>
<?= $this->section('Content'); ?>

<main id="main" class="main">
    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('message') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/Customer/ManajemenCustomer">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Project Status Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card project-status-card">

                            <!-- <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div> -->

                            <div class="card-body">
                                <h5 class="card-title">Project Status</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bookmark-dash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Ongoing</h6>
                                        <span class="text-success small pt-1 fw-bold">Target:</span> <span class="text-muted small pt-2 ps-1">25 January 2022</span>
                                        <span class="text-success small pt-1 fw-bold">Status:</span> <span class="text-muted small pt-2 ps-1">Overdue</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Project Status Card -->

                    <!-- Membership Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card membership-card">
                            <div class="card-body">
                                <h5 class="card-title">Membership Status</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Active</h6>
                                        <span class="text-success small pt-1 fw-bold">Until:</span> <span class="text-muted small pt-2 ps-1">25 January 2022</span> <br>
                                        <span class="text-success small pt-1 fw-bold">Status:</span> <span class="text-muted small pt-2 ps-1">Active</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Membership Card -->



                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>