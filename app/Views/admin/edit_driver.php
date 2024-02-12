<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">
  <div style="margin-left: 35px;">
    <h2>Edit Data Driver</h2>
    <div class="card-body">
      <div class="col-sm-6 mb-3">
        <label for="Nama-ruangan" style="color: #281362; font-weight: 600;">Nama<sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="Nama-ruangan" name="Nama-ruangan" style="width: 80%; border-radius: 10px;">
      </div>
      <div class="col-sm-6 mb-3">
        <label for="Kapasitas" style="color: #281362; font-weight: 600;">Telp<sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="Kapasitas" name="Kapasitas" style="width: 80%; border-radius: 10px;">
      </div>
    </div>
    <div class="form-group row justify-content-between text-right">

      <div class="col-sm-6">
        <button class="btn btn-secondary" style="color: #ffffff;width: 100px; margin-right: 2%; border-radius: 20px;">Batal</button>
        <button class="btn btn-success" style="color: #ffffff; margin-right: 20%; border-radius: 20px">Simpan
          Perubahan</button>
      </div>

    </div>
  </div>
  </div>
</main>
<?= $this->endSection(); ?>