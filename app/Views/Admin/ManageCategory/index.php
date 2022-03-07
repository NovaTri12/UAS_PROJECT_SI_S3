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
        <h1>Data Project Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/Customer/ManajemenCustomer">Home</a></li>
                <li class="breadcrumb-item active">Project Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table Data Project Category</h5>
                        <a class="btn btn-primary" href="<?= base_url('manage-admin/kategori-project/new')?>">Tambah Data</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Project Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($category as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row['category_name'] ?></td>
                                        <td>
                                            <a title="Edit" href="<?= base_url('manage-admin/kategori-project/'.$row['id_project_category'].'/edit/'); ?>" class="btn btn-info">Edit</a>
                                            <a title="Delete" href="<?= base_url('manage-admin/kategori-project/'.$row['id_project_category'].'/delete/') ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>