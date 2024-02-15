<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>

<main class="main-content">
    <div style="margin-left: 35px;">

        <form class="styled-box-6" action="<?= site_url('admin/save_password/' . $users['username']); ?>" method="post">
            <div class="card-body">

                <h5>Ubah Password: <?= $users['nama']; ?></h5>
                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <label for="password" style="color: #281362; font-weight: 600;">Password</label>
                        <input type="password" class="form-control" id="password" name="password" style="width: 80%; border-radius: 10px;" required>
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