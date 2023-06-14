<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Barang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Barang</a></li>
                        <!-- <li class="breadcrumb-item active">Starter</li> -->
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah Barang</a>
                    </h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Supplier</th>
                                    <th>User</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($barang) == 0): ?>
                                    <tr>
                                        <td class="text-center" colspan="7">Data barang belum tersedia</td>
                                    </tr>
                                <?php endif ?>
                                <?php $no = 1; foreach($barang as $brg): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $brg['kode_barang'] ?></td>
                                        <td><?= $brg['nama_barang'] ?></td>
                                        <td>Rp. <?= number_format($brg['harga']) ?></td>
                                        <td><?= $brg['nama_supplier'] ?></td>
                                        <td><?= $brg['username'] ?></td>
                                        <td class="text-right">
                                            <a href="<?= base_url('barang/edit/' . $brg['id']) ?>" class="btn btn-primary btn-sm"><i class="bx bx-pencil"></i> Edit</a>
                                            <button class="btn btn-danger btn-sm btn-delete"><i class="bx bx-trash-alt"></i> Hapus</button>
                                            <?= form_open(base_url('barang/hapus/' . $brg['id']), ['class' => 'form-delete']) ?><?= form_close() ?>
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