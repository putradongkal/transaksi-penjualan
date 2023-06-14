<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Transaksi</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah Transaksi</a>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($transaksi) == 0): ?>
                                    <tr>
                                        <td class="text-center" colspan="10">Transaksi belum tersedia</td>
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
                                        <td class="text-right">
                                            <a href="<?= base_url('transaksi/edit/' . $tr['id']) ?>" class="btn btn-primary btn-sm"><i class="bx bx-pencil"></i> Edit</a>
                                            <button class="btn btn-danger btn-sm btn-delete"><i class="bx bx-trash-alt"></i> Hapus</button>
                                            <?= form_open(base_url('transaksi/hapus/' . $tr['id']), ['class' => 'form-delete']) ?><?= form_close() ?>
                                        </td>
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