<?php
echo view('templet/admin/head');
?>

<body>
    <nav aria-label="Main" class="navbar navbar--fixed-top">
        <div class="navabr__inner" style="height: 70px;">
            <a class="navbar__brand">
                <div class="navbra__logo">
                    <img src="https://sisi.id/wp-content/uploads/2019/07/Logo-SISI-new-1-300x153-1.png" alt="SISI - Sinergi Informatika Semen Indonesia" id="logo" data-height-percentage="54" data-actual-width="300" data-actual-height="153">
                </div>
            </a>
        </div>
        <div class="col-md-6 order-md-2 ml-auto d-flex justify-content-end">
            <a class="Historyaa" href="dashboard.html">Beranda</a>
            <a class="Historyaa" href="historyDriver.html" style="font-family: 'Poppins', sans-serif;">History</a>
            <a class="fas fa-user-circle" href="profile.html" style="font-size: 30px; margin-top: 4px;"></a>
        </div>
    </nav>
    <script>
        function openFileInput() {
            document.getElementById('fileInput').click();
        }

        function displaySelectedFile() {
            const fileInput = document.getElementById('fileInput');
            const fileNameDisplay = document.getElementById('fileNameDisplay');

            if (fileNameDisplay) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            }
        }
    </script>

    <h3 class="profile-text profile-content" style="margin-left: 10%;">Profile User</h3>
    <div class="profile-content">
        <div class="left-section">
            <img class="poto" src="public/Ellipse 9.png">
            <button type="button" class="bttn" onclick="openFileInput()" style="font-size: 70%;">Ubah Foto Profile</button>
            <input type="file" name="profile_image" id="fileInput" style="display: none;" accept="image/*" onchange="displaySelectedFile()">
            <a class="ckck" href="ubahpassword.html">ubah password</a>
        </div>

        <form class="form-group-ya">
            <div class="input">
                <label class="txt" for="username">Username</label>
                <input type="text" id="username" name="username" class="form-cek">
            </div>
            <div class="input">
                <label class="txt" for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-cek">
            </div>
            <div class="input">
                <label class="txt" for="nama">E-mail</label>
                <input type="text" id="nama" name="nama" class="form-cek">
            </div>
            <div class="input">
                <label class="txt" for="telp">Telp</label>
                <input type="text" id="telp" name="telp" class="form-cek">
            </div>
            <div class="inputt" style="margin-right: 35%;">
                <button class="bttn-simpan">Simpan</button>
            </div>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>