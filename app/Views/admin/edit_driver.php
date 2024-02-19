<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>

<main class="main-content">
  <div style="margin-left: 35px;">
    <h2>Edit Data Driver</h2>
    <div class="card-body">
      <form method="post" action="<?= site_url('admin/update_driver/' . $driver['id_driver']) ?>">
        <div class="col-sm-6 mb-3">
          <label for="Nama" style="color: #281362; font-weight: 600;">Nama<sup class="text-danger">*</sup></label>
          <input type="text" class="form-control" id="nama" name="nama" style="width: 80%; border-radius: 10px;" placeholder="Nama Driver" value="<?= set_value('nama', $driver['nama_driver']); ?>">
          <?= isset($validation) ? '<div class="text-danger">' . $validation->getError('nama') . '</div>' : ''; ?>
        </div>
        <div class="col-sm-6 mb-3">
          <label for="telp" style="color: #281362; font-weight: 600;">Telp<sup class="text-danger">*</sup></label>
          <input type="text" class="form-control" id="telp" name="telp" style="width: 80%; border-radius: 10px;" placeholder="Telp Driver" value="<?= set_value('telp', $driver['telp']); ?>">
          <?= isset($validation) ? '<div class="text-danger">' . $validation->getError('telp') . '</div>' : ''; ?>
        </div>
        <div class="form-group row justify-content-between text-right">
          <div class="col-sm-6">
            <button class="btn btn-secondary" style="color: #ffffff;width: 100px; margin-right: 2%; border-radius: 20px;">Batal</button>
            <button type="submit" class="btn btn-success" style="color: #ffffff; margin-right: 20%; border-radius: 20px">Simpan Perubahan</button>
          </div>
        </div>
      </form>
      <?= isset($success) ? '<div class="text-success">' . $success . '</div>' : ''; ?>
      <?= isset($error) ? '<div class="text-danger">' . $error . '</div>' : ''; ?>
    </div>
  </div>
</main>
<?= $this->endSection(); ?>