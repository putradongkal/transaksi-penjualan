<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Selamat Datang, <?= user()->username ?></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bxs-truck float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Supplier</h6>
                    <h3 class="mb-3" data-plugin="counterup"><?= number_format($jml_supplier) ?></h3>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-data float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Barang</h6>
                    <h3 class="mb-3"><span data-plugin="counterup"><?= number_format($jml_barang) ?></span></h3>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-bx bx-transfer float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Transaksi</h6>
                    <h3 class="mb-3"><span data-plugin="counterup"><?= number_format($jml_transaksi) ?></span></h3>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>