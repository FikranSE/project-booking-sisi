<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>

<main class="main-content">
  <div style="margin-left: 35px;">
    <h2>Edit Data Pengguna</h2>
    <form class="styled-box-6" action="<?= site_url('admin/update_akun/' . $users['username']); ?>" method="post">
      <div class="card-body">
        <div class="form-group row">
          <div class="col-sm-6 mb-3">
            <label for="username" style="color: #281362; font-weight: 600;">Username</label>
            <input type="text" class="form-control" id="username" name="username" style="width: 80%; border-radius: 10px;" value="<?= set_value('username', $users['username']); ?>">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="email" style="color: #281362; font-weight: 600;">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" style="width: 80%; border-radius: 10px;" value="<?= set_value('email', $users['email']); ?>">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="nama" style="color: #281362; font-weight: 600;">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" style="width: 80%; border-radius: 10px;" value="<?= set_value('nama', $users['nama']); ?>">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="telp" style="color: #281362; font-weight: 600;">Telp</label>
            <input type="text" class="form-control" id="telp" name="telp" style="width: 80%; border-radius: 10px;" value="<?= set_value('telp', $users['telp']); ?>">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="telp" style="color: #281362; font-weight: 600;">Jataban</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" style="width: 80%; border-radius: 10px;" value="<?= set_value('jabatan', $users['jabatan']); ?>">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="role" style="color: #281362; font-weight: 600;">Role</label>
            <select class="form-control" id="role" name="role" style="width: 80%; border-radius: 10px;" value="<?= set_value('role', $users['role']); ?>">
              <option value="" selected disabled>Pilih Role</option>  
              <option value="admin">Admin</option>
              <option value="karyawan">Karyawan</option>
            </select>
          </div>

          <div class="col-sm-6 mb-3">
            <li>
              <a href="<?= site_url('admin/update_password/' . $users['username']); ?>" data-dt-idx="0" tabindex="0">Ubah Password</a>
            </li>
          </div>
        </div>

        <div class="form-group row justify-content-between text-right">
          <div class="col-sm-6">
            <!-- <button class="btn btn-outline-primary" style="color: #281362; box-shadow: 2px 2px 5px #888888; border-radius: 20px;">Batal</button> -->
          </div>
          <div class="col-sm-6">
            <a class="btn btn-secondary" href="User" style="color: #ffffff;width: 100px; margin-right: 2%; border-radius: 20px;">Batal</a>
            <button class="btn btn-success" style="color: #ffffff;width: auto; margin-right: 20%; border-radius: 20px;">Simpan Perubahan</button>
          </div>

        </div>
      </div>
    </form>
  </div>
</main>
<?= $this->endSection(); ?>