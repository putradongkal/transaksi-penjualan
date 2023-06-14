
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama-supplier">Nama Supplier</label>
            <input type="text" class="form-control" id="nama-supplier" placeholder="Masukkan nama supplier" name="nama_supplier" value="<?= isset($supplier) ? $supplier['nama_supplier'] : set_value('nama_supplier') ?>" minlength="3" maxlength="255" required autocomplete="off">
            <small class="form-text text-danger"><?= validation_show_error('nama_supplier') ?></small>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" placeholder="Masukkan alamat supplier" name="alamat" minlength="5" required autocomplete="off"><?= isset($supplier) ? $supplier['alamat'] : set_value('alamat') ?></textarea>
            <small class="form-text text-danger"><?= validation_show_error('alamat') ?></small>
        </div>
        <div class="form-group">
            <label for="nomor-telepon">Nomor Telepon</label>
            <input type="text" class="form-control phone-number" id="nomor-telepon" placeholder="Masukkan nnomor telepon" name="nomor_telepon" value="<?= isset($supplier) ? $supplier['nomor_telepon'] : set_value('nomor_telepon') ?>" required autocomplete="off">
            <small class="form-text text-danger"><?= validation_show_error('nomor_telepon') ?></small>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        <a href="<?= base_url('supplier') ?>" class="btn btn-outline-secondary waves-effect waves-light">Batal</a>
    </div>
</div>