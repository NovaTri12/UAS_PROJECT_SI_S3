<?php 
$session      = session();
$username     = $session->get('username');
$email        = $session->get('email');
$name         = $session->get('name');
$address      = $session->get('address');
$phone_number = $session->get('phone_number');
$role         = $session->get('role');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - <?php echo ($role == null ? 'Customer' : 'Back Office'); ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>/dashboard/img/favicon.png" rel="icon">
    <link href="<?php echo base_url() ?>/dashboard/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/dashboard/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/dashboard/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/dashboard/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/dashboard/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/dashboard/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/dashboard/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>/dashboard/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <!-- <img src="<?php //echo base_url()
                                ?>/dashboard/img/logo.png" alt=""> -->
                <span class="d-none d-lg-block">Manajemen <?php echo ($role == null ? 'Customer' : 'Back Office'); ?></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!-- <img src="<?php echo base_url() ?>/dashboard/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $name; ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $name; ?></h6>
                            <span><?php echo $email; ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <?php
                        if ($role == null) :
                        ?>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('customer/logout')?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                        <?php else : ?>
                            <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('admin/logout')?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                        <?php endif;?>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <?php
            if ($role == null) :
            ?>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/Customer/ManajemenCustomer">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/Customer/OrderCustomer">
                        <i class="bi bi-basket"></i>
                        <span>Order</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/Customer/Membership">
                        <i class="bi bi-person-check"></i>
                        <span>Manage Membership</span>
                    </a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/Admin/ManajemenAdmin">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/manage-admin/customer">
                        <i class="bi bi-people"></i>
                        <span>Customer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/manage-admin/order">
                        <i class="bi bi-basket"></i>
                        <span>Order</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/manage-admin/kategori-project">
                        <i class="bi bi-card-list"></i>
                        <span>Kategori Project</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/manage-admin/project">
                        <i class="bi bi-code"></i>
                        <span>Project</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/manage-admin/membership">
                        <i class="bi bi-person-check"></i>
                        <span>Membership</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/manage-admin/portfolio">
                        <i class="bi bi-archive"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>/manage-admin/user">
                        <i class="bi bi-person-circle"></i>
                        <span>User</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

    </aside><!-- End Sidebar-->

    <?php echo $this->renderSection('Content'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() ?>/dashboard/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url() ?>/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/dashboard/vendor/chart.js/chart.min.js"></script>
    <script src="<?php echo base_url() ?>/dashboard/vendor/echarts/echarts.min.js"></script>
    <script src="<?php echo base_url() ?>/dashboard/vendor/quill/quill.min.js"></script>
    <script src="<?php echo base_url() ?>/dashboard/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo base_url() ?>/dashboard/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url() ?>/dashboard/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() ?>/dashboard/js/main.js"></script>

</body>

</html>