<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">
  <ul class="box-info">
    <li>
      <i class="fa-solid fa-door-open" style="color: #ffffff;"></i>
      <span class="text">
        <h3 style="text-align: center;"><?= $totalBookingRuangan ?></h3>
        <p style="text-align: center;">Total Booking Ruangan</p>
      </span>
    </li>
    <li style="background: #BEBFC0;">
      <i class="fa-solid fa-car"></i>
      <span class="text">
        <h3 style="text-align: center;"><?= $totalBookingdriver ?></h3>
        <p style="text-align: center;">Total Booking Driver</p>
      </span>
    </li>
    <li style="background: #F06823;">
      <i class="fa-regular fa-file" style="color: #ffffff;"></i>
      <span class="text">
        <h3 style="text-align: center;"><?= $totalActivities ?></h3>
        <p style="text-align: center;">Total Aktivitas Booking</p>
      </span>
    </li>
  </ul>
  <div class="halo" style="margin-top: 3%;">
    <h2> Booking Hari Ini </h2>
  </div>
  <form class="styled-box-6">
    <div class="table-responsive">
      <table role="table" aria-busy="false" aria-colcount="6" class="table b-table table-striped table-hover table-borderless border b-table-fixed b-table-stacked-sm custom-table" id="__BVID__56">
        <thead class="thead-blue">
          <thead class="thead-blue">
            <tr>
              <th style="text-align: center;">No.</th>
              <th style="text-align: center;">Tanggal</th>
              <th style="text-align: center;">Jenis</th>
              <th style="text-align: center;">Kode Booking</th>
              <th style="text-align: center;">PIC</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>

        </thead>
        <tbody>
          <?php $index = 1; ?>
          <?php foreach ($roomBookings as $roomBooking) : ?>
            <tr>
              <td style="text-align: center;"><?= $index++; ?></td>
              <td class="small-text" style="text-align: center;">
                <?= $roomBooking['tanggal'] . '<br>' . $roomBooking['jam_mulai'] . ' - ' . $roomBooking['jam_selesai']; ?>
              </td>
              <td class="small-text" style="text-align: center;">Meeting Room</td>
              <td class="small-text" style="text-align: center;"><?= $roomBooking['id_booking_ruangan']; ?></td>
              <td class="small-text" style="text-align: center;"><?= $roomBooking['pic']; ?></td>
              <td class="small-text" style="text-align: center;">
                <a href="<?= site_url('admin/detail_booking_room/' . $roomBooking['id_booking_ruangan']); ?>">
                  <i class="fa-solid fa-eye"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>

          <?php foreach ($driverBookings as $driverBooking) : ?>
            <tr>
              <td style="text-align: center;"><?= $index++; ?></td>
              <td class="small-text" style="text-align: center;">
                <?= $driverBooking['tanggal'] . '<br>' . $driverBooking['jam_mulai'] . ' - ' . $driverBooking['jam_selesai']; ?>
              </td>
              <td class="small-text" style="text-align: center;">Driver</td>
              <td class="small-text" style="text-align: center;"><?= $driverBooking['id_booking_driver']; ?></td>
              <td class="small-text" style="text-align: center;"><?= $driverBooking['pic']; ?></td>
              <td class="small-text" style="text-align: center;">
                <a href="<?= site_url('admin/detail_booking_driver/' . $driverBooking['id_booking_driver']); ?>">
                  <i class="fa-solid fa-eye"></i>
                </a>
              </td>
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
</main>
<?= $this->endSection(); ?>