<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">
  <div style="margin-left: 35px;">
    <h2>Tambah Data Driver</h2>
    <form action="<?= site_url('admin/simpan_driver'); ?>" method="post">
      <div class="card-body">
        <div class="form-group">
          <div class="col-sm-6 mb-3">
            <label for="Nama-driver" style="color: #281362; font-weight: 600;">Nama<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="Nama-driver" name="nama" style="width: 80%; border-radius: 10px;" placeholder="Nama Driver" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="telp" style="color: #281362; font-weight: 600;">Telp<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="telp" name="telp" style="width: 80%; border-radius: 10px;" placeholder="Telp Driver" required>
          </div>
        </div>
        <div class="form-group row justify-content-between text-right">
          <div class="col-sm-6">
            <a class="btn btn-secondary" style="color: #ffffff;width: 100px; margin-right: 2%; border-radius: 20px;" href="<?= site_url('admin/driver'); ?>">Batal</a>
            <button type="submit" class="btn btn-success" style="color: #ffffff; margin-right: 20%; border-radius: 20px">Simpan</button>
          </div>
        </div>
    </form>
  </div>
</main>
<?= $this->endSection(); ?>