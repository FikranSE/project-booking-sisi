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
        <a class="Historya mr-2" href="dashboard" style="margin-left: 20px;">Beranda</a>
        <a class="styled-box-3 " href="historyDriver" style="font-family: 'Poppins', sans-serif;">History</a>
        <a class="fas fa-user-circle" href="profile" style="font-size: 30px; margin-left: 15px;margin-top: 4px;"></a>
    </div>
</nav>

<body>
    <div class="col-md-6 order-md-2 d-flex">
        <a class="Ruangan" href="historyRuangan">
            <i class="fa-solid fa-door-open mr-2"></i> Meeting Room
        </a>
        <a class="Driver1" href="historyDriver">
            <i class="fa-solid fa-car mr-2"></i> Driver
        </a>
    </div>
    <form class="styled-box-6">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="_length">
                        <!-- <label> Tampilkan
                            <select name="_length" aria-controls="" class="form-control input-sm" data-gtm-form-interact-field-id="0">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="80">80</option>
                            </select>
                            Entri
                        </label> -->
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
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Ruangan</th>
                            <th style="text-align: center;">Jam</th>
                            <th style="text-align: center;">PIC</th>
                            <th style="text-align: center;">Section</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($history) && !empty($history)): ?>
            <?php foreach($history as $index => $item): ?>
                <tr>
                    <td style="text-align: center;"><?= $index + 1; ?></td>
                    <td style="text-align: center;"><?= esc($item['tanggal']); ?></td>
                    <td style="text-align: center;"><?= esc($item['nama_ruangan']); ?></td>
                    <td  style="text-align: center;"><?= esc($item['jam_mulai'] .' - ' . $item['jam_selesai']); ?></td>
                    <td style="text-align: center;"><?= esc($item['nama']); ?></td>
                    <td style="text-align: center;"><?= esc($item['section']); ?></td>
                    <td style="text-align: center;">
                        <?php if ($item['status'] == 'pending'): ?>
                            <button style="background-color: yellow; color: black; padding: 5px 10px; border: none; cursor: default; border-radius: 10px;">Pending</button>
                        <?php elseif ($item['status'] == 'setuju'): ?>
                            <button style="background-color: green; color: white; padding: 5px 10px; border: none; cursor: default; border-radius: 10px;">Setuju</button>
                        <?php elseif ($item['status'] == 'tolak'): ?>
                            <button style="background-color: red; color: white; padding: 5px 10px; border: none; cursor: default; border-radius: 10px;">Tolak</button>
                        <?php endif; ?>
                    </td>
                    <td class="small-text" style="text-align: center;">
                        <?php if ($item['status'] == 'setuju'): ?>
                        <a href="<?= base_url('user/batalkanBookingRuangan/'.$item['id_booking_ruangan']); ?>" onclick="return confirm('Apakah Anda yakin ingin membatalkan booking ini?');" class="btn btn-secondary btn-sm">Batal</a> 
                        <?php elseif ($item['status'] == 'pending'): ?>
                        <a href="<?= base_url('user/batalkanBookingRuangan/'.$item['id_booking_ruangan']); ?>" onclick="return confirm('Apakah Anda yakin ingin membatalkan booking ini?');" class="btn btn-secondary btn-sm">Batal</a>
                        <?php endif; ?>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">Tidak ada data tersedia</td>
            </tr>
        <?php endif; ?>
                      
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