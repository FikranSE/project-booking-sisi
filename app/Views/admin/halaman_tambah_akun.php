<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">

  <div style="margin-left: 35px;">
    <?php if (isset($errors) && !empty($errors)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert"
      style="text-align: center; margin-left: 35px; margin-right: 50px;">
      <!-- Display each error message -->
      <?php foreach ($errors as $error) : ?>
      <small><?= esc($error) ?></small><br>
      <?php endforeach ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <!-- Add the following script -->
    <script>
    // Close the alert when the close button is clicked
    document.querySelector('.alert .close').addEventListener('click', function() {
      document.querySelector('.alert').style.display = 'none';
    });
    </script>
    <?php endif ?>

    <h2>Tambah Pengguna Baru</h2>
    <form class="styled-box-6" action="<?= site_url('admin/simpanAkun'); ?>" method="post">
      <div class="card-body">
        <div class="form-group row">
          <div class="col-sm-6 mb-3">
            <label for="username" style="color: #281362; font-weight: 600;">Username<sup
                class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="username" name="username"
              style="width: 80%; border-radius: 10px;" placeholder="Username" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="email" style="color: #281362; font-weight: 600;">E-mail<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="email" name="email" style="width: 80%; border-radius: 10px;"
              placeholder="E-mail" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nama" style="color: #281362; font-weight: 600;">Nama<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="nama" name="nama" style="width: 80%; border-radius: 10px;"
              placeholder="Nama" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="telp" style="color: #281362; font-weight: 600;">Telp<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="telp" name="telp" style="width: 80%; border-radius: 10px;"
              placeholder="Telp" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="password" style="color: #281362; font-weight: 600;">Password<sup
                class="text-danger">*</sup></label>
            <input type="password" class="form-control" id="password" name="password"
              style="width: 80%; border-radius: 10px;" placeholder="Password" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="konfirmpassword" style="color: #281362; font-weight: 600;">Konfirm Password<sup
                class="text-danger">*</sup></label>
            <input type="password" class="form-control" id="konfirmpassword" name="konfirmpassword"
              style="width: 80%; border-radius: 10px;" placeholder="Konfirm Password" required>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="role" style="color: #281362; font-weight: 600;">Role<sup class="text-danger">*</sup></label>
            <select class="form-control" id="role" name="role" style="width: 80%; border-radius: 10px;">
              <option value="admin">Admin</option>
              <option value="karyawan">Karyawan</option>
            </select>
          </div>
        </div>
        <div class="form-group row justify-content-between text-right">
          <div class="col-sm-6">
            <!-- <button class="btn btn-outline-primary" style="color: #281362; box-shadow: 2px 2px 5px #888888; border-radius: 20px;">Batal</button> -->
          </div>
          <div class="col-sm-6">
            <a class="btn btn-secondary" style="color: #ffffff;width: 100px; margin-right: 2%; border-radius: 20px;"
              href="User">Batal</a>
            <button class="btn btn-success"
              style="color: #ffffff;width: auto; margin-right: 20%; border-radius: 20px;">Simpan Perubahan</button>
          </div>

        </div>
      </div>
    </form>
  </div>
</main>
<?= $this->endSection(); ?>