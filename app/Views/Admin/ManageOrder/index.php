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
        <h1>Data Order</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/Customer/ManajemenCustomer">Home</a></li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table Data Order</h5>
                        <!-- <a class="btn btn-primary" href="<?= base_url('manage-admin/customer/new') ?>">Tambah Data</a> -->

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Membership Name</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Project Category</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Project Applied</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Update Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($order as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['membership_name'] ?></td>
                                        <td><?= $row['project_name'] ?></td>
                                        <td><?= $row['category_name'] ?></td>
                                        <td><?= $row['quantity'] ?></td>
                                        <td>Rp. <?= $row['total_price'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td><?php
                                            if ($row['status'] == 0) :
                                                echo "Pending";
                                            ?>
                                            <?php
                                            elseif ($row['status'] == 1) :
                                                echo "On Progress";

                                            ?>
                                            <?php elseif ($row['status'] == 2) :
                                                echo "Done";

                                            endif;
                                            ?>
                                        </td>
                                        <td>
                                            <form action="<?= base_url('manage-admin/order/' . $row['id_order_details'] . '/edit/'); ?>" method="post" id="text-editor">
                                                <input type="hidden" name="id" value="<?= $row['id_order_details']; ?>" />
                                                <div class="form-group">
                                                    <button type="submit" name="status" value="0" class="btn btn-warning">Pending</button>
                                                    <button type="submit" name="status" value="1" class="btn btn-secondary">On Progress</button>
                                                    <button type="submit" name="status" value="2" class="btn btn-primary">Done</button>
                                                </div>
                                            </form>
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