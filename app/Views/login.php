    <?php
    echo view('templet/admin/head');
    echo view('templet/admin/navbar');
    ?>
    <div class="container">
        <div class="row justify-content-center login-container">
            <div class="col-md-6 order-md-1">
                <h2 class="selamat-text">Selamat Datang</h2>
                <h5 class="text-meet"> Meeting room and Driver Booking System </h5>
            </div>

            <div class="col-md-6 order-md-2">
                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <script>
                        // Close the alert when the close button is clicked
                        document.querySelector('.alert .close').addEventListener('click', function() {
                            document.querySelector('.alert').style.display = 'none';
                        });
                    </script>
                <?php endif; ?>
                <form class="login-form" action="<?= site_url('auth/processLogin'); ?>" method="post">
                    <h2 class="login-text">Login</h2>
                    <div class="form-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tambahkan di tampilan halaman login -->

    <!-- Akhir bagian notifikasi -->