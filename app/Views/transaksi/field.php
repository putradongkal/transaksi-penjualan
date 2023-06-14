
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= isset($transaksi) ? $transaksi['tanggal'] : date('Y-m-d') ?>" required autocomplete="off">
            <small class="form-text text-danger"><?= validation_show_error('tanggal') ?></small>
        </div>
        <div class="form-group">
            <label for="barang">Barang</label>
            <select name="id_barang" id="barang" class="form-control" required>
                <option value="">-Pilih Barang-</option>
                <?php foreach($barang as $brg): ?>
                    <option value="<?= $brg['id'] ?>" <?= isset($transaksi) ? $transaksi['id_barang'] == $brg['id'] ? 'selected' : '' : set_select('id_barang', $brg['id']) ?>><?= $brg['kode_barang'] ?> - <?= $brg['nama_barang'] ?></option>
                <?php endforeach ?>
            </select>
            <small class="form-text text-danger"><?= validation_show_error('id_barang') ?></small>
        </div>
        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" value="<?= isset($transaksi) ? $transaksi['qty'] : set_value('qty') ?>" min="1" required autocomplete="off">
            <small class="form-text text-danger"><?= validation_show_error('qty') ?></small>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        <a href="<?= base_url('transaksi') ?>" class="btn btn-outline-secondary waves-effect waves-light">Batal</a>
    </div>
</div>