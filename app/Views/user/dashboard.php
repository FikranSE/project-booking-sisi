<?php
echo view('templet/admin/head');
?>

<nav aria-label="Main" class="navbar navbar--fixed-top">
    <div class="navabr__inner" style="height: 70px;">
        <a class="navbar__brand">
            <div class="navbra__logo">
                <img src="https://sisi.id/wp-content/uploads/2019/07/Logo-SISI-new-1-300x153-1.png" alt="SISI - Sinergi Informatika Semen Indonesia" id="logo" data-height-percentage="54" data-actual-width="300" data-actual-height="153">
            </div>
        </a>
    </div>
    <div class="col-md-6 order-md-2 ml-auto d-flex justify-content-end">
        <a class="styled-box-3 mr-2" href="dashboard" style="margin-left: 20px;">Beranda</a>
        <a class="Historya" href="historyRuangan" style="font-family: 'Poppins', sans-serif;">History</a>
        <a class="fas fa-user-circle" href="profile" style="font-size: 30px; margin-left: 15px;margin-top: 4px;"></a>
    </div>
</nav>

<body>

    <div class="styled-box">
        <div class="col-md-6 order-md-1">
            <h2 class="dashbord-text">Meeting Room and Driver Booking System</h2>
        </div>
        <div class="col-md-6 order-md-2 d-flex">
            <a class="styled-box-4" href="dashboard">
                <i class="fa-solid fa-door-open mr-2"></i> Meeting Room
            </a>
            <a class="driveryaa" href="bookingdriver">
                <i class="fa-solid fa-car mr-2"></i> Driver
            </a>
        </div>
        <form class="styled-box-2" action="<?= site_url('dashboard/bookRoom'); ?>" method="post" >
            <div class="card-body">
                <div class="form-group3 row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="PIC"> PIC <sup class="text-danger">*</sup> </label>
                        <input type="text" class="form-control-PIC" id="pic" name="pic" value="<?= session()->get('nama') ?>" required style="width: 80%;" >
                    </div>
                    <div class="col-sm-6">
                        <label for="Section"> Section <sup class="text-danger">*</sup> </label>
                        <input type="text" class="form-control-PIC" id="section" name="section"  required style="width: 80%;">

                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Agenda"> Agenda <sup class="text-danger">*</sup> </label>
                        <input type="text" class="form-control-PIC" id="agenda" name="agenda" required style="width: 80%;">
                    </div>
                    <div class="col-sm-6">
                        <label for="Tanggal"> Tanggal <sup class="text-danger">*</sup> </label>
                        <input type="date" class="form-control-PIC" id="tanggal" name="tanggal" required style="width: 80%;">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="JamMulai"> Jam Mulai <sup class="text-danger">*</sup> </label>
                        <input type="time" class="form-control-PIC" id="jam_mulai" name="jam_mulai" required style="width: 80%;">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="JamSelesai"> Jam Selesai <sup class="text-danger">*</sup> </label>
                        <input type="time" class="form-control-Agenda" id="JamSelesai" name="jam_selesai" required style="width: 80%;">
                    </div>
                    <div class="col-sm-6">
                        <label for="Keterangan"> Keterangan  </label>
                        <input type="text" class="form-control-Keterangan" id="Keterangan" name="keterangan"  style="width: 187%;">
                    </div>

                </div>
                <button type="submit" class="button-booking">
                    Book Now
                </button>
            </div>
        </form>


        <form class="styled-box-6">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- <div class="dataTables_length" id="_length">
                            <label> Tampilkan
                                <select name="_length" aria-controls="" class="form-control input-sm" data-gtm-form-interact-field-id="0">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="80">80</option>
                                </select>
                                Entri
                            </label>
                        </div> -->
                    </div>
                    <div class="col-sm-6 search-container">
                        <div id="" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control input-sm" placeholder="Cari Item" aria-controls="">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table role="table" aria-busy="false" aria-colcount="6" class="table b-table table-striped table-hover table-borderless border b-table-fixed b-table-stacked-sm custom-table" id="__BVID__56">
                        <thead class="thead-blue">
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Tanggal</th>
                                <th style="text-align: center;">Ruangan</th>
                                <th style="text-align: center;">Jam Mulai</th>
                                <th style="text-align: center;">Jam Selesai</th>
                                <th style="text-align: center;">PIC</th>
                                <th style="text-align: center;">Section</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php  $counter = 1; ?>
                            <?php foreach ($bookings as $booking): ?>
                            <tr>
                                <td style="text-align: center;"><?= $counter++; ?></td>
                                <td style="text-align: center;"><?= esc($booking['tanggal']); ?></td>
                                <td style="text-align: center;"><?= esc($booking['nama_ruangan']); ?></td>
                                <td style="text-align: center;"><?= esc($booking['jam_mulai']); ?></td>
                                <td style="text-align: center;"><?= esc($booking['jam_selesai']); ?></td>
                                <td style="text-align: center;"><?= esc($booking['nama']); ?></td>
                                <td style="text-align: center;"><?= esc($booking['section']); ?></td>
                            </tr>
                            <?php endforeach; ?>          
                        </tbody>
                    </table>
                </div>
                <div class="pagination-container">
                    <div class="" id="">
                        <ul class="pagination">
                            <li class="sebelumnya" id=""><a href="#" aria-controls="" data-dt-idx="0" tabindex="0">Sebelumnya</a></li>
                            <li class="angka"><a href="#" aria-controls="" data-dt-idx="1" tabindex="0" style="color: #fff;">1</a></li>
                            <li class="selanjutnya" id=""><a href="#" aria-controls="" data-dt-idx="8" tabindex="0">Selanjutnya</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
        

    </div>

</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</html>