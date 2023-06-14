<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Supplier</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="<?= base_url('supplier/tambah') ?>" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah Supplier</a>
                    </h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Supplier</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($supplier) == 0): ?>
                                    <tr>
                                        <td class="text-center" colspan="5">Data supplier belum tersedia</td>
                                    </tr>
                                <?php endif ?>
                                <?php $no = 1; foreach($supplier as $spl): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $spl['nama_supplier'] ?></td>
                                        <td><?= $spl['alamat'] ?></td>
                                        <td><?= $spl['nomor_telepon'] ?></td>
                                        <td class="text-right">
                                            <a href="<?= base_url('supplier/edit/' . $spl['id']) ?>" class="btn btn-primary btn-sm"><i class="bx bx-pencil"></i> Edit</a>
                                            <button class="btn btn-danger btn-sm btn-delete"><i class="bx bx-trash-alt"></i> Hapus</button>
                                            <?= form_open(base_url('supplier/hapus/' . $spl['id']), ['class' => 'form-delete']) ?><?= form_close() ?>
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