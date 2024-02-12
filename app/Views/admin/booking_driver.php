<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">

  <div class="haloa">
    <h2> Booking Driver</h2>
    <div class="search-container">
      <i class="fas fa-search"></i>
      <input type="text" id="search" placeholder="Ketik kata kunci..." style="height: 10%; font-size:small;">
    </div>
  </div>
  <form class="styled-box-6">
    <div class="table-responsive">
      <table role="table" aria-busy="false" aria-colcount="6"
        class="table b-table table-striped table-hover table-borderless border b-table-fixed b-table-stacked-sm custom-table"
        id="__BVID__56">
        <thead class="thead-blue">
          <tr>
            <th style="text-align: center;">No.</th>
            <th style="text-align: center;">Kode Booking</th>
            <th style="text-align: center;">PIC</th>
            <th style="text-align: center;">Tanggal</th>
            <th style="text-align: center;">Jam</th>
            <th style="text-align: center;">Destinasi</th>
            <th style="text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($bookingDrivers)) : ?>
          <?php foreach ($bookingDrivers as $key => $bookingDriver) : ?>
          <tr>
            <td style="text-align: center;"><?php echo $key + 1; ?></td>
            <td class="small-text" style="text-align: center;"><?php echo $bookingDriver['id_booking_driver']; ?></td>
            <td class="small-text" style="text-align: center;"><?php echo $bookingDriver['nama']; ?></td>
            <td class="small-text" style="text-align: center;"><?php echo $bookingDriver['tanggal']; ?></td>
            <td class="small-text" style="text-align: center;">
              <?php echo calculateTotalJam($bookingDriver['jam_mulai'], $bookingDriver['jam_selesai']); ?></td>
            <td class="small-text" style="text-align: center;"><?php echo $bookingDriver['destinasi']; ?></td>
            <td class="small-text">
              <div class="icon-container">
                <a href="<?= site_url('admin/detail_booking_driver/' . $bookingDriver['id_booking_driver']); ?>">
                  <i class="fa-solid fa-eye"></i>
                </a>
                <a href="<?= site_url('admin/delete_booking/' . $bookingDriver['id_booking_driver']) ?>"
                  onclick="return confirm('Apakah Anda yakin ingin menghapus Data ini?')">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php else : ?>
          <tr>
            <td colspan="6" style="text-align: center;">tidak ada request booking driver</td>
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
</main>
<?= $this->endSection('content'); ?>
<?php
function calculateTotalJam($jamMulai, $jamSelesai)
{
  $timeStart = strtotime($jamMulai);
  $timeEnd = strtotime($jamSelesai);

  $hours = ($timeEnd - $timeStart) / 3600;

  return $hours;
}
?>