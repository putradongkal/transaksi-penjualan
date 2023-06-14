
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="kode-barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode-barang" placeholder="Masukkan kode barang" name="kode_barang" value="<?= isset($barang) ? $barang['kode_barang'] : old('kode_barang') ?>" minlength="3" maxlength="50" required autocomplete="off">
            <small class="form-text text-danger"><?= validation_show_error('kode_barang') ?></small>
        </div>
        <div class="form-group">
            <label for="nama-barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama-barang" placeholder="Masukkan nama barang" name="nama_barang" value="<?= isset($barang) ? $barang['nama_barang'] : set_value('nama_barang') ?>" minlength="3" maxlength="255" required autocomplete="off">
            <small class="form-text text-danger"><?= validation_show_error('nama_barang') ?></small>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                </div>
                <input type="text" id="harga" class="form-control price-format" placeholder="Harga" aria-label="Harga" name="harga" value="<?= isset($barang) ? $barang['harga'] : set_value('harga') ?>" aria-describedby="basic-addon1" required autocomplete="off">
            </div>
            <small class="form-text text-danger"><?= validation_show_error('harga') ?></small>
        </div>
        <div class="form-group">
            <label for="supplier">Supplier</label>
            <select name="id_supplier" id="supplier" class="form-control" required>
                <option value="">-Pilih Supplier-</option>
                <?php foreach($supplier as $sp): ?>
                    <option value="<?= $sp['id'] ?>" <?= isset($barang) ? $barang['id_supplier'] == $sp['id'] ? 'selected' : '' : set_select('id_supplier', $sp['id']) ?>><?= $sp['nama_supplier'] ?></option>
                <?php endforeach ?>
            </select>
            <small class="form-text text-danger"><?= validation_show_error('id_supplier') ?></small>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        <a href="<?= base_url('barang') ?>" class="btn btn-outline-secondary waves-effect waves-light">Batal</a>
    </div>
</div>