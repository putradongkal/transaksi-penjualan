<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Laporan Transaksi</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <form>
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control daterange-picker">
                                    <input type="hidden" class="form-control start-date" name="start_date">
                                    <input type="hidden" class="form-control end-date" name="end_date">
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-primary"><i class="bx bx-filter"></i> Tampilkan</button>
                                    <a href="<?= base_url('laporan-transaksi') ?>" class="btn btn-warning"><i class="bx bx-revision"></i> Refresh</a>
                                </div>
                            </div>
                        </form>
                    </h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Supplier</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($transaksi) == 0): ?>
                                    <tr>
                                        <td class="text-center" colspan="9">Laporan transaksi belum tersedia</td>
                                    </tr>
                                <?php endif ?>
                                <?php $no = 1; foreach($transaksi as $tr): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $tr['tanggal'] ?></td>
                                        <td><?= $tr['nomor_transaksi'] ?></td>
                                        <td><?= $tr['kode_barang'] ?> - <?= $tr['nama_barang'] ?></td>
                                        <td><?= $tr['nama_supplier'] ?></td>
                                        <td>Rp. <?= number_format($tr['harga']) ?></td>
                                        <td><?= number_format($tr['qty']) ?></td>
                                        <td>Rp<?= number_format($tr['total']) ?></td>
                                        <td><?= $tr['username'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('.daterange-picker').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            },
            startDate: '<?= $start_date ?>',
            endDate: '<?= $end_date ?>'
        },function(start, end, label) {
            $('.start-date').val(start.format('YYYY-MM-DD'));
            $('.end-date').val(end.format('YYYY-MM-DD'));
        });
    </script>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<?= $this->endSection() ?>