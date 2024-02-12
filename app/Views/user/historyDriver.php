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
        <a class="Historya mr-2" href="dashboard.html" style="margin-left: 20px;">Beranda</a>
        <a class="styled-box-3 " href="historyDriver.html" style="font-family: 'Poppins', sans-serif;">History</a>
        <a class="fas fa-user-circle" href="profile.html" style="font-size: 30px; margin-left: 15px;margin-top: 4px;"></a>
    </div>
</nav>

<body>
    <div class="col-md-6 order-md-2 d-flex">
        <a class="Ruangan1" href="historyRuangan.html">
            <i class="fa-solid fa-door-open mr-2"></i> Meeting Room
        </a>
        <a class="Driver" href="historyDriver.html">
            <i class="fa-solid fa-car mr-2"></i> Driver
        </a>
    </div>
    <form class="styled-box-6">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="_length">
                        <label> Tampilkan
                            <select name="_length" aria-controls="" class="form-control input-sm" data-gtm-form-interact-field-id="0">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="80">80</option>
                            </select>
                            Entri
                        </label>
                    </div>
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
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Ruangan</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>PIC</th>
                            <th>Section</th>
                            <th>Destinasi</th>
                            <th>Status</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="small-text">15 Januari 2024</td>
                            <td class="small-text">Meeting Room 2</td>
                            <td class="small-text">09.00</td>
                            <td class="small-text">12.00</td>
                            <td class="small-text">Husna Afiqah Y</td>
                            <td class="small-text">Husna Afiqah Y</td>
                            <td class="small-text">Manggarai</td>
                            <td class="small-text">Booking</td>
                        </tr>
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