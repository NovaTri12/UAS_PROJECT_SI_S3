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
        <h1>Edit Data Customer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/manage-admin/kategori-project">Home</a></li>
                <li class="breadcrumb-item active">Edit Data Project Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Data</h5>
                        <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $category['id_project_category']; ?>" />
                            <div class="row mb-3">
                                <label for="category_name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input name="category_name" id="category_name" type="text" class="form-control" value="<?= $category['category_name']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>