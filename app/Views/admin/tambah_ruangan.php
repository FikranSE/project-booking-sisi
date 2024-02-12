<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">
  <div style="margin-left: 35px;">
    <h2>Tambah Data Ruangan</h2>
    <form action="<?= site_url('admin/simpan_ruangan'); ?>" method="post">
      <div class="card-body">
        <div class="form-group row">
          <div class="col-sm-6 mb-3">
            <label for="Nama-ruangan" style="color: #281362; font-weight: 600;">Nama Ruangan <sup
                class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="nama" name="nama" style="width: 80%; border-radius: 10px;"
              placeholder="Nama Ruangan">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="Kapasitas" style="color: #281362; font-weight: 600;">Kapasitas <sup
                class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="kapasitas" name="kapasitas"
              style="width: 80%; border-radius: 10px;" placeholder="Kapasitas">
          </div>
          <div class="col-sm-12 mb-3">
            <label for="fasilitas" style="color: #281362; font-weight: 600;">fasilitas <sup
                class="text-danger">*</sup></label>
            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3"
              style="width: 90%; border-radius: 10px;" placeholder="Fasilitas"></textarea>
          </div>
        </div>

        <div class="form-group row justify-content-between text-right">
          <div class="col-sm-6">
            <!-- <button class="btn btn-outline-primary" style="color: #281362; box-shadow: 2px 2px 5px #888888; border-radius: 20px;">Batal</button> -->
          </div>
          <div class="col-sm-6">
            <a id="btnBatal" class="btn btn-secondary"
              style="color: #ffffff; width: 100px; margin-right: 2%; border-radius: 20px;" href="ruangan">Batal</a>
            <button class="btn btn-success"
              style="color: #ffffff; margin-right: 20%; border-radius: 20px">Simpan</button>
          </div>

        </div>
      </div>
  </div>
</main>
<?= $this->endSection(); ?>