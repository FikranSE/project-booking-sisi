<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">
  <div style="margin-left: 35px;">
    <h2>Edit Data Pengguna</h2>
    <form class="styled-box-6">
      <div class="card-body">
        <div class="form-group row">
          <div class="col-sm-6 mb-3">
            <label for="username" style="color: #281362; font-weight: 600;">Username</label>
            <input type="text" class="form-control" id="username" name="username" style="width: 80%; border-radius: 10px;">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="email" style="color: #281362; font-weight: 600;">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" style="width: 80%; border-radius: 10px;">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nama" style="color: #281362; font-weight: 600;">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" style="width: 80%; border-radius: 10px;">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="telp" style="color: #281362; font-weight: 600;">Telp</label>
            <input type="text" class="form-control" id="telp" name="telp" style="width: 80%; border-radius: 10px;">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="password" style="color: #281362; font-weight: 600;">Password</label>
            <input type="password" class="form-control" id="password" name="password" style="width: 80%; border-radius: 10px;">
          </div>

          <div class="col-sm-6 mb-3">
            <label for="role" style="color: #281362; font-weight: 600;">Role</label>
            <select class="form-control" id="role" name="role" style="width: 80%; border-radius: 10px;">
              <option value="admin">Admin</option>
              <option value="karyawan">User</option>
            </select>
          </div>
        </div>
        <div class="form-group row justify-content-between text-right">
          <div class="col-sm-6">
            <!-- <button class="btn btn-outline-primary" style="color: #281362; box-shadow: 2px 2px 5px #888888; border-radius: 20px;">Batal</button> -->
          </div>
          <div class="col-sm-6">
            <button class="btn btn-secondary" style="color: #ffffff;width: 100px; margin-right: 2%; border-radius: 20px;">Batal</button>
            <button class="btn btn-success" style="color: #ffffff;width: auto; margin-right: 20%; border-radius: 20px;">Simpan Perubahan</button>
          </div>

        </div>
      </div>
    </form>
  </div>
</main>
<?= $this->endSection(); ?>